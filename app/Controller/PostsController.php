<?php
class PostsController extends AppController {

/**
 * This function control the pages which can be acess before the user login
 *
 * @return void
 *  */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(array('index', 'view', 'separarcategoria'));
	}

	public $components = array('Paginator', 'RequestHandler');

/**
 * This is the first action executed when enter in post controller
 *
 * @return void
 */
	public function index() {
		$this->layout = 'layoutindex';
		$this->paginate = array(
			'conditions' => array(
				'Post.status' => 1
			),
			'limit' => 4,
			'order' => array('Post.id' => 'desc'),
		);

		$this->set('posts', $this->paginate());
		$this->loadModel('User');
		$users = $this->User->find('all');
		$this->set('users', $users);
	}

/**
 * This is the view function for see the content of the blog
 *
 * @param int $id this id  refer to post
 *
 * @throws NotFoundException when a post is not founded
 *
 * @return void
 */
	public function view($id = null) {
		$post = $this->Post->find('first', array(
			'conditions' => array(
				'Post.id' => $id
			)
		));

		if ((int)$post['Post']['status'] !== 1 || !$this->Post->exists($id)) {
			throw new NotFoundException("Post não existe");
		}

		$this->layout = 'layoutindex';
		$this->loadModel('Comment');
		$this->set('post', $post);

		$comentarios = $this->Comment->find('all', array(
			'conditions' => array(
				'Comment.post_id' => $id
			),
			'order' => array('Comment.id' => 'desc'),

		));

		$this->set('comentarios', $comentarios);
		$this->loadModel('Curtida');

		$check = $this->Curtida->find('first', array(
			'conditions' => array(
				'post_id' => $id,
				'user_id' => $this->Auth->user('id')
			)
		));

		$this->set('check', $check);

		$contlike = $this->Curtida->find('all', array(
			'conditions' => array(
				'Curtida.post_id' => $id
			)
		));

		$this->set('contlike', $contlike);
	}

/**
 * This function are for add post at the blog
 *
 * @throws UnauthorizedException When a user don't have permisison to acess the page
 *
 * @return void
 */
	public function add() {
		$this->layout = 'admin';
		if (AuthComponent::user('role') != 1 && AuthComponent::user('role') != 2) {
			throw new UnauthorizedException("Sem permissão para acessar está pagina");
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['Post']['created_by'] = AuthComponent::user('id');
			$this->request->data['Post']['first_name'] = AuthComponent::user('first_name');
			$this->request->data['Post']['last_name'] = AuthComponent::user('last_name');
			$this->Post->create();
			$filename = basename($this->request->data['Post']['image']['name']);
			$this->request->data['Post']['imagem'] = $filename;

			if ($this->request->data['Post']['image']['error'] == 0) {
				if ($this->Post->save($this->request->data)) {
					move_uploaded_file($this->data['Post']['image']['tmp_name'], WWW_ROOT . DS . 'img' . DS . 'uploads' . DS . $filename);
					$this->Flash->success('Seu post foi salvo');
					$this->redirect(array('action' => 'index'));
				}
			}
		}
	}

/**
 * This is the function to edit the post
 *
 * @param array $id this the id of the post for edit
 *
 * @throws NotFoundException when a post is not found
 *
 * @throws UnauthorizedException when a user don't have permission to acess the content
 *
 * @return void
 */
	public function edit($id = null) {
		$this->layout = "admin";
		$post = $this->Post->findById($id);

		if (!$this->Post->exists($id)) {
			throw new NotFoundException("Post não existe");
		}

		if ($post['Post']['created_by'] != AuthComponent::user('id') && AuthComponent::user('role') != 1) {
				throw new UnauthorizedException("Sem permissão para acessar está pagina");
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success('Postagem atualizada com sucesso');
				$this->redirect(array('controller' => 'posts', 'action' => 'index'));
			}
			$this->Flash->error("Erro ao atualizar postagem");
		}
			$this->request->data = $post;
	}

