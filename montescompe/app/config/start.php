<?php

return [

	'name'	=>'Montes Consultores',

	'visitors'	=>false,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/montescompe/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/montescompe/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>false,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./montescompe/public",

		'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
