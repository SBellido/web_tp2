<?php
class ProductoView extends View
{
  function mostrarProductoHome($productos, $isAdmin){
    $this->smarty->assign('isAdmin', $isAdmin);
    $this->smarty->assign('productos', $productos);
    $this->smarty->display('templates/Producto/index.tpl');
  }
  function mostrarProductos($productos, $isAdmin){

      $this->smarty->assign('isAdmin', $isAdmin);
      $this->smarty->assign('productos', $productos);
      $this->smarty->display('templates/Producto/producto.tpl');
  }

  function mostrarCrearProducto($categoria){
   $this->assignarProductoForm();
    $this->smarty->display('templates/formCrearProducto.tpl');
  }

public function mostrarEditarProducto($producto){
  $this->smarty->assign('productos', $producto);
  $this->smarty->display('templates/Producto/productoEditar.tpl');
}

function errorCrear($error, $id_categoria, $precio, $color, $talle, $stock){
    $this->assignarProductoForm($id_categoria, $precio, $color, $talle, $stock);
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/formCrearProducto.tpl');
  }

  private function assignarProductoForm($id_categoria='', $precio='', $color='', $talle='', $stock= 1){
    $this->smarty->assign('id_categoria', $id_categoria);
    $this->smarty->assign('precio', $precio);
    $this->smarty->assign('color', $color);
    $this->smarty->assign('talle', $talle);
    $this->smarty->assign('stock', $stock);

  }

}

 ?>
