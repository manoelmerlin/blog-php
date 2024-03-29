<?php
	App::uses('User', 'Model');
	class Post extends AppModel {

/**
 * @inheritDoc
 */
		public $actsAs = array('Containable');

/**
 * @inheritDoc
 */
		public $belongsTo = array(
			'User' => array(
				'className' => 'User',
				'foreignKey' => 'created_by',
			)
		);

/**
 * @inheritDoc
 */
		public $hasMany = array(
			'Comment',
			'Curtida'
		);

/**
 * @inheritDoc
 */
		public $validate = array(
			'title' => array(
				'between' => array(
					'rule' => array('lengthBetween', 10, 200),
					'message' => 'Titúlo deve possuir entre 20 e 200 caracteres'
				)
			),
			'Body' => array(
				'required' => true
			)

		);

	}

