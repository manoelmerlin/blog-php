<?php if(AuthComponent::user('role') == 1): ?>
    <h3>Bem vindo ao painel do Administador <?php pr(AuthComponent::user('first_name')); ?></h3>
<?php endif; ?>

<?php if(AuthComponent::user('role') == 2): ?>
    <h3>Bem vindo ao painel do Autor </h3> <h3 class="text-danger"><?php pr(AuthComponent::user('first_name')); ?></h3>
<?php endif; ?>

<?php if(AuthComponent::user('role') == 3): ?>
    <h3>Bem vindo ao painel do Usuário <?php pr(AuthComponent::user('first_name')); ?></h3>
<?php endif; ?>

<div class="">
    <div class="">
        <div class="float-right mr-5 p-5">
         <?php if($check['User']['imagem'] == 'capaprofile.jpg'): ?> 
            <div class="float-right mr-5 border" style="border-radius: 50%; width: 200px;  height: 200px; overflow: hidden; position: relative; width:300px; height:200px; background-color: rgba(0,0,0,0.25); background-image: url(../../img/capaprofile.jpg?>); background-repeat: no-repeat; background-size: 100% 100%;">
            </div>
        <?php else: ?>
            <div class="float-right mr-5 border" style="border-radius: 50%; width: 200px;  height: 200px; overflow: hidden; position: relative; width:300px; height:200px; background-color: rgba(0,0,0,0.25); background-image: url(../../img/profilepic/<?= $check["User"]["imagem"] ?>); background-repeat: no-repeat; background-size: 100% 100%;">

         </div>
<?php endif; ?>
        <div>

        <?php if($check['User']['imagem'] != 'capaprofile.jpg'): ?>
            <?php echo $this->Html->link("Remover foto de perfil", array('controller' => 'users', 'action' => 'removeprofilepic'), array('class' => 'btn btn-danger')); ?>
<?php endif; ?>

        <button type="button" class="my-2 ml-5 btn btn-primary"  id="Clique5">Editar imagem de perfil</button> 


<div id="escondido5">
<center>


    <?php 

        echo $this->Form->create('User', array('controller' => 'users', 'url' => 'profileimage', 'type' => 'file'));
        echo $this->Form->file('image'); 
        echo $this->Form->button("Enviar", array('type' => 'submit', 'class' => 'my-3 btn btn-success'));
        echo $this->Form->end();

     ?>

        </center>


</div>


    <script>   
        $("#Clique5" ).click(function() {
            $("#escondido5").toggleClass("d-block");
        });;
    </script> 

    <style>
    #escondido5{
        display:none;
    }
    </style> 

    <br> <br>


            <?php if(AuthComponent::user('id') == $check['User']['id']): ?>
            <?php endif; ?>
        </div>
        </div>
    </div>
    <h5>Informações da conta</h5>
</div>
        <b>Nome : <?php echo h($user['User']['first_name']); echo " "; echo h($user['User']['last_name']);?> </b> <br> 
        <b>Nome de usuário: <?php echo h($user['User']['username']); ?></b> <br>
        <b>Telefone: <?php echo h($user['User']['phone']); ?> </b>  <br> <br>
        <?php echo $this->Html->link('Atualiza dados', array('controller' => 'users', 'action' => 'edituser', $user['User']['id']), array('class' => 'btn btn-primary')); ?> <br>
        
        <br> 

        <b class="d-block mb-2"><?php echo "Email atual :"; ?> <?php echo h($user['User']['email']); ?> </b>

<button type="button" class="btn btn-primary d-block"  id="Clique4">Editar email</button> 


<div id="escondido4" class="mt-4 border col-4 p-3">


    <?php 

    echo $this->Form->create('User', array('controller' => 'users', 'url' => 'changeemail'));
    echo $this->Form->input('email', array('label' => 'Email : ', 'placeholder' => 'Digite seu novo email...', 'class' => 'form-control'));
    echo $this->Form->submit('Atualizar e-mail', array( 'controller' => 'users', 'action' => 'changeemail', 'class' => 'mt-3 form-control bg-success text-light border border-success border-solid w-50', 'style' => ' height:40px'));
    echo $this->Form->end();
     ?>


</div>
    
<br>

<b class=""><?php echo "Profissão atual :"; ?> <?php echo h($user['User']['profession']); ?> </h6></b>


    <script>   
        $("#Clique4" ).click(function() {
            $("#escondido4").toggleClass("d-block");
        });;
    </script> 

    <style>
    #escondido4{
        display:none;
    }
    </style> 


<div class="my-2">


</div>
<button type="button" class="btn btn-primary"  id="Clique1">Editar profissão</button> 

    <div id="escondido1"  class="mt-4 border col-4 p-3">


    <?php echo $this->Form->create('User', array('controller' => 'users', 'url' => 'changeprofession')); ?>
        <?php echo $this->Form->input('profession', array('placeholder' => 'Atualizar profissão', 'label' => 'Profissão  :', 'class' => 'form-control my-3', 'style' => '')); ?>
        <?php echo $this->Form->submit('Atualizar profissão', array('controller' => 'users', 'action' => 'changeprofession', 'class' => 'w-50 form-control bg-success text-light border border-success border-solid ', 'style' => 'width:150px; height:40px')); ?>
        <?php echo $this->Form->end(); ?>

    </div>



    <script>   
        $("#Clique1" ).click(function() {
            $("#escondido1").toggleClass("d-block");
        });;
    </script> 

    <style>
    #escondido1{
        display:none;
    }
    </style> 
    <br>

        <br>

        <b class=""><?php echo "Sobre mim : ";  echo h($user['User']['about_me']); ?></b> 	<br><br>
   
   
<button type="button" class="btn btn-primary"  id="Clique">Editar sobre mim</button>

<div id="escondido">
<center>

    <?php 
    echo $this->Form->create('User', array('controller' => 'users', 'url' => 'aboutme'));
    echo $this->Form->input('about_me', array('style' => 'width:400px', 'label' => '', 'type' => 'textarea', 'rows' => '10', 'class' => 'my-3', 'placeholder' => 'Escreva um pequeno texto sobre você para ser exibido em seu perfil para outros usuários...'));
    echo $this->Form->submit('Enviar', array('style' => 'text-decoration:none; width: 150px', 'controller' => 'Users', 'action' => 'aboutme', 'class' => 'my-2 border border-success btn-success'));
    $this->Form->end();

    ?>
    </center>


</div>


    <script>   
        $("#Clique" ).click(function() {
            $("#escondido").toggleClass("d-block");
        });;
    </script> 

    <style>
    #escondido{
        display:none;
    }
    </style>  <br> <br>



<?php echo $this->Html->link('Trocar senha', array('controller' => 'users', 'action' => 'updatepassword', $user['User']['id']), array('class' => 'btn btn-primary')); ?>



<center> <?php echo $this->Html->link('Deletar conta', array('controller' => 'users', 'action' => 'deleteaccount', $user['User']['id']), array('class' => 'btn btn-danger', 'confirm' => 'Você tem certeza que deseja deletar está postagem?')); ?> </center>
