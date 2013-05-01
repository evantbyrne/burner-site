<?php

namespace App\Controller;

class Guide extends \Core\Controller\Base {

	/**
	 * Index
	 */
	public function index() {

		$categories = \App\Model\GuideCategory::select()->order_asc('order')->fetch();
		$columns = array(1 => array(), 2 => array(), 3 => array());

		foreach($categories as $category) {

			$columns[$category->order][$category->title] = $category->guides()
				->select()
				->order_asc('order')
				->fetch();

		}

		$this->data('columns', $columns);
	
	}

	/**
	 * View
	 */
	public function view($url) {

		$guide = \App\Model\Guide::select()->where('url', '=', $url)->single();
		if($guide === null) {

			$this->error('404');

		}

		$this->data('title', "Burner CMS - {$guide->title}");
		$this->data('guide', $guide);

	}
	
}