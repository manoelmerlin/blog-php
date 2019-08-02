<?php 


    class AdminsController extends AppController {

         //Chamada dos model em outro controller.
         public $uses = array (
            'Post', 
            'User'
        );


        public function index() {
            $this->layout = 'admin';


            $id = AuthComponent::user('id');
            $imagem = AuthComponent::user('imagem');


            $check = $this->User->find('first', array(
                'conditions' => array(
                    'id' =>  $id,
                    'imagem' => $imagem
                )    
            ));

            pr($check);

        }


        public function view ($id) {
            $this->layout = 'admin';
            
        }



    }