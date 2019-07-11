<h1>Cadastro</h1>



<?php foreach($Usuarios as $usuario){
    echo $usuario['Usuario']['nome'];
}

?>

<?php


    echo $this->Form->create('Usuario');
    echo $this->Form->input('nome');
    echo $this->Form->input('usuario');
    echo $this->Form->password('senha');
    echo $this->Form->submit('Enviar');
    echo $this->Form->end();
?>


