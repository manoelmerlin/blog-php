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
		<div id="header" class= "" style="background-color:#191919;">
            <div class='border p-2'>
               
                <div class="row m-0">
					
					<div class="">
						<?= $this->Html->link('About', array('controller' => 'posts', 'action' => 'index'), array(
								'class' => 'text-muted ml-5', 'style' => 'font-size: 14px; font-family:encode sans expanded,sans-serif;')); ?>
					</div>
					<div class="">
						<?= $this->Html->link('Advertise ', array('controller' => 'posts', 'action' => 'index'), array(
								'class' => 'text-muted ml-3', 'style' => 'font-size: 14px;')); ?>		
					</div>
					<div class="">
						<?= $this->Html->link('Submit press release ', array('controller' => 'posts', 'action' => 'index'), array(
								'class' => 'text-muted ml-3', 'style' => 'font-size: 14px;')); ?>		
					</div>
					<div class="">
						<?= $this->Html->link('Contact ', array('controller' => 'posts', 'action' => 'index'), array(
								'class' => 'text-muted ml-3', 'style' => 'font-size: 14px;')); ?>		
					</div>
					
					<div class="" style="width:800px">
						<?php echo $this->Html->image('FB_icon.png', array('alt' => 'logo', 'style' => 'width:20px;', 'class' => 'float-right' )); ?>
						<?php echo $this->Html->image('FB_icon.png', array('alt' => 'logo', 'style' => 'width:20px;', 'class' => 'float-right' )); ?>
						<?php echo $this->Html->image('FB_icon.png', array('alt' => 'logo', 'style' => 'width:20px;', 'class' => 'float-right' )); ?>
						<?php echo $this->Html->image('FB_icon.png', array('alt' => 'logo', 'style' => 'width:20px;', 'class' => 'float-right' )); ?>
								
					</div>

					</div>
						
					</div>
					
				</div>
                   
            </div>    

		</div>
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
