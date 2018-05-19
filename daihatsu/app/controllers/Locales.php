<?php 
namespace controllers;

class Locales extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}
	

	function index($params){
		
		// prin($params);
		$cities=opciones(NULL,'locales_grupos','where visibilidad=1');

		foreach($cities as $iiii=>$city){
			$ciudades_opciones[]    =['index'=>$iiii,'value'=>$city];
			$locales[$iiii]['id']   =$iiii;
			$locales[$iiii]['name'] =$city;			
		}

		$locals=select('id,id_grupo,nombre as name,html,lat,lon','locales','where visibilidad=1');

		foreach($locals as $local){
			$locales[$local['id_grupo']]['items'][]=$local;
		}
		
		// prin($locales);
		// parent::index($params);

		// parent::split();
		// prin($params);


		$this->view->assign([
			'map'		  => [
							'lat'  =>'-12.1026865',
							'lon'  =>'-77.0187614',
							'name' =>'Daihatsu'
							],
			'ciudades' =>[
							'label'   =>'ciudades',
							'id'      =>'ciudades',
							'name'    =>'ciudades',
							'options' =>$ciudades_opciones,
							],
			'locales'  =>$locales,
		]);

		// $this->view->assign(['banner'=>'banner-servicios.jpg']);

		//render the view
		$this->view->render('layout_locales');

	}


}