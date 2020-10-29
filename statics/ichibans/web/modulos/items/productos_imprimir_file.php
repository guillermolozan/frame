<?php //á

$THIS=$PARAMS['this'];



$ITEM = select_fila(

        array(
			"id",
			"id_grupo",
			"id_tipo",			
			"nombre",
			"ficha",
			"fecha_creacion"
		)
        ,"productos_items"
        ,"where 1 and  visibilidad='1' and id=".$_GET['id']." order by id asc"
        ,0

		,array(
		    'titulo'=>array('limit_string'=>array('string'=>"{nombre}",'limit'=>"75"))	
		    ,'link'=>array('procesar_url'=>array('url'=>"index.php?modulo=items&tab=".$PARAMS['conector']."&acc=file&id={id}&friendly={titulo}"))
			,'archivo'=>array('get_archivo'=>array('carpeta'=>'doc_imas','fecha'=>'{fecha_creacion}','file'=>'{fichero}'))	
			,'ficha'=>array('stripslashes'=>array('string'=>'{ficha}'))			
			,'tipo'=>array('dato'=>array('nombre','productos_tipos','where id="{id_tipo}"'))
			
//			,'down'=>'panel/down.php?name={nombre_fichero}&file={archivo}'													
			,'fotos'=>array('sub_fotos'=>array(
											"id,file,foto_descripcion as caption,fecha_creacion|productos_fotos|where id_item='{id}' and visibilidad='1' order by calificacion desc limit 0,8"
											,"profot_fot"
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
		
		$ITEM['ficha']=strip_tags($ITEM['ficha'],"<table><tr><td><tbody><strong><font>");
		$ITEM['ficha']=str_replace('&nbsp;','',$ITEM['ficha']);
					



if(empty($ITEM) and $_GET['id']!=''){ web_reload($SERVER['BASE']); }

if(!$Local){
$HEAD['INCLUDES']['script'][]='
window.addEvent("load", function() {
	window.print();	
});   
';
}

$HEAD['INCLUDES']['style'][]='
#div_allcontent { width:100%; }
.div_body { background:none; }
.div_col_1d1 { width:683px; }  
';


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

$DETAIL[$THIS]=$ITEM;
																	
//////////////////HEADER/////////////////////

$HEAD['titulo_H1'] = title_friendly($ITEM['titulo']);

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