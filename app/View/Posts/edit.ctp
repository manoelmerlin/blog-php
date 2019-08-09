<center>
	<h1>Editar post</h1>

	<div style="font-size:25px">
		<div>
			<?php echo $this->Form->create('Post'); ?>
		</div>

		<div>
			<?php echo $this->Form->input('title', array('label' => '', 'placeholder' => 'Titulo', 'type' => 'text', 'class' => '', 'style' => 'width:600px')); ?>
		</div>

		<div class="my-3">
			<?php echo $this->Form->input('body', array('label' => '', 'style' => 'width:300px; height:200px', 'rows' => '10', 'type' => 'textarea', 'class' => ' p-4')); ?>
		</div>

		<div>
			<?php echo $this->Form->file('image'); ?>
		</div>

		<div>
			<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
		</div>

		<div>
			<?php $options = array('Saúde' => 'Saúde', 'Esporte' => 'Esporte', 'Cultura' => 'Cultura', 'Viagens' => 'Viagens', 'Culinária' => 'Culinária'); ?>
			<?php echo $this->Form->select('categoria', $options, array('label' => 'categoria')); ?>
		</div>

		<div>
			<?php echo $this->Form->submit('Enviar', array('controller' => 'posts', 'action' => 'edit')); ?>
		</div>

		<div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>

</center>

		<script>CKEDITOR.replace($('#PostBody').get(0));</script>