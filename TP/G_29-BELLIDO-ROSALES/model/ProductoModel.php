<?php
class ProductoModel extends Model
{
  function getProducto(){
    $sentencia = $this->db->prepare("SELECT * FROM producto"); //conecta con la tabla de MySQL
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  function getProductos(){
    $sentencia = $this->db->prepare("SELECT p.id, c.nombre, p.precio, p.color, p.talle, p.stock FROM producto AS p INNER JOIN categoria c ON p.id_categoria = c.id "); //conecta con la tabla de MySQL
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function getProductosFiltrados($id_categoria){
    $sentencia = $this->db->prepare("SELECT p.id, c.nombre, p.precio, p.color, p.talle, p.stock FROM producto AS p INNER JOIN categoria c ON p.id_categoria = c.id WHERE p.id_categoria = ?"); //conecta con la tabla de MySQL
    $sentencia->execute($id_categoria);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function guardarProducto($id_categoria, $precio, $color, $talle, $stock){
    $sentencia = $this->db->prepare("INSERT INTO producto(id_categoria, precio, color, talle, stock) VALUES(?,?,?,?,?)");
    $sentencia->execute([$id_categoria, $precio, $color, $talle, $stock]);
    $id = $this->db->lastinsertId();
    return $this->getProducto($id);
  }

  function borrarProducto($id) {
     $sentencia = $this->db->prepare("DELETE FROM producto WHERE id=?");
     $sentencia->execute([$id]);
 }
  function editarProducto($id, $precio, $color, $talle)
  {
    $sentencia = $this->db->prepare("UPDATE producto SET precio=?, color=?, talle=? WHERE id=?");
    $sentencia->execute([$precio, $color, $talle, $id]);
  }

  function finalizarProducto($id)
  {
      $sentencia = $this->db->prepare("UPDATE producto SET stock=1 WHERE id=?");
      $sentencia->execute([$id]);
      header('Location: '.PRODUCTO);
  }

  function verProducto($id)
  {
    $sentencia=$this->db->prepare("SELECT p.id, p.precio, p.color, p.talle, p.stock, p.imagen, c.nombre, c.descripcion from producto p inner join categoria c where c.id=p.id_categoria and p.id=?");
    $sentencia->execute([$id]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    // $sentencia = $this->db->prepare("SELECT p.id, c.nombre, p.precio, p.color, p.talle FROM producto AS p INNER JOIN categoria c ON p.id_categoria = c.id WHERE id=?");
    // $sentencia = $this->db->prepare("SELECT `id`, `id_categoria`, `precio`, `color`, `talle`, `stock`, nombre FROM `producto` WHERE id=?");
    // $sentencia = $this->db->prepare("SELECT * FROM producto WHERE id = ?");
    // return $result[0];
  }

//     function verPorCategoria($id_categoria){
//       $sentencia = $this->db->prepare("SELECT * FROM categoria WHERE id_categoria = ?");
//       $PorCategoria = $sentencia->execute([$id_categoria]);
//       return $sentencia->fetch(PDO::FETCH_ASSOC);
//     }
}

?>
