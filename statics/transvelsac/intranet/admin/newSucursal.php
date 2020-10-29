<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
unset($_SESSION['carro']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::. - Panel de Administración EMPRESA DE TRANSPORTE LUCERITO - .::.</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/sddm.css" rel="stylesheet" type="text/css" />
<script src="../js/lib/jquery.js" type="text/javascript"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/frm/cmxforms.js" type="text/javascript"></script>
<script src="../validar.js" type="text/javascript"></script>
<link type="text/css" href="../js/jpicker/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.core.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/i18n/ui.datepicker-es.js"></script>
<style type="text/css">
	form.cmxform label.error {
	margin-left:5px;
	color:red;
	font-style:italic
	}
</style>
<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({
		dateFormat: 'yy-mm-dd',
		regional: 'es',
		showOn: 'button', buttonImage: '../images/calendar.gif', buttonImageOnly: true}); 
	});
</script>
</head>

<body>
	<div id="container">
      <div id="datos">
      	<?php
			include("menuSecund.php");
		?>
      </div>
     
      <div id="mainContent">
      <div style="width:970px; height:auto">
      	<div id="left">
        	<?php include("menu.php") ?>
			<hr style="clear:both; visibility:hidden"/>
        </div>
        <div id="right">
       <!-- aca todo el contenido q kieras poner -->
   <br /><br />
  <p class="titulo">Nueva Sucursal</p>
  <FORM ACTION="saveNewSucursal.php" class="cmxform" id="frmNewUsuario" NAME="frmNewUsuario" METHOD="POST" ENCTYPE="multipart/form-data"> 
<table width="98%" align="center" style="margin:0 10px;">
	<input type="hidden" id="idempresa" name="idempresa" value="<?php echo $_GET['idEmpresa']; ?>" />
    <tr>
    <td class="title" width="12%"><strong >Nombre :</strong></td>
    <td width="30%" class="tdcont"><input type="text" name="nombre" id="nombre" size="50" style="text-transform:capitalize" /><b class="alert">*</b></td>
  </tr>  
  <tr>
    <td class="title" width="12%"><strong >Direccion :</strong></td>
    <td class="tdcont" width="33%"><input type="text" name="direccion" id="direccion" maxlength="40" size="50" /></td>
  </tr>
  <tr>
    <td class="title" width="12%"><strong >Telefono :</strong></td>
    <td class="tdcont" width="33%"><input type="text" name="telefono" id="telefono" maxlength="40" size="30" /></td>
  </tr>
  <tr>
    <td class="title" width="12%"><strong >Pagina Web :</strong></td>
    <td class="tdcont" width="33%"><input type="text" name="pweb" id="pweb" maxlength="40" size="50" /></td>
  </tr>
</table>

<br />
 <div align="right"><input name="btnGuardar" type="submit" id="btnGuardar" value="Guardar" class="boton" />&nbsp;&nbsp;<input name="sbmReturn" type="button" id="sbmReturn" value="Cancelar" onClick="window.open('usuarios.php?idEmpresa=<?php echo $_GET['idEmpresa']; ?>', '_self');" class="boton"/></div>
</FORM>

<hr style="clear:both; visibility:hidden"       />      
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