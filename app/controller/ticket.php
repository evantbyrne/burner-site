<?php

namespace App\Controller;

class Ticket extends \Core\Controller\Base {

	public static $STATUS_OPEN = 1;
	public static $STATUS_CLOSED = 2;
	public static $STATUS_ACCEPTED = 3;
	public static $STATUS_COMPLETED = 4;

	/**
	 * Open
	 */
	public function open() {

		$tickets = $this->select()
			->where('ticket.ticket_status', '=', self::$STATUS_OPEN)
			->or_where('ticket.ticket_status', '=', self::$STATUS_ACCEPTED)
			->order_desc('ticket.ticket_priority')
			->order_asc('ticket.id')
			->fetch();

		$this->data('tickets', $tickets);
		$this->data('open', true);
		$this->template('ticket/list');

	}

	/**
	 * Closed
	 */
	public function closed() {

		$tickets = $this->select()
			->where('ticket.ticket_status', '=', self::$STATUS_CLOSED)
			->or_where('ticket.ticket_status', '=', self::$STATUS_COMPLETED)
			->order_desc('ticket.id')
			->fetch();

		$this->data('tickets', $tickets);
		$this->data('open', false);
		$this->template('ticket/list');

	}

	/**
	 * Listing Select
	 * @return Mysql\Select
	 */
	private function select() {

		return \App\Model\Ticket::select()
			->column('ticket.id', 'id')
			->column('ticket.title', 'title')
			->column('ticket_type.title', 'type')
			->column('ticket_status.title', 'status')
			->column('ticket_priority.title', 'priority')
			->inner_join('ticket_type', 'ticket_type.id', '=', 'ticket.ticket_type')
			->inner_join('ticket_status', 'ticket_status.id', '=', 'ticket.ticket_status')
			->inner_join('ticket_priority', 'ticket_priority.id', '=', 'ticket.ticket_priority');

	}

}