<?php
session_start();
require_once("../pdf/dompdf-0.5.1/dompdf_config.inc.php");
include("../db/mysql.inc.php");
$conexion=conectar();
$idGuia=$_GET['idGuia'];

    $html ='<html>';
	$html.='<head><link href="../css/guiacss.css" rel="stylesheet" type="text/css"></head>';
	$html.='<body>';
	$html.='<br /><br />'; 
	$sql="SELECT s.*, e.* FROM sucursal s INNER JOIN empresa e ON s.EMPRESA_idEmpresa=e.idEmpresa WHERE s.idSucursal='$_SESSION[idSucursal]'";
	$result=consulta($sql);
	$rs=leer_registro($result);
	
	$sql3="SELECT guiacab.*, motivo.nombre as motivo FROM guiacab LEFT JOIN motivo ON motivo.idmotivo=guiacab.idmotivo WHERE idguiacab='$idGuia';";
	$result3=consulta($sql3);
	$rs3=leer_registro($result3);
	
	$html.='<div id="container">';
    $html.='<div id="header">';
	$html .='<div class="tienda">';
	$html .='<b>'.$rs['nomEmpresa'].'<br />
      		'.$rs['nomSucursal'].'<br />
      		'.$rs['dirSucursal'].'<br />
      		'.$rs['rucEmpresa'].'<br />
      		'.$rs['telefSucursal'].'               Nº '.ceros($rs3['serie'],3).' - '.$rs3['numero'].
			'<br />
      		</b>';
     $html .='</div>';
     $html .='</div>
	<hr />
    <br />';

	$html .='<div id="mainContent">
        
      <table width="98%" align="center" style="margin:0 10px;">
      <tr>
          <td class="title"><strong >MOTIVO</strong></td>
          <td class="tdcont" colspan="3"><strong >&nbsp;&nbsp;'.$rs3['motivo'].'</strong></td>
        </tr>
       <tr>
          <td class="title" width="10%"><strong >Fecha Emision</strong></td>
          <td class="tdcont" width="10%">&nbsp;&nbsp;'.fechaAMostrar($rs3['fechaemision']).'</td>
          <td class="title" width="10%"><strong >Punto Partida</strong></td>
          <td class="tdcont" colspan="3">&nbsp;&nbsp;'.$rs3['puntopartida'].'</td>
       </tr>
		
       <tr>
          <td class="title" width="10%"><strong >Fecha Inicio</strong></td>
          <td class="tdcont" width="10%">&nbsp;&nbsp;'.fechaAMostrar($rs3['fechainicio']).'</td>
          <td class="title" width="10%"><strong >Punto Llegada</strong></td>
          <td class="tdcont" colspan="3">&nbsp;&nbsp;'.$rs3['puntollegada'].'</td>
        </tr>
        <tr>
          <td colspan="2" class="title"><strong >DESTINATARIO</strong></td>
        </tr>
        <tr>
          <td class="title" width="10%"><strong >Nombre Dest.</strong></td>
          <td width="20%" class="tdcont">&nbsp;&nbsp;'.$rs3['destino'].'</td>
          <td class="title" width="10%"><strong >Doc. Ident.</strong></td>
          <td width="10%" class="tdcont">&nbsp;&nbsp;'.$rs3['dnidestino'].'</td>
          <td class="title" width="10%"><strong >RUC</strong></td>
          <td width="10%" class="tdcont">&nbsp;&nbsp;'.$rs3['rucdestino'].'</td>
        </tr>
		<tr>
          <td colspan="2" class="title"><strong >Datos Transportista</strong></td>
          <td colspan="2" class="title"><strong >Datos de la Unid. de Transporte</strong></td>
        </tr>
        <tr>
          <td class="title" width="10%"><strong >Nombre</strong></td>
          <td width="20%" class="tdcont">&nbsp;&nbsp;'.$rs3['nombretransportista'].'</td>
          <td width="10%" class="title"><strong >Marca</strong></td>
          <td width="10%" class="tdcont">&nbsp;&nbsp;'.$rs3['marca'].'</td>
          <td width="10%" class="title"><strong >Placa</strong></td>
          <td width="10%" class="tdcont">&nbsp;&nbsp;'.$rs3['placa'].'</td>
        </tr>
        <tr>
          <td class="title" width="10%"><strong >RUC</strong></td>
          <td width="10%" class="tdcont">&nbsp;&nbsp;'.$rs3['ructransportista'].'</td>
          <td width="10%" class="title"><strong >Licencia Conducir</strong></td>
          <td colspan="2" class="tdcont">&nbsp;&nbsp;'.$rs3['licenciaconducir'].'</td>
        </tr>
        </table>
      <br /><br />
	   <table width="98%" align="center" style="margin:0 10px;">
        <tr>
            <td width="5%" align="center" class="title"><div align="center" >Nº</div></td>
            <td width="40%" align="center" class="title"><div align="center">Descripción</div></td>
            <td width="10%" align="center" class="title"><div align="center">Cantidad</div></td>
            <td width="15%" align="center" class="title"><div align="center">Unidad Medida</div></td>
            <td width="15%" align="center" class="title"><div align="center">Precio</div></td>
          </tr>';
         
          $instruccion = "select 	guiadet.*, unimed.nombre as unimed FROM guiadet INNER JOIN unimed ON unimed.idunimed=guiadet.idunimed WHERE idguiacab='$idGuia'";
	$consulta = consulta($instruccion);
	$con=0;
	while($rs = leer_registro($consulta))
	{
		$con=$con+1;
	
          $html .='<tr>
            <td height="20" class="tdcont" align="center">'.$con.'</td>
            <td class="tdcont" align="center">'.$rs['producto'].'</td>
            <td class="tdcont">&nbsp;&nbsp;'.$rs['cantidad'].'</td>
            <td class="tdcont" align="center">'.$rs['unimed'].'</td>
            <td class="tdcont" align="center">'.$rs['precio'].'</td>
          </tr>';
        
   }
		$html .='
       </table>
      <br />
      </div>
</div>
    </body>
</html>';
	
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$archivo="Guia".ceros($idMovim,3).".pdf";
$dompdf->stream($archivo);

?>
