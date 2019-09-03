<?php
	class Report extends AppModel {

		public $actsAs = array('Containable');

		public $belongsTo = array(
		'Comment',
		'Post'
		);
	}