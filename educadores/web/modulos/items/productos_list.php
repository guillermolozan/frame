<?php //á

/**********   FILTRO   ************/

/* BUSQUEDA */
if($_GET['buscar']!=''){
	
	$FILTRO = " and ( tags like '%".$_GET['buscar']."%' or nombre like '%".$_GET['buscar']."%' or descripcion like '%".$_GET['buscar']."%' or marca like '%".$_GET['buscar']."%' )";
	$ORDEN	= " order by id asc";
	
	$VACIO	= "La búsqueda <strong>".$_GET['buscar']."</strong> no obtuvo ningún resultado";
	$TITULO = "Resultado para la búsqueda de ".$_GET['buscar'];
	
	$SUBTITULO = "Búsqueda";
	$PORPAG = 9;		
	$ENLPAG = "index.php?modulo=items&acc=list&tab=".$PARAMS['this']."&buscar=".$_GET['buscar']."&pag=";
	
}
/* CATEGORIA */
elseif(!empty($_GET['gru'])) {
	
	$ID_GRUPO = $_GET['gru'];
	$FILTRO = " and id_grupo='".$ID_GRUPO."' ";
	$ORDEN	= " order by nombre asc";

	$ID_RUBRO = select_dato("id_grupo","productos_grupos","where id='".$ID_GRUPO."'");

	$TITULO = select_dato("nombre","productos_grupos","where id='".$ID_GRUPO."'");
	$SUBTITULO = $TITULO;
	
	$VACIO	= "No hay ningun producto en la categoría <b>".$TITULO."</b>";
	$PORPAG = 9;	
	$ENLPAG = "index.php?modulo=items&acc=list&tab=".$PARAMS['this']."&gru=".$ID_GRUPO."&friendly=".$TITULO."&pag=";	

}
/* FILTROS */
elseif(!empty($_GET['fil']) and !empty($_GET['val'])) {
	switch($_GET['fil']){
		
		case "grupos": 
		
		$Filtro="id_filtro";
		$FILTRO = " and $Filtro='".$_GET['val']."' ";
		$ORDEN	= " order by id asc";
	
		$ID_GRUPO = select_dato("id_subgrupo","productos_filtros","where id='".$_GET['val']."'");

		$ID_RUBRO = select_dato("id_grupo","productos_subgrupos","where id='".$ID_GRUPO."'");

		$TITULO = select_dato("nombre","productos_filtros","where id='".$_GET['val']."'");

		$SUBTITULO = select_dato("nombre","productos_subgrupos","where id='".$ID_GRUPO."'");

		$VACIO	= "No hay ningun producto en la subcategoría <b>".$TITULO."</b>";
		$PORPAG = 9;	
		$ENLPAG = "index.php?modulo=items&acc=list&tab=".$PARAMS['this']."&acc=list&fil=grupos&val=".$_GET['val']."&friendly=".$TITULO."&pag=";	
		
		break;
		case "catalogos":
		
		$Filtro="id_grupo";
		$FILTRO = " and $Filtro='".$_GET['val']."' ";
		$ORDEN	= " order by nombre asc";
	
		$ID_GRUPO = $_GET['val'];

		$ID_RUBRO = '';

		$TITULO = select_dato("nombre","productos_grupos","where id='".$_GET['val']."'");

		$SUBTITULO = '';

		$VACIO	= "No hay ningun producto en el catálogo <b>".$TITULO."</b>";
		$PORPAG = 9;	
		$ENLPAG = "index.php?modulo=items&acc=list&tab=".$PARAMS['conector']."&acc=list&fil=catalogos&val=".$_GET['val']."&friendly=".$TITULO."&pag=";	
		
		break;		
		
	}
}
/* HOME */
elseif($_GET['gru']=='0' or empty($_GET['gru']) ){

	$FILTRO	= " and 1 ";
	$ORDEN	= " order by nombre asc";
	
	$VACIO	= "No hay ningun producto portada";
	$TITULO = "Ofertas";
	$SUBTITULO = "Ofertas";
	$PORPAG = 9;
	$ENLPAG = "index.php?modulo=items&acc=list&tab=".$PARAMS['conector']."&gru=0&pag=";	

}

