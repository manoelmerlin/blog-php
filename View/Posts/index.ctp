<h1>Posts do blog</h1>
<?php echo $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add')); ?>
<h4>Bem vindo <?php

    pr(AuthComponent::user('username'));

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
        <?php endforeach ?>

        <?php echo $this->Html->link('logout', array('controller' => 'Users', 'action' => 'logout')); ?>

</table>        



