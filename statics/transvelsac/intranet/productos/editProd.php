<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DISTRIBUIDORA PEDRO RUIZ GALLO...</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/pro_drop_1.css" />
<script src="../css/stuHover.js" type="text/javascript"></script>
<script src="../js/lib/jquery.js" type="text/javascript"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/frm/cmxforms.js" type="text/javascript"></script>
<script src="../validar.js" type="text/javascript"></script>
<script type="text/javascript" src="select_dependientes_3_niveles.js"></script>
<script type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
      mode : "textareas",
      theme : "advanced",
	  plugins : "paste",
	  theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontselect,fontsizeselect", 
theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,forecolor,backcolor", 

 theme_advanced_buttons3 : "",
 theme_advanced_buttons4 : "",

	  skin : "o2k7"
	  
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
      
   <br /><br />
  <p class="titulo">Editar Articulo</p>
 <FORM ACTION="saveEditProd.php" class="cmxform" id="frmEditProd" NAME="frmEditProd" METHOD="POST" ENCTYPE="multipart/form-data"> 
<table width="98%" align="center" style="margin:0 10px;">
<?php
	$idProducto=$_GET['idProducto'];
	$sql="SELECT * FROM producto WHERE idproducto='$idProducto'";
	$result=consulta($sql);
	$rs=leer_registro($result);
	$idModelo=$rs['idmodelo'];
	$idMarca=$rs['idmarca'];
	$idUniMed=$rs['idunimed'];
	?>
    	<input type="hidden" id="idproducto" name="idproducto" value="<?php echo $idProducto; ?>" />
  <tr>
    <td class="title" width="10%"><strong >Nombre</strong></td>
    <td width="40%" class="tdcont"><input type="text" name="nombre" id="nombre" value="<?php echo $rs['nombre']; ?>" style="text-transform:uppercase" size="50" /><b class="alert">*</b></td>
    <td class="title" width="10%"><strong >Descripción Corta</strong></td>
    <td class="tdcont"><input type="text" name="nombrecorto" id="nombrecorto" value="<?php echo $rs['nombrecorto']; ?>" style="text-transform:uppercase" size="40" /><b class="alert">*</b></td>
  </tr>
  <tr>
    <td class="title" width="10%"><strong >Modelo</strong></td>
    <td class="tdcont" width="33%"><select name="idmodelo" id="idmodelo">
                	<?php
					$sql = "SELECT idmodelo, nombre FROM modelo ORDER BY nombre";
  			  		$rsl = consulta($sql);
              		while($reg =leer_registro($rsl))
			  		{
			    	?>
                   	<option value="<?php echo $reg["idmodelo"];?>" <?php if($idModelo==$reg['idmodelo']){echo 'selected="selected"';}?>><?php echo $reg["nombre"];?></option>
                   	<?php
			  		}
              		mysql_free_result($rsl);
			       	?>
                </select><b class="alert">*</b></td>
   <td class="title" width="10%"><strong >Marca</strong></td>
    <td class="tdcont" width="33%"><select name="idmarca" id="idmarca">
                	<option value="0">Seleccione</option>
		           	<?php
					$sql = "SELECT idmarca, nombre FROM marca ORDER BY nombre";
  			  		$rsl = consulta($sql);
              		while($reg = leer_registro($rsl))
			  		{
			    	?>
                   	<option value="<?php echo $reg["idmarca"];?>" <?php if($idMarca==$reg['idmarca']){echo 'selected="selected"';}?>><?php echo $reg["nombre"];?></option>
                   	<?php
			  		}
              		mysql_free_result($rsl);
			       	?>
                </select><b class="alert">*</b></td>
  </tr>
  <tr>
    <td class="title" width="10%"><strong >Unidad Medida</strong></td>
    <td class="tdcont" width="33%"><select name="idunimed" id="idunimed">
                	<?php
					$sql = "SELECT idunimed, nombre FROM unimed ORDER BY nombre";
  			  		$rsl = consulta($sql);
              		while($reg =leer_registro($rsl))
			  		{
			    	?>
                   	<option value="<?php echo $reg["idunimed"];?>" <?php if($idUniMed==$reg['idunimed']){echo 'selected="selected"';}?>><?php echo $reg["nombre"];?></option>
                   	<?php
			  		}
              		mysql_free_result($rsl);
			       	?>
                </select><b class="alert">*</b></td>  
    <td class="title" width="10%"><strong >Stock Minimo</strong><br /></td>
    <td class="tdcont"><br />
      <input type="text" name="stockminimo" id="stockminimo"  value="<?php echo $rs['stockminimo']; ?>" maxlength="6" size="10"/><b class="alert">*</b></td>
  </tr>
  
  <tr>
     <td class="title" width="10%"><strong >Disponible</strong><br /></td>
      <td class="tdcont"><br />
      <input type="checkbox" name="estado" id="estado" value="<?php echo $rs['estado']; ?>" <?php if($rs['estado'] == 1) echo 'checked="checked"'; ?> /><b class="alert">*</b></td>
  </tr>  
</table><br />
 <div align="right"><input name="btnGuardar" type="submit" id="btnGuardar" value="Guardar" class="boton" />&nbsp;&nbsp;<input name="sbmReturn" type="button" id="sbmReturn" value="Cancelar" onClick="window.open('index.php', '_self');" class="boton"/></div>
</FORM>
     <!-- end #mainContent --></div>
      <div id="footer">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --> 
    </div>
</body>
</html>