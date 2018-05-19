<?php //á

?>
     
                               
    <!--FORM INICIO-->
    <form id="formulario_<?php echo $FORM['nombre'];?>" method="post" name="<?php echo $FORM['nombre'];?>" class="formularios" action="<?php echo $FORM['action'];?>" >
                    
    <div id="<?php echo $FORM['nombre'];?>_form_body" class="form_body">

    <span id="dimensiones"><?php web_render_control_dimensiones($FORM,array('dim_ancho','dim_largo','dim_altura'));?></span>             

    <?php web_render_form($FORM); ?>       
         
    </div>                   
    
    <?php web_render_form_javascript($FORM); ?>        
    
    </form>
    <!--FORM FIN--> 

    <div class="clean"></div>    