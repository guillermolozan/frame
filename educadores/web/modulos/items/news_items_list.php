<?php //á

$secc=$SECCIONES[$_GET['sec']];
//$filtro_where=($_GET['sec']=='cgtp')?" and page='4' ":$secc['where'];
$filtro_where=" and page='1' ";
$filtro_param=($_GET['sec']=='cgtp')?"sec=cgtp&":$secc['param'];
$filtro_nombre=$secc['nombre'];


/**********   FILTRO   ************/

/* BUSQUEDA */
if($_GET['buscar']!=''){
	$FILTRO = " and ( nombre like '%".$_GET['buscar']."%' or resumen like '%".$_GET['buscar']."%' )";
	$ORDEN	= " order by fecha desc";
	
	$VACIO	= "La búqueda <strong>".$_GET['buscar']."</strong> no obtuvo ningún resultado";
	$TITULO = "Resultado para la búsqueda de ".$_GET['buscar'];
	$PORPAG = 14;		
	$ENLPAG = "index.php?".$filtro_param."modulo=items&acc=list&tab=".$PARAMS['conector']."&buscar=".$_GET['buscar']."&pag=";
	$DISABLED = 0;	
}
/* HOME */
elseif($_GET['modulo']=='app' and $_GET['tab']=='home'){
	$FILTRO	= " and estructura in ('2') ";
	//$FILTRO	= " and 1 ";
	$ORDEN	= " order by fecha desc";
	
	$VACIO	= "No hay ninguna publicación en la página principal de ésta sección";
	$TITULO = "Portada";
	$PORPAG = 7;
	$ENLPAG = "index.php?".$filtro_param."modulo=items&acc=list&tab=".$PARAMS['conector']."&gru=0&pag=";	
	$DISABLED = 1;
}
/* CATEGORIA */
else {
	$FILTRO = " and id_grupo='".$_GET['gru']."' ";
	$ORDEN	= " order by fecha desc";

	$TITULO = select_dato("nombre","newss_grupos","where id='".$_GET['gru']."'");
	$VACIO	= "No hay ninguna publicación en la categoría <b>".$TITULO."</b>";
	$PORPAG = 7;	
	$ENLPAG = "index.php?".$filtro_param."modulo=items&tab=".$PARAMS['conector']."&acc=list&gru=".$_GET['gru']."&friendly=".$TITULO."&pag=";	
	$DISABLED = 0;
}

/**********    QUERY    ************/

$LISTA = paginacion(
        array(
            'separador'=>""
            ,'porpag'=>$PORPAG
            ,'anterior'=>$lang['anterior']
            ,'siguiente'=>$lang['siguiente']
            ,'enlace'=>$ENLPAG
            ,'procesar_url'=>1
			,'pagina_disabled'=>$DISABLED
            //,'onclick'=>"?pag="
        )
        ,"id,id_grupo,fecha,nombre,resumen as texto,fecha_creacion"
        ,$PARAMS['conector']
        ,"where 1 and  visibilidad='1' $filtro_where $FILTRO $ORDEN"
        ,0
 		,array(
		    'url'=>array('url'=>array("index.php?".$filtro_param."modulo=items&tab=".$PARAMS['conector']."&acc=file&id={id}&friendly={nombre}"))		
			,'fecha'=>array('fecha'=>array('{fecha}','1'))
						
			,'item:regular'=>'foto,nombre?limit=100,fecha,texto?limit=250'
			
			,'grupo'=>array('fila'=>array('nombre,id','news_grupos','where id={id_grupo}'
							,array(											
								'url'=>array('url'=>array("index.php?modulo=items&tab=".$PARAMS['conector']."&acc=list&gru={id}&friendly={nombre}"))		
							)
					  ))

			,'foto'=>array('foto'=>array(
											"id,file,fecha_creacion|news_fotos|where id_item='{id}' and visibilidad='1' order by id desc limit 0,1"
											,"newite_imas"
											,array( 
													'get_atributos:regular'=>'2,100x80,0'
													//,'get_archivo'=>'2'
													)
											)
										) 
							
			) 
        );

//prin($LISTA);
	
	$LISTAS_FILAS=array();
	
	/* BUSQUEDA O CATEGORIAS */
	if($_GET['buscar']!=''){
	
		foreach($LISTA['filas'] as $e=>$fila){
			$fila['item']=$fila['item_regular'];
			if($fila['foto']) $fila['foto']['get_atributos']=$fila['foto']['get_atributos_regular'];
			//if($e%2==0){ 	$COL_SEC[] =$fila; }
			//else{ 			$COL_SEC[]=$fila; }
		}
		$LISTAS_FILAS[]=array('columna',$COL_SEC);
		//$LISTA['solocolumnas']=1;
	
	} else {
	/* HOME */
	
		foreach($LISTA['filas'] as $fila){
				if($fila['foto']) $fila['foto']['get_atributos']=$fila['foto']['get_atributos']['regular'];				
				if($fila['video_codigo']){ $fila['foto']['get_atributos']=' src="http://i4.ytimg.com/vi/'.$fila['video_codigo'].'/default.jpg" width="100" '; }
				$fila['item']=$fila['item']['regular'];
				$COL_SEC[]=$fila; 
		}
		
		//if(sizeof($COL_MAIN)>0){	$COL_MAIN=array($COL_MAIN[0]);	}
		if(sizeof($COL_SEC)>0){		$TEM=array(); foreach($COL_SEC as $i=>$e){		if($i<10){ $TEM[]=$e; }	} $COL_SEC	=$TEM; }
		//if(sizeof($COL_TRIPLE)>0){	$TEM=array(); foreach($COL_TRIPLE as $i=>$e){	if($i<3){ $TEM[]=$e; }	} $COL_TRIPLE=$TEM; }
		
		//if(sizeof($COL_MAIN)>0){	$LISTAS_FILAS[]=array('classStyle'=>'news_items_principal',	'items'=>$COL_MAIN); }
		if(sizeof($COL_SEC)>0){		$LISTAS_FILAS[]=array('classStyle'=>'news_items_regular',	'items'=>$COL_SEC);	}
		//if(sizeof($COL_TRIPLE)>0){	$LISTAS_FILAS[]=array('classStyle'=>'news_items_triple',	'items'=>$COL_TRIPLE); }
		//$LISTA['solocolumnas']=(sizeof($COL_MAIN)==0 and sizeof($COL_TRIPLE)==0)?1:0;
		
	}
	
$LISTA['filas']=$LISTAS_FILAS;
//

	/*
	$BANNER=array('1'=>'banner_construccion','2'=>'banner_industri_comercio','3'=>'banner_banca_finanzas','4'=>'banner_turismo','5'=>'banner_agropecuario_pesca','6'=>'banner_energia_minas','7'=>'banner_tecnologi_servicios','8'=>'banner_pymes');	
	*/	


$LISTA['styles']='news_items_list,news_items_principal,news_items_regular,news_items_triple';
	
//prin($LISTA);
$LISTA['vacio']  = $VACIO;

$LISTA['titulo'] = $TITULO;

//$LISTA['menu'] = $MENU_FILTROS;

$LISTADO[$PARAMS['conector']]=$LISTA;
//prin($PARAMS['conector']);
																	
//////////////////HEADER/////////////////////

$HEAD['titulo'] =  $LISTA['titulo']." | ".$COMMON['datos_root']['titulo_web'];

//$HEAD['meta_keywords'] = procesar_keywords(implode(" ",$concat['concat_nombre']));
$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);
 
//$HEAD['meta_descripcion'] = procesar_description($COMMON['datos_root']['titulo_web']);		
$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);

?>