<?php
class CategoriaView extends View
{

  function mostrarCategoriaHome($categorias, $isAdmin){
    $this->smarty->assign('isAdmin', $isAdmin);
    $this->smarty->assign('categorias', $categorias);
    $this->smarty->display('templates/index.tpl');
  }

  function mostrarCategoria($categorias, $isAdmin){
    $this->smarty->assign('isAdmin', $isAdmin);
    $this->smarty->assign('categorias', $categorias);
    $this->smarty->display('templates/categoria.tpl');
  }

  function mostrarCrearCategoria(){
    $this->assignarCategoriaForm();
    $this->smarty->display('templates/formCrear.tpl');
  }

  function mostrarEditar($categoria){
    $this->smarty->assign('categoria', $categoria);
    $this->smarty->display('templates/CategoriaEditar.tpl');
  }

  function errorCrear($error, $nombre, $descripcion){
    $this->assignarCategoriaForm($nombre, $descripcion);
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/formCrear.tpl');
  }

  private function assignarCategoriaForm($nombre='', $descripcion=''){
    $this->smarty->assign('nombre', $nombre);
    $this->smarty->assign('descripcion', $descripcion);
  }
}

?>
