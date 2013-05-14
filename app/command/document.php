<?php

namespace App\Command;

class Document {
	
	/**
	 * Help
	 */
	public function help() {

		echo "\ndocument <version>\n\n";
		echo "Description:\n";
		echo "\tGenerates API documentation for Burner CMS.\n\n";

	}

	/**
	 * Run
	 * @param string Version name
	 */
	public function run($version_name) {

		$version = new \App\Model\Api_Version();
		$version->name = $version_name;
		$version->save();

		$class_list = array(
			'Core\\DB',
			'Mysql\\Exception',
			'Mysql\\Connection',
			'Library\\Auth\\Model\\MultipleGroups'
		);

		foreach($class_list as $c) {

			$doc = \Library\Doc::parse($c);

			$api_class = new \App\Model\Api_Class();
			$api_class->api_version = $version->id;
			$api_class->name = $doc->get_reflection()->getName();
			$api_class->description = $doc->get_description();
			$api_class->set_tags($this->format_tags($doc->get_tags()));
			$api_class->save();

			foreach($doc->get_properties() as $p) {
			
				$ref = $p->get_reflection();

				$api_property = new \App\Model\Api_Property();
				$api_property->api_class = $api_class->id;
				$api_property->name = $ref->getName();
				$api_property->description = $p->get_description();
				$api_property->set_tags($this->format_tags($p->get_tags()));
				$api_property->is_private = ($ref->isPrivate()) ? 1 : 0;
				$api_property->is_protected = ($ref->isProtected()) ? 1 : 0;
				$api_property->is_public = ($ref->isPublic()) ? 1 : 0;
				$api_property->is_static = ($ref->isStatic()) ? 1 : 0;
				$api_property->save();

			}

			foreach($doc->get_methods() as $m) {
			
				$ref = $m->get_reflection();

				$api_method = new \App\Model\Api_Method();
				$api_method->api_class = $api_class->id;
				$api_method->name = $ref->getName();
				$api_method->description = $m->get_description();
				$api_method->set_tags($this->format_tags($m->get_tags()));
				$api_method->is_private = ($ref->isPrivate()) ? 1 : 0;
				$api_method->is_protected = ($ref->isProtected()) ? 1 : 0;
				$api_method->is_public = ($ref->isPublic()) ? 1 : 0;
				$api_method->is_static = ($ref->isStatic()) ? 1 : 0;
				
				$params = array();

				foreach($ref->getParameters() as $p) {

					$param = array(
						'name' => $p->getName(),
						'required' => !$p->isOptional(),
						'has_default' => $p->isDefaultValueAvailable(),
						'default' => null
					);
					
					if($param['has_default']) {

						$param['default'] = serialize($p->getDefaultValue());

					}

					$params[] = $param;

				}

				$api_method->set_parameters($params);
				$api_method->save();

			}

		}
		
	}

	/**
	 * Format Tags
	 * @param array An array of Library\Doc_ResultTag
	 * @return array
	 */
	public function format_tags($tags) {

		$res = array();
		foreach ($tags as $tag) {
			
			$res[] = array($tag->get_name(), $tag->get_value());

		}

		return $res;

	}

}