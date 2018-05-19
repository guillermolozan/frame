<?php 
namespace controllers;

class Home extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function index($params){



		//banner
		$Banner=$this->loadModel('Banners');
		$banner=$Banner->getItems();


		$this->fields=[

			'nombre'=>[
				'class' =>'validate',
				'label' =>'¿Cuál es tu nombre?',
			],

			'apellido'=>[
				'class' =>'validate',
				'label' =>'¿Cuál es tu apellido?',
			],	
			'email'=>[
				'class' =>'validate',
				'label' =>'¿Algún correo para escribirte?',
				'type'  =>'email',
			],						

			'medio'=>[
				'label'=>'¿Por qué medio nos encontró?',
				'type'  =>'select_2',
				'options'=>['Web','Periódico','Revista','Televisión','Panel Publicitario','Un conocido nos recomendó','Facebook','Otros']
			],

			'comentario'=>[
				'class' =>'validate',
				'label' =>'Describe tu requerimiento',
				'type'  =>'textarea',
			],

		];


		// $fields_reformated=$this->processFields();
		
		$fields_reformated=processFields($this->fields);





		$this->view->assign([

			"banner"=>$banner,

			'fields'=> $fields_reformated,

		]);










		//habitaciones
		$habitaciones['name'] ='Habitaciones';
		$habitaciones['url']  ='habitaciones';

		$habitaciones['items']=select("id,name,text,text2,text3,text4",
			"projects","where ver_home=1",0,[
				'url'=>['url'=>['habitacion-{name}/{id}']],
			]);

		foreach($habitaciones['items'] as $ii=>$hab){

			$items=explode("\n",$hab['text4']);
			$htm='<ul>';
			foreach($items as $item){
				if($item!='')
					$htm.='<li>'.$item.'</li>';
			}
			$htm.='</ul>';
			$habitaciones['items'][$ii]['text4']=$htm;

			// $habitaciones['items'][$ii]['photos']
			$photos=filas(
				'file,fecha_creacion',
				'projects_photos',
				'where id_grupo='.$hab['id'].' and visibilidad=1',0,[
					'get_archivo'=>['get_archivo'=>[
												'carpeta'=>'profot_imas',
												'fecha'=>'{fecha_creacion}',
												'file'=>'{file}',
												'tamano'=>'0'
												]			
							]
					]
			);

			foreach($photos as $jj=>$photo){

				$habitaciones['items'][$ii]['photos'][]=$photo['get_archivo'];

			}

		}

		$habitaciones['more']=[
			'url'  =>'habitaciones',
			'name' =>'ver más habitaciones'
		];

		$this->view->assign([

			"habitaciones"=>$habitaciones

		]);








		// photos about
		$Gallery=$this->loadModel('Photos');

			$Gallery->setConfig([
						'photos'=>[
							'fields'=>'id,name,file,fecha_creacion,url'
						],
						'type'=>'link',
						'more'=>'ver más'
					]);


			$photos_about=$Gallery->getItem(['item'=>'2','limit'=>'0,12']);

			foreach($photos_about['items'] as $ii=>$item){

				$photos_about['items'][$ii]['url']=false;

			}

		// $photos_about['parallax']='fondo-clientes.png';

		$this->view->assign([

			"about"=>$photos_about

		]);









		// videos
		$Videos=$this->loadModel('Videos');

			$gallery=$Videos->getItem([
				'item'  =>'1',
				'limit' =>'0,4',
				// 'type'  =>'videos'
			]);
			// prin($gallery);

			$gallery['more']=[
				'url'  =>'galeria-videos-videos/1',
				'name' =>'galería de videos'
			];

		$videos=$gallery;


		$this->view->assign([

			"block_gallery_videos"=>$videos

		]);










		//links
		$Links=$this->loadModel('Links');

		$Links->setConfig([
					'items'=>[
						'target'=>'_blank',
						'fields'=>'name,url,fecha_creacion,file'
					],
				]);

		$links=$Links->getLinks();	


		$this->view->assign([

			"links"=>$links

		]);















