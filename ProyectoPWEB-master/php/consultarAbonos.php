<?php

include("conexion.php");
if(isset($_POST['submit'])){
    $agrupar = $_POST['agrupar'];
    $deudor = $_POST['idDeudor'];
    if(isset($deudor)){
        $sql = "SELECT A.idDeudor, A.idDeuda, A.monto, A.fecha, d.correo FROM pagos A, deudores d 
        WHERE A.idDeudor=d.idDeudor AND A.fecha LIKE '$agrupar' and A.idDeudor=$deudor 
        ORDER BY idDeudor";
    }
    if($deudor==null){
        $sql = "SELECT A.idDeudor, A.idDeuda, A.monto, A.fecha, d.correo FROM pagos A, deudores d 
        WHERE A.idDeudor=d.idDeudor AND A.fecha LIKE '$agrupar' 
        ORDER BY idDeudor";
    }
    $result = $conexion->query($sql);
        // output data of each row
        echo "<table border='1'>  
        <tr>
            <th>ID Deudor</th>
            <th>ID Deuda</th>
            <th>Monto del pago</th>
            <th>Fecha</th>
            <th>Correo del Deudor</th>
        </tr>";
            while($row=mysqli_fetch_array($result)){
                    echo 	"<tr>";
                    echo  	"<td>"  . $row['idDeudor']."</td>";
                    echo 	"<td>"  . $row['idDeuda']."</td>";
                    echo 	"<td>" . $row['monto']."</td>";
                    echo 	"<td>"  . $row['fecha']."</td>";
                    echo 	"<td>"  . $row['correo']."</td>";                 
                    echo 	"</tr>";
            }
        echo "</table>";
        mysqli_free_result($result);
        mysqli_close($conexion);	
}
?>