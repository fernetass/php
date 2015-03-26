<?php
session_start();
require_once 'funciones/validaciones.php';
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$edad=$_POST['edad'];


$_SESSION['imp']=$_POST;

$errores=array();

if (!ctype_alpha($nombre) || (strlen($nombre)>10)|| $nombre=="")
{
	$errores[]=true;
	$_SESSION['error1']="el nombre debe ser solo caracteres y tener longitud max 10";
}


if (!ctype_alpha($apellido) || (strlen($apellido)>10) || $apellido=="")
{
	$errores[]=true;
	$_SESSION['error2']="el apellido debe ser solo caracteres y tener longitud max 10";
}

if(!is_numeric($edad) || $edad=="")
{
	$errores[]=true;	
	$_SESSION['error3']="la edad debe ser numerica";
}




if(count($errores)>0)
{
header('location:registro1.php');	
}
else
{
	$_SESSION['exito']="El registro se ha logrado con éxito";
header('location:registro1.php');
}





























?>
