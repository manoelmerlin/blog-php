<?php $paginator = $this->Paginator;?>
    
    <?php   if($posts) : ?>
        
        <div id="noticias  " class="">
            <div class="row m-0 ">
        <?php foreach( $posts as $post ): ?>
         <div class="col-6 p-2 ">

        <div class="col-12 border p-0" style="background-color: rgba(0,0,0,0.25); background-image:  url(../../img/uploads/<?= $post["Post"]["imagem"] ?>); background-repeat: no-repeat; background-size: 100% 100%;" >
        <center>  
            <div class="div-title mt-3 mb-3 mt-sm-5 mb-sm-5 mt-md-5 mb-md-5 mt-lg-5 mb-lg-5 mt-xl-5 mb-xl-5" style=''>
                <p style ="font-size:30px;  background-color: rgba(0,0,0,0.10);" class="div-title"><?php echo $this->Html->link($post['Post']['title'],array('controller' => 'posts',
                    'action' => 'view', $post['Post']['id']), array('class' => 'col text-light', 'style' => ' text-decoration:none;')); ; ?>  </h6> 
            </div> </center>  
              
            <div>
                <div class="my-3"></div>
            <div class="row m-0 text-light border div-cat col-12" style="background-color: rgba(0,0,0,0.5); font-size:20px">  
                <?php echo  $this->Html->link($post['Post']['categoria'], array('controller' => 'posts', 'action' => 'separarCategoria', $post['Post']['categoria']), array('class' => ' text-light', 'style' => ' text-decoration:none;')); ?>
            
            <div class="border-left ml-5">
                <div class="my-2">
                    <h6 class='text-light ml-2 '><?php echo "Post criado em : "; echo $this->Time->format($post['Post']['created'], '%d/%m/%Y'); ?></h5>

                </div>
                
            </div>
                
                <div class="border-left ">
                  <?php  echo $this->Html->link('<i class="ml-5 far fa-heart"></i>', array('controller' => 'posts', 'action' => 'enjoypost', $post['Post']['id']), array('escapeTitle' => false)); ?>
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


