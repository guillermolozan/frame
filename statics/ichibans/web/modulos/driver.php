<?php //á

/**********************************************/
//////////////////  BLOQUES  ///////////////////
/**********************************************/	

$Block['header']=array(array(
						//"common/header_pre.php",
						"common/header.php",
						"common/header_menus.php",
					  ));
					  
$Block['footer']=array(array(
						"common/footer.php",
					  ));					  

$Block['bar_izquierda']=array(
						// "bloques/arbol_categorias.php",
						// "bloques/banner_escudos.php",
						"bloques/izquierda_videos.php",						
						"bloques/publicidad_fotos.php",
					  );
					  
$Block['bar_derecha']=array(
						"bloques/publicidad_fotos.php",
					  );
					  
$Block['bar_home']=array(
					 "bloques/blog.php",
					 array(
					 	"bloques/link_boletin.php",
						"bloques/recomendar.php",
						"bloques/link_facebook.php",
					 ),
					 "bloques/menu_contenidos.php",
					);
	
/**********************************************/
//////////////////  MODULOS  ///////////////////
/**********************************************/	


$Estructura['modulo=app&tab=home']=
array(
		'header'=>$Block['header'],
		"bloques/banner_main.php",
		array(
			"bloques/banner_columna.php",
			"bloques/izquierda_videos.php",						
			"bloques/publicidad_fotos.php",	
			"bloques/recomendar.php",		
			array(
			// "MAIN?classStyle=pages"
			),
			//	$Block['bar_derecha']
		),
		'footer'=>$Block['footer'],			
 );



/*
$Estructura['modulo=app&tab=carrito']=
array(
		'header'=>$Block['header'],
		array(
			array(
			"bloques/arbol_categorias.php",
			),
			"MAIN",		
		),
		'footer'=>$Block['footer'],			
 ); 
*/
$Estructura['modulo=app&tab=pages']=
array(
	'header'=>$Block['header'],
	 array(
		array(
			"bloques/arbol_categorias.php",	
			// "bloques/banner_escudos.php"
		),
		//array(
			array(
				"MAIN",	 
				  )
			//  )
		//$Block['bar_derecha'],		
		),
	'footer'=>$Block['footer'],			
);
/*
/*
$Estructura['modulo=items&tab=productos&acc=file']=
array(
	'header'=>$Block['header'],
	array(
		array(
		"bloques/bloque_carrito.php?this=carrito",		
		"bloques/arbol_categorias.php?conector=productos",		
		),
		"MAIN",
		),
	'footer'=>$Block['footer'],			
);
*/
/*
$Estructura['modulo=items&tab=productos_imprimir&acc=file']=
array(
		//"common/header_imprimir.php",
		"MAIN",
		//"common/footer_imprimir.php",
);
$Estructura['modulo=items&tab=productos&acc=list']=
array(
	'header'=>$Block['header'],
	array(
		array(
		"bloques/bloque_carrito.php?this=carrito",		
		"bloques/arbol_categorias.php?conector=productos",
		),
		array(
		"bloques/bloque_buscador.php",			
		"MAIN",
		)
		),
	'footer'=>$Block['footer'],			
);
*/
$Estructura['modulo=items&tab={textos_items,enlaces_items}']=
array(
	'header'=>$Block['header'],
	 array(
		array(
			"bloques/arbol_categorias.php",	
			// "bloques/banner_escudos.php"
		),
		//array(
			array("MAIN",
				 //  array(
					// //'250'=>"bloques/banner_escudos.php",
					// '250'=>"bloques/recomendar.php",
					// '201'=>"bloques/publicidad_fotos.php",
					// '220'=>"bloques/izquierda_videos.php",				  
					//  )
					 
				  )
			//  )
		//$Block['bar_derecha'],		
		),
	'footer'=>$Block['footer'],			
);
/*
$Estructura['modulo=items&tab={blog_noticias,blog_actividades,blog_fotos,blog_videos}']=
array(
	'header'=>$Block['header'],
	 array(
		"bloques/menu_blog.php",
		"MAIN",
		),
	'footer'=>$Block['footer'],			
);
*/
$Estructura['modulo=formularios&tab={contacto,boletin,login,registro,recordar_clave}']=
array(
	'header'=>$Block['header'],
	 array(
		array(
			"bloques/arbol_categorias.php",	
			// "bloques/banner_escudos.php"
		),
		//array(
			array("MAIN",
				 //  array(
					// //'250'=>"bloques/banner_escudos.php",
					// '250'=>"bloques/recomendar.php",
					// '201'=>"bloques/publicidad_fotos.php",
					// '220'=>"bloques/izquierda_videos.php",				  
					//  )
					 
				  )
			//  )
		//$Block['bar_derecha'],		
		),
	'footer'=>$Block['footer'],			
);


$Estructura['modulo=items&tab=products_fotos']=
array(
	'header'=>$Block['header'],	
//	"bloques/print_marquesina.php",
	 array(
		'bloques/menu_products.php?classStyle=arbol_categorias',		//
		"MAIN?classStyle=pages",						//panel:textos_items
		//$Block['bar_derecha'],		//
		),
	'footer'=>$Block['footer'],
);


/*
$Estructura['modulo=formularios&tab=pedido']=
array(
	'header'=>$Block['header'],
	 array(
	 	array(
		//"bloques/bloque_carrito.php?this=carrito",		
		"bloques/arbol_categorias.php?conector=productos",
		),
		"MAIN",
		$Block['bar_derecha'],
		),
	'footer'=>$Block['footer'],			
);
*/
$Estructura['modulo=error&tab=404']
=array(
	'header'=>$Block['header'],
	"MAIN",
	'footer'=>$Block['footer'],	
);				


?>