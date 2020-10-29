<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
$idComprobante=$_GET['idComprobante'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DISTRIBUIDORA PEDRO RUIZ GALLO...</title>
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
      	<div class="logo">      
        	<?php
			$sql="SELECT s.*, e.* FROM sucursal s INNER JOIN empresa e ON s.EMPRESA_idEmpresa=e.idEmpresa WHERE s.idSucursal='$_SESSION[idSucursal]'";
			$result=consulta($sql);
			$rs=leer_registro($result);
			?>
        </div>
      	<div class="tienda">
        	
      		<b><center><?php echo $rs['nomEmpresa']?></center><br />
      		<?php echo $rs['nomSucursal']?><br />
      		<?php echo $rs['dirSucursal'] ?><br />
      		<?php echo $rs['rucEmpresa'] ?><br />
      		<?php echo $rs['telefSucursal'] ?><br />
      		</b>
      	</div>
      	<div class="guia">
     		<b><center>
        	R.U.C Nº <?php echo $rs['rucEmpresa'] ?><br /><br />
        	BOLETA DE VENTA<br />
        	<br />
        	Nº <?php 
			
             $instruccion = "select det_comprobante.*,comprobante.*, producto.nomProd,producto.descCorta,modelo.nomModelo,cliente.nomCliente,cliente.direccion,cliente.ruc,cliente.celular,cliente.telefono1,cliente.telefono2 FROM (((det_comprobante left join comprobante on det_comprobante.COMPROBANTE_idComprobante=comprobante.idComprobante) left join producto ON det_comprobante.idProducto=producto.idProducto) LEFT JOIN modelo on producto.MODELO_idModelo=modelo.idModelo) left join cliente on comprobante.CLIENTE_idCliente=cliente.idCliente WHERE det_comprobante.COMPROBANTE_idComprobante='$idComprobante'";
 	         $consulta = consulta($instruccion);
			 $rs2=leer_registro($consulta);
	 	     $montoMovim=$rs2['importeTotal'];
			
			
			echo ceros($rs2['serieComp'],3)?> - <?php echo ceros($rs2['numeroComp'],6) ?>
      		</center><br />
      		</b>
      	</div>
      <br class="corte" />
      <!-- end #header -->
      </div>
	<hr />
    <br />

		<div id="mainContent">
        
      <table width="98%" align="center" style="margin:0 10px;">
        <tr>
          <td class="title" width="20%"><strong >Cliente :</strong></td>
          <td width="30%" class="tdcont">&nbsp;&nbsp;<?php echo $rs2['nomCliente'] ?></td>
          <td width="17%" class="title">Direccion :</td>
          <td width="33%" class="tdcont">&nbsp;&nbsp;<?php echo $rs2['direccion'] ?></td>
        </tr>
        <tr>
           <td class="title">Telefono :</td>
          <td class="tdcont">&nbsp;&nbsp;<?php echo $rs2['celular'] ?></td>
          <td class="title">Fecha :</td>
          <td class="tdcont">&nbsp;&nbsp;<?php echo $rs2['fecha'] ?></td>
        </tr>
        </table>
      <br /><br />
	   <table width="98%" align="center" style="margin:0 10px;">
        <?php
		  if ($tipoCalculoUtilidad=="1")
		  {
        ?>
        <tr>
            <td width="5%" align="center" class="title"><div align="center" >Nº</div></td>
            <td width="17%" align="center" class="title" colspan="2"><div align="center">Modelo  </div></td>
            <td width="40%" align="center" class="title" colspan="2"><div align="center">Caracteristicas</div></td>
            <td width="10%" align="center" class="title"><div align="center">Cantidad</div></td>
        </tr>
        <?php
		  } else {
        ?>
        <tr>
            <td width="5%" align="center" class="title"><div align="center" >Nº</div></td>
            <td width="17%" align="center" class="title"><div align="center">Modelo  </div></td>
            <td width="40%" align="center" class="title"><div align="center">Caracteristicas</div></td>
            <td width="10%" align="center" class="title"><div align="center">Cantidad</div></td>
            <td width="10%" align="center" class="title"><div align="center">Precio</div></td>
            <td width="13%" align="center" class="title"><div align="center">Importe</div></td>
        </tr>
        <?php
		  }
             $instruccion = "select det_comprobante.*,comprobante.*, producto.nomProd,producto.descCorta,modelo.nomModelo,cliente.nomCliente,cliente.direccion,cliente.celular,cliente.telefono1,cliente.telefono2 FROM (((det_comprobante left join comprobante on det_comprobante.COMPROBANTE_idComprobante=comprobante.idComprobante) left join producto ON det_comprobante.idProducto=producto.idProducto) LEFT JOIN modelo on producto.MODELO_idModelo=modelo.idModelo) left join cliente on comprobante.CLIENTE_idCliente=cliente.idCliente WHERE det_comprobante.COMPROBANTE_idComprobante='$idComprobante'";
 	         $consulta = consulta($instruccion);
	$con=0;
	while($rs3 = leer_registro($consulta))
	{
		$con=$con+1;
	    $montoMovim = $rs3['importeTotal'];
	    if ($tipoCalculoUtilidad=="1")
		{
        ?>
           <tr>
            <td height="20" class="tdcont" align="center"><?php echo $con ?></td>
            <td class="tdcont" align="center" colspan="2"><?php echo $rs3['nomModelo'] ?></td>
            <td class="tdcont" colspan="2">&nbsp;&nbsp;<?php echo $rs3['nomProd'] ?></td>
            <td class="tdcont" align="center"><?php echo redondeado($rs3['cantidad']) ?></td>
          </tr>
        <?php
		  } else {
        ?>
           <tr>
            <td height="20" class="tdcont" align="center"><?php echo $con ?></td>
            <td class="tdcont" align="center"><?php echo $rs3['nomModelo'] ?></td>
            <td class="tdcont">&nbsp;&nbsp;<?php echo $rs3['nomProd'] ?></td>
            <td class="tdcont" align="center"><?php echo redondeado($rs3['cantidad']) ?></td>
            <td class="tdcont" align="right"><?php echo redondeado($rs3['importe']) ?></td>
            <td class="tdcont" align="right"><?php echo redondeado($rs3['cantidad']*$rs3['importe']) ?></td>
          </tr>
        <?php     
		  }
	    }
	    $montoMovim = round($montoMovim * 100)/100;
	       ?>
		<tr> 
         <td colspan="5" class="title" >&nbsp;&nbsp;TOTAL</td>
         <td class="tdcont" align="right">S/. <?php echo redondeado($montoMovim) ?></td>
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
