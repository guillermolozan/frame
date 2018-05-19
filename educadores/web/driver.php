<?php //á

/**********************************************/
////////////////////  BARS  ////////////////////
/**********************************************/	

$Block['header']=array(array(
		"common/header.php",
		"common/header_menu.php",
	  ));  
	  
$Block['footer']=array(array(
		"common/footer.php",
	  ));	  

$Block['bar_izquierda']=array(
		// "bloques/print_titulo.php",//
		
		// "bloques/arbol_0.php",//		

		// "bloques/print_documentos.php",//		

		//"bloques/documentos.php?page=1",//		
		"bloques/arbol_1.php?page=1",//		

		//"bloques/arbol_documentos.php?page=1",//
		// "bloques/arbol_departamentos.php",//
		"bloques/arbol_blog.php?page=1",//
		"bloques/menu_obras.php",

		// "bloques/banner_departamentos.php",//
		// "bloques/banner_publicidad_1.php?page=1",//
		// "bloques/banner_publicidad_2.php?page=1",//
		"bloques/print_novedades.php",//		
		"bloques/form_recomendar.php?conector=recomendar",//V[x]		
		// "bloques/print_redes_sociales.php",//V[x]		
		"bloques/izquierda_facebook.php",//		
	  );

$Block['bar_derecha']=array(
		//"bloques/banner_publicaciones.php?page=1",//L[]V[]				//panel:textos_grupos,textos_subgrupos,textos_items; ( id=centro_informativo)
		"bloques/alcalde.php",//V[x]			
		"bloques/agenda.php",//V[x]			

		// "bloques/arbol_y.php",//		
		// "bloques/banner_escudos.php",//V[x]			
		// "bloques/banner_publicidad_3.php?page=1",//L[]V[x]	//panel:banners_fotos,banners_fotos_fotos; medidas:(4:67x57);
		// "bloques/banner_publicidad_4.php?page=1",//L[]V[x]	//panel:banners_fotos,banners_fotos_fotos; medidas:(5:202x91);
		"bloques/bloq_enlaces.php",//V[x]			
		"bloques/bloq_centro.php",//V[x]			
		"bloques/banner_enlaces.php?page=1",//V[x]			

	  );					  

$Block['bar_home']=array(
		"bloques/news_menu.php?page=1",//L[]V[]				//panel:textos_grupos,textos_subgrupos,textos_items; ( id=centro_informativo)
		"items/news0_items_list.php",//L[]V[]				//panel:textos_grupos,textos_subgrupos,textos_items; ( id=centro_informativo)		
		"items/news_items_list.php",//L[]V[]				//panel:textos_grupos,textos_subgrupos,textos_items; ( id=centro_informativo)		
	  );
	
/**********************************************/
//////////////////  MODULOS  ///////////////////
/**********************************************/	



$Estructura['modulo=app&tab=home']=
array(
	'header'=>$Block['header'],	
	array(
	 	"bloques/banner_main.php",//L[x]V[x]	//panel:banners_fotos,banners_fotos_fotos; medidas:(3:484x174)
	 ),	
	array(
		$Block['bar_izquierda'],//
		array_merge(
			array(
				"MAIN",//L[x]V[x]			//panel:paginas(id=bienvenido)
			),
			$Block['bar_home']	//
		),
		$Block['bar_derecha'],	//
		),
	'footer'=>$Block['footer'],			
);

$Estructura['modulo=app&tab=transparencia']=
array(
	'header'=>$Block['header'],	
	array(
		"MAIN",//L[x]V[x]			//panel:paginas(id=bienvenido)
		),
	'footer'=>$Block['footer'],			
);

