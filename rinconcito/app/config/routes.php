<?php

$routes_pages	=implode("|",get_valores("id","pagina","paginas"));
// $routes_pages	='nosotros|servicios|restaurant|carta';


$routes_stores	=implode("|",get_valores("id","url","locales"));
// $routes_stores	='lince|losolivos|carapongo|otrolocal';


// $routes_blog	='noticias|comunicados|fotos|videos';

$temp = [];


$temp=array_merge($temp,[

	//home
	
		'/'. (($start['devel'])?$start['devel']:'') .'$'           => 'controller=Home&method=index',
		
	//carta	

		'/carta$'                => 'controller=Carta&method=index',



	/*
	//blog

		// detail
		'/('.$routes_blog.')/(:any)/(:num)$' => 'controller=Blog&method=$1&acc=file&id=$3&friendly=$2',

		// detail pag
		'/('.$routes_blog.')/(:any)/(:num)/pag-(:num)$' => 'controller=Blog&method=$1&acc=file&id=$3&friendly=$2&pag=$4',

		// list
		'/('.$routes_blog.')$' => 'controller=Blog&method=$1',

		// list pag
		'/('.$routes_blog.')/pag-(:num)$' => 'controller=Blog&method=$1&pag=$2',

		// list filter / val
		'/('.$routes_blog.')/(fecha)/(:any)/(:any)' => 'controller=Blog&method=$1&fil=$2&val=$3&friendly=$4',
	*/

	/* forms */
	'/(contactenos)$' => 'controller=Forms&method=$1',

		
]);

//pages

if(!empty($routes_pages))
	$temp=array_merge($temp,[

		'/('.$routes_pages.')$' => 'controller=Pages&page=$1',

	]);


//stores

if(!empty($routes_stores))
	$temp=array_merge($temp,[

		// home
			'/('.$routes_stores.')$' => 'controller=Store&method=index&store=$1',


		// //events
			'/('.$routes_stores.')/eventos$' => 'controller=Store&method=events&store=$1',

			'/('.$routes_stores.')/eventos/pag-(:num)$' => 'controller=Store&method=events&store=$1&pag=$2',


		// //gallery photos
			'/('.$routes_stores.')/fotos$' => 'controller=Store&method=photos&store=$1',

			'/('.$routes_stores.')/fotos$/pag-(:num)' => 'controller=Store&method=photos&store=$1&pag=$2',


		// //gallery videos
			'/('.$routes_stores.')/videos$' => 'controller=Store&method=videos&store=$1',

			'/('.$routes_stores.')/videos$/pag-(:num)' => 'controller=Store&method=videos&store=$1&pag=$2',
			

		// //map
			'/('.$routes_stores.')/map$' => 'controller=Store&method=map&store=$1',

	]);


return $temp;

