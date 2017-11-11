<?php
include_once('model/ProductoModel.php');
include_once('view/ProductoView.php');

class ProductoController extends SecuredController
{

  function __construct()
  {
    parent::__construct();
    $this->view = new ProductoView(); // construye el objeto ProductoView
    $this->model = new ProductoModel();// construye el objeto ProductoModel
  }

  public function producto()
  {
    $isAdmin = $this->isAdmin();
    $productos = $this->model->verProducto();
    $this->view->mostrarProductos($productos, $user);
  }

  public function home()
  {
    $isAdmin = $this->isAdmin();
    $categorias = $this->model->verProducto();
    $this->view->mostrarProductoHome($productos, $isAdmin);
  }

  public function create()
  {
      $this->isAdmin() or $this->login();
      $this->view->mostrarCrearProducto();
  }

  public function store()
  {
    $id_categoria =  $_POST['id_categoria'];
    $precio = $_POST['precio'];
    $color = $_POST['color'];
    $talle = $_POST['talle'];
    $stock = isset($_POST['stock']) ? $_POST['stock'] : 0;

    if(isset($_POST['id_categoria']) && !empty($_POST['id_categoria'])){
      $this->model->guardarProducto($id_categoria, $precio, $color, $talle, $stock);
      header('Location: '.PRODUCTO);
    }
    else{
      $this->view->errorCrear("El campo id_categoria es requerido", $id_categoria, $precio, $color, $talle);
    }
  }
  public function destroy($params)
  {
    $id = $params[0];
    $this->model->borrarProducto($id);
    header('Location: '.PRODUCTO);
  }

  public function finish($params)
  {
    $id= $params[0];
    $this->model->finalizarProducto($id);
    header('Location: '.HOME);
  }
  public function mostrarEditar($params){
    $this->isAdmin() or $this->login();
    $id=$params[0];
    if (empty($_POST)) {
    $producto=$this->model->verProducto($id);
    $this->view->mostrarEditarProducto($producto);
    }
    else {
        $precio = $_POST['precio'];
        $color = $_POST['color'];
        $talle = $_POST['talle'];
        $this->model->editarProducto($id_categoria, $precio, $color, $talle, $stock)
        header('Location: '.PRODUCTO); // REDIRECCIONES AL VIEW
      }
    public function guardarEdit(){
      //$this->isAdmin() or $this->login();

      $id= $_POST['id'];
      $precio = $_POST['precio'];
      $color = $_POST['color'];
      $talle = $_POST['talle'];
      $this->model->editarProducto($id_categoria, $precio, $color, $talle, $stock)
      header('Location: '.PRODUCTO); // REDIRECCIONES AL VIEW
    }
}
}
?>
