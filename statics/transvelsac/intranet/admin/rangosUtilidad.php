<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("validarSesionAdmin.php");
CheckNivel();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::. - Panel de Administración DISTRIBUIDORA PEDRO RUIZ GALLO - .::.</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/sddm.css" rel="stylesheet" type="text/css" />
<script src="../js/lib/jquery.js" type="text/javascript"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/frm/cmxforms.js" type="text/javascript"></script>
<script src="../validar.js" type="text/javascript"></script>
<style type="text/css">
	form.cmxform label.error {
	margin-left:5px;
	color:red;
	font-style:italic
	}
</style>
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
		<p class="titulo">Márgenes de Descuento</p>
      		<div id="busqueda">
			</div>
            <FORM ACTION="saveRangosUtilidad.php" class="cmxform" id="frmSaveRangosUtilidad" NAME="frmSaveRangosUtilidad" METHOD="POST" ENCTYPE="multipart/form-data"> 
<table width="80%" align="center" style="margin:0 10px;">
    <tr>
    	<td class="title"><strong >Descripcion :</strong></td>
    	<td class="tdcont" colspan="6"><input type="text" name="rangoDescripcion" id="rangoDescripcion" size="60" />
  	</tr>
    <tr>
    	<td class="title"><strong >Observacion :</strong></td>
    	<td class="tdcont" colspan="6"><input type="text" name="rangoObs" id="rangoObs" size="60" />
  	</tr>
    <?php
	for ($i=1; $i<=10; $i++)
	{
	?>
      <tr>
    	<td class="title"><strong >Utilidad de (%) :</strong></td>
    	<td class="tdcont"><input type="text" name="porcentajeDscto[]" id="porcentajeDscto" value="10" size="5" />
    	<td class="title"><strong >Desde (S/.):</strong></td>
    	<td class="tdcont"><input type="text" name="minMargen[]" id="minMargen" value="0" size="10" /></td>
    	<td class="title"><strong >Hasta (S/.):</strong></td>
    	<td class="tdcont"><input type="text" name="maxMargen[]" id="maxMargen" value="0" size="10" /></td>
  	  </tr>
 	<?php
 	}		
	?>
</table>
<br />
 <div align="right"><input name="btnGuardar" type="submit" id="btnGuardar" value="Guardar" class="boton" /></div>
</FORM>
</div>
<hr style="clear:both; visibility:hidden"       />      
      </div>
      <hr style="clear:both; visibility:hidden"       />
      <!-- end #mainContent --></div>
      <div id="footer" align="center">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
    </body>
</html>
