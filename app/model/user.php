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
	 */
	public $display_name;
	
}