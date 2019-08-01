<?php

    $this->Form->create('User');
    echo $this->Form->file('imagem'); 

    echo $this->Form->submit("Enviar", array('controller' => 'users', 'action' => 'profileImage'));
    $this->Form->end('Enviar');
