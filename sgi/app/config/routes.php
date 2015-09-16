<?php

$routes_pages	= get_valores("id","url","paginas");

// $routes_galleries	=['distinciones','certificaciones','galeria-fotos','galeria-videos'];


$routes_lists = [
	[
		'grid'       =>'productos',
		'detail'     =>'producto',
		'controller' =>'PagesPhotos',
	]
];

$routes_forms =['contactenos'];



/*********************************************************************************/



$routes_temp = [];


$routes_temp=array_merge($routes_temp,[

	//home
	'/'. (($start['devel'])?$start['devel']:'') .'$'       	=> 'controller=Home&method=index',
		

	/* forms */
	'/(contactenos)$' 													=> 'controller=Forms&method=$1',

		
]);

//forms
if(sizeof($routes_forms)>0)
	$routes_temp['/('.implode("|",$routes_forms).')$'] 		='controller=Forms&method=$1';



//pages
if(sizeof($routes_pages)>0)
	$routes_temp['/('.implode("|",$routes_pages).')$'] 		='controller=Pages&item=$1';




//lists
if(sizeof($routes_lists)>0)
	foreach($routes_lists as $list){
		$routes_temp=array_merge($routes_temp,[
			
			// list
			'/'.$list['grid'].'$' 									=> 'controller='.$list['controller'].'&method=grid',
			'/'.$list['grid'].'/pag-(:num)$' 					=> 'controller='.$list['controller'].'&method=grid&pag=$1',
			
			// list by group
			'/'.$list['grid'].'-(:any)/(:num)$' 				=> 'controller='.$list['controller'].'&method=grid&item=$2',
			'/'.$list['grid'].'-(:any)/(:num)/pag-(:num)$' 	=> 'controller='.$list['controller'].'&method=grid&item=$2&pag=$3',

			// detail
			'/'.$list['detail'].'$' 								=> 'controller='.$list['controller'].'&method=detail',
			'/'.$list['detail'].'-(:any)/(:num)$' 				=> 'controller='.$list['controller'].'&method=detail&item=$2',

		]);
	}



return $routes_temp;

