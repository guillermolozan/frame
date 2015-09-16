<?php 
namespace controllers;

use core\Models as Models;
use core\Elements as Elements;
use core\Views as Views;
use core\Server as Server;


class Controller extends \core\Controller {

	function __construct(){

		parent::__construct();

		global $start;

		$this->theme    = $start['theme'];

		$this->static   = $start['static'];
		
		$this->module   = new Models($start["models"]);
		
		// $Modelos     = $mod->getModels();		
		
		$this->elements = new Elements($this->module);
	
	}

	function index(){

		$this->view = new Views( 

			$this->theme.'/php',

			[
			
			//head
				'head_title'   => $this->config['html_title'],
				'base'         => Server::base(),
				'ven_css'		=> $this->static.'/vendor/css/',
				'pub_css'		=> $this->static.'/css/',
			
			//header and menu top
				'logo'         => $this->config['img_logo'],
				'link_home'		=> './',
				'menu_top'     => $this->elements->getMenuTop(),

			//body
				'pub_img'		=> $this->static.'/img/',

			//footer
				'menu_footer'  => $this->elements->getFooter(),

			//foot
				'ven_js'			=> $this->static.'/vendor/js/',
				'pub_js'			=> $this->static.'/js/',			

			]
			
		);

		$this->view->setOption('jadeCompiled',true);	

	}

}