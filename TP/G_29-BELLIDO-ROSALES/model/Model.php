<?php

define('DB_NAME', 'db_indumentaria');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOSTNAME', 'localhost');
define('DB_FILE','sql/db_indumentaria.sql');
class Model
{
  protected $db;

  function __construct()
  {
    try {

      $this->db = new PDO('mysql:host='.DB_HOSTNAME . '; dbname='.DB_NAME. ';charset=utf8', DB_USER,DB_PASSWORD);
    }catch (PDOException $e){

      $this->crearDB(DB_NAME, 'sql/db_indumentaria.sql');
      $this->db = new PDO('mysql:host='.DB_HOSTNAME . '; dbname='.DB_NAME. ';charset=utf8', DB_USER,DB_PASSWORD);
    }
  }

  function crearDB($dbname, $dbfile) {

    try {
      $connection = new PDO('mysql:host='.DB_HOSTNAME, DB_USER,DB_PASSWORD);

      $connection->exec('CREATE DATABASE IF NOT EXISTS '.$dbname);
      $connection = new PDO('mysql:host='.DB_HOSTNAME . '; dbname='.DB_NAME. ';charset=utf8', DB_USER,DB_PASSWORD);
      $connection->exec('USE '. $dbname);

      $queries=file_get_contents($dbfile);
      $connection->exec($queries);


    } catch (PDOException $e) {
      echo $e;
    }

  }
}
?>
