<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesion.php");
CheckNivel();
unset($_SESSION['carro']);
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
        <p class="titulo">PARAMETROS ACTUALES</a></p>
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
    <?php
	$sql="SELECT * FROM parametro";
	$result=consulta($sql);
	while($rs=leer_registro($result))
	{
	?>
      		<p class="titulo"><?php echo $rs['nomParametro']; ?></a></p>
            <FORM ACTION="saveEditParametro.php" class="cmxform" id="frmEditParametro" NAME="frmEditParametro" METHOD="POST" ENCTYPE="multipart/form-data"> 
<table width="75%" align="center" style="margin:0 10px;">

    	<input type="hidden" id="idParametro" name="idParametro" value="<?php echo $rs['idParametro']; ?>" />
    <tr>
    <td class="title" width="20%"><strong >Nombre :</strong></td>
    <td width="30%" class="tdcont"><input type="text" name="nomParametro" id="nomParametro" value="<?php echo $rs['nomParametro']; ?>"   size="30" readonly="readonly" /></td>
  </tr>
  <tr>
    <td class="title" width="20%"><strong >Valor :</strong></td>
    <td width="30%" class="tdcont"><input type="text" name="valor" id="valor" value="<?php echo $rs['valor']; ?>"  size="30" /><b class="alert">*</b></td>
  </tr>
     <tr>
    <td class="title" width="20%"><strong >Fecha Alta :</strong></td>
    <td width="30%" class="tdcont"><input type="text" name="fechaAlta" id="fechaAlta" value="<?php echo $rs['fechaAlta']; ?>"   size="20" /><b class="alert">*</b></td>
  </tr>
  <tr>
    <td class="title" width="20%"><strong >Fecha Baja :</strong></td>
    <td width="30%" class="tdcont"><input type="text" name="fechaBaja" id="fechaBaja" value="<?php echo $rs['fechaBaja']; ?>"   size="20" /></td>
  </tr>
 </table>

<br />
 <div align="right" style="margin-right:120px"><input name="btnGuardar" type="submit" id="btnGuardar" value="Guardar" class="boton" /></div>
</FORM>
 <?php
 }		
		mysql_free_result($result);
		?>
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