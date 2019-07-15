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
                    <?php echo $this->Html->link('Sair', array('controller' => 'Users', 'action' => 'logout'), array('class' => 'text-light mr-5', "style" =>"text-decoration:none; font-size:30px;")); ?>

                    
                </div>
                </center>

            </div>

        </div>


<h1>Posts do blog</h1>
<?php echo $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add'), array('style' => 'text-decoration:none;', 'class' => 'border border-danger  btn btn-success')); ?>
<h4>Bem vindo <?php

    pr(AuthComponent::user('first_name'));

?></h4>

<?php  
?>

<table>
    <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Data de criação</th>
        <th>Modificado</th>
    </tr>


    <?php foreach($posts as $post): ?>
        <tr>
            <td><?php echo $post['Post']['id']; ?></td>
            <td>
                <?php echo $this->Html->link($post['Post']['title'],
                array('action' => 'view', $post['Post']['id'])); ?>
            </td>
            <td>
               <?php echo $this->Form->postLink(
                'Delete',
               array('action' => 'delete', $post['Post']['id']),
               array('confirm' => 'Você tem certeza?')
               )?> 
               <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
            </td>
            <td><?php  echo $post['Post']['created']; ?></td>   
        </tr>
    <?php endforeach; ?>


    

        <?php echo $this->Html->link('logout', array('controller' => 'Users', 'action' => 'logout')); ?>
        <?php echo $this->Html->link('Trocar senha', array('controller' => 'Users', 'action' => 'editUser',  AuthComponent::user('id'))); ?>

</table>        

