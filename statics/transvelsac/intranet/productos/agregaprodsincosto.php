<style type="text/css">
	.tdcont {
      border:#0098da dashed 1px; padding:2px 0;
	}
</style>

<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesionVendedor.php");
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

$class = "tdcont";

$carro[md5($idProducto)]=array('identificador'=>md5($idProducto), 'idProducto'=>$idProducto, 'cantidad'=>$canProducto, 'costoUnit'=>$costoUnit, 'total'=>$total,'producto'=>$row['nomProd'], 'codigo'=>$row['codProd'], 'descripcion'=>$row['descCorta'], 'idProducto'=>$row['idProducto']);
$_SESSION['carro']=$carro;

$contador=0;
?>
   <table width="98%" align="center" style="margin:0 10px;">
     <tr>
          <td height="5" colspan="3">
          <div align="left" style="width:300px; float:left"><b>Numero de Items:</b></div>
          </td>
      </tr>
      <tr>
            <td width="5%" align="center" class="title"><div align="center" >Item</div></td>
            <td width="15%" align="center" class="title"><div align="center">Codigo  </div></td>
            <td width="40%" align="center" class="title"><div align="center">Descripcion</div></td>
            <td width="5%" align="center" class="title"><div align="center">Cantidad</div></td>
            <td width="10%" align="center" class="title"><div align="center">Acciones</div></td>
       </tr>
<?php
$suma = 0;
foreach($carro as $k => $v)
  {
  	$contador++;
	$suma= $suma + ($v['cantidad'] * $v['costoUnit']);

    echo "<tr>";

    echo "<td width='3%' class='tdcont' align='center'>";
    echo $contador;
    echo "</td>";

    echo "<td width='10%' class='tdcont' align='center'>";
    echo $v['codigo'];
    echo "</td>";

    echo "<td width='43%' class='tdcont' align='left'>";
    echo $v['producto'];
    echo "</td>";

    echo "<td width='10%' class='tdcont' align='center'>";
    echo $v['cantidad'];
    echo "</td>";

    echo "<td class='tdcont' align='center'><a class='link' href='#' onclick='BorraContenido1(".$v['idProducto'].")'>";
    echo "<img src='../images/trash.gif' width='12' height='14' border='0'>";

    echo "</tr>";
  }
    $valor = $suma;
    $porcentaje = 0;
    $sqlRangos = "SELECT * FROM rangos_utilidad ORDER BY idRango";
	$consulta1 = mysql_query($sqlRangos);
	while($regRangos = mysql_fetch_array($consulta1))
	{
	   $minimo = $regRangos['minimo'];
	   $maximo = $regRangos['maximo'];
	   if ($regRangos['cerradoMin']=="0") {
	     if ($regRangos['cerradoMax']=="0") {
	       if (($valor > $minimo) && ($valor < $maximo)) {
	         $porcentaje = $regRangos['porcentaje'];
	       }
	    } else {
          if (($valor > $minimo) && ($valor <= $maximo)) {
            $porcentaje = $regRangos['porcentaje'];
	      }
	    }
      } else {
        if ($regRangos['cerradoMax']=="0") {
          if (($valor >= $minimo) && ($valor < $maximo)) {
            $porcentaje = $regRangos['porcentaje'];
	      }
	    } else {
          if (($valor >= $minimo) && ($valor <= $maximo)) {
            $porcentaje = $regRangos['porcentaje'];
	      }
	    }
      }
    }
    $suma = $suma * (1 + ($porcentaje/100));
	$suma = ((int)($suma*100))/100;
?>
</table>
<table width="98%" align="center" style="margin:0 10px;">
  <tr>
     <td colspan="4" class="title">Total</td>
     <td class="tdcont" align="right">S/.&nbsp;&nbsp;&nbsp; <?php if(isset($suma) and $suma!=0) echo $suma; ?></td>
     <td class="tdcont" align="center">&nbsp;&nbsp;</td>
  </tr>
</table>
