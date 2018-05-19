<?php

return [

	'name'	=>'Asiste',

	'slogan'	=>'Asesoría y Consultoría Empresarial de Negocios',

	'visitors'	=>false,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/asiste/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/asiste/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./asiste/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
