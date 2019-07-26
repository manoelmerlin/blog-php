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
        <th class="border ">Tornar adm</th>

        
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
                 <?= $user['User']['role'] ?>
             </td> 

             <td class="border p-1">
                    <?= $this->Html->link('Tornar adm', array('controller' => 'users', 'action' => 'setPermission', $user['User']['id'])); ?>
             </td>

            <td>
      </tr>

    
    <?php endforeach; ?>

            </table>


            </center>        

