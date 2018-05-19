<?php

return [
	
	'name'       =>'Great Houses Grupo Inmobiliario',
	
	'web'	=> [
	
		'name_short' =>'Great Houses',
		
		'email'      =>'info@great-houses.com',
		
		'phone'      =>'975-281-760',

		'address'    =>'Calle Antequera 176 oficina 502, San Isidro',
		
		'twitter'    =>'https://twitter.com/great-houses',
		
		'facebook'   =>'https://www.facebook.com/great-houses',
	
	],

	'visitors'   =>false,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/greathouses/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/greathouses/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>false,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./greathouses/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
