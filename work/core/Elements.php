<?php

namespace core;


class Elements {

	private $models;

	private $dir_provider;
	// private $isLoaded = false;


	public function __construct(){

		$this->dir_provider=APP.'/config/elements/';

	}

	public function getBreadcrumb($crumb){

		$crumb2=[];
		foreach($crumb as $item){
			if($item['name']!='')
				$crumb2[]=$item;
		}
		return $crumb2;

	}

	public function getMenu($file=NULL,$more=[],$url=NULL){

		global $start;

		if($file){
			if(is_array($file)){
				$items = array_merge($file,$more);
			} else {
				$items = array_merge(require $this->dir_provider.$file.'.php',$more);
			}
		} else{
			$items=$more;
		}

		if("/"==substr($url, 0,1)) $url=substr($url,1);
		if('$'==substr($url, 0,1)) $url=substr($url,1);

		$items = $this->getM($items,$url);

		return $items['items'];

	}


	function getM($items,$url=NULL){

		$items2 =[];
		$items3 =[];
		$iii    =0;
		$active =false;

		foreach($items as $ii=>$item){

			if(!is_array($item)){
				$item0=[];
				// prin($item);
				// if(!is_numeric($ii))
				$item0['url']=maskUrl($ii);
				$item0['name']=$item;
				$item=$item0;
			}

			$items2[$iii]=$item;
			$iii++;

		}

		
		foreach($items2 as $ii=>$item){
			
			if($url==$item['url'] or enhay($url,$item['url'])){
				$items2[$ii]['class'] =trim( (isset($items2[$ii]['class'])?$items2[$ii]['class']:'' ).' active');
				$active                =true;
			}
			
			if( isset($item['items']) and sizeof($item['items'])>0){
				$getm=$this->getM($item['items'],$url);
				$items2[$ii]['items']=$getm['items'];
				if( isset($getm['class']) and enhay($getm['class'],'active') )
					$items2[$ii]['class']=trim($items2[$ii]['class'].' active');		
			}

		}
		$ret=['items'=>$items2];
		if($active)
			$ret['class']=trim( ( (isset($ret['class']))?$ret['class']:'') .' active');

		return $ret;

	}


	public function getFromFile($file){

		return require $this->dir_provider.$file.'.php';

	}


	public function title( $url = NULL ){

		$mod = $this->models->getModelByUrl($url);
		return $mod['titulo'];

	}


	public function getMenuLeft( $module = NULL ){

		$menu  =[];
		$menu2 =[];
		$alias =[];

		foreach($this->models->getModels() as $key => $val){

			if($val['alias_grupo']){

				$alias[$val['grupo']]=strtoupper($val['alias_grupo']);

			}

			if(!in_array($val['grupo'],$grupos)){

				$menu[$val['grupo']]['name']=strtoupper($val['grupo']);

			}

			if($val['seccion']){

				$menu[$val['grupo']]['menu'][]=['section'=>$val['seccion']];

			}

			$arra=[];
			$arra['name'] =$val['menu_label'];
			$arra['url']  =$val['archivo'];

			if($module==$arra['url']){

				$arra['active']=true;
				$menu[$val['grupo']]['active']=true;

			}

			$menu[$val['grupo']]['menu'][]=$arra;

		}

		foreach($alias as $key => $val){

			$menu[$key]['name']=$val;

		}

		foreach($menu as $key => $val){

			$temp=$val['menu'];
			unset($val['menu']);
			$val['menu']=$temp;
			$menu2[]=$val;

		}
		$menu=$menu2;

		return $menu;
		// return $this->models->getModels();
	}


	public function getFilters( $module = NULL ){

		return array();

	}


	public function getGrid( $module = NULL ){

		return array();

	}

}

