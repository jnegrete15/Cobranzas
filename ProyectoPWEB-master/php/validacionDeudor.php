<?php
if(isset($_POST['submit'])){
	include('conexion.php');
	
	$correo = $_POST['correo'];
	$contra = $_POST['contraseña'];
 
	$existeDeudor="SELECT * FROM deudores WHERE `password`='$contra' AND correo='$correo'"; 
	$consulta = $conexion->query($existeDeudor);

	// if(empty($correo) OR empty($contra)){
	// 	echo "<p class='err'>Hay campos sin llenar </p>";
	// }

	if(mysqli_num_rows($consulta)>0){
		session_start();
		$_SESSION['correo'] = $correo;
		header("Location: ../html/deudorInterfaz.php");
		mysqli_close($conexion);
		mysqli_free_result($consulta);
	}
	else{
		echo "<p class='error'>Los datos que proporcionaste no son correctos<p/>";
		mysqli_close($conexion);
	 	mysqli_free_result($consulta);		
	}
}
?>