		$this->fields=[

			'llegada'=>[
				'label'=>'Fecha de Ingreso',
				'type'  =>'date',
				'divclass'=>'col s12 l6'
			],
			'salida'=>[
				'label'=>'Fecha de Salida',
				'type'  =>'date',
				'divclass'=>'col s12 l6'
			],

			'hab_individuales'=>[
				'group'=>'N° DE HABITACIONES',
				'label'=>'Individual',
				'type'  =>'select_2',
				'options'=>['1','2','3','4','5'],
				'divclass'=>'col s12 l3'				
			],
			'hab_dobles'=>[
				'label'    =>'Doble',
				'type'     =>'select_2',
				'options'  =>['1','2','3','4','5'],
				'divclass' =>'col s12 l3'				
			],
			'hab_matrimoniales'=>[
				'label'    =>'Matrimonial',
				'type'     =>'select_2',
				'options'  =>['1','2','3','4','5'],
				'divclass' =>'col s12 l3'				
			],
			'hab_triple'=>[
				'label'    =>'Triple',
				'type'     =>'select_2',
				'options'  =>['1','2','3','4','5'],
				'divclass' =>'col s12 l3'				
			],

			// 'nombre'=>[
			// 	'class' =>'validate',
			// 	'label' =>'¿Cuál es tu nombre?',
			// ],

			// 'apellido'=>[
			// 	'class' =>'validate',
			// 	'label' =>'¿Cuál es tu apellido?',
			// ],	
			// 'email'=>[
			// 	'class' =>'validate',
			// 	'label' =>'¿Algún correo para escribirte?',
			// 	'type'  =>'email',
			// ],						

			// 'medio'=>[
			// 	'label'=>'¿Por qué medio nos encontró?',
			// 	'type'  =>'select_2',
			// 	'options'=>['Web','Periódico','Revista','Televisión','Panel Publicitario','Un conocido nos recomendó','Facebook','Otros']
			// ],

			// 'comentario'=>[
			// 	'class' =>'validate',
			// 	'label' =>'Describe tu requerimiento',
			// 	'type'  =>'textarea',
			// ],

		];


		// $fields_reformated=$this->processFields();
		
		$fields_reformated=processFields($this->fields);


		// $fields_reformated=[$fields_reformated[2]];

		// prin($fields_reformated);

		// prin($form);

		if($_SERVER['REQUEST_METHOD']=='POST'){


			$email= new \controllers\Emails($this->view);

			$sended=$email->send(
				implode(',',$this->admin_emails),
				"Mensaje de Contáctenos",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Contacto",
					'subtitle'   =>'Se recibió un mensaje desde la web '.$this->view->vars['web_name'],
					'html'       =>$this->emailFields('html')
				],
				[
					'name'		 =>$this->name.' para administrador'
				]
			);


			if($sended){	$this->setMessage($email);		} 


			insert(
				array_merge(
					[
						'fecha_creacion' =>'now()',
						'fecha'          =>'now()',
					],
				$this->insertFields()
				),
				"contacto");


		}


		$this->view->assign([

				'message'         => $message,
				
				'fields_reservar' => $fields_reformated,

		]);





		// // home
		// $welcome=fila(
		// 	"name,html,fecha_creacion,foto",
		// 	"paginas",
		// 	"where id='1'",
		// 	0,
		// 	[
		// 		'img'=>['get_archivo'=>[
		// 									'carpeta'=>'pag_imas',
		// 									'fecha'=>'{fecha_creacion}',
		// 									'file'=>'{foto}',
		// 									'tamano'=>'2'
		// 									]
		// 								]
		// 	]
		// );










		$this->view->assign(
			[
				'is_home'    => true,
				
				'title'      => $this->title,
				
				//head
				'head_title_strict' => $this->title.' - Un tranquilo y fresco Oasis en la ciudad - Habitaciones Individual, Doble, Triple y Matrimonial',
					
				'head_description' => 'Bienvenido al Hotel Punta Pariñas Talara - Te invitamos a alojarte en nuestras modernas instalaciones.Haz tu RESERVA llamándonos al (+51) 073 498795 o escríbanos a reservas@hotelpuntaparinastalara.com',

				//bievenido
				"post"       => $welcome,

															
			]

		);




		$this->view->render('layout_home');


	}

}