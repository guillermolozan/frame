<?php //á


chdir("../");
//include("lib/includes.php");
	include("lib/global.php");	
	//include("lib/conexion.php");
	//include("lib/mysql3.php");
	include("lib/util.php");	
	//include("config/tablas.php");
//	include("lib/sesion.php");	
	//include("lib/playmemory.php");
	
	//require_once( "../lib/ini_manager.php" );
	require_once('lib/simple_html_dom.php');
	
chdir("base2");

set_time_limit(0);


$robot_urls=array(
//		array("url"=>'http://elcomercio.pe/mercados/lima','variable'=>'lima'),
//		array("url"=>'http://elcomercio.pe/mercados/usa','variable'=>'usa'),
//		array("url"=>'http://elcomercio.pe/mercados/latam','variable'=>'latam'),
//		array("url"=>'http://elcomercio.pe/mercados/eur','variable'=>'eur'),
		array("url"=>'http://elcomercio.pe/mercados/monedas','variable'=>'dolar')
		);

foreach($robot_urls as $rr){
	
$html = file_get_html($rr['url']);

$table = $html->find("table[class=tabla-mercados]",0);
$filas = $table->find("tr"); 
foreach($filas as $i=>$tr) {
	$tds=$tr->find('th,td');
	foreach($tds as $j=>$td){
		if(sizeof($tds)>1){
			if($j<3){
			$r[$i][$j]=$td->innertext;
			}
		}
	}
}
$r2=array();
foreach($r as $pr){
	if($pr[0]=='Nuevo Sol'){
		$r2['venta']=$pr[1];
		$r2['compra']=$pr[2];		
	}
}
//echo "<pre>";print_r($r2);echo "</pre>";
$rserial=serialize($r2);
$html->clear();
unset($html);

$datos[$rr['variable']]=$rserial;

}
$datos['date']=date ("Y-m-d H:i:s");

//echo $rserial;
@mkdir("../../web/modulos/store");

store("../../web/modulos/store/moneda.php","INDICADORES",$datos);

exit();




?>