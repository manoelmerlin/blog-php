<?php

    class Comment extends AppModel {
        
    public $actsAs = array('Containable');


    public $belongsTo = array(
        'Post',
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'created_by',
        )
        
    );
        
    }