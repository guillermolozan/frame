<?php

return [

	'name'	=>'cslimpofer',

	'visitors'	=>false,

	'web'	=> [
	
		'name_short' =>'cslimpofer',
		'email'      =>'info@cslimpofer.com',
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
		
		'config' =>APP."/../../../sistemapanel/limpofer/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/limpofer/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./limpofer/public",

		'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
