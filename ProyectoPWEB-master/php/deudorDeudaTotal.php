<?php
    $correo = $_SESSION["correo"];
    $deudaTotal="SELECT * 
    FROM deudores
    WHERE correo='$correo'"; 
    $consulta = $conexion->query($deudaTotal);
    $row=mysqli_fetch_array($consulta);
    $total = $row['deudaTotal'];
    echo "<p class='deudaTotal'>$$total</p>";
    mysqli_free_result($consulta);
?>