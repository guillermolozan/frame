<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::. - DISTRIBUIDORA PEDRO RUIZ GALLO - .::.</title>
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
   <p class="titulo">Eliminar Documento</p>
  <div align="center">
   <?php
   		$idComprobante=$_GET['idComprobante'];
		$instruccion1 = "select COMPROBANTE_idComprobante from pago_cliente where COMPROBANTE_idComprobante = '$idComprobante' and estadoPago=1";
		$consulta1 = consulta($instruccion1);
		$encontrado=numero_registros($consulta1);
		//Añadir restriccion cuando haya sido despachada la factura
		if($encontrado == '0')
		{
		?>
		<form action="saveDelDocumento.php" id="frmDelDocumento" name="frmDelDocumento" method="post" enctype="multipart/form-data">
    		<input type="hidden" name="idComprobante" value="<?php echo $_GET['idComprobante']; ?>" />
            <span class="del">Esta seguro que desea eliminar el Documento seleccionado</span><br /><br />
        	<input name="btnGuardar" type="submit" id="btnGuardar" value="SI"  class="boton"/>
			<input name="sbmReturn" type="button" id="sbmReturn" value="NO"  class="boton" onClick="window.open('index.php', '_self');"/>
       </form>
  	<?php	
		}
		else
		{
		?>
        <span class="del">El Documento seleccionado no puede ser eliminada ya que ha sido despachado o tiene cuotas canceladas</span>
			<br /><br />
			<input name="sbmReturn" type="button" id="sbmReturn" value="Regresar" onClick="window.open('index.php', '_self');" class="boton"/>
		<?php	
			}
			mysql_free_result($consulta1);
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