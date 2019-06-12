<?php
include('conexion.php');

if(isset($_POST['submit'])){
$idDeudor = $_POST['idDeudor'];
$idDeuda = $_POST['idDeuda'];
$monto = $_POST['monto'];

	
if(empty($idDeuda) OR empty($idDeudor) OR empty($monto)){
	echo "<p class='error'>Debes llenar todos los campos<p/>";
}

else{
	$buscarUsuario="SELECT * FROM deudores WHERE idDeudor='$idDeudor'";
	$buscarDeuda="SELECT * FROM deudas WHERE idDeudor='$idDeudor'";
	$consultaUsuario = mysqli_query($conexion, $buscarDeuda);
	$consultaDeuda = mysqli_query($conexion, $buscarDeuda);

#		$conexion->query($buscarUsuario);

	if (mysqli_num_rows($consultaUsuario)>0 AND mysqli_num_rows($consultaDeuda)>0) {
		$query = "INSERT INTO pagos (idDeuda, idDeudor, monto, fecha)
		VALUES ($idDeuda, $idDeudor, $monto, now())";

		if($conexion->query($query) === TRUE) {
			echo "<p class='correcto'>Abono registrado!!</p>";
		}

		else {
			echo "<p class='error'>Error al registrar el abono</p>".$conexion->error;
		}
	}	
	else{
		echo "<p class='error'>El ID del usuario o el de la deuda son incorretos <p/>";
	}
	mysqli_free_result($consultaDeuda);
	mysqli_free_result($consultaUsuario);
	mysqli_close($conexion);
}
}
?>
