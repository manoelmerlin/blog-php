<?php

    Class user Extends AppModel {

      public $validate = array('username' => array(
          'required' => array(
              'rule' => 'notBlank',
              'message' => 'Nome de usuário é obrigatorio'
            )
              
        ),
          'password' => array(
              'required' => array(
                  'rule' => 'notBlank',
                  'message' => 'Senha é obrigatório'
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

        public function beforeSave($options = array()) {
            if(isset($this->data[$this->alias]['password'])) {
                $passwordHasher = new BlowfishPasswordHasher();
                $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']

                );
            }
            return true;

        }


    }