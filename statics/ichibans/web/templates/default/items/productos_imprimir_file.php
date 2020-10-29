<?php //á

$THIS=$PARAMS['this'];

$ITEM=$DETAIL[$PARAMS['this']];

//$SLIDE=$ITEM['SLIDESHOW'];

//prin($item);

?>
<div class="div_fila">
  
    <div class="cuadro ficha_producto <?php 
        web_selector_control($SELECTED,$THIS,"bloques,fichas");
        ?>" >
        <?php web_render_esquinas(1,4);
		//prin($FBL);?>        
    
	   <?php /*
       <div class="barra_arriba">
       <?php web_render_item_borde('bors-b',1,2);?>        
       <a href="<?php echo $ITEM['link'];?>" title="<?php echo $ITEM['grupo'];?>"><?php echo $ITEM['titulo'];?></a>             
       </div>
       */ ?>
             
        <div class="div_borde div_inner">

            <div class="div_fila" style="height:50px;">
                    <div class="div_absoluto header-imprimir">
					<?php 
						/*
						switch(trim($vars['INTERNO']['ID_PROYECTO'])){
						case "142": echo "<img src='web/templates/default/img/particular/header/logo_imprimir_daihatsu.jpg' />"; break;
						default: echo "<img src='web/templates/default/img/particular/header/logo_imprimir.jpg' />"; break;							
						}*/
						$id_cuenta=3;
						$cuenta=fila('nombre,email,logo,fecha_creacion','envios_cuentas',"where id='$id_cuenta'",0,array(
						'logo'=>array('archivo'=>array('log_imas','{fecha_creacion}','{logo}'))
						));								
						echo "<img src='".$cuenta['logo']."'>";
                    ?>
                    </div>
                    <div class="ficha div_absoluto ficha-cliente">
                        <table width="260" border="0"><tbody>
                        <tr><td style="background:#CCC;border:1px solid #DDD;" align="center"><strong>CLIENTE</strong></td></tr>
                        <tr><td style="border:1px solid #ddd;" align="center"><?php 
                        echo dato("nombre","clientes","where id='".$_GET['id_cliente']."'")." ".dato("apellidos","clientes","where id='".$_GET['id_cliente']."'");
                        ?></td></tr>
                        </tbody></table>                
                    </div>
            </div>

            <div class="div_fila" style='color:#000;text-align:center; font-size:15px; font-weight:bold;'>
            ESPECIFICACIONES TÉCNICAS
            </div>
                        
            <div class="div_fila" style='margin-bottom:10px;'>
            <div style="color:#FF0000; text-align:center;padding:1px 0; font-size:15px; background-color:#CCC; font-weight:bold;margin:0 14px 0 3px;">
            <?php echo $ITEM['titulo'];?>
            </div>
            </div>
                
            <div class="ficha">
                <?php echo $ITEM['ficha'];?>
            </div>
            <!--
            <div class="div_fila" style='font-weight:bold;'>
                Nacin Chaluja<br>		
                Jefe de Ventas<br>		
                <br>    
                DIAMANTE DEL PACIFICO S.A.<br>		
                TELEF. 224-2352<br>		
                CEL. : 990356914<br>		
                RPM  #  373811<br>		
                ventasdirectas@incapower.com.pe<br>		
                NEXTEL 414*0114<br>		
            </div>-->
                            
            <div class="clean"></div>
                        
            <?php /////////////////////////////////////////////////////////////////////////////////////////////////////?>   
                 
        </div> 

        <!--<div class="barra_abajo"></div>-->
    
    </div>
</div>
