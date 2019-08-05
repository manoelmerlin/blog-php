<center>

<h2 class="">Sobre mim... </h2>

<?php 
    echo $this->Form->create('User');
    echo $this->Form->input('about_me', array('style' => 'width:400px', 'label' => '', 'type' => 'textarea', 'rows' => '10', 'class' => 'my-3', 'placeholder' => 'Escreva um pequeno texto sobre você para ser exibido em seu perfil para outros usuários...'));
    echo $this->Form->submit('Enviar', array('style' => 'text-decoration:none; width: 150px', 'controller' => 'Users', 'action' => 'aboutme', 'class' => 'my-2 border border-success btn-success'));
    $this->Form->end();

    ?>
    </center>