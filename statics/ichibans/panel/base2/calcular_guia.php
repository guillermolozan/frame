<?php //á


set_time_limit(0);

chdir("../");

//	include("lib/includes.php");
	include("lib/global.php");	
	include("lib/conexion.php");
	include("lib/mysql3.php");
	include("lib/util.php");	
	include("config/tablas.php");
//	include("lib/sesion.php");	
	include("lib/playmemory.php");	
	require_once( "lib/ini_manager.php" );
	
chdir("../");

if($_GET['id']!=''){

	$items= select(
			"moneda,preciodbl,id"
			,"paquetes_preciohotel"
			,"where 1 and id='".$_GET['id']."' "
			//,"where 1 "
			,0
			);

	//foreach($items as $item){
	$item=$items[0];
	update(array('precio_guia'=>( ($item['moneda']==1)?($item['preciodbl']*(2.8)):$item['preciodbl'] )),'paquetes_preciohotel',"where id='".$item['id']."'");
	//}

}

?>