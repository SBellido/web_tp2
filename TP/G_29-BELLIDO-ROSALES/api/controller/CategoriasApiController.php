<?php
require_once("../api/model/CategoriasApiModel.php");
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

  public function getCategorias($params = [])
  {
//     function get($params=''){
// if(empty($params)){
// $categorias = $this->model->getCategorias();
// return $this->json_response($categorias,200);
// }
// else{
// $categoria = $this->model->getCategoria($params[0]);
// if(!empty($categoria)){
// return $this->json_response($categoria,200);
// }else {
//   return $this->json_response(false,404);
// }
// }
    switch (sizeof($params))
    {
      case 0:
        $categorias = $this->model->getCategorias();
        return $this->json_response($categorias, 200);
        break;
      case 1:
        $id_categoria = $params = [0];
        $categoria = $this->model->getCategoria($id_categoria)
        if($categoria)
        {
          return $this->json_response($categoria, 200);
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
  public function deleteCategorias($params = [])
  {
    switch (sizeof($params)) {
      case 0:
        return $this->json_response(false, 400);
        break;
      case 1:
        $id_categoria = $params = [0];
        $categoria = $this->model->getCategoria($id_categoria)
        if($categoria)
        {
          $this->model->borrarCategoria($id_categoria);
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

 ?>
