<!DOCTYPE html>
<html>
<head>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/1580feb638.js"></script>
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

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


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

						<?= $this->Html->link('Painel', array('controller' => 'users', 'action' => 'view', AuthComponent::user("id")), array(
								'class' => 'btn btn-primary p-1 border border-primary float-right')); 	?>
						

						<?php endif; ?>
					</div>

					
					</div>
						
					</div>
					
				</div>

			<div class="my-3">
            <div class="row m-0">

					

<p style="margin:0px 35px;"> </p>	<p style="font-size:30px;" class="ml-5">Blog</p>   <p style="color:yellow; font-size:30px;">Manoel</p>	
                
    <div class="" style="width:1000px">
       
       
       
		
		<div class="row m-0">
			<div class="col-2"></div>
			
			
			<div class="col-6">
				<?= $this->Html->link('HOME', array('controller' => 'posts', 'action' => 'index'), array(
				   'class' => 'mr-5 float-right my-3', 'style' => 'font-weight: bold; font-size: 14px; color:black; text-decoration:none; font-family: encode sans expanded,sans-serif;')); ?> 
			</div>


			<div class="col">
				<div class="dropdown">
					<button class="btn mt-2 dropdown-toggle text-uppercase" style="font-weight: bold; font-size: 14px; color:black; text-decoration:none; font-family: encode sans expanded,sans-serif;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Categorias
					</button>
					<div class=" dropdown-menu p-3"  aria-labelledby="dropdownMenuButton">
						<?php foreach($categories as $category): ?>
							<h5><?= $this->Html->link($category, array('controller' => 'posts', 'action' => 'separarCategoria', $category), array('style' => 'text-decoration:none; font-size:20px;', 'class' => "text-dark" )) . '<br/>'; ?></h5>
						<?php endforeach; ?>
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

		<div class="row m-0 ">
			<div class="col">
				<?php echo $this->Flash->render(); ?>
				<?php echo $this->fetch('content'); ?>	

			</div>

			<div class="my-5">

			</div>
			
			<div class="col-3 border-left" style="">
				<h1>Destaques</h1>		
    
        
        <div id="noticias  " class="">
            <div class="row m-0 ">
        <?php foreach( $postl as $post ): ?>
         <div class="col p-2 ">

        <div class="col border p-0" style=" background-color: rgba(0,0,0,0.25); background-image:  url(../../img/uploads/<?= $post["Post"]["imagem"] ?>); background-repeat: no-repeat; background-size: 100% 100%;" >
        
            <div class="mt-3 mb-3 mt-sm-5 mb-sm-5 mt-md-5 mb-md-5 mt-lg-5 mb-lg-5 mt-xl-5 mb-xl-5" style=''>
               <p style = "background-color: rgba(0,0,0,0.10);" class="f20 text-truncate"><?php echo $this->Html->link($post['Post']['title'],array('controller' => 'posts',
                    'action' => 'view', $post['Post']['id']), array('class' => 'col text-light', 'style' => ' text-decoration:none;')); echo '</p><br>'; ?>  </h6> 
            </div>    
              
            <div>
                <div class="my-2"></div>
            <div class="row m-0 text-light border  col-12" style="background-color: rgba(0,0,0,0.5); font-size:20px">  
               <h6 style="font-size:20px" class="my-2 mr-2"> <?php echo  $this->Html->link($post['Post']['categoria'], array('controller' => 'posts', 'action' => 'separarCategoria', $post['Post']['categoria']), array('class' => 'text-light', 'style' => ' text-decoration:none;')); ?> </h6>
            
            <div class="border-left ">
                <div class="my-2">
                    <h6 class='text-light' style="font-size:20px;"><?php  echo $this->Time->format($post['Post']['created'], '%d/%m/%Y'); ?></h5>

                </div>
                
            </div>
                
                <div class="border-left ">
                  <?php  echo $this->Html->link('<i class="my-2 ml-4 far fa-heart"></i>', array('controller' => 'posts', 'action' => 'enjoypost', $post['Post']['id']), array('escapeTitle' => false)); ?>
                </div>
            </div>     
                
           
               
            </div> 
            <br>
                </div>
                </div>
        
            
            <?php endforeach; ?>
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