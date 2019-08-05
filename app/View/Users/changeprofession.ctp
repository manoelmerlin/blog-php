<?php 

    echo $this->Form->create('User');
    echo $this->Form->input('profession');
    echo $this->Form->submit('Enviar', array('controller' => 'users', 'action' => 'changeprofession'));
    echo $this->Form->end();