<?php
class CategoriaModel extends Model
{
  function getCategorias(){
    $sentencia = $this->db->prepare("SELECT * FROM categoria"); //conecta con la tabla de MySQL
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function getCategoria($id_categoria){
    $sentencia = $this->db->prepare("SELECT * FROM categoria WHERE id_categoria = ?"); //conecta con la tabla de MySQL
    $sentencia->execute([$id_categoria]);
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }

  function guardarCategoria($nombre, $descripcion){
    $sentencia = $this->db->prepare('INSERT INTO categoria(nombre, descripcion) VALUES(?,?)');
    $sentencia->execute([$nombre, $descripcion]);
    $id = $this->db->lastinsertId();
    return $this->getCategoria($id);
  }

  function borrarCategoria($id){
    $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id=?");
    $sentencia->execute([$id]);
  }


  function editarCategoria($id, $nombre, $descripcion){
    $sentencia = $this->db->prepare("UPDATE categoria SET nombre=?,descripcion=? WHERE id=?");
    $sentencia->execute([$nombre, $descripcion, $id]);
  }


  function getCategoriaById($id){
      $sentencia = $this->db->prepare("SELECT * FROM categoria WHERE id = ?");
      $sentencia->execute([$id]);
      $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $result[0];
    }
  function modificarCategoria(){
    $sentencia = $this->db->prepare("UPDATE categoria SET nombre=?, descripcion=? WHERE id_categoria=?");
    $sentencia->execute([$nombre, $descripcion, $id_categoria]);
    return $this->getCategoria();
  }
}





?>
