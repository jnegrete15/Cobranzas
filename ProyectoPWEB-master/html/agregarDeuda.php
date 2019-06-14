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
	<title>Registrar Deuda</title>
	<link rel="stylesheet" href="../css/cssBootstrap/bootstrap.css">
	<link rel="stylesheet" href="../css/cssPersonalizado/estiloformularios.css">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<div class="principal container">
		<div class="formulario container text-center">
			<h2>Completa el Formulario</h2>
		<button onclick="location.href = '../php/cerrarSesion.php'">Cerrar Sesión</button>			
			<form action="<?php echo
			htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
				<img src="../img/deuda.png" width="120xp" height="120px"><br>
				<h3>Registrar Deuda</h3>
				<input type="Number" placeholder="Id Deudor"  name="idDeudor" value="<?php if(isset($idDeudor)) echo $idDeudor ?>" required=" required="Completa los campos">
				<input type="Number" placeholder="Monto" name="monto" value="<?php if(isset($monto)) echo $monto ?>" required="required="Completa los campos">
				<input type="text" placeholder="Concepto" name="concepto" value="<?php if(isset($concepto)) echo $concepto ?>" required="required="Completa los campos">
				<input type="submit" name="submit" id="enviar" value="Registrar"><br>
				<a href="administrador.php">Regresar</a>
				<?php
					include("../php/registrarDeuda.php");
				?>
			</form>
		</div>
	</div>
</body>
</html>