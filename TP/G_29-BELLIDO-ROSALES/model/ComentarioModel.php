<?php
class ComentarioModel extends Model
{
  function getComentario(){
    $sentencia = $this->db->prepare("SELECT * FROM comentarios"); //conecta con la tabla de MySQL
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function guardarComentarios($id, $id_producto, $nombre, $comentario){
    $sentencia = $this->db->prepare("INSERT INTO `comentarios`(`id`, `id_producto`, `nombre`, `comentario`) VALUES(?,?,?,?)");
    $sentencia->execute([$id, $id_producto, $nombre, $comentario]);
    $id = $this->db->lastinsertId();
    header('Location: '.PRODUCTO);
    }


}
