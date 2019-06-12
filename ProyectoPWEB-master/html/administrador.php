<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrador</title>
	<link rel="stylesheet" href="../css/cssBootstrap/bootstrap.css">
	<link rel="stylesheet" href="../css/cssPersonalizado/estiloadministrador.css">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
</head>
<body>
		<?php
	include("../php/conexion.php");
		session_start();
		if(!isset($_SESSION["administrador"])){
			header("Location: invalido.html");
		}
	?>
	<div class="Principal container-fluid">

		<div class="Opciones container text-center">
			<h1>Opciones de administrador</h1><br>
			<h1>Bienvenido</h1> 
		<button onclick="location.href = '../php/cerrarSesion.php'">Cerrar Sesión</button>
			<div class="Seleccion row">
				<div class="opcion col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<a href="agregarAbono.php"><img src="../img/payment.png" alt="Administrador"></a>
					<h3>Registrar Abono</h3>
				</div>

				<div class="opcion col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<a href="consultarAbonos.php"><img src="../img/checkpay.png" alt="Administrador"></a>
					<h3>Consultar Abonos</h3>
				</div>
			</div> 

			<div class="Seleccion row">
				<div class="opcion col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<a href="agregarDeuda.php"><img src="../img/deuda.png" alt="Administrador"></a>
					<h3>Registrar Deuda</h3>
				</div>

				<div class="opcion col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<a href="consultarDeudas.php"><img src="../img/check.png" alt="Administrador"></a>
					<h3>Consultar Deudas</h3>
				</div>
			</div>

			<div class="Seleccion row">
				<div class="opcion container col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<a href="agregarDeudor.php"><img src="../img/user.png" alt="Administrador"></a>
					<h3>Nuevo Deudor</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="Pie container-fluid text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h5>Valdemar Gerzain Magaña NIcolás</h5>
		<h5>Jose Alberto Negrete Gonzalez</h5>
	</div>
</body>
</html>