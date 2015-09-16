<?php

return [

	'name'	=>'MyM Consultores',

	'visitors'	=>true,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/mconsultores/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/mconsultores/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./mconsultores/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
