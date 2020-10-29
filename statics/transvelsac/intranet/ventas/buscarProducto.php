<?php
	$consultaBase = "SELECT p.*,CASE WHEN pe.precioCompra IS NULL THEN 0 WHEN pe.precioCompra IS NOT NULL THEN pe.precioCompra END as precioCompra1,CASE WHEN pe.stockTotal IS NULL THEN 0 WHEN pe.stockTotal IS NOT NULL THEN pe.stockTotal END as stockTotal, m.nomModelo, t.nomTipoProd, ma.nomMarca FROM (((producto as p LEFT JOIN producto_empresa as pe ON p.idProducto=pe.PRODUCTO_idProducto) LEFT JOIN modelo as m ON p.MODELO_idModelo=m.idModelo) LEFT JOIN tipo_producto as t ON m.TIPO_PRODUCTO_idtipoProd=t.idTipoProd) LEFT JOIN marca as ma ON p.MARCA_idMarca=ma.idMarca ";









$arreglo_nombres=array("Mi_nombre"=>"Carlos","Tu_nombre"=>"Daya","Mi_apellido"=>"Leon","Tu_apellido"=>"Ramos","No_se_me_ocurre_que_mas_decirte"=>"no mentiras, exitos con XML","chao"=>"<![CDATA[Hasta una nueva oportunidad ...   Duro con XML.]]>"); 




$buffer='<?xml version="1.0" encoding="utf-8"?> 
          <!--Hola dayita con este script podras crear un archivo XML en disco--> 
           <file_xml>'; 
  while (list ($etiqueta, $valor) = each ($arreglo_nombres)): 
    $buffer.="<$etiqueta>$valor</$etiqueta>"; 
  endwhile; 
  $buffer.="</file_xml>"; 
  $file=fopen("archivo.xml","w+"); 
  fwrite ($file,$buffer); 
  fclose($file); 
echo "<br><p style='font-size:25px;'>... y finalmente se crea el archivo XML. abrelo dando click  <a href='archivo.xml'>aqui</a></p> 
      <p style='font-size:25px;'>En caso de no abrirlo actualiza esta pagina.</p>"; 
?> 