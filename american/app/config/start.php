<?php

return [

	'name'	=>'American House Company',

	'web'	=> [
	
		'name_short' =>'American House Company',
		
		'email'      =>'info@americanhousecompany.com',
		
		'phone'      =>'759-3582 | 469-2310',
		'mobile'     =>'970-672-189 | 933-613-748
',

		// 'address'    =>'Av. Arenales 1724 Dpto 509 Lince',
		
		// 'twitter'    =>'https://twitter.com/americanhousecompany',
		
		'facebook'   =>'https://www.facebook.com/American-House-Company-267074547074696/',
	
		'youtube'   =>'https://www.youtube.com/channel/UC1EJ63SllGTOUgSGldMQI9w',

	],

	'visitors'	=>false,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/american/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/american/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./american/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
