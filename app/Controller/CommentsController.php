<?php
class CommentsController extends AppController {

    public function index() {
        
    }

    public function deleteComment($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Post->delete($id)) {
            $this->Flash->success('Post deletado com sucesso');
            
            } else {
            $this->Flash->error("Não foi possivel deletar o comentario");
            }
            return $this->redirect(array('action' => 'index'));
    }

}