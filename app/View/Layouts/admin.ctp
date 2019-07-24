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
						<?= $this->Html->link('Painel', array('controller' => 'posts', 'action' => 'index'), array(
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






			<div class='col-2 bg-dark p-2' style="height:500px">
                <div class='col-12 border p-2'>
					<?echo $this->Html->link('Adicionar Post', array('controller' => 'posts', 'action' => 'add')); ?>
				</div>
			<div class="border p-2">			
			<a class=" " style="" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="">Postagens</a>
			</div>	
			<div class="row">
			<div class="col">
				<div class="collapse multi-collapse accordion" id="multiCollapseExample1">
				<div class=" ">
					<div>
						<?php echo $this->Html->link('Minhas postagens', array('controller' => 'admins', 'action' => 'view'), array('class' => '')); ?>
						<?php echo $this->Html->link('Postagens favoritas', array('controller' => '', 'action' => '')); ?>
	
					</div>
				</div>
				</div>
			
			</div>
			</div>

				<div class=''>
				<div class="accordion" id="accordionExample">
				<div class="card">
					<div class=" bg-dark" id="headingOne">
					<h5 class="mb-0 ">
						<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="multiCollapseExample1">
							Ações
						</button>
					</h5>
					</div>

					<div id="collapseOne" class="collapse multi-collapse accordion" aria-labelledby="headingOne" data-parent="#accordionExample">
					<div class="bg-dark">
						<?php echo $this->Html->link('Editar postagens', array('controller' => 'admins', 'action' => 'acoes')); ?> <br>
						<?php echo $this->Html->link('Deletar postagens', array('controller' => 'admins', 'action' => 'delete')); ?>
					</div>
					</div>
				
				</div>
				</div>				
			</div>

			<div class="border">
				<div class="" id="headingThree">
				<h5 class="mb-0">
					<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						Permissões
					</button>
				</h5>
				</div>
				<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
					<div class="">
						<?php echo $this->Html->link('Listar usuários', array('controller' => 'admins', 'action' => 'listUsers')); ?> <br>
						<?php echo $this->Html->link('Gerenciar', array('controller' => 'admins', 'action' => 'permission')); ?>
					</div>
				</div>
			</div>
			
			<div class='col-12 border p-2'>
					<?echo $this->Html->link('Minha conta', array('controller' => 'admins', 'action' => 'myAccount')); ?>
				</div>
		
			</div>
			

        </div>
        

		<div id="footer">

<div class="p-3" style="background-color:#191919">
<div class="row m-0">

	<p style="margin:0px 0px;"> </p>	<p style="font-size:30px;" class="ml-3">NEWS</p>   <p style="color:yellow; font-size:30px;">BIT</p>	
					</div>
		<div class="col-2 color:white;">
			<p class="text-light">Bit coin is an open-source, peer-to-peer, digital decentralized cryptocurrency. Powered by blockchain technology, its defining characteristic is <?php echo "<br><br>" ?>
				Copyright ©2019 All rights reserved | This template is made with  by Colorlib</p>
		</div>
		<div class="border-top p-1 row m-0">
			<?= $this->Html->link('Terms & condition ', array('controller' => 'posts', 'action' => 'index'), array(
							'class' => 'text-muted ml-3', 'style' => 'font-size: 14px;')); ?>
			<?= $this->Html->link('Privacy policy ', array('controller' => 'posts', 'action' => 'index'), array(
							'class' => 'text-muted ml-3', 'style' => 'font-size: 14px;')); ?>
			<?= $this->Html->link('Jobs advertising', array('controller' => 'posts', 'action' => 'index'), array(
							'class' => 'text-muted ml-3', 'style' => 'font-size: 14px;')); ?>
			<?= $this->Html->link('Contact us ', array('controller' => 'posts', 'action' => 'index'), array(
							'class' => 'text-muted ml-3', 'style' => 'font-size: 14px;')); ?>												
		</div>

	</div>

	</div>

            </div>
		</div>
	</div>

	<!-- Debug sql -->
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>

