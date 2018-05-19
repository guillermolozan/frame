<?php //á
/**********************************************/
/////////////////// STORE //////////////////////
/**********************************************/

/*
include("store/moneda.php");
$COMMON['store']['cambio']=unserialize($INDICADORES['dolar']);
*/

/**********************************************/
///////////////////// BD ///////////////////////
/**********************************************/

$COMMON['datos_root']=get_valores(
        "variable","valor"
        ,"configuraciones_root"
        ,"where 1"
        ,0
        );

$COMMON['datos']=get_valores(
        "variable","valor"
        ,"configuraciones"
        ,"where 1"
        ,0
        );
		
$COMMON['variables']=get_valores(
        "variable","valor"
        ,"variables"
        ,"where 1"
        ,0
        );
				
	$archivos= select(
			"id,nombre,titulo,fichero,fecha_creacion,url as link,dimensiones"
			,"banners"
			,"where 1 and  visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
					'get_archivo'=>array('get_archivo'=>array('carpeta'=>'ban_imas','fecha'=>'{fecha_creacion}','file'=>'{fichero}'))
				  )
			);
			
	foreach($archivos as $archivo){
		$COMMON['archivos'][$archivo['nombre']]=$archivo;
	}


?>