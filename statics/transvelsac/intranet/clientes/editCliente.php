<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::. - EMPRESA DE TRANSPORTE LUCERITO - .::.</title>
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
      
   <br /><br />
  <p class="titulo">Editar Cliente</p>
  <FORM ACTION="saveEditCliente.php" class="cmxform" id="frmEditCliente" NAME="frmEditCliente" METHOD="POST" ENCTYPE="multipart/form-data"> 
<table width="98%" align="center" style="margin:0 10px;">
<?php
	$idCliente=$_GET['idCliente'];
	$sql="SELECT * FROM cliente WHERE idcliente='$idCliente'";
	$result=consulta($sql);
	$rs=leer_registro($result);
	?>
    	<input type="hidden" id="idcliente" name="idcliente" value="<?php echo $rs['idcliente']; ?>" />
  <tr>
    <td class="title" width="20%"><strong >Nombre/Razon Social :</strong></td>
    <td width="30%" class="tdcont"><input type="text" name="razonsocial" id="razonsocial" value="<?php echo $rs['razonsocial']; ?>"  style="text-transform:uppercase" size="40" /><b class="alert">*</b></td>
    <td class="title" width="17%"><strong >Contacto :</strong></td>
    <td class="tdcont" width="33%"><input type="text" name="contacto" id="contacto" value="<?php echo $rs['contacto']; ?>" style="text-transform:capitalize" maxlength="40" size="30" /></td>
  </tr>
  <tr>
    <td class="title" ><strong >RUC/DNI :</strong></td>
    <td class="tdcont"><input type="text" name="ruc" id="ruc" value="<?php echo $rs['ruc']; ?>" maxlength="11" size="30" /><b class="alert">*</b></td>
    <td class="title" width="17%"><strong >Cargo :</strong></td>
    <td class="tdcont" width="33%"><input type="text" name="cargo" id="cargo" value="<?php echo $rs['cargo']; ?>" style="text-transform:uppercase" maxlength="20" size="30"/></td>
  </tr>
  <tr>
    <td class="title" ><strong >Dirección :</strong></td>
    <td class="tdcont"><input type="text" name="direccion" id="direccion" value="<?php echo $rs['direccion']; ?>" style="text-transform:capitalize" size="40"/> <b class="alert">*</b></td>
   <td class="title" width="17%"><strong >Celular :</strong></td>
    <td class="tdcont" width="33%"><input type="text" name="celular" id="celular" value="<?php echo $rs['celular']; ?>" maxlength="10" size="30" /></td>
  </tr>
  <tr>
    <td class="title" ><strong >Teléfono :</strong><br /></td>
    <td class="tdcont"><br />
     <input type="text" name="telefono1" id="telefono1" value="<?php echo $rs['telefono1']; ?>" maxlength="7" size="16"/>&nbsp;&nbsp;<input type="text" name="telefono2" id="telefono2" value="<?php echo $rs['telefono2']; ?>" maxlength="7" size="16"/></td>
    <td class="title" width="17%"><strong >Email :</strong></td>
    <td class="tdcont" width="33%"><input type="text" name="email" id="email" value="<?php echo $rs['email']; ?>" style="text-transform:lowercase" maxlength="50" size="30"/></td>
  </tr>
    <tr>
    <td class="title" ><strong >Disponible :</strong><br /></td>
    <td class="tdcont"><br />
      <input type="checkbox" name="bloqueado" id="bloqueado" value="<?php echo $rs['bloqueado']; ?>" <?php if($rs['bloqueado'] == 1) echo 'checked="checked"'; ?> /></td>
    </tr>
</table>
 <?php		
		mysql_free_result($result);
		?>
<br />
 <div align="right"><input name="btnGuardar" type="submit" id="btnGuardar" value="Guardar" class="boton" />&nbsp;&nbsp;<input name="sbmReturn" type="button" id="sbmReturn" value="Cancelar" onClick="window.open('index.php', '_self');" class="boton"/></div>
</FORM>

      
          <!-- end #mainContent --></div>
      <div id="footer">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --> 
    </div>
    </body>
</html>