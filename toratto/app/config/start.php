<?php

return [

	'name'	=>'Toratto Grupo Inmobiliario',

	'visitors'	=>false,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/toratto/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/toratto/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>false,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./toratto/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
