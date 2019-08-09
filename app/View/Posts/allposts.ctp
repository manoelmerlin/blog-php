<center>
	<h1>Selecione a postagem que você deseja editar</h1>
		<div class="my-3">

		</div>
	<table class="border p-2">

		<tr>

			<th class="border p-1">Img</th>
			<th class="border p-1">Título</th>
			<th class="border p-1">Categória</th>
			<th class="border p-1">Autor</th>
			<th class="bordder p-1">Data de Criação</th>
			<th class="border p-1">Ações</th>


		</tr>

		<?php if(AuthComponent::user('role') != 1): ?>
			<h4 class="text-success">Total de postagens <?php echo count($contPost); ?> </h4>

		<?php else: ?>
			<h4 class="text-success">Total de postagens <?php echo count($posts); ?> </h4>
		<?php endif; ?>

		<?php foreach ($posts as $post): ?>
			<tr class="border p-1">
					<td>
						<?php echo '<div class=" border p-5" style="background-image:  url(../../../../img/uploads/' . $post["Post"]["imagem"] . '); background-repeat: no-repeat; background-size: 100% 100%;" >'; ?>
					</td>

					<td class="border p-1">
						<?php echo $this->Html->link(substr($post['Post']['title'], 0, 50),
							array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
					</td>

					<td>
						<?php echo $post['Post']['categoria']; ?>
					</td>

					<td class="border ">
						<?php echo $post['Post']['first_name']; ?>
					</td>

					<td class="border p1">
						<?php echo $post['Post']['created']; ?>
					</td>

					<td class="border">
						<?php echo $this->Html->link('Editar', array(
							'controller' => 'posts', 'action' => 'edit', $post['Post']['id']), array('class' => 'm-1')); ?>

						<?php echo $this->Html->link('Deletar', array(
							'controller' => 'posts', 'action' => 'delete', $post['Post']['id']), array(
								'style' => 'text-decoration:none', 'confirm' => 'Você tem certeza que deseja deletar está postagem?')); ?>
				</tr>

		<?php endforeach; ?>

	</table>

</center>

