<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Consultar Abonos</title>
	<link rel="stylesheet" href="../css/cssBootstrap/bootstrap.css">
	<link rel="stylesheet" href="../css/cssPersonalizado/consultarabonos.css">
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
	<div class="principal container-fluid text-center">
		<h1>Tabla de abonos por cliente</h1>
		<button onclick="location.href = '../php/cerrarSesion.php'">Cerrar Sesión</button>		
		<div class="contenido container text-center">
		<h3>Elige el mes para filtrar:</h3>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>"   method="POST">
			<select name="agrupar">
				<option value="%-01-%">Enero</option>
				<option value="%-02-%">Febrero</option>
				<option value="%-03-%">Marzo</option>
				<option value="%-04-%">Abril</option>
				<option value="%-05-%">Mayo</option>
				<option value="%-06-%">Junio</option>
				<option value="%-07-%">Julio</option>	
				<option value="%-08-%">Agosto</option>
				<option value="%-09-%">Septiembre</option>
				<option value="%-10-%">Octubre</option>
				<option value="%-11-%">Noviembre</option>
				<option value="%-12-%">Diciembre</option>
				<option value="%2019%">Todos</option>
				</select><br><br>
				<h3>Seleciona el ID del deudor</h3>
				<input type="Number" placeholder="ID Deudor" name="idDeudor">	
				<input type="submit" name="submit" id="enviar" value="Aplicar"><br>
				<a href="administrador.php">Regresar</a><br> 
				<br> 
			</form>	
			<table>
				<?php 
				include('../php/consultarAbonos.php');
				?>
			</table>

		</div>
	</div>
</body>
</html>