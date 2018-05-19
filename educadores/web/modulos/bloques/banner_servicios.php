<?php //á

$object=array();

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];

$object['p']=array(
			'ids'=>array(" 1 "),
			't'=>'2','w'=>'210','h'=>'175',
			);
			
$object['settings']=array(
		'label'=>$PARAMS['conector'],	
		'width'	=>$object['p']['w'],
		'height'=>220,
		'itemsporpagina'=>"1x1",
		'vacio'=>"aún no hay fotos",
		'titulo'=>"",	
		'interval'=>"7000",	
		'autoplay'=>"true",//[true,false]
		'mode'=>"horizontal", //[horizontal,vertical]	
		//'handles'=>"0",
		'buttons'=>"1",
			'prev'=>"",
			'next'=>"",
			'title_prev'=>"anterior",
			'title_next'=>"siguiente",			
		);	
					
foreach($object['p']['ids'] as $ii=>$ID){				
	/*
	$grupo=fila('nombre,id','banners_fotos',"where $ID and  visibilidad='1' $filtro_where ",0);
	if(!$grupo){ continue; }
	$oGrupo['header']=$grupo;
	*/
	$oGrupo['items']= select(
			"id,file,fecha_creacion,url,nombre"
			,"banner_servicios_fotos"
			,"where 1 and visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
				'foto:url'=>'{url}',
				'foto:atributos'=>array('atributos'=>'banser_imas,{fecha_creacion},{file},'.$object['p']['t'].','.$object['p']['w'].'x'.$object['p']['h'].',1'),
				//'foto:atributos'=>array('atributos'=>'banfot_imas,{fecha_creacion},{file},2,223x118,1'),
				'esquema'=>'nombre,foto'
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
	
	$object['panel']='banner_servicios_fotos';
	
	$OBJECT[$PARAMS['this']]=$object;
	
	$REMOOZZ=1;	
	//$SEXYLIGHTBOX=1;
		
?>