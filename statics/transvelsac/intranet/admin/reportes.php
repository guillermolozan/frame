<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("validarSesionAdmin.php");
CheckNivel();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::. - Panel de Administración DISTRIBUIDORA PEDRO RUIZ GALLO - .::.</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/sddm.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="container">
      <div id="header">
     	<?php
			include("header.php");
		?>
      <!-- end #header --></div>
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
        <?php
		$idEmpresaA=$_GET['idEmpresa'];
		$sql="SELECT * FROM empresa WHERE idEmpresa='$idEmpresaA'";
		$result=consulta($sql);
		$rs=leer_registro($result);
		$fecha= fechaAlta('DH');
		
		?>
       <!-- aca todo el contenido q kieras poner -->
		<p align="left" class="titulo"><?php echo $rs['nomEmpresa']; ?></p>
      		<div id="busqueda">
			</div>
            		<p align="left" class="titulo">Reportes (<?php echo $fecha;?>)</p>
              		<table width="50%" align="center" style="margin:0 10px; font-size:15px">
                        <tr>
                        	<td class="tdcont">Inventario General</td>
                        	<td class="tdcont" align="center"> <a href="ver_inventario.php?idEmpresa=<?php echo $idEmpresaA;?>" target="_blank" onClick="window.open(this.href, this.target, 'width=600,height=650,scrollbars=yes'); return false;"><img src="../images/icon_ver.png" style="border:0" /></a>&nbsp;&nbsp;<a href="inventarioPDF.php?idEmpresa=<?php echo $idEmpresaA;?>" target="_blank" style="display:none"><img src="../images/pdf.png" style="border:0" /></a></td>
                        </tr>
                         <tr>
                        	<td class="tdcont">Inventario Real</td>
                        	<td class="tdcont" align="center"><a href="ver_inventario1.php?idEmpresa=<?php echo $idEmpresaA;?>" target="_blank" onClick="window.open(this.href, this.target, 'width=600,height=650,scrollbars=yes'); return false;"><img src="../images/icon_ver.png" style="border:0" /></a>&nbsp;&nbsp;<a href="inventario1PDF.php?idEmpresa=<?php echo $idEmpresaA;?>" target="_blank"><img src="../images/pdf.png" style="border:0" /></a></td>
                        </tr>
                         <tr>
                        	<td class="tdcont">Inventario en traslado</td>
                        	<td class="tdcont" align="center"> <a href="ver_inventario2.php?idEmpresa=<?php echo $idEmpresaA;?>" target="_blank" onClick="window.open(this.href, this.target, 'width=600,height=650,scrollbars=yes'); return false;"><img src="../images/icon_ver.png" style="border:0" /></a>&nbsp;&nbsp;<a href="inventario2PDF.php?idEmpresa=<?php echo $idEmpresaA;?>" target="_blank"><img src="../images/pdf.png" style="border:0" /></a></td>
                        </tr>
                         <tr>
                        	<td class="tdcont">Reprote de Saldos de Productos</td>
                        	<td class="tdcont" align="center"> <a href="../reportes/generarpdf.php" target="_blank" onClick="window.open(this.href, this.target, 'width=900,height=800,scrollbars=yes'); return false;"><img src="../images/pdf.png" style="border:0" /></a></td>
                        </tr>
                         <tr>
                        	<td class="tdcont">Kardex Valorizado</td>
                        	<td class="tdcont" align="center"> <a href="kardexvalorizado1.php?idEmpresa=<?php echo $idEmpresaA;?>" target="_blank" onClick="window.open(this.href, this.target, 'width=900,height=800,scrollbars=yes'); return false;"><img src="../images/icon_ver.png" style="border:0" /></a>&nbsp;&nbsp;<a href="inventario2PDF.php?idEmpresa=<?php echo $idEmpresaA;?>" target="_blank"><img src="../images/pdf.png" style="border:0" /></a></td>
                        </tr>
                        <!--<tr>
                        	<td>Ventas por Cliente</td>
                        	<td align="center"><a href="#"><img src="../images/icon_ver.png" style="border:0" /></a>&nbsp;&nbsp; <a href="#" target="_blank"><img src="../images/pdf.png" style="border:0" /></a></td>
                        </tr>
                         <tr>
                        	<td>Ventas por Vendedor</td>
                        	<td align="center"><a href="#"><img src="../images/icon_ver.png" style="border:0" /></a>&nbsp;&nbsp; <a href="#" target="_blank"><img src="../images/pdf.png" style="border:0" /></a></td>
                        </tr> -->
                       
          </table>
    	<?php
		mysql_free_result($result);
		?>
</div>
<hr style="clear:both; visibility:hidden" />      
      </div>
      <hr style="clear:both; visibility:hidden" />
      <!-- end #mainContent --></div>
      <div id="footer" align="center">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
    </body>
</html>
