<?php 

foreach($tbcampos as $tbcampA){
	switch($tbcampA['tipo']){ 									 
		case "fch":
			if($tbcampA['rango']){
			list($uuno,$ddos)=explode(",",$tbcampA['rango']);
			$FromYear = date("Y",strtotime($uuno));
			$ToYear = date("Y",strtotime($ddos));										
			} else {
			$FromYear = date("Y")-99;
			$ToYear = date("Y")+1;
			}
			?>								
			input_date('in_<?php echo $tbcampA['campo']?>','in_<?php echo $tbcampA['campo']?>_span',<?php echo $FromYear;?>,<?php echo $ToYear;?>,'<?php echo $tbcampA['time'];?>');								
			<?php if(trim($tbcampA['default'])!=''){ 
			if(trim($tbcampA['default'])=="now()"){ $tbcampA['default']=date("Y-m-d H:i:s"); }
			if(trim($tbcampA['default'])=="tomorrow()"){ $tbcampA['default']=date("Y-m-d H:i:s",strtotime("+1 day")); }
			?>
			$('in_<?php echo $tbcampA['campo']?>_d').value='<?php echo substr($tbcampA['default'],8,2);?>';
			$('in_<?php echo $tbcampA['campo']?>_m').value='<?php echo substr($tbcampA['default'],5,2);?>';
			$('in_<?php echo $tbcampA['campo']?>_a').value='<?php echo substr($tbcampA['default'],0,4);?>';						
			$('in_<?php echo $tbcampA['campo']?>_t').value='<?php echo substr($tbcampA['default'],11,2);?>';
			$('in_<?php echo $tbcampA['campo']?>').value='<?php echo $tbcampA['default']?>';
			<?php } ?>
			<?php if($tbcampA['frozen']=='1'){ ?>
			$('in_<?php echo $tbcampA['campo']?>_d').setProperty('disabled','true');
			$('in_<?php echo $tbcampA['campo']?>_m').setProperty('disabled','true');
			$('in_<?php echo $tbcampA['campo']?>_a').setProperty('disabled','true');
			$('in_<?php echo $tbcampA['campo']?>_t').setProperty('disabled','true');
			<?php }			
		break; 										
		case "html":                        
			?>mooeditable_<?php echo $tbcampA['campo']?> = $('in_<?php echo $tbcampA['campo']?>').mooEditable({
					actions: '<?php echo $MEactions;?>',
					externalCSS: 'css/Editable.css',
					baseCSS: '<?php echo $MEbaseCSS;?> <?php echo $tbcampA['css']?>' 
				});							
			<?php if(sizeof($tbcampA['botones'])>0){ ?>
			MooEditable.Actions.Mas_<?php echo $tbcampA['campo']?> = {
					title: 'INSERTAR',
					type: 'button-overlay',
					options: {
						mode: 'text',
						overlayHTML: (function(){
								var html = '';
								<?php 
								if(!is_array($tbcampA['botones'])){
									list($primO,$tablaO,$whereO)=explode("|",$tbcampA['botones']);
									list($nombreO,$textoO)=explode(",",$primO);
									$oopciones=select(array($nombreO,$textoO),$tablaO,procesar_dato($whereO));
									//$ryr=0;
									$tbcampA['botones']=array();	
									foreach($oopciones as $oOo){
										//$ryr++;
										//if(in_array($ryr,array(2,9))){
										$tbcampA['botones'][$oOo[$nombreO]]=$oOo[$textoO];
										//}
									}
								}
								foreach($tbcampA['botones'] as $name=>$html){ echo 'html += "<a href=\'#\' rel=\'<!--'.$name.'-->'.
								str_replace("\\\\\"","\\\"",str_replace("\"","\\\"",str_replace(array("\n","\r","\s","\t"),"",mooeditable_replace($html,$tbcampA['variables']))))
								.'\'>'.$name.'</a>";
';
								}
								?>
								return html;
							})()
					},
					command: function(buttonOverlay, e){
						this.selection.insertContent($(e.target).get('rel'));
					}
				};
			mooeditable_<?php echo $tbcampA['campo']?>.toolbar.addItem('Mas_<?php echo $tbcampA['campo']?>');				
			<?php }
		break;
		case "hid":
			if($tbcampA['directlink']!=''){
				list($uno,$dos,$tres,$minchar)=explode("|",$tbcampA['directlink']);
				?>
				new Meio.Autocomplete.Select('in_<?php echo $tbcampA['campo']?>_dl', "load_json.php?s=<?php echo $uno."|".$dos."|".$tres;?>", {
					minChars:<?php echo ($minchar!='')?$minchar:1; ?>,
					selectOnTab :true,
					maxVisibleItems:12,
					requestOptions: {'method':'get'},
					valueField: $('in_<?php echo $tbcampA['campo']?>'),
					valueFilter: function(data){
						$('in_<?php echo $tbcampA['campo'];?>').value=data.i;
						<?php if($tbcampA['ondlselect']=='1'){ echo "ondlselect(data.i);"; } ?>
						<?php if($tbcampA['load']!=''){ 
								$LoaDs=explode(";",$tbcampA['load']);
								foreach($LoaDs as $LoaDd){
								if(enhay($LoaDd,"||||")){
								$looop=explode("||||",trim($LoaDd));
								?>load_datos_fecha('<?php echo procesar_loads($looop[1],$tbcampA['campo'])?>');<?php 
								}elseif(enhay($LoaDd,"|||")){
								$looop=explode("|||",trim($LoaDd));
								?>load_datos('<?php echo procesar_loads($looop[1],$tbcampA['campo'])?>');<?php 
								}else{
								$looop=explode("||",trim($LoaDd));
								?>load_combo('<?php echo $looop[0]?>','<?php echo procesar_loads($looop[1],$tbcampA['campo'])?>');<?php 
								} } 
								} ?>
						return data.i;
					},					
					syncName: false,
					filter: {
						type: 'contains',
						path: 'v'
					},					
				});
				<?php
			
			} else {
			
				$GGET1=$_GET[str_replace(array("[","]"),array("",""),$tbcampA['default'])];
				$GGET2=$_SESSION[str_replace(array("[","]"),array("",""),$tbcampA['default'])];
				$GGET=($GGET1!='')?$GGET1:$GGET2;
					list($primO,$tablaO,$whereO)=explode("|",$tbcampA['opciones']);
					list($idO,$camposO)=explode(",",$primO);
					$camposOA=array();
					$camposOA=explode(";",$camposO);						
				$oopciones=select(array_merge(array($idO),$camposOA),$tablaO,procesar_dato($whereO));
				if(!($tbcampA['combo']=='1' or $GGET=='' )){						                     
				if($tbcampA['load']!=''){ 
				$looop=explode("||",$tbcampA['load']);
				/*?>$("in_<?php echo $tb?>_<?php echo $tbcampA['campo']?>").value='';<?php*/
				?>load_combo('<?php echo $looop[0]?>','<?php echo $looop[1]?>','<?php echo $GGET;?>');<?php	
				}
				}
			
			}
		break;                    
		case "img":?>$("upl_<?php echo $tb?>_<?php echo $tbcampA['campo']?>_0").innerHTML=render_upload('<?php echo $tb?>','<?php echo $tbcampA['campo']?>','','<?php echo $USU_IMG_DEFAULT;?>');<?php
		break;
		case "sto":?>$("upl_<?php echo $tb?>_<?php echo $tbcampA['campo']?>_0").innerHTML=render_upload_sto('<?php echo $tb?>','<?php echo $tbcampA['campo']?>','','<?php echo $USU_IMG_DEFAULT;?>');<?php
		break;					
	} 
} 

?>