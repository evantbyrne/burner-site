<?php

namespace App\Model;

/**
 * User Model
 */
class User extends \Library\Auth\Model\MultipleGroups {

	/**
	 * @option type = Varchar
	 * @option length = 25
	 * @option required = Display name field required.
	 * @option unique = Display name already taken. Please choose another.
	 */
	public $display_name;

	/**
	 * @option type = HasMany
	 * @option model = Order
	 * @option column = user
	 */
	public $orders;
	
}