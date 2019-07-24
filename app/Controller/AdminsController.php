<?php 


    class AdminsController extends AppController {

         //Chamada dos model em outro controller.
         public $uses = array (
            'Post', 
            'User'
        );

       

        public function index() {
            $this->layout = 'admin';

        }
          

        public function edit() {

        }


        public function view() {
           $this->layout = 'layoutindex';

            $this->loadModel('Post');

            $post = $this->Post->find('all');
            $this->set('posts', $post);

        }


        public function myPost($id) {
            $this->layout = 'admin';
            $this->set('post', $this->Post->findById($id)); 

        } 

        public function permission() {
            
        }

        public function acoes() {
            $this->layout = 'admin';
            $this->loadModel('Post', 'User');

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

            $user = $this->User->find('all');
            $this->set('users', $user);

        }


        public function delete() {
            $this->layout = 'admin';
            $this->loadModel('Post', 'User');

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

            $user = $this->User->find('all');
            $this->set('users', $user);

        }

        public function myAccount() {
            $this->layout = 'admin';
            $this->loadModel('Post', 'User');
            
        }

        public function listUsers() {
            $this->layout = 'admin';
            $this->loadModel('User');

            $this->User->find('all');
        }


    }