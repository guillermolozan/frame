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
            				                
            <div class="camps legend">Ingrese sus datos</div>               
            
            <div class="div_fila">
                <div class="div_columna" style="width:50%;">                            
                <form target="_blank" method="post" action="<?php echo $domain; ?>detalle_bypass.php?txtSalida=1">
                <div class="form_body">         
                    <div class="camps before">N° de Remito:</div>
                    <div class="camps camp_derecha">
                     <input type="text" title="Colocar Nro de Remito de 7 dígitos" maxlength="8" size="8" id="txtRemito" name="txtRemito" class="caja">
                     </div>
                    <div class="camps camp_derecha">
                     <select title="Anio" id="txtEmision" name="txtEmision" class="caja">
                     <option selected value="11">11</option>
                     <option value="10">10</option>
                     <option value="09">09</option>
                     <option value="08">08</option>
                     <option value="07">07</option>
                     <option value="06">06</option>
                     <option value="05">05</option>
                     <option value="04">04</option>
                     </select>
                     </div>
                    <div class="camps camp_derecha submit">
                     <input type="submit" value="Buscar" name="Submit">
                     </div>       
                </div>     
                </form>
                </div>
                <div class="div_columna" style="width:50%;">
                <form target="_blank" method="post" action="<?php echo $domain; ?>intranet/consulta_orden.php">
                <div class="form_body">
                    <div class="camps before">Orden de Servicio:</div>
                    <div class="camps camp_derecha">                                    
                        <input type="text" title="Nro de Orden de Servicio" maxlength="7" size="7" id="ls_orden_servicio" name="ls_orden_servicio" class="caja">
                    </div>        
                    <div class="camps camp_derecha">
                		<select title="AÑo" id="ls_emision_orden" name="ls_emision_orden" class="caja">
                         <option selected="" value="11">11</option>
                         <option value="10">10</option>
                         <option value="09">09</option>
                         <option value="08">08</option>
                         <option value="07">07</option>
                         <option value="06">06</option>
                         <option value="05">05</option>
                         <option value="04">04</option>
                        </select>
                     </div>   
                     <div class="camps camp_derecha submit">               
                         <input type="submit" value="Buscar" name="Submit">
                     </div>
                </div>     
                </form>
                </div>
              </div>

            <form target="_blank" method="post" action="<?php echo $domain; ?>detalleGuiaExterna.php">
            	<div class="form_body">
                <div class="camps before">Guía del Cliente (cod. del cliente + nro. guía)</div>
                <div class="camps camp_derecha">                                    
                      <input type="text" title="Colocar el codigo del cliente" maxlength="3" size="3" name="txtCodCliente" class="caja">
                </div>
                <div class="camps camp_derecha">                                                          
                      <input type="text" title="Colocar el nro. de guia" maxlength="40" size="15" name="txtDocExterno" class="caja">
                </div>      
                <div class="camps camp_derecha submit">                                    
                      <input type="submit" value="Buscar" name="Submit">
                </div>      
                </div>
            </form>
            
            <form target="_blank"  method="post" action="<?php echo $domain; ?>intranet/consulta_factura_boleta.php">
            	<div class="form_body">
                <div class="camps before">Otros Documentos:</div>
                <div class="camps camp_derecha">                              
                    <select id="lbx_tipo_doc" name="lbx_tipo_doc" class="caja">
                      <option selected="" value="0">Seleccione el documento</option>
                      <option value="1">Factura</option>
                      <option value="2">Boleta</option>
                    </select>
                </div>
                <div class="camps camp_derecha">                                                  
                    <input type="text" title="Nro de Serie" maxlength="3" size="3" id="txt_serie" name="txt_serie" class="caja">
                </div>
                <div class="camps camp_derecha">                                                  
                    <input type="text" title="Nro de Documento" maxlength="7" size="7" id="txt_numero" name="txt_numero" class="caja">
                </div>
                <div class="camps camp_derecha submit">                                                  
                    <input type="submit" value="Buscar" name="Submit">
				</div>                 
                </div>   
          </form>
          
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
