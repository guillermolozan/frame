<?php

return [

	'name'	=>'S-Group & Investments',

	'slogan' =>'S-Group & Investments',

	'visitors'	=>false,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/sgi/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/sgi/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		// 'data_test'	=>true,		

		// 'devel' =>"desarrollo",
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./sgi/public",

		'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
