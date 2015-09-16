<?php

return [

	'name'	=>'Rinconcito Ayacuchano',

	'visitors' => true,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/rinconcito/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/rinconcito/panel/config/tablas.php",
	
		'static' =>"../rinconcito/public",
	
	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./rinconcito/public",

		// 'devel' =>"desarrollo",

	]

];