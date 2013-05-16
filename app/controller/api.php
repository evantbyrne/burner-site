<?php

namespace App\Controller;

class Api extends \Core\Controller\Base {

	/**
	 * Index
	 */
	public function index($version_name = 'latest') {

		$version = $this->get_version($version_name);

		$all_versions = \App\Model\Api_Version::select()
			->order_desc('id')
			->fetch();

		$classes = $version->api_classes()
			->select()
			->order_asc('name')
			->fetch();

		$this->data('all_versions', $all_versions);
		$this->data('version_name', $version_name);
		$this->data('version', $version);
		$this->data('classes', $classes);

	}

	/**
	 * View
	 */
	public function view($version_name, $class_name) {

		$version = $this->get_version($version_name);

		$class_name = ltrim(to_php_namespace($class_name), '\\');

		$api_class = $version->api_classes()
			->select()
			->and_where('name', '=', $class_name)
			->single() or $this->error(404);

		$api_methods = $api_class->api_methods()
			->select()
			->order_desc('is_static')
			->order_asc('name')
			->fetch();

		$api_properties = $api_class->api_properties()
			->select()
			->order_desc('is_static')
			->order_asc('name')
			->fetch();

		$this->data('version_name', $version_name);
		$this->data('version', $version);
		$this->data('api_class', $api_class);
		$this->data('api_methods', $api_methods);
		$this->data('api_properties', $api_properties);

	}

	/**
	 * Get Version
	 * @param string Version name
	 * @return App\Model\Api_Version
	 */
	private function get_version($version_name) {

		$version = null;

		if($version_name === 'latest') {

			$version = \App\Model\Api_Version::select()
				->order_desc('id')
				->single();

		} else {

			$version = \App\Model\Api_Version::select()
				->where('name', '=', $version_name)
				->single() or $this->error(404);

		}

		return $version;

	}

}