<?php

$routes_return=[];

if(0){

	// ITEMS
	$productos_items=get_valores("id","url","productos_items");
	foreach($productos_items as $ii=>$url)
	{
		$routes_return['/'.$url.'.html'.'$']='controller=Servicios&method=detail&level=producto&item='.$ii;
	}

	// ITEMS OFERTAS
	$productos_items=get_valores("id","url","productos_items_descu");
	foreach($productos_items as $ii=>$url)
	{
		$routes_return['/oferta-'.$url.'.html'.'$']='controller=Servicios&method=detail&level=descuento&item='.$ii;
	}

}

// PAGES
$pages_items=get_valores("id","url","paginas");
foreach($pages_items as $ii=>$url)
{
	$routes_return['/'.$url.'.html'.'$']='controller=Pages&item='.$ii;
}



// $routes_pages	= get_valores("id","url","paginas");
$routes_grouppages   = get_valores("id","url","paginas_groups","where url!='' ");

$routes_grouppages[] ='pagina';

$routes_pages	= get_valores("id","url","paginas","where url!='' ");

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
		'grid'       =>'trabajos-realizados',
		'detail'     =>'galeria-videos',
		'controller' =>'Videos',
	],
	[
		'grid'       =>'videos-tutoriales',
		'detail'     =>'galeria-videos2',
		'controller' =>'Videos',
	],	
	// [
	// 	'grid'       =>'productos',
	// 	'detail'     =>'producto',
	// 	'controller' =>'PagesPhotos',
	// ]
	[
		'grid'       =>'posts',
		'detail'     =>'post',
		'controller' =>'Posts',
		'pipe'		 =>'/'
	],

	[
		'grid'       =>'servicios',
		'detail'     =>'servicio',
		'controller' =>'Products',
	],

];

$routes_forms =['contactenos','suscribete'];



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
	$routes_return['/('.implode("|",$routes_grouppages).')/(:any)/(:num)$'] ='controller=Pages&item=$3';
	$routes_return['/('.implode("|",$routes_grouppages).')$'] 		='controller=Pages&method=grid&item=$1';
}


//lists
if(sizeof($routes_lists)>0)
	foreach($routes_lists as $rout){

		if($rout['grid'])		
		$routes_return=array_merge($routes_return,[
			
			// grid
			'/'.$rout['grid'].'$' 							=> 'controller='.$rout['controller'].'&method=grid',
			'/'.$rout['grid'].'-pag-(:num)$' 				=> 'controller='.$rout['controller'].'&method=grid&pag=$1',
		
			// grid by group
			'/'.$rout['grid'].'-(:any)/(:num)$' 			=> 'controller='.$rout['controller'].'&method=grid&item=$2',
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
	$routes_return['/(productos1|productos2|descuentos|importaciones|productos)$'] 													='controller=Servicios&method=grid&level=$1';
	//grupo
	$routes_return['/('.implode("|",$routes_group['Servicios']).')$'] 									='controller=Servicios&method=grid&level=1&grup=$1';
	//categoría
	$routes_return['/('.implode("|",$routes_group['Servicios']).')/category-(:any)/(:num)$'] 		='controller=Servicios&method=grid&level=2&grup=$1&item=$3';
	//subcategoría
	$routes_return['/('.implode("|",$routes_group['Servicios']).')/sub-category-(:any)/(:num)$'] ='controller=Servicios&method=grid&level=3&grup=$1&item=$3';
	//detail
	$routes_return['/(producto1|producto2|descuento|importado)/(:any)/(:num)$'] 										='controller=Servicios&method=detail&level=$1&item=$3';

}


return $routes_return;