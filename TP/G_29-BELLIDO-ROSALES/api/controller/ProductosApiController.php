<?php
  require_once("../model/ProductoModel.php");
require_once("../api/controller/Api.php");

/**
 *
 */
class ProductosApiController extends Api
{
  protected $model;
  function __construct()
  {
    $this->model = new ProductoModel(); // construye el objeto CategoriaModel
  }

  public function getProductos($url_params = [])
  {
    switch (sizeof($url_params))
    {
      case 0:
        $productos = $this->model->getProducto();
        return $this->json_response($productos, 200);
        break;
      case 1:
        $id= $url_params = [0];
        $producto = $this->model->getProducto();
        if($producto)
          return $this->json_response($producto, 200);
        else
          return $this->json_response(false, 404);
      default:
        return $this->json_response(false, 404);
        break;
      }
  }
  public function deleteProductos($url_params = [])
  {
    switch (sizeof($url_params)) {
      case 0:
        return $this->json_response(false, 400);
        break;
      case 1:
        $id = $url_params[0];
        $categoria = $this->model->getProducto();
        if($categoria)
        {
          $this->model->borrarProducto($id);
          return $this->json_response("Borrado exitoso.", 200);
        }
        else
        {
          return $this->json_response(false, 404);
        }
      default:
        return $this->json_response(false, 404);
        break;
      }
    }
}
