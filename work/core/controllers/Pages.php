<?php 
namespace core\controllers;

use core\vendor\SimpleDom as SimpleDom;

class Pages extends \controllers\Controller {


	function index_nogroup($params){

		$params['no-show-menu-group']=1;

		$this->index($params);

	}

	function split(){

		$Page=$this->loadModel('Pages');

		$post             =$Page->getPage();

		// echo "<textarea>".$post['html']."</textarea>";

		$html=explode("<hr />",$post['html']);

		$parts=sizeof($html);

		$this->view->assign(['post'=>[
			'name' =>$post['name'],
			'img'  =>$post['img'],			
			'html'=>($parts==1)?$html[0]:$html,
			'parts'=>$parts]]
		);

	}





	function index($params){



		$Page=$this->loadModel('Pages');

		// con este codigo obtenemos urls meta desription y meta keywords
		$Page->setConfig([
			'items'=>[
				'fields' =>$Page->getConfig()['items']['fields'].",url,title,meta_description,meta_keywords",
			],
			'debug'=>0
		]);


		$post             =$Page->getPage();
		
		$head_title       =$Page->getTitle($post);

		$head_description =$Page->getDescription($post);

		$head_keywords    =$Page->getKeywords($post);

		$canonical  	  =$Page->getCanonical([

			'group'   =>$group,
			'name'    =>$post['name'],
			'id'      =>$post['id'],
		
		]);		

		
		$this->view->assign([
				
			'head_title'       => $head_title,
			
			'head_description' => $head_description,

			'head_keywords'    => $head_keywords,

			'canonical'   	   => $canonical,
			
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

			if($params['with_gallery']){
			
				$Photos=$this->loadModel('Photos');

				$Photos->setConfig([	
					'items'  =>['table'=>'paginas','fields'=>'id,name,html'],
					'photos' =>['table'=>'paginas_photos','dir'=>'pagfot_imas','fields'=>'id,name,file,fecha_creacion'],
					'type'   =>'photos',					
				]);

				$gallery=$Photos->getItem();

				$gallery['name']='';

				$gallery['html']='';

			}

			if($params['with_form']){
			
				$this->fields=[
					'page_name'=>[
						'label'    =>'Título de Página',
						'value'    =>$post['name'],
						'hidden'   =>'1',
					],
					'page_url'=>[
						'label'    =>'Url de Página',
						'value'    =>$this->view->vars['base'].$this->view->vars['uri'],
						'hidden'   =>'1',
					],					
					'nombre'=>[
						'class'    =>'validate',
						'label'    =>'Nombres y Apellidos',
						'required' =>'1',				
					],
					'telefono'=>[
						'label'    =>'Teléfono ',
						'required' =>'1',
						'type'     =>'tel',
					],
					'ciudad'=>[
						'label'    =>'Ciudad',
					],
					'email'=>[
						'class'    =>'validate',
						'label'    =>'Email',
						'type'     =>'email',
						'required' =>'1',
					],
					'comentario'=>[
						'divclass' =>'col s12 l12',
						'class'    =>'validate',
						'label'    =>'Mensaje',
						'type'     =>'textarea',
						'value' =>'Estoy interesado en el el producto '.$post['name']."\n".
							"Por favor contacten conmigo.\n".
							"Gracias\n".
							""
					],
				];

				if($_SERVER['REQUEST_METHOD']=='POST'){
		
					$email= new \controllers\Emails($this->view);

					
					$sended=$email->send(
						
						$this->view->vars['web_email_admin'],
						"Mensaje de Cotización",
						[
							'name_right' =>$this->view->vars['web_name'],
							'title'      =>"Consulta",
							'subtitle'   =>'Se recibió un mensaje desde la web '.$this->view->vars['web_name'],
							'html'       =>$email->emailFields('html',$this->fields)
						],
						[
							'name'		 =>$this->view->vars['uri'].' para administrador'
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
							'name'		 =>$this->view->vars['uri'].' para usuario'
						]
					);
		

					if($sended){	
						$this->setMessage($email->files_test);	
					} 
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
		
				$fields_reformated=processFields($this->fields);

				$this->view->assign([	
					'form_fields'    =>$fields_reformated,
					'form_name'      =>'page',
					'form_button'    =>'ENVIAR',
					'form_title'     =>'Consulta',
				]);

			}


			$breadcrumb =$Page->getBreadcrumb(
				[
					'item'=>$post['id_grupo'],
					'id'=>$this->params['item']
				]
			);
			
			// prin($post['id_grupo']);
			// $menu       =$Page->getMenu(['item'=>$post['id_grupo']]);

			// if($post['id_grupo']==19) $post['id_grupo']=4;

			// $id_grupo=dato('id_grupo',$config['groups']['table'],'where id='.$post['id_grupo']);

			// if( is_numeric($id_grupo) and $id_grupo>0){ $post['id_grupo']=$id_grupo; }


			$post['id_grupo']=$Page->getIdGroup(['id_grupo'=>$post['id_grupo']]);
			$post['id_grupo']=$Page->getIdGroup(['id_grupo'=>$post['id_grupo']]);
			$post['id_grupo']=$Page->getIdGroup(['id_grupo'=>$post['id_grupo']]);


			// $post['id_grupo']=47;
			// prin($post['id_grupo']);


			$groups_top=$Page->getMenuGroup(['where'=>'id='.$post['id_grupo']]);


			// prin($groups_top);
			foreach($groups_top as $group)
			{				

				// $menu[]=[
				// 	'url'   =>'#',
				// 	'name'  =>$group['name'],
				// 	'items' =>$Page->getMenu(
				// 		[
				// 			'item' =>$group['id'],
				// 			'uri'  =>$group['url'],
				// 			'sub'	 => "id_grupo={id_grupo}",
				// 		]
				// 	)
				// ];

				// prin('hard');

				// prin($group);

				$menu=$Page->getMenu(
					[
						'item' =>$group['id'],
						'uri'  =>maskUrl($group['url']),
						'sub'	 => "id_grupo={id_grupo}",
					]
					,0
				);

			}
			
			// if($post['id_grupo']==4){
				// prin($menu);
			// }
			$group      =$Page->getGroup(['item'=>$post['id_grupo']]);
			
			$menu       =$this->elements->getM($menu,$this->params['uri']);



			// prin($gallery);

			$this->view->assign([
				
				'menu_post'  => $menu,
				'group_post' => $group,
				'breadcrumb' => $breadcrumb,

			]);

			if($gallery)
				$this->view->assign(['gallery'=>$gallery]);			


		}

	}

	function collapsible($html){

		$dom = new SimpleDom();

	   // $dom->load($html);

		return $html;

	}

}