<?php
if(isset($_POST['submit'])){
	$usuario = $_POST['usuario'];
	$contraseña = $_POST['contraseña'];

	include('conexion.php');
	$buscarUsuario="SELECT usuario FROM propietarios WHERE `usuario`='$usuario' AND `password`='$contraseña'"; 
	$consulta = $conexion->query($buscarUsuario);

	if(mysqli_num_rows($consulta)>0){
	    header("Location:../html/administrador.php");
	    session_start();
		$_SESSION['administrador'] = $usuario;
		mysqli_close($conexion);
		mysqli_free_result($consulta);
	}
	else{
		echo "<p class='error'>El usuario o la contraseña no son correctos <p/>";

	}
}
?>