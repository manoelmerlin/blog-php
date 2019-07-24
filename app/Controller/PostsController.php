<?php
    class PostsController extends AppController {

       

        public function beforeFilter() {

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
            $this->layout = 'layoutindex';
           $this->set('post', $this->Post->findById($id)); 

        }

        public function add() {
            $this->layout = 'layoutindex';

            if ($this->request->is('post') || $this->request->is('put')) {            

                $this->request->data['Post']['created_by'] = AuthComponent::user('id');

                $this->Post->create();
                $filename = basename($this->request->data['Post']['image']['name']);
                $this->request->data['Post']['imagem'] = $filename;

            

                if ($this->Post->save($this->request->data)) {
                    move_uploaded_file($this->data['Post']['image']['tmp_name'], WWW_ROOT . DS . 'img' . DS . 'uploads' . DS . $filename);
                   //pr($this->request->data);
                   //die;
                    $this->Flash->success('Seu post foi salvo');
                    $this->redirect(array('action' => 'index'));

                }
                
                $this->Flash->error('Erro ao adicionar post');
            }
        }

        public function edit($id = null) {
            $this->layout = 'layoutindex';

            $this->Post->id = $id;
            
            if($this->request->is('get')){
                $this->request->data = $this->Post->findById($id);
            } else {
                if ($this->Post->save($this->request->data)) {
                    $this->Flash->success('Seu post foi atualizado');
                    $this->redirect(array('action' => 'index'));
                }
            }

        }

        public function delete($id) {

        $check = $this->Post->find('first', array(
            'conditions' => array(
                'id' => $id
            )
        ));
        
        if(($check['Post']['created_by'] == AuthComponent::user('id')) || AuthComponent::user('role') == 1){
            
            $objeto = array(
                'id' => $id,
                'status' => '0'
            );

            $this->Post->save($objeto);
            $this->redirect(array('controller' => 'admins', 'action' => 'acoes'));

        }
        else {

            $this->Flash->error('não tem permissão para deletar');
            $this->redirect(array('action' => 'index'));
        }

          
        }


        public function deletePost() {

        }
        

    }
