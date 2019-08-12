<div class="float-right">
    <?php if(AuthComponent::user()): ?>
        <?php if(empty($check)): ?>
            <?php echo $this->Html->link("Favoritos", array('controller' => 'posts', 'action' => 'enjoyPost', $post['Post']['id']), array(
				'style' => 'text-decoration:none;', 'class' => 'btn btn-success'
			)); ?>

        <?php else: ?>
                <?php echo $this->Html->link("Remover Favoritos", array('controller' => 'posts', 'action' => 'unlike', $check['Curtida']['id']), array(
					'style' => 'text-decoration:none;', 'class' => 'btn btn-danger'
				)); ?>
								<?php endif; ?>
				<?php endif; ?>

</div>

<div class="my-5">

</div>

<div class="my-2mx-auto" style="">
	<b style="font-size:30px" class="col-6 px-2"><?= $post['Post']['title'];?></b>
</div>

<div class=" p-2 row m-0 border-bottom">
	<div class="my-2 col-1 p-1  ">
		<?php echo $this->Html->link($this->Html->image('../img/profilepic/' . $post['User']['imagem'], array('alt' => 'Brownies', 'class' => 'w-100 rounded')), array('controller' => 'users', 'action' => 'viewprofile', $post['Post']['created_by']), array('escapeTitle' => false, 'title' => 'Profile pic'
		));?>
	</div>

	<div class="col-2 my-2 p-2">
		<?php echo $this->Html->link($post['User']['first_name'] . " " . $post['User']['last_name'], array('controller' => 'users', 'action' => 'viewprofile', $post['Post']['created_by']), array('class' => "my-1 ml-3", 'style' => 'text-decoration:none;')); ?>
	</div>
</div>

<div class='ml-5'>
</div>

<div class='col'>
	<p class=""><?php echo $post['Post']['body']?></p>
</div>

<div>
	<div class=" p-2">
		<div class= "p-2">

		</div>

	</div>
	<h5> Post criado em :
		<?php echo $this->Time->format($post['Post']['created'], '%d/%m/%Y as %T');?></h5>
		<h4 class="text-right text-success">Curtidas: <?php echo count($contlike); ?></h4>
	</h5>

</div>

<div class='mt-5 border-top text-center'>
		<h5 class="m-0 mt-5">Deixe seu comentario</h5>
</div>

<?php if(AuthComponent::user()): ?>
	<?php echo $this->Form->create('Comment', array('controller' => 'posts', 'url' => 'comentar')); ?>
	<div class="my-3">
		<?php echo $this->Form->textarea('body_commit', array('placeholder' => 'Insira seu comentário ...', 'label' => 'Comentário :', 'class' => 'form-control p-3', 'rows' => 5)); ?>
	</div>
	<?php echo $this->Form->hidden('post_id', array('value' => $post['Post']['id'])); ?>

	<div class="col-12 p-0 text-right" >
		<?php echo $this->Form->submit('Comentar', array('class' => 'btn btn-success text-light')); ?>
	</div>
	<?php echo $this->Form->end(); ?>

<?php endif; ?>
<div class="my-3  p-0">
	<h5 class='text-success'>
		<?php echo count($comentarios) . ' Comentários'; ?>
	</h5>
</div>
        <?php foreach ($comentarios as $a): ?>
            <div class='p-2 my-4 border-bottom area-comment'>
                <div class="my-3">
                    <div class="row m-0 ">

						<div class="col p-2">
							<div class="row m-0">

								<!-- Image -->
								<div class="col-1 p-0">
									<?php echo $this->Html->link($this->Html->image('../img/profilepic/' . $a['User']['imagem'], array('alt' => 'Brownies', 'class' => 'w-100 rounded ')), array('controller' => 'users', 'action' => 'viewprofile', $a['Comment']['created_by']), array('escapeTitle' => false, 'title' => 'Profile pic'));?>
								</div>

								<div class="col">
									<div class="row m-0">

										<!-- name -->
										<div class="col-12 p-0">
											<h6 class="mb-0" style=""><?php echo $this->Html->link($a['Comment']['first_name'] . " " . $a['Comment']['last_name'], array('controller' => 'users', 'action' => 'viewprofile', $a['Comment']['created_by']), array('class' => 'text-decoration-none text-dark')); ?>
										</div>

										<!-- data -->
										<div class="col-12 p-0">
											<small class="text-secondary">
												<?= $this->Time->format($a['Comment']['modified'], '%d/%m/%Y as %T' ); ?>
											</small>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Options -->
						<div class="col-1 text-right p-0">
							<div class="dropdown">
								<div class="btn-group">
									<button type="button" class="btn btn-options rounded px-2 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<div class="col-12 p-0 m-0 my-auto">
											<p class="m-0 align-self-center p-0">...</p>
										</div>
									</button>
									<div class="dropdown-menu">
									<?php echo $this->Html->link('Denunciar', array('controller' => 'posts', 'action' => 'reportComment', $a['Comment']['id']), array(
											'class' => 'dropdown-item')); ?>
									<?php if(AuthComponent::user('id') != $a['Comment']['created_by'] && AuthComponent::user() != 1 && $post['Post']['created_by'] != AuthComponent::user('id') && AuthComponent::user('role') != 1): ?>
									<?php else: ?>
										<?php echo $this->Html->link('Deletar comentário', array('controller' => 'posts', 'action' => 'deletecomment', $a['Comment']['id']), array(
											'class' => 'dropdown-item')); ?>
									<?php endif; ?>

									</div>
								</div>
							</div>
						</div>

						<!-- Description -->
						<div class="col-12 p-2">
							<?= h($a['Comment']['body_commit']); ?>
						</div>
					</div>
                </div>
            <div>

                        <div class=" float-right">

                        </div>
                    </div>
                </div>

								<?php endforeach;
