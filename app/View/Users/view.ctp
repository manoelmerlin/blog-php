<div class="col-12 p-2">
	<div class="row m-0">
		<!-- Imagem de perfil -->
		<div class="col-3  p-0 ">
			<div class="row m-0">
				<div class="col-12">
					<?= $this->Html->image('../img/profilepic/' . $check['User']['imagem'], array('class' => "rounded w-100 ")); ?>
				</div>

				<div class='col-12 mt-4'>

					<button type="button" class="btn btn-primary" id="Clique5">Editar</button>
					<div id="escondido5">
					<center>

					<?= $this->Form->create('User', array('controller' => 'users', 'url' => 'profileimage', 'type' => 'file')); ?>
					<?= $this->Form->file('image');?>
					<?= $this->Form->button("Enviar", array('type' => 'submit', 'class' => 'form-control my-3 btn btn-success'));?>
					<?= $this->Form->end();?>


					</center>

				</div>

				<script>
					$("#Clique5" ).click(function() {$("#escondido5").toggleClass("d-block");});
				</script>
				<style>#escondido5{display:none;}</style>
				<?php if($check['User']['imagem'] !== 'capaprofile.jpg'): ?>
					<?= $this->Html->link("Remover", array('controller' => 'users', 'action' => "removeprofilepic"), array('class' => 'btn btn-danger')); ?>
				<?php endif; ?>
				</div>
			</div>
		</div>

		<!-- Dados -->
		<div class="col-7 p-3 text-primary">
			<div class="row m-0">
				<p style="font-size:20px; font-style:italic;"><?= $check['User']['first_name'] . " " . $check['User']['last_name']; ?></p>
				<div class="ml-5">
					<div class="dropdown">
						<button class="ml-3 btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Ações
						</button>
						<div class="text-dark dropdown-menu" aria-labelledby="dropdownMenuButton">
							<div>
								<?= $this->Html->link("Atualizar dados", array('controller' => 'users', 'action' => 'edit', $check['User']['id']), array('class' => 'p-2 text-dark text-decoration-none')); ?>
							</div>
							<div>
								<?= $this->Html->link('Trocar senha', array('controller' => 'users', 'action' => 'updatepassword', $user['User']['id']), array('class' => 'p-2 text-dark text-decoration-none')); ?>
							</div>
							<div>
								<?= $this->Html->link('Deletar conta', array('controller' => 'users', 'action' => 'deleteaccount', $user['User']['id']), array('class' => 'p-2 text-danger text-decoration-none', 'confirm' => 'Você tem certeza que deseja deletar sua conta?')); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row m-0 ml-2">
				<p class="ml-5 text-muted">Usuário:</p> <p class="ml-2 text-dark"><?= $check['User']['username'] ?></p>

			</div>

			<div class="row m-0 ml-2">
				<p class="ml-5 text-muted">Email:</p> <p class="ml-2 text-dark"><?= $check['User']['email'] ?></p>
			</div>

			<div class="row m-0 ml-2">
				<p class="ml-5 text-muted">Telefone:</p> <p class="ml-2 text-dark"><?= $check['User']['phone'] ?></p>
			</div>

			<div class="row m-0 ml-2">
				<p class="ml-5 text-muted">Profissão:</p> <p class="ml-2 text-dark"><?= $check['User']['profession'] ?></p>
			</div>

			<div class="row m-0 ml-2">
				<p class="ml-5 text-muted">Usuário desde:</p> <p class="ml-2 text-dark"><?= $this->Time->format($check['User']['created'], '%d/%m/%Y'); ?></p>
			</div>


		</div>

	</div>

	<!-- Editar foto de perfil -->
	<hr>
	<!-- About me -->
	<div class="mt-3 col-3  p-2">
		<b style="font-size:26px;">About me</b>
	</div>

		<div class="row m-0">
			<div class="mt-1 p-2 col-10">
				<?= $check['User']['about_me']; ?>
			</div>
		</div>
</div>

