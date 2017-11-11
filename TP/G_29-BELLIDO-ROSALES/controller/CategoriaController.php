<?php
include_once('model/CategoriaModel.php');
include_once('view/CategoriaView.php');

class CategoriaController extends SecuredController
{

  function __construct()
  {
    parent::__construct();
    $this->view = new CategoriaView($this->getUser()); // construye el objeto CategoriaView
    $this->model = new CategoriaModel();// construye el objeto CategoriaModel
  }

  public function index()
  {
    $isAdmin = $this->isAdmin();
    $categorias = $this->model->getCategoria();
    $this->view->mostrarCategoria($categorias, $isAdmin);
  }
  public function home()
  {
    $isAdmin = $this->isAdmin();
    $categorias = $this->model->getCategoria();
    $this->view->mostrarCategoriaHome($categorias, $isAdmin);
  }
  public function create()
  {
    $this->isAdmin() or $this->login();
    $this->view->mostrarCrearCategoria();
  }

  public function store()
  {
  //  $this->isAdmin() or $this->login();
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
      $this->model->guardarCategoria($nombre, $descripcion);
      header('Location: '.CATEGORIA);
    }else{
      $this->view->errorCrear("El campo nombre es requerido", $nombre, $descripcion);
    }
  }

    public function destroy($params)
    {
      $this->isAdmin() or $this->login();
      $id = $params[0];
      $this->model->borrarCategoria($id);
      header('Location: '.CATEGORIA);
    }

    public function finish($params)
    {
      $this->isAdmin() or $this->login();
      $id= $params[0];
      $this->model->finalizarCategoria($id);
      header('Location: '.HOME);
    }

    public function edit($params)
    {
      $this->isAdmin() or $this->login();
      $id= $params[0];
      if (empty($_POST)) {
        $categoria = $this->model->getCategoriaById($id);
        $this->view->mostrarEditar($categoria);
      }
      else {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $this->model->editarCategoria($id, $nombre, $descripcion);
        header('Location: '.CATEGORIA); // REDIRECCIONES AL VIEW
      }
  }
  public function guardarEdit(){
    //$this->isAdmin() or $this->login();

    $id= $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $this->model->editarCategoria($id, $nombre, $descripcion);
    header('Location: '.CATEGORIA); // REDIRECCIONES AL VIEW
  }

}
  ?>
