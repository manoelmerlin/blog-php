<?php
	class EmailConfig {

		public $gmail = array(
			'host' => 'ssl://smtp.gmail.com',
			'port' => 465,
			'username' => 'manoelteste2526@gmail.com',
			'password' => '!notForYou#$%',
			'transport' => 'Smtp',
			'tls' => false
		);

	public $default = array(
		'transport' => 'Mail',
		'from' => 'localhost',
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
	);

	public $smtp = array(
		'transport' => 'Smtp',
		'from' => array('manoelteste2526@gmail.com' => 'My Site'),
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'manoelteste2526@gmail.com',
		'password' => '!notForYou#$%',
		'client' => null,
		'log' => false,
		'tls' => true
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);


	}