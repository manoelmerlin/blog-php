<?php

    class Comment extends AppModel {
        
    public $actsAs = array('Containable');

    public $belongsTo = array(
        'Post',
        
    );
        
    }