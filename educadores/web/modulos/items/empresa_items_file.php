<?php //á



$secc=$SECCIONES[$_GET['sec']];

$filtro_where=$secc['where'];

$filtro_param=$secc['param'];

$filtro_nombre=$secc['nombre'];



$ITEM = select_fila(

        "id,nombre as titulo,texto,foto,fecha_creacion"

        ,"empresa_items"

        ,"where 1 and  visibilidad='1' and id=".$_GET['id']." $filtro_where order by id asc"

        ,0

		,array(
			'item'=>'foto,texto',

			'atributos'=>array('atributos'=>'empr_imas,{fecha_creacion},{foto},2,380x250,1'),

			)


        );

// prin($ITEM);

// exit();



// if($ITEM['archivo']=='http://munipomabamba.gob.pe/web/templates/default/img/common/spacer.gif') $ITEM['download']='';







if(empty($ITEM)){ web_reload($SERVER['BASE']); }









$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=".$PARAMS['this']."&acc=list&gru=".$ITEM['id_grupo']."&friendly=");







$DETAIL[$PARAMS['conector']]=$ITEM;





//////////////////FACEBOOK LIKE//////////////////



	$FBL['url']	= $SERVER['BASE'].procesar_url($SERVER['ARCHIVO']."?".$_SERVER['QUERY_STRING'],0);

	$FBL['w']	= 400;

	$FBL['h']	= 42;

	

	$FACEBOOK_LIKE[$PARAMS['this']]=$FBL;

	
																	

//////////////////HEADER/////////////////////



$HEAD['titulo'] = title_friendly($ITEM['titulo'])." | ".$COMMON['datos_root']['titulo_web'];



//$HEAD['meta_keywords'] = procesar_keywords(implode(" ",$concat['concat_nombre']));

$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);

 

//$HEAD['meta_descripcion'] = procesar_description($COMMON['datos_root']['titulo_web']);		

$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);





//////////////////FACEBOOK/////////////////////



$HEAD['facebook']['og:title']=$HEAD['titulo'];

$HEAD['facebook']['og:type']='activity';

$HEAD['facebook']['og:url']=$SERVER['URL'];

$HEAD['facebook']['og:image']=$ITEM['fotos']['0']['get_atributos'];

$HEAD['facebook']['og:site_name']=$COMMON['datos_root']['titulo_web'];

$HEAD['facebook']['fb:admins']='665417593';

$HEAD['facebook']['og:description']=strip_tags(str_replace(array("</li>","\""),array("</li>\n",""),$ITEM['subtitulo']));



?>