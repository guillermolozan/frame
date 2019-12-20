<?php 
namespace controllers;

class Pages extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}
	


	function index($params){
		
		parent::index(array_merge($params,['with_gallery'=>1]));
		
		$this->view->assign(
			[
				'type'=>'photos',
				'item_responsive'=>'col s12 m6 l6',
				'ul_class'=>'block_gallery_products row',
			]
		);
		// parent::split();

		// prin($this->collapsible($this->view->vars['post']['html']));

		//render the view
		$this->view->render(
			
			'layout_pages'

		);

	}

}