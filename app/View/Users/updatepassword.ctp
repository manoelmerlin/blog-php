
<h1>Atualizar senha</h1>

<div class="col-6 bg-white border border-dark shadow border p-1 ">
    <div>
        <?php echo $this->Form->create('User'); ?>

         <div class="my-1">
            <?php echo $this->Form->input('password', array('label' => '', 'placeholder' => 'Insira sua senha',  'class' => 'form-control p-1 border border-rounded', 'style' => 'width: 300px' )); ?>
        </div>

        <div class="my-1">
            <?php echo $this->Form->input('confirm_password', array('label' => '' , 'placeholder' => 'Confirme sua senha ', 'class' => 'form-control p-1 border border-rounded', 'style' => 'width: 300px','type' => 'password')); ?> 
        </div>

        <div> 
            <?php echo $this->Form->submit('Atualizar senha', array('controller' => 'users','action' => 'updatepassword',AuthComponent::user('id'), 'class' => 'my-3  mt-4 form-control bg-primary text-light border border-primary border-solid ', 'style' => 'width:180px; height:40px')) ;?>
        </div>

        <div>
           <?php  $this->Form->end(); ?>
        </div>
    
</div>