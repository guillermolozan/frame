<?php 
namespace controllers;

class Home extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function index($params){

		
		/*
		########     ###    ##    ## ##    ## ######## ########
		##     ##   ## ##   ###   ## ###   ## ##       ##     ##
		##     ##  ##   ##  ####  ## ####  ## ##       ##     ##
		########  ##     ## ## ## ## ## ## ## ######   ########
		##     ## ######### ##  #### ##  #### ##       ##   ##
		##     ## ##     ## ##   ### ##   ### ##       ##    ##
		########  ##     ## ##    ## ##    ## ######## ##     ##
		*/

		if(0){
		
		$Banner=$this->loadModel('Banners');
		$banner=$Banner->getItems();
		
		$this->view->assign(["banner" => $banner]);

		}


		/*
		########   #######   ######  ########
		##     ## ##     ## ##    ##    ##
		##     ## ##     ## ##          ##
		########  ##     ##  ######     ##
		##        ##     ##       ##    ##
		##        ##     ## ##    ##    ##
		##         #######   ######     ##
		*/		
		$post=fila("html,html3,name,meta_description","paginas","where id=1");
		$this->view->assign(["post" => $post]);



		
		/*
		########  ##          ###    ##    ## ########  ######
		##     ## ##         ## ##   ###   ## ##       ##    ##
		##     ## ##        ##   ##  ####  ## ##       ##
		########  ##       ##     ## ## ## ## ######    ######
		##        ##       ######### ##  #### ##             ##
		##        ##       ##     ## ##   ### ##       ##    ##
		##        ######## ##     ## ##    ## ########  ######
		*/
		$planes['name'] ='planes`';
		$planes['url']  ='Planes';

		$planes['items']=select("id,name,html",
			"projects","where ver_home=1 order by weight desc",0,[
				'url'=>['url'=>['servicio-{name}/{id}']],
			]);

		foreach($planes['items'] as $ii=>$hab){

			// $items=explode("\n",$hab['text4']);
			// $htm='<ul>';
			// foreach($items as $item){
			// 	if($item!='')
			// 		$htm.='<li>'.$item.'</li>';
			// }
			// $htm.='</ul>';
			// $planes['items'][$ii]['text4']=$htm;

			// $planes['items'][$ii]['photos']
			$photos=filas(
				'file,fecha_creacion',
				'projects_photos',
				'where id_grupo='.$hab['id'].' and visibilidad=1',0,[
					'get_archivo'=>['get_archivo'=>[
												'carpeta'=>'serfot_imas',
												'fecha'=>'{fecha_creacion}',
												'file'=>'{file}',
												'tamano'=>'0'
												]			
							]
					]
			);

			foreach($photos as $jj=>$photo){

				$planes['items'][$ii]['photos'][]=$photo['get_archivo'];

			}

		}

		// $planes['more']=[
		// 	'url'  =>'servicios',
		// 	'name' =>'ver más servicios'
		// ];

	
		$this->view->assign(["planes"=>$planes]);




















         

		/*
		######## #### ##    ##    ###    ##       ##       ##    ##
		##        ##  ###   ##   ## ##   ##       ##        ##  ##
		##        ##  ####  ##  ##   ##  ##       ##         ####
		######    ##  ## ## ## ##     ## ##       ##          ##
		##        ##  ##  #### ######### ##       ##          ##
		##        ##  ##   ### ##     ## ##       ##          ##
		##       #### ##    ## ##     ## ######## ########    ##
		*/

		$this->view->assign(
			[
				'is_home'    => true,
				
				'title'      => $this->title,
				
				//head
				// 'head_title' => $this->title . ( ($this->view->vars['web_slogan'])? ' '.$this->pipe.' '.$this->view->vars['web_slogan']:'' ),				
				
				'head_title' => $this->title . ( ($post["name"])? ' '.$this->pipe.' '.$post["name"]:'' ),				

				// 'head_description' =>  ( ($this->view->vars['web_description'])? $this->view->vars['web_description']:'' ),				
				'head_description' => $post["meta_description"],
				
				//menu
				// 'menu_left'    => $this->menu_left,


				'more_metas' =>  ( ($this->view->vars['web_more_metas'])? str_replace("\n","",$this->view->vars['web_more_metas']):'' ),				
				



			]

		);




		$this->view->render('layout_home');


	}

}