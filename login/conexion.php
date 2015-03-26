<?php

// datos para la coneccion a mysql

define('DB_SERVER','localhost');

define('DB_NAME','login');

define('DB_USER','video2brain');

define('DB_PASS','video2brain');

$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);

mysql_select_db(DB_NAME,$con);

?>