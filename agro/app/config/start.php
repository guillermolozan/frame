<?php

return [

	'name'	=>'Agro Sur Latino',

	'visitors'	=>false,

	'web'	=> [
	
		'name_short' =>'Agro Sur Latino',
		'email'      =>'david@agrosurlatino.com',
		'phone'      =>'(+511) 371 - 1519',
		// 'mobile'     =>'970-672-189 | 933-613-748',

		// 'address'    =>'Av. Arenales 1724 Dpto 509 Lince',
		
		'lat'     	 =>'-12.019271',
		'lon'     	 =>'-76.930764',		
		'twitter'    =>'https://twitter.com/',
		'facebook'   =>'https://www.facebook.com/',
		// 'youtube'    =>'https://www.youtube.com/',

	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/agro/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/agro/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'disabled'=>false,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./../agro/public",

		'disabled'=>true,
		
		// 'static' =>"./agro/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
