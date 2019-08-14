
<h1>Editar dados usuário</h1>

<div class="col-6 bg-white border border-dark shadow border p-1 ">
    <div>

        <div class='my-1'>
			<?php echo $this->Form->create('User'); ?>
				<?php echo $this->Form->input('first_name', array('label' => 'Nome', 'placeholder' => 'Insira seu nome ', 'class' => 'form-control   p-1 border border-rounded', 'style' => 'width: 300px' )); ?>
			</div>

			<div class='my-1'>
				<?php echo $this->Form->input('last_name', array('label' => 'Sobrenome', 'placeholder' => 'Insira seu sobrenome ', 'class' => 'form-control p-1 border border-rounded', 'style' => 'width: 300px' )); ?>
			</div>

			<div class='my-1'>
				<?php echo $this->Form->input('phone', array('label' => 'Telefone', 'placeholder' => '0000-0000', 'class' => ' p-1 form-control border border-rounded', 'style' => 'width: 300px')); ?>
			</div>

			<div class='my-1'>
				<?php echo $this->Form->input('profession', array('label' => 'Profissão', 'placeholder' => '', 'class' => ' p-1 form-control border border-rounded', 'style' => 'width: 300px')); ?>
			</div>

			<div class='my-1'>
				<?php echo $this->Form->input('about_me', array('label' => 'Sobre mim', 'placeholder' => '', 'class' => ' p-1 form-control border border-rounded', 'style' => 'width: 300px')); ?>
			</div>

			<div class="my-5">
				<?php echo $this->Form->submit('Editar dados', array('controller' => 'users', 'action' => 'edit', 'class' => 'form-control bg-primary text-light border border-primary border-solid ', 'style' => 'width:180px; height:40px', 'confirm' => 'Você tem certeza que deseja alterar sua senha?'));?>
			</div>

			<div>
				<?php $this->Form->end(); ?>
			</div>

    </div>

</div>