<?php //á

//  REDIRECCIONAR A LOGIN //
if($_GET['redir']!=''){

	$_SESSION['redir_after_login']=$_GET['redir'];
	redireccionar_a($SERVER['BASE'].$COMMON['url_login']);
				
}
// VERIFICAR LOGIN //
web_verificar_sesion(array(
							'on_true'	=> $COMMON['url_home'],
							'on_false'	=> NULL
							));
/////////////////////

include_once("formularios/formularios.php");

			$FORM=$FORMULARIO[$PARAMS['conector']]=array(
					'nombre'=>$PARAMS['conector']
					,'titulo'=>"Ingresar"					
					,'legend'=>"Ingrese su usuario y contraseña"
					,'ajax'=>'1'
					,'action'=>'ajax.php?mode=form&tab='.$PARAMS['this'].'&name='.$PARAMS['conector']
					,'url'=>(!empty($_SESSION['redir_after_login']))?$_SESSION['redir_after_login']:''
					,'exito'=>''
					,'error'=>'Email o contraseña incorrecta'				
					//,'submit'=>' type="image" src="'.$SERVER['BASE'].THEME_PATH.'img/ico_login.jpg" '
					,'submit'=>' type="submit" value="Ingresar" '						
					//,'submiting'=>' src="'.$SERVER['BASE'].THEME_PATH.'img/ico_enviando.jpg" '					
					,'pie'=>'Si usted es nuevo <a href="'.$COMMON['url_registro'].'" >Regístrese</a><br>Si olvidó su contraseña <a href="'.$COMMON['url_olvido_clave'].'">haga clic aquí</a>'
					,'campos'=>array(
						array(
							'label'=>'EMAIL'
							,'campo'=>array('email')
							,'tipo'=>'input_text'
							,'validacion'=>"validate['required','email']"
							)						
						,array(
							'label'=>'CONTRASEÑA'
							,'campo'=>array('password')
							,'tipo'=>'input_password'
							,'validacion'=>"validate['required']"
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
							if(json.t=='error'){
							new Element('div', {
								'class': 'mensaje mensaje_'+json.t,
								'html': json.m,
								'id': 'mensaje_'+json.n										
							}).inject(\$(json.n+'_form_body'), 'before');
							\$0(json.n+'_form_body');
							setTimeout(\"\$('mensaje_\"+json.n+\"').destroy(); \$1('\"+json.n+\"_form_body'); \",5000);							
							} else if(json.t=='exito'){
								if(json.u!=''){
									location.href=json.u;
								} else {
									location.reload();
								}
							}
					"					
			);
					
						
			if($_SERVER['REQUEST_METHOD']=='POST'){
						
				$return = select_dato(
						"id"
						,"usuarios"
						,"where email=\"".$_POST['email']."\" and password=\"".$_POST['password']."\"  and  visibilidad='1' "
						,0
						);
						
				$verificar_login=($return=='')?false:true;
				
				if($verificar_login){

						$_SESSION['login']=select_fila(
						"id,nombre,email"
						,"usuarios"
						,"where id='$return'"
						,0
						);				
						$_SESSION['login']['status']=1;
					
						echo json_encode(array(
									't'=>'exito'
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