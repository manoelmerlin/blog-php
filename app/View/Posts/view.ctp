<div class="float-right">


        <?php if(empty($check)): ?>
            <?php echo $this->Html->link("Favoritos", array('controller' => 'posts', 'action'=> 'enjoyPost',$post['Post']['id']), array(
                'style' => 'text-decoration:none;', 'class' => 'btn btn-success'
            )) ?>

            <?php else: ?>
                <?php echo $this->Html->link("Remover Favoritos", array('controller' => 'posts', 'action'=> 'unlike',$check['Curtida']['id']), array(
                'style' => 'text-decoration:none;', 'class' => 'btn btn-danger'
            )) ?>
            <?php endif; ?>
    </div>


<center><h1><?php echo $post['Post']['title']?></h1></center>



    <div class='ml-5'></div>
        <div class="m-5"></div>
            <div class='ml-5 ' >
        <p><?php echo $post['Post']['body']?></p>
    </div>

    <div>
       <h5> Post criado em : <?php echo $this->Time->format($post['Post']['created'], '%d/%m/%Y as %T');?></h5> <h5>Autor :<?php echo $this->Html->link($this->Html->image('../img/profilepic/'.$post['User']['imagem'], array('alt' => 'Brownies', 'style' => 'width:70px; height:50px; border-radius: 25px;', 'class' => 'my-3 ml-1')), array('controller' => 'users', 'action' => 'viewprofile', $post['Post']['created_by']), array('escapeTitle' => false, 'title' => 'Profile pic'));?>				

        <?php echo $this->Html->link($post['User']['first_name'] . " " . $post['User']['last_name'] , array('controller' => 'users', 'action' => 'viewprofile',$post['Post']['created_by']), array('class' => "my-1 ml-3", 'style' => 'text-decoration:none;')); ?>
        <h4 class="float-right text-success">Curtidas: <?php echo count($contlike); ?></h4>
    </div>

    


    <div class='my-5 border-top'>

    <h3 class='ml-5 my-2'>Comentários</h3>

      <h4 class='text-success ml-5'><?php echo count($comentarios) . ' Comentários'; ?> </h4>

    </div>

    <?php if(AuthComponent::user()) : ?>
        <?php echo $this->Form->create('Comment', array('controller' => 'posts', 'url' => 'comentar')); ?>
    <div class="my-3">
        <?php echo $this->Form->input('body_commit', array('placeholder' => 'Insira seu comentário .......', 'label' => 'Comentário : ', 'style' => 'width:500px; height: 50px')); ?>
    </div>    
        <?php echo $this->Form->hidden('post_id', array('value' => $post['Post']['id'])); ?>
        
        <div class="" style="width:600px">
            <?php echo $this->Form->submit('Comentar', array('class' => 'float-right ml-2')) ?>
        </div>
        <?php echo $this->Form->end(); ?>
        
    <?php endif; ?>    
    <div class="my-5">

    </div>


        <?php foreach($comentarios as $a): ?>

            <div class='border p-2 my-4'>
                <div class="my-3">
                    <div class="row m-0">
                    <?php echo $this->Html->link($this->Html->image('../img/profilepic/'.$a['User']['imagem'], array('alt' => 'Brownies', 'style' => 'width:70px; height:50px; border-radius: 25px;', 'class' => 'float-right my-1 ml-1')), array('controller' => 'users', 'action' => 'viewprofile', $a['Comment']['created_by']), array('escapeTitle' => false, 'title' => 'Profile pic'));?>				
                        <h6 class="my-3 ml-2"><?php echo h($a['User']['first_name']); ?></h6>  <h6 class="my-3 ml-2"><?php echo h($a['Comment']['last_name']); ?> </h6>
                    </div>
                    <div>
                    <?php if(AuthComponent::user('id') != $a['Comment']['created_by'] && AuthComponent::user() != 1 && $post['Post']['created_by'] != AuthComponent::user('id') &&  AuthComponent::user('role') != 1): ?>
                    <?php else: ?>   
                        <div class=" float-right">
                        <?php echo $this->Html->link('Deletar comentário', array('controller' => 'posts', 'action' => 'deletecomment', $a['Comment']['id']), array(
                            'class' => 'btn btn-danger')); ?>
                        </div>  
                        <?php endif; ?>     
                    </div>
                </div>
                <?= h($a['Comment']['body_commit']);?>   <h6 class="float-right"> <?php echo 'Comentado : ' .   $this->Time->format($a['Comment']['modified'], '%d/%m/%Y as %T'); ?> </h6>
            </div>
        <?php endforeach; ?>
