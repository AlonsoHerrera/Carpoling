<?php
  $titulo = '';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../DbSetup.php';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $contrasenna = isset($_POST['contrasenna']) ? $_POST['contrasenna'] : '';
    $usuario = $usuario_model->find($correo, $contrasenna);
    if (isset($usuario)) {
      session_start();
      $_SESSION['usuario_id'] = $usuario['id'];
      return header("Location: /home");
    } else {
      echo "<h3>Usuario o contraseña invalido</h3>";
    }
  }
  include '../shared/header.php';
?>
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
<h2>Iniciar sesion</h2>
<br>
<body class="text-center">
  <form class="form-signin" method="POST">
    <input type="email" id="inputEmail" placeholder="Correo electronico" name="correo" value="<?= isset($_POST['correo']) ? $_POST['correo'] : ''; ?>">
    <br>
    <input type="password" placeholder="Contraseña" name="contrasenna">
    <br>
    <br>
    <input class="btn btn-primary" type="submit" name="" value="Login!">
    <a href="/seguridad/registro.php">Registrarse</a>
    <br>
    <a href="mailto:publicaturide@gmail.com?Subject=Hello%20again" target="_top">¿Olvidaste tu contraseña?</a>
  </form>
</body>
<?php
include '../shared/footer.php';
?>


