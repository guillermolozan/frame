<?php


// $routes_pages	= get_valores("id","url","paginas");
$routes_grouppages   = get_valores("id","url","paginas_groups","where 1");
// prin($routes_grouppages);

$routes_grouppages[] ='pagina';

// $routes_galleries	=['distinciones','certificaciones','galeria-fotos','galeria-videos'];


$routes_lists = [
	[
		'grid'       =>'galerias-fotos',
		'detail'     =>'galeria-fotos',
		'controller' =>'Photos',
	],
	// [
	// 	'grid'       =>'galerias-videos',
	// 	'detail'     =>'galeria-videos',
	// 	'controller' =>'Videos',
	// ],
	// [
	// 	'grid'       =>'productos',
	// 	'detail'     =>'producto',
	// 	'controller' =>'PagesPhotos',
	// ],
	// [
	// 	'list'       =>'noticias',
	// 	'detail'     =>'noticia',
	// 	'controller' =>'News',
	// ],	
];

$routes_forms =['contactenos'];



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



//galleries
// if(sizeof($routes_galleries)>0)
	// $routes_return['/('.implode("|",$routes_galleries).')$'] 	='controller=Galleries&item=$1';



//lists
if(sizeof($routes_lists)>0)
	foreach($routes_lists as $rout){
		$routes_return=array_merge($routes_return,[
			
			// grid
			'/'.$rout['grid'].'$' 									=> 'controller='.$rout['controller'].'&method=grid',
			'/'.$rout['grid'].'-pag-(:num)$' 					=> 'controller='.$rout['controller'].'&method=grid&pag=$1',
			
			// grid by group
			'/'.$rout['grid'].'-(:any)/(:num)$' 				=> 'controller='.$rout['controller'].'&method=grid&item=$2',
			'/'.$rout['grid'].'-(:any)/(:num)/pag-(:num)$' 	=> 'controller='.$rout['controller'].'&method=grid&item=$2&pag=$3',

			// detail
			'/'.$rout['detail'].'$' 								=> 'controller='.$rout['controller'].'&method=detail',
			'/'.$rout['detail'].'-(:any)/(:num)$' 				=> 'controller='.$rout['controller'].'&method=detail&item=$2',

		]);
	}



return $routes_return;

