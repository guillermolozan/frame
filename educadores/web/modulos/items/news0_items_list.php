<?php //á

$PARAMS['conector']='news_items';

$object=array();

$object['p']=array(
			'ids'=>array(''),
			't'=>'3','w'=>'502','h'=>'210',
			);

$object['settings']=array(
		'label'=>$PARAMS['conector'],	
		'width'	=>$object['p']['w']*1,
		'height'=>$object['p']['h'],
		'itemsporpagina'=>"1x1",
		'vacio'=>"",
		'titulo'=>"",	
		'interval'=>"7000",	
		'autoplay'=>"true",//[true,false]
		'mode'=>"horizontal", //[horizontal,vertical]	
		'handles'=>"1",
		'buttons'=>"0",
			'prev'=>"",
			'next'=>"",
			'title_prev'=>"anterior",
			'title_next'=>"siguiente",
		);	
					
foreach($object['p']['ids'] as $ii=>$ID){				

	//$oGrupo['header']=select_fila('nombre','banners_fotos',"where id='".$ID."'");
	$gxupos=select("id","productos_tipos","where visibilidad='1'");
	$Agxupo=array();
	foreach($gxupos as $gxupo){ $Agxupo[]=$gxupo['id']; } 

	$oGrupo['items']= select(
			"id,id_grupo,fecha,nombre,resumen as texto,fecha_creacion"
			,$PARAMS['conector']
			,"WHERE 1 AND  visibilidad='1' AND estructura='1'  AND page='1'   AND 1   ORDER BY fecha DESC"
			,0
			,array(
				'url'=>array('url'=>array("index.php?".$filtro_param."modulo=items&tab=".$PARAMS['conector']."&acc=file&id={id}&friendly={nombre}")),
				'fecha'=>array('fecha'=>array('{fecha}','1')),	
				'foto'=>array('foto'=>array(
												"id,file,fecha_creacion|news_fotos|where id_item='{id}' and visibilidad='1' order by id desc limit 0,1"
												,"newite_imas"
												,array( 
														'get_atributos'=>'3,241x137,1'
														//,'get_archivo'=>'2'
														)
												)
											), 
				'item'=>'foto,nombre?limit=100,fecha,texto?limit=250'
				)							  
			);	

	// prin($oGrupo['items']);
	// die();
			
	$oGrupo=web_render_Slider_PreProceso2(array_merge($object['settings'],array(
												'label'=>$object['settings']['label']."_".$ii,
												'titulo'=>$item['nombre']
												//'interval'=>'7000',
												)),$oGrupo);
												//prin($oGrupo['settings']);
	$oGrupos[]=$oGrupo; unset($oGrupo);
	
}


	$object=array('items'=>$oGrupos); unset($oGrupos);
	
	$object['panel']='productos_items,productos_fotos';

	//prin($object);
	
	$OBJECT[$PARAMS['this']]=$object;
	
	$REMOOZZ=1;	
	//$SEXYLIGHTBOX=1;		
?>