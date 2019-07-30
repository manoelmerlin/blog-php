



<center><h1>Editar post</h1></center>

  
    <center>
    <div style="font-size:25px">



      <?php echo $this->Form->create('Post', array('url' => 'edit')); ?>
     
       <?php echo $this->Form->input('title', array('label' => '', 'placeholder' => 'Titulo', 'type' => 'text', 'class' => '', 'style' => 'width:600px')); ?>
    
      <div class="my-3">
      <?php echo $this->Form->input('body', array('label' => '', 'style' => 'width:300px; height:200px','rows' => '10', 'type' => 'textarea', 'class' => ' p-4')); ?>
      </div>
      <?php echo $this->Form->file('image'); ?>
      <?php 
        echo $this->Form->input('id', array('type' => 'hidden'));
        $options = array('Saúde' => 'Saúde', 'Esporte' => 'Esporte', 'Cultura' => 'Cultura', 'Viagens' => 'Viagens', 'Culinária' => 'Culinária');
      
      echo $this->Form->select('categoria', $options, array('label' => 'categoria')); ?>
      <?php echo $this->Form->submit('Enviar', array('controller' => 'posts', 'action' => 'edit')); ?>

    <?php echo $this->Form->end(); ?>
    

    </center>

    </form>

  <script>CKEDITOR.replace($('#PostBody').get(0));</script>

