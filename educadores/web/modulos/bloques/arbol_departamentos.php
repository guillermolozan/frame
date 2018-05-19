<?php //á

$object=array();

$secc=$SECCIONES[$_GET['sec']];
$secc=array();
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];

$object['p']=array(
			'ids'=>array(" 1 $filtro_where "),
			't'=>'2','w'=>'202','h'=>'88',
			);
			

					
foreach($object['p']['ids'] as $ii=>$ID){				
	
	/*
	$grupo=fila('nombre,id','banners_fotos',"where $ID and  visibilidad='1' $filtro_where ",0);
	if(!$grupo){ continue; }
	*/
	
	//$oGrupo['header']=$grupo;
	
	$oGrupo['items']= select(
			"id,file,fecha_creacion,url"
			,"banner_departamentos_fotos"
			,"where $ID and  visibilidad='1' order by id asc limit 0,3"
			,0
			,array(
				'foto:url'=>'{url}',
				'foto:atributos'=>array('atributos'=>'bandep_imas,{fecha_creacion},{file},'.$object['p']['t'].','.$object['p']['w'].'x'.$object['p']['h'].',1'),
				//'foto:atributos'=>array('atributos'=>'banfot_imas,{fecha_creacion},{file},2,223x118,1'),
				'esquema'=>'foto'
				)	  
			);										
												
	$oGrupos[]=$oGrupo; unset($oGrupo);
	
}
		

	$object=array('items'=>$oGrupos); unset($oGrupos);
	
	$object['panel']='banner_departamentos_fotos';
	
	$OBJECT[$PARAMS['this']]=$object;
	
	//$REMOOZZ=1;	
	//$SEXYLIGHTBOX=1;
		
?>