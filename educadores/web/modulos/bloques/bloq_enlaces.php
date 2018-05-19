<?php //á

$object=array();

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];

$filtro_where='';
$filtro_param='';
$filtro_nombre='	';

$object['p']=array(
			'ids'=>array('1'),
			't'=>'2','w'=>'233','h'=>'190',
			);
			
$object['settings']=array(
		'label'=>$PARAMS['conector'],	
		'width'	=>$object['p']['w'],
		'height'=>$object['p']['h'],
		'itemsporpagina'=>"1x3",
		'vacio'=>"aún no hay fotos",
		'titulo'=>"",	
		'interval'=>"7000",	
		'autoplay'=>"true",//[true,false]
		'mode'=>"horizontal", //[horizontal,vertical]	
		//'handles'=>"0",
		'buttons'=>"1",
		);	
					
foreach($object['p']['ids'] as $ii=>$ID){				

	$oGrupo=array();

	// $grupo=fila('nombre,id','textos_grupos',"where $ID $filtro_where ",0);
	$oGrupo['header']='Enlaces';
	
	$oGrupo['items']= select(
			"id,titulo,fecha_creacion,foto as file,pagina"
			,"bloque_enlaces"
			,"where visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
				'foto:url'=>'{pagina}',
				'url'=>'{pagina}',
				'foto:atributos'=>array('atributos'=>'enl_imas,{fecha_creacion},{file},'.$object['p']['t'].',114x52'),
				//'foto:atributos'=>array('atributos'=>'banfot_imas,{fecha_creacion},{file},2,223x118,1'),
				'esquema'=>'foto,titulo'	
			) 

	);
			
	$oGrupo=web_render_Slider_PreProceso2(array_merge($object['settings'],array(
												'label'=>$object['settings']['label']."_".$ii,
												'titulo'=>$item['nombre']
												//'interval'=>'7000',
												)),$oGrupo);

	$oGrupos[]=$oGrupo; unset($oGrupo);
	
}
		
	$object=array('items'=>$oGrupos); unset($oGrupos);
	
	$object['panel']='obras_fotos,obras_fotos_fotos';

	$OBJECT[$PARAMS['this']]=$object;
	
	$REMOOZZ=1;	
	//$SEXYLIGHTBOX=1;
		
