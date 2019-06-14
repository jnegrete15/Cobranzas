<?php
	include("../php/conexion.php");
		session_start();
		if(!isset($_SESSION["administrador"])){
			header("Location: invalido.html");
		}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Deudor</title>
	<link rel="stylesheet" href="../css/cssBootstrap/bootstrap.css">
	<link rel="stylesheet" href="../css/cssPersonalizado/estiloformularios.css">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
</head>
<body>
	
	<div class="principal container">
		<div class="formulario container text-center">
			<h2>Completa el Formulario</h2>
			<button onclick="location.href = '../php/cerrarSesion.php'">Cerrar Sesión</button>			
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
				<img src="../img/user.png" width="120xp" height="120px"><br>
				<h3>Agregar nuevo deudor</h3>
				<input type="text" placeholder="Nombre" name="nombre" value="<?php if(isset($nombre)) echo $nombre ?>" required="">
				<input type="number" placeholder="Teléfono" name="telefono" required="">
				<input type="email" placeholder="E-mail" name="correo" required="" >
				<input type="password" placeholder="Contraseña" name="contraseña" required="">
				<input type="submit" name="submit" id="enviar" value="Registrar"><br>
				<a href="administrador.php">Regresar</a>
				<?php
					include("../php/registrarDeudor.php");
				?>
			</form>
		</div>
	</div>
</body>
</html>