<?php

namespace App\Model;

class License_Type extends \Core\Model\Base {

	public static $verbose = 'License Type';

	/**
	 * @option type = Varchar
	 * @option length = 100
	 * @option required = Name field is required.
	 */
	public $name;

	/**
	 * @option type = Decimal
	 * @option max = 7
	 * @option digits = 2
	 * @oprion required = Price field is required.
	 */
	public $price;

	/**
	 * @option type = Int
	 * @option required = Quantity field is required.
	 */
	public $quantity;

	/**
	 * @option type = Boolean
	 */
	public $future_version_access;

	/**
	 * @option type = Boolean
	 */
	public $git_access;

	/**
	 * @option type = Boolean
	 */
	public $enabled;

	/**
	 * To String
	 * @return string Name
	 */
	public function __toString() {

		return "{$this->name} (\${$this->price})";

	}

}