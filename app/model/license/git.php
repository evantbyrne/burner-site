<?php

namespace App\Model;

class License_Git extends \Core\Model\Base {

	public static $verbose = 'License Git';

	/**
	 * @option type = BelongsTo
	 * @option required = User field is required.
	 */
	public $user;

	/**
	 * @option type = Email
	 * @option length = 100
	 * @option required = Email field is required.
	 */
	public $email;

	/**
	 * @option type = Boolean
	 */
	public $completed;

	/**
	 * To String
	 * @return string Email
	 */
	public function __toString() {

		return $this->email;

	}

}