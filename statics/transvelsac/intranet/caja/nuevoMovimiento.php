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
<title>EMPRESA DE TRANSPORTE LUCERITO...</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/pro_drop_1.css" />
<script src="../css/stuHover.js" type="text/javascript"></script>
<script src="../js/lib/jquery.js" type="text/javascript"></script>
<link type="text/css" href="../js/jpicker/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.core.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/i18n/ui.datepicker-es.js"></script>
<script type="text/javascript">
$documento = 1;
$modoconsulta = 1;
document.onkeydown = function(){ 
  if(window.event && (window.event.keyCode == 8)){
    return false;
  }
}

	$(function() {
		$("#fecha").datepicker({
		dateFormat: 'yy-mm-dd',
		regional: 'es',
		showOn: 'button', buttonImage: '../images/calendar.gif', buttonImageOnly: true}); 
	});
	$(function() {
		$("#datepicker1").datepicker({
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
		include("../menuSecund.php");
	?>
  </div>
  <div id="menu"><?php include("../menu.php") ?></div>
  <div id="mainContent">
  <br />
  <p class="titulo">Nuevo Movimiento</p>    
<FORM ACTION="grabarNuevoMovimiento.php" class="cmxform" id="frmNuevoMovimiento" NAME="frmNuevoMovimiento" METHOD="POST" ENCTYPE="multipart/form-data"> 
<table width="100%" align="center" style="margin:0 2px;">
  <tr>
     <td class="title" width="10%"><strong >Tipo Movimiento</strong></td>
     <td class="tdcont" width="20%">&nbsp;&nbsp;
       <select name="tipomovimiento" id="tipomovimiento">
       	<option value="0">Seleccione</option>
       	<option value="1">Ingresos</option>
       	<option value="2">Egresos</option>
       </select></label></td>
       <td class="title" width="10%"><strong >Tipo Registro Caja</strong></td>
       <td class="tdcont" width="20%" colspan="3">&nbsp;&nbsp;
         <select name="tiporegistro" id="tiporegistro"><option value="0">Seleccione</option>
          	<?php
				$sql = "SELECT * FROM tiporegistro";
		  		$rsl = consulta($sql);
           		while($reg = leer_registro($rsl))
		  		{
	    	?>
               	<option value="<?php echo $reg["idtiporegistro"];?>"><?php echo $reg["nombre"];?></option>
           	<?php
		  		}
           		mysql_free_result($rsl);
	       	?>
        </select></label></td>
  </tr>
  <tr>
     <td class="title" width="10%"><strong >RUC / DNI</strong></td>
     <td class="tdcont"  width="20%">&nbsp;&nbsp;<input type="text" name="rucdni" id="rucdni" size="20"/>
		<input type="hidden" name="idcliprov" id="idcliprov" value="" />
        &nbsp;<a href="javascript:void(0)" onClick="hija=window.open('../clientes/searchClientesCaja.php', 'Sizewindow', 'width=850, height=600, scrollbars=no, toolbar=no'); return false;"><img src="../images/icono_buscar.gif" border="0" alt="Buscar Codigo Cliente" /></a>&nbsp;
    <td class="title" width="10%"><strong>Nombre Cliente</strong></td>
    <td class="tdcont" width="50%" colspan="3">&nbsp;&nbsp;<input name="razonsocial" type="text" id="razonsocial" size="55" readonly="readonly" /></td>
  </tr>
  <tr>
    <td class="title" width="10%"><strong>Descripcion</strong></td>
    <td class="tdcont" width="30%">&nbsp;
         <input name="descripcion" type="text" id="descripcion" size="55"/></td>
  	<td class="title" width="10%"><strong>Fecha</strong></td>
   	<td class="tdcont" valign="middle" colspan="3">&nbsp;&nbsp;&nbsp;<input type="text" id="fecha" name="fecha" value="<?php echo fechaAlta("D"); ?>"/></td>
  </tr>
  <tr>
    <td class="title" width="10%"><strong >Tipo Documento</strong></td>
    <td class="tdcont" width="20%">&nbsp;
         <select name="tipodoc" id="tipodoc"><option value="0">Seleccione</option>
          	<?php
				$sql = "SELECT * FROM tipodocumento";
		  		$rsl = consulta($sql);
           		while($reg = leer_registro($rsl))
		  		{
	    	?>
               	<option value="<?php echo $reg["idtipodoc"];?>"><?php echo $reg["nombre"];?></option>
           	<?php
		  		}
           		mysql_free_result($rsl);
	       	?>
        </select></label></td>
    <td class="title" width="10%"><strong >Serie</strong></td>
    <td class="tdcont" width="10%">&nbsp;&nbsp;<input type="text" name="serie" id="serie" maxlength="8" size="8" /></td>
    <td class="title" width="7%"><strong >Numero</strong></td>
    <td class="tdcont" width="10%">&nbsp;<input type="text" name="numero" id="numero" maxlength="8" size="8" /></td>  
  </tr>
  <tr>
    <td class="title" width="10%"><strong >Monto</strong></td>
    <td class="tdcont" width="10%">&nbsp;&nbsp;<input type="text" name="monto" id="monto" maxlength="8" size="8" /></td>
    <td class="tdcont" width="10%">&nbsp;&nbsp;</td>
    <td class="tdcont" width="20%" colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Grabar" value="Grabar" id="Grabar" class="boton" />&nbsp;&nbsp; <input type="button" id="cancelar" name="cancelar" value="Cancelar" class="boton" onclick="window.open('index.php', '_self')"/></td>
   </tr>

</table>

</FORM>
  
  
  
  
      <!-- end #mainContent -->
      </div>
      <div id="footer">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
    </body>
</html>