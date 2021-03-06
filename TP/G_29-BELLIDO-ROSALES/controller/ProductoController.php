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
    $user = $this->getUser();
    $producto=$this->model->getProductos();
    $listado = $this->model->getProductos();
    $this->view->mostrarProductos($listado, $user,$producto);
  }

  public function productoFiltrados($id_categoria)
  {
    $user = $this->getUser();
    $producto=$this->model->getProductos();
    $listado = $this->model->getProductosFiltrados($id_categoria);
    $this->view->mostrarProductos($listado, $user,$producto);
  }


  public function create()
  {
    $categoriaModel = new CategoriaModel();
    $categoria = $categoriaModel->getCategorias();
    $this->view->mostrarCrearProducto($categoria);
  }

  public function store()
  {
    $id_categoria =  $_POST['id_categoria'];
    $precio = $_POST['precio'];
    $color = $_POST['color'];
    $talle = $_POST['talle'];
    $stock = isset($_POST['stock']) ? $_POST['stock'] : 0;

    if(isset($_POST['id_categoria']) && !empty($_POST['id_categoria']))
    {
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
    header('Location: '.PRODUCTO);
  }

  public function mostrarEditar($params){
    $id=$params[0];
    $productos=$this->model->verProducto($id);
    $this->view->mostrarEditarProducto($productos[0]);
  }

  public function guardarEdit()
  {
//  $this->isAdmin() or $this->login();
//  $id = $_POST['id'];
//  $nombre = $_POST['nombre'];
    $id = $_POST['id'];
    $precio = $_POST['precio'];
    $color = $_POST['color'];
    $talle = $_POST['talle'];
    $this->model->editarProducto($id, $precio, $color, $talle);
    header('Location: '.PRODUCTO);
 // header('Location: '.PRODUCTO); // REDIRECCIONES AL VIEW
  }

  public function getProductoID($params)
  {
    $id=$params[0];
    $user = $this->getUser();
    $producto=$this->model->producto();
    $listado=$this->model->verProducto($id);
    $this->view->mostrarProductos($listado, $user, $producto);
  }
}

?>
