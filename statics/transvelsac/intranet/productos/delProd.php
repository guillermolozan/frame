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
  <div align="center">  
    <?php
	$sql1 = "select * from producto WHERE idproducto='$_GET[idProducto]'"; 
	$registro = consulta($sql1);
	$reg = leer_registro($registro);
	$encontrado = numero_registros($registro);
	
	$sql = "select * from ventasdet WHERE idproducto='$_GET[idProducto]'"; 
	$registro2 = consulta($sql);
	$encontrado2 = numero_registros($registro2);
	
	$sql = "select * from comprasdet WHERE idproducto='$_GET[idProducto]'"; 
	$registro3 = consulta($sql);
	$encontrado3 = numero_registros($registro3);
	
	$nomProd = $reg['nombre'];
	$codProd = $reg['idproducto'];
	
	if($encontrado == '1' and $encontrado2=='0' and $encontrado3=='0'){
?>
	<form action="saveDelProd.php" id="frmDelProd" name="frmDelProd" method="post" enctype="multipart/form-data">
    	<input type="hidden" name="idproducto" id="idproducto" value="<?php echo $reg['idproducto']; ?>" />
        <span class="del">Esta seguro que desea eliminar el producto <?php echo $nomProd." (Codigo: ".$codProd.")"; ?></span>
        <br /><br />
        <input name="btnGuardar" type="submit" id="btnGuardar" value="SI" class="boton" />
		<input name="sbmReturn" type="button" id="sbmReturn" value="NO" onClick="window.open('index.php', '_self');" class="boton"/>
    </form>
    
<?php	
	}
	elseif($encontrado == '1' and ($encontrado2<>'0' or $encontrado3<>'0'))
	{
	?>
	<span class="del">El producto <?php echo $nomProd." (Codigo: ".$codProd.")"; ?> no puede ser eliminado ya que contiene <?php echo $encontrado2; ?> venta(s) y <?php echo $encontrado3; ?> compras asociado(s)</span><br /><br />
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