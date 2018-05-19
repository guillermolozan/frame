<?php //á



/*BLOQUE NOVEDADES*/



	$HEAD['INCLUDES']['style'][]='#bloque_ofertas_elemento_0 { float:left;margin:0px 0px 0px 2px;  }';

	

	$NOOB=array(

			'label'=>'ofertas',	

			'width'=>"235",

			'height'=>"376",

			'itemsporpagina'=>"2x3",

			'vacio'=>"aún no hay novedades",

			'titulo'=>"",	

			'autoplay'=>"false",//[true,false]

			'mode'=>"horizontal", //[horizontal,vertical]	

			'buttons'=>"1"

			);

	

	$NOOB['items'] = select(

		"id,nombre,Oferta,file,fecha_creacion",

		"productos_items",

		"where 1 and  visibilidad='1' and Oferta='Si' order by id asc limit 0,100"

		,0

		,array(

				'nom'=>array('url_encode_seo'=>array(

											'string'=>'{nombre}'

											)

										)		

				,'nombre'=>array('ucwords'=>array(

											'string'=>'{nombre}'

											)

										)			

				,'link'=>array('procesar_url'=>array(

											'url'=>'index.php?modulo=pagina-item&tab=productos&id={nom}'

											)	

										)		

		)

    );



	$NOODSLICE['ofertas']=web_render_slider_preproceso($NOOB);

				

?>