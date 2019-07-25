<center><h1>Adicionar Post</h1></center>

  
    <center>
    <div style="font-size:25px">



      <?php echo $this->Form->create('Post', array('type' => 'file')); ?>
     
       <?php echo $this->Form->input('title', array('label' => '', 'placeholder' => 'Titulo', 'type' => 'text', 'class' => '', 'style' => 'width:600px')); ?>
    
      <div class="my-3">
      <?php echo $this->Form->input('body', array('label' => '', 'style' => 'width:300px; height:200px','rows' => '10', 'type' => 'textarea', 'class' => ' p-4')); ?>
      </div>
      <?php echo $this->Form->file('image'); ?>
      <?php $this->Form->input('created_by');  ?>
      <?php echo $this->Form->submit('Enviar'); ?>

    <?php echo $this->Form->end(); ?>
    

    </center>

    </form>

  <script>CKEDITOR.replace($('#PostBody').get(0));</script>