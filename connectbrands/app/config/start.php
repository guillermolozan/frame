<?php

return [

	'name'	=>'connectbrands',

	'visitors'	=>false,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/connectbrands/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/connectbrands/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./connectbrands/public",

		'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
