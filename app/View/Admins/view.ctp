
    <?php 


    foreach($posts as $post) {
            
        if(AuthComponent::user('id') == $post['Post']['created_by']){ 

            echo $post['Post']['title'];
            


         }

        }


