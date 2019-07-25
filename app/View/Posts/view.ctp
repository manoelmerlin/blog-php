<?php echo $this->Html->image('/img/uploads/'.$post["Post"]["imagem"].')', array('class' => 'p-4')); ?>

<center><h1><?php echo $post['Post']['title']?></h1></center>

<div class='ml-5'></div>

    <div class='ml-5'>
        <p><?php echo $post['Post']['body']?></p>
    </div>

    <div>
       <h5> Post criado em: <?php echo $post['Post']['created'];?></h5> <h5>Autor:<?php echo $post['Post']['first_name']; ?></h5>
    </div>

    <div class='my-4 border-top'>

    <h3 class='ml-5 my-2'>Comentários</h3>

      <h4 class='text-success ml-5'><?php echo count($comentarios) . ' Comentários'; ?> </h4>

    </div>

        <?php foreach($comentarios as $a): ?>

            <div class='border p-2 my-2'>
                
                <div class="my-3">
                    <?php echo $a['Comment']['first_name'] ?>  <?php echo $a['Comment']['last_name']; ?>

                </div>
                <?= $a['Comment']['body_commit'];?>   <h6 class="float-right"> <?php echo ' Comentado : ' .  $a['Comment']['created'] ?> </h6>
            </div>
        <?php endforeach; ?>


    <?php if(AuthComponent::user()) : ?>
        <?php echo $this->Form->create('Comment', array('controller' => 'posts', 'url' => 'comentar')); ?>
    <div class="my-3">
        <?php echo $this->Form->input('body_commit', array('placeholder' => 'Insira comentário .......', 'label' => 'Comentário : ', 'style' => 'width:500px; height: 50px')); ?>
    </div>    
        <?php echo $this->Form->hidden('post_id', array('value' => $post['Post']['id'])); ?>
        <div class="" style="width:600px">
            <?php echo $this->Form->submit('Comentar', array('class' => 'float-right ml-2')) ?>
        </div>
        <?php echo $this->Form->end(); ?>
       
    <?php endif; ?>    