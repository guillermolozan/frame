<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

	$idEquivalencia=$_GET['idEquivalencia'];
	$sqlEquiv="SELECT * FROM equivalencias WHERE idequivalencia='$idEquivalencia'";
	$resultEquiv=consulta($sqlEquiv);
	$rsEquiv=leer_registro($resultEquiv);
	$idProducto=$rsEquiv['idproducto'];
	$idUniMed=$rsEquiv['idunimed'];
	$Equivalencia=$rsEquiv['equivalencia'];
	$PrecioCosto=$rsEquiv['preciocosto'];
	$Precio1=$rsEquiv['precio1'];
	$StockMinimo=$rsEquiv['stockminimo'];
	$Minimo=$rsEquiv['minimo'];
	
	$sql="SELECT * FROM producto WHERE idproducto='$idProducto'";
	$result=consulta($sql);
	$rs=leer_registro($result);
	$Producto=$rs['nombre'];
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
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/frm/cmxforms.js" type="text/javascript"></script>
<script src="../validar.js" type="text/javascript"></script>
<script type="text/javascript" src="select_dependientes_3_niveles.js"></script>
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
  <p class="titulo">Nueva Equivalencia</p>
  <FORM ACTION="grabarEditarEquivalencia.php" class="cmxform" id="frmNewEquivalencia" NAME="frmNewEquivalencia" METHOD="POST" ENCTYPE="multipart/form-data">
<table width="98%" align="center" style="margin:0 10px;">
  <tr>
    <td class="title" width="10%"><strong >Nombre</strong></td>
   	<input type="hidden" id="idequivalencia" name="idequivalencia" value="<?php echo $idEquivalencia; ?>" />
   	<input type="hidden" id="idproducto" name="idproducto" value="<?php echo $idProducto; ?>" />
    <td width="40%" class="tdcont" colspan="3"><input type="text" name="nombre" id="nombre" readonly="readonly" size="70" maxlength="150" value="<?php echo $Producto; ?>" /></td>    
    <td class="title" width="10%"><strong >Unidad Medida</strong></td>
    <td class="tdcont" width="33%">
    <select name="idunimed" id="idunimed">
       <option value="0">Seleccione</option>
		<?php
			$sql = "SELECT * FROM unimed ORDER BY nombre";
	  		$rsl = consulta($sql);
       		while($reg = leer_registro($rsl))
	  		{
    	?>
      	<option value="<?php echo $reg["idunimed"];?>" <?php if($idUniMed==$reg['idunimed']){echo 'selected="selected"';}?>><?php echo $reg["nombre"];?></option>
        <?php
			}
        	mysql_free_result($rsl);
		?>
       </select>
    <b class="alert">*</b></td>
  </tr>
  <tr>
    <td class="title"  width="10%"><strong >Equivalencia</strong><br /></td>
    <td class="tdcont" width="10%"><br />
      <input type="text" name="equivalencia" id="equivalencia"  maxlength="6" size="8"  value="<?php echo $Equivalencia; ?>"/></td>
    <td class="title"  width="10%"><strong >Precio Costo</strong><br /></td>
    <td class="tdcont" width="10%"><br />
      <input type="text" name="preciocosto" id="preciocosto"  maxlength="6" size="8"  value="<?php echo $PrecioCosto; ?>"/></td>
    <td class="title"  width="10%"><strong >Precio Venta</strong><br /></td>
    <td class="tdcont" width="10%"><br />
      <input type="text" name="precio1" id="precio1"  maxlength="6" size="8"  value="<?php echo $Precio1; ?>"/></td>
  </tr>
  <tr>
    <td class="title"  width="10%"><strong >Stock Minimo</strong><br /></td>
    <td class="tdcont" width="10%"><br />
      <input type="text" name="stockminimo" id="stockminimo"  maxlength="6" size="8"  value="<?php echo $StockMinimo; ?>"/></td>
     <td class="title" ><strong >Minimo</strong> :<br /></td>
      <td class="tdcont"><br />
      <input type="checkbox" name="minimo" id="minimo" value="<?php echo $Minimo; ?>" <?php if($Minimo == 1) echo 'checked="checked"'; ?>/><b class="alert">*</b></td>
    <td class="tdcont" colspan="2">
 <div align="right"><input type="reset" id="limpiar" name="limpiar" value="Limpiar" class="boton" />
&nbsp;&nbsp;<input name="btnGuardar" type="submit" id="btnGuardar" value="Guardar" class="boton" />&nbsp;&nbsp;<input name="sbmReturn" type="button" id="sbmReturn" value="Cancelar" onClick="window.open('index.php', '_self');" class="boton"/></div>
  </tr>
</table><br />
</FORM>
    <!-- end #mainContent --></div>
      <div id="footer">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --> 
    </div>
</body>
</html>