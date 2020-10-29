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
	<link href="css/sddm.css" rel="stylesheet" type="text/css" />
	</head>';

	$html.='<body>';
	$html.='<div id="container">';
	$html .='<div id="mainContent">
			<div style= "width:550px; height:100px; background-image:url(../images/header.png)">
			<div style= "width:250px; height:74px; background-image:url(../infoline.png)" align="left">
			</div>
			</div>
			<br><br>
			<div style="width:550px; height:auto; align="center">';
    
	$idEmpresaA=$_GET['idEmpresa'];
	$sql="SELECT * FROM empresa WHERE idEmpresa='$idEmpresaA'";
	$result=consulta($sql);
	$rs=leer_registro($result);
	$fecha= fechaAlta('DH');
	$fecha2= fechaAlta('D');
	$nomEmpresa = $rs['nomEmpresa'];
	mysql_free_result($result);
	$html .='<p class="titulo" align="left">'.$nomEmpresa.'</p>';
	$html .='<p align="left">INVENTARIO REAL ('.$fecha.')</p>';
	
	$sql="SELECT * FROM sucursal WHERE EMPRESA_idEmpresa='$idEmpresaA' ORDER BY nomSucursal";
	$result=consulta($sql);
	while($rs = leer_registro($result))
	{
	 	$html .='<p class="titulo" align="left" style="font-size:11px">'.$rs['nomSucursal'].'</p> 
	  	<table width="98%" align="center" style="margin:0 10px; font-size:11px">';
	    $idSucursalE=$rs['idSucursal'];
		$estadoSerie="inventario";
		$estadoSerie2="no_definido";
		$sql2="SELECT t.nomTipoProd, t.idTipoProd, count(sp.idSerie) as total FROM serie_producto as sp INNER JOIN producto as p ON sp.MOVIMIENTO_PRODUCTO_PRODUCTO_idProducto = p.idProducto INNER JOIN modelo as m ON p.MODELO_idModelo=m.idModelo INNER JOIN tipo_producto as t ON m.TIPO_PRODUCTO_idtipoProd=t.idTipoProd WHERE sp.estadoSerie='$estadoSerie' AND sp.idUbicacion='$idSucursalE' GROUP BY t.idTipoProd ORDER BY t.nomTipoProd";
		$result2=consulta($sql2);
		while($rs2 = leer_registro($result2))
		{
         	$html .='
			<tr style="background-color:#00CCFF;">
            <td colspan="2" align="left">'.$rs2['nomTipoProd'].'</td>
            <td align="right">'.$rs2['total'].'&nbsp;&nbsp;</td>
            </tr>';
        
			$idTipoProd=$rs2['idTipoProd'];
			$sql3="SELECT p.nomProd, count(sp.idSerie) as total2 FROM serie_producto as sp INNER JOIN producto as p ON sp.MOVIMIENTO_PRODUCTO_PRODUCTO_idProducto = p.idProducto INNER JOIN modelo as m ON p.MODELO_idModelo=m.idModelo INNER JOIN tipo_producto as t ON m.TIPO_PRODUCTO_idtipoProd=t.idTipoProd WHERE sp.idUbicacion='$idSucursalE' AND t.idTipoProd='$idTipoProd' AND sp.estadoSerie='$estadoSerie' GROUP BY p.idProducto ORDER BY p.nomProd";
			$result3=consulta($sql3);
			while($rs3 = leer_registro($result3))
			{
				$html .='
				<tr>
				<td>&nbsp;</td>
                <td>'.$rs3['nomProd'].'</td>
                <td align="right">'.$rs3['total2'].'&nbsp;&nbsp;</td>
				</tr>';
			}
			mysql_free_result($result3);
		}
		mysql_free_result($result2);
		
		$html .='</table>';
	}
	mysql_free_result($result);
	$html .='
    </div>
    </div>
</div>
</body>
</html>';
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$archivo="Inv_Real_".$nomEmpresa."_".$fecha2.".pdf";
$dompdf->stream($archivo); 
?>