<?php

return [

	'name'	=>'weclean',

	'visitors'	=>false,

	'web'	=> [
	
		'name_short' =>'weclean',
		'email'      =>'info@weclean.pe',
		'phone'      =>'(+511) 333 - 3333',
		'mobile'     =>'999-999-999',

		'address'    =>'Av. Arenales 1724 Dpto 509 Lince',
		'lat'        =>'-12.0819534',
		'lon'        =>'-77.0383133',
		
		'whatsapp'   =>'999-999-999',
		'twitter'    =>'https://twitter.com/',
		'facebook'   =>'https://www.facebook.com/',
		'youtube'    =>'https://www.youtube.com/',

	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/clean/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/clean/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./clean/public",

		'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
