<?php

return [

	'name'	=>'Ardyss Perú',

	'visitors'	=>false,

	'web'	=> [
	
		'name_short' =>'Ardyss Perú',
		'email'      =>'contacto@ardyss.com.pe',
		'phone'      =>'949732138',
		'mobile'     =>'949732138',

		'address'    =>'Av. Arenales 1724 Dpto 509 Lince',
		'lat'        =>'-12.0819534',
		'lon'        =>'-77.0383133',
		
		'whatsapp'   =>'949732138',
		// 'twitter'    =>'https://twitter.com/',
		'facebook'   =>'https://www.facebook.com/prendas.ardyss/',
		'facebook_page'   =>'/prendas.ardyss',
		// 'youtube'    =>'https://www.youtube.com/',

	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/ardyss/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/ardyss/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		// 'data_test'	=>true,

		// 'image_devel'=>true,
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",

		'static' =>"./ardyss/public",

		// 'devel' =>"desarrollo",

		// 'image_devel'=>true,

		// 'data_test'	=>true,	
	
		// 'fake'	=>'fakeimg',

	],

	'setup' => [


	]

];
