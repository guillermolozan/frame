<?php //á

/*****************************************************************/
/*****************************************************************/
/*****************************************************************/
/*****************************************************************/
/*****************************************************************/
/*****************************************************************/	


$GRUPOS=array('grupos'=>'grupos','subgrupos'=>'subgrupos');
$tri=array();
list($tri,$tren)=get_data_tree(
					$_GET,
					$GRUPOS
				  );
				  
$FILTROS=array(
			'grupos'=>" and id_grupo='[ID]' ",
			'subgrupos'=>" and id_subgrupo='[ID]' ",
			);
			
			
			
/*****************************************************************/
/*****************************************************************/
/*****************************************************************/
/*****************************************************************/
/*****************************************************************/
/*****************************************************************/			
			
			
			
							
/* BUSQUEDA */
if($_GET['buscar']!=''){
	$FILTRO = " and (". 
					//"tags like '%".$_GET['buscar']."%' or ".
					"nombre like '%".$_GET['buscar']."%' or ".
					"descripcion like '%".$_GET['buscar']."%' or ".
					//"marca like '%".$_GET['buscar']."%' or ".
					" 0 ".
					")";
	$ORDEN	= " order by id desc";
	$VACIO	= "La búsqueda <strong>".$_GET['buscar']."</strong> no obtuvo ningún resultado";
	$TITULO = "Resultado para la búsqueda de ".$_GET['buscar'];
	$PORPAG = 8;	
	$ENLPAG = "index.php?modulo=items&acc=list&tab=".$PARAMS['conector']."&buscar=".$_GET['buscar']."&pag=";
}
/* FILTROS */
elseif(!empty($_GET['fil']) and !empty($_GET['val'])) {
	$FILTRO = str_replace("[ID]",$_GET['val'],$FILTROS[$GRUPOS[$_GET['fil']]]);" and id_subfiltro='".$_GET['val']."' ";			
	$ORDEN	= " order by calificacion desc";
	$TITULO = $tri[$GRUPOS[$_GET['fil']]]['nombre'];
	$VACIO	= "No hay ningun producto en el grupo <b>".$TITULO."</b>";
	$PORPAG = 8;	
	$ENLPAG = "index.php?modulo=items&acc=list&tab=".$PARAMS['conector']."&acc=list&fil=".$_GET['fil']."&val=".$_GET['val']."&friendly=".$TITULO."&pag=";	
}
/* HOME */
elseif($_GET['modulo']=='app' and $_GET['tab']=='home'){
	$FILTRO	= " and 1 ";
	$ORDEN	= " order by calificacion desc";
	$VACIO	= "No hay ningun producto";
	$TITULO = "Catáglogo de Productos";
	$PORPAG = 8;
	$ENLPAG = "index.php?modulo=items&acc=list&tab=".$PARAMS['conector']."&pag=";	
}
else{
	$FILTRO	= " and 1";
	$ORDEN	= " order by calificacion desc";
	$VACIO	= "No hay ningun producto";
	$TITULO = "Catálogo de Productos";
	$PORPAG = 8;
	$ENLPAG = "index.php?modulo=items&acc=list&tab=".$PARAMS['conector']."&pag=";	
}



/**********    QUERY    ************/
$LISTA = paginacion(
        array(
            'separador'=>""
            ,'porpag'=>$PORPAG
            ,'anterior'=>"&laquo; ".$lang['anterior']
            ,'siguiente'=>$lang['siguiente']." &raquo;"
            ,'enlace'=>$ENLPAG
            ,'procesar_url'=>1
            //,'onclick'=>"?pag="
        )
		,"id,id_grupo,id_subgrupo,nombre,marca,codigo,descripcion,precio,fecha_creacion,moneda"
        ,"productos_items"
        ,"where 1 and  visibilidad='1' $FILTRO $ORDEN"
        ,0
		,array(
			//'precio'=>($_GET['fil']=='ofertas')?'{precio_oferta}':'{precio}',
			'grupo'=>array('dato'=>array('nombre','productos_grupos',"where id='{id_grupo}'")),
			'subgrupo'=>array('dato'=>array('nombre','productos_subgrupos',"where id='{id_subgrupo}'")),			
			//'filtro'=>array('dato'=>array('nombre','productos_filtros',"where id='{id_filtro}'")),			
			//'precio'=>array('formato_moneda'=>array('simbolo'=>'S/.','numero'=>'{precio}')),
		    'url'=>array('url'=>array("index.php?modulo=items&tab=productos&acc=file&id={id}&friendly={nombre}")),		
			'foto'=>array('foto'=>array(
										"id,file,foto_descripcion,fecha_creacion|productos_fotos|where id_item='{id}' and visibilidad='1' order by id asc limit 0,1"
										,"profot_imas"
										,array( 
											 'get_atributos'=>'2,150x150,1'											 
											 ,'archivo'=>'3'											 
												)
											)
										),								
			
			)									
        );	

