<?php

namespace App\Model;

class Api_Class extends \Core\Model\Base {

	public static $verbose = 'API Class';
	public static $verbose_plural = 'API Classes';

	/**
	 * @option type = BelongsTo
	 */
	public $api_version;

	/**
	 * @option type = Varchar
	 * @option length = 100
	 * @option required = Name field is required.
	 */
	public $name;

	/**
	 * @option type = Text
	 */
	public $description;

	/**
	 * @option type = Json
	 */
	public $tags;

	/**
	 * @option type = HasMany
	 * @option model = Api_Property
	 * @option column = api_class
	 */
	public $api_properties;

	/**
	 * @option type = HasMany
	 * @option model = Api_Method
	 * @option column = api_class
	 */
	public $api_methods;

	/**
	 * Dotted Name
	 * @return string
	 */
	public function dotted_name() {

		return str_replace('\\', '.', $this->name);

	}

	/**
	 * To String
	 * @return string Name
	 */
	public function __toString() {

		return $this->name;

	}

}