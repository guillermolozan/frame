<?php 
namespace controllers;

use core\Models as Models;
use core\Elements as Elements;
use core\Views as Views;
use core\Server as Server;

class Controller extends \core\Controller {


	function __construct($params){

		parent::__construct($params);

		$static_build=1;

		$this->view->assign(
			[
			//header and menu top
				// 'menu_top'      => $this->menu_top,
				// 'menu_left'     => $this->menu_left,
				// 'logo'          => $this->config['img_logo'],
				// 'logo'          => 'logo.jpg',
				// 'header_bg'		 => $header_bg['img'],
				// 'header_phones' => $web['header_phones'],
				'icon'       	 => 'icon.png?'.$static_build,
				'build_css'		 => $this->view->vars['build_css'].'?'.$static_build,
				'build_js'		 => $this->view->vars['build_js'].'?'.$static_build,
			//prefooter
				// 'menu_prefooter'=>$prefooter,
			//footer
				// 'menu_footer'   => $this->menu_footer,


			]

		);
		

		$this->view->setOption('jadeCompiled',true);


	}


}