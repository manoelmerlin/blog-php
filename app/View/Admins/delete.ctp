<?php if(AuthComponent::user('id') != 1 && AuthComponent::user('role') !=2): ?>

  <script>window.location.replace('index');</script>

<?php else: ?>

  <center>
  <h4>Selecione a postagem que você deseja editar</h1>
    <div class="my-5">

    </div>
  <table class="border p-2">

      <tr>

          <th class="border p-1">Img</th>    
          <th class="border p-1">Título</th>
          <th class="border p-1">Categoria</th>        
          <th>Data de Criação</th>
          <th class="border p-1">Deletar</th>    

          
      </tr>




      <?php foreach ($posts as $post): ?>

          <tr class="border p-1">
              <td>
            <?php   echo '<div class="col-12 border p-3" style="background-image:  url(../../../../img/uploads/'.$post["Post"]["imagem"].'); background-repeat: no-repeat; background-size: 100% 100%;" >'; ?>

              </td>

              <td class="border p-1">
                      <?php echo $this->Html->link($post['Post']['title'],
                          array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
              </td>

              <td>
                <?php echo $post['Post']['categoria']; ?>
              </td>

              <td class="border p1"><?php echo $post['Post']['created']; ?></td>
              <td><?php echo $this->Html->link('Deletar', array
                            ('controller' => 'posts', 'action' => 'delete', $post['Post']['id']), array
                            ('confirm' => 'quer mesmo deletar?'));?>


    
      </tr>

      
      <?php endforeach; ?>


              </table>


  <?php endif; ?>

              </center>        

