<?php

date_default_timezone_set("America/Santiago");

//introducimos variables
  
  $fecha = date('Y-m-d');
  $hora = date('H:i:s');
  //$var1 = $_GET['temp_c'];
  //$var2 = $_GET['var2'];
  
  

//creamos la conexion a la bd
  $conexion = mysqli_connect('localhost','root','','grupo4_vespertino');

///hacemos la consulta a la bd

$sql = "INSERT INTO datos (fecha, hora, var1, var2)
VALUES('".$fecha."',
       '".$hora."',
       '".$_GET['temp_c']."'
       '".$_GET['humedad']."'
       )";

//realizamos consulta mas la conexion

$res = mysqli_query($conexion, $sql);



?>