<?php

// Create connection
include('conexion.php');
if(isset($_POST['submit'])){
	$nombre = $_POST['nombre'];
	$telefono = $_POST['telefono'];
	//settype($telefono,"string");
	$correo = $_POST['correo'];
	$contraseña = $_POST['contraseña'];

	if(empty($nombre) OR empty($telefono) OR empty($correo) OR empty($contraseña)){
		echo "<p class='error'>Debes llenar todos los campos</p>";
	}

	else{
		$buscarUsuario="SELECT * FROM deudores WHERE correo='$correo' or telefono='$telefono'";
		$consulta = $conexion->query($buscarUsuario);
		#$consulta = mysqli_query($conexion, $buscarUsuario);
		
		if (mysqli_num_rows($consulta)>=1) {
			echo "<p class='error'>Ya hay un usuario con esa cuenta de correo o número de teléfono, por favor elige otra<p/>";
			#echo "<a href='index.html'>Por favor escoga otro Nombre</a>";
		}

		else{
		#	$contraseñaEncriptada = password_hash($contraseña, PASSWORD_BCRYPT);
			$query = "INSERT INTO deudores (`nombre`, `telefono`, `correo`, `password`, `deudaTotal`)
			VALUES ('$nombre', '$telefono', '$correo', '$contraseña',0)";

			if($conexion->query($query) === TRUE) {
				echo "<p class='correcto'>Usuario creado exitosamente!!</p>";
				$id = "SELECT MAX(idDeudor) FROM deudores WHERE correo='$correo'";
				$result = $conexion->query($id);
				$row=mysqli_fetch_array($result);
				$deudor = $row['MAX(idDeudor)'];
				echo "<p class='correcto'>El ID del deudor es:  $deudor</p>";
			}

			else {
				echo "<p class='error'>Fallo al crear el usuario: </p>".$conexion->error;
			}
		}
	}
}
?>