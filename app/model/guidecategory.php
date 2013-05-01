<?php

namespace App\Model;

/**
 * @option admin_order = order
 * @option admin_page_size = false
 */
class GuideCategory extends \Core\Model\Base {

	public static $verbose = 'Guide Category';
	public static $verbose_plural = 'Guide Categories';
	
	/**
	 * @option type = Int
	 */
	public $order;

	/**
	 * @option type = Varchar
	 * @option length = 100
	 * @option required = Title field is required.
	 */
	public $title;

	/**
	 * @option type = HasMany
	 * @option model = Guide
	 * @option column = guidecategory
	 */
	public $guides;

	/**
	 * Order Validator
	 * @return mixed True on valid, string on error
	 */
	public function order_validator() {

		if(!in_array($this->order, array('1', '2', '3'))) {

			return 'Must be 1, 2, or 3.';

		}

		return true;

	}

	/**
	 * To String
	 * @return string Title
	 */
	public function __toString() {

		return $this->title;

	}

}