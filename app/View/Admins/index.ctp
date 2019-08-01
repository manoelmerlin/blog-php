
<h3>Bem vindo ao painel do Administador <?php pr(AuthComponent::user('first_name')); ?></h3>
<div class="mr-5">
    <div class="mr-5">
        <div class="float-right mr-5 border p-5">
            <?php echo $this->Html->link('Adicionar foto', array('controller' => 'users', 'action' => 'profileimage')) ?>
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


