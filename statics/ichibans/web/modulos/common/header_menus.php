<?php //á 

$THIS=$PARAMS['this'];

$object=[];
/*
$object['menu']=select("id,nombre",'productos_grupos','where 1 and visibilidad=1 limit 0,100',0,
[
    'url'=>"index.php?modulo=items&tab=productos&acc=list&gru={id}&friendly={label}",
)
);
*/
$object['menu']=[
					
					[
						'nombre' =>'Inicio',
						'url'    =>url('index.php?modulo=app&tab=home'),
						'id'     =>'1',
					],
					[
						'nombre' =>'Empresa',
						'url'    =>url('index.php?modulo=app&tab=pages&page=empresa'),
						'id'     =>'2',						
					],
					[
						'nombre' =>'Servicios',
						'url'    =>'#',
						'id'     =>'3',						
					],
					[
						'nombre' =>'Productos',
						'url'    =>url('index.php?modulo=items&tab=products_fotos&acc=file'),
						'id'     =>'4',
					],					
					[
						'nombre' =>'Division de Mantenimiento',
						'url'    =>url('index.php?modulo=app&tab=pages&page=division_de_mantenimiento'),
						'id'     =>'5',
					],

					[
						'nombre' =>'Alquiler',
						'url'    =>url('index.php?modulo=app&tab=pages&page=alquiler'),
						'id'     =>'6',						
					],					
					/*					
					[
						'nombre'=>'Enlaces de Interés',
						'url'=>url('index.php?modulo=items&tab=enlaces_items&acc=list'),
						'id'=>'4',						
					),
					*/
					[
						'nombre' =>'Contáctenos',
						'url'    =>url('index.php?modulo=formularios&tab=contacto'),
						'id'     =>'7',						
					],	
																								
				];
				
				
	
	$object['menu']['2']['menu']=select(
	[
		"id",
		"nombre"
	],
	'textos_items',
	'where visibilidad="1" and id_grupo="1"
	order by calificacion desc 	
	limit 0,100',
	0,
	[
	    'url'=>['procesar_url'=>['url'=>"index.php?modulo=items&tab=textos_items&acc=file&id={id}&friendly={nombre}"]],											
	]
	);		
	

$object['menu'] = web_procesar_menu($object['menu'],"izquierda");

$object['menu'] = web_re_procesar_menu($object['menu'],$SERVER['URL']);

$OBJECT[$THIS]=$object;

