<?php

session_start(); //session_start() crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie 

include_once "conexion.php"; //es la sentencia q usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente.

/*Función verificar_login() --> Vamos a crear una función llamada verificar_login, esta se encargara de hacer una consulta a la base de datos para saber si el usuario ingresado es correcto o no.*/



function verificar_login($user,$password,&$result)
{
        $sql = "SELECT * FROM usuarios WHERE usuario = '$user' and password = '$password'";
        $rec = mysql_query($sql);
        $count = 0;
        while($row = mysql_fetch_object($rec))
        {
            $count++;
            $result = $row;
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



/*Luego haremos una serie de condicionales que identificaran el momento en el boton de login es presionado y cuando este sea presionado llamaremos a la función verificar_login() pasandole los parámetros ingresados:*/



if(!isset($_SESSION['userid'])) //para saber si existe o no ya la variable de sesión que se va a crear cuando el usuario se logee
{
    if(isset($_POST['login'])) //Si la primera condición no pasa, haremos otra preguntando si el boton de login fue presionado
    {
        if(verificar_login($_POST['user'],$_POST['password'],$result) == 1) //Si el boton fue presionado llamamos a la función verificar_login() dentro de otra condición preguntando si resulta verdadero y le pasamos los valores ingresados como parámetros.
        {
            /*Si el login fue correcto, registramos la variable de sesión y al mismo tiempo refrescamos la pagina index.php.*/
            $_SESSION['userid'] = $result->idusuario;
            header("location:index.php");
        }
        else
        {
            echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>'; //Si la función verificar_login() no pasa, que se muestre un mensaje de error.
        }
    }
?>

<style type="text/css">
*{
	font-size: 14px;
}
form.login {
    background: none repeat scroll 0 0 #F1F1F1;
    border: 1px solid #DDDDDD;
    font-family: sans-serif;
    margin: 0 auto;
    padding: 20px;
    width: 278px;
}
form.login div {
    margin-bottom: 15px;
    overflow: hidden;
}
form.login div label {
    display: block;
    float: left;
    line-height: 25px;
}
form.login div input[type="text"], form.login div input[type="password"] {
    border: 1px solid #DCDCDC;
    float: right;
    padding: 4px;
}
form.login div input[type="submit"] {
    background: none repeat scroll 0 0 #DEDEDE;
    border: 1px solid #C6C6C6;
    float: right;
    font-weight: bold;
    padding: 4px 20px;
}
.error{
    color: red;
    font-weight: bold;
    margin: 10px;
    text-align: center;
}
</style>

<form action="" method="post" class="login">

    <div><label>Username</label><input name="user" type="text" ></div>

    <div><label>Password</label><input name="password" type="password"></div>

    <div><input name="login" type="submit" value="login"></div>

</form>

<?php

} else {

    // Si la variable de sesión ‘userid’ ya existe, que muestre el mensaje de saludo.

    echo 'Su usuario ingreso correctamente.';

    echo '<a href="logout.php">Logout</a>';

}

?>

