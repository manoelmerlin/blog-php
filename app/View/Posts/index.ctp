        
<?php


    $paginator = $this->Paginator;
 
    if($posts){

        //$paginator->sort('id', 'id');
        //$paginator->sort('title', 'title');
        //$paginator->sort('body', 'body');

        echo '<div id="noticias border p-2" class="">';

            echo '<div class="row m-0 p-2">';

            

        foreach( $posts as $post ){
         echo '<div class="col-6 p-3">';
             echo '<div class="col-12 border p-3" style="background-image:  url(../../../../img/uploads/'.$post["Post"]["imagem"].'); background-repeat: no-repeat; background-size: 100% 100%;" >';


                echo $this->Html->link($post['Post']['title'],array(
                    'action' => 'view', $post['Post']['id']), array('class' => 'text-light', 'style' => 'text-decoration:none; font-size:30px;')); echo '</p><br>';

            echo '<div class="col-12 p-2 text-light bg-" style="">';

            echo substr($post['Post']['body'], 0, 155) . '...';    

            echo  '</div>';

            

             echo $this->Html->link('Continue lendo',array(
                'action' => 'view', $post['Post']['id']), array('class' => ''));  echo '<br>';
                echo $this->Html->link('Deletar', array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']), array('confirm' => 'quer mesmo deletar?')); 

                echo '</div>';
                echo '</div>';
        
            
        }

        echo '</div>';
        echo '</div>';

        
         
        echo "</table>";
 
        echo "<div class='paging'>";
     
             
           
         echo '<div class="border p-2 " style="text-color:pink">'; 
            echo $paginator->numbers(array('modulus' => 0));
        echo "</div>";
           
         
        echo "</div>";

    }

    else{
        echo "No users found.";
    }


      
    ?>
