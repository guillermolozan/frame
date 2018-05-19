<?php

$routes_return = [];


$productos_items=select("url,id","productos_items","");
foreach($productos_items as $item)
{
	$routes_return['/'.$item['url'].'.html'.'$']='controller=Servicios&method=detail&level=producto&item='.$item['id'];
}
// prin($routes_return);



// $routes_pages	= get_valores("id","url","paginas");
$routes_grouppages   = get_valores("id","url","paginas_groups","where url not in ('email-marketing')");

$routes_grouppages[] ='pagina';

$routes_pages	= get_valores("id","url","paginas");

// $routes_galleries	=['distinciones','certificaciones','galeria-fotos','galeria-videos'];


$routes_group['Servicios']   = get_valores("id","url","productos_grupos","where 1",0);

// prin($routes_group['Servicios']);


$routes_lists = [
	[
		'grid'       =>'galerias-fotos',
		'detail'     =>'galeria-fotos',
		'controller' =>'Photos',
	],	
	[
		'grid'       =>'videos',
		'detail'     =>'galeria-videos',
		'controller' =>'Videos',
	],

	// [
	// 	'grid'       =>'productos',
	// 	'detail'     =>'producto',
	// 	'controller' =>'PagesPhotos',
	// ]
];

$routes_forms =['contactenos'];



/*********************************************************************************/





$routes_return=array_merge($routes_return,[

	//home
	'/'. (($start['devel'])?$start['devel']:'') .'$'       	=> 'controller=Home&method=index',
		

	/* forms */
	'/(contactenos)$' 													=> 'controller=Forms&method=$1',

		
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


//lists
if(sizeof($routes_lists)>0)
	foreach($routes_lists as $rout){

		if($rout['grid'])		
		$routes_return=array_merge($routes_return,[
			
			// grid
			'/'.$rout['grid'].'$' 									=> 'controller='.$rout['controller'].'&method=grid',
			'/'.$rout['grid'].'-pag-(:num)$' 					=> 'controller='.$rout['controller'].'&method=grid&pag=$1',
		
			// grid by group
			'/'.$rout['grid'].'-(:any)/(:num)$' 				=> 'controller='.$rout['controller'].'&method=grid&item=$2',
			'/'.$rout['grid'].'-(:any)/(:num)/pag-(:num)$' 	=> 'controller='.$rout['controller'].'&method=grid&item=$2&pag=$3',
		]);

		if($rout['detail'])
		$routes_return=array_merge($routes_return,[

			// detail
			'/'.$rout['detail'].'$' 								=> 'controller='.$rout['controller'].'&method=detail',
			'/'.$rout['detail'].'-(:any)/(:num)$' 				=> 'controller='.$rout['controller'].'&method=detail&item=$2',
		]);

		if($rout['post'])
		$routes_return=array_merge($routes_return,[

			// post
			'/'.$rout['post'].'/(:num)$' 				=> 'controller='.$rout['controller'].'&method=post&item=$1',

		]);
	
	}




if(sizeof($routes_group['Servicios'])>0)
{
	//all
	$routes_return['/(productos|descuentos|importaciones)$'] 													='controller=Servicios&method=grid&level=$1';
	//grupo
	$routes_return['/('.implode("|",$routes_group['Servicios']).')$'] 									='controller=Servicios&method=grid&level=1&grup=$1';
	//categoría
	$routes_return['/('.implode("|",$routes_group['Servicios']).')/category-(:any)/(:num)$'] 		='controller=Servicios&method=grid&level=2&grup=$1&item=$3';
	//subcategoría
	$routes_return['/('.implode("|",$routes_group['Servicios']).')/sub-category-(:any)/(:num)$'] ='controller=Servicios&method=grid&level=3&grup=$1&item=$3';
	//detail
	$routes_return['/(producto|descuento|importado)/(:any)/(:num)$'] 										='controller=Servicios&method=detail&level=$1&item=$3';

}




return $routes_return;

