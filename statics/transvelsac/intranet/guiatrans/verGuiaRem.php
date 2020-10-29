<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
$idGuia=$_GET['idGuia'];
$sql="SELECT s.*, e.* FROM sucursal s INNER JOIN empresa e ON s.idempresa=e.idEmpresa WHERE s.idsucursal='$_SESSION[idSucursal]'";
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
<br />
    <div id="container">
    
      <div id="header">
      	<div class="tienda">
      		<b><?php echo $rs['razonsocial']?><br />
      		<?php echo $rs['nombre']?><br />
      		<?php echo $rs['direccion'] ?><br />
      		<?php echo $rs['ruc'] ?><br />
      		<?php echo $rs['telefono'] ?><br />
      		</b>
      	</div>
     <?php
	 //sucursal a la cual se le dio el envio
	$sql3="SELECT guiatranscab.*, motivo.nombre as motivo FROM guiatranscab LEFT JOIN motivo ON motivo.idmotivo=guiatranscab.idmotivo WHERE idguiacab='$idGuia';";
	$result3=consulta($sql3);
	$rs3=leer_registro($result3);
	 ?>
      
      	<div class="guia">
     		<b><center>
        	R.U.C Nº <?php echo $rs['ruc'] ?><br /><br />
        	GUIA DE REMISION<br />
            REMITENTE<br />
        	<br />
        	Nº <?php echo ceros($rs3['serie'],3)?> - <?php echo $rs3['numero'] ?>
      		</center><br />
      		</b>
      	</div>
      <br class="corte" />
      <!-- end #header -->
      </div>
	<hr />
    <br />

		<div id="mainContent">
      <table width="90%" align="center" style="margin:0 5px;">
      <tr>
          <td class="title" width="10%"><strong >MOTIVO</strong></td>
          <td class="tdcont" colspan="3" width="30%"><strong >&nbsp;&nbsp;<?php echo $rs3['motivo'] ?></strong></td>
        </tr>
       <tr>
          <td class="title" width="10%"><strong >Fecha Emision</strong></td>
          <td class="tdcont" width="10%">&nbsp;&nbsp;<?php echo fechaAMostrar($rs3['fechaemision']) ?></td>
          <td class="title" width="10%"><strong >Remitente</strong></td>
          <td class="tdcont" width="10%">&nbsp;&nbsp;<?php echo $rs3['nombreremitente'] ?></td>
          <td class="title" width="10%"><strong >Punto Partida</strong></td>
          <td class="tdcont" width="10%">&nbsp;&nbsp;<?php echo $rs3['puntopartida'] ?></td>
       </tr>
       <tr>
          <td class="title" width="10%"><strong >RUC Remitente</strong></td>
          <td class="tdcont" width="10%">&nbsp;&nbsp;<?php echo $rs3['rucremitente'] ?></td>
          <td class="title" width="10%"><strong >Fecha Inicio</strong></td>
          <td class="tdcont" width="10%">&nbsp;&nbsp;<?php echo fechaAMostrar($rs3['fechainicio']) ?></td>
          <td class="title" width="10%"><strong >Punto Llegada</strong></td>
          <td class="tdcont" width="10%">&nbsp;&nbsp;<?php echo $rs3['puntollegada'] ?></td>
        </tr>
        <tr>
          <td colspan="2" class="title"><strong >DESTINATARIO</strong></td>
        </tr>
        <tr>
          <td class="title" width="10%"><strong >Nombre Dest.</strong></td>
          <td width="20%" class="tdcont">&nbsp;&nbsp;<?php echo $rs3['destino'] ?></td>
          <td class="title" width="10%"><strong >Doc. Ident.</strong></td>
          <td width="10%" class="tdcont">&nbsp;&nbsp;<?php echo $rs3['dnidestino'] ?></td>
          <td class="title" width="10%"><strong >RUC</strong></td>
          <td width="10%" class="tdcont">&nbsp;&nbsp;<?php echo $rs3['rucdestino'] ?></td>
        </tr>
		<tr>
          <td colspan="2" class="title"><strong >Datos Transportista</strong></td>
          <td colspan="2" class="title"><strong >Datos de la Unid. de Transporte</strong></td>
        </tr>
        <tr>
          <td class="title" width="10%"><strong >Nombre</strong></td>
          <td width="20%" class="tdcont">&nbsp;&nbsp;<?php echo $rs3['nombretransportista'] ?></td>
          <td width="10%" class="title"><strong >Marca</strong></td>
          <td width="10%" class="tdcont">&nbsp;&nbsp;<?php echo $rs3['marca'] ?></td>
          <td width="10%" class="title"><strong >Placa</strong></td>
          <td width="10%" class="tdcont">&nbsp;&nbsp;<?php echo $rs3['placa'] ?></td>
        </tr>
        <tr>
          <td class="title" width="10%"><strong >RUC</strong></td>
          <td width="10%" class="tdcont">&nbsp;&nbsp;<?php echo $rs3['ructransportista'] ?></td>
          <td width="10%" class="title"><strong >Licencia Conducir</strong></td>
          <td colspan="2" class="tdcont">&nbsp;&nbsp;<?php echo $rs3['licenciaconducir'] ?></td>
        </tr>
       
        </table>
      <br /><br />
	   <table width="90%" align="center" style="margin:0 5px;">
        <tr>
            <td width="5%" align="center" class="title"><div align="center" >Nº</div></td>
            <td width="40%" align="center" class="title"><div align="center">Descripción</div></td>
			<td width="8%" align="center" class="title"><div align="center">Cantidad</div></td>
            <td width="15%" align="center" class="title"><div align="center">Unid. de Med.</div></td>
            <td width="8%" align="center" class="title"><div align="center">Precio</div></td>
            <td width="6%" align="center" class="title"><div align="center">Peso</div></td>
          </tr>
          <?php
$instruccion = "select 	guiatransdet.*, unimed.nombre as unimed FROM guiatransdet INNER JOIN unimed ON unimed.idunimed=guiatransdet.idunimed WHERE idguiacab='$idGuia'";
	$consulta = consulta($instruccion);
	$con=0;
	while($rs = leer_registro($consulta))
	{
		$con=$con+1;
	?>
           <tr>
            <td height="20" class="tdcont" align="center"><?php echo $con ?></td>
            <td class="tdcont">&nbsp;&nbsp;<?php echo $rs['producto'] ?></td>
            <td class="tdcont" align="center"><?php echo $rs['cantidad'] ?></td>
            <td class="tdcont" align="center"><?php echo $rs['unimed'] ?></td>
            <td class="tdcont" align="center"><?php echo $rs['precio'] ?></td>
            <td class="tdcont" align="center">&nbsp;</td>
          </tr>
  <?php }?>
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
