<?php echo  $this->Html->link('Curtir', array('controller' => 'posts', 'action' => 'enjoypost', $post['Post']['id']), array('class' => 'div-cat text-light', 'style' => 'text-decoration:none;')); ?>


<?php echo $this->Html->image('/img/uploads/'.$post["Post"]["imagem"].')', array('class' => 'p-4')); ?>

<center><h1><?php echo $post['Post']['title']?></h1></center>

<div class='ml-5'></div>
    <div class="m-5"></div>
    <div class='ml-5 ' >
        <p><?php echo $post['Post']['body']?></p>
    </div>

    <div>
       <h5> Post criado em : <?php echo $this->Time->format($post['Post']['created'], '%d/%m/%Y as %T');?></h5> <h5>Autor : <?php echo $post['Post']['first_name']; echo " "; echo $post['Post']['last_name']; ?></h5>
    </div>

    <div class="float-right">
        <?php if(AuthComponent::user('id') == $check['Curtida']['user_id'] && $check['Curtida']['status'] == 1): ?>
        <?php echo $this->Html->link("Adicionar post aos favoritos", array('controller' => 'posts', 'action'=> 'enjoyPost',$post['Post']['id']), array(
            'style' => 'text-decoration:none;', 'class' => 'btn btn-success'
        )) ?>
       <?php endif; ?> 
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

            <div class='border p-2 my-2'>
                
                <div class="my-3">
                    <?php echo h($a['Comment']['first_name']); ?>  <?php echo h($a['Comment']['last_name']); ?>
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
                <?= h($a['Comment']['body_commit']);?>   <h6 class="float-right"> <?php echo ' Comentado : ' .  $a['Comment']['created'] ?> </h6>
            </div>
        <?php endforeach; ?>

