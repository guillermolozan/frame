<?php //á



$secc=$SECCIONES[$_GET['sec']];

$filtro_where=$secc['where'];

$filtro_param=$secc['param'];

$filtro_nombre=$secc['nombre'];



$ITEM = select_fila(

        "id,id_grupo,fecha,nombre as titulo,resumen as subtitulo,texto,fecha_creacion,pdf"

        ,"news_items"

        ,"where 1 and  visibilidad='1' and id=".$_GET['id']." $filtro_where order by id asc"

        ,0

		,array(

		    'url'=>array('url'=>array("index.php?".$filtro_param."modulo=items&tab=".$PARAMS['conector']."&acc=file&id={id}&friendly={titulo}"))

			//,'item'=>'foto,subtitulo,texto'		

			,'fecha'=>array('fecha'=>array('{fecha}','1'))

			

			//,'item'=>'video,foto,fecha,texto,autor'

			,'item'=>'titulo,fecha,foto,texto,download'

			

			,'foto'=>array('foto'=>array(

											"id,file,foto_descripcion,fecha_creacion|news_fotos|where id_item='{id}' and visibilidad='1' order by id desc limit 0,1"

											,"newite_imas"

											,array( 

													 'get_atributos'=>'3,446x460,0'

													)

											)

										), 	

			/*

			,'video'=>array('dato'=>array(

											'campo'=>'codigo'

											,'tabla'=>'news_videos'

											,'donde'=>"where id_item={id} and visibilidad='1' order by id desc limit 0,1"

											))	

			*/	

			/*
			'archivo'=>array('get_archivo'=>array('carpeta'=>'pdf_fil','fecha'=>'{fecha_creacion}','file'=>'{pdf}')),

			//'archivo'=>array('urlencode'=>array('{archivo}')),

			'nombre_ue'=>array('urlencode'=>array('string'=>'{titulo}')),

			'archivo_ue'=>array('urlencode'=>array('string'=>'{archivo}')),

			'url_download'=>'panel/down.php?name={nombre_ue}&file={archivo_ue}',		

			'download'=>"<a class='download' href='{url_download}' >Descargar</a>",												
			*/
		
			)

        );







if($ITEM['archivo']=='http://munipomabamba.gob.pe/web/templates/default/img/common/spacer.gif') $ITEM['download']='';







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