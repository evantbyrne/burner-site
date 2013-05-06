<?php

namespace App\Model;

/**
 * @option admin_list = user, total, country
 */
class Order extends \Core\Model\Base {

	/**
	 * @option type = BelongsTo
	 * @option required = User field is required.
	 */
	public $user;

	/**
	 * @option type = Int
	 * @option required = Sale timestamp field is required.
	 */
	public $sale_timestamp;

	/**
	 * @option type = Decimal
	 * @option max = 7
	 * @option digits = 2
	 * @oprion required = Total field is required.
	 */
	public $total;

	/**
	 * @option type = Decimal
	 * @option max = 7
	 * @option digits = 2
	 */
	public $stripe_fee;

	/**
	 * @option type = Varchar
	 * @option length = 255
	 */
	public $stripe_token;

	/**
	 * @option type = Varchar
	 * @option length = 100
	 * @option required = Full name field is required.
	 */
	public $name;

	/**
	 * @option type = BelongsTo
	 * @option required = Country field is required.
	 */
	public $country;

	/**
	 * @option type = Varchar
	 * @option length = 50
	 * @option required = State field is required.
	 */
	public $state;

	/**
	 * @option type = Varchar
	 * @option length = 255
	 * @option required = Address field is required.
	 */
	public $address;

	/**
	 * @option type = Varchar
	 * @option length = 255
	 */
	public $address2;

	/**
	 * @option type = Char
	 * @option length = 5
	 * @option required = Zip code field is required.
	 */
	public $zip_code;

	/**
	 * @option type = HasMany
	 * @option model = License
	 * @option column = order
	 */
	public $licenses;

	/**
	 * To String
	 * @return string Formatted timestamp
	 */
	public function __toString() {

		return date('j M, Y - g:ia', $this->sale_timestamp) . " - {$this->name}";

	}

}