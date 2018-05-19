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
	$ENLPAG = "index.php?".$filtro_param."modulo=items&acc=list&tab=".$PARAMS['this']."&gru=".$ID_GRUPO."&friendly=".$TITULO."&pag=";	

}
/* FILTROS */
elseif(!empty($_GET['fil']) and !empty($_GET['val'])) {
	switch($_GET['fil']){
		
		case "fecha": 
		
		list($anio,$mes)=explode("-",$_GET['val']);
		
		$FILTRO = " and month(fecha)='".$mes."' and year(fecha)='".$anio."' ";
		$ORDEN	= " order by fecha desc";
				
		$VACIO	= "No hay ningun producto en el mes indicado";
		$TITULO = Titulo_Filtro("Fotos del mes de ",$_GET['val']);
		$PORPAG = 10;	
		$ENLPAG = "index.php?".$filtro_param."modulo=items&acc=list&tab=".$PARAMS['conector']."&acc=list&fil=".$_GET['fil']."&val=".$_GET['val']."&friendly=".$TITULO."&pag=";	

		break;	
		
	}
}
/* HOME */
elseif($_GET['gru']=='0' or empty($_GET['gru']) ){

	$FILTRO	= " and 1 ";
	$ORDEN	= " order by fecha desc";
	
	$VACIO	= "No hay ningun producto portada";
	$TITULO = "Albumes de Fotos";
	$PORPAG = 10;
	$ENLPAG = "index.php?".$filtro_param."modulo=items&acc=list&tab=".$PARAMS['conector']."&pag=";	

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
			,array(
				'id',
				'nombre',
				'fecha',
			)
			,"obras_fotos"
			,"where 1 and  visibilidad='1' $FILTRO $ORDEN"
			,0
			,array(
				'url'=>array('url'=>array('url'=>"index.php?".$filtro_param."modulo=items&tab=".$PARAMS['conector']."&acc=file&id={id}&friendly={nombre}")),		
				'texto'=>array('limit'=>array('{texto}','200')),
				'foto'=>array('foto'=>array("id,file,foto_descripcion,fecha_creacion|obras_fotos_fotos|where id_grupo='{id}' and visibilidad='1' order by id asc limit 0,1",
							"obrfot_imas",
							array('atributos'=>'2,150x110,1')
							)),
				'fecha'=>array('fecha'=>array('{fecha}','5')),
				'esquema'=>'foto,fecha,nombre:h2',
			)

        );
		

$LISTA['combo']=array(
			'onchange'=>'location.href=this.value',
			'style'=>'float:right;margin-top:3px;border:1px solid #999;',
			'items'=>select(
				array(
					"distinct concat(year(fecha),'-',month(fecha)) as value",
					//"year(fecha) as year",
					//"month(fecha) as month",			
				)
				,"blog_fotos"
				,"where 1 and visibilidad='1' order by fecha desc"
				,0
				,array(
					'opcion'=>array('function'=>array('global $Array_Meses; list($yy,$mm)=explode("-","{value}"); echo "Fotos del mes de ".$Array_Meses[$mm]." de ".$yy;')),
					'selected'=>array('match'=>array('{value}',$_GET['val'],'selected','')),
					'value'=>array('url'=>array('url'=>"index.php?modulo=items&tab=".$PARAMS['conector']."&acc=list&fil=fecha&val={value}&friendly={opcion}")),
				)
			)
		);


// prin($LISTA);

//prin($LISTA['filas']);

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