        
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
             echo '<div class="col-12 border p-3" style="background-color: rgba(0,0,0,0.25); background-image:  url(../../../../img/uploads/'.$post["Post"]["imagem"].'); background-repeat: no-repeat; background-size: 100% 100%;" >';

            echo $this->Html->link($post['Post']['title'],array('controller' => 'posts',
                    'action' => 'view', $post['Post']['id']), array('class' => 'text-light', 'style' => 'background-color: rgba(0,0,0,0.5); text-decoration:none; font-size:30px;')); echo '</p><br>';

            echo '<div class="col-12 p-2 text-light" style="">';
                
            echo  $this->Html->link($post['Post']['categoria'], array('controller' => 'posts', 'action' => 'separarCategoria', $post['Post']['categoria']));
                
                    

            echo  '</div>';

            

            echo '<div class="row m-0">';    
              echo $this->Html->link('Continue lendo',array(
            'action' => 'view', $post['Post']['id']), array('class' => 'ml-5'));  echo '<br>';


            echo '</div>';    
            echo "<br>";
            echo "<h5 class='text-light'>" . 'Criado em : '. $post['Post']['modified'] . "</h6>";    

                echo '</div>';
                echo '</div>';
        
            
        }

        echo '</div>';
        echo '</div>';

        
         
        echo "</table>";
 
        echo "<div class='paging'>";
     
             
         echo '<center>';  
            echo '<div class="" style="text-size:30px">'; 
            echo '<h6>' . $paginator->numbers(array('modulus' => 0)) . '</h6>';
            echo "</div>";
        echo '</center>';     
         
        echo "</div>";

    }

    else{
        echo "No users found.";
    }


      
    ?>


