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

        public $validate = array(
            'title' => array(
                'between' => array(
                    'rule' => array('lengthBetween', 20, 200),
                    'message' => 'Titúlo deve possuir entre 20 e 200 caracteres'
                )
            ),
            'Body' => array(
                'required' => true
            )
            
        );

    }

