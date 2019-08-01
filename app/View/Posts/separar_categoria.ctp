<?php $paginator = $this->Paginator;?>
 
    <?php   if($posts) : ?>
        
        <div id="noticias  " class="">
            <div class="row m-0 ">
        <?php foreach( $posts as $post ): ?>
         <div class="col-6 p-3">

        <div class="col-12 border p-3" style="background-color: rgba(0,0,0,0.25); background-image:  url(../../img/uploads/<?= $post["Post"]["imagem"] ?>); background-repeat: no-repeat; background-size: 100% 100%;" >
        
            <div class="col border" style=' background-color: rgba(0,0,0,0.5);'>
               <h2 class="col"><?php echo $this->Html->link($post['Post']['title'],array('controller' => 'posts',
                    'action' => 'view', $post['Post']['id']), array('class' => 'col text-light', 'style' => ' text-decoration:none;')); echo '</p><br>'; ?>  </h6> 
            </div>    
                <br>
                <br>
            <div>
                <div class="my-3"></div>
            <div class="row m-0 text-light border div-cat col-12" style="background-color: rgba(0,0,0,0.5); font-size:20px">  
                <?php echo  $this->Html->link($post['Post']['categoria'], array('controller' => 'posts', 'action' => 'separarCategoria', $post['Post']['categoria']), array('class' => 'text-light', 'style' => ' text-decoration:none;')); ?>
            
            <div class="border-left ml-5">
                <div class="my-2">
                    <h6 class='text-light ml-2'><?php echo "Post criado em : "; echo $this->Time->format($post['Post']['created'], '%d/%m/%Y'); ?></h5>
                </div>        
            </div>

            </div>
               
            </div> 
            <br>
                </div>
                </div>
        
            
            <?php endforeach; ?>
            </div>
            </div>          
         
        </table>
 
            <div class='paging'>
     
             
         <center>
            <div class="my-4" style="text-size:30px">
            <?php echo '<h6>' . $paginator->numbers(array('modulus' => 0)) . '</h6>'; ?>
                </div>
        </center>  
         
        </div>
    
    <?php else: ?>
        <?php echo "Ainda não fora feitas postagens"; ?>
    <?php endif; ?>
      
    
    


<?php $color = '#red'; ?>


    <style> 
    .div-cat:hover{
       height: 50px;
       background-color:black;
    }
    .div-cat {
        background-color: <?php echo $color ?>;
    }
    
    
    </style>
