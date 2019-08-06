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

	<script src="//cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

    <div id="container" class='p-0'>
		<div class="row m-0 p-0" >
			
			<div class='col-12 bg-info' style="";>
				<div class='row m-0'>


					<div class='col-4'>
					<?php echo "<h1 class='text-light'>" . 'Seja bem vindo ' . AuthComponent::user('first_name')  . "<h1>"; ?>

					</div>
					<div class='col-1 '>
					
					</div>
					<div class='col-3'>
					</div>
					<div class='my-3 col-1  '>
						<?= $this->Html->link('Home', array('controller' => 'posts', 'action' => 'index'), array(
									'class' => 'my-2 ml-5 my-3 btn btn-primary p-1 border border-primary')); ?>	
					</div>
					<div class='my-4 col-1 '>
						<?= $this->Html->link('Painel', array('controller' => 'users', 'action' => 'view', AuthComponent::user("id")), array(
									'class' => 'my-2 ml-5 btn btn-primary p-1 border border-primary')); ?>
					</div>

						
					<div class='my-3 col-1  '>
						<?= $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'), array(
									'class' => 'my-2 ml-5 my-3 btn btn-primary p-1 border border-primary')); ?>
						
					</div>
					

				</div>
            </div>
            
           

            <div class='col p-4'>
                <?php echo $this->Flash->render(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>






			<div class='' style="height:800px">
               
			<div class="border border-success bg-success col-12">			
			<a class="text-light col-2 ml-2" style="font-size:30px; text-decoration:none;" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="">Postagens</a>
			</div>	
			<div class="row">
			<div class="col">
				<div class="collapse multi-collapse accordion" id="multiCollapseExample1">
				<div class=" ">
					<div>
						<?php if(AuthComponent::user('role') == 1 || AuthComponent::user('role') == 2): ?>		
							<?php echo $this->Html->link('Adicionar Post', array('controller' => 'posts', 'action' => 'add'), array('class' => 'ml-5 text-dark', 'style' => 'text-decoration:none;')); ?> <br>
						<?php echo $this->Html->link('Minhas postagens', array('controller' => 'posts', 'action' => 'allposts'), array('class' => '')); ?> <br>
						<?php endif; ?>	

						<?php echo $this->Html->link('Postagens favoritas', array('controller' => 'posts', 'action' => 'like')); ?>
						
					</div>
				</div>
				</div>
			
			</div>
			</div>

			<?php if(AuthComponent::user('role') == 1): ?>
				<div class="accordion border" id="accordionExample">
				<div class="card">
					<div class=" bg-dark" id="headingOne">
					<h5 class="mb-0 ">
						<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="multiCollapseExample1">
							Permissões
						</button>
					</h5>
					</div>

					<div id="collapseOne" class="collapse multi-collapse accordion" aria-labelledby="headingOne" data-parent="#accordionExample">
					<div class="bg-dark">
						<?php echo $this->Html->link('Gerenciar permissões', array('controller' => 'users', 'action' => 'listUsers')); ?> <br>
					</div>
					</div>
				
				</div>
				</div>				
						<?php endif; ?>
						
				<div class='col-12 border p-2'>
					<?= $this->Html->link('Minha conta', array('controller' => 'users', 'action' => 'view', AuthComponent::user('id'))); ?>
				</div>	
				<div class='col-12 border p-2'>
					<?= $this->Html->link('Perfil', array('controller' => 'users', 'action' => 'viewprofile', AuthComponent::user('id'))); ?>
				</div>	

			</div>
			

        </div>
        
		<div id="footer" class="">

<div class="p-3 " style="background-color:#191919;" class="col-12">
<div class="row m-0">

	<p style="width:300px;"> </p>	<p style="font-size:30px;" class="ml-5">BLOG</p>  <p style="color:yellow; font-size:30px;">MANOEL </p> <p style="font-size:30px;" class="text-light"> - Todos os direitos reservados©.</p>	
					</div>

					
	<div class=" row m-0">			
		<div class="border-right my-2 col-2 color:white;">
			<p class="text-light">O blog do Manoel foi desenvolvido no intuito de aprendizagem da linguagem php usando o framework cakePHP na versão 2.x  <?php echo "<br><br>" ?>
				Copyright ©2019 Todos direitos reservados</p>
		</div>
	

		<div class="ml-2 ">
		<?php foreach($categories as $category): ?>
						<h5><?= $this->Html->link($category, array('controller' => 'posts', 'action' => 'separarCategoria', $category), array('style' => 'color:yellow; text-decoration:none; font-size:21px;', 'class' => "ml-3" )) . '<br/>'; ?></h5>
					<?php endforeach; ?>
		</div>	

		<div>
		</div>			
		
		

		

	</div>		
		<div class="border-top p-1 my-2 row m-0 col-12" style="background-color:#191919;">
			<?= $this->Html->link('Terms & condition ', array('controller' => 'posts', 'action' => 'index'), array(
							'class' => 'text-muted ml-3', 'style' => 'font-size: 14px;')); ?>
			<?= $this->Html->link('Privacy policy ', array('controller' => 'posts', 'action' => 'index'), array(
							'class' => 'text-muted ml-3', 'style' => 'font-size: 14px;')); ?>
			<?= $this->Html->link('Jobs advertising', array('controller' => 'posts', 'action' => 'index'), array(
							'class' => 'text-muted ml-3', 'style' => 'font-size: 14px;')); ?>
			<?= $this->Html->link('Contact us ', array('controller' => 'posts', 'action' => 'index'), array(
							'class' => 'text-muted ml-3', 'style' => 'font-size: 14px;')); ?>	

				<div style="width:700px"></div>
			<?php echo $this->Html->link($this->Html->image('twitter.png', array('alt' => 'Brownies', 'style' => 'width:30px; height:20px;', 'class' => 'float-right my-1 ml-1')),'https://www.google.com.br/', array('escapeTitle' => false, 'title' => 'twitter"'));?>				
			<?php echo $this->Html->link($this->Html->image('Facebook-logo-2.png', array('alt' => 'Brownies', 'style' => 'width:30px; height:20px;', 'class' => 'float-right my-1 ml-1')),'https://www.facebook.com/', array('escapeTitle' => false, 'title' => 'facebook'));?>				
			<?php echo $this->Html->link($this->Html->image('instagram-icone-icon-2.png', array('alt' => 'Brownies', 'style' => 'width:30px; height:20px;', 'class' => 'float-right my-1 ml-1 ')),'https://www.instagram.com/', array('escapeTitle' => false, 'title' => 'instagram'));?>					

														
		</div>

		

	</div>

	</div>
		</div>
	</div>

	<!-- Debug sql -->
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>

