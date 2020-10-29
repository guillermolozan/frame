<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
$idEquivalencia = $_GET['idEquivalencia'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EMPRESA DE TRANSPORTE LUCERITO...</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/pro_drop_1.css" />
<script src="../css/stuHover.js" type="text/javascript"></script>
  <style type="text/css">
	form.cmxform label.error {
	margin-left:5px;
	color:red;
	font-style:italic
	}
  </style>
<link type="text/css" href="../js/jpicker/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
</head>

<body>
<br />
    <div id="container">    
      <div id="mainContent">
      
   <br /><br />
   
   <p class="titulo">Eliminar Equivalencias</p>
  <div align="center">
  <?php
    $sql1 = "SELECT * FROM equivalencias WHERE idequivalencia = '$idEquivalencia'";
	$registro = consulta($sql1);
	$reg = leer_registro($registro);
	$idProducto=$reg['idproducto'];
	
	$encontrado = numero_registros($registro);
	
	$sql="SELECT * FROM producto WHERE idproducto='$idProducto'";
	$result=consulta($sql);
	$rs=leer_registro($result);
	$nomCliente=$rs['nombre'];
		
	$codCliente = $idEquivalencia;
	
	if($encontrado == '1'){
?>
	<form action="saveDelEquivalencia.php" id="frmDelEquivalencia" name="frmDelEquivalencia" method="POST" enctype="multipart/form-data">
    	<input type="hidden" name="idequivalencia" id="idequivalencia" value="<?php echo $idEquivalencia; ?>" />
        <span class="del">Esta seguro que desea eliminar la Equivalencia : <?php echo $nomCliente." (Codigo: ".$codCliente.")"; ?></span>
        <br /><br />
        <input name="btnGuardar" type="submit" id="btnGuardar" value="SI" class="boton" />
		<input name="sbmReturn" type="button" id="sbmReturn" value="NO" onClick="window.open('index.php', '_self');" class="boton"/>
    
    </form>
<?php	
	}
	elseif($encontrado == '2')
	{
	?>
	<span class="del">La Equivalencia  <?php echo $nomCliente." (Codigo: ".$codCliente.")"; ?> no puede ser eliminado ya que contiene <?php echo $encontrado2; ?> registro(s) asociados</span>
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