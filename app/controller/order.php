<?php

namespace App\Controller;
use Library\Auth;
use Library\Input;
use Library\Session;
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
		$user = $this->enforce_user();

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

			redirect('order/complete');

		} else {

			$this->data('error', null);

		}

		$this->data('license_type', $license_type);
		$this->data('stripe_public', Config::get('stripe_public'));

	}

	/**
	 * Complete
	 */
	public function complete() {

		$user = $this->enforce_user();
		$orders = \App\Model\Order::select()->where('user', '=', $user->id)->fetch();
		if(empty($orders)) {

			redirect('dashboard');

		}

	}

	/**
	 * Download
	 */
	public function download() {

		$user = $this->enforce_user();
		$orders = \App\Model\Order::select()->where('user', '=', $user->id)->fetch();

		if(!empty($orders)) {

			$file_name = Config::get('burner_download_path');
			header('Pragma: public'); // required
			header('Expires: 0'); // no cache
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Last-Modified: ' . gmdate ('D, d M Y H:i:s', filemtime ($file_name)) . ' GMT');
			header('Cache-Control: private', false);
			header('Content-Type: application/zip');
			header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
			header('Content-Transfer-Encoding: binary');
			header('Content-Length: ' . filesize($file_name));
			header('Connection: close');
			readfile($file_name);
			exit();

		}

	}

	/**
	 * Enforce User
	 * @return App\Model\User
	 */
	private function enforce_user() {

		if(Auth::logged_in()) {

			return Auth::current_user();

		}

		$user_id = Session::get('registered_user');
		if($user_id !== null) {

			$user = \App\Model\User::id($user_id);
			if($user !== null) {

				return $user;

			}

		}

		login_redirect(CURRENT_PAGE);

	}
	
}