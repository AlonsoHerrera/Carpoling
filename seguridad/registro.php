<?php
  $titulo = '';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    include '../DbSetup.php';

    $nombre=isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $descripcion=isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $telefono=isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $contrasenna = isset($_POST['contrasenna']) ? $_POST['contrasenna'] : '';
    $password_confirmation = isset($_POST['password_confirmation']) ? $_POST['password_confirmation'] : '';
    $direccion=isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $rol=isset($_POST['rol']) ? $_POST['rol'] : '';
      //$nombre_imagen=$_FILES['foto']['name'];
      //$tipo_imagen=$_FILES['foto']['type'];
      //$tamagno_imagen=$_FILES['foto']['size'];
      // $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'\\imagenes\\';
     // move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino.$nombre_imagen);

      
    if ($contrasenna != $password_confirmation) {
      echo "<h3>Las contraseñas no coinciden</h3>";
    } else if(($nombre=='')||($correo=='')||($direccion=='')||($rol=='')||($telefono=='')||($descripcion=='')){
      echo "Todos los datos son requeridos";
    }else {
     $usuario_model->insert( $nombre, $descripcion,$telefono, $correo, $contrasenna,$direccion,$rol,'foto.jpg');
     
      echo "<h3>Usuario registrado con éxito</h3>";
     // return header("Location: /seguridad/login.php");
    }
  }
  include '../shared/header.php';
?>
<style type="text/css">
  #form{
    margin-left: 23%;
    text-align: left;

  }
</style>
<style type="text/css">
  #titulo{
    margin-left: 3%;
    float: left;
    margin-right: 70%;
  }
  #imgCar{
    height: 50px;
    width: 60px;
    margin-left: 10px;
  }
</style>
<div id="titulo">
  <h1>PublicaTuRide.com<img id="imgCar" class="jugador" src="../imagenes/car.png"></h1>
</div>
<hr>
<h2>Registrate Aquí</h2>
<body class="text-center ">
  <div id="form">
  <form id="form" method="POST">
  <table>
    <tr>
      <td><label>Nombre: </label></td>
       <td><input placeholder="Nombre" type="text" name="nombre" ></td>
  </tr>
  <tr>
    <td><label>Correo electronico: </label></td>
    <td><input placeholder="Correo" type="email" name="correo"></td>
  </tr>
  <tr>
    <td><label>Contraseña: </label></td>
    <td><input placeholder="Contraseña" type="password" name="contrasenna"></td>
  </tr>
  <tr>
     <td><label>Confirmar contraseña: </label></td>
     <td><input placeholder="Confirmar contraseña" type="password" name="password_confirmation"></td>
  </tr>
  <tr>
    <td><label>Numero de telefono: </label></td>
    <td><input placeholder="Telefono" type="text" name="telefono" ></td>
  </tr>
  <tr>
    <td><label>Direccion: </label></td>
    <td> <input placeholder="Direccion" type="text" name="direccion"></td>
  </tr>
  <tr>
     <td><label>Descripcion del perfil: </label></td>
     <td><input placeholder="Descripcion" type="text" name="descripcion"></td>
  </tr>
  <tr>
    <td><label for="foto">Foto de perfil: </label></td>
    <td><input type="file" name="foto" size="20"></td>
  </tr>    
  <tr>
    <td><label>Rol: </label></td>
    <td><select class="btn-info" name="rol">
      <option  value="Administrador" >Administrador</option>
      <option  value="Cliente">Cliente</option>
    </select> </td>
  </tr>
  <tr>
     <td><a href="/seguridad/login.php">Login</a></td>
     <td> <input class="btn btn-primary" type="submit" name="" value="Registrarme!"></td>
  </tr>
  <tr>
    <td><label> </label></td>
    <td></td>
  </tr>
  </table>
  </form>
  </div>
</body>
<?php
include '../shared/footer.php';
?> 