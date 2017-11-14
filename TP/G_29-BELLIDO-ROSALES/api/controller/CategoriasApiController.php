<?php
require_once("../model/CategoriaModel.php");
require_once("../api/controller/Api.php");

/**
 *
 */
class CategoriasApiController extends Api
{
  protected $model;
  function __construct()
  {
    $this->model = new CategoriaModel(); // construye el objeto CategoriaModel
  }

  public function getCategorias($url_params = [])
  {
//     function get($url_params=''){
// if(empty($url_params)){
// $categorias = $this->model->getCategorias();
// return $this->json_response($categorias,200);
// }
// else{
// $categoria = $this->model->getCategoria($url_params[0]);
// if(!empty($categoria)){
// return $this->json_response($categoria,200);
// }else {
//   return $this->json_response(false,404);
// }
// }
    switch (sizeof($url_params))
    {
      case 0:
        $categorias = $this->model->getCategorias();
        return $this->json_response($categorias, 200);
        break;
      case 1:
        $id_categoria = $url_params = [0];
        $categoria = $this->model->getCategoria($id_categoria);
        if($categoria)
          return $this->json_response($categoria, 200);
        else
          return $this->json_response(false, 404);
      default:
        return $this->json_response(false, 404);
        break;
      }
  }
  public function deleteCategorias($url_params = [])
  {
    switch (sizeof($url_params)) {
      case 0:
        return $this->json_response(false, 400);
        break;
      case 1:
        $id = $url_params[0];
        $categoria = $this->model->getCategorias();
        if($categoria)
        {
          $this->model->borrarCategoria($id);
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
    public function createCategorias($url_params = []) {
      if(sizeof($url_params) == 0){
        $body = json_decode($this->raw_data);
        $nombre = $body->nombre;
        $descripcion = $body->descripcion;
        $categoria = $this->model->guardarCategoria($nombre, $descripcion);
        return $this->json_response($categoria, 200);
      }
      else {
        return json_response(false, 404);

      }
    }
}


 ?>
