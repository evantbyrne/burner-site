<?php

namespace App\Model;

class Ticket_Comment extends \Core\Model\Base {

	public static $verbose = 'Ticket Comment';

	/**
	 * @option type = BelongsTo
	 * @option required = Ticket field is required.
	 */
	public $ticket;

	/**
	 * @option type = BelongsTo
	 * @option required = User field is required.
	 */
	public $user;

	/**
	 * @option type = Text
	 * @option required = Content field is required.
	 */
	public $content;

	/**
	 * @option type = Timestamp
	 */
	public $post_timestamp;

	/**
	 * @option type = Timestamp
	 * @option null = true
	 */
	public $edit_timestamp;

}