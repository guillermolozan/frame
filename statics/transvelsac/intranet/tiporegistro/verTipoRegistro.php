<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EMPRESA DE TRANSPORTE LUCERITO...</title>
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
      		<p class="titulo">Ver Tipo de Registro</p>
      		<div id="busqueda">
      			<?php
				$idTipoRegistro=$_GET['idTipoRegistro'];
				$sql="SELECT * FROM tiporegistro WHERE idtiporegistro='$idTipoRegistro'";
				$result=consulta($sql);
				$rs=leer_registro($result);
				?>
  				<table align="center" width="60%">
  					<tr>
    					<td width="18%" height="24"><label>Nombre :</label></td>
    					<td width="23%" align="left"><label style="color:#3366CC"><?php echo $rs['nombre'];?></label></td>
  					</tr>
  					<tr>
						<td height="69" valign="top">
				<div align="center" style="position:absolute; left: 599px; top: 309px;">
					<input name="sbmReturn" type="button" id="sbmReturn" value="Retornar" onClick="window.open('index.php', '_self');"  class="boton"/>
				</div>                        
                        </td>
  					</tr>
   				<?php		
				mysql_free_result($result);
				?>
 				</table>

       		</div>
      	    <br />
   
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