<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("validarSesionAdmin.php");
CheckNivel();
require_once("../pdf/dompdf-0.5.1/dompdf_config.inc.php");

    $html ='<html>';
	$html.='<head>
	<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
	<link href="css/estilo.css" rel="stylesheet" type="text/css" />
	<link href="css/sddm.css" rel="stylesheet" type="text/css"/>
	<link href="css/no_print.css" rel="stylesheet" type="text/css" media="print" />
	<script type="text/javascript">
		function Impresion()
		{
		if (window.print)
		{
		window.print();
		window.close();
		}
		else
		{
		alert("Este navegador no soporta esta opción.");
		window.close();
		}
		}
	</script>
	</head>';

	$html.='<body>';
	$html.='<div>';
	$html .='<div>
			<div style= "width:550px; height:100px; background-image:url(../images/header.png)">
			</div>
			<br><br>
			<div style="width:550px; height:auto; align="center">';
    
	$idEmpresaA=$_GET['idEmpresa'];
	$sql="SELECT * FROM empresa WHERE idEmpresa='$idEmpresaA'";
	$result=consulta($sql);
	$rs=leer_registro($result);
	$fecha= fechaAlta('DH');
	$nomEmpresa = $rs['nomEmpresa'];
	mysql_free_result($result);
	$html .='<p class="titulo" align="left">'.$nomEmpresa.'</p>';
	$html .='<p align="left">INVENTARIO REAL ('.$fecha.')</p>';
	
	$sql="SELECT * FROM sucursal WHERE EMPRESA_idEmpresa='$idEmpresaA' ORDER BY nomSucursal";
	$result=consulta($sql);
	while($rs = leer_registro($result))
	{
	 	$html .='<p class="titulo" align="left" style="font-size:11px">'.$rs['nomSucursal'].'</p> 
	  	<table width="98%" align="center" style="margin:0 10px; font-size:10px">
			<tr>
			<td>&nbsp;</td>
            <td  class="tdcont">Producto</td>
            <td align="right" class="tdcont">Entradas&nbsp;&nbsp;</td>
            <td align="right" class="tdcont">Ventas&nbsp;&nbsp;</td>
            <td align="right" class="tdcont">En Transito&nbsp;&nbsp;</td>
            <td align="right" class="tdcont">Saldo&nbsp;&nbsp;</td>
			</tr>';

	    $idSucursalE=$rs['idSucursal'];
		$estadoSerie="inventario";
		$estadoSerie2="no_definido";
		
/*		$sql2="SELECT m.*,mp.*,sp.*,p.nomProd FROM serie_producto as sp INNER JOIN movimiento_producto as mp ON mp.PRODUCTO_idProducto=sp.MOVIMIENTO_PRODUCTO_PRODUCTO_idProducto AND mp.MOVIMIENTO_idMovim=sp.MOVIMIENTO_PRODUCTO_MOVIMIENTO_idMovim INNER JOIN movimiento as m ON m.idMovim=mp.MOVIMIENTO_idMovim LEFT JOIN producto as p ON sp.MOVIMIENTO_PRODUCTO_PRODUCTO_idProducto = p.idProducto WHERE sp.idUbicacion='$idSucursalE' ORDER BY p.nomProd";*/

		$sql2="SELECT m.*,mp.*,sp.*,p.nomProd FROM serie_producto as sp INNER JOIN movimiento_producto as mp ON mp.PRODUCTO_idProducto=sp.MOVIMIENTO_PRODUCTO_PRODUCTO_idProducto AND mp.MOVIMIENTO_idMovim=sp.MOVIMIENTO_PRODUCTO_MOVIMIENTO_idMovim INNER JOIN movimiento as m ON m.idMovim=mp.MOVIMIENTO_idMovim LEFT JOIN producto as p ON sp.MOVIMIENTO_PRODUCTO_PRODUCTO_idProducto = p.idProducto ORDER BY p.nomProd";
		
		$result3=consulta($sql2);
		if($rs3 = leer_registro($result3)) $lRegistro = 1;
		while($lRegistro == 1)
		{
			$idProducto = $rs3['PRODUCTO_idProducto'];
			$nEntradas = 0;
			$nVentas = 0;
			$nTransito = 0;
			$nSaldo = 0;
			while($idProducto == $rs3['PRODUCTO_idProducto'])
			{
			  if ($rs3['tipoMovim']=="Entrada") $nEntradas = $nEntradas + 1;
			  if ($rs3['tipoMovim']=="Salida")
			  {
			    if ($rs3['descMovim']=="Venta")
				{
			      $nVentas = $nVentas + 1;
				} else
				{
			      $nTransito = $nTransito + 1;
				}
			  }
			  if ($rs3 = leer_registro($result3)) {$lRegistro=1;}
			  else {$lRegistro = 0;}
			}
			$nSaldo = $nEntradas - $nVentas - $nTransito;

			$html .='
			<tr>
			<td>&nbsp;</td>
            <td>'.$rs3['nomProd'].'</td>
            <td align="right">'.$nEntradas.'&nbsp;&nbsp;</td>
            <td align="right">'.$nVentas.'&nbsp;&nbsp;</td>
            <td align="right">'.$nTransito.'&nbsp;&nbsp;</td>
            <td align="right">'.$nSaldo.'&nbsp;&nbsp;</td>
			</tr>';
		}
		mysql_free_result($result3);
		
		$html .='</table>';
	}
	mysql_free_result($result);
	$html.= '<br><br><div align="right" style="margin-right:20px" id= "noPrint">
 <a href="" onclick="javascript:Impresion();">Imprimir</a>&nbsp;&nbsp;<a href="javascript:close()">Cerrar</a></div><br><br>';
	$html .='
    </div>
    </div>
</div>
</body>
</html>';
echo $html;
?>