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
		'itemsporpagina'=>"1x4",
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

	// $grupo=fila('nombre,id','centro_grupos',"where $ID $filtro_where ",0);
	$oGrupo['header']='Centro Informativo';
	
	$oGrupo['items']= select(
			array(
				'id',
				'nombre as titulo',
				'fecha_creacion',
				'foto as file',
				)
			,"centro_grupos"
			,"where 1 and  visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
				'url'=>array('procesar_url'=>array('url'=>"index.php?".$filtro_param."modulo=items&tab=centro_grupos&acc=file&id_grupo={id}&friendly={titulo}")),
				'foto:atributos'=>array('atributos'=>'ceninf_imas,{fecha_creacion},{file},'.$object['p']['t'].',39x33'),
				//'foto:atributos'=>array('atributos'=>'banfot_imas,{fecha_creacion},{file},2,223x118,1'),
				'esquema'=>'foto,titulo'	
			) 

	);
	// var_dump($oGrupo['items']);
			
	// prin($oGrupo['items']);
	
	$oGrupo=web_render_Slider_PreProceso2(array_merge($object['settings'],array(
												'label'=>$object['settings']['label']."_".$ii,
												'titulo'=>$item['nombre']
												//'interval'=>'7000',
												)),$oGrupo);

	$oGrupos[]=$oGrupo; unset($oGrupo);
	
}
		
	$object=array('items'=>$oGrupos); unset($oGrupos);
	
	$object['panel']='centro_grupos';

	$OBJECT[$PARAMS['this']]=$object;
	
	$REMOOZZ=1;	
	//$SEXYLIGHTBOX=1;
		
