
<center>
<h1>Suas postagens</h1>
 <table class="border p-2">

    <tr>
        <th class="border p-1">Título</th>    
        <th>Data de Criação</th>
        <th class="border p-1">Ações</th>
    </tr>




    <?php foreach ($posts as $post): ?>
    <?php if(AuthComponent::user('id') == $post['Post']['created_by']): ?>

     <tr class="border p-1">
            <td class="border p-1">
                    <?php echo $this->Html->link($post['Post']['title'],
                        array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
            </td>
            <td class="border p1"><?php echo $post['Post']['created']; ?></td>
            <td><?php echo $this->Html->link('Deletar', array
                          ('controller' => 'posts', 'action' => 'delete', $post['Post']['id']), array
                          ('confirm' => 'quer mesmo deletar?'));?>

            <?php echo $this->Html->link('Editar', array('controller' => 'posts', 'action' => 'edit', $post['Post']['id'])); ?>

            <?php endif ?>


    </tr>

    
    <?php endforeach; ?>

            </table>


            </center>        

