<?php
include_once('model/ComentarioModel.php');
include_once('view/ComentarioView.php');

class comentarioController extends SecuredController
{
    function __construct()
    {
      parent::__construct();
      $this->view = new comentarioView(); // construye el objeto ProductoView
      $this->model = new ComentarioModel();// construye el objeto ProductoModel
    }

    public function comentar(){
      $ComentarioModel = new ComentarioModel();
      $comentario = $ComentarioModel->getComentario();
      $this->view->mostrarComentar();
  }
  public function store()
  {
    $id_producto =  $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $comentario = $_POST['comentario'];


    if(isset($_POST['id_producto']) && !empty($_POST['id_producto'])){
      $this->model->guardarComentarios($id_producto, $nombre, $comentario);
      header('Location: '.PRODUCTO);
    }
    else{
      $this->view->errorCrear("El campo es requerido", $id_producto, $nombre, $comentario);
    }
  }
}


?>
