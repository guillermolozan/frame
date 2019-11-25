<?php

return [

	'name'	=>'Sumarseg',

	'visitors'	=>false,

	'web'	=> [
	
		'name_short' =>'Sumarseg',
		'email'      =>'informes@sumarseg.com',
		'phone'      =>'(+511) 605-2255',
		'mobile'     =>'981109152',

		'address'    =>'Mz. E Lt. 34 Los Olivos de Pro - Los Olivos - Lima',
		'lat'        =>'-12.0819534',
		'lon'        =>'-77.0383133',
		
		'whatsapp'   =>'981109152',
		// 'twitter'    =>'https://twitter.com/',
		// 'facebook'   =>'https://www.facebook.com/',
		// 'youtube'    =>'https://www.youtube.com/',

	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/sumarseg/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/sumarseg/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./sumarseg/public",

		'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
