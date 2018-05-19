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

$lineasub=fila("id_item","convenios_subitems","where id='".$_GET['id']."'");

$linea=fila("id_sector,id_sector_prod","convenios_items","where id='".$lineasub['id_item']."'");

update(array('id_sector'=>$linea['id_sector'],'id_sector_prod'=>$linea['id_sector_prod']),'convenios_subitems',"where id='".$_GET['id']."'");



?>