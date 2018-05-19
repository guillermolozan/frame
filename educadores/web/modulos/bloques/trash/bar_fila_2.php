<?php //á


/*ESQUINAS*/

$HEAD['INCLUDES']['css'][]='css/bloques/bloque_cuadro_5/css.css';


/*BARRAS FILA 2*/

	/*BLOQUES*/
	
	$HEAD['INCLUDES']['style'][]='#bloque_recomendar .div_borde ,#bloque_videos .div_borde ,#bloque_ofertas .div_borde{ min-height: 379px; height:auto !important; height:379px; }';
	$HEAD['INCLUDES']['style'][]='#bloque_recomendar { width:245px; }';
	$HEAD['INCLUDES']['style'][]='#bloque_videos { width:342px; }';
	$HEAD['INCLUDES']['style'][]='#bloque_ofertas { width:250px; }';

	
/*FORMULARIOS*/	

	/*recomendar*/
	
		include("formularios/formularios.php");

	
/*BLOQUE VIDEOS*/

	$HEAD['INCLUDES']['style'][]='#bloque_videos_elemento_0 { float:left;margin:0px 0px 0px 0px;  }';

	
	$NOOB=array(
			'label'=>'videos',	
			'width'=>"337",
			'height'=>"376",
			'itemsporpagina'=>"1x3",
			'vacio'=>"aún no hay videos",
			'titulo'=>"",	
			'autoplay'=>"false",//[true,false]
			'mode'=>"horizontal", //[horizontal,vertical]	
			'buttons'=>"1"
			);
	
	$NOOB['items'] = select(
			"id,codigo,titulo,fecha,fecha_creacion",
			"videos",
			"where 1 and  visibilidad='1' order by id asc limit 0,100"
			,0
    );

	$NOODSLICE['videos']=web_render_slider_preproceso($NOOB);
		

/*BLOQUE OFERTAS*/

	$HEAD['INCLUDES']['style'][]='#bloque_ofertas_elemento_0 { float:left;margin:0px 0px 0px 2px;  }';
	
	$NOOB=array(
			'label'=>'ofertas',	
			'width'=>"235",
			'height'=>"376",
			'itemsporpagina'=>"2x2",
			'vacio'=>"aún no hay ofertas",
			'titulo'=>"",	
			'autoplay'=>"false",//[true,false]
			'mode'=>"horizontal", //[horizontal,vertical]	
			'buttons'=>"1"
			);
	
	$NOOB['items'] = select(
		"id,nombre,nombre_it,tipo,marca,descripcion,composicion,tallas,colores,precio,precio_oferta,Oferta,id_grupo,file,fecha_creacion",
		"productos_items",
		"where 1 and  visibilidad='1' and Oferta='Si' order by id asc limit 0,100"
		,0
    );

	$NOODSLICE['ofertas']=web_render_slider_preproceso($NOOB);
		
	
	
?>