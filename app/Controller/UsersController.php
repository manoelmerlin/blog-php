<?php
class UsersController extends AppController {

/**
 * {@inheritDoc}
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add_user', 'index', 'forgot', 'viewprofile'); // Permitindo que os usuários se registrem
	}

/**
 * This function is the first executed when the user acess the blog
 *
 * @return void
 */
	public function index() {
		$this->layout = 'layoutindex';
	}

/**
 * This function show content of the user and there the user can control thing in your account
 *
 * @param int $id this is the user id
 *
 * @throws NotFoundException when a user is not found
 *
 * @throws UnauthorizedException when the user dont have permission to acess the content
 *
 * @return void
 *  */
	public function view($id = null) {
		$this->layout = 'admin';
		$this->User->id = $id;

		if (!$this->User->exists()) {
			throw new NotFoundException('Usuario invalido');
		}
		$this->set('user', $this->User->findById($id));

		if ($this->Auth->user('id') != $id) {
			throw new UnauthorizedException('Acesso negado');
		}

		$check = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $id
			),
			'fields' => array(
				'id',
				'imagem',
				'first_name',
				'last_name',
				'email',
				'phone',
				'username',
				'about_me',
				'profession',
				'created'
			)
		));

		$this->set('check', $check);
	}

/**
 * This function is for the user register your account
 *
 * @return void
 */
	public function add_user() {
		$this->layout = 'add_user';
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->User->create();

			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('O cadastro foi realalizado com sucesso'));
				return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
			}
			$this->Flash->error(__('Não foi possível realizar o cadastro, tente novamente.'));
		}
	}

/**
 * Function made for edit data of the user
 *
 * @param int $id user id
 *
 * @throws NotFoundException invalid user
 *
 * @throws UnauthorizedException user don't have permission to acess
 *
 * @return void
 */
	public function edit($id = null) {
		$this->layout = "add_user";
		$this->User->id = AuthComponent::user('id');

		if (!$this->User->exists()) {
			throw new NotFoundException('Usuário invalido');
		}

		if ($this->Auth->user('id') != $id) {
			throw new UnauthorizedException("Você não tem permissão para acessar está página");
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success('Dados atualizados com sucesso');
				return $this->redirect(array('controller' => 'users', 'action' => 'view', $id));
			}
			$this->Flash->error('Falha ao atualizar dados tente novamente');
		} else {
			$this->request->data = $this->User->findById($id);
			unset($this->request->data['User']['password']);
		}
	}

/**
 * function made for delete the account of the user
 *
 * @param int $id id of the account for delete
 *
 * @throws NotFoundException the user was not found
 *
 * @return void
 **/
	public function delete($id = null) {
		$this->request->allowMethod('post');
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Usuário invalido');
		}

		if ($this->User->Delete()) {
			$this->Flash->success(__('User deleted'));
			return $this->redirect(array('action' => 'index'));
		}
	}

