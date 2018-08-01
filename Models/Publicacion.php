<?php

namespace Models {
 
  class Publicacion
  {
    private $connection;
    function __construct($connection)
    {
      $this->connection = $connection;
    }
    public function index($search)
    {
      $sql = "select * from publicaciones ORDER by id DESC";
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }  
    public function indexSolicitudes($search)
    {
      $sql = "select * from solicitudes ORDER by id DESC";
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }  


    public function publicacionesByID($search)
    {
      $sql = "select * from publicaciones where idUsuario =".$search." ORDER by id DESC";
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }  
    public function solicitudesByID($search)
    {
      $sql = "select * from solicitudes where idUsuario =".$search." ORDER by id DESC";
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }  




    public function index2($search)
    {
      $sql = "select * from publicaciones where idUsuario =".$search." ORDER by id DESC";
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }  
     public function insert( $idUsuario, $fecha,$titulo, $descripcion, $telefono,$correo,$tipo,$hora,$espacios,$provincia,$fechaP)
    {
      $sql = "INSERT INTO publicaciones(idUsuario, fecha,titulo, descripcion, telefono,correo,tipo,hora,espacios,provincia,fechaP) VALUES ('$idUsuario', '$fecha','$titulo',' $descripcion', '$telefono','$correo','$tipo','$hora','$espacios','$provincia','$fechaP')";
      $this->connection->executeSql($sql);
    }
    public function insertSolicitud( $idUsuario, $fecha,$titulo, $descripcion, $telefono,$correo,$tipo,$hora,$espacios,$provincia,$fechaP)
    {
      $sql = "INSERT INTO solicitudes(idUsuario, fecha,titulo, descripcion, telefono,correo,tipo,hora,espacios,provincia,fechaP) VALUES ('$idUsuario', '$fecha','$titulo',' $descripcion', '$telefono','$correo','$tipo','$hora','$espacios','$provincia','$fechaP')";
      $this->connection->executeSql($sql);
    }
       public function findUser($id)
    {
      $result = $this->connection->executeSql("select * from usuario where id = '$id'");
      return $this->connection->getResults($result)[0];
    }
    public function findUser2($id)
    {
      $sql = "select * from usuario where id = '$id'";
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }  
     public function update($id,$nombre, $descripcion,$telefono, $correo, $contrasena,$direccion,$rol,$foto)
    {
      $sql = "UPDATE usuario SET nombre = '$nombre', descripcion='$descripcion',telefono='$telefono',correo='$correo',contrasena=md5('$contrasena'),direccion='$direccion',rol='$rol',foto='$foto' WHERE id = $id";
      $this->connection->executeSql($sql);
    }
    public function getIdUsuario()
    {
      $result = $this->connection->executeSql("select * from usuario where id =  (SELECT MAX(id) FROM usuario)");
      return $this->connection->getResults($result)[0];
  }
}
 }