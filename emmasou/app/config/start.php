<?php

return [

	'name'	=>'Soueast',

	'visitors'	=>false,


	'web'	=> [
	
		'name_short' =>'Soueast',
		'slogan' => 'Vehículos Soueast',

		'logo'	 => 'logo-sou2.png',
		'ico'	 => 'ico-sou.png',	

		/*
		######## ##     ##    ###    #### ##        ######
		##       ###   ###   ## ##    ##  ##       ##    ##
		##       #### ####  ##   ##   ##  ##       ##
		######   ## ### ## ##     ##  ##  ##        ######
		##       ##     ## #########  ##  ##             ##
		##       ##     ## ##     ##  ##  ##       ##    ##
		######## ##     ## ##     ## #### ########  ######
		*/
		'email'      =>'ventas@ambacar.pe',
		'emails'     =>[
			'ventas@ambacar.pe'
		],

		/*
		########  ##     ##  #######  ##    ## ########  ######
		##     ## ##     ## ##     ## ###   ## ##       ##    ##
		##     ## ##     ## ##     ## ####  ## ##       ##
		########  ######### ##     ## ## ## ## ######    ######
		##        ##     ## ##     ## ##  #### ##             ##
		##        ##     ## ##     ## ##   ### ##       ##    ##
		##        ##     ##  #######  ##    ## ########  ######
		*/
		'phone'      =>'914532732',
		'phones'      =>[
			'914532732'
		],

		'mobile'     =>'914532732',

		'whatsapp'   =>'914532732',

		/*

		  ####  ######  ####
		 #    # #      #    #
		 #      #####  #    #
		 #  ### #      #    #
		 #    # #      #    #
		  ####  ######  ####

		*/
		'address'    =>'San Miguel - Lima',

		// 'lat'        =>'-12.0946069',
		// 'lon'        =>'-77.0261886',
		
		/*
		 ######   #######   ######  ####    ###    ##
		##    ## ##     ## ##    ##  ##    ## ##   ##
		##       ##     ## ##        ##   ##   ##  ##
		 ######  ##     ## ##        ##  ##     ## ##
		      ## ##     ## ##        ##  ######### ##
		##    ## ##     ## ##    ##  ##  ##     ## ##
		 ######   #######   ######  #### ##     ## ########
		*/
		// 'twitter'    =>'https://twitter.com/',
		'youtube'    =>'https://www.youtube.com/channel/UCDcE34Jx6Iu0fwypegQcAkg',


		'facebook'   =>'https://www.facebook.com/ambacar.pe',
		'facebook_page'   =>'/ambacar.pe',

		
		'email_admin'=>'ventas@ambacar.pe,wtavara@prodiserv.com,guillermolozan@gmail.com',

		
	],



	'local' => [
		
		'config' =>APP."/../../../sistemapanel/emma/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/emma/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./emmasou/public",

		'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
