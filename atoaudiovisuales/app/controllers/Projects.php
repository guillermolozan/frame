<?php 
namespace controllers;

class Projects extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function grid(){

		$params=$this->params;

		//post
		
		if($params['item']!=''){

			$post=fila(
				"id,name",
				"projects_groups",
				"where id='".$params['item']."'",
				0
			);


			$items=select(
				'id,name,fecha_creacion,text,fecha',
				'projects',
				'where id_grupo='.$post['id']."
				order by weight desc",
				0,
				[

				'img'=>['foto'=>[
							'file,fecha_creacion|projects_photos|where id_grupo={id}',
							'profot_imas',
							['get_archivo'=>'0']
							]],

				'url'=>['url'=>['proyecto-{name}/{id}']],

				'sub'=>['fecha'=>['{fecha}','2']]

				]
				);

		} else {

			$post['name']='Proyectos';

			$items=select(
				'id,name,fecha_creacion,text,fecha',
				'projects',
				'where 1
				order by weight desc',
				0,
				[

				'img'=>['foto'=>[
							'file,fecha_creacion|projects_photos|where id_grupo={id}',
							'profot_imas',
							['get_archivo'=>'0']
							]],

				'url'=>['url'=>['proyecto-{name}/{id}']],

				'sub'=>['fecha'=>['{fecha}','2']]

				]
				);

		}

		$items=array_map(function($value){

			$value['img']=$value['img']['get_archivo'];
			$value['more']=['name'=>'leer mas','url'=>$value['url']];

			return $value;

		},$items);



		//asing vars
		$this->view->assign(
			[

				'head_title'=> $post['name'].' | '.$this->title,

				'projects'=>[
								'name'=>$post['name'],
								'items'=>$items,
								]

			]
		);

		//only for data test
		if($this->data_test){
			$this->view->assign(
				$this->data_tests->getData([
					'projects.name'=>'Proyectos',
					'projects.items'=>'gallery?img&dims=500x500&name=proyecto&text=200&sub=50&number=13&url=proyecto'		
				])
			);
		}

		//render the view
		$this->view->render(
			
			'layout_projects_grid'

		);		

	}


	function detail(){


		// parent::detail();
		$params = $this->params;

		//post
		$post=fila(
			"id,name,html,fecha",
			"projects",
			"where id='".$params['item']."'",
			0,
			[
				'sub'=>['fecha'=>['{fecha}','2']]
			]
		);


		$items=select(
			"file,name,fecha_creacion",
			"projects_photos",
			"where id_grupo=".$post['id']."
			order by weight desc",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'profot_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										]
			]		
			);


		//asing vars
		$this->view->assign(
			[

				'head_title'=> $post['name'].' | '.$this->title,
			
				'project'=>[
					'type'=>'photos',				
					'name'=>$post['name'],
					'html'=>$post['html'],
					'items'=>$items,
				]
			]
		);

		//only for data test
		if($this->data_test){
			$this->view->assign(
				$this->data_tests->getData([
					'project.name'=>$params['uri'],
					'project.text'=>400,
					'project.items'=>'gallery?img&dims=450x450&name=photo 450x450&number=6'					
				])
			);
		}

		//render the view
		$this->view->render(
			
			'layout_projects_detail'

		);		

	}



}
