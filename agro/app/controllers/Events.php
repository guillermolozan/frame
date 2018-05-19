<?php 
namespace controllers;

class Events extends \core\controllers\Photos {


	function __construct($params){

		parent::__construct($params);

	}




	function grid(){

		parent::grid();
		//render the view
		$this->view->render(
			
			'layout_galleries'

		);	

	}


	// function detail0(){

	// 	parent::detail();
	// 	//render the view
	// 	$this->view->render(
			
	// 		'layout_galleries'

	// 	);		


	// }	


	function detail(){

		//Galleries
		$Events_Photos=$this->loadModel('Photos');

		$Events_Photos->setConfig([
			'items'  =>[
				'table'=>'eventos_photos'
				,'fields'=>'id,name,html,fecha'
			],
			'photos' =>[
				'table'=>'eventos_photos_photos',
				'dir'=>'evefot_imas'
			],
			'url'		=>'evento',
			'type'	=>'photo'
		]);


		// prin($galleries);

		$gallery=$Events_Photos->getItem();

		$gallery['fecha']=fecha_formato($gallery['fecha'],10);

		$gallery['menu']=$Events_Photos->getItems();
		
		foreach($gallery['menu']['items'] as $ii=>$men)
		{
			$gallery['menu']['items'][$ii]['sub']=fecha_formato($gallery['menu']['items'][$ii]['fecha'],10);
		}


		foreach($gallery['items'] as $ii=>$men)
		{
			$gallery['items'][$ii]['url']=$gallery['items'][$ii]['img'];
			// $gallery['items'][$ii]['name']='';
		}


		// prin($gallery['menu']['items']);
		
		
		$event_dates=$ev2=[];
		
		foreach($gallery['menu']['items'] as $ii=>$event)
		{
			$class=substr($event['fecha'],0,7);
			$gallery['menu']['items'][$ii]['class']='all '.$class;
			// prin($event['sub']);
			list($one,$two,$three)=explode(' de ',$event['sub']);
			$event_dates[$class]=$two." de ".$three;
		}

		foreach($event_dates as $ii=>$val){
			$ev2[]=['option'=>$ii,'val'=>$val];
		}
		$event_dates=$ev2;


		// prin($event_dates);

		// prin($gallery['menu']['items']);
		

		$this->view->assign([

			'head_title'=> $gallery['name'].' | '.$this->title,

			'gallery'=>[
							'type'  =>$gallery['type'],
							'name'  =>$gallery['name'],
							'html'  =>$gallery['html'],
							'fecha' =>$gallery['fecha'],
							'items' =>$gallery['items'],
							'menu'  =>$gallery['menu']
							],

			"event_dates"  => $event_dates,

			]

		);

		$this->view->render(
			
			'layout_event_galleries'

		);		

	}

}
