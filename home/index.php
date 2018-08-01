<?php
  $titulo = '';
  include '../shared/header.php';
  include '../shared/nav.php';
  include '../shared/footer.php';
  include '../DbSetup.php';
  $search = isset($_GET['search']) ? $_GET['search'] : '';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    $titulo=isset($_POST['titulo']) ? $_POST['titulo'] : '';
    $provincia=isset($_POST['provincia']) ? $_POST['provincia'] : '';
    $telefono=isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
    $hora=isset($_POST['hora']) ? $_POST['hora'] : '';
    $espacios=isset($_POST['espacios']) ? $_POST['espacios'] : '';
    $tipo='hago';
    $user = $usuario_model->findUser($_SESSION['usuario_id']);
    $idUsuario=$user['id'];
    $fechapP=date('y/m/d');
    if(($titulo=='')||($telefono=='')||($direccion=='')||($descripcion=='')||($fecha=='')||($hora==''||($espacios==''))){
      echo " <script type='text/javascript'>
                alert('Todos los datos son requeridos');
            </script>";
    }else {
     $publicacion_model->insert( $idUsuario, $fecha,$titulo, $descripcion, $telefono,$direccion,$tipo,$hora,$espacios,$provincia,$fechapP);
      echo " <script type='text/javascript'>
                alert('Publicacion realizada.');
            </script>";
      //return header("Location: /home/");
    }
  }
  ?>
 
<style type="text/css">
  #publi{
    border: 1px solid;
    padding: 10px;
    box-shadow: 5px 10px #888888;
    margin-left: 20%;
    margin-top: 30px;
    margin-bottom: 30px;
    width: 800px;
  }
  #delete{
    border: 1px solid;
    float: right;
  }
  #publicar{
     border: 1px solid;
    padding: 10px;
    box-shadow: 5px 10px #888888;
    margin-left: 20%;
    margin-top: 30px;
    margin-bottom: 30px;
    width: 800px;
    padding-left: 15%;
  }
  #tittlePubli{
    margin-left: 25px;
  }

</style>

<body>
<div id="publicar">
  <h2 id="tittlePubli">Publica tu ride aquí</h2>
  <br>
  <div id="form">
  <form id="form" method="POST">
  <table>
  <tr>
    <td><label>Titulo: </label></td>
    <td><input placeholder="Ride San Jose-Cartago" type="text" name="titulo" ></td>
  </tr>
  <tr>
    <td><label>Provincia: </label></td>
    <td>
    <select name="provincia">
      <option value="San jose">San jose</option>
      <option value="Alajuela">Alajuela</option>
      <option value="Cartago">Cartago</option>
      <option value="Heredia">Heredia</option>
      <option value="Guanacaste">Guanacaste</option>
      <option value="Puntarenas">Puntarenas</option>
      <option value="Limón">Limón</option>
    </select> 
    </td>
  </tr>
  <tr>
    <td><label>Descripcion: </label></td>
    <td><input  type="text" name="descripcion" ></td>
  </tr>
  <tr>
    <td><label>Fecha del ride: </label></td>
    <td><input  type="date" name="fecha" ></td>
  </tr>
  <tr>
    <td><label>Hora de salida: </label></td>
    <td><input  type="time" name="hora" ></td>
  </tr>
   <tr>
    <td><label>Espacios diponibles: </label></td>
    <td><input  type="number" name="espacios" min="1"></td>
  </tr>
  <tr>
    <td><label>Numero de telefono: </label></td>
    <td><input placeholder="Telefono" type="text" name="telefono" ></td>
  </tr>
  <tr>
    <td><label>Email: </label></td>
    <td> <input placeholder="ejemplo@gmail.com" type="emailAddress" name="direccion"></td>
  </tr> 
  <tr>
    <td></td>
     <td> <input class="btn btn-primary" type="submit" name="" value="Publicar"></td>
  </tr>
  <tr>
    <td><label> </label></td>
    <td></td>
  </tr>
  </table>
  </form>
  </div>
</div>



<?php 
$result_array = $publicacion_model->index($search);
  foreach ($result_array as $row) {
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
  echo " <hr>";
  echo  "<a href='/usuarios/perfilPub.php?id=" . $row['idUsuario'] . "'>Ver perfil</a>";
  echo "</div>";
}
 ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
</body>


