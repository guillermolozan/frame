<?php //á

$ITEM=select_fila(
		"id,nombre as titulo,texto,foto,foto_descripcion,fecha_creacion"
		,"textos_items"
		,"where 1 and  visibilidad='1' and id='".$_GET['id']."' order by id asc"
		,0
		,array(
				'carpeta'=>'tex_imas'
				,'tamano'=>'2'
				,'dimensionado'=>'435x600'
				//,'centrado'=>'1'
				,'get_atributos'=>array('get_atributos'=>array(
											'carpeta'=>'{carpeta}'
											,'fecha'=>'{fecha_creacion}'
											,'file'=>'{foto}'
											,'tamano'=>'{tamano}'
											,'dimensionado'=>'{dimensionado}'
											//,'centrado'=>'{centrado}'
											)
										)
			  )
		);

if(empty($ITEM)){ web_reload($SERVER['BASE']); }
				

								
//prin($ITEM);

//MENU


/*
if($ITEM['id_grupo']=='1'){
	$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=rubros&acc=list&gru=1");
} else {
	$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=rubros&acc=list&gru=0");
}
*/


//////////////////////CONECTOR/////////////

$OBJECT[$PARAMS['this']]=$ITEM;
																	
//////////////////HEADER/////////////////////

$HEAD['titulo_H1'] = title_friendly($ITEM['titulo']);

$HEAD['titulo'] = title_web($HEAD['titulo_H1'],$COMMON['datos_root']['titulo_web']);

//$HEAD['meta_keywords'] = procesar_keywords(implode(" ",$concat['concat_nombre']));
$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);
 
//$HEAD['meta_descripcion'] = procesar_description($COMMON['datos_root']['titulo_web']);		
$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);





?>