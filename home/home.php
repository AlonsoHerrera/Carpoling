<?php 
$titulo = 'Solicitar Ride';
    $titulo = '';
  include '../shared/header.php';
  include '../shared/nav.php';
  include '../shared/footer.php';
  include '../DbSetup.php';
  $search = isset($_GET['search']) ? $_GET['search'] : '';

 ?>
<style type="text/css">
	#img1{
		margin-left: 18%;
		height: 500px;
		width: 65%;
	}
</style>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Home</title>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
 	<br>
 	<img id="img1" src="https://d2ymzkn1ailq93.cloudfront.net/wp-content/uploads/2017/01/neighbor-carpooling-app-snapmunk.jpg" class="img-fluid" alt="Responsive image">
 	<br>
 	<br>
	 <div class="container">
	  <div class="jumbotron">
	    <h1>Publica tu ride news!!!!</h1>      
	    <p>Ya llegamos a los 11.500 usuarios con mas de 300.000 rides completados.</p>
	  </div>  
	</div>
 </body>
 </html>