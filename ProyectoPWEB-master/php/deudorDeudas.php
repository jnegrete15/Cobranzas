<?php
$deudas="SELECT * FROM deudas WHERE idDeudor='$id'"; 
$deuda = $conexion->query($deudas);
echo "<table border='1'>  
    <tr>
        <th>ID deuda</th>
        <th>Monto</th>
        <th>Fecha</th>
        <th>Concepto</th>
        <th>Adeudo</th>
        <th>Status</th>
    </tr>";
        while($pay=mysqli_fetch_array($deuda)){
                echo 	"<tr>";
                echo  	"<td>"  . $pay['idDeuda']."</td>";
                echo 	"<td>" .'$' . $pay['monto']."</td>";
                echo 	"<td>"  . $pay['fecha']."</td>";
                echo 	"<td>"  . $pay['concepto']."</td>";
                echo 	"<td>". '$' . $pay['adeudo']."</td>"; 
                if($pay['estadoDeuda']=='PENDIENTE'){
                    echo "<td class='error'>"  . $pay['estadoDeuda']."</td>";           
                }
                else{ 
                    echo "<td class='correcto'>"  . $pay['estadoDeuda']."</td>";           

                }      
   				echo 	"</tr>";            
                echo 	"</tr>";
        }
    echo "</table>";
    mysqli_free_result($deuda);

?>