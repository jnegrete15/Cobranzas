<?php
include("conexion.php");
if(isset($_POST['submit'])){
$agrupar = $_POST['agrupar'];
$deudor = $_POST['idDeudor'];

if($deudor==null){
    $sql = "SELECT D.idDeuda, D.idDeudor, a.correo, D.monto, D.fecha, D.concepto, D.adeudo, D.estadoDeuda
    FROM deudas D, deudores a
    WHERE a.idDeudor=D.idDeudor AND fecha LIKE '$agrupar'
    ORDER BY idDeudor";
}
else{
    $sql = "SELECT D.idDeuda, D.idDeudor, a.correo, D.monto, D.fecha, D.concepto, D.adeudo, D.estadoDeuda
    FROM deudas D, deudores a
    WHERE a.idDeudor=D.idDeudor AND fecha LIKE '$agrupar' AND D.idDeudor=$deudor
    ORDER BY idDeudor";
}
    #echo $agrupar;
    $result = $conexion->query($sql);
        // output data of each row
        echo "<table border='1'>  
        <tr>
            <th>ID Deuda</th>
            <th>ID Deudor</th>
            <th>Correo del Deudor</th>
            <th>Monto de la deuda</th>
            <th>Fecha</th>
            <th>Concepto</th>
            <th>Adeudo</th>
            <th>Status</th>
        </tr>";
            while($row=mysqli_fetch_array($result)){
                    echo 	"<tr>";
                    echo  	"<td>"  . $row['idDeuda']."</td>";
                    echo 	"<td>"  . $row['idDeudor']."</td>";
                    echo  	"<td>"  . $row['correo']."</td>";
                    echo 	"<td>"  . $row['monto']."</td>";
                    echo 	"<td>"  . $row['fecha']."</td>";
                    echo 	"<td>"  . $row['concepto']."</td>"; 
                    echo 	"<td>"  . $row['adeudo']."</td>";
                    if($row['estadoDeuda']=='PENDIENTE'){
                        echo "<td class='error'>"  . $row['estadoDeuda']."</td>";           
                    }
                    else{ 
                        echo "<td class='correcto'>"  . $row['estadoDeuda']."</td>";           

                    }      
                    echo 	"</tr>";
            }
        echo "</table>";
        mysqli_free_result($result);
        mysqli_close($conexion);	
}
?>
