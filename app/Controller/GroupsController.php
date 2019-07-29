<?php

    class GroupsController extends AppController {

        public function beforeFilter() {
            parent::beforeFilter();

            $this->Auth->allow();
        }



    }