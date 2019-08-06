<?php

    class UsersController extends AppController {

        public function beforeFilter() {
            parent::beforeFilter();
           $this->Auth->allow('add_user', 'index'); // Permitindo que os usuários se registrem

        }

        public $uses = array(
            'Post', 
            'User'
            
        );
        

        public function index() {
            $this->layout='layoutindex';
        }

        public function view($id = null) {
            $this->layout = 'admin';
            $this->User->id = $id;
        
            if(!$this->User->exists()) {
                throw new NotFoundException('Usuario invalido');
            }
            $this->set('user', $this->User->findById($id));

            if($this->Auth->user('id') != $id)  {
                throw new UnauthorizedException('Acesso negado');
                $this->redirect(array('controller' => 'users', 'action' => 'view', $this->Auth->user('id')));
            }

            $check = $this->User->find('first', array(
                'conditions' => array(
                    'User.id' => $id),
                    'fields' => array(
                        'id',
                        'imagem',
                        'first_name',
                        'last_name',
                        'email',
                        'phone',
                        'username'
                    )
                )
            );

            $this->set('check', $check);

            
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
                    return $this->redirect(array('controller' => 'Posts', 'action' => 'index'));
                }
                $this->Flash->error('Falha ao atualizar dados tente novamente');
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

            if($this->Auth->user("role") != 1 ) {
                throw new UnauthorizedException("Você não tem permissão para acessar está pagina");
            }

            $this->loadModel('User');

            $user = $this->User->find('all');
            $this->set('users', $user);

        }


        public function myAccount() {
            $this->layout = 'admin';

        }

        public function profileImage() {
            $this->layout = "admin";
            if($this->request->is('post')) {
                $this->User->id = $this->Auth->user('id');
                $filename = basename($this->request->data['User']['image']['name']);
                $this->request->data['User']['imagem'] = $filename;
               
                if($this->request->data['User']['image']['error'] == 0) {
                    if ($this->User->save($this->request->data)) { 
                        move_uploaded_file($this->data['User']['image']['tmp_name'], WWW_ROOT . DS . 'img' . DS . 'profilepic' . DS . $filename);
                        $this->Flash->success('Sua imagem foi salva com sucesso');
                        $this->redirect(array('controller' => 'users', 'action' => 'view', $this->Auth->user('id')));

                }
            } 
                
                $this->Flash->error('Erro ao adicionar imagem tente adicionar outra imagem');
            }
        }

        public function viewProfile ($id) {
            $this->layout = "admin";

            $this->loadModel('Post');
            $count_post = $this->Post->find('all', array(
                'conditions' => array(
                    'Post.created_by' => $id
                )
            ));

            $this->set('count_post', $count_post);
            
            $this->loadModel('Comment');

            $count_comments = $this->Comment->find('all', array(
                'conditions' => array(
                    'Comment.created_by' => $id
                )
            ));

            $this->set('count_comments', $count_comments);
            

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
       
        public function aboutMe () {
            $this->layout = "admin";


            $this->User->id = $this->Auth->user('id');
            if($this->request->is('post') || $this->request->is('put')) {
                if($this->User->save($this->request->data)) {
                    $this->Flash->success("Sucesso");
                    $this->redirect(array('controller' => 'users', 'action' => 'view', $this->Auth->user('id')));

                }   
            }


        }

        public function changeProfession () {
            $this->layout = "admin";
            
            $this->User->id = $this->Auth->user('id');
            if($this->request->is('post') || $this->request->is('put')) {
                if($this->User->save($this->request->data)) {
                    $this->Flash->success("Profissão inserida / Alterada com sucesso");
                    $this->redirect(array('controller' => 'users', 'action' => 'view', $this->Auth->user('id')));

                }
            }


        }


        public function changePhone () {
            $this->layout = 'admin';

            $this->User->id = $this->Auth->user('id');
            if($this->request->is('post') || $this->request->is('put')) {
                if($this->User->save($this->request->data)) {
                    $this->Flash->success("Telefone alterado com sucesso");
                    $this->redirect(array('controller' => 'users', 'action' => 'view', $this->Auth->user('id')));

                }
            }
        }

        public function changeEmail() {
            $this->layout = 'admin';

            $this->User->id = $this->Auth->user('id');
            if($this->request->is('post') || $this->request->is('put')) {
                if($this->User->save($this->request->data)) {
                    $this->Flash->success("Telefone alterado com sucesso");
                    $this->redirect(array('controller' => 'users', 'action' => 'view', $this->Auth->user('id')));

                }
            }
            
        }

        public function removeProfilePic () {
            $this->layout = 'admin';

            $check = $this->User->find('first', array(
                'conditions' => array(
                    'id' => $this->Auth->user('id')
                )
            ));
            if($this->Auth->user('id') != $check['User']['id']) {
                throw new UnauthorizedException("Você não tem permissão para fazer isto !");
            }

           

            $save = array (
                'imagem' => 'capaprofile.jpg'
            );



            if($check) {
                
                $this->User->id = $this->Auth->user('id');
                $this->User->save($save);
                $this->Flash->success('Foto removida com sucesso');
                $this->redirect(array('controller' => 'users', 'action' => 'view', $this->Auth->user("id")));
            }    
        }

        public function updatePassword ($id) {
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
                    return $this->redirect(array('controller' => 'Posts', 'action' => 'index'));
                }
                $this->Flash->error('Falha ao atualizar dados tente novamente');
            } else {
                $this->request->data = $this->User->findById($id);
                unset($this->request->data['User']['password']);
                
            }


        }


}
    

       