<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="../css/cssBootstrap/bootstrap.css">
	<link rel="stylesheet" href="../css/cssPersonalizado/estilologin.css">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
</head>
<body>
	
	<div class="principal container">
		<div class="formulario container text-center">
			<h2>Completa el Formulario</h2>
			<form action="../php/validacionDeudor.php" method="POST">
				<img src="../img/boy.png" width="105xp" height="105px"><br>
				<h3>Deudor</h3>
				<h3>Escribe tus credenciales</h3>
				<input type="mail" placeholder="Correo o telefono" name="correo" required="">
				<input type="password" placeholder="Contraseña" name="contraseña" required="">
				<input type="submit" name="submit" id="enviar"><br>
				<a href="../index.html">Regresar</a>
				<?php
					include("../php/validacionDeudor.php");
				?>
			</form>
		</div>
	</div>
</body>
</html>