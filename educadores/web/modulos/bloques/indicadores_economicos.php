<?php //á



$THIS=$PARAMS['this'];




include("store.php");

																	

$INDICADORES['lima']=unserialize($INDICADORES['lima']);

$INDICADORES['usa']=unserialize($INDICADORES['usa']);

$INDICADORES['latam']=unserialize($INDICADORES['latam']);

$INDICADORES['eur']=unserialize($INDICADORES['eur']);

$INDICADORES['monedas']=unserialize($INDICADORES['monedas']);

$INDICADORES['commodities']=unserialize($INDICADORES['commodities']);





$ITEM['tablas']=$INDICADORES;



$ITEM['menu']=web_procesar_menu(

							array(

								array(

									'label'=>"LIMA"

									,'onclick'=>';'

								)

								,array(

									'label'=>"USA"

									,'onclick'=>';'

								)

								,array(

									'label'=>"LATAM"

									,'onclick'=>';'

								)								

								,array(

									'label'=>"EUR"

									,'onclick'=>';'

								)

								,array(

									'label'=>"MONEDAS"

									,'onclick'=>';'

									,'default'=>1

								)	

								,array(

									'label'=>"COMMODITIES"

									,'onclick'=>';'

								)																						

	

							)	

						);

//prin($ITEM['menu']);



$LISTADO[$PARAMS['conector']]=$ITEM;



?>