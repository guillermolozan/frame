<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/pro_drop_1.css" />
<?php
  session_start();
  require("../db/mysql.inc.php");
  $conexion=conectar();
  $IdVentasCab=$_GET['IdVentasCab'];
  $contador = 1;
  $TotalVenta = 0;
  if(isset($_SESSION['carro'])) {
	$carro=$_SESSION['carro'];
    foreach($carro as $k => $v) {
	   $TotalVenta = $TotalVenta + ($v['cantidad'] * $v['precio']);
	}
  } 

  $sql = "select ventasdet.*, unimed.nombre as unimed from ventasdet LEFT JOIN unimed ON unimed.idunimed=ventasdet.idunimed where idventascab='$IdVentasCab' ";
  $consulta = consulta($sql);
  while($row = leer_registro($consulta))
  {
     $carro[$row['idventasdet']]=array('identificador'=>$row['idventasdet'],'idproducto'=>$row['idproducto'], 'cantidad'=>$row['cantidad'], 'precio'=>$row['precio'], 'total'=>$row['subtotal'],'producto'=>$row['producto'], 'idunimed'=>$row['idunimed'],'unimed'=>$row['unimed'],'totalventa'=>$TotalVenta);		
  }
  $_SESSION['carro']=$carro;

  $contador=0;
  $suma=0;
  $igv = 0;
  $total = 0;
?>
   <table width="98%" align="center" style="margin:0 10px;">
     <tr>
        <td height="5" colspan="3">
        <div align="left" style="width:300px; float:left"><b>Numero de Items:</b></div>
        </td>
     </tr>
    <tr>
       <td width="3%" align="center" class="title"><div align="center" >Item</div></td>
       <td width="5%" align="center" class="title"><div align="center">Cantidad</div></td>
       <td width="7%" align="center" class="title"><div align="center">Unidad Medida</div></td>
       <td width="60%" align="center" class="title"><div align="center">Descripcion</div></td>
       <td width="8%" align="center" class="title"><div align="center">Precio</div></td>
       <td width="8%" align="center" class="title"><div align="center">Total</div></td>
       <td width="6%" align="center" class="title"><div align="center">...</div></td>
    </tr>
<?php
foreach($carro as $k => $v)
  {
  	$contador++;
    echo "<tr>";

    echo "<td width='3%' class='tdcont' align='center'>";
    echo $contador;
//    echo $v['identificador'];
    echo "</td>";

    echo "<td width='5%' class='tdcont' align='center'>";
    echo $v['cantidad'];
    echo "</td>";

    echo "<td width='10%' class='tdcont' align='center'>";
    echo $v['unimed'];
    echo "</td>";

    echo "<td width='35%' class='tdcont'>";
    echo rtrim($v['producto']);
    echo "</td>";

    echo "<td width='5%' class='tdcont' align='center'>";
    echo $v['precio'];
    echo "</td>";

    echo "<td width='5%' class='tdcont' align='center'>";
    echo $v['total'];
    echo "</td>";

    echo "<td class='tdcont' align='center'><a class='link' href='#' onclick='BorraContenido(".$v['identificador'].")'>";
    echo "<img src='../images/trash.gif' width='12' height='14' border='0'>";

    echo "</tr>";
    $suma=$suma + ($v['precio']*$v['cantidad']);
  }
  $igv = $suma * 0.18;
  $total = $suma + $igv ;
?>
</table>
<table width="98%" align="center" style="margin:0 10px;">
  <tr>
     <td colspan="5" class="title">Sub Total  /   IGV   /   Total</td>
     <td class="tdcont" align="right">S/. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php if(isset($suma) and $suma!=0) echo redondeado($suma); ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php if(isset($igv) and $igv!=0) echo redondeado($igv); ?>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php if(isset($total) and $total!=0) echo redondeado($total); ?></td>
     <td class="tdcont" align="center">&nbsp;</td>
  </tr>
</table>
