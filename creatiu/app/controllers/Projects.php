<?php 
namespace controllers;

class Projects extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function grid(){

		$params=$this->params;
		//post
		

		$post['name']='Proyectos Entregados';

		$items=select(
			'id,name,fecha_creacion,text,fecha,file,distrito as sub',
			'projects_done',
			'where 1
			order by weight desc',
			0,
			[

			'img'=>['get_archivo'=>[
										'carpeta'=>'prodo_imas',
										'fecha'=>'{fecha_creacion}',
										'file'=>'{file}',
										'tamano'=>'0'
										]
									],	

			// 'url'=>['url'=>['proyecto-{name}/{id}']],

			// 'sub'=>['fecha'=>['{fecha}','2']]

			]
		);



		foreach($items as $iii=>$link){

			$items[$iii]['sub']=dato("nombre","geo_distritos","where id=".$link['sub']);

		}
		
		// $items=array_map(function($value){

		// 	$value['img']=$value['img']['get_archivo'];
		// 	$value['more']=['name'=>'leer mas','url'=>$value['url']];

		// 	return $value;

		// },$items);

		// prin($items);


		//asing vars
		$this->view->assign([

			'head_title'=> $post['name'].' | '.$this->title,

			'gallery'=>[
							'type'  =>'links',
							'name'  =>$post['name'],
							// 'html'  =>$gallery['html'],
							'items' =>$items,
							],

			'banner'=>'departamentos-en-venta-jesusmaria-peru-toratto.jpg',

			]

		);

		//render the view
		$this->view->render(
			
			'layout_galleries'

		);

	}


	function detail(){


		// parent::detail();
		$params = $this->params;

		$modalidades=array(
			'1'=> 'Virtual',
			'2'=> 'Presencial'
		);

		//post
		$post=fila(
			"id,fecha_creacion,name,html,file,text,inicio,horarios,modalidad,
			duracion,html_presentacion,html_ventajas,html_syllabus,
			html_certificacion,html_inversion",
			"projects",
			"where id='".$params['item']."'",
			0,
			[
				// 'sub'=>['fecha'=>['{fecha}','2']],
				// 'img'=>['get_archivo'=>[
				// 							'carpeta'=>'pro_imas',
				// 							'fecha'=>'{fecha_creacion}',
				// 							'file'=>'{file}',
				// 							'tamano'=>'0'
				// 							]
				// 						],

				// 'banner'=>['get_archivo'=>[
				// 							'carpeta'=>'pro_imas',
				// 							'fecha'=>'{fecha_creacion}',
				// 							'file'=>'{file_banner}',
				// 							'tamano'=>'0'
				// 							]
				// 						],

			]
		);





		$galleries=select("id,name","galleries_photos","where id_item=".$params['item']." and visibilidad=1",0,array(
				'imgs'=>['fotos'=>[
							'file,fecha_creacion|galleries_photos_photos|where id_grupo={id} order by id asc limit 0,8',
							'galfot_imas',
							['get_archivo'=>'0']
						]]
			)
		);



		// prin($galleries);



		//form
		$fields=[
			'proyecto'=>[
				// 'divclass' =>'col s12 l5',
				'label'    =>'Proyecto',
				'value'    =>$post['name'],
				'hidden'   =>'1',
				// 'disabled' =>'1'
			],
			'nombre'=>[
				'divclass' =>'col s12 l12',
				'class'    =>'validate',
				'label'    =>'Nombres y Apellidos',
			],
		
			// 'apellidos'=>[
			// 	'divclass' =>'col s12 l6',
			// 	'class'    =>'validate',
			// 	'label'    =>'Apellidos',
			// ],			

			'telefono'=>[
				'divclass' =>'col s12 l6',
				'label'    =>'Teléfono Fijo',
			],

			'celular'=>[
				'divclass' =>'col s12 l6',
				'label'    =>'Teléfono Móvil',
			],	

			'email'=>[
				'divclass' =>'col s12 l6',			
				'class'    =>'validate',
				'label'    =>'Email',
				'type'     =>'email',
			],					
	
			'departamento'=>[
				'divclass' =>'col s12 l6',			
				// 'class'    =>'validate',
				'label'    =>'Departamento a cotizar',
			],	
			'comentario'=>[
				'divclass' =>'col s12 l12',
				'class'    =>'validate',
				'label'    =>'Mensaje',
				'type'     =>'textarea',
			],

		];

		$fields_reformated=processFields($fields);




		//asing vars
		$this->view->assign(
			[

				'head_title'=> $post['name'].' | '.$this->title,
			
				'post'=>[
					'type'               =>'photos',				
					'name'               =>$post['name'],
					'html'               =>$post['html'],
					'html_presentacion'  =>$post['html_presentacion'],
					'html_ventajas'      =>$post['html_ventajas'],
					'html_syllabus'      =>$post['html_syllabus'],
					'html_certificacion' =>$post['html_certificacion'],
					'html_inversion'     =>$post['html_inversion'],
					
					'duracion'           =>$post['duracion'],
					'horarios'           =>$post['horarios'],
					'modalidad'          =>$modalidades[$post['modalidad']],
					'inicio'             =>$post['inicio'],
					
					// 'foto'            =>$foto_level,
					
					'galleries'          =>$galleries['0']['imgs'],
					// 'items' =>$items,
				],

				// 'contact'         =>$fields_reformated,
				
				// 'banner_absolute' =>$post['banner'],
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
