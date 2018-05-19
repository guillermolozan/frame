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
			't'=>'4','w'=>'192','h'=>'160',
			);
			
$object['settings']=array(
		'label'=>$PARAMS['conector'],	
		'width'	=>$object['p']['w'],
		'height'=>$object['p']['h'],
		'itemsporpagina'=>"1x1",
		'vacio'=>"aún no hay fotos",
		'titulo'=>"",	
		'interval'=>"7000",	
		'autoplay'=>"true",//[true,false]
		'mode'=>"horizontal", //[horizontal,vertical]	
		//'handles'=>"0",
		'buttons'=>"1",
		);	
					
foreach($object['p']['ids'] as $ii=>$ID){				

	// $grupo=fila('nombre,id','obras_fotos',"where $ID $filtro_where ",0);
	$oGrupo['header']='Obras';
	
	$oGrupo['items']= select(
			"id,nombre as titulo,fecha_creacion"
			,"obras_fotos2"
			,"where 1 and  visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
				'foto'=>array('foto'=>array(
								"id,file,fecha_creacion|obras_fotos2_fotos|where id_grupo='{id}' and visibilidad='1' order by id desc limit 0,1"
								,"obrfot2_imas"
								,array( 
										'get_atributos'=>$object['p']['t'].','.$object['p']['w'].'x120,1'
										)
							)
				),	
				'url'=>array('url'=>array("index.php?".$filtro_param."modulo=items&tab=obras_fotos2&acc=file&id={id}&friendly={nombre}")),
				//'foto:url'=>'{url}',
				'esquema'=>'titulo,foto',
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
	
	$object['panel']='obras_fotos2,obras_fotos2_fotos';

	$OBJECT[$PARAMS['this']]=$object;
	
	$REMOOZZ=1;	
	//$SEXYLIGHTBOX=1;
		
?>