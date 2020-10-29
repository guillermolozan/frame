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
      		<p class="titulo">Nuevo Tipo de Articulo</p>
      		<div id="busqueda">
      			<FORM ACTION="saveNewTipoRegistro.php" style="font-size:10px; margin-top:10px; text-align:center;" class="cmxform" id="frmNewTipoProd" NAME="frmNewTipoProd" METHOD="POST" ENCTYPE="multipart/form-data">
    				<table align="center" width="40%">
  						<tr>
    						<td width="60%"><label>Tipo de Registro de Caja</label></td>
    						<td align="left">
    							<input type="text" name="nombre" id="nombre" style="text-transform:uppercase" size="25" maxlength="40"/><b class="alert">*</b>&nbsp;
							</td>
  						</tr>
    						<td colspan="2" align="center">
								<input name="btnGuardar" type="submit" id="btnGuardar" value="Guardar"  class="boton"/>&nbsp;&nbsp;			 								<input name="sbmReturn" type="button" class="boton" id="sbmReturn" value="Cancelar" onClick="window.open('index.php', '_self');"/>
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