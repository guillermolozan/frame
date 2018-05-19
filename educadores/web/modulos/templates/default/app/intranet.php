<?php //á
$THIS=$PARAMS['this'];

$PAGINA=$OBJECT[$THIS];

?>
<div class="cuadro <?php 
    web_selector_control($SELECTED,$PARAMS['classStyle'],"bloques");
    ?>" ><?php web_render_esquinas(1,2);?>

   <div class="barra_arriba">
   <?php echo $PAGINA['titulo']; ?>
   </div>

    <div class="div_borde div_inner">
        		
        	<?php $domain="http://www.olvacourier.com/"; ?>
            				                          
            <form target="_blank" method="post" action="<?php echo $domain; ?>intranet/estado_cuenta/contenido/validarLogin.php">
            	<div class="form_body">
                <div class="camps before">Clientes :</div>
                <div class="camps camp_derecha">
                        <label class="name" for="txt_usuario">Usuario : </label>
                        <input type="text" title="Usuario" maxlength="12" size="12" id="txt_usuario" name="txt_usuario" class="caja">
                </div>        
                <div class="camps camp_derecha">
                        <label class="name" for="txt_clave">Contraseña : </label>
                        <input type="password" title="Clave" maxlength="15" size="10" id="txt_clave" name="txt_clave" class="caja">
                </div>        
                <div class="camps camp_derecha submit">
                        <input type="submit" value="Ingresar" name="btn_enviar" >                    
                </div>    
                </div>
            </form>                        
    
    </div>

</div>
<style>
.form_body { display:block; float:left; width:100%; margin-bottom:10px; }
.name { padding:3px 5px; }
.camps { padding:4px 4px; }
.camp_derecha { float:left; }
.before { 
background-color:#CCC;
padding:4px 4px;
width: 100%;
float:left;
margin-bottom:4px;
}						
.legend { 
background-color:#FFB749;
font-weight: bold;
padding:7px;
width: 100%;
float:left;
margin-bottom:20px;
text-align:center;
}			
.caja { 
background-color: #F9F9F9;
border: 1px solid #333;
color: #000000;
font-size: 12px; 
}
select.caja { padding:0px 0 1px 0; margin:0; }
.submit { padding:2px; }
.submit input { padding-right:7px; padding-left:7px; font-size:12px; }
.camp_derecha { float:left; }
</style>
