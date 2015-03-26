<?php
session_start();

//Definimos la codificación de la cabecera.
header('Content-Type: text/html; charset=utf-8');
//Importamos el archivo con las validaciones.
require_once 'funciones/validaciones.php';
include_once "conexion.php";


function verificar_usuario($user)
{
	var_dump($user);
	$sql = "SELECT * FROM usuarios WHERE nombre= '$user'";
	$rec = mysql_query($sql);
	$count = 0;
	while($row = mysql_fetch_object($rec))
	{
		$count++;
	}
	if($count == 1)
	{
		return 1;
	}
	else
	{
		return 0;
	}
}




$nombre=$_POST['nombre'];
$edad=$_POST['edad'];
$telefono=$_POST['telefono'];
$pais=$_POST['pais'];
$email=$_POST['email'];
$pass=$_POST['pass'];

$_SESSION['imp']=$_POST;

//Este array guardará los errores de validación que surjan.
$errores = array();


//Valida que el campo nombre no esté vacío.
if (!validaRequerido($nombre)) {
	$errores[]=true;
	$_SESSION['error1'] = 'El campo nombre es incorrecto.';
}
//Valida la edad con un rango de 3 a 130 años.
$opciones_edad = array(
	'options' => array(
		//Definimos el rango de edad entre 3 a 130.
		'min_range' => 3,
		'max_range' => 130
	)
);
if (!validarEntero($edad, $opciones_edad)) {
	$errores[]=true;
	$_SESSION['error2'] = 'El campo edad es incorrecto.';
}
	
//Valida que el campo telefono no esté vacío.
if (!validaRequerido($telefono)) {
	$errores[]=true;
	$_SESSION['error3'] = 'El campo nombre es incorrecto.';
}	
//Valida que el campo pais este seleccionado.
if($pais=="Seleccione")
{
	$errores[]=true;
	$_SESSION['error4']="Debe seleccionar un pais";
}

//Valida que el campo email sea correcto.
if (!validaEmail($email)) {
	$errores[]=true;
	$_SESSION['error5'] = 'El campo email es incorrecto.';
}

if (!validaRequerido($pass))
{
	$errores[]=true;
	$_SESSION['error6']="Debe generar una contraseña";
}


if(count($errores)>0)
{
header('location:registro.php');	
}
else
{
	if(verificar_usuario($nombre)){
		$errores[]=true;
		$_SESSION['error8']="Nombre usuario existente";
		header('location:registro.php');
	}else{
		
		$_SESSION['exito']="El registro se ha logrado con éxito";
		header('location:registro.php');
		mysql_query("INSERT INTO usuarios (nombre, edad, telefono, pais,email,pass)
		VALUES ('$nombre','$edad','$telefono','$pais','$email','$pass')");
		mysql_close($conexion);
	}
}






















?>