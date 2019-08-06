<?php
    
    App::uses('User', 'Model');


    Class Post extends AppModel{
        public $name = 'Post';
        public $actsAs = array('Containable');

        public $belongsTo = array(
            'User' => array(
                'className' => 'User',
                'foreignKey' => 'created_by',
            )
        );

        public $hasMany = array(
            'Comment',
            'Curtida'
        );

        public $validate = array('title' => array('rule' => 'notBlank'), 'body' => array('rule' => 'notBlank')
        
        );

    }

