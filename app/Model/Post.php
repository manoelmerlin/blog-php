<?php
    
    App::uses('User', 'Model');


    Class Post extends AppModel{
        public $name = 'Post';

        public function allProjects() {
            $userModel = new User();
            $users = $userModel->find('all');
            return $users;
        }


        public $validate = array('title' => array('rule' => 'notBlank'), 'body' => array('rule' => 'notBlank')
        
        );

    }

