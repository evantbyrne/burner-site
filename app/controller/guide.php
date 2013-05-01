<?php

namespace App\Controller;

class Guide extends \Core\Controller\Base {

	/**
	 * Index
	 */
	public function index() {

		return new \Core\Response();
	
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