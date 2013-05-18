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

		$tickets = \App\Model\Ticket::select()
			->column('ticket.id', 'id')
			->column('ticket.title', 'title')
			->column('ticket_type.title', 'type')
			->column('ticket_status.title', 'status')
			->column('ticket_priority.title', 'priority')
			->inner_join('ticket_type', 'ticket_type.id', '=', 'ticket.ticket_type')
			->inner_join('ticket_status', 'ticket_status.id', '=', 'ticket.ticket_status')
			->inner_join('ticket_priority', 'ticket_priority.id', '=', 'ticket.ticket_priority')
			->where('ticket.user', '=', $user->id)
			->order_desc('ticket.id')
			->fetch();

		$this->data('user', $user);
		$this->data('licenses', $licenses);
		$this->data('tickets', $tickets);

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
	
}