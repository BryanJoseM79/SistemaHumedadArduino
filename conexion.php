<?php

date_default_timezone_set("America/Santiago");

//introducimos variables
  
  $fecha = date('Y-m-d');
  $hora = date('H:i:s');
  $var1 = $_GET['var1'];
  

//creamos la conexion a la bd
  $conexion = mysqli_connect('localhost','root','','grupo4_vespertino');

///hacemos la consulta a la bd

$sql = "INSERT INTO datos (fecha, hora, var1)
VALUES('".$fecha."',
       '".$hora."',
       '".$_GET['var1']."')";

//realizamos consulta mas la conexion

$res = mysqli_query($conexion, $sql);



?>