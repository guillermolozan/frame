<?php

return [

	'name'	=>'Creatiu',

	'visitors'	=>false,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/creatiu/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/creatiu/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./creatiu/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
