<?php

return [

	'name'	=>'We Clean',

	'visitors'	=>false,

	'web'	=> [
	
		'name_short' =>'We Clean',
		'slogan' => 'Fumigaciones y Desinfecciones',

		'logo'	 => 'clean-logo.jpg',
		'ico'	 => 'clean-ico.jpg',	

		/*
		######## ##     ##    ###    #### ##        ######
		##       ###   ###   ## ##    ##  ##       ##    ##
		##       #### ####  ##   ##   ##  ##       ##
		######   ## ### ## ##     ##  ##  ##        ######
		##       ##     ## #########  ##  ##             ##
		##       ##     ## ##     ##  ##  ##       ##    ##
		######## ##     ## ##     ## #### ########  ######
		*/
		'email'      =>'info@weclean.pe',
		'emails'     =>[
			'info@weclean.pe'
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
		'phone'      =>'966797804',
		'phones'      =>[
			'966797804'
		],

		'mobile'     =>'966797804',

		'whatsapp'   =>'966797804',

		/*

		  ####  ######  ####
		 #    # #      #    #
		 #      #####  #    #
		 #  ### #      #    #
		 #    # #      #    #
		  ####  ######  ####

		*/
		'address'    =>'Av. Rivera Navarrete 765 San Isidro',

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
		
		'config' =>APP."/../../../sistemapanel/clean/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/clean/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./clean/public",

		'devel' =>"desarrollo",

		// 'image_devel'=>true,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
