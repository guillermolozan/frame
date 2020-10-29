<?php 
namespace controllers;

class Posts extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function grid(){

		$params=$this->params;

		//post
		
		if($params['item']!=''){

			$post=fila(
				"id,name",
				"posts_groups",
				"where id='".$params['item']."'",
				"0:Datos de 1 post by item id=".$params['item']
			);

			$menu=select(
				'id,name',
				'posts_groups',
				'where 1
				order by weight desc',
				"0:menu de categorias",
				[
					'url'=>['url'=>['posts-{name}/{id}']],
				]
			);

			$menu       =$this->elements->getM($menu,$this->params['uri']);

			$items=select(
				'id,name,fecha_creacion,text,fecha,file',
				'posts_items',
				'where 1 '.
				' and id_grupo='.$post['id'].' '.
				" order by weight desc",
				"0:lista de proyectos by grupo=".$post['id'],
				[
				
					'img'=>[
						'get_archivo'=>[
							'carpeta'=>'postfot_imas',
							'fecha'=>'{fecha_creacion}',
							'file'=>'{file}',
							'tamano'=>'0'
						]
					],

					'url'=>['url'=>['post-{name}/{id}']],

					'sub'=>['fecha'=>['{fecha}','2']]

				]
			);

	

		} else {

			$post['name']='Proyectos';

			$items=select(
				'id,name,fecha_creacion,text,fecha',
				'posts_items',
				'where 1
				order by weight desc',
				'1:lista de posts_items',
				[

				'img'=>['foto'=>[
							'file,fecha_creacion|posts_photos|where id_grupo={id}',
							'postfot_imas',
							['get_archivo'=>'0']
							]],

				'url'=>['url'=>['proyecto-{name}/{id}']],

				'sub'=>['fecha'=>['{fecha}','2']]

				]
				);

		}

		$items=array_map(function($value){

			$value['more']=['name'=>'leer mas','url'=>$value['url']];

			return $value;

		},$items);

		
		//asing vars
		$this->view->assign(
			[
				'head_title'=> $post['name'].' | '.$this->title,
				'posts_items'=>[

					'name'=>$post['name'],
					'items'=>$items,

				],
				'group_post'=>'Blog',
				'menu_post'=>$menu,

			]
		);

		//render the view
		$this->view->render(
			
			'layout_posts_grid'

		);		

	}


	function detail(){


		// parent::detail();
		$params = $this->params;

		//post
		$post=fila(
			"id,name,html,fecha,fecha_creacion,file,id_grupo",
			"posts_items",
			"where id='".$params['item']."'",
			0,
			[
				'sub'=>['fecha'=>['{fecha}','2']],
				'img'=>[
					'get_archivo'=>[
						'carpeta'=>'postfot_imas',
						'fecha'=>'{fecha_creacion}',
						'file'=>'{file}',
						'tamano'=>'0'
					]
				],
				'url'=>['url'=>['post-{name}/{id}']],
			]
		);


		$menu=select(
			'id,name',
			'posts_groups',
			'where 1
			order by weight desc',
			"0:menu de categorias",
			[
				'url'=>['url'=>['posts-{name}/{id}']],
			]
		);
		
		foreach($menu as $ii=>$menu_item){
			if($menu_item['id']==$post['id_grupo']){
				$menu[$ii]['class']='active';
			}
		}
		
		$menu       =$this->elements->getM($menu,$this->params['uri']);

		// prin($menu);

		//asing vars
		$this->view->assign(
			[

				'head_title'=> $post['name'].' | '.$this->title,
			
				'post'=>[
					'type'=>'page',				
					'name'=>$post['name'],
					'sub'=>$post['sub'],
					'img'=>$post['img'],
					'html'=>$post['html'],
					'items'=>$items,
				],
				'group_post'=>'Blog',
				'menu_post'=>$menu,

			]
		);



		//render the view
		$this->view->render(
			
			'layout_posts_detail'

		);		

	}



}
