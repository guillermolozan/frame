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
  			<p class="titulo">Eliminar Marca</p>
  			<div align="center">
  			<?php
				$sql1 = "select * from marca WHERE idmarca='$_GET[idMarca]'"; 
				$registro = consulta($sql1);
				$reg = leer_registro($registro);
				$encontrado = numero_registros($registro);
				$sql = "select * from producto WHERE idmarca='$_GET[idMarca]'"; 
				$registro2 = consulta($sql);
				$encontrado2 = numero_registros($registro2);
				$nomMarca = $reg['nombre'];
				$codMarca = $reg['idmarca'];
	
				if($encontrado == '1' and $encontrado2=='0')
				{
			?>
				<form action="saveDelMarca.php" id="frmDelMarca" name="frmDelMarca" method="post" enctype="multipart/form-data">
    				<input type="hidden" name="idMarca" value="<?php echo $reg['idmarca']; ?>" />
        			<span class="del">Esta seguro que desea eliminar la marca <?php echo $nomMarca."(Codigo:".$codMarca.")"; ?></span>
        			<br /><br />
        			<input name="btnGuardar" type="submit" id="btnGuardar" value="SI" class="boton" />
					<input name="sbmReturn" type="button" id="sbmReturn" value="NO" onClick="window.open('index.php', '_self');" class="boton"/>
    			</form>
			<?php	
				}
				elseif($encontrado == '1' and $encontrado2<>'0')
				{
				?>
					<span class="del">La marca <?php echo $nomMarca." (Codigo: ".$codMarca.")"; ?> no puede ser eliminada ya que contiene <?php echo $encontrado2; ?> producto(s) asociado(s)</span>
    				<br /><br />
					<input name="sbmReturn" type="button" id="sbmReturn" value="Regresar" onClick="window.open('index.php', '_self');" class="boton"/>
			<?php	
				}
				mysql_free_result($registro);
				mysql_free_result($registro2);
			?>
  			</div>
  
		<!-- end #mainContent -->
		</div>
      	<div id="footer">
      		<?php include('../footer.php');?>
      	<!-- end #footer -->
		</div>
    <!-- end #container --> 
    </div>
</body>
</html>