/**
 * This is the function to delete a post
 *
 * @param array $id this is the id of the post for delete
 *
 * @throws NotFoundException when the post is not found
 *
 * @throws UnauthorizedException when the user dont have the permission to acess the content
 *
 * @return void
 */
	public function delete($id) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException("Post não existe");
		}

		$post = $this->Post->findById($id);

		if ($post['Post']['created_by'] != AuthComponent::user('id') && AuthComponent::user('role') != 1) {
			throw new UnauthorizedException("Sem permissão para acessar está pagina");
		}

		$objeto = array(
			'id' => $id,
			'status' => '0'
		);
		$this->Post->save($objeto);
		$this->redirect(array('controller' => 'posts', 'action' => 'allposts'));
	}

/**
 * This is the function to comment a post
 *
 * @return void
 */
	public function comentar() {
		$this->loadModel('Comment');
		$this->loadModel('User');

		$teste = $this->User->find('first', array(
			'conditions' => array(
				'id' => $this->Auth->user('id')),
				'fields' => array(
					'imagem'
				)
		));

		if ($this->request->is('Post') || $this->request->is('put')) {
			$this->request->data['Comment']['created_by'] = AuthComponent::user('id');
			$this->request->data['Comment']['first_name'] = AuthComponent::user('first_name');
			$this->request->data['Comment']['last_name'] = AuthComponent::user('last_name');
			$this->request->data['Comment']['created'] = AuthComponent::user('created');
			$this->request->data['Comment']['imagem'] = $teste['User']['imagem'];
			$this->Comment->create();

			if ($this->Comment->save($this->request->data)) {
				$this->redirect(array('controller' => 'posts', 'action' => 'view', $this->request->data['Comment']['post_id']));
			}
		}
	}

/**
 * This is the function to delete a commit of the post
 *
 * @param array $id this is the id of the comment which will be deleted
 *
 * @throws UnauthorizedException the user has not the permission to delete the comment
 *
 * @return void
 */
	public function deleteComment($id = null) {
		$this->loadModel('Comment');
		$coment = $this->Comment->findById($id);
		$busca = $this->Comment->find('first', array(
			'conditions' => array(
				'Comment.id' => $id,
			),
			'contain' => array(
				'Post' => array(
					'fields' => array(
						'id',
						'created_by'
					)
				)
			)
		));

		if (AuthComponent::user('id') != $coment['Comment']['created_by'] && AuthComponent::user('role') != 1 && AuthComponent::user('id') != $busca['Post']['created_by']) {
			throw new UnauthorizedException("Sem permissão para deletar esté comentario");
		}

		if ($this->Comment->delete($id)) {
				$this->Flash->success('Comentário deletado com sucesso');
				$this->redirect(array('controller' => 'posts', 'action' => 'view', $busca['Post']['id']));
		} else {
				$this->Flash->error("Não foi possivel deletar o comentario");
		}
	}

/**
 * This function separete categories of the blog
 *
 * @param array $categoria this is the category which will be in the URL
 *
 * @return void
 */
	public function separarCategoria($categoria) {
		$this->layout = 'layoutindex';
		$post = $this->Post->find('all', array(
			'conditions' => array(
				'categoria' => $categoria,
				'Post.status' => 1
			),
			'order' => array('Post.id' => 'desc')
		));

		$this->set('posts', $post);
	}

/**
 * This function show all post in a table for the user see what post are in the blog
 *
 * @return void
 */
	public function allPosts() {
		$this->layout = 'admin';
		$conditions = array(
			'Post.status' => 1,
		);
		if (AuthComponent::user('role') != 1) {
			$conditions['Post.created_by'] = AuthComponent::user('id');
		}

		$post = $this->Post->find('all', array(
		'conditions' => array(
			'Post.status' => 1,
			'Post.created_by' => $this->Auth->user('id')),
		'order' => array('Post.id' => 'desc')
		));

		$this->set('posts', $post);
		$this->set("contPost", $post);
	}

