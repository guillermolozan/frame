<?php
if($_GET['ajax']!='0'){
@session_start(); // Iniciar variables de sesi�n
include("lib/compresionInicio.php");
include("lib/global.php");
include("lib/conexion.php");
include("lib/mysql3.php");
include("lib/util.php");
//	include("lib/stripattributes.php");
include("config/tablas.php");
}
	//echo getcwd();
	//var_dump($_GET); exit();

	$_GET['ob']='VENTAS_ITEMS';

	list($date,$from,$to)=explode("|",$_GET['f']);


	$OBJ=$datos_tabla=procesar_objeto_tabla($objeto_tabla[$_GET['ob']]);

	//parse_str($_GET['filtro'], $get);

	//prin($OBJ);
	$first=dato('min('.$date.')',$OBJ['tabla'],"where ".$date."!=0",0);
	$first=(!$first)?date("Y-m-d"):$first;
	$first=substr($first,0,10);
	//$last =dato($querie['campo'],$tbl,"where 1 order by ".$querie['campo']." desc limit 0,1");
	$last=dato('max('.$date.')',$OBJ['tabla'],"where ".$date."!=0",0);
	$last=(!$last)?date("Y-m-d"):$last;
	$last=substr($last,0,10);

	//prin("$first - $last");

	$from=($from)?$from:$first;
	$to=($to)?$to:$last;

	$from=fixyfecha($from);
	$to=fixyfecha($to);


	//echo getcwd()."<br>";

	include("base2/reportes/".$_GET['file'].".php");

	//echo 3;
	/*
	if(0){


	if($date!=''){
		$where="where visibilidad!=0 and date($date) between '$from' and '$to'";
	} else {
		$where="where visibilidad!=0 ";
	}

	$query_where=$where. "group by ".$ordby.' order by total desc' ;

	$items=select("$ordby as nombre, count(*) as total",
					$datos_tabla['tabla'],
					$query_where,0);

	$Total=contar($datos_tabla['tabla'],
					$where,0);
	//prin($items);

	foreach($items as $lll=>$linea){

			switch($objeto_tabla[$_GET['ob']]['campos'][$ordby]['tipo']){
			case "com":
				$valoor=$objeto_tabla[$_GET['ob']]['campos'][$ordby]['opciones'][$linea['nombre']];
				$items[$lll]['nombre']=$valoor;
			break;
			case "hid":
				list($primO,$tablaO)=explode("|",$objeto_tabla[$_GET['ob']]['campos'][$ordby]['opciones']);
				list($idO,$camposO)=explode(",",$primO);
				$camposOA=array();
				$camposOA=explode(";",$camposO);
				$bufy='';
				foreach($camposOA as $COA){
				$bufy.= select_dato($COA,$tablaO,"where ".$idO."='".$linea['nombre']."'")." ";
				}
				$items[$lll]['nombre']=$bufy;
			break;

			}

	}

	$ht='<table class=reporte>';
	foreach($items as $item){
	$ht.='<tr>';
	$ht.='<td class=nombre>';
	$ht.=$item['nombre'];
	$ht.='</td>';
	$ht.='<td class=valor>';
	$ht.=$item['total'];
	$ht.='</td>';
	$ht.='<td class=porcentaje>';
	$ht.=intval(($item['total']/$Total)*10000)/100;
	$ht.='%';
	$ht.='</td>';
	$ht.='</tr>';
	}
	$ht.='</table>';
	echo $ht;

}
*/

if($_GET['ajax']!='0'){
include("lib/compresionFinal.php");	/*para Content-Encoding*/
}
?>