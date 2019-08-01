<?php
    class Curtida extends AppModel {
    public $actsAs = array('Containable');

    public $belongsTo = array(
        'Post'
    );
    }