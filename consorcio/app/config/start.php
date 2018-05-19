<?php

return [

	'name'	=>'Consorcio ESI',

	'visitors'	=>false,




	'web'	=> [
	
		'name_short' =>'Consorcio ESI',
		'email'      =>'informes@consorcioesi.com',
		'phone'      =>'(+511) 797-1100',
		// 'mobile'     =>'999-999-999',

		'address'    =>'Jr. Tritoma 1116 - Los Olivos',
		'lat'        =>'-11.9882801',
		'lon'        =>'-77.0773926',
		
		// 'whatsapp'   =>'999-999-999',
		'twitter'    =>'https://twitter.com/',
		'facebook'   =>'https://www.facebook.com/ConsorcioESI/',
		'youtube'    =>'https://www.youtube.com/',

	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/consorcio/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/consorcio/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>false,

		'image_test'=>false,		
	
		// 'fake'	=>'fakeimg',


	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./consorcio/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

		'image_test'=>false,		

	]

];
