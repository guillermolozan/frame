<?php //á

$THIS=$PARAMS['this'];


$object=array();
				  
$object = select_fila(
        array(
			"id",
			"id_grupo",
			"id_subgrupo",
			"nombre",
			"codigo",
			"descripcion",
			//"fecha_creacion",
		)
        ,"productos_items"
        ,"where 1 and  visibilidad='1' and id='".$_GET['id']."'"
        ,0
		,array(
		    'nombre'=>array('limit_string'=>array('string'=>"{nombre}",'limit'=>"75"))	
		    ,'url'	=>array('url'=>array('url'=>"index.php?modulo=items&tab=".$PARAMS['conector']."&acc=file&id={id}&friendly={titulo}"))
			//,'archivo'=>array('archivo'=>array('carpeta'=>'doc_imas','fecha'=>'{fecha_creacion}','file'=>'{fichero}'))	
			//,'ficha'=>array('stripslashes'=>array('string'=>'{ficha}'))
			//,'down'=>'panel/down.php?name={nombre_fichero}&file={archivo}'													
			,'fotos'=>array('fotos'=>array(
											"id,file,foto_descripcion as caption,fecha_creacion|productos_fotos|where id_item='{id}' and visibilidad='1' order by id desc limit 0,8"
											,"profot_imas"
											,array( 
													 //'get_atributos'=>'2,140x90,3',
													 'foto_thumb'=>'1',
													 'foto_zoom'=>'3',													 
													 'href'=>'4',													 
													)
											)
										) 	

			)
		
        );

if(empty($object)){ web_reload($SERVER['BASE']); }


//////////////////SLIDESHOW//////////////////


	$SLIDESHOW=array(
				'label'=>$PARAMS['this'],
				'zoom'=>"400x300",
				'height'=>400,
				'resize'=>"false",
				'overlap'=>"false",				
				'thumbnails'=>"true",
					'thumb'=>"100x100",
					'thumb_filas'=>"1",
					'thumb_direccion'=>"horizontal",
				'paused'=>"true",
				'delay'=>"3000",
				'duration'=>"1000",
				'controller'=>"false",
				'efecto'=>"4",		
				'captions'=>"false",			
				'hrefs'=>"true",						
				'linked'=>"true",						
				'lightbox'=>"true",						
				'listado'=>$object['fotos']
				);
//	prin($SLIDESHOW);
	
	$object['SLIDESHOW']=web_render_slideshow_preproceso($SLIDESHOW);	
	
list($tri,$object['ruta'])=get_data_tree(
					$_GET,
					array('marcas'=>'grupos','categorias'=>'subgrupos')
				  );	
				
				
$MENu[]=array('label'=>"Ficha del Producto", 	'onclick'=>";", 'id'=>'1', 'default'=>'1');

	if($_SESSION['login']['status']){
		$MENu[]=array('label'=>"Consultar" ,'onclick'=>";", 'id'=>'2');		
	} else {
		$MENu[]=array('label'=>"Consultar" ,'onclick'=>'if(confirm("¿Desea antes registrarse?")){ location.href="'.$SERVER['BASE'].'index.php?modulo=formularios&tab=login&redir='.$_SERVER['REQUEST_URI'].'&rediranchor=consulta"; } else { return false; }', 'id'=>'2');		
	}
	
$ITEM['menu']=web_procesar_menu($MENu);		

				
/*						
$Load['imagezoom']=1;
$HEAD['INCLUDES']['script'][]='
window.addEvent("domready", function() {
	initImageZoom({"loadImage":"'.$SERVER['BASE'].THEME_PATH.'css/imagezoom/images/loading.gif"});
});   
';
*/
//include(incluget("formularios/comentarios.php",array('conector'=>'comentarios')));




/*
if($ITEM['id_grupo']=='1'){
	$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=rubros&acc=list&gru=1");
} else {
	$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=rubros&acc=list&gru=0");
}
*/


//////////////////FACEBOOK LIKE//////////////////
/*
	$FBL['url']	= $SERVER['BASE'].procesar_url($SERVER['ARCHIVO']."?".$SERVER['REDIRECT_QUERY_STRING'],0);
	$FBL['w']	= 215;
	$FBL['h']	= 65;
	
	$ITEM['FBL']=$FBL;
*/
//////////////////////CONECTOR/////////////
//prin($PARAMS);

$OBJECT[$THIS]=$object;
																	
//////////////////HEADER/////////////////////

$HEAD['titulo_H1'] = title_friendly($object['nombre']);

$HEAD['titulo'] = title_web($HEAD['titulo_H1'],$COMMON['datos_root']['titulo_web']);

//$HEAD['meta_keywords'] = procesar_keywords(implode(" ",$concat['concat_nombre']));
$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);
 
//$HEAD['meta_descripcion'] = procesar_description($COMMON['datos_root']['titulo_web']);		
$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);


//////////////////FACEBOOK/////////////////////

/*
$HEAD['facebook']['og:title']=$HEAD['titulo'];
$HEAD['facebook']['og:type']='activity';
$HEAD['facebook']['og:url']=$SERVER['URL'];
$HEAD['facebook']['og:image']=$ITEM['fotos']['0']['foto_zoom'];
$HEAD['facebook']['og:site_name']=$COMMON['datos_root']['titulo_web'];
$HEAD['facebook']['fb:admins']='665417593';
$HEAD['facebook']['og:description']=strip_tags(str_replace(array("</li>","\""),array("</li>\n",""),$ITEM['descripcion']));
*/


?>