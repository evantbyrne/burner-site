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
			'App\\Vendor\\Admin\\Controller\\Admin',
			'App\\Vendor\\Auth\\Controller\\Auth',

			'Column\\Base',
			'Column\\BelongsTo',
			'Column\\Boolean',
			'Column\\Char',
			'Column\\Date',
			'Column\\Decimal',
			'Column\\Email',
			'Column\\File',
			'Column\\HasMany',
			'Column\\HasManyQuery',
			'Column\\Image',
			'Column\\Int',
			'Column\\IntArray',
			'Column\\Json',
			'Column\\ManyToMany',
			'Column\\Order',
			'Column\\Password',
			'Column\\Text',
			'Column\\Time',
			'Column\\Timestamp',
			'Column\\TinyInt',
			'Column\\Varchar',

			'Core\\Command\\Alter_Add',
			'Core\\Command\\Clean_User_Sessions',
			'Core\\Command\\Create',
			// 'Core\\Command\\Create_Admin',
			'Core\\Command\\Create_Controller',
			'Core\\Command\\Create_Model',
			'Core\\Command\\Drop',
			'Core\\Command\\Export_Json',
			'Core\\Command\\Generate_Hash_Secret',
			'Core\\Command\\Help',
			'Core\\Command\\Import_Json',
			'Core\\Command\\Insert',
			'Core\\Command\\Install',
			'Core\\Command\\Sql',
			'Core\\Command\\Sync',
			'Core\\Command\\Test',

			'Core\\Controller\\Base',

			'Core\\Form\\Base',

			'Library\\Auth',
			'Library\\Auth\\BaseInterface',
			'Library\\Auth\\Exception',
			'Library\\Auth\\Form\\MultipleGroups',
			'Library\\Auth\\Form\\Standard',
			'Library\\Auth\\Model\\MultipleGroups',
			'Library\\Auth\\Model\\MultipleGroups_Group',
			'Library\\Auth\\Model\\MultipleGroups_Membership',
			'Library\\Auth\\Model\\Standard',
			'Library\\Auth\\Model\\UserSession',
			'Library\\Auth\\Plugin\\MultipleGroups',
			'Library\\Auth\\Plugin\\Standard',
			'Library\\Cookie',
			'Library\\Doc',
			'Library\\Doc_ResultClass',
			'Library\\Doc_ResultMethod',
			'Library\\Doc_ResultProperty',
			'Library\\Doc_ResultTag',
			'Library\\DocComment',
			'Library\\Input',
			'Library\\Session',
			'Library\\Template\\BaseInterface',
			'Library\\Template\\Standard',
			'Library\\Test\\Base',
			'Library\\Test\\Exception',
			'Library\\Valid',
			// 'Library\\Xml',
			// 'Library\\Xss',

			'Core\\Model\\Base',
			// 'Core\\Model\\PasswordReset',
			// 'Core\\Model\\Session',

			'Core\\Autoload',
			'Core\\Bootstrap',
			'Core\\Cli',
			'Core\\Config',
			'Core\\DB',
			'Core\\Response',
			'Core\\JsonResponse',
			'Core\\Route',
			
			'Mysql\\Exception',
			'Mysql\\Connection',
			'Mysql\\Result',
			'Mysql\\Base',
			'Mysql\\WhereBase',
			'Mysql\\Query',
			'Mysql\\Select',
			'Mysql\\Update',
			'Mysql\\Delete',
			'Mysql\\Insert',
			'Mysql\\CreateTable',
			'Mysql\\DropTable',
			'Mysql\\TruncateTable',
			'Mysql\\RenameTable',
			'Mysql\\AlterTable',
			'Mysql\\TableColumn',
			'Mysql\\IntColumn',
			'Mysql\\TinyIntColumn',
			'Mysql\\SmallIntColumn',
			'Mysql\\MediumIntColumn',
			'Mysql\\BigIntColumn',
			'Mysql\\BooleanColumn',
			'Mysql\\DecimalColumn',
			'Mysql\\DateColumn',
			'Mysql\\TimeColumn',
			'Mysql\\TimestampColumn',
			'Mysql\\TextColumn',
			'Mysql\\CharColumn',
			'Mysql\\VarcharColumn',
			'Mysql\\EnumColumn',
			'Mysql\\IncrementingColumn',
			'Mysql\\TableAddition',
			'Mysql\\PrimaryKey',
			'Mysql\\UniqueKey',
			'Mysql\\FulltextIndex'
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