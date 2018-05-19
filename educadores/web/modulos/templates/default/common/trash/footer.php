<?php //á

$THIS='footer';

 if($MASTERBLOCK['footer']){ ?>
    <div id="div_footer" class="div_fila cuadro <?php 
	web_selector_control($SELECTED,$THIS,"footers");	
    ?>">
        <div class="div_fila menu">
        	<?php echo web_render_menu_footer($COMMON['footer']['menu']); ?>
        </div>
        <div class="div_fila info" style="margin-top:10px;">
		<!--<strong style="color:#ff0000;">© 2011 OLVACOMPR@S, Todos los derechos reservados.</strong>-->
        </div>        
        	<?php web_render_footer($COMMON['footer']); ?>        
    </div>
<?php } ?>
