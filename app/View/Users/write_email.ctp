<center><h3>Recuperar senha</h3></center>

    <?= $this->Form->Create('User'); ?>

	<div class='my-1'>
		<?php echo $this->Form->input('email', array('label' => '', 'placeholder' => 'Digite o email ', 'class' => 'form-control p-1  border border-rounded', 'style' => 'width: 300px' )); ?>
	</div>

	<div class="my-4">
		<?php echo $this->Form->submit('Recuperar senha', array('class' => 'form-control bg-primary text-light border border-primary border-solid ', 'style' => 'width:180px; height:40px')); ?>
	</div>

	<div>
		<?php $this->Form->end(); ?>
	</div>
