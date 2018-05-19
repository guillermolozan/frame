<?php //á

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];

/**********   FILTRO   ************/

/* BUSQUEDA */
if($_GET['buscar']!=''){
	
	$FILTRO = " and ( tags like '%".$_GET['buscar']."%' or nombre like '%".$_GET['buscar']."%' or descripcion like '%".$_GET['buscar']."%' or marca like '%".$_GET['buscar']."%' )";
	$ORDEN	= " order by id asc";
	
	$VACIO	= "La búsqueda <strong>".$_GET['buscar']."</strong> no obtuvo ningún resultado";
	$TITULO = "Resultado para la búsqueda de ".$_GET['buscar'];
	
	$SUBTITULO = "Búsqueda";
	$PORPAG = 9;		
	$ENLPAG = "index.php?".$filtro_param."modulo=items&acc=list&tab=".$PARAMS['this']."&buscar=".$_GET['buscar']."&pag=";
	
}


/**********    QUERY    ************/

$LISTA['filas'] = select(
			// array(
			// 	'separador'=>""
			// 	,'porpag'=>$PORPAG
			// 	,'anterior'=>"&laquo; ".$lang['anterior']
			// 	,'siguiente'=>$lang['siguiente']." &raquo;"
			// 	,'enlace'=>$ENLPAG
			// 	,'procesar_url'=>1
			// 	//,'onclick'=>"?pag="
			// ),
			array(
				'id',
				'nombre',
				'"temas_items" as modulo',
			)
			,"ventas_items"
			,"where visibilidad='1'  and ( tags like '%".$_GET['buscar']."%' or nombre like '%".$_GET['buscar']."%' ) limit 0,10
			union 
			select id,nombre,'news_items' as modulo from news_items where visibilidad='1'  and ( nombre like '%".$_GET['buscar']."%' ) limit 0,10
			"
			,0
			,array(
				'url'=>array('url'=>array('url'=>"index.php?".$filtro_param."modulo=items&tab={modulo}&acc=file&id={id}&friendly={nombre}")),		
				'esquema'=>'nombre',
			)
        );



// prin($LISTA);


// $LISTA['combo']=array(
// 			'onchange'=>'location.href=this.value',
// 			'style'=>'float:right;margin-top:3px;border:1px solid #999;',
// 			'items'=>select(
// 				array(
// 					"distinct concat(year(fecha),'-',month(fecha)) as value",
// 					//"year(fecha) as year",
// 					//"month(fecha) as month",			
// 				)
// 				,"blog_noticias"
// 				,"where 1 and visibilidad='1' order by fecha desc"
// 				,0
// 				,array(
// 					'opcion'=>array('function'=>array('global $Array_Meses; list($yy,$mm)=explode("-","{value}"); echo "Notas del mes de ".$Array_Meses[$mm]." de ".$yy;')),
// 					'selected'=>array('match'=>array('{value}',$_GET['val'],'selected','')),
// 					'value'=>array('url'=>array('url'=>"index.php?".$filtro_param."modulo=items&tab=".$PARAMS['conector']."&acc=list&fil=fecha&val={value}&friendly={opcion}")),
// 				)
// 			)
// 		);


/*
if($ID_RUBRO=='1'){
	$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=rubros&acc=list&gru=1");
} else {
	$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=rubros&acc=list&gru=0");
}
*/

/**********    POST QUERY    ************/

//prin($LISTA['filas']);

foreach($LISTA['filas'] as $ii=>$LIS){

	$KEYWORDS['B'][]=$LISTA['filas'][$ii]['nombre'];

}
	

$LISTA['vacio']  = $VACIO;

$LISTA['titulo'] = $TITULO;

//$LISTA['menu'] = $MENU_FILTROS;

$LISTADO[$PARAMS['this']]=$LISTA;
//prin($PARAMS['conector']);

$KEYWORDS['A']=array($LISTA['titulo'],$COMMON['datos_root']['titulo_web']);


												
//////////////////HEADER/////////////////////

$HEAD['titulo_H1'] = title_friendly($LISTA['titulo']);

$HEAD['titulo'] =  title_web($HEAD['titulo_H1'],$COMMON['datos_root']['titulo_web']);

//$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);
$HEAD['meta_keywords'] = web_procesar_keywords($HEAD['meta_keywords']." ".implode(",",array_merge($KEYWORDS['A'],$KEYWORDS['B'],$KEYWORDS['C'])));

$HEAD['meta_descripcion'] = web_procesar_description( implode(" ",array_merge($KEYWORDS['A'],$KEYWORDS['B']) ));		



?>