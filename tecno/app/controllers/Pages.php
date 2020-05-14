<?php 
namespace controllers;

class Pages extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}
	


	function index($params){

		parent::index(array_merge($params,
			[
				'with_gallery'	=>1,
				'with_form'		=>1,
			]
		));

		// prin($this->view->vars['menu_post']['items']);

		$this->view->assign(
			[
				'type'=>'photos',
				'item_responsive'=>'col s12 m6 l6',
				'ul_class'=>'block_gallery_products row',
			]
		);


		$fila=fila(
			"pdf,fecha_creacion",
			"paginas",
			"where id=".$params['item'],
			0,
			[
				'pdf'=>['get_archivo'=>[
					'carpeta'=>'pdf_fil',
					'fecha'=>'{fecha_creacion}',
					'file'=>'{pdf}',
					'tamano'=>'0'
					]
				],
			]			
		);

		// prin($params);

		// $menu_post=$this->view->vars['menu_post']['items'];


		// prin($this->view->vars['menu_post']);

		$this->view->vars['post']['pdf']=$fila['pdf'];
		
		$this->view->assign([	
			'post'       => $this->view->vars['post'],
			// 'menu_post'  => $menu_post
		]);


		//render the view
		$this->view->render(
			
			'layout_pages'

		);

	}
	

}