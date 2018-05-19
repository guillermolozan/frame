<?php

return [

	'name'	=>'Manufacturas Woorld',

	'visitors'	=>false,

	'slogan' => 'Fabricación de artículos de aluminio para el hogar y la industria',

	'web'	=> [
	
		'name_short' =>'Manufacturas Woorld',
		'email'      =>'ventas@manufacturaswoorld.com',
		'phone'      =>'295-0201',
		'mobile'     =>'998325661/ 994298228',

		'address'    =>'Av Industrial Mz U Lt 11 Urb. Tablada de Lurin V.M.T.',
		'lat'        =>'-12.193230628967285',
		'lon'        =>'-76.93366241455078',
		
		// 'whatsapp'   =>'999-999-999',
		'twitter'    =>'https://twitter.com/',
		'facebook'   =>'https://www.facebook.com/',
		'youtube'    =>'https://www.youtube.com/',

	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/woorld/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/woorld/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		// 'data_test'	=>true,		
	
		// 'image_devel'=>true,
		
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./woorld/public",

		'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
