<?php

namespace App\Model;

class Country extends \Core\Model\Base {

	public static $verbose_plural = 'Countries';

	/**
	 * @option type = Varchar
	 * @option length = 100
	 * @option required = Name field is required.
	 */
	public $name;

	/**
	 * @option type = HasMany
	 * @option model = Order
	 * @option column = country
	 */
	public $orders;

	/**
	 * To String
	 * @return string Name
	 */
	public function __toString() {

		return $this->name;

	}

}