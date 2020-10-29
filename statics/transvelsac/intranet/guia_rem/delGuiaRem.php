<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesion.php");
CheckNivel();
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
      <div id="header">
      		<?php
			include("../header.php");
			?>
      	<!-- end #header -->
      	</div>

		<div id="datos">
      		<?php
			include("../menuSecundInt.php");
			?>
      	</div>
      	
		<div id="menu"><?php include("../menuInt.php") ?></div>
      <div id="mainContent">
      
   <br /><br />
   <p class="titulo">Eliminar Nota de Salida</p>
  <div align="center">
   <?php
				$sql1 = "select * from guia_remision WHERE idGuia='$_GET[idGuia]'"; 
				$registro = consulta($sql1);
				$reg = leer_registro($registro);
				$encontrado = numero_registros($registro);
				$numGuia = $reg['numGuia'];
	
				if($encontrado == '1')
				{
			?>
		<form action="saveDelGuiaRem.php" id="frmDelGuiaR" name="frmDelGuiaR" method="post" enctype="multipart/form-data">
    		<input type="hidden" name="idGuia" value="<?php echo $_GET['idGuia']; ?>" />
            <span class="del">Esta seguro que desea cancelar la guia de remision: <?php echo $numGuia; ?> </span><br /><br />
        	<input name="btnGuardar" type="submit" id="btnGuardar" value="SI"  class="boton"/>
			<input name="sbmReturn" type="button" id="sbmReturn" value="NO"  class="boton" onClick="window.open('index.php', '_self');"/>
    </form>
   
			<?php	
				}
				mysql_free_result($registro);
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