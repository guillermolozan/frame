<?php

return [

	'name'	=>'eduhg',

	'visitors'	=>false,

	'web'	=> [
	
		'name_short' =>'Edu Holding Group',
		'email'      =>'info@eduhg.pe',
		'phone'      =>'(51) 625-3900',
		'mobile'     =>'(51) 625-3900',

		'address'    =>'Av. Luna Pizarro 1392 La Victoria',
		'lat'        =>'-12.0819534',
		'lon'        =>'-77.0383133',
		
		'whatsapp'   =>'(51) 625-3900',
		'twitter'    =>'https://twitter.com/',
		'facebook'   =>'https://www.facebook.com/',
		'youtube'    =>'https://www.youtube.com/',

	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/eduhg/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/eduhg/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./eduhg/public",

		'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
