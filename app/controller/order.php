<?php

namespace App\Controller;

class Order extends \Core\Controller\Base {

	/**
	 * Constructor
	 */
	public function __construct() {

		\Core\Autoload::set('/^Stripe/', function() {

			return 'stripe/Stripe.php';

		});

	}

	/**
	 * Index
	 */
	public function index() {}
	
}