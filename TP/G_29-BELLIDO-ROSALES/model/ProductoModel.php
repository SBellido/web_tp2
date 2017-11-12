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

  function guardarProducto($id_categoria, $precio, $color, $talle, $stock){
    $sentencia = $this->db->prepare("INSERT INTO producto(id_categoria, precio, color, talle, stock) VALUES(?,?,?,?,?)");
    $sentencia->execute([$id_categoria, $precio, $color, $talle, $stock]);
  }

  function borrarProducto($id) {
     $sentencia = $this->db->prepare("DELETE FROM producto WHERE id=?");
     $sentencia->execute([$id]);
 }
  function editarProducto($id, $precio, $color, $talle) {
    $sentencia = $this->db->prepare("UPDATE producto SET precio=?, color=?, talle=? WHERE id=?");
    $sentencia->execute([$id, $precio, $color, $talle]);
  }

  function finalizarProducto($id) {
    $invitado = SecuredController::getUser();
    if($invitado!==false){
      $sentencia = $this->db->prepare("UPDATE producto SET stock=1 WHERE id=?");
      $sentencia->execute([$id]);
    }
    else {
      header('Location: '.PRODUCTO);
    }
  }
  function verProducto($id){
    $sentencia = $this->db->prepare("SELECT p.id, c.nombre, p.precio, p.color, p.talle FROM producto AS p INNER JOIN categoria c ON p.id_categoria = c.id ");
    $sentencia->execute([$id]);
    // return $productos;

  }
}
?>
