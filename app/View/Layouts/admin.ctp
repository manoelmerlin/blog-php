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
		<div class="row m-0 p-0">
			
			<div class='col-12 bg-white shadow p-2'>
				<div class='row m-0'>
				<?= $this->Html->link('Home', array('controller' => 'posts', 'action' => 'index'), array(
								'class' => 'ml-5 btn btn-primary p-1 border border-primary')); ?>
					<div class='col-2 border p-2'></div>
					<div class='col-5 border p-2'></div>
					<div class='col-2 border p-2'>
						<div> <?= "a"; ?></div>
					</div>
				</div>
            </div>
            
           

            <div class='col p-4'>
                <?php echo $this->Flash->render(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>






			<div class='col-2 bg-dark p-2'>
                <div class='col-12 border p-2'>
					<?echo $this->Html->link('Adicionar Post', array('controller' => 'posts', 'action' => 'add')); ?>
				</div>
							<p>
			<a class="border p-2" style="width:100%" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Minhas postagens</a>
			</p>
			<div class="row">
			<div class="col">
				<div class="collapse multi-collapse" id="multiCollapseExample1">
				<div class=" ">
					<div>
						<?echo $this->Html->link('Minhas postagens', array('Controller' => 'admins', 'action' => 'view')); ?>
						<?echo $this->Html->link('Editar postagens'); ?>

					</div>

				</div>
				</div>
			
			</div>
			</div>

				<div class='col-12 border p-2'>
					<?echo $this->Html->link('Minhas postagens', array('Controller' => 'admins', 'action' => 'view')); ?>
				</div>
				<div class='col-12 border p-2'>
					<?echo $this->Html->link('Editar postagens'); ?>
				</div>
				<div class='col-12 border p-2'>
					<?echo $this->Html->link('Permissões', array('controller' => 'admins', 'action' => 'permission')); ?>
				</div>
				<div class='col-12 border p-2'>
					<?echo $this->Html->link('Minhas postagens', array('Controller' => 'admins', 'action' => 'view')); ?>
				</div>
				<div class='col-12 border p-2'>
					<?echo $this->Html->link('aaaaa'); ?>
				</div>
				<div class='col-12 border p-2'>
					<?echo $this->Html->link('aaaaa'); ?>
                </div>
               

            </div>

        </div>
        


		<div id="footer" class='bg-success  p-2'>
            <div class='row m-0 border p-2'>
				
			<div class='col-2 border p-2'>
					

					</div>
				<div class='col-2 border p-2'>
					

				</div>

            </div>
		</div>
	</div>

	<!-- Debug sql -->
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
