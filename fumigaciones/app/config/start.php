<?php

return [

	'name'	=>'Fumigaciones en San Borja',


	'visitors'	=>true,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/fumigaciones/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/fumigaciones/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,
		
		// 'data_test'	=>true,
		
		// 'fake'	=>'fakeimg',
		
	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./fumigaciones/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		'fake'	=>'fakeimg',		

	]

];
