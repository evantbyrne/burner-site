<?php

namespace App\Controller;
use Library\Auth;
use Library\Input;
use Core\Config;

class Order extends \Core\Controller\Base {

	/**
	 * Index
	 */
	public function index() {}

	/**
	 * License
	 * @param string License type ID
	 */
	public function license($id) {

		$license_type = \App\Model\License_Type::id($id) or $this->error(404);
		Auth::enforce();

		$user = Auth::current_user();

		if(is_post()) {

			// Stripe token not found error
			$token = Input::post('stripeToken');
			if($token === null) {

				$this->data('error', 'Credit card processing error. Sorry about that. Please try again.');
				return;
				
			}

			// Set up autoloading for Stripe
			\Core\Autoload::set('/^Stripe/', function() {

				return 'stripe/Stripe.php';

			});

			// Handle stripe payment
			\Stripe::setApiKey(Config::get('stripe_secret'));

			$customer = \Stripe_Customer::create(array(
				'email' => $user->email,
				'card' => $token
			));

			$charge = \Stripe_Charge::create(array(
				'customer' => $customer->id,
				'amount' => $license_type->price * 100,
				'currency' => 'usd'
			));

			// Add order
			$time = time();

			$order = \App\Model\Order::from_array(array(
				'user' => $user->id,
				'sale_timestamp' => $time,
				'total' => $license_type->price,
				'stripe_id' => $charge->id,
				'stripe_fee' => $charge->fee / 100));
			$order_id = $order->save();

			$license = \App\Model\License::from_array(array(
				'order' => $order_id,
				'license_type' => $license_type->id,
				'sale_price' => $license_type->price,
				'sale_timestamp' => $time));
			$license->save();

			redirect('dashboard');

		} else {

			$this->data('error', null);

		}

		$this->data('license_type', $license_type);
		$this->data('stripe_public', Config::get('stripe_public'));

	}
	
}