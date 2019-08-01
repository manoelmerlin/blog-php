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



    }