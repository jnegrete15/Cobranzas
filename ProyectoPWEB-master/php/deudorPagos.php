<?php
    $id=$row['idDeudor'];
    $abonos="SELECT * FROM pagos WHERE idDeudor='$id'"; 
    $pagos = $conexion->query($abonos);
    echo "<table border='1'>  
        <tr>
        <th>ID Deuda</th>
        <th>Monto</th>
        <th>Fecha</th>
    </tr>";
        while($res=mysqli_fetch_array($pagos)){
                echo 	"<tr>";
                echo 	"<td>"  . $res['idDeuda']."</td>";
                echo 	"<td>" .'$'.$res['monto']."</td>";
                echo 	"<td>"  . $res['fecha']."</td>";           
                echo 	"</tr>";
        }
    echo "</table>";
    mysqli_free_result($pagos);	
?>