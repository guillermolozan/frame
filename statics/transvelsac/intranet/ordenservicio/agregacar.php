<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/pro_drop_1.css" />
<?php
  session_start();
  require("../db/mysql.inc.php");
  $conexion=conectar();
  $contador = 1;
  $TotalVenta = 0;
  if(isset($_SESSION['carro'])) {
	$carro=$_SESSION['carro'];
    foreach($carro as $k => $v) {
  	   $contador++;
	   $TotalVenta = $TotalVenta + ($v['Cantidad'] * $v['Precio']);
	}
  }
  
  extract($_REQUEST);

  $idProducto=$_GET['idProducto'];
  $Cantidad=$_GET['Cantidad'];
  $Precio=$_GET['Precio'];
  $IdUniMed=$_GET['IdUniMed'];
  $NomProducto=$_GET['NomProducto'];
  $TotalVenta = $TotalVenta + ($Cantidad * $Precio);

  if(!isset($Cantidad)){$Cantidad=1;}

  $total=$Cantidad * $Precio;
  $sql = "select * from unimed where idunimed='$IdUniMed'";
  $qry=mysql_query($sql);
  $row=mysql_fetch_array($qry);

  $carro[md5($contador)]=array('identificador'=>md5($contador),'idproducto'=>$idProducto, 'cantidad'=>$Cantidad, 'precio'=>$Precio, 'total'=>$total,'producto'=>$NomProducto, 'idunimed'=>$IdUniMed,'unimed'=>$row['nombre'],'totalventa'=>$TotalVenta);
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
//    echo $v['idproducto'];
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

    echo "<td class='tdcont' align='center'><a class='link' href='#' onclick='BorraContenido(".$v['idproducto'].")'>";
    echo "<img src='../images/trash.gif' width='12' height='14' border='0'>";

    echo "</tr>";
    $suma=$suma + ($v['precio']*$v['cantidad']);
  }
  $total = $suma;
?>
</table>
<table width="98%" align="center" style="margin:0 10px;">
  <tr>
     <td colspan="5" class="title">Total</td>
     <td class="tdcont" align="right">S/. <?php if(isset($total) and $total!=0) echo redondeado($total); ?></td>
     <td class="tdcont" align="center">&nbsp;</td>
  </tr>
</table>
