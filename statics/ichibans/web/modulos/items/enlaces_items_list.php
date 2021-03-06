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
		
		case "fecha": 
		
		list($anio,$mes)=explode("-",$_GET['val']);
		
		$FILTRO = " and month(fecha)='".$mes."' and year(fecha)='".$anio."' ";
		$ORDEN	= " order by fecha desc";
				
		$VACIO	= "No hay ningun producto en el mes indicado";
		$TITULO = Titulo_Filtro("Textos del mes de ",$_GET['val']);
		$PORPAG = 10;	
		$ENLPAG = "index.php?modulo=items&acc=list&tab=".$PARAMS['conector']."&acc=list&fil=".$_GET['fil']."&val=".$_GET['val']."&friendly=".$TITULO."&pag=";	

		break;	
		
	}
}
/* HOME */
elseif($_GET['gru']=='0' or empty($_GET['gru']) ){

	$FILTRO	= " and 1 ";
	$ORDEN	= " order by id asc";
	
	$VACIO	= "No hay ningun enlace";
	$TITULO = "Enlaces de Interés";
	$PORPAG = 10;
	$ENLPAG = "index.php?modulo=items&acc=list&tab=".$PARAMS['conector']."&pag=";	

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
				'url',
				'texto',
			)
			,"enlaces_items"
			,"where 1 and  visibilidad='1' $FILTRO $ORDEN"
			,0
			,array(
				'texto'=>array('limit'=>array('{texto}','200')),
				'esquema'=>'nombre:h2,texto',
			)
        );



/*
function Titulo_Filtro($titulo,$value){
	$MesesA=array('1'=>'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre');	
	list($year,$month)=explode("-",$value);
	return $titulo.$MesesA[$month]." de ".$year;
}				
*/
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