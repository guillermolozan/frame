<?php //á
?>
    <!--FORM INICIO-->
    <form id="formulario_<?php echo $FORM['nombre'];?>" method="post" name="<?php echo $FORM['nombre'];?>" class="formularios" onsubmit="return false;" >
    
    <div id="<?php echo $FORM['nombre'];?>_form_body" class="form_body">
    <?php 
	if(0){
	web_render_form($FORM); 
	} else {
		echo "<div style='text-align:center;padding:220px 0;font-size:16px;'>Página en construcción</div>";
	}
	?>
    <div id="costo_total"></div>
    </div>
    
    <?php //web_render_form_javascript($FORM); ?>        
    
    </form>
    <!--FORM FIN--> 

    <div class="clean"></div>    

<script>
	
	$('calculadora_submit').addEvent('click', function(){
		
		var cv; var cp; var CF; var cif; var cfl; var arancel; var fob; var flete; var igv; var percepcion; var delivery; var aplica; var impuesto; var seguro;
		
		var bool_delivery; var bool_nuevo; var bool_primera; var vflete; var dolar; var soles; 
		
		var html; var CT;
		
		if($('calculadora_valor').value=='' || $('calculadora_peso').value==''){	$('costo_total').innerHTML=''; return false; }

		cv	= $('calculadora_valor').value * 1;
		cp	= $('calculadora_peso').value * 1;
		
		bool_primera	= $('calculadora_primera').value * 1;
		bool_nuevo		= $('calculadora_nuevo').value * 1;
		bool_delivery	= $('calculadora_entrega').value * 1;
						
		var valor_arancel; var valor_igv; var delivery_lima_soles;
		valor_arancel=<?php echo $COMMON['variables']['arancel']?>/100;		
		valor_igv=<?php echo $COMMON['variables']['igv']?>/100;
		delivery_lima_soles=<?php echo $COMMON['variables']['delivery_lima_soles']?>;	
		
		
		vflete=10;

		if(cp==1){
			fletesinigv	= 15;
		} else if(cp>1){
			fletesinigv = 15 + vflete*(cp-1);
		}
				
		seguro	= 0.01*cv		
//		flete	= (15 + ( 10*cp ))*1.18

		flete	= fletesinigv *( 1 + valor_igv )
//		cif		= cv + flete + seguro;
		cif		= cv + fletesinigv + seguro;
		
	
		
		if(cv>=0 && cv<=200){
			arancel	= 0;
		} else if(cv>200 && cv<=2000){
			arancel	= valor_arancel*cif;
		} else if(cv>2000){
			arancel	= valor_arancel*cif;
		}		

		igv		= (cif + arancel) * valor_igv;
		
		delivery = (bool_delivery=='1')?delivery_lima_soles:0;
		
		if(cv>=0 && cv<=200){
			aplica=igv+cif;
		} else if(cv>200 && cv<=2000){
			aplica=igv+cif+arancel;			
		} else if(cv>2000){
			aplica=0;
		}
		
		if( bool_nuevo &&  bool_primera){ impuesto=0.1; }
		if(!bool_nuevo &&  bool_primera){ impuesto=0.1; }
		if( bool_nuevo && !bool_primera){ impuesto=0.035; }
		if(!bool_nuevo && !bool_primera){ impuesto=0.05; }						
		
		percepcion = impuesto*aplica;

		CT = flete + cif + arancel + igv +percepcion;
				
		dolar = '$US ';
		soles = 'S/. ';
		
		
		CT		= dolar + CT.round(2);
		flete	= dolar + flete.round(2);
		cif 	= dolar + cif.round(2);
		arancel = (arancel==0)?'no aplica':dolar + arancel.round(2);
		igv 	= dolar + igv.round(2);
		percepcion 	= (percepcion==0)?'no aplica':dolar + percepcion.round(2);
		delivery= (delivery==0)?'no aplica':soles + delivery.round(2);
		
		html='';
		html+='<div style="font-weight: bold; float: left; clear: left; padding: 17px 10px 2px 15px; margin-left: 148px; background-color:#FFF; border: 1px solid #000;">';
		html+='<div class="camps" style="font-weight:bold;text-align:center;float:none;color:#000;" >RESULTADOS</div>';
		
		html+='<div class="camps" ><label class="name">Flete</label><span style="font-weight:normal;">'+flete+'&nbsp;&nbsp;&nbsp;</span></div>';
		html+='<div class="camps" ><label class="name">CIF</label><span style="font-weight:normal;">'+cif+'&nbsp;&nbsp;&nbsp;</span></div>';
		html+='<div class="camps" ><label class="name">Arancel</label><span style="font-weight:normal;">'+arancel+'&nbsp;&nbsp;&nbsp;</span></div>';
		html+='<div class="camps" ><label class="name">IGV</label><span style="font-weight:normal;">'+igv+'&nbsp;&nbsp;&nbsp;</span></div>';
		html+='<div class="camps" ><label class="name">Percepción</label><span style="font-weight:normal;">'+percepcion+'&nbsp;&nbsp;&nbsp;</span></div>';

		html+='<div class="camps" style="background-color:#FFD00A;" ><label class="name" style="color:#000;" >COSTO TOTAL</label><span style="font-weight:bold;color:#000;">'+CT+'&nbsp;&nbsp;&nbsp;</span></div>';

		html+='<div class="camps" ><label class="name">Delivery en Lima</label><span style="font-weight:normal;">'+delivery+'&nbsp;&nbsp;&nbsp;</span></div>';

		html+='</div>';		
			
		$('costo_total').innerHTML=html;
		
    });
	
</script>