<?php //á
/**********************************************/
////////////////////////INCLUDES////////////////
/**********************************************/

$HEAD['INCLUDES']['js'][]='js/slideshow.js';
$HEAD['INCLUDES']['css'][]='css/slideshow/slideshow.css';

/**********************************************/
/**********************************************/
/**********************************************/

if(
	(in_array($_GET['modulo'],array("home"))) 
){	
	$nombre='publicidad';
	$SLIDESHOW[$nombre]['width'] =285;
	$SLIDESHOW[$nombre]['height']=350;
	$SLIDESHOW[$nombre]['resize']="true";
	$SLIDESHOW[$nombre]['overlap']="true";
	$SLIDESHOW[$nombre]['thumbnails']="false";
	$SLIDESHOW[$nombre]['paused']="true";
	$SLIDESHOW[$nombre]['delay']="2000";
	$SLIDESHOW[$nombre]['duration']="750";		
	$SLIDESHOW[$nombre]['controller']="true";	
	$Efecto=2;
	
	switch($Efecto){
	case "1":
		$SLIDESHOW[$nombre]['class']="Slideshow";
		$HEAD['INCLUDES']['style'][]=".slideshow-images-visible { margin-left: 0; }.slideshow-images-prev { margin-left: 400px; }.slideshow-images-next { 	margin-left: -400px; }";
		$SLIDESHOW[$nombre]['transition']="'back:in:out'";
	break;
	case "2":
		$SLIDESHOW[$nombre]['class']="Slideshow";
		$SLIDESHOW[$nombre]['transition']="false";
	break;
	case "3":
		$HEAD['INCLUDES']['js'][]='js/slideshow.kenburns.js';
		$SLIDESHOW[$nombre]['class']="Slideshow.KenBurns";
		$SLIDESHOW[$nombre]['transition']="false";
	break;
	case "4":
		$HEAD['INCLUDES']['style'][]="
		.slideshow-thumbnails { height: 300px; left: auto; right: -80px; top: 0; width: 70px; }
		.slideshow-thumbnails ul { height: 500px; width: 70px; }
		.slideshow-thumbnails a:hover {	background-color: #000 !important; }
		.slideshow-thumbnails-active {background-color: #EBD8A7;}
		";	
		$SLIDESHOW[$nombre]['class']="Slideshow";
		$SLIDESHOW[$nombre]['transition']="false";
		$SLIDESHOW[$nombre]['thumbnails']="true";
	break;	
	}
	
	
	
	$SLIDESHOW[$nombre]['listado']= select(
			"id,file,foto_descripcion,fecha_creacion"
			,"publicidad"
			,"where 1 and  visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
							   
					'carpeta'=>'pub_imas'
					,'tamano'=>'2'
					,'dimensionado'=>$SLIDESHOW[$nombre]['width'].'x'.$SLIDESHOW[$nombre]['height']						
					,'get_archivo'=>array('get_archivo'=>array(
												'carpeta'=>'{carpeta}'
												,'fecha'=>'{fecha_creacion}'
												,'file'=>'{file}'
												,'tamano'=>'{tamano}'
												)
											)
		
				  )
			);


}

/**********************************************/
/**********************************************/
/**********************************************/

if(
	(in_array($_GET['modulo'],array("item"))) 
){	
	$nombre='item-fotos';
	$SLIDESHOW[$nombre]['width'] =440;
	$SLIDESHOW[$nombre]['height']=420;
	$SLIDESHOW[$nombre]['resize']="false";
	$SLIDESHOW[$nombre]['overlap']="false";
	$SLIDESHOW[$nombre]['thumbnails']="false";
	$SLIDESHOW[$nombre]['paused']="true";	
	$SLIDESHOW[$nombre]['delay']="4000";
	$SLIDESHOW[$nombre]['duration']="1500";	
	$SLIDESHOW[$nombre]['controller']="false";	
	$Efecto=4;
	
	switch($Efecto){
	case "1":
		$SLIDESHOW[$nombre]['class']="Slideshow";
		$HEAD['INCLUDES']['style'][]=".slideshow-images-visible { margin-left: 0; }.slideshow-images-prev { margin-left: 400px; }.slideshow-images-next { 	margin-left: -400px; }";
		$SLIDESHOW[$nombre]['transition']="'back:in:out'";
	break;
	case "2":
		$SLIDESHOW[$nombre]['class']="Slideshow";
		$SLIDESHOW[$nombre]['transition']="false";
	break;
	case "3":
		$HEAD['INCLUDES']['js'][]='js/slideshow.kenburns.js';
		$SLIDESHOW[$nombre]['class']="Slideshow.KenBurns";
		$SLIDESHOW[$nombre]['transition']="false";
	break;
	case "4":
		$HEAD['INCLUDES']['style'][]="
		.slideshow-thumbnails { height: 415px; left: auto; right: -115px; top: 0px; width: 110px; }     
		.slideshow-thumbnails ul { height: 415px; width: 100px; } 
		.slideshow-thumbnails a:hover {	background-color: #000 !important; }
		.slideshow-thumbnails-active {background-color: #EBD8A7;}		
		";	
		$SLIDESHOW[$nombre]['class']="Slideshow";
		$SLIDESHOW[$nombre]['transition']="false";
		$SLIDESHOW[$nombre]['thumbnails']="true";
		$SLIDESHOW[$nombre]['paused']="true";				
	break;	
	}
	
	$items_vista_principal= select_fila(
	 "id,file,fecha_creacion,foto_descripcion"
	,"productos_items"
	,"where id='".$ITEM_ID."'"
	,0
	,array(
	
			'carpeta'=>'prodite_imas'
			,'tamano_thumb'=>'3'
			,'tamano_zoom'=>'4'
			,'foto_thumb'=>array('get_archivo'=>array(
										'carpeta'=>'{carpeta}'
										,'fecha'=>'{fecha_creacion}'
										,'file'=>'{file}'
										,'tamano'=>'{tamano_thumb}'
										)
									)
			,'foto_zoom'=>array('get_archivo'=>array(
										'carpeta'=>'{carpeta}'
										,'fecha'=>'{fecha_creacion}'
										,'file'=>'{file}'
										,'tamano'=>'{tamano_zoom}'
										)
									)
			,'foto_descripcion'=>array('ucwords'=>array(
										'string'=>'{foto_descripcion}'
										)
									)			
			,'alt'=>'{foto_descripcion}'
			,'title'=>'{foto_descripcion}'
			
		  )	
	);	
	
	
	$items_vistas_adicionales= select(
	"id,file,fecha_creacion,foto_descripcion"
	,"subproductos_items"
	,"where id_item='".$ITEM_ID."' and  visibilidad='1' order by id asc limit 0,100"
	,0
	,array(
			'carpeta'=>'prodsubite_imas'
			,'tamano_thumb'=>'2'
			,'tamano_zoom'=>'3'
			,'foto_thumb'=>array('get_archivo'=>array(
										'carpeta'=>'{carpeta}'
										,'fecha'=>'{fecha_creacion}'
										,'file'=>'{file}'
										,'tamano'=>'{tamano_thumb}'
										)
									)
			,'foto_zoom'=>array('get_archivo'=>array(
										'carpeta'=>'{carpeta}'
										,'fecha'=>'{fecha_creacion}'
										,'file'=>'{file}'
										,'tamano'=>'{tamano_zoom}'
										)
									)
											
			,'foto_descripcion'=>array('ucwords'=>array(
										'string'=>'{foto_descripcion}'
										)
									)											
			,'alt'=>'{foto_descripcion}'
			,'title'=>'{foto_descripcion}'
			
		  )
    );
	
	$SLIDESHOW[$nombre]['listado']=array_merge(array($items_vista_principal),$items_vistas_adicionales);	
	/*
	if(sizeof($SLIDESHOW[$nombre]['listado'])<=1){
	
		$SLIDESHOW[$nombre]['thumbnails']="false";
	
	}
	*/

}

?>