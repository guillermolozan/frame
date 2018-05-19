<?php

return [

	'name'	=>'metalsur',

	'visitors'	=>false,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/metalsur/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/metalsur/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./metalsur/public",

		'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
