<?php

    Class User Extends AppModel {

      public $validate = array('username' => array(
          'required' => array(
              'rule' => 'compareUser',
              'message' => 'Nome de usuário é obrigatorio'
            )
              
        ),
          'password' => array(
              'required' => array(
                  'rule' => 'notBlank',
                  'message' => 'Senha é obrigatório'
            )
              
        ),

        'confirm_password' => array(
            'compare' => array(
                'rule' => 'comparePassword',
                'message' => 'Senhas não coincidem'
            )
        ),


        'first_name' => array(
            'required' => array(
                'rule' => '/[^\s]/',
                'message' => 'Nome é obrigatório'
            )
                
        ),
        
        'last_name' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Sobrenome é obrigatório'
            )
            
        ),

        'email' => array(
            'required' => array(
                'rule' => 'compareEmail',
                'message' => 'Email já existe',
                'rule' => 'notBlank',
                'message' => 'Preencha o campo e-mail'
            )
        ),

        'phone' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Telefone é obrigatório'
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Telefone apenas números'
            )

         ),


            'role' => array(
                'valid' => array(
                    'rule' => array('inList', array('admin', 'author')),
                    'message' => 'Please enter a valid role',
                    'allowEmpty' => false
                )
            )
        );   
        
        
        public function compareEmail($buscaEmail = null) {

            $bucaEmail = $this->find('first', array(
                'conditions' => array(
                    'email' => $buscaEmail['email']      
                )
                ));

            if(empty($buscaEmail)) {
                return true;
            }    
                return false;

        }

        public function compareUser($compararUsuario = null) {

            $buscaUsuario = $this->find('first', array(
                'conditions' => array(
                    'username' => $compararUsuario['username'],
                )
            ));

            if(empty($buscaUsuario)){
                return true;
            }
            return false;

        }

        public function comparePassword($compararSenha = null) {
            $data = $this->data[$this->alias];

            if($compararSenha['confirm_password'] == $data['password']) {

                return true;
                
            } 

            return false;

        }

        public function beforeSave($options = array()) {
            if(isset($this->data[$this->alias]['password']) ) {
                $passwordHasher = new BlowfishPasswordHasher();
                $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']

                );
            }
            return true;

        }


    }