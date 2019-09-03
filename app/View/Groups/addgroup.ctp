<?php echo $this->Form->create('Group'); ?>
<?= $this->Form->input("name"); ?>
<?= $this->Form->submit("Enviar", array('controller' => 'groups', 'action' => 'addgroup')); ?>
<?= $this->Form->end();