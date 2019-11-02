<?php 
namespace controllers;

class Pages extends Controller {

	function __construct($params){

		parent::__construct($params);

	}

	function index($params){

		$page=fila(
			"titulo,texto,fecha_creacion,foto",
			"paginas",
			"where pagina='".$params['page']."'",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'pag_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{foto}',
											'tamano'=>'0'
											]
										]
			]
		);

		$this->view->assign(
			[
				'title'			=> $page['titulo'],

				// head
				'head_title'   => $page['titulo'].' - '.$this->title,
				
				// post
				'post' => [

					'name'=>$page['titulo'],
					'text'=>$page['texto'],
					'img'=>$page['img']

				]

			]

		);


		$this->view->render('layout_pages');


	}

}