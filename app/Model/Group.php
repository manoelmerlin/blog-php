<?php
	class Group extends AppModel {

		public $hasMany = array(
			'User' => array(
				'className' => 'User',
				'foreignKey' => 'group_id',
				'dependent' => false
			)
		);

		public $actsAs = array(
			'Acl' => array(
				'type' => 'requester'
			)
		);

		public function parentNode() {
			return null;
		}
	}