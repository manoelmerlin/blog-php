<center><h1>Adicionar Post</h1></center>

  
    <center>
    <div style="font-size:25px">



      <?php echo $this->Form->create('Post', array('type' => 'file')); ?>
     
       <?php echo $this->Form->input('title', array('label' => '', 'placeholder' => 'Titulo', 'type' => 'text', 'class' => '', 'style' => 'width:600px')); ?>
    
      <div class="my-3">
      <?php echo $this->Form->input('body', array('label' => '', 'style' => 'width:1200px; height:200px','rows' => '10', 'type' => 'textarea', 'class' => ' p-4')); ?>
      </div>
      <?php echo $this->Form->file('image'); ?>
      <?php 

        $options = array('Saúde' => 'Saúde', 'Esporte' => 'Esporte', 'Cultura' => 'Cultura', 'Viagens' => 'Viagens', 'Culinária' => 'Culinária');
      
      echo $this->Form->select('categoria', $options, array('label' => 'categoria')); ?>

    <?php 

    echo "Deseja marcar a noticia como destaque ? ";

    
      $options = array(1 => 'Sim', 2 => 'Não');
      $selected = array(1, 2);
      echo $this->Form->input('Post.destaque', array('multiple' => 'checkbox', 'options' => $options, 'selected' => $selected));
    

    ?>

      <?php echo $this->Form->submit('Enviar'); ?>

    <?php echo $this->Form->end(); ?>
    

    </center>

    </form>

  <script>CKEDITOR.replace($('#PostBody').get(0));</script>