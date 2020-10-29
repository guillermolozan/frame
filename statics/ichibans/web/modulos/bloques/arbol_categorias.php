<?php //á

$object=array();
$tri=array();

$grupos=select("id,nombre","textos_grupos","");

foreach($grupos as $gru){

	
	list($tri,$tren)=get_data_tree(
						$_GET,
						array('grupos'=>'grupos','subgrupos'=>'subgrupos')
					  );
				  

	$niveles=array(
				//array('productos_grupos','menu_nivel_1','grupos','grupos',"1"),
				array('textos_items','menu_nivel_1','textos_items','',"id_grupo='".$gru['id']."'",'modulo=items&tab=textos_items&acc=file&id={id}&friendly={nombre}'),
				//array('productos_subfiltros','menu_nivel_3','subgrupos','subfiltros',"id_filtro='[id]'"),
			 );

	$object['header']['nombre']=$gru['nombre'];
		 
	$object['menu']=get_arboles($niveles,0,NULL,0);

	$oo[]=$object;

}

$OBJECT[$PARAMS['this']]=$oo;

?>