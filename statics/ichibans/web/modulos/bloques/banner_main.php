<?php //á

$object=array();

$object['p']=array(
			'ids'=>array('2'),
			't'=>'3','w'=>'930','h'=>'298',
			);

$object['settings']=array(
		'label'=>$PARAMS['conector'],	
		'width'	=>$object['p']['w']*1,
		'height'=>$object['p']['h'],
		'itemsporpagina'=>"1x1",
		'vacio'=>"aún no hay fotos",
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
			"id,file,foto_descripcion,fecha_creacion,url"
			,"banners_fotos_fotos"
			,"where 1 and id_grupo='".$ID."' and  visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
				'foto:url'=>'{url}',
				'foto:atributos'=>array('atributos'=>'banfot_imas,{fecha_creacion},{file},'.$object['p']['t'].','.$object['p']['w'].'x'.$object['p']['h'].',1'),
				'esquema'=>'foto'
				)							  
			);	
			
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