<?php 
namespace controllers;

class Home extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function index($params){
		



		// clients
		$Gallery=$this->loadModel('Photos');

		$Gallery->setConfig([
					'photos'=>['fields'=>'id,name,file,fecha_creacion,url'],
				]);


		$gallery=$Gallery->getItem(['item'=>'2','limit'=>'0,6']);

		foreach($gallery['items'] as $ii=>$item){

			$gallery['items'][$ii]['target']='_blank';

		}

		$clients=$gallery['items'];







		//banner
		// $Banner=$this->loadModel('Banners');

		// $banner=$Banner->getItems();



		$post=fila(
			"name,html,fecha_creacion,foto",
			"paginas",
			"where id='85'",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'pag_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{foto}',
											'tamano'=>'2'
											]
										]
			]
		);

		$this->title='Terra Nova - Language Center';

		$this->view->assign(
			[
				'is_home'       => true,
				
				'title'         => $this->title,
				
				'canonical'		 => $this->view->vars['baseurl'],

				// 'head_description'=> (isset($start['web_desc']))?$start['web_desc']:'web_desc',

				//head
				// 'head_title'    => $this->title. ( ($this->slogan)?' - '.$this->slogan:'' ),
				'head_title'    => ($this->slogan)?$this->slogan." | ".$this->title:$this->title,

				// 'head_description'=>'En PRODISERV nos especializamos en desarrollo de páginas web, sistemas crm y erp, aplicativos, dominio, hosting, marketing digital e ingeniería comercial',

				// 'head_keywords' => 'prodiserv,paginas web,dominio,hosting,vps,alojamiento,sistemas web,crm,erp,aplicativos, app,inteligencia de negocios,seo,marketing digital,lima,peru,ingenieria comercial,servicio tecnico',

				'post'			=> $post,
				
				//banner
				// "slides"        => $banner,
				
				
			]

		);


		if($this->data_test){
			$this->view->assign(
				$this->data_tests->getData([

					
				])
			);
		}

		$this->view->render('layout_home');


	}

}