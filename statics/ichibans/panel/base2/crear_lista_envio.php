<?php //á


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
	
chdir("../");

$datos_solicitud = select_fila(
        "id,id_grupo,id_emails_grupos"
        ,"solicitudes"
        ,"where id='".$_GET['id']."'"
        ,0        
		,array(
        	'emails'=>array('sub_select'=>array(
		                			    'campos'=>"id,email"
                                	    ,'tabla' =>"emails_items"
                                	    ,'donde' =>"where id_grupo='{id_emails_grupos}' and visibilidad='1'"
                                       	,'debug' =>0
                                      )
                                )      	    
        )

	);

	echo "<div style='position:absolute;right:10px;width:auto;'><b><a href='hilo_de_envio.php'>ENVIAR EL PRIMER BLOQUE</a></b></div>";
	$id_solicitud=$datos_solicitud['id'];
	foreach($datos_solicitud['emails'] as $emails_){
	echo "<div>".$emails_['email']."</div>";
	insert(
		array(	'visibilidad'=>'1',
				'fecha_creacion'=>'now()',
				'fecha_edicion'=>'now()',				
				'visibilidad'=>'1',
				'id_email'=>$emails_['id'],
				//'email'=>$email,
				'id_grupo'=>$id_solicitud,
				'enviado'=>'0',
				'leido'=>'0',
				'linkeado'=>'0'
			  )
    	  ,"lista_envio"
    	  ,0
		);	
	}
	
	

				
		
?>