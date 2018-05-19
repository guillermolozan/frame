<?php

return [

	'name'	=>'Daihatsu',

	'visitors'	=>false,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/daihatsu/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/daihatsu/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>false,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./daihatsu/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
