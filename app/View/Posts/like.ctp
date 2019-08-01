<center>
<h1>Postagens favoritas</h1>
  <div class="my-3">

  </div>
 <table class="border p-2">

    <tr>

        <th class="border p-1">Img</th>    
        <th class="border p-1">Título</th>    
        <th class="border p-1">Categória</th>
        <th>Favoritada em </th>
        <th class="border p-2">Remover dos favoritos</th>
     

        
    </tr>

      
    <?php foreach ($curtida as $c): ?>
    
     <tr class="border p-1">
            <td>
                <?php echo 'a';?>
            </td>

            <td class="border p-1">
                <?php echo $this->Html->link($c['Post']['title'], array('controller' => 'posts', 'action' => 'view', $c['Post']['id'])); ?>
            </td>
            <td>
                <?php echo $this->Html->link($c['Post']['categoria'], array('controller' => 'posts', 'action' => 'separarCategoria', $c['Post']['categoria'])); ?>
            </td>
            <td class="border">
                <center><?php echo $this->Time->format($c['Curtida']['created'], '%d/%m/%Y'); ?></center>
             </td> 
            <td>
                <?php echo $this->Html->link("Remover dos favoritos", array('controller' => 'posts', 'action' => 'unlike', $c['Curtida']['id'])); ?>
            </td> 

        </tr>

    
    <?php endforeach; ?>

            </table>


            </center>        

