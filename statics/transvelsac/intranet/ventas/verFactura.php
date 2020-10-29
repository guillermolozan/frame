<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
$idVentasCab=$_GET['idVentasCab'];
			$sql="SELECT s.*, e.* FROM sucursal s INNER JOIN empresa e ON s.idempresa=e.idempresa WHERE s.idsucursal='$_SESSION[idSucursal]'";
			$result=consulta($sql);
			$rs=leer_registro($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EMPRESA DE TRANSPORTE LUCERITO...</title>
<link href="../css/notas.css" rel="stylesheet" type="text/css"> 
<link href="../css/notas2.css" rel="stylesheet" type="text/css" media="print"> 
<link rel="stylesheet" type="text/css" href="../css/pro_drop_1.css" />
<script src="../css/stuHover.js" type="text/javascript"></script>
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
</head>

<body>
<br /><br />
    <div id="container">
    
      <div id="header">
      	<div class="tienda">
        	
      		<b><center><?php echo $rs['razonsocial']?></center><br />
      		<?php echo $rs['nombre']?><br />
      		<?php echo $rs['direccion'] ?><br />
      		<?php echo $rs['ruc'] ?><br />
      		<?php echo $rs['telefono'] ?><br />
      		</b>
      	</div>
      	<div class="guia">
     		<b><center>
        	R.U.C Nº <?php echo $rs['ruc'] ?><br /><br />
        	FACTURA<br />
        	<br />
        	Nº <?php 
			
             $instruccion = "select ventascab.*, cliente.razonsocial, cliente.direccion, cliente.telefono1, cliente.telefono2, cliente.celular, cliente.ruc from ventascab left join cliente ON cliente.idcliente=ventascab.idcliente where idventascab='$idVentasCab'";
 	         $consulta = consulta($instruccion);
			 $rs2=leer_registro($consulta);
	 	     $TotalVenta=$rs2['monto'];
	 	     $IGV=$rs2['igv'];
	 	     $SubTotal=$rs2['monto'] - $rs2['igv'];
			
			echo ceros($rs2['serie'],3)?> - <?php echo ceros($rs2['numero'],8) ?>
      		</center><br />
      		</b>
      	</div>
      <br class="corte" />
      <!-- end #header -->
      </div>
	<hr />
    <br />
	<div id="mainContent">
      <table width="80%" align="center" style="margin:0 10px;">
        <tr>
          <td class="title" width="20%"><strong >Cliente :</strong></td>
          <td width="30%" class="tdcont">&nbsp;&nbsp;<?php echo $rs2['razonsocial'] ?></td>
          <td width="17%" class="title">Direccion :</td>
          <td width="33%" class="tdcont">&nbsp;&nbsp;<?php echo $rs2['direccion'] ?></td>
        </tr>
        <tr>
           <td class="title">Telefono :</td>
          <td class="tdcont">&nbsp;&nbsp;<?php echo $rs2['telefono1']. " - " . $rs2['telefono2']. " / " .$rs2['celular']; ?></td>
          <td class="title">Fecha :</td>
          <td class="tdcont">&nbsp;&nbsp;<?php echo $rs2['fecha'] ?></td>
        </tr>
        <tr>
           <td class="title">RUC :</td>
          <td class="tdcont">&nbsp;&nbsp;<?php echo $rs2['ruc'] ?></td>
        </tr>
        </table>
      <br /><br />
	   <table width="80%" align="center" style="margin:0 10px;">
        <tr>
            <td width="5%" align="center" class="title"><div align="center" >Nº</div></td>
            <td width="40%" align="center" class="title"><div align="center">Producto</div></td>
            <td width="10%" align="center" class="title"><div align="center">Cantidad</div></td>
            <td width="10%" align="center" class="title"><div align="center">Precio</div></td>
            <td width="13%" align="center" class="title"><div align="center">Importe</div></td>
        </tr>
        <?php
             $instruccion = "select ventasdet.*, unimed.nombre as unimed from ventasdet LEFT JOIN unimed ON unimed.idunimed=ventasdet.idunimed WHERE idventascab='$idVentasCab'";
 	         $consulta1 = consulta($instruccion);
	$con=0;
	$montoMovim = 0;
	$importeIGV = 0;
	while($rs3 = leer_registro($consulta1))
	{
		$con=$con+1;
        ?>
           <tr>
            <td height="20" class="tdcont" align="center"><?php echo $con ?></td>
            <td class="tdcont" align="center"><?php echo $rs3['producto'] ?></td>
            <td class="tdcont" align="center"><?php echo redondeado($rs3['cantidad']) ?></td>
            <td class="tdcont" align="right"><?php echo redondeado($rs3['precio']) ?></td>
            <td class="tdcont" align="right"><?php echo redondeado($rs3['cantidad']*$rs3['precio']) ?></td>
          </tr>
        <?php     
	    }
	    ?>
		<tr> 
         <td colspan="1" >&nbsp;&nbsp;</td>
         <td colspan="2" class="title" >&nbsp;&nbsp;SUB TOTAL</td>
         <td class="tdcont" align="right">S/. <?php echo redondeado($SubTotal) ?></td>
       </tr>
		<tr> 
         <td colspan="1" >&nbsp;&nbsp;</td>
         <td colspan="2" class="title" >&nbsp;&nbsp;IGV (18%)</td>
         <td class="tdcont" align="right">S/. <?php echo redondeado($IGV) ?></td>
       </tr>
		<tr> 
         <td colspan="1" >&nbsp;&nbsp;</td>
         <td colspan="2" class="title" >&nbsp;&nbsp;TOTAL</td>
         <td class="tdcont" align="right">S/. <?php echo redondeado($TotalVenta) ?></td>
       </tr>
       </table>
      <br />

      <!-- end #mainContent -->
      </div>
      
        <!-- end #container --></div>
        <br /><br />
      <div align="right" style="margin-right:20px" id= "noPrint">
 <a href="" onclick="javascript:Impresion();">Imprimir</a>&nbsp;&nbsp;<a href="javascript:close()">Cerrar</a></div>
    </body>
</html>
