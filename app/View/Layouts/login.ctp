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
<body class="bg-success" >
		<div>
		<?php echo $this->Html->link('Continuar para o site', array('controller' => 'posts', 'action' => 'index')); ?>

		</div>

	<div id="container">
		<div id="header">
		</div>
		<center>
		<div class="users form my-5 bg-success">
			<div class=" p-5">
				<div class="col-6 bg-white border border-dark shadow border p-5 my-5">
					<div class="my-3">
					<?php echo $this->Form->create('User'); ?>
					<?php echo $this->Form->input('username', array('label' => 'Usuário : ', 'placeholder' => 'Insira seu Usuário ',  'class' => 'my-2 p-1 border border-rounded', 'style' => 'width: 300px' )); ?>
					</div>

					<div class="my-3">
						<?php echo $this->Form->input('password', array('label' => ' Senha  :' , 'placeholder' => 'Insira sua senha ', 'class' => 'my-1 ml-2 p-1 border border-rounded', 'style' => 'width: 300px')); ?> 
					</div>

					<div class="my-4">
						<?php echo $this->Form->submit('Entrar', array('class' => 'ml-4 bg-primary text-light border border-primary border-solid ', 'style' => 'width:180px; height:40px')) ;?>
					</div>

					<div>
				       <?php echo $this->Html->link('Esqueceu a senha?', array('controller' => 'Users', 'action' => 'forgot', 'class' => 'm-3')); ?>

					</div>
					
					<div>
						<?php $this->Form->end(); ?>
					</div>

				</div>
					
			</div>

		</div>
		</center>
        
       
        
		<div id="content">

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