
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
</head>

<body>
	<div id="container">
    <div id="header" class= "" style="background-color:#191919;">
            <div class='p-3'>
               
                <div class="row m-0">
					<div class="ml-5">
				
					</div>
					
					<div id="menu" class="ml-3">
						
						<?= $this->Html->link('About', array('controller' => 'posts', 'action' => 'index'), array(
							'class' => 'text-muted ml-5', 'style' => 'text-decoration:none; focus:color:red; font-size: 12px; font-family:encode sans expanded,sans-serif; hover: color:red;')); ?>
					</div>
					<div class="">
						<?= $this->Html->link('Advertise ', array('controller' => 'posts', 'action' => 'index'), array(
								'class' => 'text-muted ml-3', 'style' => 'text-decoration:none; font-size: 14px;')); ?>		
					</div>
					<div class="">
						<?= $this->Html->link('Submit press release ', array('controller' => 'posts', 'action' => 'index'), array(
								'class' => 'text-muted ml-3', 'style' => 'text-decoration:none; font-size: 14px;')); ?>		
					</div>
					<div class="">
						<?= $this->Html->link('Contact ', array('controller' => 'posts', 'action' => 'index'), array(
								'class' => 'text-muted ml-3', 'style' => 'text-decoration:none; font-size: 14px;')); ?>		
					</div>
					
					
					<div class="float-right" style="width:800px">
					<?php if(!(AuthComponent::user())): ?>
							<?= $this->Html->link('Cadastar-se', array('controller' => 'users', 'action' => 'add_user'), array(
								'class' => 'btn btn-primary p-1 border border-primary float-right')); 
							?>
							<?= $this->Html->link('Logar', array('controller' => 'users', 'action' => 'login'),array(
								'class' => 'mr-3 btn btn-primary p-1  border border-primary float-right')); 
							?>	


							<!-- Se o usuário  estiver logado e for administrador mostrar botão painel e logout -->
							<!-- Se o usuário  estiver logado e for usuário comum mostrar somente o botão logout -->
							
							<?php endif ?>


						<?php if(AuthComponent::user()): ?>
						<?= $this->Html->link('Deslogar', array('controller' => 'users', 'action' => 'logout'),array(
								'class' => 'btn btn-primary p-1 mx-3 border border-primary float-right'
							)); ?>

						<?= $this->Html->link('Painel', array('controller' => 'admins', 'action' => 'index'), array(
								'class' => 'btn btn-primary p-1 border border-primary float-right')); 	?>
						

						<?php endif; ?>
					</div>

					
					</div>
						
					</div>
					
				</div>

			<div class="my-3">
            <div class="row m-0">

					

<p style="margin:0px 35px;"> </p>	<p style="font-size:30px;" class="ml-5">NEWS</p>   <p style="color:yellow; font-size:30px;">BIT</p>	
                
    <div class="" style="width:1000px">
       
       
       
		
		<div class="row m-0">
			<div class="col-2"></div>
			<div class="col">
				<?= $this->Html->link('HOME', array('controller' => 'posts', 'action' => 'index'), array(
				   'class' => 'mr-5 float-right my-3', 'style' => 'font-weight: bold; font-size: 14px; color:black; text-decoration:none; font-family: encode sans expanded,sans-serif;')); ?> 
			</div>

			<div class="col">
				<?= $this->Html->link('EXPLAINED', array('controller' => 'posts', 'action' => 'index'), array(
            	'class' => 'mr-5 float-right my-3', 'style' => 'font-weight: bold; font-size: 14px; color:black; text-decoration:none; font-family: encode sans expanded,sans-serif;')); ?>
			</div>

			<div class="col">
				<?= $this->Html->link('EVENTS', array('controller' => 'font-weight: bold; posts', 'action' => 'index'), array(
            	'class' => 'mr-5 float-right my-3', 'style' => 'font-weight: bold; font-size: 14px; color:black; text-decoration:none; font-family: encode sans expanded,sans-serif;')); ?>
			</div>

			<div class="col">
				<div class="dropdown">
					<button class="btn mt-2 dropdown-toggle text-uppercase" style="font-weight: bold; font-size: 14px; color:black; text-decoration:none; font-family: encode sans expanded,sans-serif;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						GUIDES & ANALITICS
					</button>
					<div class="dropdown-menu p-3"  aria-labelledby="dropdownMenuButton">
						<?= $this->Html->link('Posts', array('controller' => 'posts', 'action' => 'index')); ?>
						<a class="dropdown-item" href="#">Another action</a>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</div>
			</div>

			<div class="col">
				<?= $this->Html->link('NEWS', array('controller' => 'posts', 'action' => 'index'), array(
           		'class' => 'mr-5 float-right my-3', 'style' => 'font-weight: bold; font-size: 14px; color:black; text-decoration:none; font-family: encode sans expanded,sans-serif;')); ?>

			</div>

		</div>

		
	
        
    </div>
    
</div>
</div>		       
        </div>    

        <div class="my-5">

        </div>


	<div id="content" class="">

		<div class="row m-0">
			<div class="col p-3 ">
				<?php echo $this->Flash->render(); ?>
				<?php echo $this->fetch('content'); ?>	
			</div>
			

			<div class="col-2 border-left p-5">

					<h4>Destaques</h1>
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

	<!-- Debug sql -->
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>