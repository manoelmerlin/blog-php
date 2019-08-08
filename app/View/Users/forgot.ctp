<center><h3>Recuperar senha</h3></center>

    <?= $this->Form->Create('User'); ?>

        <div class='my-1'>
            <?php echo $this->Form->input('email', array('label' => '', 'placeholder' => 'Digite o email ',  'class' => 'form-control p-1  border border-rounded', 'style' => 'width: 300px' )); ?>
        </div>

        <div class='my-1'>
            <?= $this->Form->input('word_key', array('label' => '', 'placeholder' => 'Palavra chave',  'class' => 'form-control p-1 border border-rounded', 'style' => 'width: 300px' )); ?>
        </div>

        <div class="my-1">
            <?php echo $this->Form->input('password', array('label' => '', 'placeholder' => 'Insira sua senha',  'class' => 'form-control p-1 border border-rounded', 'style' => 'width: 300px' )); ?>
        </div>

        <div class="my-1">
            <?php echo $this->Form->input('confirm_password', array('label' => '' , 'placeholder' => 'Confirme sua senha ', 'class' => 'form-control p-1 border border-rounded', 'style' => 'width: 300px','type' => 'password')); ?> 
        </div>
        
        <div class="my-5">
            <?php echo $this->Form->submit('Recuperar senha', array('controller' => 'users','action' => 'forgot','class' => 'form-control bg-primary text-light border border-primary border-solid ', 'style' => 'width:180px; height:40px')) ;?>
        </div>

        <div>
            <?php $this->Form->end(); ?>
        </div>
