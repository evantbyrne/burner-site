<?php

namespace App\Model;

class Api_Method extends \Core\Model\Base {

	public static $verbose = 'API Method';

	/**
	 * @option type = BelongsTo
	 */
	public $api_class;

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
	 * @option type = Boolean
	 */
	public $is_private;

	/**
	 * @option type = Boolean
	 */
	public $is_protected;

	/**
	 * @option type = Boolean
	 */
	public $is_public;

	/**
	 * @option type = Boolean
	 */
	public $is_static;

	/**
	 * @option type = Json
	 */
	public $parameters;

	/**
	 * Publicity
	 * @return string
	 */
	public function publicity() {

		$p = null;
		if($this->is_public) {

			return 'public';

		} elseif($this->is_protected) {

			return 'protected';

		}

		return 'private';

	}

	/**
	 * To String
	 * @return string Name
	 */
	public function __toString() {

		return $this->name;

	}

}