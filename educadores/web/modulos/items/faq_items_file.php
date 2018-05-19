<?php //á 

$ITEM=select_fila(
		array(
				'id',
				'nombre',
				'texto',
				'fecha',
				'fecha_creacion',
				'fichero',
		)
		,"publicaciones_items"
		,"where 1 and  visibilidad='1' and id='".$_GET['id']."' order by id asc"
		,0
			,array(
				//'url'=>array('url'=>array('url'=>"index.php?".$filtro_param."modulo=items&tab=".$PARAMS['conector']."&acc=file&id={id}&friendly={nombre}")),		
				//'texto'=>array('limit'=>array('{texto}','200')),
				//'foto:atributos'=>array('atributos'=>'tex_imas,{fecha_creacion},{file},2,140x120,1'),
				'fecha'=>array('fecha'=>array('{fecha}','5')),
				'archivo'=>array('get_archivo'=>array('carpeta'=>'doc_fil','fecha'=>'{fecha_creacion}','file'=>'{fichero}')),
				//'archivo'=>array('urlencode'=>array('{archivo}')),
				'url_download'=>'panel/down.php?name={nombre}&file={archivo}',		
				'download'=>"<a href='{url_download}' >Descargar</a>",					
				'esquema'=>'fecha,texto,download?class=subtitulo',
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