<?php

class ConfigApi
{
    public static $RESOURCE = 'resource';
    public static $PARAMS = 'params';
    public static $RESOURCES = [
      'categorias#GET'=> 'CategoriasApiController#getCategorias',
      'categorias#DELETE'=> 'CategoriasApiController#deleteCategorias',
      'categorias#POST'=> 'CategoriasApiController#createCategorias',
      'categorias#PUT'=> 'CategoriasApiController#editCategorias',

      'productos#GET'=> 'ProductosApiController#getProductos',
      'productos#DELETE'=> 'ProductosApiController#deleteProductos',
      'productos#POST'=> 'ProductosApiController#createProductos',
      'productos#PUT'=> 'ProductosApiController#editProductos'

    ];
}
 ?>
