<?php

    class UsersController extends AppController {

        public function beforeFilter() {
            parent::beforeFilter();
           $this->Auth->allow('add_user', 'index'); // Permitindo que os usuários se registrem

      

        }




        public $uses = array (
            'Post', 
            'User'
            
        );
        

        public function index() {
            $this->layout='layoutindex';
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
           
            if($this->request->is('post') || $this->request->is('put')) {
               
                $this->User->create();
                if($this->User->save($this->request->data)) {
                    $this->Flash->success(__('O cadastro foi realalizado com sucesso'));
                    return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
                }
                $this->Flash->error(__('Não foi possível realizar o cadastro, tente denovo.')

                );
            }

        }

        public function editUser($id = null){
            $this->User->id = AuthComponent::user('id');
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Usuário invalido'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->User->save($this->request->data)) {
                    $this->Flash->success(__('Senha trocada com sucesso'));
                    return $this->redirect(array('controller' => 'Posts', 'action' => 'index'));
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

     

        public function forgot(){
            
        }
      
        public function deleteAccount($id) {

            $check = $this->User->find('first', array(
                'conditions' => array(
                    'id' => $id
                )
            ));

            if(($check['User']['id'] == AuthComponent::user('id')) && $check['User']['status'] == 1) {
                
                $objeto = array(
                    'id' => $id,
                    'status' => '0'
                );
    
                $this->User->save($objeto);
            }

        }

        public function setPermission($id) {
            $check = $this->User->find('first', array(
                'conditions' => array('id' => $id
                
                )
            ));

            if(AuthComponent::user('role') != 1){
                throw new UnauthorizedException('Você não tem permissão para acessar está página');
            }

           if($check['User']['role'] == 3){

            $salvar = array(
                'id' => $id,
                'role' => 2
            );

            $this->User->save($salvar);
            $this->redirect(array('controller' => 'users', 'action' => 'listUsers'));

           }else {
               $this->Flash->error('Erro');
           }

        }

        public function promoteUser($id) {
            $check = $this->User->find('first', array(
                'conditions' => array('id' => $id
                
                )
            ));

            if(AuthComponent::user('role') != 1){
                throw new UnauthorizedException('Você não tem permissão para acessar está página');
            }

           if($check['User']['role'] == 2){

            $salvar = array(
                'id' => $id,
                'role' => 1
            );

            $this->User->save($salvar);
            $this->redirect(array('controller' => 'users', 'action' => 'listUsers'));

           }else {
               $this->Flash->error('Erro');
           }

        }

        public function cancelPermission($id) {
            $check = $this->User->find('first', array(
                'conditions' => array('id' => $id
                
                )
            ));

            if(AuthComponent::user('role') != 1){
                throw new UnauthorizedException('Você não tem permissão para acessar está página');
            }
            
            if($check['User']['role'] == 2){

                $salvar = array(
                    'id' => $id,
                    'role' => 3
                );
          
                $this->User->save($salvar);
                $this->Flash->success('Cargo revogado para Membro com sucesso');
                $this->redirect(array('controller' => 'users', 'action' => 'listUsers'));
            }    
               if($check['User']['role'] == 1){
                $salvar = array(
                    'id' => $id,
                    'role' => 2
                );
                $this->User->save($salvar);
                $this->Flash->success('Cargo revogado para Moderador com sucesso');
                $this->redirect(array('controller' => 'users', 'action' => 'listUsers'));
               }
               else {
                   $this->Flash->error('Erro');
               }
    

        } 

        public function listUsers() {
            $this->layout = 'admin';
            $this->loadModel('User');

            $user = $this->User->find('all');
            $this->set('users', $user);

        }


        public function myAccount() {
            $this->layout = 'admin';

        }


}
    

       