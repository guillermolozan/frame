<?php

return [

	'name'	=>'Ato Audiovisuales',

	'visitors'	=>false,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/atoaudiovisuales/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/atoaudiovisuales/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./atoaudiovisuales/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
