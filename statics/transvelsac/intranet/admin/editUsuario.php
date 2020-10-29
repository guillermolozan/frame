<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
unset($_SESSION['carro']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::. - Panel de Administración EMPRESA DE TRANSPORTE LUCERITO - .::.</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/sddm.css" rel="stylesheet" type="text/css" />
<script src="../js/lib/jquery.js" type="text/javascript"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/frm/cmxforms.js" type="text/javascript"></script>
<script src="../validar.js" type="text/javascript"></script>
<link type="text/css" href="../js/jpicker/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.core.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/i18n/ui.datepicker-es.js"></script>
<style type="text/css">
	form.cmxform label.error {
	margin-left:5px;
	color:red;
	font-style:italic
	}
</style>
<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({
		dateFormat: 'yy-mm-dd',
		regional: 'es',
		showOn: 'button', buttonImage: '../images/calendar.gif', buttonImageOnly: true}); 
	});
</script>
</head>
<body>
	<div id="container">
      <div id="datos">
      	<?php
			include("menuSecund.php");
		?>
      </div>
     
      <div id="mainContent">
      <div style="width:970px; height:auto">
      	<div id="left">
        	<?php include("menu.php") ?>
			<hr style="clear:both; visibility:hidden"/>
        </div>
        <div id="right">
       <!-- aca todo el contenido q kieras poner -->
      		<p class="titulo">Editar Usuario</p>
	    <FORM ACTION="saveEditUsuario.php" class="cmxform" id="frmEditUsuario" NAME="frmEditUsuario" METHOD="POST" ENCTYPE="multipart/form-data"> 
<table width="95%" align="center" style="margin:0 10px;">
<?php
	$idUsuario=$_GET['idUsuario'];
	$sql="SELECT u.*, r.nombre as nomRol, e.idempresa FROM usuario as u LEFT JOIN sucursal as s ON u.idsucursal=s.idSucursal LEFT JOIN empresa as e ON e.idempresa=s.idempresa INNER JOIN rol as r ON u.idrol=r.idrol WHERE u.idusuario='$idUsuario'";
	$result=consulta($sql);
	$rs=leer_registro($result);
	$idEmpresa=$rs['idempresa'];
	$idSucursal=$rs['idsucursal'];
	?>
    	<input type="hidden" id="idusuario" name="idusuario" value="<?php echo $rs['idusuario']; ?>" />
        <input type="hidden" id="idempresa" name="idempresa" value="<?php echo $rs['idempresa']; ?>" />
    <tr>
    <td class="title" width="20%"><strong >Nombre :</strong></td>
    <td width="30%" class="tdcont"><input type="text" name="nomUsuario" id="nomUsuario" value="<?php echo $rs['nomUsuario']; ?>"   size="40" style="text-transform:capitalize" /><b class="alert">*</b></td>
  </tr>
  
  <tr>
    <td class="title" width="20%"><strong >Rol :</strong></td>
    <td width="30%" class="tdcont">
    	<select name="idrol" id="idrol">
			<?php
            $idRolA=$rs['idrol'];
            $sql = "SELECT * FROM rol WHERE idrol!='9' ORDER BY nombre";
            $rsl = consulta($sql);
            while($reg = leer_registro($rsl))
            {
            ?>
                <option value="<?php echo $reg["idrol"];?>" <?php if($idRolA==$reg["idrol"]){echo 'selected="selected"';}?>><?php echo $reg["nombre"];?></option>
            <?php
            }
            mysql_free_result($rsl);
            ?>
      </select><b class="alert">*</b>
     </td>
  </tr>
  <tr>
    <td class="title" width="20%"><strong >Ubicación :</strong></td>
    <td width="30%" class="tdcont">
    	<select name="idsucursal" id="idsucursal">
        <option value="0">--Seleccione--</option>
			<?php
            $sql = "SELECT * FROM sucursal WHERE idempresa='$idEmpresa' ORDER BY nombre";
            $rsl = consulta($sql);
            while($reg = leer_registro($rsl))
            {
            ?>
                <option value="<?php echo $reg["idsucursal"];?>" <?php if($idSucursal==$reg["idsucursal"]){echo 'selected="selected"';}?> ><?php echo $reg["nombre"];?></option>
            <?php
            }
            mysql_free_result($rsl);
            ?>
      </select><b class="alert">*</b>
     </td>
  </tr>
  <tr>
    <td class="title" width="17%"><strong >Fecha de Ingreso a la Empresa :</strong></td>
    <td class="tdcont" width="33%"><input type="text" name="datepicker" id="datepicker" style="text-transform:uppercase"  value="<?php echo $rs["fechaIngreso"] ?>" size="30" />
      <b class="alert">*</b></td>
  </tr>
  <tr>
    <td class="title" width="17%"><strong >Codigo :</strong></td>
    <td class="tdcont" width="33%"><input type="text" name="codUsuario" id="codUsuario" value="<?php echo $rs['codUsuario']; ?>"  maxlength="40" size="30" />
      <b class="alert">*</b></td>
  </tr>
  <tr>
    <td class="title" width="20%"><strong >Contraseña :</strong></td>
    <td width="30%" class="tdcont"><input type="password" name="contrasena" id="contrasena"  size="30" value="<?php echo $rs['contrasena']; ?>" /></td>
  </tr>
</table>
 <?php		
		mysql_free_result($result);
		?>
<br />
 <div align="right">
   <input name="btnGuardar" type="submit" id="btnGuardar" value="Guardar" class="boton" />
   &nbsp;&nbsp;
   <input name="sbmReturn" type="button" id="sbmReturn" value="Cancelar" onClick="window.open('usuarios.php?idEmpresa=<?php echo $idEmpresa; ?>', '_self');" class="boton"/></div>
</FORM>
	<!-- end #mainContent -->
	</div>
<hr style="clear:both; visibility:hidden"       />      
      </div>
      <hr style="clear:both; visibility:hidden"       />
      <!-- end #mainContent --></div>
      <div id="footer" align="center">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
    
<!-- end #container --> 
</div>
</body>
</html>