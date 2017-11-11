<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      ''=> 'CategoriaController#home',
      'home'=> 'CategoriaController#index',
      // 'home'=> 'EnterVisiter#enter',
      // 'enter'=> 'VisiterController#enter',

      'login' => 'LoginController#index',
      'verificarUsuario' => 'LoginController#verify',
      'logout' => 'LoginController#destroy',


      'categorias' => 'CategoriaController#index',
      'listaCategorias' => 'CategoriaController#index',
      'agregarCategoria'=> 'CategoriaController#create',
      'guardarCategoria'=> 'CategoriaController#store',
      'borrarCategoria' => 'CategoriaController#destroy',
      'finalizarCategoria' => 'CategoriaController#finish',
      'editarCategoria'=> 'CategoriaController#edit',
      'guardarEditarCategoria'=> 'CategoriaController#guardarEdit',


      'agregarProducto'=> 'ProductoController#create',
      'guardarProducto'=> 'ProductoController#store',
      'borrarProducto' => 'ProductoController#destroy',
      'finalizarProducto' => 'ProductoController#finish',
      'listaProductos' => 'ProductoController#producto',
      'producto' => 'ProductoController#producto',
      'editarProducto'=> 'ProductoController#producto',
      'guardarEditarProducto'=> 'ProductoController#guardarEdit',
    ];

}

 ?>
