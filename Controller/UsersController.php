<?php

    class UsersController extends AppController {

        public function index() {
            $this->layout='index';
            $this->set('users', $this->User->Find('all'));
            $this->User->recursive= 0;
            $this->set('users', $this->paginate());
        }

        public function view($id = null) {
            $this->User->id = $id;
            if(!$this->User->exists()) {
                throw new NotFoundException(_('Usuario invalido'));
            }
            $this->set('user', $this->User->findById($id));
        }

        public function add_user() {
            $this->layout = 'add_user';
            if($this->request->is('post')) {
                $this->User->create();
                if($this->User->Save($this->request->data)) {
                    $this->Flash->success(__('O cadastro foi realalizado com sucesso'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Flash->error(__('Não foi possível realizar o cadastro, tente denovo.')

                );
            }
        }

        public function edit($id = null){
            $this->User->id = $id;
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Usuário invalido'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->User->save($this->request->data)) {
                    $this->Flash->success(__('O usuário foi salvo com sucesso'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Flash->erro(__('O usuário não pode ser salvo, tente outra vez'));
            } else {
                $this->request->data = $this->User->findById($id);
                unset($this->request->data['User']['password']);
                
            }
        }

        public function delete($id = null) {
            $this->request->allowMethod('post');

            $this->User->id = $id;
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Usuário invalido'));

            }

            if ($this->User->Delete()) {
                $this->Flash->success(__('User deleted'));
                return $this->redirect(array('action' => 'index'));
            }

        }


        public function login() {
            $this->layout='login';
            if($this->Auth->user('id')){
                $this->redirect(array('controller' => 'posts', 'action' => 'index'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->Auth->login()) {
                    return $this->redirect($this->Auth->redirectUrl());
                }else{
                    $this->Flash->error(__('Invalid username or password, try again'));
                }
            }
         
        }
          
        public function logout(){
            return $this->redirect($this->Auth->logout());
        }

        public function beforeFilter() {
            $this->Auth->allow(array('login', 'index', 'add_user', 'forgot'));
        }

        public function forgot(){
            
        }
            
    }
    

       