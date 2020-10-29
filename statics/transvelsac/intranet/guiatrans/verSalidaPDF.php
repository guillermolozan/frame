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
	$sql="SELECT s.*, e.* FROM sucursal s INNER JOIN empresa e ON s.idempresa=e.idEmpresa WHERE s.idsucursal='$_SESSION[idSucursal]'";
	$result=consulta($sql);
	$rs=leer_registro($result);
	
	$sql3="SELECT guiatranscab.*, cliente.razonsocial FROM guiatranscab LEFT JOIN cliente ON cliente.idcliente=guiatranscab.idmotivo WHERE idguiacab='$idGuia';";
	$result3=consulta($sql3);
	$rs3=leer_registro($result3);
	
	$html.='<div id="container">';
	$html .='<br />';
	$html .='<br />';
	$html .='<br />';
	$html .='<br />';
	$html .='<br />';
	$html .='<br />';
	$html .='<br />';

	$html .='<div id="mainContent">
        
      <table width="98%" align="center" style="margin:10 20px;">
       <tr>
          <td width="30%">'.fechaAMostrar($rs3['fechaemision']).'</td>
          <td width="30%">'.fechaAMostrar($rs3['fechainicio']).'</td>
       </tr>
		
       <tr>
          <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$rs3['puntopartida'].'</td>
          <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$rs3['puntollegada'].'</td>
        </tr>

       <tr>
          <td >&nbsp;&nbsp;'.$rs3['blanco'].'</td>
        </tr>		
		
       <tr>
          <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$rs3['nombreremitente'].'</td>
          <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$rs3['nombredestinatario'].'</td>
        </tr>
		
       <tr>
          <td colspan="3">&nbsp;&nbsp;'.$rs3['rucremitente'].'</td>
          <td colspan="3">&nbsp;&nbsp;'.$rs3['rucdestino'].'</td>
        </tr>
       <tr>
          <td >&nbsp;&nbsp;'.$rs3['blanco'].'</td>
        </tr>
       <tr>
          <td >&nbsp;&nbsp;'.$rs3['blanco'].'</td>
        </tr>'		
		;

	$html .='<br />';
	$html .='<br />';
	$html .='<br />';
	$html .='<br />';
	$html .='<br />';

          $instruccion = "select guiatransdet.*, unimed.nombre as unimed FROM guiatransdet INNER JOIN unimed ON unimed.idunimed=guiatransdet.idunimed WHERE idguiacab='$idGuia'";
	$consulta = consulta($instruccion);
	$con=0;
	while($rs = leer_registro($consulta))
	{
		$con=$con+1;
	
          $html .='<tr>
            <td height="20" align="center">'.$con.'</td>
            <td align="center">'.$rs['producto'].'</td>
            <td >&nbsp;&nbsp;'.$rs['cantidad'].'</td>
            <td align="center">'.$rs['unimed'].'</td>
            <td align="center">'.$rs['precio'].'</td>
          </tr>';
        
   }
		$html .='



		
       <tr>
          <td >&nbsp;&nbsp;'.$rs3['marca'].'</td>
        </tr>
       <tr>
          <td >&nbsp;&nbsp;'.$rs3['placa'].'</td>
        </tr>
       <tr>
          <td >&nbsp;&nbsp;'.$rs3['configuracionvehicular'].'</td>
        </tr>
       <tr>
          <td >&nbsp;&nbsp;'.$rs3['certificadoinscripcion'].'</td>
        </tr>
       <tr>
          <td >&nbsp;&nbsp;'.$rs3['licenciaconducir'].'</td>
        </tr>
		
		
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