/**********    QUERY    ************/

$LISTA = paginacionnumerada(
        array(
            'separador'=>""
            ,'porpag'=>$PORPAG
            ,'anterior'=>"&laquo; ".$lang['anterior']
            ,'siguiente'=>$lang['siguiente']." &raquo;"
            ,'enlace'=>$ENLPAG
            ,'procesar_url'=>1
            //,'onclick'=>"?pag="
        )
        ,"id,id_grupo,nombre,codigo,descripcion,precio,fecha_creacion"
        ,"productos_items"
        ,"where 1 and  visibilidad='1' $FILTRO $ORDEN"
       ,0
		,array(
			'grupo'=>array('sub_select_dato'=>array('campo'=>'nombre','tabla'=>'productos_grupos','where'=>"where id='{id_grupo}'")),
			//'precio'=>array('formato_moneda'=>array('simbolo'=>'S/.','numero'=>'{precio}')),
		    'url'=>array('url'=>array('url'=>"index.php?modulo=items&tab=".$PARAMS['conector']."&acc=file&id={id}&friendly={nombre}")),		
			'foto'=>array('foto'=>array(
										"id,file,foto_descripcion,fecha_creacion|productos_fotos|where id_item='{id}' and visibilidad='1' order by id asc limit 0,1"
										,"profot_imas"
										,array( 
											 'get_atributos'=>'3,210x140,1'
											 //,'archivo'=>'3'
												)
											)
										),	
			'foto:url'=>'{url}',
			'esquema'=>'nombre,foto',
			)	
        );	

//	$REMOOZZ=1;
//	prin($LISTA['filas']);		

	if(!empty($ID_GRUPO)){
			
		$grupo = select_fila(
							"id,nombre"
							,"productos_subgrupos"
							,"where id='".$ID_GRUPO."'"
							,0
							,array(
								'sub_categorias'=>array('sub_select'=>array(
													'campos'=>"id,nombre"
													,'tabla' =>"productos_filtros"
													,'donde' =>"where id_subgrupo='{id}' and visibilidad='1' order by id asc limit 0,100"
													,'debug' =>0
													,'opciones' =>array(
														'link'=>array('procesar_url'=>array('url'=>"index.php?modulo=items&tab=productos&acc=list&fil=grupos&val={id}&friendly={nombre}"))		
													
													)
												)
											)
								)
							);
								
		$LISTA['sub_categorias']=$grupo['sub_categorias'];			
	
	} else {
		
		$grupo['categorias'] = select(
							"id,nombre"
							,"productos_subgrupos"
							,"where id_grupo='1' "
							,0
							,array(
								'link'=>array('procesar_url'=>array('url'=>"index.php?modulo=items&tab=productos&acc=list&gru={id}&friendly={nombre}"))		
								)
							);
		$LISTA['categorias']=$grupo['categorias'];	
				
	}
	
		$LISTA['menu']=web_procesar_menu(array(
							array(
								'url'=>'index.php?modulo=items&tab=productos&acc=list&gru='.$grupo['id'].'&friendly='.$grupo['nombre']
								,'label'=>$SUBTITULO	
								,'selected'=>1
							)													
						));		
						


if($ID_RUBRO=='1'){
	$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=rubros&acc=list&gru=1");
} else {
	$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=rubros&acc=list&gru=0");
}

/**********    POST QUERY    ************/

//prin($LISTA['filas']);

foreach($LISTA['filas'] as $ii=>$LIS){

	$KEYWORDS['B'][]=$LISTA['filas'][$ii]['nombre'];
	$KEYWORDS['B'][]=$LISTA['filas'][$ii]['marca'];
	$KEYWORDS['C'][]=$LISTA['filas'][$ii]['grupo'];
	$KEYWORDS['C'][]=$LISTA['filas'][$ii]['subgrupo'];
	$KEYWORDS['C'][]=$LISTA['filas'][$ii]['filtro'];

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