<?php

date_default_timezone_set("America/Santiago");

//introducimos variables
  $temperatura = $_GET['temperatura'];
  $humedad = $_GET['humedad'];
  $fecha = date('Y-m-d');
  $hora = date('H:i:s');
  

//creamos la conexion a la bd
  $conexion = mysqli_connect('localhost','root','','grupo4_vespertino');
/*
//hacemos la consulta a la bd

  $sql = "INSERT INTO datos (temperatura, humedad, fecha, hora)
          VALUES('".$_GET['temperatura']."',
                 '".$_GET['humedad']."',
                 '".$fecha."',
                 '".$hora."')";
                 

//realizamos consulta mas la conexion
  
  $res = mysqli_query($conexion, $sql);

*/

?>