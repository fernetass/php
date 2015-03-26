<?php

$conexion = mysql_connect("localhost","video2brain","video2brain");

if(!$conexion){
die ("No he podido conectar por la siguiente razon: ".mysql_error());
}

mysql_select_db("agenda",$conexion);

mysql_query("INSERT INTO miagenda (Nombre, Apellido, Edad, Telefono)
VALUES ('Jose Vicente','Carratala',32,'000001')");

mysql_query("INSERT INTO miagenda (Nombre, Apellido, Edad, Telefono)
VALUES ('Miguel','Sanchez',40,'000011')");

mysql_close($conexion);

?>