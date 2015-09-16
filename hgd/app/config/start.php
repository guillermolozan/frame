<?php

return [

	'name'	=>'HGD Contratistas',

	'visitors'	=>false,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/hgd/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/hgd/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./hgd/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
