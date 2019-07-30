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
                    'id' => $id

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
          
        }

        public function add() {
            $this->layout = 'admin';


            if(AuthComponent::user('role') != 1 && AuthComponent::user('role') != 2){
                throw new UnauthorizedException("Sem permissão para acessar está pagina");
        }            
        
            if ($this->request->is('post') || $this->request->is('put')) {            

                $this->request->data['Post']['created_by'] = AuthComponent::user('id');
                $this->request->data['Post']['first_name'] = AuthComponent::user('first_name');


                $this->Post->create();
                $filename = basename($this->request->data['Post']['image']['name']);
                $this->request->data['Post']['imagem'] = $filename;

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
            if(!$this->Post->exists($id)){
                throw new NotFoundException("Post não existe");
            }
            $post = $this->Post->findById($id);
            if(AuthComponent::user('id') != $post['Post']['created_by'] && AuthComponent::user('role') != 1){
                    throw new UnauthorizedException("Sem permissão para acessar está pagina");
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->Post->id = $id;
                    if ($this->Post->save($this->request->data)) {
                        $this->Flash->success('Postagem atualizada com sucesso');
                        return $this->redirect(array('action' => 'index'));
                }
                $this->Flash->error("Erro ao atualizar postagem");
            }
                $this->request->data = $post;
                
            
            $this->set("post", $post);    
            
                
        }


        public function delete($id) {

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
            $this->loadModel('Comment');
            if($this->request->is('Post') || $this->request-is('put')) {
                $this->request->data['Comment']['created_by'] = AuthComponent::user('id');
                $this->request->data['Comment']['first_name'] = AuthComponent::user('first_name');
                 $this->request->data['Comment']['first_name'] = AuthComponent::user('first_name');

                $this->request->data['Comment']['created'] = AuthComponent::user('created');

                $this->Comment->create();

            if($this->Comment->save($this->request->data)) {
                $this->redirect(array('controller' => 'posts', 'action' => 'view', $this->request->data['Comment']['post_id']));
            }
    
        }   

        }


        public function separarCategoria ($categoria) {
            $this->layout = 'layoutindex';

         $post = $this->Post->find('all', array(
                'conditions' => array(
                    'categoria' => $categoria
                )
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
        'conditions' => $conditions
        ));

        $this->set('posts', $post);

        $check = $this->Post->find('all', array(
            'conditions' => array(
                'created_by' => AuthComponent::user("id")
            )
            ));
        $check = $this->set("contPost", $post);    


    }    
     



    }
