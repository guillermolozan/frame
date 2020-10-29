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
       
    <?php
	$idEmpresa=$_GET['idEmpresa'];
	$sql="SELECT * FROM empresa WHERE idempresa='$idEmpresa'";
	$result=consulta($sql);
	$rs=leer_registro($result);
	?>
      		<p class="titulo"><?php echo $rs['razonsocial']; ?></a></p>
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
			
            <FORM ACTION="saveEditEmpresa.php" class="cmxform" id="frmEditEmpresa" NAME="frmEditEmpresa" METHOD="POST" ENCTYPE="multipart/form-data"> 
<table width="95%" align="center" style="margin:0 10px;">

    	<input type="hidden" id="idempresa" name="idempresa" value="<?php echo $rs['idempresa']; ?>" />
    <tr>
    <td class="title" width="20%"><strong >Nombre :</strong></td>
    <td width="30%" class="tdcont"><input type="text" name="razonsocial" id="razonsocial" value="<?php echo $rs['razonsocial']; ?>"   size="50" style="text-transform:uppercase" /><b class="alert">*</b></td>
  </tr>
  <tr>
    <td class="title" width="20%"><strong >Direccion :</strong></td>
    <td width="30%" class="tdcont"><input type="text" name="direccion" id="direccion" value="<?php echo $rs['direccion']; ?>"   size="50" style="text-transform:capitalize" /><b class="alert">*</b></td>
  </tr>
     <tr>
    <td class="title" width="20%"><strong >RUC :</strong></td>
    <td width="30%" class="tdcont"><input type="text" name="ruc" id="ruc" value="<?php echo $rs['ruc']; ?>"   size="20" /><b class="alert">*</b></td>
  </tr>
  <tr>
    <td class="title" width="20%"><strong >Telefonos :</strong></td>
    <td width="30%" class="tdcont"><input type="text" name="telefono" id="telefono" value="<?php echo $rs['telefono']; ?>"   size="20" /></td>
  </tr>
 
</table>
 <?php		
		mysql_free_result($result);
		?>
<br />
 <div align="right" style="margin-right:30px"><input name="btnGuardar" type="submit" id="btnGuardar" value="Guardar" class="boton" /></div>
</FORM>
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