<?php 
namespace controllers;

class Servicios extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}

	function setMessage($email,$msg=false){

		$msg=($msg)?$msg:$this->default_message;

		$this->message=$msg;

		// prin($this->email);

		if($this->view->vars['email_test']){

			$this->message.= '<ul><li>pruebas</li>';
			foreach($email->files_test as $fils){
				$this->message.='<li><a target="_black" href="'.$fils['link'].'">'.$fils['link'].'</a></li>';
			}
			$this->message.='</ul>';
	
		}

	}


	function emailFields($type="text"){

		if($type=="html"){

			$html="<table>";

			foreach($this->fields as $name=>$item)
			{	
				switch($item['type']){
					case "textarea":
						$html.=
							"<tr><th><br>".
							$item['label'].
							":</th></tr>".
							"<tr><td>".
							$_POST[$name].
							"</td></tr>";
					break;
					default:
						$html.=
							"<tr><th>".
							$item['label']."</th>".
							"<td>: ".
							$_POST[$name].
							"</td></tr>";
					break;
				}	
			}

			$html.="</table>";

		} elseif($type=="html"){

			$html="\n\n";

			foreach($this->fields as $name=>$item)
			{	
				switch($item['type']){
					case "textarea":
						$html.=$item['label'].":\n".$_POST[$name]."\n\n";
					break;
					default:
						$html.=$item['label'].": ".$_POST[$name]."\n\n";
					break;
				}	
			}

			$html.="\n\n";

		}

		return $html;

	}

	function index($params){	

		$this->name = "Servicios";

		$Page=$this->loadModel('Pages');

		$Page->setConfig([
						'items'=>[
							'table' =>'project_galleries_photos',
							'fields'=>"id,name,text,html,fecha_creacion,foto,id_grupo",
							'dir'   =>'ser_imas_imas',
							'url'	  =>'pagina/',
							'filter'=>NULL,
						],
						'groups'=>[
							'table' =>'projects',
						]
				]);

		$post             =$Page->getPage();

		$head_description =$Page->getDescription($post);

		$head_keywords 	=$Page->getKeywords($post);

		$head_title       =$Page->getTitle($post);

		// $banner_absolute  =$post['img'];
		// prin($post['img']);
		// unset($post['img']);
		$post2=fila('adjunto,fecha_creacion','project_galleries_photos','where id='.$post['id'],0,[
							'get_archivo'=>['get_archivo'=>[
											'carpeta'=>'atc_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{adjunto}',
											'tamano'=>'0'
											]]
			]);

		// $post2['get_archivo']=(file_exists($post2['get_archivo']))?$post2['get_archivo']:'';


		$this->view->assign([
				
			'head_title'       => $head_title,
			
			'head_description' => $head_description,

			'head_keywords' 	 => $head_keywords,
			
			'title'            => $post['name'],
			
			'post'             => [
											'name' =>$post['name'],

											'html' =>$post['html'],

											'img'  =>$post['img'],

											'parts'=>'1',

											'adjunto' =>$post2['get_archivo']
										],
		
		]);


		if($post['id_grupo']!='' and !$params['no-show-menu-group'] ){


			$gallery=false;


			// if($params['with_gallery']){
			
				$Photos=$this->loadModel('Photos');

				$Photos->setConfig([	
					'items'  =>['table'=>'project_galleries_photos','fields'=>'id,name,html'],
					'photos' =>['table'=>'project_galleries_photos_photos','dir'=>'galfot_imas','fields'=>'id,name,file,fecha_creacion'],
					'type'   =>'photos',	
					
				]);

				$gallery=$Photos->getItem(['order'	=>' by id asc']);

				foreach($gallery['items'] as $y=>$item){
					$gallery['items'][$y]['url']=$gallery['items'][$y]['img'];
				}

				$gallery['name']='';

				$gallery['html']='';

				// prin($gallery['items']);

			// }



			$breadcrumb =$Page->getBreadcrumb(['item'=>$post['id_grupo'],'id'=>$this->params['item']]);


			$id_grupo=dato("id_grupo","projects","where id=".$post['id_grupo'],0);

			if($id_grupo==0){

				$id_grupo=$post['id_grupo'];

			}

			$group      =$Page->getGroup(['item'=>$id_grupo]);

			$menu       =$Page->getMenu(['item'=>0]);

			// select name,id,id_grupo from paginas where id_grupo='1' and visibilidad=1 order by weight desc limit 0,12

			$menu0 = select('name,id,id_grupo','projects','where visibilidad=1 order by weight desc',0);
			// prin($menu0);

			foreach($menu0 as $ii=>$men){

				$menu0[$ii]['url']   ='#';
				$menu0[$ii]['items'] =$Page->getMenu(['item'=>$men['id']]);

			}
			
			// $menu = select('name,id,id_grupo,url','project_galleries_photos','where id_grupo='.$post['id_grupo'],1);

			$menu       =$this->elements->getM(array_merge($menu0,[]),$this->params['uri']);


			// prin($menu);
			

			$canonical  =$Page->getCanonical([

				'group'   =>$group,
				'name'    =>$post['name'],
				'id'      =>$post['id'],
			
			]);

			// prin($gallery);


		//form
		$this->fields=[
			'proyecto'=>[
				// 'divclass' =>'col s12 l5',
				'label'    =>'Producto',
				'value'    =>$post['name'],
				'hidden'   =>'1',
				// 'disabled' =>'1'
			],
			'nombre'=>[
				// 'divclass' =>'col s12 l12',
				'class'    =>'validate',
				'label'    =>'Nombres y Apellidos',
				'required' =>'1',				
			],
		
			// 'apellidos'=>[
			// 	'divclass' =>'col s12 l6',
			// 	'class'    =>'validate',
			// 	'label'    =>'Apellidos',
			// ],			

			'telefono'=>[
				// 'divclass' =>'col s12 l6',
				'label'    =>'Teléfono ',
				'required' =>'1',
			],

			'empresa'=>[
				// 'divclass' =>'col s12 l6',
				'label'    =>'Empresa',
			],	

			'medio'=>[
				'label'=>'¿Por qué medio nos encontró?',
				'type'  =>'select',
				'options'=>['Web','Periódico','Revista','Televisión','Panel Publicitario','Un conocido nos recomendó','Otros']
			],	

			'email'=>[
				// 'divclass' =>'col s12 l6',			
				'class'    =>'validate',
				'label'    =>'Email',
				'type'     =>'email',
				'required' =>'1',
			],					
	
			// 'departamento'=>[
			// 	'divclass' =>'col s12 l6',			
			// 	// 'class'    =>'validate',
			// 	'label'    =>'Departamento a cotizar',
			// ],	
			'comentario'=>[
				'divclass' =>'col s12 l12',
				'class'    =>'validate',
				'label'    =>'Mensaje',
				'type'     =>'textarea',
				'value' =>'Estoy interesado en el el producto '.$post['name'].'
Por favor contacten conmigo.
Gracias
'],

		];

		$fields_reformated=processFields($this->fields);

		// prin($this->view->vars);
		// 
		if($_SERVER['REQUEST_METHOD']=='POST'){

			$email= new \controllers\Emails($this->view);

			$sended=$email->send(
				// $post['email'],
				// 'informes@detallitosmathias.com',
				// 'guillermolozan@gmail.com',
				// ,'.implode(',',$this->admin_emails),
				$this->view->vars['web_email_admin'],
				"Mensaje de Cotización",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Cotización",
					'subtitle'   =>'Se recibió un mensaje desde la web '.$this->view->vars['web_name'],
					'html'       =>$this->emailFields('html')
				],
				[
					'name'		 =>$this->name.' para administrador'
				]
			);

			$sended_response=$email->send(
				$_POST['email'],
				"Mensaje de Cotización",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Cotización",
					// 'subtitle'   =>'Se recibió un mensaje desde la web '.$this->view->vars['web_name'],
					'html'       =>"<p>Gracias por escribirnos, en breve estaremos poniéndonos en contacto con usted</p>"
				],
				[
					'name'		 =>$this->name.' para usuario'
				]
			);

			if($sended){	$this->setMessage($email);		} 
			// else { echo 'noooo'; }

			if(0)
			insert(
				array_merge(
					[
						'fecha_creacion' =>'now()',
						'fecha'          =>'now()',
					],
				$this->insertFields()
				),
				"contacto");

			// prin($this->message);

		}

					// 'items'  =>['table'=>'project_galleries_photos','fields'=>'id,name,html'],
					// 'photos' =>['table'=>'project_galleries_photos_photos','dir'=>'galfot_imas','fields'=>'id,name,file,fecha_creacion'],
					// 'type'   =>'photos',	

		$galleries[0]=array('id'=>'1','name'=>'Galería');
		$galleries[0]['imgs']=filas('file,fecha_creacion','project_galleries_photos_photos','where id_grupo='.$params['item'].' and visibilidad=1',0,[
				'get_archivo'=>['get_archivo'=>[
											'carpeta'=>'galfot_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]			
						]
				// 'imgs'=>['foto'=>[
				// 			'file,fecha_creacion|galleries_photos_photos|where id_grupo={id} order by id asc',
				// 			'profot_imas',
				// 			['get_archivo'=>'0']
				// 			]
				// 		]
				]);

		// $galleries=filas("id,name","projects_photos","where id_grupo".$params['item']." and visibilidad=1",1,[
		// 		'imgs'=>['fotos'=>[
		// 					'file,fecha_creacion|galleries_photos_photos|where id_grupo={id} order by id asc',
		// 					'galfot_imas',
		// 					['get_archivo'=>'0']
		// 					]
		// 				],
		// ]);

		// prin($galleries[0]['imgs']);

		$thereIsPlanos=0;

		foreach($galleries as $iii=>$gallery){
			if(strtolower($gallery['name'])=='planos'){
				$thereIsPlanos=1;
			}
			foreach($gallery['imgs'] as $yy=>$img){
				if($yy==0)
					$galleries[$iii]['img']=$img['get_archivo'];
				$imagess[]=['src'=>$img['get_archivo']];
			}
			// prin($imagess);
			$galleries[$iii]['items']=json_encode($imagess);
			unset($imagess);
		}

		$gfirst=[];
		foreach($galleries as $iii=>$gallery){
			if($gallery['name']=="Galería"){
				$gfirst[]=$gallery;
				unset($galleries[$iii]);
			}
		}
		$galleries=array_merge($gfirst,$galleries);
		if(sizeof($galleries[0]['imgs'])==0){
			$galleries=false;
		}


			$this->view->assign([
				
				'menu_post'  => $menu['items'],
				
				'galleries'     =>$galleries,

				// 'gallery'    => $gallery,
				
				'group_post' => $group,
				
				'breadcrumb' => $breadcrumb,
				
				'canonical'  => $canonical,
				
				// 'banner'  => $banner,
				
				//form
				'contact'    =>$fields_reformated,
				
				'message'    => $this->message,

			]);


		}

	
		// parent::split();
		// prin($params);
		if($banner_absolute!='')
			$this->view->assign(['banner_absolute'=>$banner_absolute]);
		else
			$this->view->assign(['banner'=>'foto3.png']);

		//render the view
		$this->view->render('layout_services_detail');

	}



	function grid($params){	

		// prin($params);
		$this->name = "Servicios";

		$Page=$this->loadModel('Pages');

		$Page->setConfig([
						'items'=>[
							'table' =>'projects',
							'fields'=>"id,name,text,html,fecha_creacion,file as foto,id_grupo",
							'dir'   =>'ser_imas_imas',
							'url'	  =>'pagina/',
							'filter'=>NULL,
						],
						'groups'=>[
							'table' =>'projects',
						]
				]);

		$post             =$Page->getPage();

		$head_description =$Page->getDescription($post);

		$head_title       =$Page->getTitle($post);

		$banner_absolute  =$post['img'];

		unset($post['img']);


		$this->view->assign([
				
			'head_title'       => $head_title,
			
			'head_description' => $head_description,

//			'head_keywords' 	 => $head_keywords,
			
			'title'            => $post['name'],
			
			'post'             => [
											'name' =>$post['name'],

											'html' =>$post['html'],

											'img'  =>$post['img'],

											'parts'=>'1'
										],
		
		]);


		if($post['id_grupo']!='' and !$params['no-show-menu-group'] or 1){


			// $gallery=false;

			// if($params['with_gallery']){
			
				$Photos=$this->loadModel('Photos');

				$Photos->setConfig([	
					'items'  =>['table'=>'projects','fields'=>'id,name,html,url'],
					'photos' =>['table'=>'project_galleries_photos','dir'=>'ser_imas_imas','fields'=>'id,name,foto,fecha_creacion,url','file'=>'foto'],
					'type'   =>'photos',	
					
				]);

				$gallery=$Photos->getItem(['order'	=>' by id asc']);
				
				// prin($gallery['items']);



				$gallery['name']='';

				$gallery['html']='';

			// }

			// prin($gallery);

			$breadcrumb =$Page->getBreadcrumb(['item'=>$post['id_grupo'],'id'=>$this->params['item']]);


			$id_grupo=$params['item'];

			$url=dato("url","projects","where id=".$params['item'],0);

			foreach($gallery['items'] as $y=>$item){
				$gallery['items'][$y]['url']=procesar_url($url.'/'.$item['name']).'/'.$item['id'];
				//luces-de-emergencia/luces-2-x-20w/4
			}

			// prin($id_grupo);

			$group      =$Page->getGroup(['item'=>$id_grupo]);

			$menu       =$Page->getMenu([]);
			// select name,id,id_grupo from paginas where id_grupo='1' and visibilidad=1 order by weight desc limit 0,12

			$menu0 = select('name,id,id_grupo,url','projects','where visibilidad=1 order by weight desc',0);
			// prin($menu0);

			foreach($menu0 as $ii=>$men){

				// $menu0[$ii]['url']   ='#';
				$menu0[$ii]['url']=$men['url'].'/'.$men['id'];

				// $menu0[$ii]['items'] =$Page->getMenu(['item'=>$men['id']]);

			}
			
			// $menu = select('name,id,id_grupo,url','project_galleries_photos','where id_grupo='.$post['id_grupo'],1);

			$menu       =$this->elements->getM(array_merge($menu0,[]),$this->params['uri']);


			// prin($menu);
			

			$canonical  =$Page->getCanonical([

				'group'   =>false,
				'name'    =>$post['name'],
				'id'      =>$post['id'],
			
			]);

			$gallery['type']='';
			
			// prin($gallery);

			// prin($gallery['items']);

			foreach($gallery['items'] as $item){

				$nam=$item['name'];
				$items_a[]=$nam;
				$items_a[]=$nam;

			}
			
			// prin($items_a);

			$head_keywords		=$Page->getKeywords($post,implode(', ',$items_a));


			$this->view->assign([
				
				'menu_post'     => $menu['items'],
				
				'gallery'       => $gallery,
				
				'group_post'    => $group,
				
				'breadcrumb'    => $breadcrumb,
				
				'canonical'     => $canonical,
				
				'head_keywords' => $head_keywords,
				
				// 'banner'     => $banner,
				
				//form
				// 'contact'    =>$fields_reformated,
				
				// 'message'    => $this->message,

			]);


		}

	
		// parent::split();
		// prin($params);
		if($banner_absolute!='')
			$this->view->assign(['banner_absolute'=>$banner_absolute]);
		else
			$this->view->assign(['banner'=>'foto3.png']);

		//render the view
		$this->view->render('layout_services_grid');

	}

}