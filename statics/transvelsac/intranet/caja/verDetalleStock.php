<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesionCaja.php");
CheckNivel();
require_once("../pdf/dompdf-0.5.1/dompdf_config.inc.php");

    $html ='<html>';
	$html.='<head>
	<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../css/pro_drop_1.css" />
    <script src="../css/stuHover.js" type="text/javascript"></script>
	<link href="css/estilo.css" rel="stylesheet" type="text/css" />
	<link href="css/sddm.css" rel="stylesheet" type="text/css"/>
	<link href="css/no_print.css" rel="stylesheet" type="text/css" media="print" />
<style type="text/css">
	.tdcont {
      border:#0098da dashed 1px; padding:2px 0;
	}
</style>
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
			<div style= "width:250px; height:74px; background-image:url(../infoline.png)" align="left"></div>
			</div>
			<br><br>
			<div style="width:850px; height:auto; align="center">';
    
    $sql="SELECT s.*, e.* FROM sucursal s INNER JOIN empresa e ON s.EMPRESA_idEmpresa=e.idEmpresa WHERE s.idSucursal='$_SESSION[idSucursal]'";
	$result=consulta($sql);
	$rs=leer_registro($result);
	$fecha= fechaAlta('DH');
	$nomEmpresa = $rs['nomEmpresa'];
	mysql_free_result($result);
	$html .='<p class="titulo" align="left">'.$nomEmpresa.'</p>';
	$html .='<p align="left">UBICACION DEL PRODUCTO A LA FECHA --> ('.$fecha.')</p>';
	
	 	$html .='<p class="titulo" align="left" style="font-size:11px">'.$rs['nomSucursal'].'</p> 
	  	<table width="98%" align="center" style="margin:0 10px; font-size:10px">';
	    $idSucursalE=$rs['idSucursal'];
		$estadoSerie="inventario";
		$estadoSerie2="no_definido";
		$idProducto = $_GET['idProducto'];
		$sql2="SELECT su.nomSucursal,p.nomProd,sp.estadoSerie,count(sp.idSerie) as total,e.nomEmpresa FROM serie_producto as sp LEFT JOIN producto as p ON sp.MOVIMIENTO_PRODUCTO_PRODUCTO_idProducto = p.idProducto LEFT JOIN sucursal as su ON sp.idUbicacion=su.idSucursal LEFT JOIN empresa e ON e.idEmpresa=su.EMPRESA_idEmpresa WHERE (sp.estadoSerie='$estadoSerie' OR sp.estadoSerie='$estadoSerie2') AND p.idProducto='$idProducto' GROUP BY su.nomSucursal,p.nomProd,sp.estadoSerie ORDER BY su.nomSucursal";
		$result2=consulta($sql2);
		while($rs2 = leer_registro($result2))
		{
		  if ($rs2['estadoSerie']=="inventario") {
         	$html .='
			<tr>
            <td class="tdcont" colspan="1" align="left">'.$rs2['nomEmpresa'].'</td>
            <td class="tdcont" colspan="1" align="left">'.$rs2['nomSucursal'].'</td>
            <td class="tdcont" align="left">'.$rs2['nomProd'].'</td>
            <td class="tdcont" align="left">En Stock</td>
            <td class="tdcont" align="right">'.$rs2['total'].'&nbsp;&nbsp;</td>
            </tr>';
          } else {
         	$html .='
			<tr>
            <td class="tdcont" colspan="1" align="left">'.$rs2['nomEmpresa'].'</td>
            <td class="tdcont" colspan="1" align="left">'.$rs2['nomSucursal'].'</td>
            <td class="tdcont" align="left">'.$rs2['nomProd'].'</td>
            <td class="tdcont" align="left">En Transito</td>
            <td class="tdcont" align="right">'.$rs2['total'].'&nbsp;&nbsp;</td>
            </tr>';
		  }
		}
		mysql_free_result($result2);
		
		$html .='</table>';
		
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