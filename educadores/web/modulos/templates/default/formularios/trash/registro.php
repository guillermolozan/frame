<?php //á
?>

                           
    <!--FORM INICIO-->
    <form id="formulario_<?php echo $FORM['nombre'];?>" method="post" name="<?php echo $FORM['nombre'];?>" class="formularios" action="<?php echo $FORM['action'];?>" >
                      
    <div id="<?php echo $FORM['nombre'];?>_form_body" class="form_body">

    <div id="localizacion"><?php web_render_control_localizacion($FORM,$GEO,array('departamento','provincia','distrito'));?></div>        

    <?php web_render_form($FORM); ?>        
         
    </div>                   
    
    <?php web_render_form_javascript($FORM); ?>        
    
    </form>
    <!--FORM FIN--> 
                            
    <div class="clean"></div>    