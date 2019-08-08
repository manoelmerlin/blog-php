
<h1>Cadastro de usuário</h1>

<div class="col-6 bg-white border border-dark shadow border p-1 ">
    <div>
     

        <div class='my-1'>
        <?php echo $this->Form->create('User'); ?>
            <?php echo $this->Form->input('first_name', array('label' => '', 'placeholder' => 'Insira seu nome ',  'class' => 'form-control   p-1 border border-rounded', 'style' => 'width: 300px' )); ?>
        </div>

        <div class='my-1'>
            <?php echo $this->Form->input('last_name', array('label' => '', 'placeholder' => 'Insira seu sobrenome ',  'class' => 'form-control p-1 border border-rounded', 'style' => 'width: 300px' )); ?>
        </div>
        <div class='my-1'>
            <?php echo $this->Form->input('email', array('label' => '', 'placeholder' => 'example@example.com.br ',  'class' => 'form-control p-1  border border-rounded', 'style' => 'width: 300px' )); ?>
        </div>
        <div class='my-1'>
            <?php echo $this->Form->input('phone', array('label' => '', 'placeholder' => '0000-0000',  'class' => ' p-1 form-control border border-rounded', 'style' => 'width: 300px')); ?>
        </div>
        <div class='my-1'>
            <?php echo $this->Form->input('username', array('label' => '', 'placeholder' => 'Insira seu usuário ',  'class' => 'form-control p-1 border border-rounded', 'style' => 'width: 300px' )); ?>
        </div>

        <div class='my-1'>
            <?php echo $this->Form->input('word_key', array('label' => '', 'placeholder' => 'Palavra-chave para recuperar senha',  'class' => 'form-control p-1 border border-rounded', 'style' => 'width: 300px' )); ?>
        </div>

        <div class="my-1">
            <?php echo $this->Form->input('password', array('label' => '', 'placeholder' => 'Insira sua senha',  'class' => 'form-control p-1 border border-rounded', 'style' => 'width: 300px' )); ?>
        </div>

        <div class="my-1">
            <?php echo $this->Form->input('confirm_password', array('label' => '' , 'placeholder' => 'Confirme sua senha ', 'class' => 'form-control p-1 border border-rounded', 'style' => 'width: 300px','type' => 'password')); ?> 
        </div>
        

        <div class="my-5">
            <?php echo $this->Form->submit('Cadastrar', array('controller' => 'users','action' => 'add_user','class' => 'form-control bg-primary text-light border border-primary border-solid ', 'style' => 'width:180px; height:40px')) ;?>
        </div>

        <div>
            <?php $this->Form->end(); ?>
        </div>

    </div>
    
</div>