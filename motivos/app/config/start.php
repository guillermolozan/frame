<?php

return [

	'name'	=>'Mis Motivos',

	'visitors'	=>false,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/motivos/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/motivos/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./motivos/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
