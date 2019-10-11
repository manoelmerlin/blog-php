<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $helpers = array ('Form', 'Html');

/**
 * Function for set data to layouts
 *
 * @return void
 */
	public function beforeRender() {
		Controller::loadModel('Post');
		$categories = $this->Post->find('list', array(
			'conditions' => array(
				'categoria !=' => ''
			),
			'fields' => array(
				'id', 'categoria', 'body', 'title', 'created_date'
			)
		));

		$categories = array_unique($categories);

		$postl = $this->Post->find('all', array(
			'conditions' => array(
				'destaque' => 1
			)
		));

		$countPost = '';
		$this->Post->virtualFields['1'] = 1;
		$this->Post->virtualFields['countJaneiro'] = 'SUM(Post.created_date = 01)';
		$this->Post->virtualFields['countFevereiro'] = 'SUM(Post.created_date = 02)';
		$this->Post->virtualFields['countMarco'] = 'SUM(Post.created_date = 03)';
		$this->Post->virtualFields['countMaio'] = 'SUM(Post.created_date = 04)';
		$this->Post->virtualFields['countAbril'] = 'SUM(Post.created_date = 05)';
		$this->Post->virtualFields['countJunho'] = 'SUM(Post.created_date = 06)';
		$this->Post->virtualFields['countJulho'] = 'SUM(Post.created_date = 07)';
		$this->Post->virtualFields['countAgosto'] = 'SUM(Post.created_date = 08)';
		$this->Post->virtualFields['countSetembro'] = 'SUM(Post.created_date = 09)';
		$this->Post->virtualFields['countOutubro'] = 'SUM(Post.created_date = 10)';
		$this->Post->virtualFields['countNovembro'] = 'SUM(Post.created_date = 11)';
		$this->Post->virtualFields['countDezembro'] = 'SUM(Post.created_date = 12)';

		$countPost = $this->Post->find('all', array(
			'fields' => array(
				'Post.1',
				'Post.countJaneiro',
				'Post.countFevereiro',
				'Post.countMarco',
				'Post.countMaio',
				'Post.countAbril',
				'Post.countJunho',
				'Post.countJulho',
				'Post.countAgosto',
				'Post.countSetembro',
				'Post.countOutubro',
				'Post.countNovembro',
				'Post.countDezembro'
			),
			'contain' => array(

			)
		));

		foreach ($countPost as $countPost) {

			$countPost = array_values($countPost['Post']);

			unset($countPost[0]);


		}

		$this->set(compact('categories', 'postl', 'countPost'));
	}

/**
 * @inheritDoc
 */
	public $components = array(
		'Flash',
		'Session',
		'Paginator',

		'Auth' => array(
		'loginRedirect' => array(
			'controller' => 'posts',
			'action' => 'index'
		),

		'logoutRedirect' => array(
			'controller' => 'posts',
			'action' => 'index'
		),

		'authenticate' => array(
			'Form' => array(
			'passwordHasher' => 'Blowfish'
			)
		)
	));

}
