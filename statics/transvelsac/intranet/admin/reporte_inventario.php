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
		$sql="SELECT * FROM empresa WHERE idEmpresa='$idEmpresa'";
		$result=consulta($sql);
		$rs=leer_registro($result);
		$fecha= fechaAlta('DH');
		mysql_free_result($result);
		?>
       <!-- aca todo el contenido q kieras poner -->
		<p align="left" class="titulo"><?php echo $rs['nomEmpresa']; ?> - INVENTARIO<br />
        Fecha: <?php echo $fecha;?>
        <a href="inventario1PDF.php?idEmpresa=<?php echo $_GET['idEmpresa'];?>" target="_blank"><img src="../images/pdf.png" style="border:0" /></a>
        </p>
             
      		<div id="busqueda">
			</div>
           
			<?php
				$sql="SELECT * FROM sucursal WHERE EMPRESA_idEmpresa='$idEmpresaA' ORDER BY nomSucursal";
				$result=consulta($sql);
				while($rs = leer_registro($result))
				{
			?>
            		<p class="titulo"><?php echo $rs['nomSucursal']; ?></p>
                    <table width="98%" align="center" style="margin:0 10px;">
            		<?php
					$idSucursalE=$rs['idSucursal'];
					$estadoSerie="inventario";
					$estadoSerie2="no_definido";
					$sql2="SELECT t.nomTipoProd, t.idTipoProd, count(sp.idSerie) as total FROM serie_producto as sp INNER JOIN producto as p ON sp.MOVIMIENTO_PRODUCTO_PRODUCTO_idProducto = p.idProducto INNER JOIN modelo as m ON p.MODELO_idModelo=m.idModelo INNER JOIN tipo_producto as t ON m.TIPO_PRODUCTO_idtipoProd=t.idTipoProd WHERE (sp.estadoSerie='$estadoSerie' OR sp.estadoSerie='$estadoSerie2') AND sp.idUbicacion='$idSucursalE' GROUP BY t.idTipoProd ORDER BY t.nomTipoProd ";
					$result2=consulta($sql2);
					while($rs2 = leer_registro($result2))
					{
            		?>
                        <tr class="title">
                        	<td colspan="2"><?php echo $rs2['nomTipoProd'];?></td>
                            <td align="right"><?php echo $rs2['total'];?>&nbsp;&nbsp;</td>
                        </tr>
                        <?php
						$idTipoProd=$rs2[idTipoProd];
						$sql3="SELECT p.nomProd, count(sp.idSerie) as total2 FROM serie_producto as sp INNER JOIN producto as p ON sp.MOVIMIENTO_PRODUCTO_PRODUCTO_idProducto = p.idProducto INNER JOIN modelo as m ON p.MODELO_idModelo=m.idModelo INNER JOIN tipo_producto as t ON m.TIPO_PRODUCTO_idtipoProd=t.idTipoProd WHERE (sp.estadoSerie='$estadoSerie' OR sp.estadoSerie='$estadoSerie2') AND sp.idUbicacion='$idSucursalE' AND t.idTipoProd='$idTipoProd' GROUP BY p.nomProd";
						$result3=consulta($sql3);
						while($rs3 = leer_registro($result3))
						{
						?>
                        <tr>
                        	<td>&nbsp;</td>
                        	<td><?php echo $rs3['nomProd'];?></td>
                            <td align="right"><?php echo $rs3['total2'];?>&nbsp;&nbsp;</td>
                        </tr>
                        <?php
						}
						mysql_free_result($result3);
						?>
                    <?php
					}
					mysql_free_result($result2);

					?>
          </table>
            	<?php
				}
				mysql_free_result($result);
				?>
    	
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
