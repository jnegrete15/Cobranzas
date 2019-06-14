<?php
	include("../php/conexion.php");
		session_start();
		if(!isset($_SESSION["correo"])){
			header("Location: invalido.html");
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Deudor</title>
	<link rel="stylesheet" href="../css/cssBootstrap/bootstrap.css">
	<link rel="stylesheet" href="../css/cssPersonalizado/estilodeudor.css">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container-fluid text-center">
		<h1>Bienvenido <?php echo $_SESSION['nombre'];?></h1>
		<button onclick="location.href = '../php/cerrarSesion.php'">Cerrar Sesion</button>
		<div class="container-fluid row">
			<div class="col-lg-6 text-center">
				<h3>Deuda total</h3>
				<img src="../img/deuda.png" alt="deuda"><br><br>
				<div class="deudaTotal">
				<?php
					include("../php/deudorDeudaTotal.php");
				?>
				</div>
				<h3>Tu ID:</h3>
				<div class="deudaTotal">
					<?php
					echo $row['idDeudor'];
					?>
				</div>
			</div>
			<div class="col-lg-6 text-center">
				<h1>Pagos realizados</h1>
				<div class="pagos">
					<table name="pagos">
					<?php
						include("../php/deudorPagos.php");						
					?>
					</table><br><br>

					<table name="deuda">
				<h1>Deudas asignadas</h1>
				<?php
					include("../php/deudorDeudas.php");
				?>	
					</table><br><br><br>
				</div>
			</div>
		</div>
	</div>
</body>
</html>