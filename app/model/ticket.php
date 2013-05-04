<?php

namespace App\Model;

/**
 * @option admin_list = title, ticket_status, ticket_priority, ticket_type
 */
class Ticket extends \Core\Model\Base {

	/**
	 * @option type = BelongsTo
	 * @option required = User field is required.
	 */
	public $user;

	/**
	 * @option type = Varchar
	 * @option length = 200
	 * @option required = Title field is required.
	 */
	public $title;

	/**
	 * @option type = Text
	 * @option required = Content field is required.
	 */
	public $content;

	/**
	 * @option type = BelongsTo
	 * @option required = Type field is required.
	 */
	public $ticket_type;

	/**
	 * @option type = BelongsTo
	 * @option required = Priority field is required.
	 */
	public $ticket_priority;

	/**
	 * @option type = BelongsTo
	 * @option required = Status field is required
	 */
	public $ticket_status;

	/**
	 * @option type = Timestamp
	 */
	public $post_timestamp;

	/**
	 * @option type = Timestamp
	 * @option null = true
	 */
	public $edit_timestamp;

	/**
	 * @option type = HasMany
	 * @option model = Ticket_Comment
	 * @option column = ticket
	 */
	public $ticket_comments;

}