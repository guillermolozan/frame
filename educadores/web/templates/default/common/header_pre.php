<?php //á
$THIS=$PARAMS['this'];
$object=$OBJECT[$THIS];

?><div class="div_fila div_menu <?php 
	web_selector_control($SELECTED,$THIS,"menus",1);	
    ?>">
    <?php web_render_menu($object['menu'],array(
                                                'lados_externos'=>0
                                                ,'lados_internos'=>0
                                                ,'lados_flotantes'=>0
                                                //,'id'=>'menu_main'
                                                ),'h2'); ?>    
</div>