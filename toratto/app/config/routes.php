<?php


// $routes_pages	= get_valores("id","url","paginas");
$routes_grouppages   = get_valores("id","url","paginas_groups","where url not in ('email-marketing')");

$routes_grouppages[] ='pagina';
// prin($routes_grouppages);


//email_marketing
$routes_grouppages_em   = get_valores("id","url","paginas_groups","where url='email-marketing'");
// prin($routes_grouppages_em);


// $routes_galleries	=['distinciones','certificaciones','galeria-fotos','galeria-videos'];


$routes_lists = [
	// [
	// 	'grid'       =>'galerias-fotos',
	// 	'detail'     =>'galeria-fotos',
	// 	'controller' =>'Photos',
	// ],
	// [
	// 	'grid'       =>'galerias-videos',
	// 	'detail'     =>'galeria-videos',
	// 	'controller' =>'Videos',
	// ],
	[
		'grid'       =>'proyectos-entregados',
		// 'detail'     =>'proyecto-entregado',
		'controller' =>'Projects',
		'pipe'		 =>'/'
	],
	[
		// 'grid'       =>'proyectos-en-venta',
		'detail'     =>'proyectos-en-venta/',
		'controller' =>'Projects',
		'pipe'		 =>'/'
	],
	[
		'grid'       =>'avances-de-obra',
		// 'group'      =>'avances-de-obra-',
		'detail'     =>'avances-de-obra/',
		'controller' =>'News',
		'pipe'		 =>'/'
	],	
];


$routes_forms =['contactenos','vende-tu-terreno','post-venta','recomiendanos'];



/*********************************************************************************/



$routes_return = [];


$routes_return=array_merge($routes_return,[

	//home
	'/'. (($start['devel'])?$start['devel']:'') .'$'       	=> 'controller=Home&method=index',
		
]);



//forms
if(sizeof($routes_forms)>0)
	$routes_return['/('.implode("|",$routes_forms).')$'] 		='controller=Forms&method=$1';



//pages
if(sizeof($routes_pages)>0)
	$routes_return['/('.implode("|",$routes_pages).')$'] 		='controller=Pages&item=$1';



//pages
if(sizeof($routes_grouppages)>0){
	$routes_return['/('.implode("|",$routes_grouppages).')/(:any)/(:num)$'] 		='controller=Pages&item=$3';
}


//email marketing
if(sizeof($routes_grouppages_em)>0){
	$routes_return['/('.implode("|",$routes_grouppages_em).')/(:any)/(:num)$'] 		='controller=Emails&item=$3';
}


//galleries
// if(sizeof($routes_galleries)>0)
	// $routes_return['/('.implode("|",$routes_galleries).')$'] 	='controller=Galleries&item=$1';



//lists
if(sizeof($routes_lists)>0)
	foreach($routes_lists as $rout){
		
		$pipe=($rout['pipe'])?$rout['pipe']:'-';

		if($rout['grid'])
		$routes_return=array_merge($routes_return,[

			// grid
			'/'.$rout['grid'].'$' 									=> 'controller='.$rout['controller'].'&method=grid',
			'/'.$rout['grid'].$pipe.'pag-(:num)$' 					=> 'controller='.$rout['controller'].'&method=grid&pag=$1',
		

		]);

		if($rout['group'])
		$routes_return=array_merge($routes_return,[
			
			// grid by group
			'/'.$rout['group'].'(:any)/(:num)$' 				=> 'controller='.$rout['controller'].'&method=grid&item=$2',
			'/'.$rout['group'].'(:any)/(:num)/pag-(:num)$' 	=> 'controller='.$rout['controller'].'&method=grid&item=$2&pag=$3',

		]);	

		if($rout['detail'])
		$routes_return=array_merge($routes_return,[

			// detail
			// '/'.$rout['detail'].'$' 								=> 'controller='.$rout['controller'].'&method=detail',
			'/'.$rout['detail'].'(:any)/(:num)$' 				=> 'controller='.$rout['controller'].'&method=detail&item=$2',

		]);


	}


/*
$routes_return=array_merge($routes_return,[
	'/promocion_de_diseno_de_paginas_web.html'=>'301:email-marketing/promocion-de-diseño-de-pagina-web/52',
]);
*/

return $routes_return;

