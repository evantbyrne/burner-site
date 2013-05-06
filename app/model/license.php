<?php

namespace App\Model;

class License extends \Core\Model\Base {

	/**
	 * @option type = BelongsTo
	 * @option required = Order field is required.
	 */
	public $order;

	/**
	 * @option type = BelongsTo
	 * @option required = License type field is required.
	 */
	public $license_type;

	/**
	 * @option type = Decimal
	 * @option max = 7
	 * @option digits = 2
	 * @oprion required = Sale price field is required.
	 */
	public $sale_price;

	/**
	 * @option type = Int
	 * @option required = Sale timestamp field is required.
	 */
	public $sale_timestamp;

}