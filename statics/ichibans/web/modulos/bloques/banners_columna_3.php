<?php //á

$object=array();

$object['p']=array(
			'ids'=>array('6','7'),
			't'=>'6','w'=>'202','h'=>'61',
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
		//'buttons'=>"1",
		);	
					
foreach($object['p']['ids'] as $ii=>$ID){				

	//$oGrupo['header']=select_fila('nombre','banners_fotos',"where id='".$ID."'");
	
	$oGrupo['items']= select(
			"id,file,fecha_creacion,url"
			,"banners_fotos_fotos"
			,"where 1 and id_grupo ='".$ID."' and  visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
				'foto:url'=>'{url}',
				'foto:atributos'=>array('atributos'=>'banfot_imas,{fecha_creacion},{file},'.$object['p']['t'].','.$object['p']['w'].'x'.$object['p']['h'].',1'),
				//'foto:atributos'=>array('atributos'=>'banfot_imas,{fecha_creacion},{file},2,223x118,1'),
				'esquema'=>'foto'
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
	
	$object['panel']='banners_fotos,banners_fotos_fotos';

	$OBJECT[$PARAMS['this']]=$object;
	
	$REMOOZZ=1;	
	//$SEXYLIGHTBOX=1;
		
?>