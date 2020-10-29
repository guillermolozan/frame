<?php

chdir("../");
//include("lib/includes.php");
	include("lib/global.php");	
	include("lib/conexion.php");
	include("lib/mysql3.php");
	include("lib/util.php");	
	include("config/tablas.php");
	include("lib/sesion.php");	
	include("lib/playmemory.php");
	
	require_once( "lib/ini_manager.php" );

$PROVEEDOR=2;

switch($PROVEEDOR){
case "1":
	//limite: 250 por dia
	$bloque_envios=50; //MUY IMPORTANTE	
	$RELAYS=250;	
	$num_segundos=3600*24; //un dia	
	$limite_fallidos=15;
	//500 disponibles
break;
case "2":
	//limite: 500 emails por 30 minutos
	$bloque_envios=3; //MUY IMPORTANTE
	$RELAYS=500;
	$num_segundos=3600*24; //un dia	
	$limite_fallidos=15; 
	//150 disponibles
break;
}
	
	chdir("../");

	echo "<div style='position:absolute;right:10px;width:auto;'><b><a href='hilo_de_envio.php'>ENVIAR EL PRIMER BLOQUE</a></b></div>";

	$faltan = contar(
        "lista_envio"
        ,"where enviado='0' and ( fallido is NULL or fallido<".$limite_fallidos." ) "
		);

	echo "Quedan $faltan solicitudes en total<br>";

	$faltanbloque=contar(
		"lista_envio"
        ,"where id_grupo='".$_GET['id']."' and enviado='0' and ( fallido is NULL or fallido<".$limite_fallidos." ) "
	);	

	echo "Quedan $faltanbloque solicitudes de este bloque<br>";
	
	foreach($filas as $fila){
	
		echo $fila['emails'][0]['email']."<br>";
	
	}

	
	delete(
    	  "lista_envio"
          ,"where id_grupo='".$_GET['id']."' and enviado='0' and ( fallido is NULL or fallido<".$limite_fallidos." ) "
    	  ,0	
	);

				
		
?>