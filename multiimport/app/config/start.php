<?php

return [

	'name'	=>'Multiimport',

	'visitors'	=>false,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/multiimport/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/multiimport/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./multiimport/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
