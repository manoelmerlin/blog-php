<?php
	class GroupsController extends AppController {

		public function beforeFilter()
		{
			$this->Auth->allow(array("addGroup"));
		}

		public function addGroup() {
			$this->layout = 'admin';

			if ($this->request->is('post') || $this->request->is('put')) {
					$this->Group->create();
				if ($this->Group->save($this->request->data)) {
					$this->Flash->success("Grupo criado com sucesso");
				}
			}

		}
	}