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

		// prin($this->params);

		$id_project=dato("id_grupo","project_galleries_photos","where id=".$this->params['item'],0);

		$post['id_grupo']=dato("id_grupo","projects","where id=".$id_project,0);

		// $this->params['item_menu']=$id_grupo;
		// prin($id_grupo);

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

		$head_title       =$Page->getTitle($post);

		$banner_absolute  =$post['img'];
		// prin($post['img']);
		unset($post['img']);


		$this->view->assign([
				
			'head_title'       => $head_title,
			
			'head_description' => $head_description,
			
			'title'            => $post['name'],
			
			'post'             => [
											'name' =>$post['name'],

											'html' =>$post['html'],

											'img'  =>$post['img'],

											'parts'=>'1'
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

			// }

			

			$breadcrumb =$Page->getBreadcrumb(['item'=>$post['id_grupo'],'id'=>$this->params['item']]);
			
			
			$id_grupo=dato("id_grupo","projects","where id=".$post['id_grupo'],0);

			if($id_grupo==0){

				$id_grupo=$post['id_grupo'];

			}

			$group      =$Page->getGroup(['item'=>$id_grupo]);

			$menu       =$Page->getMenu(['item'=>$id_grupo]);

			// select name,id,id_grupo from paginas where id_grupo='1' and visibilidad=1 order by weight desc limit 0,12

			$menu0 = select('name,id,id_grupo','projects','where id_grupo='.$id_grupo,0);
			foreach($menu0 as $ii=>$men){

				$menu0[$ii]['url']='#';
				$menu0[$ii]['items']=$Page->getMenu(['item'=>$men['id']]);

			}
			
			// prin($menu);

			// $menu = select('name,id,id_grupo,url','project_galleries_photos','where id_grupo='.$post['id_grupo'],1);

			$menu       =$this->elements->getM(array_merge($menu0,$menu),$this->params['uri']);


			// prin($menu['items']);

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
				'label'    =>'Proyecto',
				'value'    =>$post['name'],
				'hidden'   =>'1',
				// 'disabled' =>'1'
			],
			'nombre'=>[
				'required' =>'1',
				// 'divclass' =>'col s12 l12',
				'class'    =>'validate',
				'label'    =>'Nombres y Apellidos',
			],
		
			// 'apellidos'=>[
			// 	'divclass' =>'col s12 l6',
			// 	'class'    =>'validate',
			// 	'label'    =>'Apellidos',
			// ],			

			'telefono'=>[
				'required' =>'1',
				'class'    =>'validate',
				// 'divclass' =>'col s12 l6',
				'label'    =>'Teléfono Fijo',
			],

			'celular'=>[
				'required' =>'1',
				'class'    =>'validate',
 				// 'divclass' =>'col s12 l6',
				'label'    =>'Teléfono Móvil',
			],	

			'email'=>[
				// 'divclass' =>'col s12 l6',			
				'required' =>'1',
				'class'    =>'validate',
				'label'    =>'Email',
				'type'     =>'email',
			],					
	
			// 'departamento'=>[
			// 	'divclass' =>'col s12 l6',			
			// 	// 'class'    =>'validate',
			// 	'label'    =>'Departamento a cotizar',
			// ],	
			'comentario'=>[
				// 'divclass' =>'col s12 l12',
				'required' =>'1',
				'class'    =>'validate',
				'label'    =>'Mensaje',
				'type'     =>'textarea',
// 				'value' =>'Estoy interesado en el inmueble '.$post['name'].' con código: '.$post['id'].'
// Por favor contacten conmigo.
// Gracias
// ',
			],

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



			$this->view->assign([
				
				'menu_post'  => $menu['items'],
				
				'gallery'    => $gallery,
				
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
		$this->view->render('layout_services');

	}



	function group($params){	

		// prin($this->params);

		$id_project=dato("id_grupo","project_galleries_photos","where id=".$this->params['item'],0);

		$post['id_grupo']=dato("id_grupo","projects","where id=".$id_project,0);

		// $this->params['item_menu']=$id_grupo;
		// prin($id_grupo);

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

		$head_title       =$Page->getTitle($post);

		$banner_absolute  =$post['img'];
		// prin($post['img']);
		unset($post['img']);


		$this->view->assign([
				
			'head_title'       => $head_title,
			
			'head_description' => $head_description,
			
			'title'            => $post['name'],
			
			'post'             => [
											'name' =>$post['name'],

											'html' =>$post['html'],

											'img'  =>$post['img'],

											'parts'=>'1'
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

			// }

			

			$breadcrumb =$Page->getBreadcrumb(['item'=>$post['id_grupo'],'id'=>$this->params['item']]);
			
			
			$id_grupo=dato("id_grupo","projects","where id=".$post['id_grupo'],0);

			if($id_grupo==0){

				$id_grupo=$post['id_grupo'];

			}

			$group      =$Page->getGroup(['item'=>$id_grupo]);

			$menu       =$Page->getMenu(['item'=>$id_grupo]);

			// select name,id,id_grupo from paginas where id_grupo='1' and visibilidad=1 order by weight desc limit 0,12

			$menu0 = select('name,id,id_grupo','projects','where id_grupo='.$id_grupo,0);
			foreach($menu0 as $ii=>$men){

				$menu0[$ii]['url']='#';
				$menu0[$ii]['items']=$Page->getMenu(['item'=>$men['id']]);

			}
			
			// prin($menu);

			// $menu = select('name,id,id_grupo,url','project_galleries_photos','where id_grupo='.$post['id_grupo'],1);

			$menu       =$this->elements->getM(array_merge($menu0,$menu),$this->params['uri']);


			// prin($menu['items']);

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
				'label'    =>'Proyecto',
				'value'    =>$post['name'],
				'hidden'   =>'1',
				// 'disabled' =>'1'
			],
			'nombre'=>[
				'required' =>'1',
				// 'divclass' =>'col s12 l12',
				'class'    =>'validate',
				'label'    =>'Nombres y Apellidos',
			],
		
			// 'apellidos'=>[
			// 	'divclass' =>'col s12 l6',
			// 	'class'    =>'validate',
			// 	'label'    =>'Apellidos',
			// ],			

			'telefono'=>[
				'required' =>'1',
				'class'    =>'validate',
				// 'divclass' =>'col s12 l6',
				'label'    =>'Teléfono Fijo',
			],

			'celular'=>[
				'required' =>'1',
				'class'    =>'validate',
 				// 'divclass' =>'col s12 l6',
				'label'    =>'Teléfono Móvil',
			],	

			'email'=>[
				// 'divclass' =>'col s12 l6',			
				'required' =>'1',
				'class'    =>'validate',
				'label'    =>'Email',
				'type'     =>'email',
			],					
	
			// 'departamento'=>[
			// 	'divclass' =>'col s12 l6',			
			// 	// 'class'    =>'validate',
			// 	'label'    =>'Departamento a cotizar',
			// ],	
			'comentario'=>[
				// 'divclass' =>'col s12 l12',
				'required' =>'1',
				'class'    =>'validate',
				'label'    =>'Mensaje',
				'type'     =>'textarea',
// 				'value' =>'Estoy interesado en el inmueble '.$post['name'].' con código: '.$post['id'].'
// Por favor contacten conmigo.
// Gracias
// ',
			],

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



			$this->view->assign([
				
				'menu_post'  => $menu['items'],
				
				'gallery'    => $gallery,
				
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
		$this->view->render('layout_services');

	}

}