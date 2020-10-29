<?php //á

/*BLOQUE VIDEOS*/
 
	$items= select(
			"id,nombre,fecha_creacion"
			,"publicidad_videos"
			,"where 1 and  visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
				'sub_select'=>array('sub_select'=>array(
												 'campos'=>"id,id_grupo,titulo,codigo,descripcion,fecha_creacion,texto,url"
												,'tabla' =>"publicidad_videos_videos"
												,'donde' =>"where id_grupo='{id}' and visibilidad='1' order by id asc limit 0,100"
												,'debug' =>0
												,'opciones'=>array(
													'link'=>"#TB_inline?width=480&height=385&background=#000&inlineId=video_{id}"
													)
												)
											)      	    
		
				  )
			);
			
						
	$NOOB=array(
			'label'=>$PARAMS['conector'],	
			'width'=>"220",
			'height'=>"170",
			'itemsporpagina'=>"1x1",
			'vacio'=>"aún no hay videos",
			'titulo'=>"",	
			'autoplay'=>"false",//[true,false]
//			'interval'=>"5000",
			'mode'=>"horizontal", //[horizontal,vertical]	
			'buttons'=>"1"
			);

	$NOOB_S=array();	
	foreach($items as $ii=>$filas){
	
		$noobst=$NOOB;
		$noobst['label']=$NOOB['label'].'_'.$ii;
		$noobst['titulo']=$filas['nombre'];
		$noobst['items']=$filas['sub_select'];
		$NOOB_S[]=web_render_slider_preproceso($noobst);
		
		foreach($filas['sub_select'] as $item){ 
			if(is_numeric($item['codigo'])){
				
				web_render_swf_script("http://static.xvideos.com/swf/flv_player_site_v4.swf?id_video=".$item['codigo'],"video_".$item['id']."_inner","480x385");					
			
			}else{
			
				web_render_swf_script("http://www.youtube.com/v/".$item['codigo']."&amp;hl=es&amp;fs=1&amp;rel=0&amp;color1=0x3a3a3a&amp;color2=0x999999&amp;autoplay=1","video_".$item['id']."_inner","480x385");
			
			}
		}
		
	}
	

	$NOODSLICE[$PARAMS['conector']]=$NOOB_S;

	$REMOOZZ=1;
	
	$SEXYLIGHTBOX=1;
	
?>