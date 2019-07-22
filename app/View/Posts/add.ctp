<center><h1>Adicionar Post</h1></center>

  
    <center>
    <div style="font-size:25px">



      <?php echo $this->Form->create('Post', array('type' => 'file')); ?>
      <?php echo $this->Form->input('title', array('type' => 'text')); ?>
      <?php echo $this->Form->input('body', array('rows' => '10', 'type' => 'textarea')); ?>
      <?php echo $this->Form->file('image'); ?>
      <?php $this->Form->input('created_by');  ?>
      <?php echo $this->Form->submit('Enviar'); ?>

    <?php echo $this->Form->end(); ?>
    

    </center>

    </form>



    