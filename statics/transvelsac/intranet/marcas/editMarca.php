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
      		<p class="titulo">Editar Marca</p>
      		<div id="busqueda">
				<form action="saveEditMarca.php" style="font-size:10px; margin-top:10px; text-align:center;" class="cmxform" id="frmEditMarca" NAME="frmEditMarca" method="post" enctype="multipart/form-data">       
  					<table align="center" width="40%">
  					<?php
						$idMarca=$_GET['idMarca'];
						$sql="SELECT * FROM marca WHERE idmarca='$idMarca'";
						$result=consulta($sql);
						$rs=leer_registro($result);
					?>
    					<input type="hidden" id="idmarca" name="idmarca" value="<?php echo $rs['idmarca']; ?>" />
  						<tr>
    						<td width="43%"><label>Nombre Marca:</label></td>
    						<td align="left">
    							<input type="text" name="nombre" id="nombre" value="<?php echo $rs['nombre']; ?>" style="text-transform:uppercase" size="25" maxlength="40" /><b class="alert">*</b>&nbsp;</td>
  						</tr>
   					<?php		
						mysql_free_result($result);
					?>
  						<tr>
    						<td colspan="2" align="center">
 								<input name="btnGuardar" type="submit" id="btnGuardar" value="Guardar" class="boton"/>
&nbsp;&nbsp;
								<input name="sbmReturn"  class="boton"  type="button" id="sbmReturn" value="Cancelar" onClick="window.open('index.php', '_self');"/>
							</td>
  						</tr>
					</table>
				</form>
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