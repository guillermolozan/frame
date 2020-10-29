<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("validarSesionAdmin.php");
CheckNivel();
unset($_SESSION['carro']);
$fechaActual = getdate();
$anio = $fechaActual['year'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::. - Panel de Administración DISTRIBUIDORA PEDRO RUIZ GALLO - .::.</title>
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
  <!-- aca todo el contenido q kieras poner -->
  <p class="titulo">Actualizar Compras con el Tipo de Cambio</a></p>
  <table width="95%" align="center" style="margin:0 10px;">
    <?php
	  $tipoMovim = "Compra";
	  $errores = 0;
      $sql = "SELECT idMovim,codMovim,fecha,tipoComprobante,codComprobante FROM movimiento WHERE descMovim='$tipoMovim'";
      $consulta = consulta($sql);
	  while($rs = leer_registro($consulta))
	  {
	    $fechaDoc = $rs['fecha'];
        $sqlTipoCambio = "SELECT valor FROM tipo_cambio WHERE substr(fechaAlta,1,10)=substr('$fechaDoc',1,10)";
        $consultaTipoCambio = consulta($sqlTipoCambio);
	    if ($rsTipoCambio = leer_registro($consultaTipoCambio))
	    {
		  $tipocambio = $rsTipoCambio['valor'];
          $sqlActualTipoCambio = "UPDATE movimiento SET tipocambio='$tipocambio' WHERE substr(fecha,1,10)=substr('$fechaDoc',1,10)";
          $consultaActualTipoCambio = consulta($sqlActualTipoCambio);
		} else {
          $errores = $errores + 1;
	?>
      <tr>
        <td class="title" width="70%"><strong >Error, no existe Tipo de Cambio en la compra No. <?php echo $rs['codMovim']; ?>, para esta fecha :</strong></td>
        <td width="30%" class="tdcont"><?php echo $rs['fecha']; ?>"</td>
      </tr>
    <?php
		}
	  }
	  if ($errores == 0)
	  {
	?>
      <tr>
        <td class="title" width="70%"><strong >No existieron Errores en la actualizacion del Tipo de Cambio...</strong></td>
      </tr>
    <?php
	  }
/*          $sql1 = "SELECT * FROM movimiento WHERE (idProveedor=1 OR idProveedor=14 OR idProveedor=2 OR idProveedor=6 OR idProveedor=7 OR idProveedor=8 OR idProveedor=11) AND fecha<'2009-12-02' ORDER BY idMovim";
          $consulta1 = consulta($sql1);
	      while($rs1 = leer_registro($consulta1))
	      {
		    $idMovim = $rs1['idMovim'];
			$montoMovim = $rs1['montoMovim'] * 1.19;
            $sql11 = "UPDATE movimiento SET montoMovim=ROUND('$montoMovim',2) WHERE idMovim='$idMovim'";
            $consulta11 = consulta($sql11);
		  }

          $sql2 = "SELECT m.*,mp.* FROM movimiento as m LEFT JOIN movimiento_producto as mp ON m.idMovim=mp.MOVIMIENTO_idMovim WHERE (m.idProveedor=1 OR m.idProveedor=14 OR m.idProveedor=2 OR m.idProveedor=6 OR m.idProveedor=7 OR m.idProveedor=8 OR m.idProveedor=11) AND m.fecha<'2009-12-02' ORDER BY m.idMovim";
          $consulta2 = consulta($sql2);
	      while($rs2 = leer_registro($consulta2))
	      {
		    $idMovim = $rs2['idMovim'];
		    $idProducto = $rs2['PRODUCTO_idProducto'];
			$costoUnit = $rs2['costoUnit'] * 1.19;
			$valorEntrada = $costoUnit * $rs2['cantEntrada'];
            $sql21 = "UPDATE movimiento_producto SET costoUnit=ROUND('$costoUnit',2),valorEntrada=ROUND('$valorEntrada',2) WHERE MOVIMIENTO_idMovim='$idMovim' AND PRODUCTO_idProducto='$idProducto'";
            $consulta21 = consulta($sql21);
		  }

          $sql3 = "SELECT mp.PRODUCTO_idProducto,sum(mp.cantEntrada) as stock, sum(mp.cantEntrada*mp.costoUnit*m.tipocambio) as monto,m.tipocambio FROM movimiento as m LEFT JOIN movimiento_producto as mp ON m.idMovim=mp.MOVIMIENTO_idMovim WHERE mp.esUltimo=1 GROUP BY mp.PRODUCTO_idProducto ORDER BY mp.PRODUCTO_idProducto";
          $consulta3 = consulta($sql3);
	      while($rs3 = leer_registro($consulta3))
	      {
		    $indiceProducto = $rs3['PRODUCTO_idProducto'];
			$tmpMonto = $rs3['monto'];
			$tmpStock = $rs3['stock'];
			$precioCompra = $tmpMonto/$tmpStock;
		    $tipocambio = $rs3['tipocambio'];
            $sqlPrecioCompra = "UPDATE producto_empresa SET precioCompra=ROUND('$precioCompra',2),valor_dollar='$tipocambio' WHERE PRODUCTO_idProducto='$indiceProducto'";
            $consultaPrecioCompra = consulta($sqlPrecioCompra);
	      }*/


//Esta parte es para actualizar el precio de compra y tipo de cambio en la tabla producto_empresa
/*          $sqlPC = "SELECT * FROM producto_empresa";
          $consultaPC = consulta($sqlPC);
	      while($rsPC = leer_registro($consultaPC))
	      {
		    $indiceProducto = $rsPC['PRODUCTO_idProducto'];
            $sqlPrecioProm = "SELECT mov.tipocambio,mp.costoUnit FROM movimiento as mov LEFT JOIN movimiento_producto as mp ON mov.idMovim=mp.MOVIMIENTO_idMovim WHERE mov.descMovim='$tipoMovim' AND mp.PRODUCTO_idProducto='$indiceProducto' ORDER BY mov.fecha DESC";
            $consultaTipoCambio = consulta($sqlPrecioProm);
	        if ($rsTipoCambio = leer_registro($consultaTipoCambio))
	        {
			  $precioCompra = $rsTipoCambio['tipocambio'] * $rsTipoCambio['costoUnit'];
			  $tipocambio = $rsTipoCambio['tipocambio'];
              $sqlPrecioCompra = "UPDATE producto_empresa SET precioCompra=ROUND('$precioCompra',2),valor_dollar='$tipocambio' WHERE PRODUCTO_idProducto='$indiceProducto'";
              $consultaPrecioCompra = consulta($sqlPrecioCompra);
			}
	      }*/
	  
	  
	?>
  </table>
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