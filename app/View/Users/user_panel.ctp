
<center>
<h1>Bem vindo ao painel do administrador <?php pr(AuthComponent::user('first_name')); ?></h1>
</center>


    <h4>Informações de conta</h4>

    <?php 
        
        echo "Função : "; pr(AuthComponent::user('role'));
        echo "Usuário : "; pr(AuthComponent::user('username'));
        echo "email : ";  ; pr(AuthComponent::user('email'));
        echo "Telefone : "; pr(AuthComponent::user('phone'));
        echo "Senha : "; echo "*************"; echo "<br>"; echo "<br>";
        echo $this->Html->link('trocar senha', array('controller' => 'Users', 'action' => 'editUser'));
    
    
    
    
    ?> 