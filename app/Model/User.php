<?php

    class User extends AppModel {

      public $validate = array('username' => array(
          'required' => array(
              'rule' => 'compareUser',
              'message' => 'Usuário já existe por favor insira outro'
          ),
          'Validar letras e números' => array(
              'rule' => '/^[a-zA-Z0-9]+$/',
              'message' => 'Usúario não pode possuir caracteres especiais'  
          ),
          'Mínimo caracteres' => array(
            'rule' => array('minLength', 8),
            'message' => 'Usuário deve conter no minímo 8 caracteres'
          ),
          'Máximo caracteres' => array(
            'rule' => array('maxLength', 20),
            'message' => 'Senha deve conter no minímo 20 caracteres'
        ),
        
          ),
        
          'password' => array(
            'required' => array(
            'rule' => 'notBlank',
            'message' => 'Senha é obrigatório'
            ),
            'Mínimo caracteres' => array(
                'rule' => array('minLength', 8),
                'message' => 'Senha deve conter no minímo 8 caracteres'
            ),
            'Máximo caracteres' => array(
                'rule' => array ('maxLength', 20),
                'message' => 'Senha deve conter no máximo 20 caracteres'
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
                'rule' => 'notBlank',
                'message' => 'Nome é obrigatório',
                'rule' => '/^[a-zA-Z]+$/',
                'message' => 'Apenas letras'
                
            )
                
        ),
        
        
        'last_name' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Sobrenome é obrigatório',
                'rule' => '/^[a-zA-Z]+$/',
                'message' => 'Apenas letras'
            )
            
        ),

        'email' => array(
            'required' => array(
                'rule' => 'compareEmail',
                'message' => 'email já existe',
                
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
            ),

            'Mincaracteris' => array(
                'rule' => array('minLength', 8),
                'message' => 'Número minímo de caracteris 8',
            ),
            'Maxcaracteris' => array(
                'rule' => array('maxLength', 16),
                'message' => 'Número de máximo caracteris 16',
            ),

         ),

        );   
        
        
        public function compareEmail($compararEmail = null) {

            $buscaEmail = $this->find('first', array(
                'conditions' => array(
                    'email' => $compararEmail['email']      
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