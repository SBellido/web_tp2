<?php
include_once('model/ComentarioModel.php');
include_once('view/ProductoView.php');

class comentarioController extends SecuredController
{
        public function comentar(){
          $ComentarioModel = new ComentarioModel();
          $comentario = $ComentarioModel->getComentario();
          $this->view->mostrarComentar($id);
      }
}

?>
