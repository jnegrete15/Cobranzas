<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="../css/cssBootstrap/bootstrap.css">
	<link rel="stylesheet" href="../css/cssPersonalizado/estilologin.css">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
	<script src="../js/validarAdminLogin.js"></script>
</head>
<body>
	<div class="Principal container-fluid">
		<div class="Formulario container text-center">
			<h1>Bienvenido</h1>
			<form action="../php/validacionAdmin.php" method="POST">
				<img src="../img/boss.png" width="120px" height="120px" alt=""> 
				<h3>Administrador</h3>
				<h3>Escribe tus credenciales</h3>
				<input type="text" name="usuario" placeholder="Usuario" required="Campo obligatorio" 
				value="<?php if(isset($usuario)) echo $usuario ?>"><br>
				<input type="password" name="contraseña" placeholder="Contraseña" required="Campo obligatorio"><br>
				<input type="submit" name="submit" id="enviar"><br>
				<?php
				include("../php/validacionAdmin.php");
				?>
				<a href="../index">Regresar</a>
			</form>
		</div>
	</div>
	<div class="Pie container-fluid text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h5>Valdemar Gerzain Magaña Nicolás</h5>
		<h5>José Alberto Negrete González</h5>
	</div>
</body>
</html>
