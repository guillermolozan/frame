<style type="text/css">
	.tdcont {
      border:#0098da dashed 1px; padding:2px 0;
	}
</style>

<?php
  session_start();
  require("../db/mysql.inc.php");
  $conexion=conectar();
  extract($_REQUEST);
  $carro=$_SESSION['carro'];
  unset($carro[md5($idProducto)]);
  $_SESSION['carro']=$carro;
  $calculoMargen=$_GET['calculoMargen'];
  $calculoIGV=$_GET['calculoIGV'];
  $contador=0;
  $suma=0;
?>
  <table width="98%" align="center" style="margin:0 10px;">
<?php
  //Calculo de la utilidad por item
  if ($calculoMargen =="2") {
?>
    <tr>
       <td width="3%" align="center" class="title"><div align="center" >Item</div></td>
       <td width="7%" align="center" class="title"><div align="center">Codigo</div></td>
       <td width="40%" align="center" class="title"><div align="center">Descripcion</div></td>
       <td width="5%" align="center" class="title"><div align="center">Cantidad</div></td>
       <td width="10%" align="center" class="title"><div align="center">P. Venta</div></td>
       <td width="15%" align="center" class="title"><div align="center">Total</div></td>
       <td width="10%" align="center" class="title"><div align="center">Acciones</div></td>
    </tr>
<?php
  } else {
  //Calculo de la utilidad por Documento
?>
    <tr>
       <td width="3%" align="center" class="title"><div align="center" >Item</div></td>
       <td width="7%" align="center" class="title"><div align="center">Codigo</div></td>
       <td width="40%" align="center" class="title"><div align="center">Descripcion</div></td>
       <td width="5%" align="center" class="title"><div align="center">Cantidad</div></td>
       <td width="10%" align="center" class="title"><div align="center">Acciones</div></td>
    </tr>
<?php
  }

foreach($carro as $k => $v)
  {
  	$contador++;

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

    //Calculo de la utilidad por item
    if ($calculoMargen =="2") {
      echo "<td width='10%' class='tdcont' align='right'>";
      echo redondeado($v['precioVenta']);
      echo "</td>";
      echo "<td width='7%' class='tdcont' align='right'>";
      echo redondeado($v['precioVenta']*$v['cantidad']);
      echo "</td>";
	  $suma=$suma + ($v['precioVenta']*$v['cantidad']);
    } else {
      //Calculo de la utilidad por Total del Documento
	  $suma=$suma + ($v['precioCompra']*$v['cantidad']);
	}

    echo "<td class='tdcont' align='center'><a class='link' href='#' onclick='BorraContenido(".$v['idProducto'].")'>";
    echo "<img src='../images/trash.gif' width='12' height='14' border='0'>";

    echo "</tr>";
  }
  if ($calculoMargen =="1") {
     $valor = $suma;
     $porcentaje = calPorcentajeTotal($valor);
     $suma = ($suma * (1 + ($porcentaje/100)));
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
