<?php //á

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];

$object=array();
$object=fila(
		"id,nombre"
		,"blog_videos"
		,"where 1 and  visibilidad='1' and id='".$_GET['id']."' order by id asc"
		,0
		);

$PORPAG=15;
$FILTRO="id_grupo='".$_GET['id']."'";
$ORDEN="order by id desc";
$ENLPAG="index.php?".$filtro_param."modulo=items&tab=".$PARAMS['conector']."&acc=file&id=".$_GET['id']."&friendly=".$object['nombre']."&pag=";	
		
//if(empty($object)){ web_reload($SERVER['BASE']); }
		
$object=array_merge($object, paginacion(
			array(
				'separador'=>""
				,'porpag'=>$PORPAG
				,'anterior'=>"&laquo; ".$lang['anterior']
				,'siguiente'=>$lang['siguiente']." &raquo;"
				,'enlace'=>$ENLPAG
				,'procesar_url'=>1
				//,'onclick'=>"?pag="
			)
			,"id,codigo,texto"
			,"blog_videos_videos"
			,"where 1 and $FILTRO $ORDEN"
			,0
			,array(
				'foto:atributos'=>'src="http://i4.ytimg.com/vi/{codigo}/default.jpg" width="120" ',
				'foto:rel'=>'sexylightbox[videos]',
				'foto:url'=>'#TB_inline?width=480&height=385&background=#000&inlineId=video_{id}',
				'foto:extra'=>array('video'=>array("{codigo}",'{id}',"480x385")),
				
				'esquema'=>'foto,texto',				
			)							
		)
);

$SEXYLIGHTBOX=1;

$HEAD['INCLUDES']['script'][]="
    window.addEvent('domready', function(){
      SexyLightbox = new SexyLightBox({color:'black',dir:'web/templates/default/css/sexylightbox/sexyimages'});
    });
";

//prin($object);

//MENU

/*
if($ITEM['id_grupo']=='1'){
	$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=rubros&acc=list&gru=1");
} else {
	$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=rubros&acc=list&gru=0");
}
*/

$object['panel']=array('BLOG_VIDEOS','BLOG_VIDEOS_VIDEOS');

//////////////////////CONECTOR/////////////

$OBJECT[$PARAMS['this']]=$object;
																	
//////////////////HEADER/////////////////////

$HEAD['titulo_H1'] = title_friendly($object['nombre']);

$HEAD['titulo'] = title_web($HEAD['titulo_H1'],$COMMON['datos_root']['titulo_web']);

//$HEAD['meta_keywords'] = procesar_keywords(implode(" ",$concat['concat_nombre']));
$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);
 
//$HEAD['meta_descripcion'] = procesar_description($COMMON['datos_root']['titulo_web']);		
$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);





?>