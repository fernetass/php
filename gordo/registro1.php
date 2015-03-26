<?php
session_start();

$imprimir=$_SESSION['imp'];


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registrate</title>
</head>

<body>
<div id="contenedor">
  <div id="tit"> Formulario de Registro:</div>
  
  
  <?php
  if(isset($_SESSION['exito']))
  {
	  echo "<center><p><font color='blue'>".$_SESSION['exito']."</font><p></center>";
  }
  else
  {
	  echo "";
  }
  unset($_SESSION['exito']);
  
  
  ?>
  
  
  
  <form id="form1" name="form1" method="post" action="enviar1.php">
    <p>Nombre:<br />
      <input name="nombre" type="text"  value="<?php echo $imprimir['nombre']; ?>" />
      
      
      <?php

	  if(isset($_SESSION['error1']))
	  {
		  echo "<font color='red'>".$_SESSION['error1']."</font>";
	  }
	  else
	  {
		  echo "";
	  }
	  
	  unset($_SESSION['error1']);
	  
	  ?>
      
    </p>
    
    
    
    
    
    <p>Apellido:<br />
      <input name="apellido" type="text"  value="<?php echo $imprimir['apellido']; ?>" />
      <?php
	  
	  
	  if(isset($_SESSION['error2']))
	  {
		  echo "<font color='red'>".$_SESSION['error2']."</font>";
	  }
	  else
	  {
		  echo "";
	  }
	  
	  unset($_SESSION['error2']);
	  
	  ?>
    </p>


    <p>Edad:<br />
      <input name="edad" type="text" value="<?php echo $imprimir['edad']; ?>" />
      <?php
  
	  if(isset($_SESSION['error3']))
	  {
		  echo "<font color='red'>".$_SESSION['error3']."</font>";
	  }
	  else
	  {
		  echo "";
	  }
	  
	  unset($_SESSION['error3']);
	  
	  ?>
    </p>
    <p>
      <input name="button" type="submit" value="Enviar" />
      <br />
    </p>
  </form>
</div>
</body>
</html>
