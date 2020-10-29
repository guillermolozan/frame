<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("validarSesionAdmin.php");
CheckNivel();
unset($_SESSION['carro']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::. - Panel de Administración DISTRIBUIDORA PEDRO RUIZ GALLO - .::.</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/sddm.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="container">
      <div id="header">
     	<?php
			include("header.php");
		?>
      <!-- end #header --></div>
      <div id="datos">
      	<?php
			include("menuSecund.php");
		?>
      </div>
     
      <div id="mainContent">
      <div style="width:970px; height:auto">
      	<div id="left">
        	<?php include("menu.php") ?>
			<hr style="clear:both; visibility:hidden"       />
        </div>
        <div id="right">
       <!-- aca todo el contenido q kieras poner -->
      
   <br /><br />
   
   <p class="titulo">Eliminar Usuario</p>
  <div align="center">
  <?php

	$sql1 = "SELECT u.*, e.idEmpresa FROM usuario as u INNER JOIN sucursal as s ON u.SUCURSAL_idSucursal=s.idSucursal INNER JOIN empresa as e ON e.idEmpresa=s.EMPRESA_idEmpresa WHERE idUsuario='$_GET[idUsuario]'"; 
	$registro = consulta($sql1);
	$reg = leer_registro($registro);
	$encontrado = numero_registros($registro);
	$idUsuarioA=$reg['idUsuario'];
	$idEmpresa=$reg['idEmpresa'];
	$nomUsuarioA = $reg['nomUsuario'];
	$codUsuario = $reg['codUsuario'];
	mysql_free_result($registro);
	
	$sql2 = "SELECT idMovim FROM movimiento WHERE USUARIO_idUsuario='$_GET[idUsuario]'"; 
	$registro2 = consulta($sql2);
	$reg2 = leer_registro($registro2);
	$encontrado2 = numero_registros($registro2);
	mysql_free_result($registro2);
	
	if($encontrado == '1' && $encontrado2 == '0'){
	?>
	<form action="saveDelUsuario.php" id="frmDelUsuario" name="frmDelUsuario" method="post" enctype="multipart/form-data">
    	<input type="hidden" name="idUsuarioA" value="<?php echo $idUsuarioA; ?>" />
        <input type="hidden" name="idEmpresa" value="<?php echo $idEmpresa; ?>" />
        <span class="del">Esta seguro que desea eliminar al usuario <?php echo $nomUsuarioA." (Codigo: ".$codUsuario.")"; ?></span>
        <br /><br />
        <input name="btnGuardar" type="submit" id="btnGuardar" value="SI" class="boton" />
		<input name="sbmReturn" type="button" id="sbmReturn" value="NO" onClick="window.open('usuarios.php?idEmpresa=<?php echo $idEmpresa; ?>', '_self');" class="boton"/>
    </form>
	<?php	
	}
	elseif($encontrado2 != '0')
	{
	?>
	<span class="del">El usuario <?php echo $nomUsuario." (Codigo: ".$codUsuario.")"; ?> no puede ser eliminado ya que contiene <?php echo $encontrado2; ?> movimiento(s) asociados</span>
    <br /><br />
<input name="sbmReturn" type="button" id="sbmReturn" value="Regresar" onClick="window.open('usuarios.php?idEmpresa=<?php echo $idEmpresa; ?>', '_self');" class="boton"/>
<?php	
	}
	?>
  
  </div>

 <hr style="clear:both; visibility:hidden"/>      
      </div>
      <hr style="clear:both; visibility:hidden"       />
      <!-- end #mainContent --></div>
      <div id="footer" align="center">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
    
<!-- end #container --> 
</div>
</body>
</html>