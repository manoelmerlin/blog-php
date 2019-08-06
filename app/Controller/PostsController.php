<?php
    class PostsController extends AppController {
        public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('index', 'view'));
        
        }
      
  
        public $components = array('Paginator');
       
        function index() {      
            $this->layout = 'layoutindex';
                  
             $this->paginate = array(
                'conditions' => array(
                    'Post.status' => 1
                ),
                'limit' => 4,
                'order' => array('Post.id' => 'desc')
            ); 
            $this->set('posts', $this->paginate());
            $this->loadModel('User');
            $users = $this->User->find('all');
            $this->set('users', $users);
            
        }
        public function view($id = null) {
            $post = $this->Post->find('first', array(
                'conditions' => array(
                    'Post.id' => $id
                )
            ));

            if($post['Post']['status'] != 1 || !$this->Post->exists($id)){
                throw new NotFoundException("Post não existe");
            }
        
            $this->layout = 'layoutindex';
            $this->loadModel('Comment');
            $this->set('post', $post); 


            $comentarios = $this->Comment->find('all', array(
                'conditions' => array(
                    'Comment.post_id' => $id
                )
            ));

            $this->set('comentarios', $comentarios);


        

            $this->loadModel('Curtida');
            $check = $this->Curtida->find('first' , array(
                'conditions' => array(
                    'post_id' => $id,
                    'user_id' => $this->Auth->user('id')
                )
                ));
                // $check2 = $this->Curtida->findByPostIdAndUserId($id, $this->Auth->user('id'));
                // pr($check2);
                $this->set('check', $check);

                $contlike = $this->Curtida->find('all', array(
                    'conditions' => array(
                        'Curtida.post_id' => $id
                    )
                ));

                $this->set('contlike', $contlike);        
          
        }
        public function add() {
            $this->layout = 'admin';
            if(AuthComponent::user('role') != 1 && AuthComponent::user('role') != 2){
                throw new UnauthorizedException("Sem permissão para acessar está pagina");
        }            
        
            if ($this->request->is('post') || $this->request->is('put')) {            
                
                $this->request->data['Post']['created_by'] = AuthComponent::user('id');
                $this->request->data['Post']['first_name'] = AuthComponent::user('first_name');
                $this->request->data['Post']['last_name'] = AuthComponent::user('last_name');
                $this->Post->create();
                $filename = basename($this->request->data['Post']['image']['name']);
                $this->request->data['Post']['imagem'] = $filename;

                if($this->request->data['Post']['image']['error'] == 0)
                    if ($this->Post->save($this->request->data)) { 
                        move_uploaded_file($this->data['Post']['image']['tmp_name'], WWW_ROOT . DS . 'img' . DS . 'uploads' . DS . $filename);
                        $this->Flash->success('Seu post foi salvo');
                        $this->redirect(array('action' => 'index'));
                }
                $this->Flash->error('Erro ao adicionar post');
            }
                
            
        }

        public function edit($id = null) {
            $this->layout = "admin";
            $post = $this->Post->findById($id);

            if(!$this->Post->exists($id)){
                throw new NotFoundException("Post não existe");
            }


            if($post['Post']['created_by'] != AuthComponent::user('id')  && AuthComponent::user('role') != 1){
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
        public function delete($id) {
            if(!$this->Post->exists($id)){
                throw new NotFoundException("Post não existe");
            }
            $post = $this->Post->findById($id);
            if($post['Post']['created_by'] != AuthComponent::user('id') && AuthComponent::user('role') != 1){
                throw new UnauthorizedException("Sem permissão para acessar está pagina");
        }            
            
            $objeto = array(
                'id' => $id,
                'status' => '0'
            );
            $this->Post->save($objeto);
            $this->redirect(array('controller' => 'posts', 'action' => 'allposts'));
        }
        public function comentar() {
            $this->loadModel('User');
            $teste = $this->User->find('first', array(
                'conditions' => array(
                    'id' => $this->Auth->user('id')),
                    'fields' => array(
                        'imagem'
                    )
                    
                )
            );

            $this->loadModel('Comment');
            if($this->request->is('Post') || $this->request-is('put')) {
                $this->request->data['Comment']['created_by'] = AuthComponent::user('id');
                $this->request->data['Comment']['first_name'] = AuthComponent::user('first_name');
                $this->request->data['Comment']['last_name'] = AuthComponent::user('last_name');
                $this->request->data['Comment']['created'] = AuthComponent::user('created');
                $this->request->data['Comment']['imagem'] = $teste['User']['imagem'];
                $this->Comment->create();
            if($this->Comment->save($this->request->data)) {
                $this->redirect(array('controller' => 'posts', 'action' => 'view', $this->request->data['Comment']['post_id']));
            }
    
        }   
        }

        public function deleteComment($id = null) {  
            $this->loadModel('Comment');
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
        $coment = $this->Comment->findById($id);
        if(AuthComponent::user('id') != $coment['Comment']['created_by'] && AuthComponent::user('role') != 1 && AuthComponent::user('id') != $busca['Post']['created_by']){
            throw new UnauthorizedException("Sem permissão para deletar esté comentario");
        }
        if ($this->Comment->delete($id)) {
            $this->Flash->success('Comentário deletado com sucesso');
                $this->redirect(array('controller' => 'posts', 'action' => 'view', $busca['Post']['id']));
            } else {
            $this->Flash->error("Não foi possivel deletar o comentario");
            }
    }
        public function separarCategoria ($categoria) {
            $this->layout = 'layoutindex';
         $post = $this->Post->find('all', array(
                'conditions' => array(
                    'categoria' => $categoria
                ),
                'order' => array('Post.id' => 'desc')
         ));
            $this->set('posts', $post);        
        }   
        public function allPosts() {
            $this->layout = 'admin';
            $conditions = array(
                'Post.status' => 1,
            );

            if(AuthComponent::user('role') != 1) {
                $conditions['Post.created_by'] = AuthComponent::user('id') ;
            }

            $post = $this->Post->find('all',array(
            'conditions' => array(
                'Post.status' => 1,
                'Post.created_by' => $this->Auth->user('id')
            ),
            'order' => array('Post.id' => 'desc')

            )
        
            );

            $this->set('posts', $post);
            
            $check = $this->Post->find('all', array(
                'conditions' => array(
                    'created_by' => AuthComponent::user("id")
                )
                ));
            $check = $this->set("contPost", $post);    
                
            $this->loadModel('Curtida');

       

    }    
     
        public function enjoyPost($id) {
            $this->loadModel('Curtida');
            $this->loadModel('Curtida');
            $check = $this->Curtida->find('first' , array(
                'conditions' => array(
                    'post_id' => $id,
                    'user_id' => $this->Auth->user('id')
                )
                ));
                
                $this->set('check', $check);
                     
                if(!empty($check))  {
                    $this->Flash->error('Você já curtiu esse post');
                }   else {
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
            
        
        public function like() {
            $this->layout = "admin";
            $this->loadModel('Curtida');
            $curtida = $this->Curtida->find('all', array(
                'conditions' => array(
                    'user_id' => AuthComponent::user('id')
                ),
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
                    )
                )
            ));
            $this->set('curtida', $curtida);
            $cont_like = $this->Curtida->find('all', array(
                'conditions' => array(
                    'user_id' => $this->Auth->user('id')
                )
            ));
            $this->set('cont_like', $cont_like);
            $post = $this->Post->find('all');
            $this->set('posts', $post);
        }
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
                )
            );
            
              if($check) {
                    $this->Curtida->delete($id);
                    $this->redirect(array('controller' => 'posts', 'action' => 'view', $check['Post']['id']));
                
    }
            $this->set('check', $check);
    }
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
                )
            );
            
              if($check) {
                    $this->Curtida->delete($id);
                    $this->redirect(array('controller' => 'posts', 'action' => 'like'));
                
    }
            $this->set('check', $check);
    }

    public function teste() {
        $this->layout = "admin";
    }
}