/**
 * Function for do login
 *
 * @return void
 * */
	public function login() {
		$this->layout = 'login';
		$shearch = $this->User->find('all');
		$this->set('busca', $shearch);

		if ($this->Auth->user('id')) {
			$this->redirect(array('controller' => 'posts', 'action' => 'index'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			$conditions = $this->User->find('first', array(
				'conditions' => array(
					'username' => $this->request->data['User']['username'],
					'status' => 1
				)
			));

			if ($conditions) {
				if ($this->Auth->login()) {
					return $this->redirect($this->Auth->redirectUrl());
				}
				$this->Flash->error("Usuário ou senha incorretos");

			} else {
				$this->Flash->error("Conta inativa");
			}
		}
	}

/**
 * Function finish the session on the web site
 *
 * @return void
 * */
	public function logout() {
		$this->Flash->success("Logout efetuado com sucesso");
		return $this->redirect($this->Auth->logout());
	}

/**
 * Function to recover the password
 *
 * @return void
 * */
	public function forgot() {
		$this->layout = "add_user";
		if ($this->request->is('post') || $this->request->is('put')) {
				$this->User->username = $this->request->data('username');
				$check = $this->User->find('first', array(
					'conditions' => array(
						'email' => $this->request->data['User']['email'],
						'word_key' => $this->request->data['User']['word_key']
					)
				));

			if (!empty($check)) {
				$save = array(
					'User' => array(
						'id' => $check['User']['id'],
						'password' => $this->request->data['User']['password']
					)
				);
				$this->User->save($save);
				$this->Flash->success("Senha troca com sucesso");
				$this->redirect(array("controller" => 'users', 'action' => 'login'));
			} else {
				$this->Flash->error("usuário não encontrado");
			}
		}
	}

/**
 * Function to delete the account
 *
 * @param int $id this id of the account which will be delete
 *
 * @throws UnauthorizedException user dont have permisison to do this action
 *
 * @return void
 *  */
	public function deleteAccount($id) {
		if ($this->Auth->user('id') != $id) {
			throw new UnauthorizedException("Você não tem permissão para acessar está página");
		}

		$check = $this->User->find('first', array(
			'conditions' => array(
				'id' => $id
			)
		));

		if (($check['User']['id'] == AuthComponent::user('id')) && $check['User']['status'] == 1) {
			$objeto = array(
				'id' => $id,
				'status' => '0'
			);
			$this->User->save($objeto);
			$this->Flash->success("Conta deletada com sucesso");
			$this->redirect(array('controller' => 'users', 'action' => 'view', $this->Auth->user("id")));
		}
	}

/**
 * Function to control the permissions of the blog
 *
 * @param int $id the id of the user which receive the action
 *
 * @throws UnauthorizedException user can not acess the page because dont have permission
 *
 * @return void
 * */
	public function setPermission($id) {
		$check = $this->User->find('first', array(
			'conditions' => array('id' => $id
			)
		));

		if (AuthComponent::user('role') != 1) {
			throw new UnauthorizedException('Você não tem permissão para acessar está página');
		}

			if ($check['User']['role'] == 3) {
			$salvar = array(
				'id' => $id,
				'role' => 2
			);

			$this->User->save($salvar);
			$this->redirect(array('controller' => 'users', 'action' => 'listUsers'));

			} else {
				$this->Flash->error('Erro');
			}
	}

/**
 * Function for promote the user
 *
 * @param int $id id of the user
 *
 * @throws UnauthorizedException
 *
 * @return void
 *  */
	public function promoteUser($id) {
		$check = $this->User->find('first', array(
			'conditions' => array('id' => $id
				)
			)
		);

		if (AuthComponent::user('role') != 1) {
			throw new UnauthorizedException('Você não tem permissão para acessar está página');
		}

		if ($check['User']['role'] == 2) {
			$salvar = array(
				'id' => $id,
				'role' => 1
			);

			$this->User->save($salvar);
			$this->redirect(array('controller' => 'users', 'action' => 'listUsers'));

		} else {
			$this->Flash->error('Erro');
		}
	}

/**
 * Function for revoke the actual permission of the user
 *
 * @param int $id id of the user
 *
 * @throws UnauthorizedException user don't have the permission to do the action
 *
 * @return void
 *  */
	public function cancelPermission($id) {
		$check = $this->User->find('first', array(
			'conditions' => array('id' => $id

			)
		));

		if (AuthComponent::user('role') != 1) {
			throw new UnauthorizedException('Você não tem permissão para acessar está página');
		}

		if ($check['User']['role'] == 2) {
			$salvar = array(
				'id' => $id,
				'role' => 3
			);

			$this->User->save($salvar);
			$this->Flash->success('Cargo revogado para Membro com sucesso');
			$this->redirect(array('controller' => 'users', 'action' => 'listUsers'));
		}
			if ($check['User']['role'] == 1) {
				$salvar = array(
					'id' => $id,
					'role' => 2
				);
				$this->User->save($salvar);
				$this->Flash->success('Cargo revogado para Moderador com sucesso');
				$this->redirect(array('controller' => 'users', 'action' => 'listUsers'));
			} else {
				$this->Flash->error('Erro');
			}
	}

/**
 * Function for the adm see all the users who use the blog
 *
 * @throws UnauthorizedException user can not acess because dont have permission
 *
 * @return void
 *  */
	public function listUsers() {
		$this->layout = 'admin';

		if ($this->Auth->user("role") != 1) {
			throw new UnauthorizedException("Você não tem permissão para acessar está pagina");
		}

		$this->loadModel('User');
		$user = $this->User->find('all');
		$this->set('users', $user);
	}

/**
 * Function for the user changer or put a image in his/her profile
 *
 * @return void
 *  */
	public function profileImage() {
		$this->layout = "admin";
		if ($this->request->is('post')) {
			$this->User->id = $this->Auth->user('id');
			$filename = basename($this->request->data['User']['image']['name']);
			$this->request->data['User']['imagem'] = $filename;

			if ($this->request->data['User']['image']['error'] == 0) {
				if ($this->User->save($this->request->data)) {
					move_uploaded_file($this->data['User']['image']['tmp_name'], WWW_ROOT . DS . 'img' . DS . 'profilepic' . DS . $filename);
					$this->Flash->success('Sua imagem foi salva com sucesso');
					$this->redirect(array('controller' => 'users', 'action' => 'view', $this->Auth->user('id')));
				}
			}
			$this->Flash->error('Erro ao adicionar imagem tente adicionar outra imagem');
		}
	}
/**
 *Function which shows profiles of the members of the blog
 *
 * @param int $id id of the user
 *
 * @return void
 */
	public function viewProfile($id) {
		$this->layout = "layoutindex";
		$this->loadModel('Post');
		$countPost = $this->Post->find('all', array(
			'conditions' => array(
				'Post.created_by' => $id
			)
		));

		$this->set('count_post', $countPost);
		$this->loadModel('Comment');
		$countComments = $this->Comment->find('all', array(
			'conditions' => array(
				'Comment.created_by' => $id
			)
		));

		$this->set('count_comments', $countComments);
		$check = $this->User->find('first', array(
			'conditions' => array(
				'id' => $id,

			)
		));

		$this->loadModel('Curtida');
		$this->set('check', $check);
		$buscacont = $this->Curtida->find('all', array(
			'conditions' => array(
				'Curtida.user_id' => $id
			)
		));
		$this->set('buscacont', $buscacont);
	}

/**
 * Function for the user write a little text about himself and show for the others user who acess your profile
 *
 * @return void
 *  */
	public function aboutMe() {
		$this->layout = "admin";
		$this->User->id = $this->Auth->user('id');
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success("Sucesso");
				$this->redirect(array('controller' => 'users', 'action' => 'view', $this->Auth->user('id')));
			}
		}
	}
