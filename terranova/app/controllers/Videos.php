<?php 
namespace controllers;

class Videos extends \core\controllers\Videos {


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



	function detail(){

		parent::detail();

		//render the view
		$this->view->render(
			
			'layout_galleries'

		);		

	}


	function post($params){

		parent::post($params);

		$Videos=$this->loadModel('Videos');

		$videos=$Videos->getItem([
			'item' =>'1',
			'type' =>'links'
		]);
		// prin($videos);
		// $num=1;
		// foreach($videos['items'] as $ii=>$item){

		// 	$videos['items'][$ii]['num']=$num++;

		// }
		
		$this->view->assign([

			'videos'=>$videos
		
		]);


		//render the view
		$this->view->render(
			
			'layout_videos'

		);		

	}


}
