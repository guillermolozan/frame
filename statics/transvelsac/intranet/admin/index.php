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
<style type="text/css">
	form.cmxform label.error {
	margin-left:5px;
	color:red;
	font-style:italic
	}
</style>
<script language="JavaScript">
document.onkeydown = function(){ 
  if(window.event && (window.event.keyCode == 8)){
    return false;
  }
}
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
      	  <hr style="clear:both; visibility:hidden"       />
        </div>
        <div id="right">
       <!-- aca todo el contenido q kieras poner -->
		<p class="titulo">Cuenta Administrador</p>
	    <?php 
				if(isset($_GET['msg']))
				{ 
					$display="";
					if($_GET['msg']=='1')
						{$msg= "Registro agregado satisfactoriamente"; }
					elseif($_GET['msg']=='2')
						{$msg= "Registro modificado satisfactoriamente";}
					elseif($_GET['msg']=='3')
						{$msg= "Registro eliminado satisfactoriamente";}
					else
						{header("Location:index.php");}
				}
				else
				{
					$msg=''; $display="style='display:none'";
				}
                echo   "<div align='right' class='alert' ".$display.">".$msg."</div>";
				?>
             
      		<div id="busqueda">
			</div>
            
            <FORM ACTION="saveEditUsuario.php" class="cmxform" id="frmEditAdmin" NAME="frmEditAdmin" METHOD="POST" ENCTYPE="multipart/form-data"> 
<table width="75%" align="center" style="margin:0 10px;">
<?php
	$sql="SELECT u.* FROM usuario as u WHERE u.idUsuario='$_SESSION[idUsuario]'";
	$result=consulta($sql);
	$rs=leer_registro($result);
	?>
    	<input type="hidden" id="idusuario" name="idusuario" value="<?php echo $rs['idusuario']; ?>" />
        <input type="hidden" id="idempresa" name="idempresa" value="<?php echo $rs['idempresa']; ?>" />
        <input type="hidden" id="idrol" name="idrol" value="<?php echo $rs['idrol']; ?>" />
    <tr>
    <td class="title" width="20%"><strong >Nombre :</strong></td>
    <td class="tdcont"><input type="text" name="nomUsuario" id="nomUsuario" value="<?php echo $rs['nomUsuario']; ?>" size="40" style="text-transform:capitalize" /><b class="alert">*</b></td>
  </tr>
  
  <tr>
    <td class="title" width="17%"><strong >Codigo :</strong></td>
    <td class="tdcont"><input type="text" name="codUsuario" id="codUsuario" value="<?php echo $rs['codUsuario']; ?>" style="text-transform:uppercase" maxlength="40" size="30" />
      <b class="alert">*</b></td>
  </tr>
  <tr>
    <td class="title" width="20%"><strong >Contraseña :</strong></td>
    <td class="tdcont"><input type="password" name="contrasena" id="contrasena"  size="30" /></td>
  </tr>
  <tr>
    <td class="title" width="20%"><strong >Rep. Contraseña :</strong></td>
    <td class="tdcont"><input type="password" name="contrasena2" id="contrasena2"  size="30" /></td>
  </tr>
</table>
 <?php		
		mysql_free_result($result);
		?>
<br />
 <div align="right"><input name="btnGuardar" type="submit" id="btnGuardar" value="Guardar" class="boton" /></div>
</FORM>
</div>
<hr style="clear:both; visibility:hidden"       />      
      </div>
      <hr style="clear:both; visibility:hidden"       />
      <!-- end #mainContent --></div>
      <div id="footer" align="center">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
    </body>
</html>
