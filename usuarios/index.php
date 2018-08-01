<?php
  $titulo = 'Editar Cuenta';
    $titulo = '';
  include '../shared/header.php';
  include '../shared/nav.php';
  include '../shared/footer.php';
  include '../DbSetup.php';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
   $nombre=isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $descripcion=isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $telefono=isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $contrasenna = isset($_POST['contrasenna']) ? $_POST['contrasenna'] : '';
    $password_confirmation = isset($_POST['password_confirmation']) ? $_POST['password_confirmation'] : '';
    $direccion=isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $rol=isset($_POST['rol']) ? $_POST['rol'] : '';
    $foto="foto.png";
    $id = $usuario_model->findUser($_SESSION['usuario_id']);

    if ($contrasenna != $password_confirmation) {
      echo "<script type='text/javascript'>
              alert('Las contraseñas no coinciden!');
            </script>";
    }else if(($nombre=='')||($correo=='')||($direccion=='')||($rol=='')||($telefono=='')||($descripcion=='')){
      echo "<script type='text/javascript'>
              alert('Todos los datos son requeridos!');
            </script>";
    }else{
      
     $usuario_model->update( $id['id'],$nombre, $descripcion,$telefono, $correo, $contrasenna,$direccion,$rol,$foto);
     echo "<script type='text/javascript'>
              alert('Usuario registrado!');
            </script>";
      //return header("Location: /home/index.php");
    }
  }
  $usuario = $usuario_model->findUser($_SESSION['usuario_id']);

  include '../shared/header.php';
?>

<style type="text/css">
  #form{
    margin-left: 20%;
    text-align: left;

  }
</style>

<body class="text-center">
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
    <td><label>Foto de perfil: </label></td>
    <td><input type="file" name="imagen" size="20"></td>
  </tr>    
  <tr>
    <td><label>Rol: </label></td>
    <td><select class="btn-info" name="rol">
      <option  value="Administrador" >Administrador</option>
      <option  value="Cliente">Cliente</option>
    </select> </td>
  </tr>
  <tr>
     <td>Aplicar cambios: </td>
     <td> <input class="btn btn-primary" type="submit" name="" value="Aplicar"></td>
  </tr>
  <tr>
    <td><label> </label></td>
    <td></td>
  </tr> 
  </table>
  </form>
  </div>
       <td><a href="http://localhost/home/">Home</a></td>

</body>
<?php
include '../shared/footer.php';
?>

