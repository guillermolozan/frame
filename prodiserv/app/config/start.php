<?php

return [

	'name'	=>'Prodiserv',

	'slogan'	=>'Páginas web, alquiler dominio y hosting',

	'visitors'	=>true,

	'web'	=> [
	
		'name_short' =>'Prodiserv',
		'email'      =>'servicios@prodiserv.com',
		// 'phone'      =>'(+511) 371 - 1519',
		// 'mobile'     =>'970-672-189 | 933-613-748',
		'whatsapp'     =>'998920047',

		// 'address'    =>'Av. Arenales 1724 Dpto 509 Lince',
		
		// 'lat'     	 =>'-12.019271',
		// 'lon'     	 =>'-76.930764',		
		'twitter'    =>'https://twitter.com/',
		'facebook'   =>'https://www.facebook.com/',
		// 'youtube'    =>'https://www.youtube.com/',

	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/prodiserv/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/prodiserv/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./prodiserv/public",

		'analytics'=>"UA-67792309-1"

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
