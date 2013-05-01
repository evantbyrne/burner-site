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
	 * @option type = Order
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
	 * To String
	 * @return string Title
	 */
	public function __toString() {

		return $this->title;

	}

}