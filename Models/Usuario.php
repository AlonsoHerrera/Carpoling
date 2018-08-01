<?php

namespace Models {
 
  class Usuario
  {
    private $connection;
    function __construct($connection)
    {
      $this->connection = $connection;
    }

     public function find($correo, $contrasenna)
    {
      $result = $this->connection->executeSql("select * from usuario where correo = '$correo' and contrasena = md5('$contrasenna')");
      return $this->connection->getResults($result)[0];
    }


     public function insert( $nombre, $descripcion,$telefono, $correo, $contrasenna,$direccion,$rol,$foto)
    {
      echo $contrasenna;
      $sql = "INSERT INTO usuario(correo,contrasena,nombre,telefono,direccion,descripcion,foto,rol) VALUES ('$correo',md5('$contrasenna'),'$nombre','$telefono','$direccion','$descripcion','$foto', '$rol')";
      $this->connection->executeSql($sql);
    }
       public function findUser($id)
    {
      $result = $this->connection->executeSql("select * from usuario where id = '$id'");
      return $this->connection->getResults($result)[0];
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