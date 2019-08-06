
<h3>Bem vindo ao painel do Administador <?php pr(AuthComponent::user('first_name')); ?></h3>
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
            <?php echo $this->Html->link("Remover foto de perfil", array('controller' => 'users', 'action' => 'removeprofilepic'), array('class' => 'btn btn-success')); ?>
<?php endif; ?>

        <button type="button" class="my-2 ml-5 btn btn-success"  id="Clique5">Editar imagem de perfil</button> 


<div id="escondido5">
<center>


    <?php 

        echo $this->Form->create('User', array('controller' => 'users', 'url' => 'profileimage', 'type' => 'file'));
        echo $this->Form->file('image'); 
        echo $this->Form->submit("Enviar", array('controller' => 'users', 'action' => 'profileimage'));
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
        <h6>Nome : <?php echo $user['User']['first_name']; echo " "; echo $user['User']['last_name'];?> </h6>
        <h6>Nome de usuário: <?php echo $user['User']['username']; ?></h6>
        <h6>Telefone: <?php echo $user['User']['phone']; ?> </h6> 
        <?php echo $this->Html->link('Atualiza dados', array('controller' => 'users', 'action' => 'edituser', $user['User']['id']), array('class' => 'btn btn-primary')); ?>
        
        <br> <br>

<h6>Email atual : <?php echo $user['User']['email']; ?> </h6> 

<button type="button" class="btn btn-success"  id="Clique4">Editar email</button> 


<div id="escondido4">
<center>


    <?php 

    echo $this->Form->create('User', array('controller' => 'users', 'url' => 'changeemail'));
    echo $this->Form->input('email');
    echo $this->Form->submit('Enviar', array('controller' => 'users', 'action' => 'changeemail'));
    echo $this->Form->end();
     ?>

        </center>


</div>


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

    <br> <br>


<button type="button" class="btn btn-success"  id="Clique1">Editar profissão</button> 

<div id="escondido1">
<center>


    <?php 

    echo $this->Form->create('User', array('controller' => 'users', 'url' => 'changeprofession'));
    echo $this->Form->input('profession');
    echo $this->Form->submit('Enviar', array('controller' => 'users', 'action' => 'changeprofession'));
    echo $this->Form->end();
     ?>

        </center>


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
    <h6>Profissão atual : <?php echo $user['User']['profession']; ?> </h6>

        <br>
   
<button type="button" class="btn btn-success"  id="Clique">Editar sobre mim</button>

<div id="escondido">
<center>

<h2 class="">Sobre mim... </h2>

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
    </style> 
<?php echo "Sobre mim : ";  echo $user['User']['about_me']; ?> 	<br><br>  



<?php echo $this->Html->link('Trocar senha', array('controller' => 'users', 'action' => 'updatepassword', $user['User']['id']), array('class' => 'btn btn-success')); ?>


