<?php
class LoginModel extends Model
{
  function getUser($userName){
    $sentencia = $this->db->prepare( "select * from user where usuario = ? limit 1");
    $sentencia->execute([$userName]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function createUser($email, $password){
    $sentencia = $this->db->prepare( "INSERT INTO `user`( `usuario`, `password`) VALUES(?,?)");
    $sentencia->execute([$email, $password]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
}

 ?>
