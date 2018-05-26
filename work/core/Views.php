<?php 

namespace core;

Class Views {


	var $views;
	var $vars    = [];
	var $options = [];
	var $params  = [];
	var $vars_array  = [];


	public function __construct( $views , $vars=[] ){

		$this->views                   =$views;
		
		$this->vars                    =$vars;
		
		$this->options['jadeCompiled'] = false;

	}

	public function assign ($var,$val=NULL){

		if(is_array($var) and $val==NULL ){
			foreach($var as $index=>$value){
				$this->vars[$index]=$value;				
			}
		} else {
			$this->vars[$var]=$val;
		}
		return $this;

	}

	public function setOption ($var,$value){

		$this->options[$var]=$value;
		return $this;
	}

	public function render ( $file='index', $vars=[] ,$output=false){

		session_start();

		global $vars_array;

		global $start;

		$seo_link='seo';
		$tool_link='tool';
		$info_link='info';

		if($this->options['jadeCompiled']){

			require_once "../work/vendor/php/jade/runtime.php";
			
		}


		//fix vars
		$this->vars['head_title']=($this->vars['head_title_strict']!='')?$this->vars['head_title_strict']:mb_ucwords($this->vars['head_title']);


		//
		
		$vars = array_merge($this->vars,$vars);
		
		// prin($vars);

		extract($vars);

		// prin($vars);
		//buscar dentro del array, los indices 'url'
		// function lokkingfor($vass){
		// 	$uris=[];
		// 	function looking($vas){
		// 		global $uris;
		// 		foreach($vas as $ii=>$yy){
		// 			if(is_array($yy)){
		// 				looking($yy);
		// 			}
		// 			else {
		// 				if($ii=='url' or $ii=='uri')
		// 				{
		// 					// prin($yy);
		// 					// array_push($uris,$yy);
		// 					$uris[]=$yy;
		// 					// prin($uris);
		// 				}
		// 			}
		// 		}
		// 		return;
		// 	}
		// 	looking($vass);
		// 	prin($uris);
		// 	return $uris;
		// }
		
		// prin(lokkingfor($vars));

		// prin($vars['params']);


		if(isset($vars['params'][$tool_link])){

			if($vars['params'][$tool_link]=='0'){
				
				$_SESSION[$tool_link]='0';
				unset($_SESSION[$tool_link]);

			} else {

				$_SESSION[$tool_link]='1';

			}
			
			redir(($_SERVER['REDIRECT_URL'])?$_SERVER['REDIRECT_URL']:$vars['link_home']);

		}



		if(isset($vars['params'][$info_link])){

			if($vars['params'][$info_link]=='0'){
				
				$_SESSION[$info_link]='0';
				unset($_SESSION[$info_link]);

			} else {

				$_SESSION[$info_link]='1';

			}
			
			redir(($_SERVER['REDIRECT_URL'])?$_SERVER['REDIRECT_URL']:$vars['link_home']);

		}



		if(
			// $vars['localhost']=='1' and 
			$_SESSION[$info_link]=='1'
			){

			$pre_output='';
			foreach([
				'getseo' =>'seo',
				'css'    =>'css',
				'start'  =>'vars',
			] as $uuu=>$ooo){
			$pre_output.='<li '.((isset($vars['params'][$uuu]))?'class="active"':'').'><a href="'.$vars['uri'].'?'.$uuu.'">'.$ooo.'</a></li>';
			}
			$pre_output.='<li '.((isset($vars['params']['forms']))?'class="active"':'').'><a id="debemail" href="'.$vars['uri'].'?forms#">forms</a></li>'; 

			$pre_output.=$out.'
			</li>
			<li class="right" style="margin-right:5px;">
			<a rel="nofollow" href="'.$vars['uri'].'?'.$info_link.'=0">X</a></li>
			';

			$pre_output='<nav class="debug_menu">
			<ul class="menu">'.
			$pre_output.
			'</ul></nav>
			<style>body { padding-top: 50px; }</style>';

		}



		if(
			// $vars['localhost']=='1' and 
			$_SESSION[$tool_link]=='1'
			){

			$pre_output='';
			$pre_output.='<li class="nounder"><a><b style="color:green;">Controller :</b> <strong>'.$vars['controller'].'</strong></a></li>';
			$pre_output.='<li class="nounder"><a><b style="color:green;">Method :</b> <strong>'.$vars['method'].'</strong></a></li>';

			$pre_output.='<li '.((isset($vars['params']['debug']))?'class="active"':'').'><a id="debnu" href="'.$vars['uri'].'?debug#">debug</a></li>'; 

			foreach([
				'getseo'     =>'seo',
				'css'        =>'css',
				'components' =>'components',
				'start'      =>'vars',
				'routes'     =>'routes',
			] as $uuu=>$ooo){
			$pre_output.='<li '.((isset($vars['params'][$uuu]))?'class="active"':'').'><a href="'.$vars['uri'].'?'.$uuu.'">'.$ooo.'</a></li>';
			}

			$pre_output.='<li '.((isset($vars['params']['forms']))?'class="active"':'').'><a id="debemail" href="'.$vars['uri'].'?forms#">forms</a></li>'; 

			$pre_output.=$out.'
			</li>
			<li class="right" style="margin-right:5px;">
			<a rel="nofollow" href="'.$vars['uri'].'?'.$tool_link.'=0">X</a></li>';
			if($vars['localhost']=='1'){
				$pre_output.='<li class="right" id="debug_submenu"></li>';
			}

			$pre_output='<nav class="debug_menu">
			<ul class="menu">'.
			$pre_output.
			'</ul></nav>
			<style>body { padding-top: 50px; }</style>';

		}

		// prin($vars);


		if(isset($vars['params'][$seo_link])){

			if($vars['params'][$seo_link]=='0'){
				
				$_SESSION[$seo_link]='0';
				unset($_SESSION[$seo_link]);

			} else {

				$_SESSION[$seo_link]='1';

			}
			
			redir(($_SERVER['REDIRECT_URL'])?$_SERVER['REDIRECT_URL']:$vars['link_home']);

		}

		if(isset($vars['params']['css'])){

			$cssjson=APP.'/config/elements/css.json';

			if($vars['localhost']=='1'){
				
				// prin('hey');
				// $strings=['googleFonts','color','header','menu','main','footer'];
				$strings=['googleFonts','color'];
				$stylusapp = file(APP.'/sources/stylus/app.styl');
				foreach($stylusapp as $line){
					foreach($strings as $string){
						if(substr($line,0,strlen($string))==$string){
							list($var,$val)=explode('=',$line);
							list($val,$val2)=explode('+ angle',$val);
							$var=trim($var);
							$val=trim($val);

							if( enhay($var,'color') ){

								if(substr($val,0,5)=='color'){

									$lineA[$var]=$val.' = '.$lineA[$val];

								} else {

									$lineA[$var]='<div class="debug_box" style="background:'.$val.';">
									<span style="color:#'.oppColour($val).';">'.$val.'</span>
									</div>';

								}

							} elseif($var=='googleFonts'){

								eval("\$fonts=".$val.";");
								$fontsa=explode("|",$fonts);
								$val='';
								foreach($fontsa as $font){
									$val.="<div class='debug_fonts'><a href='https://fonts.google.com/specimen/".$font."'
									style='font-family:".$font.";'
									target='_blank'
									>$font</a></div>";
								}
								$lineA[$var]=$val;

							} else {

								$lineA[$var]=$val;

							}
						}
					}
				}
				
				file_put_contents($cssjson,json_encode($lineA));

			}

			ob_start();

				$json_array=json_decode(file_get_contents($cssjson),FALSE);
				foreach($json_array as $ja=>$aj)
					$json_array2[$ja]=$aj;

				myprint_r($json_array2);

				$pre_output.=ob_get_contents();
			
			ob_end_clean();

		}
	
		if(isset($vars['params']['components'])){


			$components=require APP.'/config/components.php';
			$components_work= require '../work/app/config/components.php';

			$items_components=array_merge($components_work,$components);



			$components_dir   = APP.'/sources/components';

			$items_components2=[];
			foreach($items_components as $lii=>$com0){


				list($com,$option)=explode("|",$com0);
				// $options=explode(",",$option);
				$expl=explode("/",$com);
				$size=sizeof($expl);
				if($size==2){

					$name=$expl[1];
					$directorio=$expl[0].'/'.$components_dir;
					$externals[]=['dir'=>$directorio.'/'.$name,'file'=>$name];
					$predir=$expl[0];

				}elseif($size==1){
					// local
					$name=$com;
					$directorio=$dir.'/'.$components_dir;
					$local_components[]=$com;
					$predir=Server::directory();
				
				}
				// prin($predir);
				$final_route=$predir.'/'.$components_dir.'/'.$name;


				$final_jade   =$final_route.'/'.$name.'.jade';
				$final_stylus =$final_route.'/'.$name.'.styl';
				$final_es6    =$final_route.'/'.$name.'.js';

				foreach($menu_footer as $bb){
				// prin($bb['items']);
				
				if($bb['rel']=='external'){

				foreach($bb['items'] as $bbb){

					// prin($bbb);
					$bbb_a=explode('/',$bbb['url']);
					// $menu_footer_a[$bbb['name']]=$bbb_a[sizeof($bbb_a)-1];
					$menu_footer_a[$bbb_a[sizeof($bbb_a)-1]]=$bbb['url'];

				}

				}

				}

				// prin($menu_footer_a);

				if($predir!="work"){
					$com0=str_replace($predir,"<a href='".$menu_footer_a[$predir]."' style='color:green;font-weight:bold;'>".$predir."</a>",$com0);
				}

				$compotext =$com0."<br><textarea style='width:700px;height:5em;background:white;'>";
				$compotext.=$final_jade."\n";
				$compotext.=$final_stylus."\n";
				if($option=='es6'){
					$compotext.=$final_es6;
				}
				$compotext.="</textarea>";




				$items_components2[$predir][$lii]=$compotext;

			}

			ob_start();


				myprint_r(
					$items_components2
				);

				$pre_output.=ob_get_contents();
			
			ob_end_clean();

		}

		if(isset($vars['params']['forms'])){

			$start_email_test=$start['email_test'];
			
			$start['email_test']=true;

			$routes = new Routes();
			$routes_items=$routes->get_routes();
			foreach($routes_items as $uno_debug=>$dos){

				parse_str($dos,$tres);
				if($tres['controller']!='Forms') continue;

				$controller_exists=file_exists(APP.'/controllers/'.$tres['controller'].'.php');
				$controller_replace=($controller_exists)?
				'<strong style="color:green;">'.$tres['controller'].'</strong>':
				'<strong style="color:red;">'.$tres['controller'].'</strong>';

				$dos=str_replace($tres['controller'],$controller_replace,$dos);

				if($controller_exists){


					$forms=explode('|',str_replace(['/(',')$'],'',$uno_debug));


					foreach($forms as $method){
						$met= str_replace('-','_',$method);
						eval("\$obj = new controllers\\".ucfirst($tres['controller'])."(['noshow'=>true]);");
						$method_exists=method_exists($obj,$met);

						ob_start();

						$obj->$met();

						$form_vars = json_decode(ob_get_contents(),TRUE);

						ob_end_clean();


						$form_item['nombre']=$obj->name;

						$form_item['admin_emails']=$obj->admin_emails;


						$form_item['campos']=$obj->fields;
						foreach($form_item['campos'] as $nam=>$field){

							if(in_array($nam,['telefono','movil'])){ $posttt[$nam]='999888777'; }
							elseif($nam=='email'){ $posttt[$nam]='testprueba@gmail.com'; }
							elseif($nam=='comentario'){ $posttt[$nam]='Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta dignissimos ratione ut quod pariatur, eligendi debitis! Repudiandae ducimus magni esse temporibus voluptatem, vitae dolorum vel porro nam, perferendis quod culpa?'; }
							elseif($nam=='nombre'){ $posttt[$nam]='Nombres y Apellidos'; }
							elseif( sizeof($field['options'])>0 ){ 
								$posttt[$nam]=$field['options'][sizeof($field['options'])-1];
							}
							else{ 
								$posttt[$nam]=$field['label'].' random'; 
							}

						}


						$obj->setForce(
							[
								'_POST'	=>	$posttt,
								'_SERVER'=>	['REQUEST_METHOD'=>'POST']
							]
						);

						ob_start();

						$obj->$met();

						$form_vars = json_decode(ob_get_contents(),TRUE);

						ob_end_clean();


						// prin($form_vars_post);

						// $form_item['fields']=$form_vars['fields'];
						$form_item_name=$obj->name;


						// prin($form_item_name_a);

						$dir_emails=APP."/views/emails/";
						// prin($dir_emails);

						$files_emails=scandir($dir_emails);


						$form_item_name_a=str_replace([' ','á','é','í','ó','ú'],['_','a','e','i','o','u'],$form_item_name);

						// prin(strlen($form_item_name_a));

						
						// if(0)
						foreach($files_emails as $fil){

							if(!in_array($fil,['.','..'])){

								$empieza=str_replace([' ','á','é','í','ó','ú'],['_','a','e','i','o','u'],$fil);

								$empieza=substr($empieza,0,strlen($form_item_name_a));						

								// prin("|$empieza(".strlen($empieza).")|$form_item_name_a(".strlen($form_item_name_a).")|");

								if($empieza==$form_item_name_a){

									// prin("$empieza==$form_item_name_a  ---   $method - $fil");
									if(file_exists($dir_emails.$fil)){
										// $email_files[]=$fil;
										$email_files[]=$fil.'<br><iframe style="width:600px;height:700px;border:0;	" src="'.$start['static'].'/../'.$dir_emails.$fil.'" ></iframe>';
										// $email_files[$fil]=$dir_emails.$fil;
										// $email_files[$file]=file_get_contents($dir_emails.$fil);
									}

								}

							}

						}

						// prin($email_files);
						$form_item['emails']=$email_files;
						unset($email_files);


						$form_items[$method]=$form_item;
						unset($form_item);
						// prin($form_items);

						// exit();


						// $method_replace=($method_exists)?
						// '<strong style="color:green;">'.$method.'</strong>':
						// '<strong style="color:red;">'.$method.'</strong>';
						// // prin(" $method = $method_replace ");
						// $uno_debug=str_replace($method,$method_replace,$uno_debug);



					}
				

				}
		// $obj->$met();
		// 
				// $routes_items2[$uno_debug]=$dos;

			}

			// prin($routes_items2);
			// foreach($routes_items2 as $uno=>$dos){
			// 	echo $uno.'<br>';
			// }

			ob_start();

				myprint_r(
					$form_items
				);

				$form_items2=$form_items;

				$pre_output.=ob_get_contents();
			
			ob_end_clean();

			// prin($form_items2);
			$outtt="<div id='list_emails'><ul class='submenu'>";
			foreach($form_items2 as $isl=>$lis){
				$outarr[]="<li><a href='".$vars['uri']."?forms#debug_".$isl."'>".$isl."</li></a>";
			}
			$outtt.=implode('',$outarr);
			$outtt.="</ul></div>";


			$pre_output=$outtt.$pre_output;


			$start['email_test']=$start_email_test;

		}


		if(isset($vars['params']['routes'])){

			$routes = new Routes();
			$routes_items=$routes->get_routes();
			foreach($routes_items as $uno_debug=>$dos){
				parse_str($dos,$tres);
				$controller_exists=file_exists(APP.'/controllers/'.$tres['controller'].'.php');
				$controller_replace=($controller_exists)?
				'<strong style="color:green;">'.$tres['controller'].'</strong>':
				'<strong style="color:red;">'.$tres['controller'].'</strong>';

				$dos=str_replace($tres['controller'],$controller_replace,$dos);

				if($controller_exists){

					if(substr($tres['method'],0,1)!='$'){
					
					$met= str_replace('-','_',$tres['method']);
					eval("\$obj = new controllers\\".ucfirst($tres['controller'])."();");

					$method_exists=method_exists($obj,$met);
					// prin($methos_exists);


					$method_replace=($method_exists)?
					'<strong style="color:green;">'.$tres['method'].'</strong>':
					'<strong style="color:red;">'.$tres['method'].'</strong>';

					$dos=str_replace($tres['method'],$method_replace,$dos);

					} else {

						$methods=explode('|',str_replace(['/(',')$'],'',$uno_debug));
						foreach($methods as $method){
							$met= str_replace('-','_',$method);
							eval("\$obj = new controllers\\".ucfirst($tres['controller'])."();");
							$method_exists=method_exists($obj,$met);

							$method_replace=($method_exists)?
							'<strong style="color:green;">'.$method.'</strong>':
							'<strong style="color:red;">'.$method.'</strong>';
							// prin(" $method = $method_replace ");
							$uno_debug=str_replace($method,$method_replace,$uno_debug);
							// $uno_debug=$uno_debug;
							// $uno_debug='';

						}
					}

				}
		// $obj->$met();
		// 
				$routes_items2[$uno_debug]=$dos;

			}

			// prin($routes_items2);
			// foreach($routes_items2 as $uno=>$dos){
			// 	echo $uno.'<br>';
			// }

			ob_start();

				myprint_r(
					$routes_items2,5
				);

				$pre_output.=ob_get_contents();
			
			ob_end_clean();

		}
	

		if(isset($vars['params']['start'])){


			ob_start();

				$start_array=require APP.'/config/start.php';

				if($vars['localhost']!='1'){
					unset($start_array['local']);
					unset($start_array['remote']);
					unset($start_array['visitors']);
				}

				myprint_r(
					$start_array
				);

				$pre_output.=ob_get_contents();
			
			ob_end_clean();

		}

		if($_SESSION[$seo_link]=='1' or isset($vars['params']['getseo'])){

		// prin($vars['canonical']);
		// prin($vars['baseurl'].$vars['uri']);

		if($vars['canonical']==$vars['baseurl'].$vars['uri']){
			$check = '<strong style="color:green;">cumple</strong>'; 
		} else { 
			$check = '<strong style="color:red;">no cumple</strong>'; 
		}

			ob_start();

				myprint_r(
					[
					'title'       =>$vars['head_title'],
					'description' =>$vars['head_description'],
					'keywords'    =>$vars['head_keywords'],
					'canonical'   =>$vars['canonical'] .' '.$check,
					'uri'   		  =>$vars['uri']
					// 'cookie'		  =>$_COOKIE,
					]
				);

				echo '<div><a rel="nofollow" class="btn right" style="display:none; position:absolute; right: 1em; top:60px;" href="'.$vars['uri'].'?'.$seo_link.'=0">salir</a></div>';

				$pre_output.=ob_get_contents();
			
			ob_end_clean();

		}

		global $debug_arrays;
		
		if(isset($vars['params']['debug'])){

			ob_start();


				// myprint_r($vars);

				if($vars['params']['debug']==''){

					myprint_r($vars);
					
					$debug_arrays2=$debug_arrays;
					// prin($debug_arrays);

				} else {

					echo '<div style="display:none;">';
					myprint_r($vars);
					echo '</div>';

					$debug_arrays2=$debug_arrays;

					myprint_r($vars[$vars['params']['debug']],false);			

				}

				echo '<div><a rel="nofollow" class="btn right" style="display:none;position:absolute; right: 1em; top:60px;" href="'.$vars['uri'].'">salir</a></div>';		

				$pre_output.=ob_get_contents();

			ob_end_clean();


			$outtt="<div id='list_debug'><ul class='submenu'>";
			foreach($debug_arrays2 as $lis){
				$outarr[]="<li><a href='".$vars['uri']."?debug#debug_".$lis."'>".$lis."</li></a>";
			}
			$outtt.=implode('',$outarr);
			$outtt.="</ul></div>";


			$pre_output=$outtt.$pre_output;

			// $pre_output='<nav  class="debug_menu">
			// <ul class="menu">'.
			// '<li class="right"><a href="'.$vars['uri'].'?debug">X</a></li>'.
			// '<li class="right" id="debug_submenu"></li>'.
			// $pre_output.
			// '</ul>
			// </nav>';
			
			// $pre_output.='<style>body { padding-top: 50px; }</style>';
			// $pre_output='';
			// exit();

		}


		if(isset($vars['params']['debugjson'])){

			if($vars['params']['debugjson']==''){

				echo json_encode($vars);

			} else {

				echo json_encode($vars[$vars['params']['debugjson']]);

			}

			exit();

		}


		if(isset($vars['params']['json'])){

			$rout="app/sources/jade/test";

			$vars['base']=str_replace('//localhost/frame','//localhost:8080',$vars['base']);

			$vars['link_home']='./html/';

			echo json_encode($vars);

			file_put_contents("json/".$file.".json",json_encode($vars));

			exit();

		}


		if(isset($vars['params']['array'])){

			$vars['base']=str_replace('//localhost/frame','//localhost:8080',$vars['base']);

			$vars['link_home']='./html/';

			$vars_array[$file]=$vars;

			return;

		}

		// prin('detalle');

		$file_out=APP."/".$this->views."/".$file.".php";
		// prin($file_out);

		if($file_out=='app/views/php/inline/email_default.php'){
			// prin($vars);
		}

		if($vars['show_view']){

			if(!file_exists($file_out)) die ($file_out." not found"); 

			if($output) {
				ob_start();
			}
			
			// prin("show: $file_out");
			require $file_out;


			if($output){ 
				$out = ob_get_contents();
				ob_end_clean();
				return $out;
			}
			exit();

		} else {

			// prin("noshow: $file_out");
			echo json_encode($vars);
			// echo '';

		}

	}


}