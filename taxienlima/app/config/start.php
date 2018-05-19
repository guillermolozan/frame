<?php

return [

	'name'	=>'Taxi en Lima',

	'visitors'	=>false,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/taxienlima/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/taxienlima/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>false,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./taxienlima/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
