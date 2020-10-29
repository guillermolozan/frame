<?php //á
  
Header("Content-type: image/jpeg");

chdir("../");
//include("lib/includes.php");
	include("lib/global.php");	
	include("lib/conexion.php");
	include("lib/mysql3.php");
	include("lib/util.php");	
	include("config/tablas.php");
//	include("lib/sesion.php");	
	include("lib/playmemory.php");
	
	require_once( "lib/ini_manager.php" );
	
chdir("base2");

set_time_limit(0);

update(array(      
		'leido'=>"1"    
	    )    
    	  ,"lista_envio"
    	  ,"where id='".$_GET['id']."' and id_email='".$_GET['id2']."'"
    	  ,0);
    
?>