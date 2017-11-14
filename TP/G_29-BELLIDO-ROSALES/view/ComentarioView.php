<?php
 class ComentarioView extends View
 {
 private function assignarComentarioForm($id_producto='', $nombre='', $comentario=''){
   $this->smarty->assign('id_producto', $id_producto);
   $this->smarty->assign('nombre', $nombre);
   $this->smarty->assign('comentario', $comentario);

 }
 function mostrarComentar(){
  $this->assignarComentarioForm();
   // $this->smarty->assign('invitado', $user);
   // $this->smarty->assign('id_producto', $id_producto);
   $this->smarty->display('templates/comentar.tpl');
 }

 }

 ?>
