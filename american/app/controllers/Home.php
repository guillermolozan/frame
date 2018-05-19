<?php 
namespace controllers;

class Home extends Controller {


	function __construct($params){

		parent::__construct($params);

		$this->tipo_array=array(
								'1'			=> 'Departamento',
								'2'			=> 'Local Comercial',
								'3'			=> 'Depósito',
								'4'			=> 'Terreno',
								'5'			=> 'Edificio',
								'6'			=> 'Local Industrial',
								'7'			=> 'Oficina',
								'8'			=> 'Casa',
								'9'			=> 'Cochera',
						);

		$this->operacion_array=array(
								'1'			=> 'Venta',
								'2'			=> 'Alquiler',
						);

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



		//news
		$NewsOne=$this->loadModel('Pages',[
													'items'=>[
														'filter'=>'and id_grupo=9',
														]
													]);

		//noticias generales
		$news_one=$NewsOne->getLinks(['num'=>3]);
		$news_one['name']='Notas de Interés';
		$news_one['more']['name']='ver mas notas de interés';
		$news_one['more']['url']=$news_one['items'][0]['url'];

		$NewsTwo=$this->loadModel('Pages',[
													'items'=>[
														'filter'=>'and id_grupo=10',
														]
													]);

		//noticias tecnológicas
		// $news_two=$NewsTwo->getLinks();	
		// $news_two['name']='Noticias Tecnológicas';
		// $news_two['more']['url']=$news_two['items'][0]['url'];


		// prin($news);




		//banner
		$Banner=$this->loadModel('Banners');

		$banner=$Banner->getItems();

		foreach($banner as $bb=>$ann){
			if($ann['url']=='pagina//'){
				$banner[$bb]['url']=false;
				// unset($banner[$bb]['url']);
			} else {
				$banner[$bb]['url']=str_replace('pagina/', '', $banner[$bb]['url']);
			}
		}
		// prin($banner);




		// bienvenido
		$post=fila(
			"name,text as html,fecha_creacion,foto",
			"paginas",
			"where id='17'",
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

		$post['html']=nl2br($post['html']);

		
		//iconos
		$id_servicio=dato("id","paginas","where id_grupo=2 order by weight desc, id asc",0);
		
		$pagina1=fila(
			"text,id,name",
			"paginas",
			"where id='".$id_servicio."'",
			0,
			[
			'url'=>['url'=>['pagina/{name}/{id}']],
			]
		);

		$pagina2=fila(
			"text,id,name",
			"paginas",
			"where id='13'",
			0,
			[
			'url'=>['url'=>['pagina/{name}/{id}']],
			]
		);

		$pagina3=fila(
			"text,id,name",
			"paginas",
			"where id='12'",
			0,
			[
			'url'=>['url'=>['pagina/{name}/{id}']],
			]			
		);

		$pagina4=fila(
			"text,id,name",
			"paginas",
			"where id='11'",
			0,
			[
			'url'=>['url'=>['pagina/{name}/{id}']],
			]			
		);				
		$iconos=[
			[
				'nombre' =>'Servicios',
				'foto'   =>'pagina_1.jpg',
				'texto'  =>$pagina1['text'],
				'url'    =>$pagina1['url']
			],
			[
				'nombre' =>$pagina2['name'],
				'foto'   =>'pagina_2.jpg',
				'texto'  =>$pagina2['text'],
				'url'    =>$pagina2['url']
			],
			[
				'nombre' =>$pagina3['name'],
				'foto'   =>'pagina_3.jpg',
				'texto'  =>$pagina3['text'],
				'url'    =>$pagina3['url']
			],
			[
				'nombre' =>$pagina4['name'],
				'foto'   =>'pagina_4.jpg',
				'texto'  =>$pagina4['text'],
				'url'    =>$pagina4['url']
			],									
		];


		//ITEMS
		//

		$items=select(
			'id,name,
			tipo,operacion,precio,num_rooms,num_bathrooms,departamento,provincia,distrito
			',
			'projects',
			'where 1
			and visibilidad=1
			order by weight desc
			limit 0,6',
			0,
			[

				'fotos'=>['fotos'=>[
							'file,fecha_creacion|projects_photos|where id_grupo={id} order by id asc limit 0,1',
							'profot_imas',
							['get_archivo'=>'0']
							]
						],

			'url'=>['url'=>['inmueble-{name}/{id}']],

			// 'sub'=>['fecha'=>['{fecha}','2']]

			]
		);


		foreach($items as $iii=>$link){

			// $items[$iii]['sub']=dato("nombre","geo_distritos","where id=".$link['sub']);
			
			if(isset($items[$iii]['fotos']['0']['get_archivo'])){
				$items[$iii]['operacion']    =$this->operacion_array[$items[$iii]['operacion']];
				$items[$iii]['tipo']         =$this->tipo_array[$items[$iii]['tipo']];
				$items[$iii]['precio']    ='$'.number_format(
							$items[$iii]['precio']
							, 0, '.', ','
									);
				$items[$iii]['img']       =$items[$iii]['fotos']['0']['get_archivo'];
				unset($items[$iii]['fotos']);
			}

		}

		// prin($items);

		$this->view->assign(
			[
				'is_home'       => true,
				
				'title'         => $this->title,
				
				'canonical'		 => $this->view->vars['baseurl'],

				// 'head_description'=> (isset($start['web_desc']))?$start['web_desc']:'web_desc',

				//head
				
				// 'head_title'    => $this->title. ( ($this->slogan)?' - '.$this->slogan:'' ),
				
				// 'head_title'    => $this->slogan." :: ".$this->title,
				'head_title'    => $this->title,

				// post
				"post"          => $post,

				//iconos
				"iconos"        => $iconos,

				//clients
				// "clients"        => $clients,
				
				//banner
				"slides"        => $banner,
				
				//blocks
				// 'line_two'	 	 => $hosting_blocks,

				// links
				// "links"         => $links,

				// news
				// "news_one"          => $news_one,			
				// "news_two"          => $news_two,			


				'gallery'=>[
								'type'  =>'links',
								'name'  =>'Inmuebles',
								// 'html'  =>$gallery['html'],
								'items' =>$items,
								],				

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


