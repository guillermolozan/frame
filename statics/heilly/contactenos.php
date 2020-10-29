<?php
include("keys.php");
// $respuesta="gracias por escribir";
if($_SERVER['REQUEST_METHOD']=='POST'){
  ob_start();
  include("formulario.php");
  ob_end_clean();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
<head>
<title>Contáctenos :: INVERSIONES HEILLY </title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/link.css">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="Description" content="Contáctenos en INVERSIONES HEILLY E.I.R.L. :: Telef.: (01) 550-3843 Correo: operaciones@heilly.com">
<style type="text/css">td img {display: block;}</style>
</head>
<link type="text/css" rel="stylesheet" href="css/css.css" />
<link type="text/css" rel="stylesheet" href="css/theme/grey/formcheck.css" />
<!-- <script type="text/javascript" src="js/mootools-core-1.3.2-full-compat-yc.js"></script>
<script type="text/javascript" src="js/mootools-more-1.3.2.1.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<script type="text/javascript" src="js/lang/es.js"></script>
<script type="text/javascript" src="js/formcheck.js"></script> -->
<style>
.registro-formularios .mensaje {
    margin: 120px 120px;
    padding: 14px 0;
    text-align: center;
}

.registro-formularios .camps input.caja, .registro-formularios .camps textarea.caja {
    background-color: #FFFFFF;
}    
</style>
<body background="img/background.jpg" bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0">


<table border="0" cellpadding="0" cellspacing="0" width="980" align="center" bgcolor="#ffffff">
  <tr>
   <td width="8" height="1" ></td>
   <td width="171" height="1" ></td>
   <td width="306" height="1" ></td>
   <td width="55" height="1" ></td>
   <td width="29" height="1" ></td>
   <td width="402" height="1" ></td>
   <td width="9" height="1" ></td>
   <td width="1" height="1" ></td>
  </tr>

  <tr>
   <td  width="8" height="8" bgcolor="#065F99"></td>
   <td colspan="5" width="963" height="8" bgcolor="#065F99"></td>
   <td width="9" height="8" bgcolor="#065F99"></td>
   <td width="1" height="8" ></td>
  </tr>
  <tr>
   <td width="8" height="138" bgcolor="#065F99"></td>
   <td colspan="2" width="477" height="138"><a href="http://www.heilly.com" target="_parent"><img src="img/logo_heilly.jpg" width="477" height="138" border="0"></a></td>
   <td bgcolor="#FFFFFF" width="55" height="138"></td>
   <td colspan="2" width="431" height="138"><img src="img/daned_r2_c5.jpg" width="431" height="138" border="0" id="daned_r2_c5" usemap="#m_daned_r2_c5" alt=""></td>
   <td width="9" height="138" bgcolor="#065F99"></td>
   <td width="1" height="138" ></td>
  </tr>
  <tr>
   <td rowspan="2" width="8" height="187" bgcolor="#065F99"></td>
   <td rowspan="2" width="171" height="187" align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="171">
  <tr>
   <td  width="17" height="1" background="img/menu_r1_c1.jpg"></td>
   <td width="135" height="1" background="img/menu_r1_c2.jpg" ></td>
   <td width="19" height="1" background="img/menu_r1_c3.jpg"></td>
   <td width="1" height="1" ></td>
  </tr>

  <tr>
   <td width="17" height="3" background="img/menu_r1_c1.jpg"></td>
   <td  width="135" height="3" background="img/menu_r1_c2.jpg"></td>
   <td width="19" height="3" background="img/menu_r1_c3.jpg"></td>
   <td width="1" height="3" ></td>
  </tr>
  <tr>
   <td width="17" height="25"><img src="img/menu_r2_c1.jpg" width="17" height="25"></td>
   <td  background="img/menu_r2_c2.jpg" width="135" height="25"><p style="margin-top:0.0pt; margin-right:10.0pt; margin-bottom: 0.0pt; margin-left:0.0pt; text-align:right;"><a href="index.html" class="link_menu_s" target="_parent">INICIO</a></p></td>
   <td width="19" height="25"><img src="img/menu_r2_c3.jpg" width="19" height="25"></td>
   <td width="1" height="25"></td>
  </tr>
  <tr>
   <td width="17" height="8"><img src="img/menu_r3_c1.jpg" width="17" height="8"></td>
   <td  bgcolor="#FFFFFF" width="135" height="8"></td>
   <td  bgcolor="#FFFFFF" width="19" height="8"></td>
   <td width="1" height="8" ></td>
  </tr>
  <tr>
   <td width="17" height="25"><img src="img/menu_r4_c1.jpg" width="17" height="25"></td>
   <td  background="img/menu_r4_c2.jpg" width="135" height="25"><p style="margin-top:0.0pt; margin-right:10.0pt; margin-bottom: 0.0pt; margin-left:0.0pt; text-align:right;"><a href="empresa.html" class="link_menu_s" target="_parent">EMPRESA</a></p></td>
   <td width="19" height="25"><img src="img/menu_r4_c3.jpg" width="19" height="25"></td>
   <td width="1" height="25" ></td>
  </tr>
  <tr>
   <td  bgcolor="#FFFFFF" width="17" height="8"></td>
   <td  bgcolor="#FFFFFF" width="135" height="8"></td>
   <td  bgcolor="#FFFFFF" width="19" height="8"></td>
   <td width="1" height="8" ></td>
  </tr>
  <tr>
   <td width="17" height="25"><img src="img/menu_r6_c1.jpg" width="17" height="25"></td>
   <td  background="img/menu_r6_c2.jpg" width="135" height="25"><p style="margin-top:0.0pt; margin-right:10.0pt; margin-bottom: 0.0pt; margin-left:0.0pt; text-align:right;"><a href="servicios.html" class="link_menu_s" target="_parent">SERVICIOS</a></p></td>
   <td width="19" height="25"><img src="img/menu_r6_c3.jpg" width="19" height="25"></td>
   <td width="1" height="25" ></td>
  </tr>
  <tr>
   <td  bgcolor="#FFFFFF" width="17" height="8"></td>
   <td  bgcolor="#FFFFFF" width="135" height="8"></td>
   <td  bgcolor="#FFFFFF" width="19" height="8"></td>
   <td width="1" height="8" ></td>
  </tr>
  <tr>
   <td width="17" height="25"><img src="img/menu_r6_c1.jpg" width="17" height="25"></td>
   <td  background="img/menu_r6_c2.jpg" width="135" height="25"><p style="margin-top:0.0pt; margin-right:10.0pt; margin-bottom: 0.0pt; margin-left:0.0pt; text-align:right;"><a href="cobertura.html" class="link_menu_s" target="_parent">COBERTURA</a></p></td>
   <td width="19" height="25"><img src="img/menu_r6_c3.jpg" width="19" height="25"></td>
   <td width="1" height="25" ></td>
  </tr>
  <tr>
   <td  bgcolor="#FFFFFF" width="17" height="8"></td>
   <td  bgcolor="#FFFFFF" width="135" height="8"></td>
   <td  bgcolor="#FFFFFF" width="19" height="8"></td>
   <td width="1" height="8" ></td>
  </tr>
  <tr>
   <td width="17" height="25"><img src="img/menu_r6_c1.jpg" width="17" height="25"></td>
   <td  background="img/menu_r6_c2.jpg" width="135" height="25"><p style="margin-top:0.0pt; margin-right:10.0pt; margin-bottom: 0.0pt; margin-left:0.0pt; text-align:right;"><span class="b-activado">CONTACTENOS</span></p></td>
   <td width="19" height="25"><img src="img/menu_r6_c3.jpg" width="19" height="25"></td>
   <td width="1" height="25" ></td>
  </tr>
  <tr>
   <td rowspan="2"  bgcolor="#FFFFFF" width="17" height="8"></td>
   <td rowspan="2"  bgcolor="#FFFFFF" width="135" height="8"></td>
   <td rowspan="2"  bgcolor="#FFFFFF" width="19" height="8"></td>
   <td width="1" height="8" ></td>
  </tr>
  <tr>
   <td width="1" height="4" ></td>
  </tr>
</table></td>
   <td colspan="3" width="390" height="183" align="center" valign="middle"><div align="center">
    <img src="contactenos.jpg" width="154" height="103" /></div></td>
   <td width="402" height="183"><img name="daned_r3_c6" src="img/daned_r3_c6.jpg" width="402" height="183" border="0" id="daned_r3_c6" usemap="#m_daned_r3_c6" alt="" /></td>
   <td width="9" height="183" bgcolor="#065F99"></td>
   <td width="1" height="183" ></td>
  </tr>
  <tr>
   <td colspan="3" width="390" height="4"></td>
   <td width="402" height="4"></td>
   <td width="9" height="4" bgcolor="#065F99"></td>
   <td width="1" height="4" ></td>
  </tr>
  <tr>
   <td width="8" height="4" bgcolor="#065F99" ></td>
   <td colspan="5" width="963" height="4"></td>
   <td width="9" height="4" bgcolor="#065F99"></td>
   <td width="1" height="4" ></td>
  </tr>
  <tr>
   <td width="8" height="13" bgcolor="#065F99"></td>
   <td colspan="5" width="963" height="13"></td>
   <td width="9" height="13" bgcolor="#065F99"></td>
   <td width="1" height="13" ></td>
  </tr>
  <tr>
   <td width="8" height="234" bgcolor="#065F99"></td>
   <td colspan="5" width="963" height="234" align="center" valign="top"><table width="850"  height="380" border="0" cellpadding="0" cellspacing="0" align="center"  bgcolor="#FFFFFF">
      <tr>
        
        <td width="317" valign="top" align="left"><p style="margin-top:20.0pt; margin-right:10.0pt; margin-bottom: 0.0pt; margin-left:20.0pt; text-align:left;"><span class="style_contact02"><b><u>Contáctenos</u></b></span><br><br>
        <span class="style_contact01"><span class="style_contact03">•</span> Necesitas un presupuesto de servicio, ENTONCES hablamos de ello, TE AYUDAREMOS! </span><br><br><span class="style_contact04"><span class="style_contact05">•</span> Llene nuestro formulario, enviándonos información sobre sus datos y las necesidades que Usted requiere. </span><br><br><span class="style_contact04"><span class="style_contact05">•</span> Oficina : (01) 550-3843<br>RPC: 962367296<br>operaciones@heilly.com<br />Lima - Perú
</span></p></td>
<td width="3" valign="top" align="left" background="division_formulario.jpg"></td>
<td width="400" valign="top" align="left"><p style="margin-top:20.0pt; margin-right:0.0pt; margin-bottom: 0.0pt; margin-left:0.0pt; text-align:left;">
  <div class='cuadro id_registro registro-bloques bloque_cuadro_18 registro-formularios form_02' style="width:400px; text-align:left; background-color:#FFFFFF">
  <?php if($respuesta==''){ ?>
  <!--FORM INICIO-->
    <form action="?" class="formularios" name="registro" method="post" id="formulario_registro">
      <div class="form_body" id="registro_form_body">
        <div id="p_registro_nombre" class="camps">
          <label for="registro_nombre" class="name">Nombres y Apellidos<b>*</b></label>
          <input required type="text" value="" class="caja validate['required']" id="registro_nombre" name="nombre">
        </div>
        <div id="p_registro_ciudad" class="camps">
          <label for="registro_ciudad" class="name">Ciudad y Pais<b>*</b></label>
          <input required type="text" value="" class="caja validate['required']" id="registro_ciudad" name="ciudad">
        </div>
        <div id="p_registro_lugar_servicio" class="camps">
          <label for="registro_lugar_servicio" class="name">¿Por qué medio nos encontró?<b>*</b></label>
          <select required value="6" class="caja validate['required']" id="registro_lugar_servicio" name="lugar_servicio">
            <option value=""></option>
            <option value="Web">Web</option>
            <option value="Periodico">Periódico</option>
            <option value="Revista">Revista</option>
            <option value="Television">Televisión</option>
            <option value="Panel">Panel Publicitario</option>
            <option value="Recomendacion">Un conocido nos recomendó</option>
            <option value="Otros">Otros</option>
          </select>
        </div>
        <div id="p_registro_telefono" class="camps">
          <label for="registro_telefono" class="name">Teléfono o Celular<b>*</b></label>
          <input required type="text" value="" class="caja validate['phone','required']" id="registro_telefono" name="telefono">
        </div>
        <div id="p_registro_email" class="camps">
          <label for="registro_email" class="name">Email<b>*</b></label>
          <input required type="text" value="" class="caja validate['required']" id="registro_email" name="email">
        </div>
        <div id="p_registro_pasajeros" class="camps">
          <label for="registro_pasajeros" class="name">Empresa</label>
          <input type="text" value="" class="caja" id="registro_pasajeros" name="pasajeros">
        </div>
        <div id="p_registro_comentario" class="camps">
          <label for="registro_comentario" class="name">Comentario</label>
          <textarea class="caja" id="registro_comentario" rows="7" cols="30" name="comentario"></textarea>
        </div>

        <div class="camps pie small">
          <!-- <label class="name">&nbsp;</label> -->
          <div id="recap" style="float:right;"></div>
        </div>
          
        <div id="p_registro_submit" class="camps submit">
          <label class="name">&nbsp;</label>
          <input type="submit" value="Enviar" id="registro_submit" disabled>
          <!--<input type="reset" value="Cancelar"  />-->
        </div>
        <div id="p_registro_pie" class="camps pie small">
          <label class="name">&nbsp;</label>
          <span class="small">los campos con * son obligatorios</span></div>
      </div>

      <script>
        var onloadCallback = function() {
          grecaptcha.render('recap', {
            'sitekey' : '<?=$reCAPTCHA_site_key?>',
            'callback': function(response) {
              document.querySelector('#registro_submit').removeAttribute("disabled");
            },
            'expired-callback': function() {
              document.querySelector('#registro_submit').setAttribute("disabled", "true");
            },                
            'hl':'es-419',
            // 'size':'compact'
            // 'theme' : 'dark'
          });
        };
      </script>
      <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

      <script type="text/javascript">
      /*
                window.addEvent('domready', function(){
                    $$('.autoinput').each(function(ee) { 
                        ee.title=ee.value;
                        ee.addEvent('blur',function(event){ if(ee.value=='') ee.value=ee.title; });
                        ee.addEvent('focus',function(event){ if(ee.value==ee.title) ee.value=''; });	
                    });						
                    $('formulario_registro').addEvent('submit', function(event){
                        $$('#formulario_registro .autoinput').each(function(ee) { 
                            if(ee.title==ee.value){ ee.value=''; }
                        });
                    });
					$('formulario_registro').addEvent('submit', function(event){
						$$('#formulario_registro textarea').each(function(el){
						if (el.title =='html'){	el.value=MOOEDITABLE.getContent(); }
						});						
                    });	
					var submit_temp_registro;			
                    new FormCheck('formulario_registro',{
                        onSubmit:function() { 
						}       
                        ,submitByAjax:true
                        ,onAjaxRequest:function() { 
                            $('registro_submit').value="Enviando...";
							submit_temp_registro=$('registro_submit').value;
                            $('registro_submit').disabled=true; 
							                        }
                        ,onAjaxSuccess:function(ee) { 
                            $('formulario_registro').reset();
                            $('registro_submit').value=submit_temp_registro;
                            $('registro_submit').disabled=false; 
							var json=JSON.decode(ee,true);
							new Element('div', {
								'class': 'mensaje mensaje_'+json.t,
								'html': json.m,
								'id': 'mensaje_'+json.n										
							}).inject($(json.n+'_form_body'), 'before');
							$0(json.n+'_form_body');
							setTimeout("$('mensaje_"+json.n+"').destroy(); if('"+json.t+"'=='error'){$1('"+json.n+"_form_body');}else{if('"+json.u+"'!=''){	location.href='"+json.u+"'; } else { location.reload(); } } ",10000);							
                        }					
						,display : {
							closeTipsButton : 1
						}

                    });
                });
    */
    </script>
    </form>
    <!--FORM FIN-->
    <?php } else { ?>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <div class="px-5 pt-3">
        <div class="alert alert-success" role="alert">
          <?php echo $respuesta; ?>
        </div>
      </div>
    <?php } ?>
  </div>  </p></td>
  
    <td width="40" valign="top" align="left"></td>
      </tr>
    </table></td>
   <td width="9" height="234" bgcolor="#065F99"></td>
   <td width="1" height="234" ></td>
  </tr>
  <tr>
   <td width="8" height="13" bgcolor="#065F99"></td>
   <td colspan="5" width="963" height="13"></td>
   <td width="9" height="13" bgcolor="#065F99"></td>
   <td width="1" height="13" ></td>
  </tr>
  <tr>
   <td width="8" height="26" bgcolor="#065F99"></td>
   <td colspan="5" width="963" height="26"><img src="nuestra-flota.jpg" width="963" height="26" /></td>
   <td width="9" height="26" bgcolor="#065F99"></td>
   <td width="1" height="26" ></td>
  </tr>
  <tr>
   <td width="8" height="87" bgcolor="#065F99"></td>
   <td colspan="5" width="963" height="87" align="center" valign="top"><img src="galeria-nuestra-flota.jpg" width="963" height="87" /></td>
   <td width="9" height="87" bgcolor="#065F99"></td>
   <td width="1" height="87" ></td>
  </tr>
  <tr>
   <td width="8" height="13" bgcolor="#065F99"></td>
   <td colspan="5" width="963" height="13"></td>
   <td width="9" height="13" bgcolor="#065F99"></td>
   <td width="1" height="13" ></td>
  </tr>
  <tr>
   <td rowspan="2" width="8" height="146" bgcolor="#065F99"></td>
   <td colspan="5"  background="img/daned_r11_c2.jpg" width="963" height="118" align="center" valign="top"><div align="center">
<br>
<font face="Tahoma, Helvetica, sans-serif" size="3" color="#99FF00" >Teléfono:</font>
<font face="Tahoma, Helvetica, sans-serif" size="3" color="#ffffff" >&nbsp;<b>(01) 550-3843</b> &nbsp;&nbsp;</font>
<font face="Tahoma, Helvetica, sans-serif" size="3" color="#99FF00" >RPC:</font>
<font face="Tahoma, Helvetica, sans-serif" size="3" color="#ffffff" >&nbsp;<b>962367296</b> &nbsp;&nbsp;</font><br />
<font face="Tahoma, Helvetica, sans-serif" size="3" color="#99FF00" >Correo:</font>
<font face="Tahoma, Helvetica, sans-serif" size="3" color="#ffffff" >&nbsp;<b>operaciones@heilly.com</b></font><br />
<font face="Tahoma, Helvetica, sans-serif" size="3" color="#99FF00" >© 2016 - INVERSIONES HEILLY E.I.R.L.</font>
<font face="Tahoma, Helvetica, sans-serif" size="3" color="#ffffff" >&nbsp;<b>Todos los derechos reservados</b></font><br /></div></td>
   <td rowspan="2" width="9" height="146" bgcolor="#065F99"></td>
   <td width="1" height="118" ></td>
  </tr>
  <tr>
   <td colspan="5" width="963" height="28" background="img/daned_r12_c2.jpg" align="center" valign="top"><div align="center"><span class="link_prodiserv">&nbsp;&nbsp;&nbsp;by&nbsp;&nbsp;</span><a href="http://www.prodiserv.com/" onmouseover="window.status='www.prodiserv.com :: PROYECTOS DISEÑOS Y SERVICIOS';return true" onmouseout="window.status='';return true" class="link_prodiserv" target="_blank">PRODISERV</a></div></td>
   <td width="1" height="28" ></td>
  </tr>
  <tr>
   <td  width="8" height="11" bgcolor="#065F99"></td>
   <td colspan="5" width="963" height="11" bgcolor="#065F99"></td>
   <td width="9" height="11" bgcolor="#065F99"></td>
   <td width="1" height="11" ></td>
  </tr>
</table>
<map name="m_daned_r2_c5" id="m_daned_r2_c5">
<area shape="poly" coords="0,0,6,65,29,129,92,211,179,274,250,300,328,318,384,321,431,321,431,1" href="javascript:;" alt="" />
</map>
<map name="m_daned_r3_c3" id="m_daned_r3_c3">
<area shape="poly" coords="361,-138,367,-73,390,-9,453,73,540,136,611,162,689,180,745,183,792,183,792,-137" href="javascript:;" alt="" />
</map>
<map name="m_daned_r3_c6" id="m_daned_r3_c6">
<area shape="poly" coords="-29,-138,-23,-73,0,-9,63,73,150,136,221,162,299,180,355,183,402,183,402,-137" href="javascript:;" alt="" />
</map>

</body>
</html>
