<?php
define('RESOURCE', 0);
define('PARAMS', 1);
include_once 'config/Router.php';
include_once '../model/Model.php';
include_once 'controller/ComentariosApiController.php';
$router = new Router();
//url, verb, controller, method
$router->AddRoute("comentario", "GET", "ComentariosApiController", "getComentarios");
$router->AddRoute("comentario/:id", "GET", "ComentariosApiController", "getComentario");
$router->AddRoute("comentario/:id/descripcion", "GET", "ComentariosApiController", "getDescripcion");
$router->AddRoute("comentario", "POST", "ComentariosApiController", "createComentario");
$router->AddRoute("comentario/:id", "DELETE", "ComentariosApiController", "deleteComentario");
$route = $_GET['resource'];
$array = $router->Route($route);
if(sizeof($array) == 0)
  echo "404";
else
{
  $controller = $array[0];
  $metodo = $array[1];
  $url_params = $array[2];
  echo (new $controller())->$metodo($url_params);
}
?>
