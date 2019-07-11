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
<body >
	<div id="container">
		<div id="header">
		</div>
		<center>
		<div class="users form my-5">
			<div class="border p-5">
				<div class="col-6 shadow-none border p-5 my-5">
					<div class="my-3">
					<?php echo $this->Form->input('username', array('label' => 'Usuário : ', 'class' => 'p-1', 'style' => 'width: 499px' )); ?>
					</div>

					<div class="my-3">
						<?php echo $this->Form->input('password', array('label' => ' Senha  :' , 'class' => 'ml-2 p-1', 'style' => 'width: 500px')); ?> 
					</div>

					<div>
				       <?php echo $this->Html->link('Esqueceu a senha?', array('controller' => 'Users', 'action' => 'forgot')); ?>

					</div>

					<div class="my-3">
						<?php echo $this->Form->submit('Enviar', array('class' => 'bg-success text-light border border-success border-solid ml-5', 'style' => 'width:110px;')) ;?>
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