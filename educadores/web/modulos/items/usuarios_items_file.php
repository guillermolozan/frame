<?php //á

$ITEM=select_fila(
		"id,nombre,apellidos,foto,fecha_creacion,id_colegio,genero,codigo,id_sesion,area"
		,"usuarios"
		,"where 1 and status='1' and id='".$_GET['id']."' order by id asc"
		,0
		,array(
				'colegio'=>array('dato'=>array('nombre','colegios','where id={id_colegio}'))
				,'temas'=>array('matriz'=>array('nombre,id,fecha_creacion as fecha,id_area,clave','ventas_items','where user={id_sesion} order by id_area asc,fecha_creacion desc',0,array(
					'area'=>array('fila'=>array('nombre','areas','where id={id_area}')),
				    'url'=>array('procesar_url'=>array('url'=>"index.php?".$filtro_param."modulo=items&tab=temas_items&acc=file&id={id}&friendly={nombre}")),					
					'fecha'=>array('fecha'=>array('{fecha}','7b')),
					'num'=>array('contar'=>array('ventas_mensajes','where id_grupo={id}')),
					'numero'=>'{num} publicaciones',
				    'esquema'=>'fecha,titulo,numero?class=numero',
					'posts'=>array('matriz'=>array('texto,adjunto,id','ventas_mensajes','where id_grupo={id}',0,array(
				    	'url'=>array('procesar_url'=>array('url'=>"index.php?".$filtro_param."modulo=items&tab=posts_items&acc=file&id={id}")),	

						'archivo'=>array('get_archivo'=>array('carpeta'=>'atc_imas','fecha'=>'{fecha_creacion}','file'=>'{adjunto}')),

						'archivo'=>array('urlencode'=>array('{archivo}')),
						'nombre_ue'=>array('urlencode'=>array('string'=>'{adjunto}')),
						'archivo_ue'=>array('urlencode'=>array('string'=>'{adjunto}')),
						'url_download'=>'panel/down.php?name={nombre_ue}&file={archivo_ue}',		
						'download'=>"<a class='download' href='{url_download}' >Descargar</a>",		

						))),
					)))
				,'carpeta'=>'usua_imas'
				,'tamano'=>'2'
				,'dimensionado'=>'210x250'
				//,'centrado'=>'1'
				,'get_atributos'=>array('get_atributos'=>array(
											'carpeta'=>'{carpeta}'
											,'fecha'=>'{fecha_creacion}'
											,'file'=>'{foto}'
											,'tamano'=>'{tamano}'
											,'dimensionado'=>'{dimensionado}'
											//,'centrado'=>'{centrado}'
											)
										),
				// 'archivo'=>array('get_archivo'=>array('carpeta'=>'pdf_fil','fecha'=>'{fecha_creacion}','file'=>'{pdf}')),
				// 'archivo'=>array('urlencode'=>array('{archivo}')),
				// 'nombre_ue'=>array('urlencode'=>array('string'=>'{titulo}')),
				// 'archivo_ue'=>array('urlencode'=>array('string'=>'{archivo}')),
				// 'url_download'=>'panel/down.php?name={nombre_ue}&file={archivo_ue}',		
				// 'download'=>"<a class='download' href='{url_download}' >Descargar</a>",					
			  )
		);


if(empty($ITEM)){ web_reload($SERVER['BASE']); }
				
// prin($ITEM['temas']);
$tema2=array();			
if(is_array($ITEM['temas']))
{
	foreach($ITEM['temas'] as $tema) $tema2[$tema['id']]=$tema;
	$ITEM['temas']=$tema2;
}			

// prin($ITEM['temas']);

//MENU


/*
if($ITEM['id_grupo']=='1'){
	$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=rubros&acc=list&gru=1");
} else {
	$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=rubros&acc=list&gru=0");
}
*/

$ITEM['titulo']=( ($ITEM['genero']==1)?'Profesor':'Profesora' )." ".$ITEM['nombre']." ".$ITEM['apellidos'];


//////////////////////CONECTOR/////////////

$OBJECT[$PARAMS['this']]=$ITEM;
																	
//////////////////HEADER/////////////////////


$HEAD['titulo_H1'] = title_friendly($ITEM['titulo']);

$HEAD['titulo'] = title_web($HEAD['titulo_H1'],$COMMON['datos_root']['titulo_web']);

//$HEAD['meta_keywords'] = procesar_keywords(implode(" ",$concat['concat_nombre']));
$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);
 
//$HEAD['meta_descripcion'] = procesar_description($COMMON['datos_root']['titulo_web']);		
$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);



