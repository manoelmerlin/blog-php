<center>

		<div class="users form my-5 bg-success">
			<div class=" p-5">
				<div class="col-6 bg-white border border-dark shadow border p-5 my-5">
					<div class="my-3">
					<?php echo $this->Form->create('User'); ?>
					<?php echo $this->Form->input('username', array('label' => 'Usuário : ', 'placeholder' => 'Insira seu Usuário ',  'class' => 'my-2 p-1 border border-rounded', 'style' => 'width: 300px' )); ?>
					</div>

					<div class="my-3">
						<?php echo $this->Form->input('password', array('label' => ' Senha  :' , 'placeholder' => 'Insira sua senha ', 'class' => 'my-1 ml-2 p-1 border border-rounded', 'style' => 'width: 300px')); ?>
					</div>

					<div class="my-4">
						<?php echo $this->Form->submit('Entrar', array('class' => 'ml-4 bg-primary text-light border border-primary border-solid ', 'style' => 'width:180px; height:40px')) ;?>
                    </div>


					<div>
				       <?php echo $this->Html->link('Esqueceu a senha?', array('controller' => 'Users', 'action' => 'writeEmail')); ?>

					</div>

					<div>
						<?php $this->Form->end(); ?>
					</div>

				</div>

			</div>

		</div>
		</center>