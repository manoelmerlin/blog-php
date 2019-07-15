<center><h1>Adicionar Post</h1></center>

    <form id="form" action="">
  <?php
    echo $this->Form->create('Post');
  ?>
  
    <center>
    <div style="font-size:25px">
   <?php echo $this->Form->input('Titulo'); ?>
    </div>
    <div>
   <?php echo $this->Form->input('Conteúdo', array('rows' => '3')); ?>
    <div>

    <div>
   <?php echo $this->Form->end('Criar postagem'); ?>
    </div>

    </center>

    </form>



    