
<center><h3 class="">Bem vindo ao perfil do <?php echo $check['User']['first_name']; echo " "; echo $check['User']['last_name']; ?></h3></center>
    <div class="my-5">

    </div>
<div class="">
    <div class="">
        <div class="float-right mr-5 p-5">
            
        
        <div>
            
        </div>


        </div>
    </div>
</div>
        <div class="row m-0">
        <div class="float-right ml-5 border" style="border-radius: 50%; width: 200px;  height: 200px; overflow: hidden; position: relative; background-image: url(../../img/profilepic/<?= $check["User"]["imagem"] ?>); background-repeat: no-repeat; background-size: 100% 100%;">
        </div>        <div>
          <h6 class="ml-4 my-4"><?php echo $check['User']['first_name']; echo " "; echo $check['User']['last_name']; ?></h6>
          <h6 class="ml-4 my-4"><?php echo 'Membro desde: ';  echo $this->Time->format($check['User']['created'], '%d/%m/%Y');  ?></h6>
          <h6 class="ml-4 my-4">Profissão: <?php echo $check['User']['profession']; ?></h6>
          <h6 class="ml-4 my-4">Total de posts: <?php echo count($count_post); ?></h6>
          <h6 class="ml-4 my-4">Post comentados: <?php echo count($count_comments); ?></h6>
        </div>
       
        <div class=" ml-5">
        <h6 class=" my-4">Sobre mim :  <?php echo h($check['User']['about_me']); ?></h6>  

        </div>

        </div>


