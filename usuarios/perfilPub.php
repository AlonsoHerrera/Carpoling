<?php 
  $titulo = '';
  //include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  include '../shared/header.php';
  include '../shared/nav.php';
  include '../shared/footer.php';
  $user = $usuario_model->findUser($_SESSION['usuario_id']);
    $id = isset($_GET['id']) ? $_GET['id'] : '';
 ?>

 <style type="text/css">
     #publi{
    border: 1px solid;
    padding: 5%;
    box-shadow: 5px 10px #888888; 
    margin-left: 20%;
    margin-top: 30px;
    margin-bottom: 30px;
    width: 80%;
    }


     #img{
      width: 150px;
      height: 200px;
        border-style: outset;
        margin-left: 10%;
        float: left;
        margin-top: 50px;
    }
    #div2{
      margin-top: 50px;
      margin-left: 400px; 
      margin-bottom: 80px;  
    }
    #publicaciones{
      width: 45%;
      margin-top: 60px;
      margin-left: 20px;
      float: left;
    }
    #solicitudes{
      width: 45%;
      margin-top: 60px;
      margin-right: 120px;
      float: right;

    }
    #tiSoli{
      margin-left: 50%;
    }
  </style>

<body>
  <?php 
  $result_array = $publicacion_model->findUser2($id);
  foreach ($result_array as $row) {
    echo "<div id='img'>";
    echo "</div>";
    echo "<div id='div2'>";
    //echo "<h1>Nombre de usuario: </h1>";
    echo "<h1>".$row['nombre']."</h1>";
    echo "<h2>Sobre ".$row['nombre'].": </h2>";
    echo "<h3>".$row['descripcion'].": </h3>";
    echo "<h2>Información de contacto: </h2>";
    echo "<h3>Correo electronico: ".$row['correo']."</h3>";
    echo "<h3>Telefono: ".$row['telefono']."</h3>";
    echo "<h3>Direccion: ".$row['direccion']."</h3>";
    echo "</div>";
  }
 ?>
<hr>
 <div id="publicaciones">
   <h2 id="tiSoli">MisRides</h2>
   <?php 
$result_array2 = $publicacion_model->publicacionesByID($id);
  foreach ($result_array2 as $row) {
  echo "<div id='publi'>";
  echo " <h2>". $row['titulo'] ."</h2>";
  echo " <hr>";
  echo "<label id='labels'>Provincia:</label>";
  echo "<h5>".$row['provincia'] ."</h5>";
  echo " <hr>";
  echo "<h5>".$row['descripcion'] ."</h5>";
  echo " <hr>";
  echo "<label>Fecha del ride:</label>";
  echo "<h5>".$row['fecha'] ."</h5>";
  echo "<label>Hora de salida</label>";
  echo "<h5>".$row['hora'] ."</h5>";
  echo "<label>Espacios dispoibles: </label>";
  echo "<h5>".$row['espacios'] ."</h5>";
  echo " <hr>";
  echo "<label>Telefono:</label>";
  echo "<h5>".$row['telefono'] ."</h5>";
  echo "<label>Email:</label>";
echo "<a href='mailto:".$row['correo'] ."?Subject=Hello%20again'>".$row['correo']."</a>";
  echo "</div>";
}
 ?>
 </div>
 <div id="solicitudes">
   <h2 id="tiSoli">MisSolicitudes</h2>
      <?php 
$result_array3 = $publicacion_model->solicitudesByID($id);
  foreach ($result_array3 as $row) {
  echo "<div id='publi'>";
  echo " <h2>". $row['titulo'] ."</h2>";
  echo " <hr>";
  echo "<label id='labels'>Provincia:</label>";
  echo "<h5>".$row['provincia'] ."</h5>";
  echo " <hr>";
  echo "<h5>".$row['descripcion'] ."</h5>";
  echo " <hr>";
  echo "<label>Fecha del ride:</label>";
  echo "<h5>".$row['fecha'] ."</h5>";
  echo "<label>Hora de salida</label>";
  echo "<h5>".$row['hora'] ."</h5>";
  echo "<label>Espacios dispoibles: </label>";
  echo "<h5>".$row['espacios'] ."</h5>";
  echo " <hr>";
  echo "<label>Telefono:</label>";
  echo "<h5>".$row['telefono'] ."</h5>";
  echo "<label>Email:</label>";
echo "<a href='mailto:".$row['correo'] ."?Subject=Hello%20again'>".$row['correo']."</a>";
  echo "</div>";
}
 ?>
 </div>
</body>
