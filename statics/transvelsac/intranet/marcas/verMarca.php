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
<title>DISTRIBUIDORA PEDRO RUIZ GALLO...</title>
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
      		<p class="titulo">Ver Marca</p>
      		<div id="busqueda" >
      			<?php
					$idMarca=$_GET['idMarca'];
					$sql="SELECT * FROM marca WHERE idMarca='$idMarca'";
					$result=consulta($sql);
					$rs=leer_registro($result);
					$imagen=$rs['imgMarca'];
				?>
      			<table align="center" width="60%">
  					<tr>
    					<td width="18%" height="24"><label>Nombre :</label></td>
    					<td width="23%" align="left"><label style="color:#3366CC"><?php echo $rs['nomMarca']; ?></label></td>
    					<td width="59%" colspan="1" rowspan="3" align="center"><img src="imgMarcas/<?php echo $imagen;?>" /></td>
  					</tr>
  					<tr>
						<td height="69" valign="top"></td>
  						<td height="69" valign="top" align="right">&nbsp; </td>
  					</tr>
  				</table>
				<?php		
					mysql_free_result($result);
				?>

				<div align="center" style="position:absolute; left: 599px; top: 309px;">
					<input name="sbmReturn" type="button" id="sbmReturn" value="Retornar" onClick="window.open('index.php', '_self');" class="boton" />
				</div>
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