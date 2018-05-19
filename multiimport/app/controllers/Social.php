<?php 
namespace controllers;

class Social extends Controller {
// class Social extends \core\models\Social {

	function grid($params){

		$from_api=1;

		// $fanPage="TheGameOfDeadFans";
		$fanPage="multimportsac";

		$cache_file='store/'.$fanPage.'.json';

		if($from_api){

			// $access_token="EAANYjLdpfigBAIv1nij3QZAq9X2T8GkNzVrSfZCGxpqfZA9MmkYoICst5xbDnRsHi31Tt4eGuobtYutMPqNukpoXnrBZBbYlYTGZAzLZA3SJfo7mr0ZBjpKLWxpLWh0zL2OawJy11vUUZAfZAyyj5fZBN0";
			$access_token="EAANYjLdpfigBABdod1SK7ZABNutZC9FHrvJnEAEqhJN5YDUkUCeFELU5BhXWbqA2sRXjzORZADYIIA4LHHZA1vPbcLMSNLFMn5ujj0bpmudMqD41NNkpNIZC3UcXRZArcP5LFFUYmHlfx92GWo54RN";
			//hasta el 30 de agosto
			//

			$params='limit=24&fields=full_picture,message,link,type,from';

			$url="https://graph.facebook.com/".$fanPage."/posts?access_token=".$access_token."&".$params;

			// prin($url); exit();

			$json=file_get_contents($url);
			
			if(!file_exists($cache_file)){

				$f1=fopen($cache_file,"w+");
				fwrite($f1,$json);
				fclose($f1);

			}

		} else {

			$json=implode('',file($cache_file));

		}

		// echo $json; exit();

		$obj = json_decode($json);

		$posts=[];
		foreach($obj->data as $item){

			if(trim($item->type)=='link') continue; 

			$posts[]=[
				'img'  =>$item->full_picture,
				'text' =>$item->message,
				'url'  =>$item->link,
				'type' =>$item->type,
				'name' =>$item->from->name,
				'target'=>'_blank'
			];

		}

		// prin($posts);
		// echo json_encode($posts); exit();


		// die('fff');
		// parent::index($params);


		$this->view->assign(
			['grid'=>[
				'name'=>'Social',
				'items'=>$posts
				]
			]
		);


		// render the view
		$this->view->render(
			
			'layout_social_grid'

		);

	}



	function detail($params){


		parent::index($params);


		$this->view->assign(
			$this->model_detail()
		);


		//render the view
		$this->view->render(
			
			'layout_news_detail'

		);		

	}



}
