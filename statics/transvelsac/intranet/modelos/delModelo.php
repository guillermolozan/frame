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
  			<p class="titulo">Eliminar Modelo</p>
  			<div align="center">
  				<?php
				$sql1 = "select * from modelo WHERE idmodelo='$_GET[idModelo]'"; 
				$registro = consulta($sql1);
				$reg = leer_registro($registro);
				$encontrado = numero_registros($registro);
				$sql = "select * from producto WHERE idmodelo='$_GET[idModelo]'"; 
				$registro2 = consulta($sql);
				$encontrado2 = numero_registros($registro2);
				$nomModelo = $reg['nombre'];
				$codModelo = $reg['idmodelo'];
				if($encontrado == '1' and $encontrado2=='0')
				{
				?>
					<form action="saveDelModelo.php" id="frmDelModelo" name="frmDelModelo" method="post" enctype="multipart/form-data">
    					<input type="hidden" name="idmodelo" id="idmodelo" value="<?php echo $reg['idmodelo']; ?>" />
       					<span class="del">Esta seguro que desea eliminar el modelo <?php echo $nomModelo." (Codigo: ".$codModelo.")"; ?></span>
       					<br /><br />
        				<input name="btnGuardar" type="submit" id="btnGuardar" value="SI" class="boton" />
						<input name="sbmReturn" type="button" id="sbmReturn" value="NO" onClick="window.open('index.php', '_self');" class="boton"/>
    				</form>
				<?php	
				}
				elseif($encontrado == '1' and $encontrado2<>'0')
				{
				?>
				<span class="del">El modelo <?php echo $nomModelo." (Codigo: ".$codModelo.")"; ?> no puede ser eliminado ya que contiene <?php echo $encontrado2; ?> producto(s) asociado(s)</span><br /><br />    
				<input name="sbmReturn" type="button" id="sbmReturn" value="Regresar" onClick="window.open('index.php', '_self');" class="boton"/>
				<?php	
				}
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