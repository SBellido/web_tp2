<?php
  require_once("../model/ComentarioModel.php");
require_once("../api/controller/Api.php");

class ComentariosApiController extends Api
{
  public function getComentarios($url_params = [])
  {
    switch (sizeof($url_params))
    {
      case 0:
        $productos = $this->model->getComentario();
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
  pu
public function createComentario($url_params = []) {
  if(sizeof($url_params) == 0){
    $body = json_decode($this->raw_data);
    $comentario = $body->comentario;
    $comentarios = $this->model->guardarComentarios($comentario);
    return $this->json_response($comentarios, 200);
  }
  else {
    return json_response(false, 404);

    }
  }
}

 ?>
