<h1>Criar usuário</h1>
    <div class="users form">   
        <?php echo $this->Form->create('User'); ?>
        <fieldset>
            <legend>
                <?php echo __('Add User')  ?>
            </legend>
            <?php echo $this->Form->input('username');
                echo $this->Form->input('password');
                echo $this->Form->input('role', array('options' => array('admin' => 'Admin', 'author' => 'Author')
                    )
                );      
    ?>
        </fieldset>

           <?php echo $this->Form->Submit('Enviar');
           $this->Form->end(); ?> 


    </div>