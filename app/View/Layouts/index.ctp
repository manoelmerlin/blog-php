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
	<div id="container">
		<div id="header">
        <html>
    <head>
        <link rel="stylesheet" href= "css/estilo.css">
        <link rel="stylesheet" href= "css/bootstrap.css">
    </head>

   
    <body>
        
    <header>

    <div class="border border-dark p-4" style="background-color: #262626">
        <div>
            <div>
            <a style="float:left" href="?pagina=home"><img src= "imagens/imga.png" title = "Logo" alt = "logo" width ="120px 50px"heigh = 500px></a>

                <center>
                <div id="topo">
                    <a class="text-light mr-5" style="text-decoration:none; font-size:30px" href="?pg=pagina" >Home</a>
                    <a class="text-light mr-5" style="text-decoration:none; font-size:30px" href="?pg=eventos" >Eventos</a>
                    <a class="text-light mr-5" style="text-decoration:none; font-size:30px" href="#" >Usuarios</a>
                </div>
                </center>

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