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
<title>.::. - Panel de Administracion DISTRIBUIDORA PEDRO RUIZ GALLO - .::.</title>
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
<link type="text/css" href="../js/jpicker/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.core.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/i18n/ui.datepicker-es.js"></script>
<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({
		dateFormat: 'yy-mm-dd',
		regional: 'es',
		showOn: 'button', buttonImage: '../images/calendar.gif', buttonImageOnly: true}); 
	});


function nuevoAjax()
{ 
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
	var xmlhttp=false;
	try
	{
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
		try
		{
			// Creacion del objet AJAX para IE
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(E)
		{
			if (!xmlhttp && typeof XMLHttpRequest!='undefined') xmlhttp=new XMLHttpRequest();
		}
	}
	return xmlhttp; 
}

function cargaContenidoFecha(fecha)
{
	var ajax=nuevoAjax();
	ajax.open("GET", "fechaAjax.php?fecha="+fecha, true);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(null);
	ajax.onreadystatechange=function()
	{ 
		if (ajax.readyState==4)
		{
			var valor =ajax.responseText;
            document.getElementById('valorActual').value = valor;
		} 
	}
}



</script>
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
  <p class="titulo">Tipo de Cambio</p>
  	<?php  
		if(isset($_GET['alter'])){
			if($_GET['alter']=='1')
				{$error= "Ingreso registrado satisfactoriamente";}
			elseif($_GET['alter']=='2')
				{$error= "Datos modificados satisfactoriamente"; }
			elseif($_GET['alter']=='3')
				{$error= "Registro eliminado satisfactoriamente"; }
			else
				{header("Location:parametroList.php");}
		}
		else
		{
			$msg=''; $display="style='display:none'";
		}
           	echo   "<div align='right' class='alert' ".$display.">".$msg."</div>";
		$fechaActual = fechaAlta("DH");
		$sql="SELECT valor FROM tipo_cambio WHERE SUBSTR(fechaAlta,1,10)=SUBSTR('$fechaActual',1,10)";
		$result=consulta($sql);
		if (numero_registros($result) > 0) {
		  $rs=leer_registro($result);
		  $valor=$rs['valor'];
		} else {
		  $valor=0;
		}
		mysql_free_result($result);
	?>
 <FORM ACTION="saveNewTipoCambio.php" class="cmxform" id="frmNewTipoCambio" NAME="frmNewTipoCambio" METHOD="POST" ENCTYPE="multipart/form-data">
	<table align="center" style="margin:0 10px;" width="75%">
   	  <tr>
       	<td colspan="2" align="right"><?php echo $error;?></td>
      </tr>
	    <th class="title" colspan="6" align="left"><strong>TIPO CAMBIO</strong></th>
      <tr>
        <td class="title">Fecha :</td>
       	<td class="tdcont"><input type="text" name="datepicker" id="datepicker" size="25" readonly="readonly" value="<?php echo fechaAlta("D"); ?>" onchange="cargaContenidoFecha(this.value);"></td>
      </tr>
      <tr>
      	<td class="title">Valor Actual :</td>
       	<td class="tdcont"><input type="text" name="valorActual" id="valorActual" size="25" disabled="disabled" value="<?php echo $valor; ?>"></td>
      </tr>
      <tr>
       	<td class="title">Nuevo valor *:</td>
      	<td class="tdcont"><input type="text" name="valor" id="valor" size="25"></td>
      </tr>
      <tr>
      	<td colspan="2" align="right" class="tdcont"><input type="submit" name="btnGuardar" id="btnGuardar" VALUE="Guardar"></td>
      </tr>
   </table>
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