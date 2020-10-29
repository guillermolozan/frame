<?php //á

// VERIFICAR LOGIN //
web_verificar_sesion(array(
							'on_true'	=> NULL,
							'on_false'	=> $COMMON['url_home']
							));
/////////////////////


			$FORM=$FORMULARIO[$PARAMS['conector']]=array(
					'nombre'=>$PARAMS['conector']
					,'titulo'=>"Cambiar Clave"					
					,'legend'=>"Ingrese la nueva clave"
					,'ajax'=>'1'
					,'action'=>'ajax.php?mode=form&tab='.$PARAMS['this'].'&name='.$PARAMS['conector']
					,'url'=>$COMMON['url_home']
					,'exito'=>'Su clave ha sido cambiada exitosamente'
					,'error'=>'Hubo un problema y no se pudo guardar la información, por favor vuelva a intentarlo.'				
					//,'submit'=>' type="image" src="'.$SERVER['BASE'].THEME_PATH.'img/ico_login.jpg" '
					,'submit'=>' type="submit" value="Enviar" '						
					//,'submiting'=>' src="'.$SERVER['BASE'].THEME_PATH.'img/ico_enviando.jpg" '					
					,'pie'=>''
					
					,'tabla'=>'usuarios'
					
					,'campos'=>array(
						'password'=>array(
							'label'=>'Password'
							,'tipo'=>'input_password'
							,'campo'=>array('password')
							,'validacion'=>"validate['required']"							
							,'value'=>array($CARGAR['password'])
						)
						,'check_user_password'=>array(
							'label'=>'Confirmar Password'
							,'tipo'=>'input_password'
							,'campo'=>array('check_user_password')
							,'validacion'=>"validate['required','confirm[password]']"							
							,'value'=>array($CARGAR['check_user_password'])
						)	
						/*
						,array(
							'label'=>'No cerrar sesión'
							,'campo'=>array('mantener_sesion')
							,'tipo'=>'input_check'
						)
						*/
						
					)			
					,'complete'=>"
							var json=JSON.decode(ee,true);
							new Element('div', {
								'class': 'mensaje mensaje_'+json.t,
								'html': json.m,
								'id': 'mensaje_'+json.n										
							}).inject(\$(json.n+'_form_body'), 'before');
							\$0(json.n+'_form_body');
							setTimeout(\"\$('mensaje_\"+json.n+\"').destroy(); if('\"+json.t+\"'=='error'){\$1('\"+json.n+\"_form_body');}else{if('\"+json.u+\"'!=''){	location.href='\"+json.u+\"'; } else { location.reload(); } } \",10000);							

					"					
			);
					
						
			if($_SERVER['REQUEST_METHOD']=='POST'){
						
						
				foreach($FORM['campos'] as $CAMP){
					foreach($CAMP['campo'] as $CM){
						$data[$CM]=$_POST[$CM];
					}
				}
				unset($data['check_user_password']);	
									
				$update = update(
						$data
						,$FORM['tabla']
						,"where id=\"".$_SESSION['login']['id']."\" "
						,0
						);
										
				if($update){
					
						echo json_encode(array(
									't'=>'exito'
									,'m'=>$FORM['exito']
									,'u'=>$FORM['url']
									,'n'=>$FORM['nombre']									
									));	
											
				} else {
				
						unset($_SESSION['login']);
						echo json_encode(array(
									't'=>'error'
									,'m'=>$FORM['error']
									,'n'=>$FORM['nombre']
									));						
				
				}
				
	
	
			} 

?>