<?php

namespace App\Model;

class Api_Version extends \Core\Model\Base {

	public static $verbose = 'API Version';

	/**
	 * @option type = Varchar
	 * @option length = 100
	 * @option required = Name field is required.
	 */
	public $name;

	/**
	 * @option type = HasMany
	 * @option model = Api_Class
	 * @option column = api_version
	 */
	public $api_classes;

	/**
	 * To String
	 * @return string Name
	 */
	public function __toString() {

		return $this->name;

	}

}