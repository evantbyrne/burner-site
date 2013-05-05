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

		$tickets = \App\Model\Ticket::select()
			->column('ticket.id', 'id')
			->column('ticket.title', 'title')
			->column('ticket_type.title', 'type')
			->column('ticket_status.title', 'status')
			->column('ticket_priority.title', 'priority')
			->where('ticket.ticket_status', '=', self::$STATUS_OPEN)
			->or_where('ticket.ticket_status', '=', self::$STATUS_ACCEPTED)
			->inner_join('ticket_type', 'ticket_type.id', '=', 'ticket.ticket_type')
			->inner_join('ticket_status', 'ticket_status.id', '=', 'ticket.ticket_status')
			->inner_join('ticket_priority', 'ticket_priority.id', '=', 'ticket.ticket_priority')
			->order_desc('ticket.ticket_priority')
			->order_asc('ticket.id')
			->fetch();

		$this->data('tickets', $tickets);

	}

}