//prin($LISTA);
	


/*
if($_GET['fil']=='ofertas'){
	$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=productos&acc=list&fil=ofertas&val=1&friendly=Ofertas");	
} elseif($ID_RUBRO=='1'){
	$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=rubros&acc=list&gru=1");
} else {
	$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=rubros&acc=list&gru=0");
}
*/

/**********    POST QUERY    ************/

//prin($LISTA['filas']);

foreach($LISTA['filas'] as $ii=>$LIS){

	$LISTA['filas'][$ii]['precios']=render_precios(array('cambio'=>array(
																		'compra'=>$COMMON['variables']['dolar_compra']
																		,'venta'=>$COMMON['variables']['dolar_venta']																						
																		),'precio'=>$LIS['precio'],'moneda'=>$LIS['moneda']));
//	$LISTA['filas'][$ii]['precio_dolares']=$LISTA['filas'][$ii]['precios']['dolares'];
	$LISTA['filas'][$ii]['precios_soles']=$LISTA['filas'][$ii]['precios']['soles'];
	$LISTA['filas'][$ii]['tiene_precio']=($LIS['precio']!='S/.' and $LIS['precio']!='S/.0.00' and $LIS['precio']!='0' and $LIS['precio']!='')?1:0;
	
	if($_SESSION['login']['status']){
		$LISTA['filas'][$ii]['consultar']=' href="'.$LIS['link'].'#consulta" ';
	} else {
		$LISTA['filas'][$ii]['consultar']=' href="#" onclick="javascript:if(confirm(\'¿Desea antes registrarse?\')){ location.href=\''.$SERVER['BASE'].'index.php?modulo=formularios&tab=login&redir='.$LIS['link'].'&rediranchor=consulta\'; } else {  location.href=\''.$SERVER['BASE'].''.$LIS['link'].'#consulta\'; } return false; " ';
	}	
	
	$KEYWORDS['B'][]=$LISTA['filas'][$ii]['nombre'];
	$KEYWORDS['B'][]=$LISTA['filas'][$ii]['marca'];
	$KEYWORDS['C'][]=$LISTA['filas'][$ii]['grupo'];
	$KEYWORDS['C'][]=$LISTA['filas'][$ii]['subgrupo'];
	$KEYWORDS['C'][]=$LISTA['filas'][$ii]['filtro'];

 }
	
//prin($LISTA);
$LISTA['vacio']  = $VACIO;

$LISTA['titulo'] = $TITULO;

$LISTA['ruta'] = $tren;

//$LISTA['menu'] = $MENU_FILTROS;

$LISTADO[$PARAMS['this']]=$LISTA;
//prin($PARAMS['conector']);



$KEYWORDS['A']=array($LISTA['titulo'],$COMMON['datos_root']['titulo_web']);


												
//////////////////HEADER/////////////////////

if(!$bloque){

$HEAD['titulo_H1'] = title_friendly($LISTA['titulo']);

$HEAD['titulo'] =  title_web($HEAD['titulo_H1'],$COMMON['datos_root']['titulo_web']);

//$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);
$HEAD['meta_keywords'] = web_procesar_keywords($HEAD['meta_keywords']." ".implode(",",array_merge($KEYWORDS['A'],$KEYWORDS['B'],$KEYWORDS['C'])));

$HEAD['meta_descripcion'] = web_procesar_description( implode(" ",array_merge($KEYWORDS['A'],$KEYWORDS['B']) ));		

}

$REMOOZZ=1;	

?>