<?php
define('RESOURCE', 0);
define('PARAMS', 1);


require_once 'config/ConfigApi.php';
require_once '../model/Model.php';
require_once 'controller/CategoriasApiController.php';

function parseURL($url)
{
  $urlExploded = explode('/', trim($url,'/'));
  $arrayReturn[ConfigApi::$RESOURCE] = $urlExploded[RESOURCE] . '#' . $_SERVER['REQUEST_METHOD'];
  $arrayReturn[ConfigApi::$PARAMS] = isset($urlExploded[PARAMS]) ? array_slice($urlExploded,1) : null;
  return $arrayReturn;
}

if(isset($_GET['resource'])){
  $urlData = parseURL($_GET['resource']);
  $resource = $urlData[ConfigApi::$RESOURCE];
  if(array_key_exists($resource,ConfigApi::$RESOURCES)){
    $url_params = $urlData[ConfigApi::$PARAMS];
    $controller_method = explode('#',ConfigApi::$RESOURCES[$resource]); //Array[0] -> TareasController [1] -> index
    $controller =  new $controller_method[0]();
    $metodo = $controller->$metodon[1];
    if(isset($url_params) &&  $url_params != null){
      echo $controller->$metodo($url_params);
    }
    else{
      echo $controller->$metodo();
    }
  }
}
?>
