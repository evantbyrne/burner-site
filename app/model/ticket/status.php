<?php

namespace App\Model;

class Ticket_Status extends \Core\Model\Base {

	public static $verbose = 'Ticket Status';

	/**
	 * @option type = Varchar
	 * @option length = 100
	 * @option required = Title field is required.
	 */
	public $title;

	/**
	 * @option type = HasMany
	 * @option model = Ticket
	 * @option column = ticket_status
	 */
	public $tickets;

	/**
	 * To String
	 * @return string Title
	 */
	public function __toString() {

		return $this->title;

	}

}