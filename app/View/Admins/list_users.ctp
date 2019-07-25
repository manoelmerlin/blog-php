<center>
<h1>Selecione a postagem que você deseja editar</h1>
  <div class="my-3">

  </div>
 <table class="border p-2">

    <tr>

        <th class="border p-1">Img</th>    
        <th class="border p-1">Título</th>    
        <th class="border p-1">Data de Criação</th>
        <th class="border p-1">Editar</th>    

        
    </tr>




    <?php foreach ($users as $user): ?>
       
        <tr>
            <td class='border'><?php echo $user['User']['first_name']; ?></td>
        </tr>

        <tr>
        </tr>
    
    <?php endforeach; ?>

            </table>


            </center>        

