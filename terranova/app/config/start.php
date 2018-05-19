<?php

return [

	'name'	=>'Terra Nova',

	'web'	=> [
	
		'name_short' =>'Terra Nova SpaLessons',

		// 'mobile'     =>'970-672-189 | 933-613-748',		
		'email'      =>'informes@terranovaspalessons.com / richfel@yahoo.com. ',
		'phone'      =>'65.41.477 / 991.127.986 / 944.529.380 / 992.154.786',
		'address'    =>'Calle Las Estrellas 7246 - Urb. Sol de Oro - Los Olivos',
		
		'twitter'    =>'https://twitter.com/TerraNovaspales',
		'facebook'   =>'https://www.facebook.com/TerraNovaLanguageCenter',
		'youtube'   =>'https://www.youtube.com/user/TerraNovaspalessons',

	],

	'visitors'	=>false,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/terranova/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/terranova/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./terranova/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
