<?php

namespace App\Model;

/**
 * @option admin_order = order
 * @option admin_page_size = false
 */
class Guide extends \Core\Model\Base {
	
	/**
	 * @option type = Order
	 */
	public $order;

	/**
	 * @option type = BelongsTo
	 */
	public $guidecategory;

	/**
	 * @option type = Varchar
	 * @option length = 100
	 * @option required = Title field is required.
	 */
	public $title;

	/**
	 * @option type = Varchar
	 * @option length = 100
	 * @option required = URL field is required.
	 */
	public $url;

	/**
	 * @option type = Text
	 * @option required = Content field is required.
	 * @option admin_list = false
	 */
	public $content;

	/**
	 * To String
	 * @return string Title
	 */
	public function __toString() {

		return $this->title;

	}

}