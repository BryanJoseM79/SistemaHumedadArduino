<?php  
//tomamos los datos del archivo conexion.php  
include("conexion.php");  

//declaramos variables
$id_datos = "";
$fecha = "";
$hora = "";
$var1 = "";

//hacemos nuestra consulta a la bd
$var_consulta= "SELECT * from datos";
    $var_resultado = $conexion->query($var_consulta);
//si un resultado es mayor a 0
    if($var_resultado->num_rows>0)
      {
        echo"<table border='1' align='center'>
         <tr bgcolor='#E6E6E6'>
            <th>ID</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Variable</th>
        </tr>";
//mostraremos todo lo que tenemos en la tabla datos
    while ($var_fila=$var_resultado->fetch_array())
    {
        echo "<tr>
                <td>".$var_fila["id_datos"]."</td>";
        echo "<td>".$var_fila["fecha"]."</td>";
        echo "<td>".$var_fila["hora"]."</td>";
        echo "<td>".$var_fila["var1"]."</td>";
        "</tr>";
     }
    }
    else
      {
        echo "No hay Registros";
      }

    ?>