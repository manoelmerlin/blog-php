<?php

    echo $this->Form->create('User', array('type' => 'file'));
    echo $this->Form->file('image'); 
    echo $this->Form->submit("Enviar", array('controller' => 'users', 'action' => 'profileImage'));
    $this->Form->end();

