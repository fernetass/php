<?php

//Conexion
$conexion = mysql_connect("localhost","video2brain","video2brain");
//Control
if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
//Seleccion
mysql_select_db("agenda",$conexion);
//Peticion
$peticion = mysql_query("SELECT * FROM miagenda");
//Devolveremos
while($fila = mysql_fetch_array($peticion))
{
echo $fila['Nombre'].$fila['Apellido']." ".$fila['Edad']." ".$fila['Telefono'];
echo "<br/>";
}
//Cerrar
mysql_close($conexion);

?>
