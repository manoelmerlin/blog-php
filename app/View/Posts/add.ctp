<?php if(AuthComponent::user('role') != 1 && AuthComponent::user('role') != 2): ?>
  <script>window.location.replace('index');</script>
<?php else: ?>
		<center>
			<h1>Adicionar Post</h1>
				<div style="font-size:25px">
					<div>
						<?php echo $this->Form->create('Post', array('type' => 'file')); ?>
					</div>
					<div>
						<?php echo $this->Form->input('title', array('label' => '', 'placeholder' => 'Titulo', 'type' => 'text', 'class' => 'form-control', 'style' => 'width:600px; height:50px')); ?>
					</div>
					<div class="my-3">
						<?php echo $this->Form->input('body', array('required' => true, 'label' => '', 'rows' => '50', 'type' => 'textarea', 'class' => ' p-4')); ?>
					</div>

					<div>
						<?php echo $this->Form->file('image'); ?>
					</div>

					<div class="float-right">
						<?php $options = array('Saúde' => 'Saúde', 'Esporte' => 'Esporte', 'Cultura' => 'Cultura', 'Viagens' => 'Viagens', 'Culinária' => 'Culinária', 'Games' => 'Games', 'Tecnologia' => 'Tecnólogia', 'Carros' => 'Carros', 'Política' => 'Política'); ?>
						<?php echo $this->Form->input('categoria', array('options' => $options, 'empty' => 'Selecione', 'required' => true), array('label' => 'Categoria : ')); ?>
					</div>
					<?= $this->Form->input('created_date', array('type' => 'hidden')); ?>
					<div style="">
						<?php echo $this->Form->submit('Enviar postagem', array('class' => 'text-light form-control my-5 bg-success', 'div' => array('style' => 'width:300px'))); ?>
					</div>
					<div>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
		</center>

  <script>CKEDITOR.replace($('#PostBody').get(0));</script>

<?php endif;