$Estructura['modulo=app&tab={stats_consultas,stats_convenios}']=
array(
	'header'=>$Block['header'],	
//	// "bloques/print_marquesina.php",
	array(
		$Block['bar_izquierda'],	//
		"MAIN?classStyle=pages",//L[x]V[x]						//panel:paginas(id=$_GET[PAGE])
		//$Block['bar_derecha'],		//
		),
	'footer'=>$Block['footer'],			
);
$Estructura['modulo=items&tab={publicaciones3_items,publicaciones3_items}']=
array(
	'header'=>$Block['header'],	
//	"bloques/print_marquesina.php",
	 array(
		$Block['bar_izquierda'],//
		"MAIN?classStyle=pages",						//panel:textos_items
		//$Block['bar_derecha'],		//
		),
	'footer'=>$Block['footer'],				
);
$Estructura['modulo=app&tab=pages']=
array(
	'header'=>$Block['header'],	
//	"bloques/print_marquesina.php",
	array(
		$Block['bar_izquierda'],	//
		"MAIN",//L[x]V[x]						//panel:paginas(id=$_GET[PAGE])
		$Block['bar_derecha'],		//
		),
	'footer'=>$Block['footer'],			
);
/*
$Estructura['modulo=app&tab={seguimiento_envios,programe_sus_recojos,herramientas,intranet}']=
array(
	'header'=>$Block['header'],	
	array(
		$Block['bar_izquierda'],	//
		"MAIN?classStyle=pages",//L[x]V[x]						//panel:paginas(id=$_GET[PAGE])
		$Block['bar_derecha'],		//
		),
	'footer'=>$Block['footer'],			
);

$Estructura['modulo=items&tab=textos_items']=
array(
	'header'=>$Block['header'],	
	 array(
		array(
		"bloques/arbol_1.php",
		"bloques/publicidad_fotos.php",//L[x]V[x]	//panel:banners_fotos,banners_fotos_fotos; medidas:(2:223x118);
		"bloques/recomendar.php",//L[x]V[]			//panel:recomendar
		"bloques/link_facebook.php",//V[x]		
		),//L[]V[]				//panel:textos_grupos,textos_subgrupos,textos_items; ( id!=centro_informativo) 
		"MAIN",						//panel:textos_items
		$Block['bar_derecha'],		//
		),
	'footer'=>$Block['footer'],			
);
$Estructura['modulo=items&tab=textos_items2']=
array(
	'header'=>$Block['header'],	
	 array(
		"bloques/arbol_1.php",//L[]V[]				//panel:textos_grupos,textos_subgrupos,textos_items; ( id!=centro_informativo) 
		"MAIN",						//panel:textos_items
		$Block['bar_derecha'],		//
		),
	'footer'=>$Block['footer'],				
);
*/



$Estructura['modulo=items&tab={blog_noticias,blog_actividades,blog_fotos,blog_videos}']=
array(
	'header'=>$Block['header'],	
//	"bloques/print_marquesina.php",
	 array(
		array(		
			// "bloques/print_titulo.php",
			"bloques/menu_blog.php",
		),	
		"MAIN",						//panel:blog_noticias,blog_actividades,blog_fotos,blog_fotos_fotos,blog_videos,blog,videos_videos
		$Block['bar_derecha'],		//
		),
	'footer'=>$Block['footer'],				
);

$Estructura['modulo=items&tab=obras_fotos']=
array(
	'header'=>$Block['header'],	
//	"bloques/print_marquesina.php",
	 array(
		array(		
			// "bloques/print_titulo.php",
			"bloques/menu_blog.php",
		),	
		"MAIN",						//panel:blog_noticias,blog_actividades,blog_fotos,blog_fotos_fotos,blog_videos,blog,videos_videos
		$Block['bar_derecha'],		//
		),
	'footer'=>$Block['footer'],				
);

$Estructura['modulo=items&tab={textos_items,publicaciones_items,faq_items}']=
array(
	'header'=>$Block['header'],	
//	"bloques/print_marquesina.php",
	 array(
		$Block['bar_izquierda'],//
		"MAIN?classStyle=pages",						//panel:textos_items
		$Block['bar_derecha'],		//
		),
	'footer'=>$Block['footer'],				
);

$Estructura['modulo=items&tab={documentos_items,documentos_grupos}']=
array(
	'header'=>$Block['header'],	
//	"bloques/print_marquesina.php",
	 array(
		$Block['bar_izquierda'],//
		"MAIN?classStyle=pages",						//panel:textos_items
		$Block['bar_derecha'],		//
		),
	'footer'=>$Block['footer'],				
);

$Estructura['modulo=items&tab=news_items']=
array(
	'header'=>$Block['header'],	
//	"bloques/print_marquesina.php",
	 array(
		$Block['bar_izquierda'],//
		array(
		"bloques/news_menu.php",//L[]V[]				//panel:textos_grupos,textos_subgrupos,textos_items; ( id=centro_informativo)
		"items/news0_items_list.php",//L[]V[]				//panel:textos_grupos,textos_subgrupos,textos_items; ( id=centro_informativo)
		"MAIN?classStyle=pages",						//panel:textos_items
		),
		$Block['bar_derecha'],		//
		),
	'footer'=>$Block['footer'],				
);
$Estructura['modulo=formularios&tab={contacto,boletin,consultas}']=
array(
	'header'=>$Block['header'],	
	 array(
		$Block['bar_izquierda'],	//
		"MAIN",						//panel:contacto,boletin,reclutamiento,proveedores
		$Block['bar_derecha'],		//
		),
	'footer'=>$Block['footer'],				
);

$Estructura['modulo=error&tab=404']
=array(
	'header'=>$Block['header'],	
	"MAIN",							//
	'footer'=>$Block['footer'],		
);


if(!$_GET){ $_GET=array('modulo'=>'app','tab'=>'home'); }
if(!$_GET['sec']){ $_GET=array_merge(array('sec'=>'cgtp'),$_GET); }
if($_GET['tab']=='contactenos'){ $_GET['tab']='contacto'; }


include("particular.php");

?>