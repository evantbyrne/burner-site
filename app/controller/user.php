<?php

namespace App\Controller;
use Library\Auth;
use Library\Input;

class User extends \Core\Controller\Base {

	/**
	 * Dashboard
	 */
	public function dashboard() {

		Auth::enforce();
		$user = Auth::current_user();

		$licenses = \App\Model\License::select()
			->column('license.sale_price', 'sale_price')
			->column('license.sale_timestamp', 'sale_timestamp')
			->column('license_type.name', 'name')
			->column('license_type.quantity', 'quantity')
			->inner_join('license_type', 'license_type.id', '=', 'license.license_type')
			->inner_join('order', 'order.id', '=', 'license.order')
			->where('order.user', '=', $user->id)
			->order_desc('license.id')
			->fetch();

		$gits = \App\Model\License_Git::select()
			->where('user', '=', $user->id)
			->fetch();

		// $tickets = \App\Model\Ticket::select()
		// 	->column('ticket.id', 'id')
		// 	->column('ticket.title', 'title')
		// 	->column('ticket_type.title', 'type')
		// 	->column('ticket_status.title', 'status')
		// 	->column('ticket_priority.title', 'priority')
		// 	->inner_join('ticket_type', 'ticket_type.id', '=', 'ticket.ticket_type')
		// 	->inner_join('ticket_status', 'ticket_status.id', '=', 'ticket.ticket_status')
		// 	->inner_join('ticket_priority', 'ticket_priority.id', '=', 'ticket.ticket_priority')
		// 	->where('ticket.user', '=', $user->id)
		// 	->order_desc('ticket.id')
		// 	->fetch();

		$this->data('user', $user);
		$this->data('licenses', $licenses);
		$this->data('available_git', $this->available_git($user));
		$this->data('gits', $gits);
		// $this->data('tickets', $tickets);

	}

	/**
	 * Change Password
	 */
	public function change_password() {

		Auth::enforce();
		$error = false;
		$success = false;

		if(is_post()) {

			$pass = Input::post('password');
			$conf = Input::post('password_confirmation');

			if(!empty($pass) and !empty($conf) and $pass === $conf) {

				$user = Auth::current_user();
				$user->password = Auth::hash($pass);
				$user->save();
				$success = true;

			} else {

				$error = true;

			}

		}

		$this->data('error', $error);
		$this->data('success', $success);

	}

	/**
	 * Request Git
	 */
	public function request_git() {

		Auth::enforce();
		$user = Auth::current_user();

		if($this->available_git($user) <= 0) {

			redirect('dashboard');

		}

		if(is_post()) {

			$git = \App\Model\License_Git::from_post(array('email'));
			$git->user = $user->id;
			$git->completed = 0;
			$errors = $git->valid();
			
			if(!is_array($errors)) {

				$git->save();

				mail(\Core\Config::get('email'), 'Burner CMS Git Request',
					"E-mail: {$git->email}\n\n" .
					"Send notification: " . url("request_git/confirm/{$git->id}",
					'From: ' . \Core\Config::get('email')));

				$this->template('user/request_git_success');

			} else {

				$this->data('errors', $errors);
				$this->data('email', $git->email);

			}

		} else {

			$this->data('email', null);

		}

	}

	/**
	 * Request Git Confirm
	 * @param string License_Git ID
	 */
	public function request_git_confirm($id) {

		Auth::enforce('admin');

		$git = \App\Model\License_Git::id($id) or $this->error(404);
		$git->completed = 1;
		$git->save();

		$this->data('email', $git->email);

	}

	/**
	 * Available Git Activations
	 * @param App\Model\User
	 * @return integer
	 */
	private function available_git($user) {

		$l = \App\Model\License::select()
			->count_column('license.id', 'total')
			->inner_join('license_type', 'license_type.id', '=', 'license.license_type')
			->inner_join('order', 'order.id', '=', 'license.order')
			->where('order.user', '=', $user->id)
			->and_where('license_type.git_access', '=', 1)
			->fetch();

		if(empty($l[0])) {

			return 0;

		}

		$available = intval($l[0]->total);

		$g = \App\Model\License_Git::select()
			->count_column('id', 'total')
			->where('user', '=', $user->id)
			->fetch();

		if(!empty($g[0])) {

			$available -= intval($g[0]->total);

		}

		return $available;

	}
	
}