<?php //á
?>

<?php    	
$NOOB=$NOODSLICE['videos'];
?>
                    
<div id="bloque_videos_elemento_0">
 
    <div id="ver_video_titulo"></div>
    <div id="ver_video_eventos_embed"></div>
    <a id="ver_video_cerrar" href="#" onclick="cerrar_ver_video(); return false;"><?php echo $lang['volver_lista_videos']; ?></a>
    
    <div id="div_inner_video_eventos">  
       
        <div id="contenedor_slider_<?php echo $NOOB['label'];?>_fijo" class="contenedor_slider_fijo">    
            <div id="contenedor_slider_<?php echo $NOOB['label'];?>_movil" class="contenedor_slider_movil">
                    
                <?php if($NOOB['num_items']==0){ echo $NOOB['vacio']; } else { ?>   
                <?php foreach($NOOB['items_bloques'] as $itembloque){ ?>            
                <div class="slid">      
                    <ul>    
                        <?php foreach($itembloque as $item){ ?>
                        <!-- inicio frame -->
                        <li>
                            <table><tr><td align="center"><a href="#" onclick="ver_video('<?php echo $item['titulo'];?>','<?php echo $item['codigo'];?>'); return false;"><img border="0" width="120px" src="http://i4.ytimg.com/vi/<?php echo $item['codigo'];?>/default.jpg" /></a></td></tr></table>
                            <a href="#" onclick="ver_video('<?php echo $item['titulo'];?>','<?php echo $item['codigo'];?>'); return false;" class="titulo"><?php echo $item['titulo'];?></a>
                            <div class="fecha"><?php echo fecha_formato($item['fecha'],5);?></div>
                            <a href="#" onclick="ver_video('<?php echo $item['titulo'];?>','<?php echo $item['codigo'];?>'); return false;" class="vervideo"><?php echo $lang['ver_video'];?></a>
                        </li>
                        <!-- fin frame -->
                        <?php } ?>
                    </ul>
                </div>                
                <?php } ?>                
                <?php } ?>
                
            </div>
        </div>
        
        <?php web_render_slider_pie($NOOB); ?>
    
    </div>
    
</div>   
<div class="clean"></div>
<?php 
web_render_slider_javascript($NOOB); unset($NOOB);
?>

<script>
	
	function ver_video(titulo,cod){
	
	$('ver_video_eventos_embed').innerHTML='<embed height="260" width="310" allowfullscreen="true" wmode="transparent" menu="false" quality="high" bgcolor="#FFFFFF" name="id'+cod+'" id="id'+cod+'" style="" src="http://www.youtube.com/v/'+cod+'&amp;fs=1&amp;showsearch=0&amp;autoplay=1" type="application/x-shockwave-flash"/>';
	$('ver_video_titulo').innerHTML=titulo;
	$0('div_inner_video_eventos');
	$('ver_video_cerrar').style.display='block';
	$1('ver_video_titulo');
	$1('ver_video_eventos_embed');
	
	}
	
	function cerrar_ver_video(){
	
	$('ver_video_eventos_embed').innerHTML='';
	$('ver_video_titulo').innerHTML='';
	$1('div_inner_video_eventos');
	$0('ver_video_cerrar');
	$0('ver_video_titulo');
	$0('ver_video_eventos_embed');
	
	}
	
</script>