/**
 * Function for the use change the profession in you profile
 *
 * @return void
 */
	public function changeProfession() {
		$this->layout = "admin";
		$this->User->id = $this->Auth->user('id');
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success("Profissão inserida / Alterada com sucesso");
				$this->redirect(array('controller' => 'users', 'action' => 'view', $this->Auth->user('id')));

			}
		}
	}
/**
 * Function for the use remove your profile picture
 *
 * @throws UnauthorizedException user can not acess the content
 *
 * @return void
 */
	public function removeProfilePic() {
		$this->layout = 'admin';
		$check = $this->User->find('first', array(
			'conditions' => array(
				'id' => $this->Auth->user('id')
				)
			)
		);
		if ($this->Auth->user('id') != $check['User']['id']) {
			throw new UnauthorizedException("Você não tem permissão para fazer isto !");
		}
		$save = array(
			'imagem' => 'capaprofile.jpg'
		);

		if ($check) {
			$this->User->id = $this->Auth->user('id');
			$this->User->save($save);
			$this->Flash->success('Foto removida com sucesso');
			$this->redirect(array('controller' => 'users', 'action' => 'view', $this->Auth->user("id")));
		}
	}

/**
 *Function for the user update your password
 *
 * @param int $id this is the user id
 *
 * @throws NotFoundException can't find the user
 *
 * @throws UnauthorizedException the user don't have permission to acess this page
 *
 * @return void
 */
	public function updatePassword($id) {
		$this->layout = "add_user";
		$this->User->id = AuthComponent::user('id');
		if (!$this->User->exists()) {
			throw new NotFoundException('Usuário invalido');
		}
		if ($this->Auth->user('id') != $id) {
			throw new UnauthorizedException("Você não tem permissão para acessar está página");
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success('Senha atualizada com sucesso');
				return $this->redirect(array('controller' => 'Posts', 'action' => 'index'));
			}
			$this->Flash->error('Falha ao atualizar senha tente novamente');
		} else {
			$this->request->data = $this->User->findById($id);
			unset($this->request->data['User']['password']);

		}
	}
}