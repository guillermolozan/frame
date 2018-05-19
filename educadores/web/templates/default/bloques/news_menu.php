<?php //á 
$THIS=$PARAMS['this'];
$object=$OBJECT[$THIS];
?>
<div class="div_fila">           

    <div id="div_menu" class="div_fila div_menu <?php 
	web_selector_control($SELECTED,$THIS,"menus",1);	
    ?>" style="background-color:<?php echo $filtro_color; ?>; color:#FFF;" >
    <?php web_render_menu($object['menu'],array(
                                                'lados_externos'=>0
                                                ,'lados_internos'=>0
                                                ,'lados_flotantes'=>0
												,'ul'=>'div'												
                                                //,'id'=>'menu_main'
                                                ),'span'); ?>
    </div>

    
</div>    

<div class="clean"></div>
