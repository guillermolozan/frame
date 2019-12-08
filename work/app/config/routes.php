<?php
$routes_return = [];


//home
if($start['devel']){

	$routes_return=array_merge($routes_return,[
		'/'. $start['devel'] .'$'       	=> 'controller=Home&method=index',
	]);

	if($start['comming']){
		$routes_return=array_merge($routes_return,[
			'/$'       							=> 'controller=Controller&method=comming',
		]);	
	}

} else {

	$routes_return=array_merge($routes_return,[
		'/$'       							=> 'controller=Home&method=index',
	]);
	
}


return $routes_return;