<?php

return [

	'name'	=>'Prodiserv',

	'slogan'	=>'Páginas web, alquiler dominio y hosting',

	'visitors'	=>true,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/prodiserv/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/prodiserv/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./prodiserv/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
