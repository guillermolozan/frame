<?php //á

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];

$object=array();
$object=fila(
		"id,nombre"
		,"blog_fotos"
		,"where 1 and  visibilidad='1' and id='".$_GET['id']."' order by id asc"
		,0
		);

$PORPAG=15;
$FILTRO="id_grupo='".$_GET['id']."'";
$ORDEN="order by id desc";
$ENLPAG="index.php?modulo=items&tab=".$PARAMS['conector']."&acc=file&id=".$_GET['id']."&friendly=".$object['nombre']."&pag=";	
		
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
			,"id,file,foto_descripcion,fecha_creacion"
			,"blog_fotos_fotos"
			,"where 1 and $FILTRO $ORDEN"
			,0
			,array(
				'fecha'=>array('fecha'=>array('{fecha}','5')),			
				'foto:atributos'=>array('atributos'=>'blofot_imas,{fecha_creacion},{file},1,150x110,1'),
				'foto:url'=>array('archivo'=>'blofot_imas,{fecha_creacion},{file},4'),
				'foto:descripcion'=>'{foto_descripcion}',
				'foto:rel'=>"rel='imagezoom[album]'",											
				'esquema'=>'foto',
				
					'foto_descripcion'=>'null',
					'fecha_creacion'=>'null',				
					'file'=>'null',				
				
			)							
		)
);

$Load['imagezoom']=1;

$HEAD['INCLUDES']['script'][]='
window.addEvent("domready", function() {
	initImageZoom({"loadImage":"'.$SERVER['BASE'].THEME_PATH.'css/imagezoom/images/loading.gif"});
});   
';

//prin($object);

//MENU

/*
if($ITEM['id_grupo']=='1'){
	$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=rubros&acc=list&gru=1");
} else {
	$COMMON['menu'] = web_re_procesar_menu($COMMON['menu'],"index.php?modulo=items&tab=rubros&acc=list&gru=0");
}
*/

$object['panel']=array('BLOG_FOTOS','BLOG_FOTOS_FOTOS');
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