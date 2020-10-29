<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/pro_drop_1.css" />
<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesionCaja.php");
CheckNivel();

extract($_REQUEST);

$cantidad=$canProducto;
if(!isset($cantidad)){$cantidad=1;}

$qry=mysql_query("select * from producto where idProducto='".$idProducto."'");
$row=mysql_fetch_array($qry);

if(isset($_SESSION['carro']))
	$carro=$_SESSION['carro'];
	
$can=$canProducto;
$total=$canProducto*$costoUnit;

$carro[md5($idProducto)]=array('identificador'=>md5($idProducto),'idProducto'=>$idProducto, 'cantidad'=>$canProducto, 'costoUnit'=>$costoUnit, 'total'=>$total,'producto'=>$row['nomProd'], 'codigo'=>$row['codProd'], 'descripcion'=>$row['descCorta']);
$_SESSION['carro']=$carro;

	$contador=0;
	$suma=0;
?>
  <table width="98%" align="center" style="margin:0 10px;">
    <tr>
      <td height="5" colspan="3">
        <div align="left" style="width:300px; float:left"><b>Numero de Items:</b></div>
      </td>
    </tr>
    <tr>
      <td width="3%" align="center" class="title"><div align="center" >Item</div></td>
      <td width="7%" align="center" class="title"><div align="center">Codigo</div></td>
      <td width="40%" align="center" class="title"><div align="center">Descripcion</div></td>
      <td width="5%" align="center" class="title"><div align="center">Cantidad</div></td>
      <td width="10%" align="center" class="title"><div align="center">P. Unit.</div></td>
      <td width="15%" align="center" class="title"><div align="center">Total</div></td>
      <td width="10%" align="center" class="title"><div align="center">Acciones</div></td>
    </tr>
<?php

foreach($carro as $k => $v)
  {
  	$contador++;
	$suma=$suma+$v['total'];

echo "<tr>";

echo "<td width='3%' class='tdcont' align='center'>";
echo $contador;
echo "</td>";

echo "<td width='7%' class='tdcont' align='center'>";
echo $v['codigo'];
echo "</td>";

echo "<td width='40%' class='tdcont'>";
echo substr(rtrim($v['producto']),0,50);
echo "</td>";

echo "<td width='5%' class='tdcont' align='center'>";
echo $v['cantidad'];
echo "</td>";

echo "<td width='10%' class='tdcont' align='right'>";
echo redondeado($v['costoUnit']);
echo "</td>";

echo "<td width='10%' class='tdcont' align='right'>";
echo redondeado($v['total']);
echo "</td>";

echo "<td class='tdcont' align='center'><a class='link' href='#' onclick='BorraContenido(".$v['idProducto'].")'>";
echo "<img src='../images/trash.gif' width='12' height='14' border='0'>";

echo "</tr>";

}
?>
</table>
<table width="98%" align="center" style="margin:0 10px;">
  <tr>
     <td colspan="5" class="title">Total</td>
     <td class="tdcont" align="right">S/.&nbsp;&nbsp;&nbsp; <?php if(isset($suma) and $suma!=0) echo redondeado($suma); ?></td>
     <td class="tdcont" align="center">&nbsp;</td>
  </tr>
</table>
