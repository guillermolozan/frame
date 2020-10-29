<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::. - EMPRESA DE TRANSPORTE LUCERITO - .::.</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/pro_drop_1.css" />
<script src="../css/stuHover.js" type="text/javascript"></script>
</head>

<body>
    <div id="container">
		<div id="datos">
      		<?php
			include("../menuSecund.php");
			?>
      	</div>
      	
		<div id="menu"><?php include("../menu.php") ?></div>
		
      <div id="mainContent">
      
   <br /><br />
   
   <p class="titulo">Eliminar Cliente</p>
  <div align="center">
  <?php

	$sql1 = "select * from cliente WHERE idcliente='$_GET[idCliente]'"; 
	$registro = consulta($sql1);
	$reg = leer_registro($registro);
	$encontrado = numero_registros($registro);
	
	$nomCliente = $reg['razonsocial'];
	$codCliente = $reg['idcliente'];
	
	if($encontrado == '1'){
?>
	<form action="saveDelCliente.php" id="frmDelCliente" name="frmDelCliente" method="post" enctype="multipart/form-data">
    	<input type="hidden" name="idCliente" value="<?php echo $reg['idcliente']; ?>" />
        <span class="del">Esta seguro que desea eliminar el Cliente <?php echo $nomCliente." (Codigo: ".$codCliente.")"; ?></span>
        <br /><br />
        <input name="btnGuardar" type="submit" id="btnGuardar" value="SI" class="boton" />
		<input name="sbmReturn" type="button" id="sbmReturn" value="NO" onClick="window.open('index.php', '_self');" class="boton"/>
    
    </form>
<?php	
	}
	elseif($encontrado == '1')
	{
	?>
	<span class="del">El cliente <?php echo $nomCliente." (Codigo: ".$codCliente.")"; ?> no puede ser eliminado ya que contiene <?php echo $encontrado2; ?> venta(s) asociados</span>
    <br /><br />
<input name="sbmReturn" type="button" id="sbmReturn" value="Regresar" onClick="window.open('index.php', '_self');" class="boton"/>
<?php	
	}
	?>
  
  </div>


 <!-- end #mainContent --></div>
      <div id="footer">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --> 
    </div>
    </body>
</html>