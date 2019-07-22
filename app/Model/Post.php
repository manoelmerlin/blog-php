<?php
    
    App::uses('User', 'Model');


    Class Post extends AppModel{
        public $name = 'Post';

        public $validate = array('title' => array('rule' => 'notBlank'), 'body' => array('rule' => 'notBlank')
        
        );

    }

