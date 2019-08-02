
<h3>Bem vindo ao painel do Administador <?php pr(AuthComponent::user('first_name')); ?></h3>
<div class="">
    <div class="">
        <div class="float-right mr-5 p-5">
            
        <div class="float-right mr-5 border" style="width:300px; height:200px; background-color: rgba(0,0,0,0.25); background-image: url(../../img/profilepic/<?= $check["User"]["imagem"] ?>); background-repeat: no-repeat; background-size: 100% 100%;">
        </div>
        <div>
            <?php if(AuthComponent::user('id') == $check['User']['id']): ?>
                <?php echo $this->Html->link('Editar o adicionar imagem de perfil', array('controller' => 'users', 'action' => 'profileimage')); ?>
            <?php endif; ?>
        </div>



        </div>
    </div>
    <h5>Informações da conta</h5>
</div>
<?php echo 'Nome: '; echo(AuthComponent::user('first_name'));?> <br> <br> 
<?php echo "Usuário: "; echo (AuthComponent::user('username')); ?>	 <br> <br> 
<?php echo "email : "; echo (AuthComponent::user('email')); ?>	<br> <br> 
<?php echo "Telefone : "; echo (AuthComponent::user('phone')); ?>	<br><br>  
<?php echo "senha : "; echo "******************" ?>	<br><br> 
<?php echo $this->Html->link('Atualizar ou editar dados', array('controller' => 'users', 'action' => 'editUser'));?>


