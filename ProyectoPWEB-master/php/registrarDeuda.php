<?php

include('conexion.php');
if(isset($_POST['submit'])){
	$idDeudor = $_POST['idDeudor'];
	$monto = $_POST['monto'];
	$concepto = $_POST['concepto'];

	if(empty($idDeudor) OR empty($monto) OR empty($concepto)){
		echo "<p class='err'>Debes llenar todos los campo<p/>";
	}
	

	if($idDeudor<=0) {
		echo "<p class='error'>ID del Deudor no válido<p/>";
	}

	if($monto<=0) {
		echo "<p class='error'>El campo monto no puede ser igual o menor a 0<p/>";
	}
	

	else{
		$buscarUsuario="SELECT * FROM deudores WHERE idDeudor='$idDeudor'";
		$resultado = mysqli_query($conexion, $buscarUsuario);

		//$conexion->query($buscarUsuario);

		if (mysqli_num_rows($resultado)>0) {
			$query = "INSERT INTO deudas (idDeudor, monto, fecha, concepto, adeudo, estadoDeuda)
			VALUES ($idDeudor, $monto, now(), '$concepto', $monto, 'PENDIENTE')";

			if($conexion->query($query) === TRUE) {
				echo "<p class='correcto'>Deuda creada exitosamente!!</p>";
				$id = "SELECT MAX(idDeuda) FROM deudas WHERE idDeudor='$idDeudor'";
				$result = $conexion->query($id);
				$row=mysqli_fetch_array($result);
				$deuda = $row['MAX(idDeuda)'];
				echo "<p class='correcto'>El ID de la deuda es:  $deuda</p>";
			}

			else {
				echo "<p class='error'>Error al registrar la deuda</p>".$conexion->error;
			}
		}

		else{
			echo "<p class='error'>El ID del usuario no existe<p/>";
		}	
	}
}
?>