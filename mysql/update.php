<?php

$conexion = mysql_connect("localhost","video2brain","video2brain");

mysql_select_db("agenda",$conexion);

mysql_query("UPDATE miagenda SET Edad = '24' WHERE Nombre = 'Marta' AND Apellido = 'Lopez'");

mysql_close($conexion);

?>