<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      ''=> 'CategoriaController#home',
      'home'=> 'CategoriaController#index',

      'login' => 'LoginController#index',
      'verificarUsuario' => 'LoginController#verify',
      'logout' => 'LoginController#destroy',
      'registrarUsuario'=>'LoginController#registrar',
      'mostrarLogin'=>'LoginController#mostrarLogin',


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
      'editarProducto'=> 'ProductoController#mostrarEditar',
      'guardarEditarProducto'=>'ProductoController#guardarEdit',
      'actualizarTabla'=>'ProductoController#productoFiltrados',

      'agregarComentario'=>'comentarioController#comentar'

    ];

}

 ?>
