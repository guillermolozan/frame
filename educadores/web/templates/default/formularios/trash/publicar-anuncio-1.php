<?php //á
//prin($FORMULARIO['contactenos']);
?>

<div id="div_formulario_main" class="div_columna gris">
       
<div class="div_barra">SELECCIONAR LOCALIZACIÓN Y CATEGORÍAS</div>

<div class="div_contenido">                
                   
<?php $FORM=$FORMULARIO['publicar-anuncio-1']; ?>
<form id="formulario_<?php echo $FORM['nombre'];?>"  method="<?php echo $FORM['method'];?>" name="<?php echo $FORM['nombre'];?>" class="formularios formulario_completo" action="<?php echo $FORM['action'];?>" >	

    <div id="<?php echo $FORM['nombre'];?>_form_body">

        <div  id="control_localizacion">
        	<?php web_render_control_localizacion($FORM,$GEO); ?>        
        </div>
        
        <div id="control_categoria">
        	<?php web_render_control_categoria($FORM,$ITEMS); ?>        
        </div>

	<?php web_render_form($FORM); ?>           

    </div>                   

	<?php web_render_form_javascript($FORM); ?>        

            
            </form>
            <!--FORM FIN--> 


                            
        </div>

</div>    