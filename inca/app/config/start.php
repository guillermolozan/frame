<?php

return [

	'name'	=>'Incapower',

	'visitors'	=>false,

	'web'	=> [
	
		'name_short' =>'Incapower',
		'slogan' => 'Ventas de Caminios, Volquetes, Buses y Minibuses',

		'logo'	 => 'inca-logo.png',
		'ico'	 => 'inca-ico.png',	

		/*
		######## ##     ##    ###    #### ##        ######
		##       ###   ###   ## ##    ##  ##       ##    ##
		##       #### ####  ##   ##   ##  ##       ##
		######   ## ### ## ##     ##  ##  ##        ######
		##       ##     ## #########  ##  ##             ##
		##       ##     ## ##     ##  ##  ##       ##    ##
		######## ##     ## ##     ## #### ########  ######
		*/
		'email'      =>'ventasdirectas@incapower.pe',
		'emails'     =>[
			'ventasdirectas@incapower.pe'
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
		'phone'      =>'(01) 224 2352',
		'phones'      =>[
			'983618685'
		],

		'mobile'     =>'983618685',

		'whatsapp'   =>'983618685',

		/*

		  ####  ######  ####
		 #    # #      #    #
		 #      #####  #    #
		 #  ### #      #    #
		 #    # #      #    #
		  ####  ######  ####

		*/
		'address'    =>'Av. República de Panamá 3837 - Surquillo',

		'lat'        =>'-12.0946069',
		'lon'        =>'-77.0261886',
		
		/*
		 ######   #######   ######  ####    ###    ##
		##    ## ##     ## ##    ##  ##    ## ##   ##
		##       ##     ## ##        ##   ##   ##  ##
		 ######  ##     ## ##        ##  ##     ## ##
		      ## ##     ## ##        ##  ######### ##
		##    ## ##     ## ##    ##  ##  ##     ## ##
		 ######   #######   ######  #### ##     ## ########
		*/
		'twitter'    =>'https://twitter.com/',
		'youtube'    =>'https://www.youtube.com/',


		'facebook'   =>'https://web.facebook.com/',
		'facebook_page'   =>'/',

		
		'email_admin'=>'info@weclean.pe,wtavara@prodiserv.com,guillermolozan@gmail.com',

		
	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/inca/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/inca/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./inca/public",

		'devel' =>"desarrollo",

		// 'image_devel'=>true,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
