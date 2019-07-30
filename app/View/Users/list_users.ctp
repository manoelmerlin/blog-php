<center>
<h1>Selecione a postagem que você deseja editar</h1>
  <div class="my-3">

  </div>
 <table class=" ">

    <tr>

        <th class="border p-1">ID</th>    
        <th class="border p-1">Nome</th>    
        <th class="border p-1">email</th>    
        <th class="border p-1">Permissão</th>
        <th class="border p-1">Promover para administrador</th>
        <th class="border ">Promover membro</th>
        <th class="border p-1">Revogar cargo</th>

        
    </tr>




    <?php foreach ($users as $user): ?>

     <tr class="">
            <td class='border p-1'>
                <?= $user['User']['id'] ?>
            </td>

            <td class="border p-1">
                <?= $user['User']['first_name']; echo $user['User']['last_name']; ?>
            </td>
                <td class="border p-1">
                <?= $user['User']['email'];  ?>
             <td class="border p-1">
                 <?php if($user['User']['role'] == 1){
                        echo 'Administrador';
                     }elseif($user['User']['role'] == 2){
                        echo 'Moderador';
                     }else{
                         echo 'Membro';
                     }
                    ?>
             </td> 
             <td class="border p-1">
                    <?= $this->Html->link('Tornar usuário administrador', array('controller' => 'users', 'action' => 'promoteUser', $user['User']['id'])); ?>
             </td>

             <td class="border p-1">
                    <?= $this->Html->link('Tornar usúario autor', array('controller' => 'users', 'action' => 'setPermission', $user['User']['id'])); ?>
             </td>

             <td class="border p-1">
                    <?= $this->Html->link('Revogar cargo', array('controller' => 'users', 'action' => 'cancelPermission', $user['User']['id'])); ?>
             </td>
             
      </tr>

    
    <?php endforeach; ?>

            </table>


            </center>        

