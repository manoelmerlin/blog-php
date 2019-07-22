<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */


?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array(
			'estilo', 
			'bootstrap'
		));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div class="row m-0 p-0">

			<div class='col-12 bg-dark p-2'>
				<div class='row m-0'>
					<div class='col ml-5'>
						<?php echo $this->Html->image('imga.png', array('alt' => 'logo', 'style' => 'width:150px; ')); ?>
						<?= $this->Html->link('Home', array('controller' => 'users', 'action' => 'add_user'), array(
								'class' => 'ml-5 btn btn-primary p-1 border border-primary', 'style' => ' visibility: hidden')); ?>
						<?php echo "Bem vindo "; echo (AuthComponent::user('first_name')); ?>	
						<?= $this->Html->link('Home', array('controller' => 'posts', 'action' => 'index'), array(
								'class' => 'ml-5 btn btn-primary p-1 border border-primary')); ?>
						<?= $this->Html->link('Noticias', array('controller' => 'users', 'action' => 'add_user'), array(
								'class' => 'dropdown ml-5 btn btn-primary p-1 border border-primary')); ?>					
					</div>
					
					<div class='col-3 text-right py-0  p-3 px-3'>
							<!-- Se o usuário não estiver logado mostrar botão cadastrar e logar -->
						<?php if(!(AuthComponent::user())): ?>
							<?= $this->Html->link('Cadastar-se', array('controller' => 'users', 'action' => 'add_user'), array(
								'class' => 'btn btn-primary p-1 border border-primary')); 
							?>
							<?= $this->Html->link('Logar', array('controller' => 'users', 'action' => 'login'),array(
								'class' => 'btn btn-primary p-1  border border-primary')); 
							?>	

								<?php pr($users) ?>

							<!-- Se o usuário  estiver logado e for administrador mostrar botão painel e logout -->
							<!-- Se o usuário  estiver logado e for usuário comum mostrar somente o botão logout -->
							
							<?php endif ?>


						<?php if(AuthComponent::user()): ?>
							<?= $this->Html->link('Painel', array('controller' => 'admins', 'action' => 'index'), array(
								'class' => 'btn btn-primary p-1 border border-primary')); 	?>

							<?= $this->Html->link('Deslogar', array('controller' => 'users', 'action' => 'logout'),array(
								'class' => 'btn btn-primary p-1 mx-3 border border-primary'
							)); ?>
							
						
						

						<?php endif; ?>
			
					</div>

				</div>
			</div>

		</div>

		<div id="content" class="p-0 m-0">
			<?php echo $this->Flash->render(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		
		</div>
	</div>

	<!-- Debug sql -->
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
