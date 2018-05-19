<?php //á

/*BLOQUE VIDEOS*/

	$HEAD['INCLUDES']['style'][]='#bloque_videos_elemento_0 { float:left;margin:0px 0px 0px 0px;  }';
	
	/*especial*/
	$HEAD['INCLUDES']['style'][]='	
	#ver_video_eventos_embed { position:absolute; left:21px; top:53px; background-color:#000000;	}
	#ver_video_titulo {	position:absolute; left:25px; top:25px; width:280px; text-align:center; font-weight:bold; }
	a#ver_video_cerrar{ 	position:absolute; right:21px; top:332px; display:none;	}
	';	
	
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
			
?>