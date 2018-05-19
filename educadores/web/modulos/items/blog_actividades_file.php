<?php //á
 
$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];

$ITEM=select_fila(
		"id,nombre as titulo,texto"
		,"blog_actividades"
		,"where 1 and  visibilidad='1' and id='".$_GET['id']."' order by id asc"
		,0
		,array(
			'fotos'=>array('sub_fotos'=>array(
											"id,file,foto_descripcion as caption,fecha_creacion|blog_actividades_fotos|where id_grupo='{id}' limit 0,8|0"
											,"bloact_imas"
											,array( 
													 'get_atributos'=>'2,140x90,3',
													 'foto_thumb'=>'2',
													 'foto_zoom'=>'3',													 
													 'href'=>'4',													 
													)
											)
										)
			)
		);

if(empty($ITEM)){ web_reload($SERVER['BASE']); }
				

								

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




