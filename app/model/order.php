<?php

namespace App\Model;

/**
 * @option admin_list = user, total
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
	public $stripe_id;

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

		return date('j M, Y - g:ia', $this->sale_timestamp);

	}

}