<?php
require_once('model/ComentarioApiModel.php');
require_once('Api.php');
/**
 *
 */
class ComentariosApiController extends Api
{
  protected $model;
  function __construct()
  {
      parent::__construct();
      $this->model = new ComentarioApiModel();
  }
  public function getComentarios($url_params = [])
  {
      $comentarios = $this->model->getComentarios();
      return $this->json_response($comentarios, 200);
  }

  public function getComentario($url_params = [])
  {
      $id = $url_params[":id"];

      $comentario = $this->model->getComentario($id);
      print_r($comentario);
      die();
      if($comentario)
        return $this->json_response($comentario, 200);
        else
          return $this->json_response(false, 404);
  }

  public function createComentario() {
    $body = json_decode($this->raw_data);
    $id_producto = $body->id_producto;
    $nombre = $body->nombre;
    $fecha = $body->fecha;
    $comentario = $body->comentario;
    $comentarioGuardado = $this->model->guardarComentario($id_producto, $nombre, $fecha, $comentario);
    return $this->json_response($comentarioGuardado, 200);
  }

  public function deleteComentario($url_params = [])
  {

    switch (sizeof($url_params)) {

      case 0:
        return $this->json_response(false, 400);
        break;
      case 1:

        $id = $url_params[":id"];
        $comentario = $this->model->getComentarioID($id);
        if($comentario)
        {
          $this->model->borrarComentario($id);
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
