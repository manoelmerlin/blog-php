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
<body class="bg-success">
	<div id="container">
        
        <div id="header">

            <header class="bg-success py-1 text-right">

			<?php  echo $this->Html->image('imga.png', array('alt' => 'logo', 'style' => 'width:100px', 'class' => ' ml-5 float-left')); ?>

			<center>
				<div class="bg-success py-1" style="">
					<div class="py-5">
						<H1>Bem vindo ao blog do Manoel</H1>
						<H4>Crie sua conta para acessar nosso conteúdo e postagens,</H4>
						<h4>se já possui cadastro acessa agora!</h4>
						<div style ='border p-2'>
							<div></div>
						</div>
					</div>
				</div>
				</center>
				
                
            </header>
					
				<div class ='bg-success col-12 '>
					<center>
						<div class="bg-success row m-0">
							<div class='col-6  px-5 text-right wr-25'>
								<?php echo $this->Html->link('Logar', array('controller' => 'Users', 'action' => 'login'), array('class' => ' bg-primary text-decoration-none border border-primary text-light rounded btn btn-success', 'style' => 'font-size:30px; width:300px; height:65px')); ?>
							</div>

							<div class='col-6  px-5 text-left'>
								<?php echo $this->Html->link('Cadastrar-se', array('controller' => 'Users', 'action' => 'add_user'), array('class' => 'bg-primary border border-primary text-ligh rounded btn btn-success', 'style' => 'text-decoration:none; font-size:30px; width:300px; height:65px')); ?>
							</div>
							<div>
							</div>
						</div>
						</center>	
					</div>
				</div>
			

        
    
		<div id="content" class='bg-success py-4'>
			<?php echo $this->Flash->render(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        

		<div id="footer" class='py-4 bg-success'>
		
        </div>
        
	</div>

	<!-- Debug sql -->
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
