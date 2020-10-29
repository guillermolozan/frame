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
<script src="../js/lib/jquery.js" type="text/javascript"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/frm/cmxforms.js" type="text/javascript"></script>
<script src="../validar.js" type="text/javascript"></script>

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
  <p class="titulo">Nuevo Cliente</p>
  <FORM ACTION="saveNewCliente.php" class="cmxform" id="frmNewCliente" NAME="frmNewCliente" METHOD="POST" ENCTYPE="multipart/form-data"> 
<table width="98%" align="center" style="margin:0 10px;">
  <tr>
    <td class="title" width="20%"><strong >Nombre/Razon Social:</strong></td>
    <td width="35%" class="tdcont">&nbsp;<input type="text" name="razonsocial" id="razonsocial" style="text-transform:uppercase" size="40" /><b class="alert">*</b></td>
    <td class="title" width="17%"><strong >Contacto :</strong></td>
    <td class="tdcont" width="33%">&nbsp;<input type="text" name="contacto" id="contacto" style="text-transform:capitalize" maxlength="40" size="30" /></td>
  </tr>
  <tr>
    <td class="title" ><strong >RUC/DNI  :</strong></td>
    <td class="tdcont">&nbsp;<input type="text" name="ruc" id="ruc" maxlength="11" size="40" /> <b class="alert">*</b></td>
    <td class="title" width="17%"><strong >Cargo :</strong></td>
    <td class="tdcont" width="33%">&nbsp;<input type="text" name="cargo" id="cargo" style="text-transform:uppercase" maxlength="20" size="30"/></td>
  </tr>
  <tr>
    <td class="title" ><strong >Dirección&nbsp; :</strong></td>
    <td class="tdcont">&nbsp;<input type="text" name="direccion" id="direccion" style="text-transform:capitalize" size="40" />
      <b class="alert">*</b></td>
   <td class="title" width="17%"><strong >Celular :</strong></td>
    <td class="tdcont" width="33%">&nbsp;<input type="text" name="celular" id="celular" maxlength="15" size="30" /></td>
  </tr>
  <tr>
    <td class="title" ><strong >Teléfono :</strong><br /></td>
    <td class="tdcont">
      &nbsp;<input size="16" type="text" name="telefono1" id="telefono1"  maxlength="10"/>&nbsp;&nbsp;<input type="text" name="telefono2" id="telefono2"  maxlength="10" size="16"/></td>
    <td class="title" width="17%"><strong >Email :</strong></td>
    <td class="tdcont" width="33%">&nbsp;<input type="text" name="email" id="email" style="text-transform:lowercase" maxlength="30" size="30"/></td>
  </tr>
</table>

<br />
 <div align="right" style="margin-right:10px"><input type="reset" id="limpiar" name="limpiar" value="Limpiar" class="boton" />
&nbsp;&nbsp;<input name="btnGuardar" type="submit" id="btnGuardar" value="Guardar" class="boton" />&nbsp;&nbsp;<input name="sbmReturn" type="button" id="sbmReturn" value="Cancelar" onClick="window.open('index.php', '_self');" class="boton"/></div>
</FORM>
      
       <!-- end #mainContent --></div>
      <div id="footer">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --> 
    </div>
    </body>
</html>