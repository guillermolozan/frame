<?php //á

$THIS="menu";

 if($MASTERBLOCK['menu']){ ?>
 <div class="div_fila">
    <div id="div_menu" class="<?php 
	web_selector_control($SELECTED,$THIS,"menus",1);	
    ?>">
    <?php web_render_menu($COMMON['menu'],array(
                                                'lados_externos'=>1
                                                ,'lados_internos'=>1
                                                ,'lados_flotantes'=>1
                                                //,'id'=>'menu_main'
                                                ),'h2'); ?>    
    </div>
 </div>   
<?php } ?>