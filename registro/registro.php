<?php
session_start();

@$imprimir=$_SESSION['imp'];


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registrate</title>
<style type="text/css">
#contenedor {
	padding: 15px;
	width: 700px;
	margin-top: 9px;
	margin-right: auto;
	margin-bottom: 9px;
	margin-left: auto;
	background-color: #F4FDFF;
	border: 1px dashed #069;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.caja {
	font-weight: bold;
	color: #FFF;
	height: 44px;
	width: 120px;
	border: 3px solid #09C;
	background-color: #036;
}
#tit {
	margin: 0px;
	padding: 12px;
	background-color: #069;
	font-weight: bold;
	color: #FFF;
	border: 1px dashed #FFF;
}
.form {
	background-color: #F9F9F9;
	width: 200px;
	border: 3px solid #999;
	height: 33px;
	padding: 3px;
}
</style>
</head>

<body>
<div id="contenedor">
  <div id="tit">Formulario de Registro:</div>
  
  
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
  
  
  
  <form id="form1" name="form1" method="post" action="enviar.php">
    <p>Nombre:<br />
      <input name="nombre" type="text" class="form" id="nombre" value="<?php echo $imprimir['nombre']; ?>" />
      
      
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
	  
	      <?php
	  
	  
	  if(isset($_SESSION['error8']))
	  {
		  echo "<font color='red'>".$_SESSION['error8']."</font>";
	  }
	  else
	  {
		  echo "";
	  }
	  
	  unset($_SESSION['error8']);
	   unset($_SESSION['error1']);
	  
	  ?>
      
      
      
    </p>
    
    
    
    
    
    
    <p>Edad:<br />
      <input name="edad" type="text" class="form" id="edad" value="<?php echo $imprimir['edad']; ?>" />
     
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
    <p>Teléfono:<br />
      <input name="telefono" type="text" class="form" id="telefono" value="<?php echo $imprimir['telefono']; ?>" />
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
    <p>País: </p>
    <p>
    
    
    
    <?php
$paises=array('Perú','Mexico','Argentina','Chile','España','Colombia','Ecuador');

	?>
    
    <select name="pais" class="form" id="pais">
<option value="Seleccione">Seleccione</option>

<?php
for($i=0; $i<count($paises); $i++)
{
	if($imprimir['pais']==$paises[$i])
		{
?>
<option value="<?php echo $paises[$i]; ?>" selected="selected"><?php echo $paises[$i]; ?></option>
<?php
		}
		else
		{
			
?>			
<option value="<?php echo $paises[$i]; ?>"><?php echo $paises[$i]; ?></option>
<?php
		}
}
?>


        
        
        
      </select>

      <?php
	  
	  
	  if(isset($_SESSION['error4']))
	  {
		  echo "<font color='red'>".$_SESSION['error4']."</font>";
	  }
	  else
	  {
		  echo "";
	  }
	  
	  unset($_SESSION['error4']);
	  
	  ?>
    </p>
    <p>Email:<br />
      <input name="email" type="text" class="form" id="email" value="<?php echo $imprimir['email']; ?>" />
      <?php
	  
	  
	  if(isset($_SESSION['error5']))
	  {
		  echo "<font color='red'>".$_SESSION['error5']."</font>";
	  }
	  else
	  {
		  echo "";
	  }
	  
	  unset($_SESSION['error5']);
	  
	  ?>
    </p>
    <p>Contraseña:<br />
      <input name="pass" type="text" class="form" id="pass" value="<?php echo $imprimir['pass']; ?>" />
      <?php
	  
	  
	  if(isset($_SESSION['error6']))
	  {
		  echo "<font color='red'>".$_SESSION['error6']."</font>";
	  }
	  else
	  {
		  echo "";
	  }
	  
	  unset($_SESSION['error6']);
	  
	  ?>
    </p>
    <p>
      <input name="button" type="submit" class="caja" id="button" value="Enviar" />
      <br />
    </p>
  </form>
</div>
</body>
</html>