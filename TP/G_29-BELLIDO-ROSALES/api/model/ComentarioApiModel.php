<?php
 class ComentarioApiModel extends Model
 {

   function getComentarios(){
    $sentencia = $this->db->prepare("SELECT * FROM comentarios"); //conecta con la tabla de MySQL
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function getComentario($id_producto){
    $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id_producto = ?"); //conecta con la tabla de MySQL
    $sentencia->execute($id_producto);
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
  function getComentarioID($id){
    $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id = ?"); //conecta con la tabla de MySQL
    $sentencia->execute([$id]);
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }

  function guardarComentario($id_producto, $nombre, $fecha, $comentario){
    $sentencia = $this->db->prepare('INSERT INTO comentarios(id_producto, nombre, fecha, comentario) VALUES(?,?,?,?)');
    $sentencia->execute([$id_producto, $nombre, $fecha, $comentario]);
    $id = $this->db->lastinsertId();
    return $this->getComentario($id);
  }

  function borrarComentario($id){
    $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id=?");
    $sentencia->execute([$id]);
  }

   // function guardarComentarios($id, $id_producto, $nombre, $comentario){
   //   $sentencia = $this->db->prepare("INSERT INTO `comentarios`(`id`, `id_producto`, `nombre`, `comentario`) VALUES(?,?,?,?)");
   //   $sentencia->execute([$id, $id_producto, $nombre, $comentario]);
   //   $id = $this->db->lastinsertId();
   //  header('Location: '.PRODUCTO);
   //  }
   //

}
?>
