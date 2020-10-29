<?php //á
//prin($FORMULARIO['contactenos']);
?>

<div id="div_formulario_main" class="div_columna gris">
       
<div class="div_barra">INGRESA EL DETALLE DE LA PUBLICACIÓN</div>

<div class="div_contenido">                

<div>
<p>Categoría : <?php echo $CATEGORIAS['ruta'];?></p>
<p>Localización : <?php echo $LOCALIZACION['ruta'];?></p>
<a class="debil" style="position:absolute; right:9px; top:50px;" href="<?php echo $PUBLICAR_1['LINK'];?>">&laquo; Cambiar Categoría o Localización</a>
</div>

<div class="rayita"></div>
                   
<?php $FORM=$FORMULARIO['publicar-anuncio-2']; ?>
<form id="formulario_<?php echo $FORM['nombre'];?>" method="<?php echo $FORM['method'];?>" name="<?php echo $FORM['nombre'];?>" class="formularios formulario_completo" action="<?php echo $FORM['action'];?>" >	

    <div id="<?php echo $FORM['nombre'];?>_form_body">

        <div  id="control_marca" style="display:none;">
        
		<?php web_render_control_marca($FORM,$ITEMS); ?>
        
        </div>
        
	<?php 
	web_render_form($FORM); 
	?>        

    </div>                   

	<?php web_render_form_javascript($FORM); ?>        

            
            </form>
            <!--FORM FIN--> 


                            
        </div>

</div>    