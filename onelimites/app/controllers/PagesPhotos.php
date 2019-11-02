<?php 
namespace controllers;

class PagesPhotos extends Controller {

	function grid($params){


		parent::index($params);

		//asing vars
		$this->view->assign(
			[

			]
		);

		//only for data test
		if($this->data_test){
			$this->view->assign(
				$this->data_tests->getData([

				])
			);
		}

		//render the view
		$this->view->render(
			
			'layout_pagesphotos_grid'

		);		

	}


	function detail($params){


		parent::detail($params);

		//asing vars
		$this->view->assign(
			[

			]
		);

		//only for data test
		if($this->data_test){
			$this->view->assign(
				$this->data_tests->getData([

				])
			);
		}

		//render the view
		$this->view->render(
			
			'layout_pagesphotos_detail'

		);		

	}



}