/**
 * This function is for enjoy a post
 *
 * @param array $id this id is the id of the who will be
 *
 * @return void
 */
	public function enjoyPost($id) {
		$this->loadModel('Curtida');
		$check = $this->Curtida->find('first', array(
			'conditions' => array(
				'post_id' => $id,
				'user_id' => $this->Auth->user('id')
				)
		));
			$this->set('check', $check);
			if (!empty($check)) {
				$this->Flash->error('Você já curtiu esse post');
			} else {
				$objeto = array(
					'status' => 1,
					'post_id' => $id,
					'user_id' => AuthComponent::user('id')
				);
				$this->Curtida->save($objeto);
				$this->Flash->success('Post favoritado');
			}

			$this->redirect(array('controller' => 'posts', 'action' => 'view', $id));
	}

/**
 * This function shows the post which the user has liked
 *
 * @return void
 * */
	public function like() {
		$this->layout = "admin";
		$this->loadModel('Curtida');
		$curtida = $this->Curtida->find('all', array(
			'conditions' => array(
				'user_id' => AuthComponent::user('id')
			),
			'order' => array('Curtida.id' => 'desc'),
			'contain' => array(
				'Post' => array(
					'fields' => array(
						'id',
						'title',
						'body',
						'categoria',
						'imagem',
						'created'
					)
				),
			)
		));
		$this->set('curtida', $curtida);
		$contLike = $this->Curtida->find('all', array(
			'conditions' => array(
				'user_id' => $this->Auth->user('id')
			)
		));

		$this->set('contLike', $contLike);
		$post = $this->Post->find('all');
		$this->set('posts', $post);
	}

/**
 * This function remove a post from the page which shows the post that you liked
 *
 * @param array $id this is the like id
 *
 * @return void
 */
	public function unlike($id) {
		$this->loadModel('Curtida');
		$check = $this->Curtida->find('first', array(
			'conditions' => array(
				'Curtida.id' => $id,
				'Curtida.user_id' => $this->Auth->user('id')
			),
			'contain' => array(
				'Post' => array(
					'fields' => array(
						'id',
						'title'
					)
				)
			)
		));

		if ($check) {
			$this->Curtida->delete($id);
			$this->redirect(array('controller' => 'posts', 'action' => 'view', $check['Post']['id']));
		}
		$this->set('check', $check);
	}

/**
 * This function remove a post from the page which shows the post that you liked
 *
 * @param array $id this is the like id
 *
 * @return void
 */
	public function removeFavorites($id) {
		$this->loadModel('Curtida');
		$check = $this->Curtida->find('first', array(
			'conditions' => array(
				'Curtida.id' => $id,
				'Curtida.user_id' => $this->Auth->user('id')
			),
			'contain' => array(
				'Post' => array(
					'fields' => array(
						'id',
						'title'
					)
				)
			)
		));

		if ($check) {
			$this->Curtida->delete($id);
			$this->redirect(array('controller' => 'posts', 'action' => 'like'));
		}
			$this->set('check', $check);
	}

/**
 * Function for the user report a comment
 *
 * @param int $id this is the comment id
 *
 * @return void
 *  */
	public function reportComment($id) {
		$this->loadModel('Comment');
		$this->loadModel('Report');
		$this->loadModel('User');

		$checkEqual = $this->Report->find('all', array(
			'conditions' => array(
				'comment_id' => $id,
				'user_id' => AuthComponent::user('id')
			)
		));

		$check = $this->Comment->find('first', array(
			'id' => $id
		));

			if ($check && empty($checkEqual)) {
				$save = array(
					'user_id' => AuthComponent::user('id'),
					'comment_id' => $id
				);
				$bola = $this->Report->find('all', array(
					'conditions' => array(
						'Comment_id' => $id
					),
					'contain' => array(
						'Comment' => array(
							'fields' => array(
								'id'
							)
						)
					)
				));

				$banana = count($bola);

				if ($banana >= 1) {
					$this->Flash->success("Comentario deletado com sucesso");
					$this->Comment->delete($id);
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Flash->success("reportado");
					$this->Report->save($save);
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Flash->error("Você já denunciou esté comentário");
				$this->redirect(array('action' => 'index'));
			}
	}
}
