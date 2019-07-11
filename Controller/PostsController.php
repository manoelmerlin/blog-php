<?php
    class PostsController extends AppController {
        
       

        function index() {
            $this->set('posts', $this->Post->find('all'));
            $users = $this->Post->allProjects();
            $this->set('users', $users);
        }

        public function index_posts() {
            
        }

        public function view($id = null) {
           $this->set('post', $this->Post->findById($id)); 

        }

        public function add() {
            if ($this->request->is('post')){
                if ($this->Post->save($this->request->data)) {
                    $this->Flash->success('Seu post foi salvo');
                    $this->redirect(array('action' => 'index'));
                }
            }
        }

        public function edit($id = null) {
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
            if(!$this->request->is('post')) {
                throw new MethodNotAllowedException();
            }
            if($this->Post->delete($id)) {
                $this->Flash->success('O post ' . $id . 'Foi deletado');
                $this->redirect(array('action' => 'index'));
            }
        }

        

    }
