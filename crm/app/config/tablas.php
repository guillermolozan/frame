<?php //á

$objeto_tabla['PRODUCTOS_ITEMS']=array(
		'grupo'			=> 'productos',
		'alias_grupo'	=> 'inmuebles',
		'titulo'		=> 'Proyectos',
		'nombre_singular'=> 'proyecto',
		'nombre_plural'	=> 'proyectos',
		'tabla'			=> 'productos_items',
		'archivo'		=> 'productos_items',
		'archivo_hijo'	=> 'productos_fotos',
		'prefijo'		=> 'proite',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'duplicar'		=> '0',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '1',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Proyectos',
		'por_pagina'	=> '100',
		'me'			=> 'PRODUCTOS_ITEMS',
		'orden'			=> '1',
		'crear_label'	=> '80px',
		'crear_txt'		=> '660px',
		'filtros_extra'	=> '',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'unique'		=> '0',
						'width'			=> '200px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'like'			=> '0',
						'controles'		=> '

<a rel="subs" href="custom/productos_depositos_tipos.php?id_item=[id]">{select count(*) from productos_depositos_tipos where id_item=[id]} depósitos</a>
<a rel="subs" href="custom/productos_depositos_items_items.php?id_item=[id]">{select count(*) from productos_depositos_items_items where id_item=[id]} modelos de depósitos</a>

<a rel="subs" href="custom/productos_estacionamientos_tipos.php?id_item=[id]">{select count(*) from productos_estacionamientos_tipos where id_item=[id]} estacionamientos</a>
<a rel="subs" href="custom/productos_estacionamientos_items_items.php?id_item=[id]">{select count(*) from productos_estacionamientos_items_items where id_item=[id]} modelos de estacionamientos</a>

<a rel="subs" href="custom/productos_tipos.php?id_item=[id]">{select count(*) from productos_tipos where id_item=[id]} inmuebles</a>
<a rel="subs" href="custom/productos_items_items.php?id_item=[id]">{select count(*) from productos_items_items where id_item=[id]} modelos de departamentos</a>

<a rel="subs" href="custom/productos_subgrupos.php?id_item=[id]">{select count(*) from productos_subgrupos where id_item=[id]} torres</a>

<a rel="subs" href="custom/promociones.php?id_item=[id]">{select count(*) from promociones where id_item=[id]} promociones</a>

<a rel="subs" href="custom/productos_items_files.php?id_item=[id]">{select count(*) from productos_items_files where id_item=[id]} archivos</a>


						',
						'size'			=> '140',
						'style'			=> 'width:450px;',
						'tags'			=> '1',
						'derecha'		=> '1'
				),
				'codigo'		=>array(
						'campo'			=> 'codigo',
						'label'			=> 'Código',
						'width'			=> '30px',
						'tipo'			=> 'inp',
						'like'			=> '1',
						'style'			=> 'width:50px;',
						'derecha'		=> '2'
				),
				'video'			=>array(
						'campo'			=> 'video',
						'label'			=> 'Video',
						'tipo'			=> 'yot',
						'listable'		=> '1',
						'width'			=> '100px'
				),
				'departamento'	=>array(
						'campo'			=> 'departamento',
						'label'			=> 'Departamento',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,nombre|geo_departamentos',
						'load'			=> 'provincia||id,nombre|geo_provincias|where id_departamento=',
						'style'			=> 'width:150px;',
						'derecha'		=> '1'
				),
				'provincia'		=>array(
						'campo'			=> 'provincia',
						'label'			=> 'Provincia',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_provincias|where 0',
						'load'			=> 'distrito||id,nombre|geo_distritos|where id_provincia=',
						'style'			=> 'width:150px;',
						'derecha'		=> '2'
				),
				'distrito'		=>array(
						'campo'			=> 'distrito',
						'label'			=> 'Distrito',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '1',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_distritos|where id_provincia=8',
						'style'			=> 'width:150px;',
						'derecha'		=> '2',
						'queries'		=> '1'
				),
				'direccion'		=>array(
						'campo'			=> 'direccion',
						'label'			=> 'Dirección',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '120px',
						'style'			=> 'width:450px;',
						'derecha'		=> '1'
				),
				'referencia'	=>array(
						'campo'			=> 'referencia',
						'label'			=> 'Referencia',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '120px',
						'style'			=> 'width:450px;',
						'derecha'		=> '1'
				),
				'descripcion'	=>array(
						'campo'			=> 'descripcion',
						'label'			=> 'Descripción breve',
						'tipo'			=> 'txt',
						'listable'		=> '0',
						'validacion'	=> '0',
						'style'			=> 'height:70px;width:600px;'
				),
				'descripcion2'	=>array(
						'campo'			=> 'descripcion2',
						'label'			=> 'Descripción',
						'tipo'			=> 'html',
						'validacion'	=> '1',
						'style'			=> 'width:650px;height:350px;',
						'width'			=> '360px',
						'derecha'		=> '1',
						'css'			=> 'table { width:100%; margin-bottom:10px; background:#F3F3F3; }',
						'default'		=> '',
						'listable'		=> '0',
						'listhtml'		=> '1',
						'tags'			=> '1'
				),
				'stock'			=>array(
						'campo'			=> 'stock',
						'label'			=> 'Stock',
						'width'			=> '30px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'style'			=> 'width:30px;',
						'disabled'		=> '1'
				),
				'source'		=>array(
						'campo'			=> 'source',
						'label'			=> 'Source',
						'width'			=> '200px',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'style'			=> 'width:550px;',
						'disabled'		=> '1'
				),
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1'
				),
				'file'			=>array(
						'campo'			=> 'file',
						'label'			=> 'Foto',
						'tipo'			=> 'img',
						'listable'		=> '1',
						'validacion'	=> '0',
						'prefijo'		=> 'proitefot',
						'carpeta'		=> 'proitefot_imas',
						'tamanos'		=> '150x120,980x383',
						'tamano_listado'	=> '1',
						'width'			=> '150px',
						'style'			=> 'width:150px,height:auto,'
				),
				'foto_descripcion'=>array(
						'campo'			=> 'foto_descripcion',
						'label'			=> 'texto',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '207px'
				),
				'descripcion5'	=>array(
						'campo'			=> 'descripcion5',
						'label'			=> 'Características para cotización',
						'tipo'			=> 'html',
						'validacion'	=> '0',
						'style'			=> 'width:650px;height:350px;',
						'width'			=> '360px',
						'derecha'		=> '1',
						'css'			=> 'table { width:100%; margin-bottom:10px; background:#F3F3F3; }',
						'default'		=> '',
						'listable'		=> '0',
						'listhtml'		=> '1',
						'tags'			=> '1'
				)
		),
		'edicion_completa'=> '1',
		'creacion_hijo'	=> 'productos_fotos',
		'calificacion'	=> '1',
		'importar_csv'	=> '0',
		'order_by'		=> 'id desc, id desc',
		'width_listado'	=> '',
		'edicion_rapida'	=> '1',
		'crear_pruebas'	=> '0',
		'seccion'		=> 'proyectos',
		'disabled'		=> '0'
);
/******************************************************************************************************************************************************/

$objeto_tabla['PRODUCTOS_SUBGRUPOS']=array(
		'titulo'		=> 'Torres',
		'nombre_singular'=> 'torre',
		'nombre_plural'	=> 'torres',
		'tabla'			=> 'productos_subgrupos',
		'archivo'		=> 'productos_subgrupos',
		'prefijo'		=> 'prosubgru',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Torres',
		'me'			=> 'PRODUCTOS_SUBGRUPOS',
		'orden'			=> '1',
		'width_listado'	=> '',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_item_item'		=>array(
						'campo'			=> 'id_item',
						'label'			=> 'Proyecto',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '1',
						'default'		=> '[id_item]',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,codigo;nombre|productos_items',
						'width'			=> '140px',
						'derecha'		=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'tip_foreig'	=> '1',
						'foreig'		=> '1'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'controles'		=> '

<a rel="subs" href="custom/productos_items_items.php?id_subgrupo=[id]" >{select count(*) from productos_items_items where id_subgrupo=[id]} inmuebles</a>

'
				)
		),
		'grupo'			=> 'productos',
		'edicion_completa'=> '1',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '1',
		'calificacion'	=> '1',
		'set_fila_fijo'	=> '',
		'crear_quick'	=> '0',
		'order_by'		=> ''
);
/******************************************************************************************************************************************************/

$objeto_tabla['PRODUCTOS_ITEMS_FILES']=array(
		'grupo'			=> 'productos',
		'titulo'		=> 'Archivos del Proyecto',
		'nombre_singular'=> 'archivo',
		'nombre_plural'	=> 'archivos',
		'tabla'			=> 'productos_items_files',
		'archivo'		=> 'productos_items_files',
		'prefijo'		=> 'proditefile',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'duplicar'		=> '0',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'menu'			=> '0',
		'menu_label'	=> 'Archivos',
		'por_pagina'	=> '20',
		'me'			=> 'PRODUCTOS_ITEMS_FILES',
		'orden'			=> '1',
		'crear_label'	=> '80px',
		'crear_txt'		=> '660px',
		'filtros_extra'	=> '',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id',
						'listable'		=> '0',
						'width'			=> '50px',
						'label'			=> 'Correl'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr',
						'listable'		=> '0',
						'formato'		=> '7b',
						'width'			=> '85px'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_item'		=>array(
						'campo'			=> 'id_item',
						'label'			=> 'Proyecto',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '1',
						'default'		=> '[id_item]',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,codigo;nombre|productos_items',
						'width'			=> '140px',
						'derecha'		=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'tip_foreig'	=> '1',
						'foreig'		=> '1'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '130px',
						'tipo'			=> 'inp',
						'style'			=> 'width:240px;',
						'derecha'		=> '1',
						'listable'		=> '1'
				),
				'fichero'		=>array(
						'campo'			=> 'fichero',
						'label'			=> 'Archivo',
						'tipo'			=> 'sto',
						'width'			=> '300px',
						'style'			=> 'width:200px;',
						'listable'		=> '1',
						'validacion'	=> '0',
						'prefijo'		=> 'doc',
						'carpeta'		=> 'doc_fil',
						'name'			=> 'nombre',
						'enlace'		=> 'down'
				),
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1',
						'listable'		=> '0'
				),
				'user'			=>array(
						'campo'			=> 'user',
						'tipo'			=> 'user'
				)
		),
		'edicion_completa'=> '0',
		'calificacion'	=> '0',
		'importar_csv'	=> '0',
		'width_listado'	=> '',
		'edicion_rapida'	=> '1',
		'crear_pruebas'	=> '0',
		'order_by'		=> 'id asc',
		'user'			=> '1',
		'disabled'		=> '0',
		'seccion'		=> ''
);
/******************************************************************************************************************************************************/

$objeto_tabla['PROMOCIONES']=array(
		'titulo'		=> 'Promociones',
		'nombre_singular'=> 'promoción',
		'nombre_plural'	=> 'promociones',
		'tabla'			=> 'promociones',
		'archivo'		=> 'promociones',
		'prefijo'		=> 'prom',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Promociones',
		'me'			=> 'PROMOCIONES',
		'orden'			=> '1',
		'width_listado'	=> '600px',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_item'		=>array(
						'campo'			=> 'id_item',
						'label'			=> 'Proyecto',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '1',
						'default'		=> '[id_item]',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,codigo;nombre|productos_items',
						'width'			=> '140px',
						'derecha'		=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'tip_foreig'	=> '1',
						'foreig'		=> '1'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'controles'		=> '<a href="custom/bancos_sectoristas.php?id=[id]">{select count(*) from bancos_sectoristas where id_grupo=[id]} sectoristas</a>'
				),
				'texto'			=>array(
						'campo'			=> 'texto',
						'label'			=> 'Descripción',
						'width'			=> '150px',
						'tipo'			=> 'html',
						'listable'		=> '1',
						'validacion'	=> '0',
						'style'			=> 'width:400px;height:80px;'
				)
		),
		'grupo'			=> 'productos',
		'edicion_completa'=> '1',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '1',
		'calificacion'	=> '0',
		'set_fila_fijo'	=> '4',
		'crear_quick'	=> '1',
		'disabled'		=> '0'
);
/******************************************************************************************************************************************************/

$objeto_tabla['PRODUCTOS_TIPOS']=array(
		'titulo'		=> 'Modelos de departamentos',
		'nombre_singular'=> 'modelo de departamento',
		'nombre_plural'	=> 'modelos de departamento',
		'tabla'			=> 'productos_tipos',
		'archivo'		=> 'productos_tipos',
		'prefijo'		=> 'protip',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Modelos de departamento',
		'me'			=> 'PRODUCTOS_TIPOS',
		'orden'			=> '1',
		'width_listado'	=> '',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_item'		=>array(
						'campo'			=> 'id_item',
						'label'			=> 'Proyecto',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '1',
						'default'		=> '[id_item]',
						'foreig'		=> '1',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,codigo;nombre|productos_items',
						'width'			=> '140px',
						'derecha'		=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'tip_foreig'	=> '1'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'controles'		=> '
						<a rel="subs" href="custom/productos_fotos.php?id_tipo=[id]" >{select count(*) from productos_fotos where id_tipo=[id]} galerias</a>
						<a href="base2/imprimir_plano.php?plano=1&id=[id]">Imprimir plano 1</a>
						<a href="base2/imprimir_plano.php?plano=2&id=[id]">Imprimir plano 2</a>
						',
						'multiopciones'	=> 'Productos|productos_items_tipos|id,nombre|productos_items|where visibilidad=1'
				),
				'pvlista'		=>array(
						'campo'			=> 'pvlista',
						'label'			=> 'Precio',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency'
				),
				'pvpromocion'	=>array(
						'campo'			=> 'pvpromocion',
						'label'			=> 'Precio Final',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency'
				),
				'area_total'	=>array(
						'campo'			=> 'area_total',
						'label'			=> 'Área Ocupada',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;'
				),
				'area_construida'=>array(
						'campo'			=> 'area_construida',
						'label'			=> 'Área Techada',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:100px;'
				),
				'descripcion'	=>array(
						'campo'			=> 'descripcion',
						'label'			=> 'Descripción breve',
						'tipo'			=> 'txt',
						'listable'		=> '0',
						'validacion'	=> '0',
						'style'			=> 'height:70px;width:605px;'
				),
				'descripcion2'	=>array(
						'campo'			=> 'descripcion2',
						'label'			=> 'Descripción',
						'tipo'			=> 'html',
						'validacion'	=> '1',
						'style'			=> 'width:605px;height:250px;',
						'width'			=> '360px',
						'derecha'		=> '1',
						'css'			=> 'table { width:100%; margin-bottom:10px; background:#F3F3F3; }',
						'default'		=> '',
						'listable'		=> '0',
						'listhtml'		=> '1',
						'tags'			=> '1'
				),
				'descripcion3'	=>array(
						'campo'			=> 'descripcion3',
						'label'			=> 'Acabados',
						'tipo'			=> 'html',
						'validacion'	=> '1',
						'style'			=> 'width:605px;height:150px;',
						'width'			=> '360px',
						'derecha'		=> '1',
						'css'			=> 'table { width:100%; margin-bottom:10px; background:#F3F3F3; }',
						'default'		=> '',
						'listable'		=> '0',
						'listhtml'		=> '1',
						'tags'			=> '1'
				),
				'descripcion4'	=>array(
						'campo'			=> 'descripcion4',
						'label'			=> 'Areas comunes',
						'tipo'			=> 'html',
						'validacion'	=> '1',
						'style'			=> 'width:605px;height:150px;',
						'width'			=> '360px',
						'derecha'		=> '1',
						'css'			=> 'table { width:100%; margin-bottom:10px; background:#F3F3F3; }',
						'default'		=> '',
						'listable'		=> '0',
						'listhtml'		=> '1',
						'tags'			=> '1'
				),
				'has_balcon'	=>array(
						'campo'			=> 'has_balcon',
						'label'			=> 'Balcón',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'validacion'	=> '0',
						'default'		=> '0',
						'opciones'		=>array(
								'1'			=> 'Si',
								'0'			=> 'No'
						),
						'derecha'		=> '1',
						'style'			=> 'width:100px;',
						'width'			=> '50px'
				),
				'num_rooms'		=>array(
						'campo'			=> 'num_rooms',
						'label'			=> '# Dormitorios',
						'tipo'			=> 'com',
						'default'		=> '0',
						'opciones'		=>array(
								'0'			=> '0',
								'1'			=> '1',
								'2'			=> '2',
								'3'			=> '3',
								'4'			=> '4',
								'5'			=> '5',
								'6'			=> '6'
						),
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'queries'		=> '1'
				),
				'num_bathrooms'	=>array(
						'campo'			=> 'num_bathrooms',
						'label'			=> '# Baños',
						'tipo'			=> 'com',
						'default'		=> '0',
						'opciones'		=>array(
								'0'			=> '0',
								'0.5'			=> '1/2',
								'1'			=> '1',
								'1.5'			=> '1 1/2',
								'2'			=> '2',
								'2.5'			=> '2 1/2',
								'3'			=> '3',
								'3.5'			=> '3 1/2',
								'4'			=> '4',
								'5'			=> '5',
								'6'			=> '6'
						),
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'queries'		=> '1'
				),
				'descripcion5'	=>array(
						'campo'			=> 'descripcion5',
						'label'			=> 'Características de cotización',
						'tipo'			=> 'html',
						'validacion'	=> '0',
						'style'			=> 'width:650px;height:350px;',
						'width'			=> '360px',
						'derecha'		=> '1',
						'css'			=> 'table { width:100%; margin-bottom:10px; background:#F3F3F3; }',
						'default'		=> '',
						'listable'		=> '0',
						'listhtml'		=> '1',
						'tags'			=> '1'
				),
				'descripcion6'	=>array(
						'campo'			=> 'descripcion6',
						'label'			=> 'Descripción de Impresión',
						'tipo'			=> 'html',
						'validacion'	=> '0',
						'style'			=> 'width:650px;height:350px;',
						'width'			=> '360px',
						'derecha'		=> '1',
						'css'			=> 'table { width:100%; margin-bottom:10px; background:#F3F3F3; }',
						'default'		=> '',
						'listable'		=> '0',
						'listhtml'		=> '1',
						'tags'			=> '1'
				)
		),
		'grupo'			=> 'productos',
		'edicion_completa'=> '1',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '1',
		'calificacion'	=> '1',
		'set_fila_fijo'	=> '',
		'crear_quick'	=> '0',
		'order_by'		=> '',
		'seccion'		=> 'modelos'
);
/******************************************************************************************************************************************************/

$objeto_tabla['PRODUCTOS_ESTACIONAMIENTOS_TIPOS']=array(
		'titulo'		=> 'Modelos de estacionamiento',
		'nombre_singular'=> 'modelo de estacionamiento',
		'nombre_plural'	=> 'modelo de estacionamientos',
		'tabla'			=> 'productos_estacionamientos_tipos',
		'archivo'		=> 'productos_estacionamientos_tipos',
		'prefijo'		=> 'proesttip',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Modelos de estacionamiento',
		'me'			=> 'PRODUCTOS_ESTACIONAMIENTOS_TIPOS',
		'orden'			=> '1',
		'width_listado'	=> '',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_item'		=>array(
						'campo'			=> 'id_item',
						'label'			=> 'Proyecto',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '1',
						'default'		=> '[id_item]',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,codigo;nombre|productos_items',
						'width'			=> '140px',
						'derecha'		=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'tip_foreig'	=> '1',
						'foreig'		=> '1'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'derecha'		=> '1'
				),
				'tipo'			=>array(
						'campo'			=> 'tipo',
						'label'			=> 'Tipo',
						'tipo'			=> 'com',
						'default'		=> '0',
						'opciones'		=>array(
								'1'			=> 'Sótano',
								'2'			=> 'Semisótano'
						),
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'derecha'		=> '2',
						'size'			=> '8',
						'queries'		=> '1'
				),
				'area'			=>array(
						'campo'			=> 'area',
						'label'			=> 'Área',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:100px;'
				),
				'descripcion'	=>array(
						'campo'			=> 'descripcion',
						'label'			=> 'Descripción',
						'tipo'			=> 'txt',
						'listable'		=> '0',
						'validacion'	=> '0',
						'style'			=> 'height:70px;width:605px;'
				),
				'precio'		=>array(
						'campo'			=> 'precio',
						'label'			=> 'Precio',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency'
				)
		),
		'grupo'			=> 'productos',
		'edicion_completa'=> '1',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '1',
		'calificacion'	=> '1',
		'set_fila_fijo'	=> '',
		'crear_quick'	=> '0',
		'order_by'		=> ''
);
/******************************************************************************************************************************************************/

$objeto_tabla['PRODUCTOS_DEPOSITOS_TIPOS']=array(
		'titulo'		=> 'Modelos de depósito',
		'nombre_singular'=> 'modelo de depósito',
		'nombre_plural'	=> 'modelos de depósitos',
		'tabla'			=> 'productos_depositos_tipos',
		'archivo'		=> 'productos_depositos_tipos',
		'prefijo'		=> 'prodeptip',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Modelos de depósito',
		'me'			=> 'PRODUCTOS_DEPOSITOS_TIPOS',
		'orden'			=> '1',
		'width_listado'	=> '',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_item'		=>array(
						'campo'			=> 'id_item',
						'label'			=> 'Proyecto',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '1',
						'default'		=> '[id_item]',
						'foreig'		=> '1',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,codigo;nombre|productos_items',
						'width'			=> '140px',
						'derecha'		=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'tip_foreig'	=> '1'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'derecha'		=> '1'
				),
				'tipo'			=>array(
						'campo'			=> 'tipo',
						'label'			=> 'Tipo',
						'tipo'			=> 'com',
						'default'		=> '0',
						'opciones'		=>array(
								'1'			=> 'Sótano',
								'2'			=> 'Semisótano'
						),
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'derecha'		=> '2',
						'size'			=> '8',
						'queries'		=> '1'
				),
				'area'			=>array(
						'campo'			=> 'area',
						'label'			=> 'Área',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:100px;'
				),
				'descripcion'	=>array(
						'campo'			=> 'descripcion',
						'label'			=> 'Descripción',
						'tipo'			=> 'txt',
						'listable'		=> '0',
						'validacion'	=> '0',
						'style'			=> 'height:70px;width:605px;'
				),
				'precio'		=>array(
						'campo'			=> 'precio',
						'label'			=> 'Precio',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency'
				)
		),
		'grupo'			=> 'productos',
		'edicion_completa'=> '1',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '1',
		'calificacion'	=> '1',
		'set_fila_fijo'	=> '',
		'crear_quick'	=> '0',
		'order_by'		=> ''
);
/******************************************************************************************************************************************************/

$objeto_tabla['PRODUCTOS_ITEMS_ITEMS']=array(
		'grupo'			=> 'productos',
		'titulo'		=> 'Departamentos',
		'nombre_singular'=> 'departamento',
		'nombre_plural'	=> 'departamentos',
		'tabla'			=> 'productos_items_items',
		'archivo'		=> 'productos_items_items',
		'prefijo'		=> 'proiteite',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'duplicar'		=> '0',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Departamentos',
		'por_pagina'	=> '20',
		'me'			=> 'PRODUCTOS_ITEMS_ITEMS',
		'orden'			=> '1',
		'crear_label'	=> '80px',
		'crear_txt'		=> '660px',
		'filtros_extra'	=> '',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'numero'		=>array(
						'campo'			=> 'numero',
						'label'			=> 'Número',
						'width'			=> '30px',
						'tipo'			=> 'inp',
						'like'			=> '1',
						'style'			=> 'width:50px;',
						'derecha'		=> '1',
						'validacion'	=> '1',
						'listable'		=> '1'
				),
				'vista'			=>array(
						'campo'			=> 'vista',
						'label'			=> 'Vista',
						'tipo'			=> 'com',
						'default'		=> '0',
						'opciones'		=>array(
								'1'			=> 'Interior',
								'2'			=> 'Exterior'
						),
						'listable'		=> '1',
						'width'			=> '100px',
						'validacion'	=> '0',
						'derecha'		=> '2',
						'queries'		=> '1'
				),
				'id_item'		=>array(
						'campo'			=> 'id_item',
						'label'			=> 'Proyecto',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '1',
						'default'		=> '[id_item]',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,codigo;nombre|productos_items',
						'load'			=> 'id_items_tipo||id,nombre|productos_tipos|where id_item=[id_item];id_subgrupo||id,nombre|productos_subgrupos|where id_item=[id_item]',
						'width'			=> '140px',
						'derecha'		=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'tip_foreig'	=> '1',
						'foreig'		=> '1'
				),
				'id_subgrupo'	=>array(
						'campo'			=> 'id_subgrupo',
						'label'			=> 'Torre',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '0',
						'default'		=> '[id_subgrupo]',
						'foreig'		=> '1',
						'style'			=> 'width:auto,',
						'opciones'		=> 'id,nombre|productos_subgrupos|where 1',
						'width'			=> '95px',
						'derecha'		=> '2',
						'tags'			=> '1',
						'queries'		=> '1'
				),
				'id_items_tipo'	=>array(
						'campo'			=> 'id_items_tipo',
						'label'			=> 'Modelo',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '1',
						'default'		=> '[id_tipo]',
						'foreig'		=> '1',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,nombre|productos_tipos',
						'width'			=> '95px',
						'derecha'		=> '2',
						'tags'			=> '1',
						'queries'		=> '1',
						'load'			=> '|||pvlista,pvpromocion,area_total,area_construida,descripcion,num_rooms,num_bathrooms|productos_tipos|where id=[id_items_tipo];|html|descripcion2,descripcion3,descripcion4,descripcion6|productos_tipos|where id=[id_items_tipo];|checks|has_balcon|productos_tipos|where id=[id_items_tipo]'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'style'			=> 'width:605px;',
						'disabled'		=> '1'
				),
				'pvlista'		=>array(
						'campo'			=> 'pvlista',
						'label'			=> 'Precio',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '100px',
						'validacion'	=> '1',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency'
				),
				'pvpromocion'	=>array(
						'campo'			=> 'pvpromocion',
						'label'			=> 'Precio Final',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '1',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency'
				),
				'area_total'	=>array(
						'campo'			=> 'area_total',
						'label'			=> 'Área Ocupada',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;'
				),
				'area_construida'=>array(
						'campo'			=> 'area_construida',
						'label'			=> 'Área Techada',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:100px;'
				),
				'descripcion'	=>array(
						'campo'			=> 'descripcion',
						'label'			=> 'Descripción breve',
						'tipo'			=> 'txt',
						'listable'		=> '0',
						'validacion'	=> '0',
						'style'			=> 'height:70px;width:605px;'
				),
				'descripcion2'	=>array(
						'campo'			=> 'descripcion2',
						'label'			=> 'Descripción',
						'tipo'			=> 'html',
						'validacion'	=> '0',
						'style'			=> 'width:605px;height:250px;',
						'width'			=> '360px',
						'derecha'		=> '1',
						'css'			=> 'table { width:100%; margin-bottom:10px; background:#F3F3F3; }',
						'default'		=> '',
						'listable'		=> '0',
						'listhtml'		=> '1',
						'tags'			=> '1'
				),
				'descripcion3'	=>array(
						'campo'			=> 'descripcion3',
						'label'			=> 'Acabados',
						'tipo'			=> 'html',
						'validacion'	=> '0',
						'style'			=> 'width:605px;height:150px;',
						'width'			=> '360px',
						'derecha'		=> '1',
						'css'			=> 'table { width:100%; margin-bottom:10px; background:#F3F3F3; }',
						'default'		=> '',
						'listable'		=> '0',
						'listhtml'		=> '1',
						'tags'			=> '1'
				),
				'descripcion4'	=>array(
						'campo'			=> 'descripcion4',
						'label'			=> 'Areas comunes',
						'tipo'			=> 'html',
						'validacion'	=> '0',
						'style'			=> 'width:600px;height:150px;',
						'width'			=> '360px',
						'derecha'		=> '1',
						'css'			=> 'table { width:100%; margin-bottom:10px; background:#F3F3F3; }',
						'default'		=> '',
						'listable'		=> '0',
						'listhtml'		=> '1',
						'tags'			=> '1'
				),
				'has_balcon'	=>array(
						'campo'			=> 'has_balcon',
						'label'			=> 'Balcón',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'validacion'	=> '0',
						'default'		=> '0',
						'opciones'		=>array(
								'1'			=> 'Si',
								'0'			=> 'No'
						),
						'derecha'		=> '1',
						'style'			=> 'width:100px;',
						'width'			=> '50px',
						'queries'		=> '1'
				),
				'num_rooms'		=>array(
						'campo'			=> 'num_rooms',
						'label'			=> '# Dormitorios',
						'tipo'			=> 'com',
						'default'		=> '0',
						'opciones'		=>array(
								'0'			=> '0',
								'1'			=> '1',
								'2'			=> '2',
								'3'			=> '3',
								'4'			=> '4',
								'5'			=> '5',
								'6'			=> '6'
						),
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'queries'		=> '1'
				),
				'num_bathrooms'	=>array(
						'campo'			=> 'num_bathrooms',
						'label'			=> '# Baños',
						'tipo'			=> 'com',
						'default'		=> '0',
						'opciones'		=>array(
								'0'			=> '0',
								'0.5'			=> '1/2',
								'1'			=> '1',
								'1.5'			=> '1 1/2',
								'2'			=> '2',
								'2.5'			=> '2 1/2',
								'3'			=> '3',
								'3.5'			=> '3 1/2',
								'4'			=> '4',
								'5'			=> '5',
								'6'			=> '6'
						),
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'queries'		=> '1'
				),
				'id_status'		=>array(
						'campo'			=> 'id_status',
						'label'			=> 'Status',
						'width'			=> '180px',
						'listable'		=> '1',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,nombre;color|productos_stock_status',
						'derecha'		=> '1',
						'default'		=> '1',
						'queries'		=> '1',
						'frozen'		=> '1'
				),
				'venta_factura'	=>array(
						'campo'			=> 'venta_factura',
						'label'			=> '# Factura',
						'width'			=> '100px',
						'tipo'			=> 'inp',
						'like'			=> '1',
						'style'			=> 'width:50px;',
						'derecha'		=> '1',
						'frozen'		=> '1',
						'listable'		=> '0',
						'format'		=> 'currency'
				),
				'venta_precio'	=>array(
						'campo'			=> 'venta_precio',
						'label'			=> 'Precio Venta',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'frozen'		=> '1',
						'format'		=> 'currency'
				),
				'venta_fecha'	=>array(
						'campo'			=> 'venta_fecha',
						'label'			=> 'Fecha Venta',
						'tipo'			=> 'fch',
						'width'			=> '120px',
						'listable'		=> '1',
						'validacion'	=> '0',
						'formato'		=> '7',
						'style'			=> '',
						'derecha'		=> '2',
						'frozen'		=> '0',
						'queries'		=> '1'
				),
				'venta_abono'	=>array(
						'campo'			=> 'venta_abono',
						'label'			=> 'Abonos',
						'width'			=> '100px',
						'tipo'			=> 'inp',
						'style'			=> 'width:50px;',
						'derecha'		=> '1',
						'frozen'		=> '1',
						'listable'		=> '1',
						'format'		=> 'currency'
				),
				'venta_total_facturas'=>array(
						'campo'			=> 'venta_total_facturas',
						'label'			=> 'Facturación',
						'width'			=> '60px',
						'tipo'			=> 'inp',
						'style'			=> 'width:100px;',
						'derecha'		=> '2',
						'frozen'		=> '1',
						'listable'		=> '1',
						'format'		=> 'currency'
				),
				'venta_id_cliente'=>array(
						'campo'			=> 'venta_id_cliente',
						'label'			=> 'Cliente',
						'tipo'			=> 'hid',
						'style'			=> 'width:150px;',
						'derecha'		=> '1',
						'opciones'		=> 'id,nombre;apellidos|clientes|where 0',
						'frozen'		=> '1',
						'listable'		=> '0',
						'width'			=> '150px',
						'tip_foreig'	=> '1',
						'queries'		=> '0'
				),
				'venta_id_vendedor'=>array(
						'campo'			=> 'venta_id_vendedor',
						'label'			=> 'Asesor',
						'tipo'			=> 'hid',
						'style'			=> 'width:150px;',
						'opciones'		=> 'id,nombre;apellidos|usuarios',
						'derecha'		=> '2',
						'frozen'		=> '1',
						'queries'		=> '1',
						'listable'		=> '1',
						'width'			=> '100px',
						'tip_foreig'	=> '1'
				),
				'codigo'		=>array(
						'campo'			=> 'codigo',
						'label'			=> 'Código',
						'width'			=> '30px',
						'tipo'			=> 'inp',
						'like'			=> '1',
						'style'			=> 'width:100px;',
						'derecha'		=> '1'
				),
				'method'		=>array(
						'campo'			=> 'method',
						'tipo'			=> 'inp',
						'indicador'		=> '1'
				),
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1',
						'listable'		=> '0'
				),
				'descripcion5'	=>array(
						'campo'			=> 'descripcion5',
						'label'			=> 'Características',
						'tipo'			=> 'html',
						'validacion'	=> '0',
						'style'			=> 'width:650px;height:350px;',
						'width'			=> '360px',
						'derecha'		=> '1',
						'css'			=> 'table { width:100%; margin-bottom:10px; background:#F3F3F3; }',
						'default'		=> '',
						'listable'		=> '0',
						'listhtml'		=> '1',
						'tags'			=> '1'
				),
				'descripcion6'	=>array(
						'campo'			=> 'descripcion6',
						'label'			=> 'Descripción de Impresión',
						'tipo'			=> 'html',
						'validacion'	=> '0',
						'style'			=> 'width:650px;height:350px;',
						'width'			=> '360px',
						'derecha'		=> '1',
						'css'			=> 'table { width:100%; margin-bottom:10px; background:#F3F3F3; }',
						'default'		=> '',
						'listable'		=> '0',
						'listhtml'		=> '1',
						'tags'			=> '1'
				)
		),
		'edicion_completa'=> '1',
		'calificacion'	=> '0',
		'importar_csv'	=> '0',
		'width_listado'	=> '',
		'edicion_rapida'	=> '0',
		'crear_pruebas'	=> '0',
		'exportar_excel'	=> '1',
		'disabled'		=> '0',
		'seccion'		=> 'inmuebles'
);
/******************************************************************************************************************************************************/

$objeto_tabla['PRODUCTOS_ESTACIONAMIENTOS_ITEMS_ITEMS']=array(
		'grupo'			=> 'productos',
		'titulo'		=> 'Estacionamientos',
		'nombre_singular'=> 'estacionamiento',
		'nombre_plural'	=> 'estacionamientos',
		'tabla'			=> 'productos_estacionamientos_items_items',
		'archivo'		=> 'productos_estacionamientos_items_items',
		'prefijo'		=> 'proestiteite',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'duplicar'		=> '0',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Estacionamientos',
		'por_pagina'	=> '20',
		'me'			=> 'PRODUCTOS_ESTACIONAMIENTOS_ITEMS_ITEMS',
		'orden'			=> '1',
		'crear_label'	=> '80px',
		'crear_txt'		=> '660px',
		'filtros_extra'	=> '',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_item'		=>array(
						'campo'			=> 'id_item',
						'label'			=> 'Proyecto',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '1',
						'default'		=> '[id_item]',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,codigo;nombre|productos_items',
						'load'			=> 'id_items_estacionamiento_tipo||id,nombre|productos_estacionamientos_tipos|where id_item=[id_item];id_subgrupo||id,nombre|productos_subgrupos|where id_item=[id_item]',
						'width'			=> '140px',
						'derecha'		=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'tip_foreig'	=> '1',
						'foreig'		=> '1'
				),
				'id_items_estacionamiento_tipo'=>array(
						'campo'			=> 'id_items_estacionamiento_tipo',
						'label'			=> 'Modelo',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '1',
						'default'		=> '[id_tipo]',
						'foreig'		=> '1',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,nombre|productos_estacionamientos_tipos',
						'width'			=> '95px',
						'derecha'		=> '2',
						'tags'			=> '1',
						'queries'		=> '1',
						'load'			=> '|||nombre,precio,area,tipo,descripcion|productos_estacionamientos_tipos|where id=[id_items_estacionamiento_tipo]'
				),
				'id_subgrupo'	=>array(
						'campo'			=> 'id_subgrupo',
						'label'			=> 'Torre',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '0',
						'default'		=> '[id_subgrupo]',
						'foreig'		=> '1',
						'style'			=> 'width:auto,',
						'opciones'		=> 'id,nombre|productos_subgrupos|where 0',
						'width'			=> '95px',
						'derecha'		=> '2',
						'tags'			=> '1',
						'queries'		=> '1'
				),
				'numero'		=>array(
						'campo'			=> 'numero',
						'label'			=> 'Número',
						'width'			=> '30px',
						'tipo'			=> 'inp',
						'like'			=> '1',
						'style'			=> 'width:50px;',
						'derecha'		=> '2',
						'validacion'	=> '1',
						'listable'		=> '1'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'derecha'		=> '1'
				),
				'tipo'			=>array(
						'campo'			=> 'tipo',
						'label'			=> 'Tipo',
						'tipo'			=> 'com',
						'default'		=> '0',
						'opciones'		=>array(
								'1'			=> 'Sótano',
								'2'			=> 'Semisótano'
						),
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'derecha'		=> '2',
						'size'			=> '8',
						'queries'		=> '1'
				),
				'pvlista'		=>array(
						'campo'			=> 'pvlista',
						'label'			=> 'Precio',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency'
				),
				'precio'		=>array(
						'campo'			=> 'precio',
						'label'			=> 'Precio',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency'
				),
				'area'			=>array(
						'campo'			=> 'area',
						'label'			=> 'Área',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;'
				),
				'descripcion'	=>array(
						'campo'			=> 'descripcion',
						'label'			=> 'Descripción breve',
						'tipo'			=> 'txt',
						'listable'		=> '0',
						'validacion'	=> '0',
						'style'			=> 'height:70px;width:605px;'
				),
				'id_status'		=>array(
						'campo'			=> 'id_status',
						'label'			=> 'Status',
						'width'			=> '60px',
						'listable'		=> '1',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,nombre|productos_stock_status',
						'derecha'		=> '1',
						'default'		=> '1',
						'queries'		=> '1',
						'frozen'		=> '1'
				),
				'venta_factura'	=>array(
						'campo'			=> 'venta_factura',
						'label'			=> '# Factura',
						'width'			=> '60px',
						'tipo'			=> 'inp',
						'like'			=> '1',
						'style'			=> 'width:50px;',
						'derecha'		=> '1',
						'frozen'		=> '1',
						'listable'		=> '1'
				),
				'venta_precio'	=>array(
						'campo'			=> 'venta_precio',
						'label'			=> 'Precio Venta',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'frozen'		=> '1',
						'format'		=> 'currency'
				),
				'venta_fecha'	=>array(
						'campo'			=> 'venta_fecha',
						'label'			=> 'Fecha Venta',
						'tipo'			=> 'fch',
						'width'			=> '80px',
						'listable'		=> '1',
						'validacion'	=> '0',
						'formato'		=> '7',
						'style'			=> '',
						'derecha'		=> '2',
						'frozen'		=> '1',
						'queries'		=> '1'
				),
				'venta_abono'	=>array(
						'campo'			=> 'venta_abono',
						'label'			=> 'Abonos',
						'width'			=> '60px',
						'tipo'			=> 'inp',
						'style'			=> 'width:50px;',
						'derecha'		=> '1',
						'frozen'		=> '1',
						'listable'		=> '1'
				),
				'venta_total_facturas'=>array(
						'campo'			=> 'venta_total_facturas',
						'label'			=> 'Facturación',
						'width'			=> '60px',
						'tipo'			=> 'inp',
						'style'			=> 'width:100px;',
						'derecha'		=> '2',
						'frozen'		=> '1',
						'listable'		=> '1'
				),
				'venta_id_cliente'=>array(
						'campo'			=> 'venta_id_cliente',
						'label'			=> 'Cliente',
						'tipo'			=> 'hid',
						'style'			=> 'width:150px;',
						'derecha'		=> '1',
						'opciones'		=> 'id,nombre;apellidos|clientes',
						'frozen'		=> '1',
						'listable'		=> '0',
						'width'			=> '150px',
						'tip_foreig'	=> '1',
						'queries'		=> '0'
				),
				'venta_id_vendedor'=>array(
						'campo'			=> 'venta_id_vendedor',
						'label'			=> 'Asesor',
						'tipo'			=> 'hid',
						'style'			=> 'width:150px;',
						'opciones'		=> 'id,nombre;apellidos|usuarios',
						'derecha'		=> '2',
						'frozen'		=> '1',
						'queries'		=> '1',
						'listable'		=> '1',
						'width'			=> '150px',
						'tip_foreig'	=> '1'
				),
				'codigo'		=>array(
						'campo'			=> 'codigo',
						'label'			=> 'Código',
						'width'			=> '30px',
						'tipo'			=> 'inp',
						'like'			=> '1',
						'style'			=> 'width:100px;',
						'derecha'		=> '1'
				),
				'method'		=>array(
						'campo'			=> 'method',
						'tipo'			=> 'inp',
						'indicador'		=> '1'
				),
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1',
						'listable'		=> '0'
				)
		),
		'edicion_completa'=> '1',
		'calificacion'	=> '0',
		'importar_csv'	=> '0',
		'width_listado'	=> '',
		'edicion_rapida'	=> '0',
		'crear_pruebas'	=> '0',
		'exportar_excel'	=> '1',
		'disabled'		=> '0'
);
/******************************************************************************************************************************************************/

$objeto_tabla['PRODUCTOS_DEPOSITOS_ITEMS_ITEMS']=array(
		'grupo'			=> 'productos',
		'titulo'		=> 'Depositos',
		'nombre_singular'=> 'deposito',
		'nombre_plural'	=> 'depositos',
		'tabla'			=> 'productos_depositos_items_items',
		'archivo'		=> 'productos_depositos_items_items',
		'prefijo'		=> 'prodepiteite',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'duplicar'		=> '0',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Depositos',
		'por_pagina'	=> '20',
		'me'			=> 'PRODUCTOS_DEPOSITOS_ITEMS_ITEMS',
		'orden'			=> '1',
		'crear_label'	=> '80px',
		'crear_txt'		=> '660px',
		'filtros_extra'	=> '',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_item'		=>array(
						'campo'			=> 'id_item',
						'label'			=> 'Proyecto',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '1',
						'default'		=> '[id_item]',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,codigo;nombre|productos_items',
						'load'			=> 'id_items_deposito_tipo||id,nombre|productos_depositos_tipos|where id_item=[id_item];id_subgrupo||id,nombre|productos_subgrupos|where id_item=[id_item]',
						'width'			=> '140px',
						'derecha'		=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'tip_foreig'	=> '1',
						'foreig'		=> '1'
				),
				'id_items_deposito_tipo'=>array(
						'campo'			=> 'id_items_deposito_tipo',
						'label'			=> 'Modelo',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '1',
						'default'		=> '[id_tipo]',
						'foreig'		=> '1',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,nombre|productos_depositos_tipos',
						'width'			=> '95px',
						'derecha'		=> '2',
						'tags'			=> '1',
						'queries'		=> '1',
						'load'			=> '|||nombre,precio,area,tipo,descripcion|productos_depositos_tipos|where id=[id_items_deposito_tipo]'
				),
				'id_subgrupo'	=>array(
						'campo'			=> 'id_subgrupo',
						'label'			=> 'Torre',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '0',
						'default'		=> '[id_subgrupo]',
						'foreig'		=> '1',
						'style'			=> 'width:auto,',
						'opciones'		=> 'id,nombre|productos_subgrupos|where 0',
						'width'			=> '95px',
						'derecha'		=> '2',
						'tags'			=> '1',
						'queries'		=> '1'
				),
				'numero'		=>array(
						'campo'			=> 'numero',
						'label'			=> 'Número',
						'width'			=> '30px',
						'tipo'			=> 'inp',
						'like'			=> '1',
						'style'			=> 'width:50px;',
						'derecha'		=> '2',
						'validacion'	=> '1',
						'listable'		=> '1'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'derecha'		=> '1'
				),
				'tipo'			=>array(
						'campo'			=> 'tipo',
						'label'			=> 'Tipo',
						'tipo'			=> 'com',
						'default'		=> '0',
						'opciones'		=>array(
								'1'			=> 'Sótano',
								'2'			=> 'Semisótano'
						),
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'derecha'		=> '2',
						'size'			=> '8',
						'queries'		=> '1'
				),
				'precio'		=>array(
						'campo'			=> 'precio',
						'label'			=> 'Precio',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency'
				),
				'area'			=>array(
						'campo'			=> 'area',
						'label'			=> 'Área',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;'
				),
				'descripcion'	=>array(
						'campo'			=> 'descripcion',
						'label'			=> 'Descripción breve',
						'tipo'			=> 'txt',
						'listable'		=> '0',
						'validacion'	=> '0',
						'style'			=> 'height:70px;width:605px;'
				),
				'id_status'		=>array(
						'campo'			=> 'id_status',
						'label'			=> 'Status',
						'width'			=> '60px',
						'listable'		=> '1',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,nombre|productos_stock_status',
						'derecha'		=> '1',
						'default'		=> '1',
						'queries'		=> '1',
						'frozen'		=> '1'
				),
				'venta_factura'	=>array(
						'campo'			=> 'venta_factura',
						'label'			=> '# Factura',
						'width'			=> '60px',
						'tipo'			=> 'inp',
						'like'			=> '1',
						'style'			=> 'width:50px;',
						'derecha'		=> '1',
						'frozen'		=> '1',
						'listable'		=> '1'
				),
				'venta_precio'	=>array(
						'campo'			=> 'venta_precio',
						'label'			=> 'Precio Venta',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'frozen'		=> '1',
						'format'		=> 'currency'
				),
				'venta_fecha'	=>array(
						'campo'			=> 'venta_fecha',
						'label'			=> 'Fecha Venta',
						'tipo'			=> 'fch',
						'width'			=> '80px',
						'listable'		=> '1',
						'validacion'	=> '0',
						'formato'		=> '7',
						'style'			=> '',
						'derecha'		=> '2',
						'frozen'		=> '1',
						'queries'		=> '1'
				),
				'venta_abono'	=>array(
						'campo'			=> 'venta_abono',
						'label'			=> 'Abonos',
						'width'			=> '60px',
						'tipo'			=> 'inp',
						'style'			=> 'width:50px;',
						'derecha'		=> '1',
						'frozen'		=> '1',
						'listable'		=> '1'
				),
				'venta_total_facturas'=>array(
						'campo'			=> 'venta_total_facturas',
						'label'			=> 'Facturación',
						'width'			=> '60px',
						'tipo'			=> 'inp',
						'style'			=> 'width:100px;',
						'derecha'		=> '2',
						'frozen'		=> '1',
						'listable'		=> '1'
				),
				'venta_id_cliente'=>array(
						'campo'			=> 'venta_id_cliente',
						'label'			=> 'Cliente',
						'tipo'			=> 'hid',
						'style'			=> 'width:150px;',
						'derecha'		=> '1',
						'opciones'		=> 'id,nombre;apellidos|clientes',
						'frozen'		=> '1',
						'listable'		=> '0',
						'width'			=> '150px',
						'tip_foreig'	=> '1',
						'queries'		=> '0'
				),
				'venta_id_vendedor'=>array(
						'campo'			=> 'venta_id_vendedor',
						'label'			=> 'Asesor',
						'tipo'			=> 'hid',
						'style'			=> 'width:150px;',
						'opciones'		=> 'id,nombre;apellidos|usuarios',
						'derecha'		=> '2',
						'frozen'		=> '1',
						'queries'		=> '1',
						'listable'		=> '1',
						'width'			=> '150px',
						'tip_foreig'	=> '1'
				),
				'codigo'		=>array(
						'campo'			=> 'codigo',
						'label'			=> 'Código',
						'width'			=> '30px',
						'tipo'			=> 'inp',
						'like'			=> '1',
						'style'			=> 'width:100px;',
						'derecha'		=> '1'
				),
				'method'		=>array(
						'campo'			=> 'method',
						'tipo'			=> 'inp',
						'indicador'		=> '1'
				),
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1',
						'listable'		=> '0'
				)
		),
		'edicion_completa'=> '1',
		'calificacion'	=> '0',
		'importar_csv'	=> '0',
		'width_listado'	=> '',
		'edicion_rapida'	=> '0',
		'crear_pruebas'	=> '0',
		'exportar_excel'	=> '1',
		'disabled'		=> '0'
);
/******************************************************************************************************************************************************/

$objeto_tabla['PRODUCTOS_FOTOS']=array(
		'titulo'		=> 'Fotos',
		'nombre_singular'=> 'galería de fotos',
		'nombre_plural'	=> 'galeria de fotos',
		'tabla'			=> 'productos_fotos',
		'archivo'		=> 'productos_fotos',
		'archivo_hijo'	=> 'productos_fotos_fotos',
		'prefijo'		=> 'profot',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'visibilidad'	=> '1',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '0',
		'menu_label'	=> 'Fotos',
		'me'			=> 'PRODUCTOS_FOTOS',
		'orden'			=> '0',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'id_tipo'		=>array(
						'campo'			=> 'id_tipo',
						'label'			=> 'Grupo',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '1',
						'default'		=> '[id_tipo]',
						'foreig'		=> '1',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,nombre|productos_tipos',
						'width'			=> '95px',
						'derecha'		=> '2',
						'tags'			=> '1',
						'queries'		=> '1'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '300px',
						'unique'		=> '0',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'controles'		=> '<a  href="custom/productos_fotos_fotos.php?id_grupo=[id]">{select count(*) from productos_fotos_fotos where id_grupo=[id]}  fotos</a>
							'
				),
				'web'			=>array(
						'campo'			=> 'web',
						'tipo'			=> 'web'
				)
		),
		'grupo'			=> 'productos',
		'por_linea'		=> '1',
		'web'			=> '0'
);
/******************************************************************************************************************************************************/

$objeto_tabla['PRODUCTOS_FOTOS_FOTOS']=array(
		'titulo'		=> 'Galería {select nombre from productos_fotos_fotos where id=[id]}',
		'nombre_singular'=> 'foto',
		'nombre_plural'	=> 'fotos',
		'tabla'			=> 'productos_fotos_fotos',
		'archivo'		=> 'productos_fotos_fotos',
		'prefijo'		=> 'banfot',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'edicion_completa'=> '1',
		'crear'			=> '1',
		'crear_label'	=> '200px',
		'crear_txt'		=> '400px',
		'altura_listado'	=> '60px',
		'visibilidad'	=> '1',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '0',
		'menu_label'	=> '',
		'por_pagina'	=> '56',
		'me'			=> 'PRODUCTOS_FOTOS_FOTOS',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'id_grupo'		=>array(
						'campo'			=> 'id_grupo',
						'tipo'			=> 'hid',
						'listable'		=> '0',
						'validacion'	=> '0',
						'default'		=> '[id_grupo]',
						'foreig'		=> '1',
						'foreigkey'		=> 'PRODUCTOS_FOTOS',
						'opciones'		=> 'id,nombre|productos_fotos'
				),
				'file'			=>array(
						'campo'			=> 'file',
						'label'			=> 'Foto',
						'tipo'			=> 'img',
						'listable'		=> '1',
						'validacion'	=> '1',
						'prefijo'		=> 'profot',
						'carpeta'		=> 'profot_imas',
						'tamanos'		=> '150x120,980x383',
						'tamano_listado'	=> '1',
						'width'			=> '150px',
						'style'			=> 'width:150px,height:auto,'
				),
				'foto_descripcion'=>array(
						'campo'			=> 'foto_descripcion',
						'label'			=> 'texto',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '207px'
				),
				'url'			=>array(
						'campo'			=> 'url',
						'label'			=> 'Url',
						'tipo'			=> 'inp',
						'width'			=> '200px',
						'style'			=> 'width:200px;',
						'listable'		=> '1'
				),
				'web'			=>array(
						'campo'			=> 'web',
						'tipo'			=> 'web'
				)
		),
		'grupo'			=> 'productos',
		'por_linea'		=> '4',
		'web'			=> '0',
		'calificacion'	=> '1',

);

/******************************************************************************************************************************************************/

$objeto_tabla['VENTAS_ITEMS']=array(
		'titulo'		=> 'Atenciones',
		'nombre_singular'=> 'atención',
		'nombre_plural'	=> 'atenciones',
		'tabla'			=> 'ventas_items',
		'archivo'		=> 'ventas_items',
		'prefijo'		=> 'venite',
		'eliminar'		=> '0',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '1',
		'buscar'		=> '1',
		'busqueda_estricta'=> '1',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Atenciones',
		'me'			=> 'VENTAS_ITEMS',
		'orden'			=> '0',
		'onload_include'	=> 'base2/update_alertas.php',
		'onload_script'	=> '<style>#id_in_id_jefe{display:none;}#id_in_id_usuario{/*display:none;*/}</style>',
		'events'		=>array(
				'on_session'	=> ''
		),
		'procesos'		=>array(
				array(
						'label'			=> 'VENTA / SEPARACION',
						'ot'			=> 'productos_ventas',
						'accion'		=> 'insert',
						'extra'			=> 'id=[id]',
						'buttom'		=> 'Venta / Separación',
						'params'		=> 'crear=1&id_canal%7Cindicador=1&id_item%7Cindicador=1&pedido%7Cindicador=1&id_usuario%7Cindicador=1&id_sectorista%7Cindicador=1&id_cliente%7Cindicador=1&id_banco%7Cindicador=1&onload_include=base2%2Fon_atencion_venta.php'
				)
		),
		'postscript'	=> '
				
				if(LL["fecha_creacion2"]!="0000-00-00 00:00:00"){
					update(["fecha_creacion"=>LL["fecha_creacion2"]],TT,"where id=II",0);
				}

				$info=" / ".dato("nombre","productos_items","where id=".LL["id_item"],0)
					 ." / ".dato("numero","productos_items_items","where id=".LL["id_items_item"],0)
					 ." / ".dato("nombre","usuarios","where id=".LL["id_usuario"],0)
					 ." ".dato("apellidos","usuarios","where id=".LL["id_usuario"],0);

				$info2=" (".dato("nombre","usuarios","where id=".LL["id_usuario"],0)
					 ." ".dato("apellidos","usuarios","where id=".LL["id_usuario"],0)
					 ." ".fecha_formato("now()",0)
					 .")";

				if(SS=="insert"){
				
					insert([
							"fecha_creacion"=>"now()",
							"id_grupo"	=>	II,
							"texto"		=>	"Primer contacto",
							"tipo"		=>	"3",
							"id_usuario"=>	LL["id_usuario"],
							"id_status"		=>	"9"
							]
							,"ventas_mensajes"
							,0
							);

				}

				if(SS=="insert" or SS=="update"){

					$id_item_item=$id_item_estacionamiento=$id_item_deposito="";
					
					foreach(json_decode(LL["pedido"]) as $pedido){
						if($pedido->type=="departamento")
							$id_item_item=$pedido->id;
						elseif($pedido->type=="estacionamiento")
							$id_item_estacionamiento=$pedido->id;
						elseif($pedido->type=="deposito")
							$id_item_deposito=$pedido->id;
					}

					update(
						[
						"user"						=>dato("id_sesion","usuarios","where id=".LL["id_usuario"]),
						"id_item_item"				=>$id_item_item,
						"id_item_estacionamiento"	=>$id_item_estacionamiento,
						"id_item_deposito"			=>$id_item_deposito
						],
						TT,
						"where id=".II,0);													

					update(
							[
						    "id_usuario"=>LL["id_usuario"],
						    "user"		=>LL["user"],
						    "info"		=>$info,
						    "info2"		=>$info2
						    ],
							"clientes",
							"where id=".LL["id_cliente"],
							0
							);

				}
				
				if(SS=="updatemass"){

					$usu_session = dato("id_sesion","usuarios","where id=".LL["id_usuario"],0);

					foreach(AA as $i){

						$ll=fila(CC,TT,"where id=".$i,0);

						update(["user"=>$usu_session],TT,"where id=".$i,0);

						update(["user"=>$usu_session,"id_usuario"=>$ll["id_usuario"],"info"=>$info,"info2"=>$info2],"clientes","where id=".$ll["id_cliente"],0);

					}

				}

		',
		'mass_actions'	=> 'id_usuario',
		'joins'			=>array(
				'clientes'		=> 'ventas_items.id_cliente=clientes.id',
				'usuarios'		=> 'ventas_items.id_usuario=usuarios.id',
				'productos_items_items'=> 'ventas_items.id_item_item=productos_items_items.id',
				'productos_estacionamientos_items_items'=> 'ventas_items.id_item_estacionamiento=productos_estacionamientos_items_items.id',
				'productos_depositos_items_items'=> 'ventas_items.id_item_deposito=productos_depositos_items_items.id'
		),
		'more'			=>array(
				'clientes'		=> '
			distrito?listable=1&queries=1&after=id_cliente,
			modo_contacto?listable=1&queries=1&after=id_cliente,
			id_edad?listable=1&queries=1&after=id_cliente',
				'usuarios'		=> 'id_jefe?listable=1&queries=1&after=id_usuario',
				'productos_items_items'=> '
			has_balcon?queries=1,
			num_rooms?queries=1,
			vista?queries=1,
			num_bathrooms?queries=1,
			id_subgrupo?queries=1&after=id_item,
			id_items_tipo?queries=1&after=id_item&label=Modelo de Departamento&after=num_bathrooms',
				'productos_estacionamientos_items_items'=> 'id_items_estacionamiento_tipo?queries=1&label=Modelo de estacionamiento',
				'productos_depositos_items_items'=> 'id_items_deposito_tipo?queries=1&label=Modelo de deposito'
		),
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr',
						'listable'		=> '1',
						'formato'		=> '7b',
						'queries'		=> '1',
						'edit'			=> '1',
						'width'			=> '100px'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'fecha_creacion2'=>array(
						'campo'			=> 'fecha_creacion2',
						'label'			=> 'Fecha Creacion',
						'tipo'			=> 'fch',
						'width'			=> '80px',
						'listable'		=> '0',
						'validacion'	=> '0',
						'formato'		=> '7b',
						'derecha'		=> '1',
						'rango'			=> '-4 years,now',
						'time'			=> '0',
						'default'		=> 'now()'
				),
				'id_cliente'	=>array(
						'legend'		=> 'Cliente',
						'campo'			=> 'id_cliente',
						'label'			=> 'Cliente',
						'width'			=> '100px',
						'listable'		=> '1',
						'foreig'		=> '1',
						'default'		=> '[id_cliente]',
						'tipo'			=> 'hid',
						'derecha'		=> '1',
						'directlink'	=> 'id,nombre;apellidos;dni;info2|clientes|where visibilidad=1|6',
						'ondlselect'	=> '1',
						'opciones'		=> 'id,nombre;apellidos|clientes||telefono;celular_claro;celular_movistar;nextel;rpm;rpc;email;empresa',
						'style'			=> 'width:600px;',
						'controles'		=> '
							<a href="pop.php?app=enviar_cotizacion&id=[id]" style="color:red;" >Mensaje</a>
							<a target="_black" href="../cotizacion/[id]/imprimir">imprimir</a>
							<a href="custom/ventas_mensajes.php?id=[id]" rel="subs crear popup">{select count(*) from ventas_mensajes where id_grupo=[id]} mensajes</a>
							',
						'tip_foreig'	=> '1',
						'like'			=> '0',
						'tags'			=> '1',
						'validacion'	=> '1',
						'noedit'		=> '1',
						'crearforeig'	=> '1',
						'queries'		=> '1',
						'dlquery'		=> '1'
				),
				'id_status'		=>array(
						'campo'			=> 'id_status',
						'label'			=> 'Status',
						'width'			=> '100px',
						'listable'		=> '1',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,nombre|ventas_status|order by calificacion asc',
						'derecha'		=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'noedit'		=> '1',
						'validacion'	=> '0'
				),
				'id_nivel'		=>array(
						'campo'			=> 'id_nivel',
						'label'			=> 'NI',
						'width'			=> '30px',
						'listable'		=> '1',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,nombre|ventas_niveles|order by calificacion asc',
						'derecha'		=> '2',
						'tags'			=> '1',
						'queries'		=> '1',
						'noedit'		=> '1',
						'validacion'	=> '0'
				),
				'id_canal'		=>array(
						'campo'			=> 'id_canal',
						'label'			=> 'Código de Publicidad',
						'width'			=> '120px',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'opciones'		=> 'id,nombre|contacto_canales',
						'tags'			=> '1',
						'queries'		=> '1',
						'noedit'		=> '1',
						'validacion'	=> '0',
						'derecha'		=> '1'
				),
				'otro_canal'	=>array(
						'campo'			=> 'otro_canal',
						'label'			=> 'Otro Código de Publicidad',
						'tipo'			=> 'inp',
						'width'			=> '150px',
						'style'			=> 'width:120px;',
						'derecha'		=> '2'
				),
				'id_item'		=>array(
						'legend'		=> 'Inmuebles',
						'campo'			=> 'id_item',
						'label'			=> 'Proyecto',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '1',
						'default'		=> '[id_item]',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,codigo;nombre|productos_items',
						'onchange'		=> '$("in_id_item_button").set("href","base2/apps/depa.php?p="+this.value);',
						'load'			=> 'id_promocion||id,nombre|promociones|where id_item=',
						'width'			=> '140px',
						'derecha'		=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'tip_foreig'	=> '1',
						'button_app'	=> 'base2/apps/depa.php'
				),
				'pedido'		=>array(
						'label'			=> 'Inmuebles',
						'campo'			=> 'pedido',
						'tipo'			=> 'hid',
						'variable'		=> 'longtext',
						'obj'			=> '1'
				),
				'id_promocion'	=>array(
						'campo'			=> 'id_promocion',
						'label'			=> 'Promoción',
						'tipo'			=> 'hid',
						'validacion'	=> '0',
						'foreig'		=> '1',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,nombre|promociones|where 1',
						'width'			=> '95px',
						'derecha'		=> '1',
						'listable'		=> '0'
				),
				'id_item_item'	=>array(
						'campo'			=> 'id_item_item',
						'tipo'			=> 'hid'
				),
				'id_item_estacionamiento'=>array(
						'campo'			=> 'id_item_estacionamiento',
						'tipo'			=> 'hid'
				),
				'id_item_deposito'=>array(
						'campo'			=> 'id_item_deposito',
						'tipo'			=> 'hid'
				),
				'forma_pago'	=>array(
						'campo'			=> 'forma_pago',
						'label'			=> 'Forma de Pago',
						'tipo'			=> 'com',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'Contado',
								'2'			=> 'Crédito Directo',
								'3'			=> 'Crédito Hipotecario Tradicional',
								'4'			=> 'Plan Ahorro'
						),
						'eventos'		=>array(
								'1'			=> '$0("id_in_porcentaje_cuota_inicial");$0("id_in_cuota_inicial");$0("id_in_saldo_financiar");$0("id_in_saldo_inmobiliaria");$0("id_in_saldo_inmobiliaria_cuotas");$0("id_in_saldo_ahorro");$0("id_in_saldo_ahorro_cuotas");',
								'2'			=> '$0("id_in_porcentaje_cuota_inicial");$0("id_in_cuota_inicial");$0("id_in_saldo_financiar");$0("id_in_saldo_inmobiliaria");$0("id_in_saldo_inmobiliaria_cuotas");$0("id_in_saldo_ahorro");$0("id_in_saldo_ahorro_cuotas");',
								'3'			=> '$1("id_in_porcentaje_cuota_inicial");$1("id_in_cuota_inicial");$1("id_in_saldo_financiar");$0("id_in_saldo_inmobiliaria");$0("id_in_saldo_inmobiliaria_cuotas");$0("id_in_saldo_ahorro");$0("id_in_saldo_ahorro_cuotas");',
								'4'			=> '$1("id_in_porcentaje_cuota_inicial");$1("id_in_cuota_inicial");$1("id_in_saldo_financiar");$1("id_in_saldo_inmobiliaria");$1("id_in_saldo_inmobiliaria_cuotas");$1("id_in_saldo_ahorro");$1("id_in_saldo_ahorro_cuotas");'
						),
						'derecha'		=> '1',
						'legend'		=> 'Pago'
				),
				'pvlista'		=>array(
						'campo'			=> 'pvlista',
						'label'			=> 'Precio',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency'
				),
				'pvpromocion'	=>array(
						'campo'			=> 'pvpromocion',
						'label'			=> 'Precio Final',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'onchange'		=> '$("in_saldo_financiar").value=$("in_pvpromocion").value-$("in_cuota_inicial").value;',
						'format'		=> 'currency'
				),
				'porcentaje_cuota_inicial'=>array(
						'campo'			=> 'porcentaje_cuota_inicial',
						'label'			=> 'Cuota Inicial %',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:40px;',
						'onchange'		=> '$("in_cuota_inicial").value=0.01*$("in_pvpromocion").value*$("in_porcentaje_cuota_inicial").value;$("in_saldo_financiar").value=$("in_pvpromocion").value-$("in_cuota_inicial").value;$("in_saldo_inmobiliaria").value=$("in_cuota_inicial").value;$("in_saldo_ahorro").value="0"'
				),
				'cuota_inicial'	=>array(
						'campo'			=> 'cuota_inicial',
						'label'			=> '',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'onchange'		=> '$("in_saldo_financiar").value=$("in_pvpromocion").value-$("in_cuota_inicial").value;',
						'format'		=> 'currency'
				),
				'saldo_inmobiliaria'=>array(
						'campo'			=> 'saldo_inmobiliaria',
						'label'			=> 'Pagar a inmobiliaria',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'listyle'		=> 'margin-left:321px;clear:left;display:none;',
						'onchange'		=> '$("in_saldo_ahorro").value=$("in_cuota_inicial").value-$("in_saldo_inmobiliaria").value;',
						'format'		=> 'currency'
				),
				'saldo_inmobiliaria_cuotas'=>array(
						'campo'			=> 'saldo_inmobiliaria_cuotas',
						'label'			=> 'Nro Cuotas',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:40px;',
						'listyle'		=> 'display:none;',
						'default'		=> '2'
				),
				'saldo_ahorro'	=>array(
						'campo'			=> 'saldo_ahorro',
						'label'			=> 'Pagar Plan Ahorro',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'listyle'		=> 'margin-left:321px;clear:left;display:none;',
						'onchange'		=> '$("in_saldo_inmobiliaria").value=$("in_cuota_inicial").value-$("in_saldo_ahorro").value;',
						'format'		=> 'currency'
				),
				'saldo_ahorro_cuotas'=>array(
						'campo'			=> 'saldo_ahorro_cuotas',
						'label'			=> 'Nro Cuotas',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:40px;',
						'listyle'		=> 'display:none;',
						'default'		=> '6',
						'format'		=> 'currency'
				),
				'saldo_financiar'=>array(
						'campo'			=> 'saldo_financiar',
						'label'			=> 'Saldo a Financiar',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'listyle'		=> 'margin-left:317px;',
						'format'		=> 'currency'
				),
				'separacion'	=>array(
						'campo'			=> 'separacion',
						'label'			=> 'Separación',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency'
				),
				'id_banco'		=>array(
						'legend'		=> 'Sectorista',
						'campo'			=> 'id_banco',
						'label'			=> 'Banco',
						'tipo'			=> 'hid',
						'validacion'	=> '0',
						'foreig'		=> '1',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,nombre|bancos',
						'width'			=> '95px',
						'derecha'		=> '1',
						'load'			=> 'id_sectorista||id,apellidos|bancos_sectoristas|where id_grupo=',
						'queries'		=> '1',
						'listable'		=> '1'
				),
				'id_sectorista'	=>array(
						'campo'			=> 'id_sectorista',
						'label'			=> 'Sectorista',
						'tipo'			=> 'hid',
						'validacion'	=> '0',
						'foreig'		=> '1',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,nombre;apellidos|bancos_sectoristas|where id_grupo=1',
						'width'			=> '95px',
						'derecha'		=> '2',
						'queries'		=> '1',
						'listable'		=> '1',
						'tip_foreig'	=> '1'
				),
				'sectorista_nombre'=>array(
						'campo'			=> 'sectorista_nombre',
						'label'			=> 'Sectorista del cliente',
						'tipo'			=> 'inp',
						'width'			=> '150px',
						'style'			=> 'width:120px;',
						'derecha'		=> '1',
						'listable'		=> '1'
				),
				'sectorista_email'=>array(
						'campo'			=> 'sectorista_email',
						'label'			=> 'email',
						'tipo'			=> 'inp',
						'width'			=> '150px',
						'style'			=> 'width:120px;',
						'derecha'		=> '2',
						'listable'		=> '1'
				),
				'sectorista_telefono'=>array(
						'campo'			=> 'sectorista_telefono',
						'label'			=> 'teléfono',
						'tipo'			=> 'inp',
						'width'			=> '150px',
						'style'			=> 'width:120px;',
						'derecha'		=> '2',
						'listable'		=> '1'
				),
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1'
				),
				'id_usuario'	=>array(
						'campo'			=> 'id_usuario',
						'label'			=> 'Asesor',
						'width'			=> '120px',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'opciones'		=> 'id,nombre;apellidos|usuarios',
						'derecha'		=> '1',
						'tip_foreig'	=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'noedit'		=> '1',
						'crearforeig'	=> '0',
						'validacion'	=> '0',
						'indicador'		=> '0'
				),
				'user'			=>array(
						'campo'			=> 'user',
						'tipo'			=> 'user'
				)
		),
		'grupo'			=> 'atenciones',
		'edicion_completa'=> '1',
		'expandir_vertical'=> '0',
		'control'		=> '1',
		'edicion_rapida'	=> '1',
		'set_fila_fijo'	=> '',
		'alias_grupo'	=> '',
		'seccion'		=> 'atenciones',
		'order_by'		=> 'id desc',
		'por_pagina'	=> '40',
		'exportar_excel'	=> '1',
		'user'			=> '1',
		'stat'			=> '0',
		'repos'			=> 'vendedores=Reporte de Ventas|fecha_creacion,id_item'
);
/******************************************************************************************************************************************************/

$objeto_tabla['CLIENTES']=array(
		'grupo'			=> 'atenciones',
		'titulo'		=> 'Clientes',
		'nombre_singular'=> 'cliente',
		'nombre_plural'	=> 'cliente',
		'tabla'			=> 'clientes',
		'archivo'		=> 'clientes',
		'prefijo'		=> 'clie',
		'eliminar'		=> '0',
		'editar'		=> '1',
		'crear'			=> '1',
		'crear_label'	=> '100px',
		'crear_txt'		=> '400px',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '1',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Clientes',
		'me'			=> 'CLIENTES',
		'orden'			=> '1',
		'onload_script'	=> '
		<style>
		#group_persona_jurídica { display:none; }
		#group_persona_contacto { display:none; }
		</style>
		<script>
		window.addEvent("domready",function(){
		//alert($("in_tipo_cliente").value);
		});
		</script>
		',
		'postscript'	=> '
			/*
			$linea=fila("id_jefe,id","usuarios","where id_sesion=".LL["user"],1);

			update(array("id_jefe"=>$linea["id_jefe"],"id_usuario"=>$linea["id"]),TT,"where id=II",1);
			*/
		',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'tipo_cliente'	=>array(
						'campo'			=> 'tipo_cliente',
						'label'			=> 'Tipo de Cliente',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'validacion'	=> '1',
						'opciones'		=>array(
								'1'			=> 'Natural',
								'2'			=> 'Jurídico'
						),
						'eventos'		=>array(
								'1'			=> '$1("id_in_id_edad");$1("id_in_genero");$1("id_in_apellidos");$0("group_persona_contacto");$1("group_pago");$1("group_conyuge");$H("la_nombre","Nombre");$H("la_apellidos","Apellidos");$H("la_direccion","Dirección");$H("la_genero","Género");',
								'2'			=> '$0("id_in_id_edad");$0("id_in_genero");$0("id_in_apellidos");$1("group_persona_contacto");$0("group_pago");$0("group_conyuge");$H("la_nombre","Razón Social");$H("la_direccion","Dirección");'
						),
						'derecha'		=> '1',
						'width'			=> '60px',
						'queries'		=> '1'
				),
				'modo_contacto'	=>array(
						'campo'			=> 'modo_contacto',
						'label'			=> 'Tipo de Contacto',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'presencial',
								'2'			=> 'telefónico',
								'3'			=> 'virtual'
						),
						'derecha'		=> '2',
						'width'			=> '60px',
						'queries'		=> '1'
				),
				'id_edad'		=>array(
						'campo'			=> 'id_edad',
						'label'			=> 'Rango de edad',
						'width'			=> '100px',
						'listable'		=> '1',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,nombre|cliente_edades|order by id asc',
						'derecha'		=> '2',
						'tags'			=> '1',
						'queries'		=> '1',
						'noedit'		=> '1',
						'validacion'	=> '0'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'inlist'		=> 'nombre;apellidos',
						'label'			=> 'Nombre/Empresa',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '150px',
						'style'			=> 'width:120px;',
						'derecha'		=> '1',
						'like'			=> '0',
						'controles'		=> '
							<a href="custom/ventas_items.php?id_cliente=[id]" rel="mensajes">{select count(*) from ventas_items where id_cliente=[id]} atenciones</a>',
						'tags'			=> '1',
						'queries'		=> '1',
						'dlquery'		=> '1',
						'concat'		=> 'apellidos'
				),
				'apellidos'		=>array(
						'campo'			=> 'apellidos',
						'label'			=> 'Apellidos',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '130px',
						'style'			=> 'width:150px;',
						'derecha'		=> '2',
						'like'			=> '0',
						'tags'			=> '1',
						'dlquery'		=> '0',
						'queries'		=> '0'
				),
				'tipo_documento'	=>array(
						'campo'			=> 'tipo_documento',
						'label'			=> 'Tipo de Documento',
						'tipo'			=> 'com',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'DNI',
								'2'			=> 'Carnet de Extranjeria',
								'3'			=> 'RUC'
						),
						'default'		=> '1',
						'style'			=> 'width:45px;',
						'derecha'		=> '2',
						'width'			=> '70px'
				),
				'dni'			=>array(
						'campo'			=> 'dni',
						'label'			=> '# de doc',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '150px',
						'derecha'		=> '2',
						'default'		=> '',
						'like'			=> '1',
						'unique'		=> '0',
						'size'			=> '11',
						'onchange'		=> 'if(this.value.length<8){alert("minimo 8 caracteres");}'
				),
				'genero'		=>array(
						'campo'			=> 'genero',
						'label'			=> 'Género',
						'tipo'			=> 'com',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'Masculino',
								'2'			=> 'Femenino'
						),
						'default'		=> '1',
						'style'			=> 'width:45px;',
						'derecha'		=> '2',
						'width'			=> '70px'
				),
				'departamento'	=>array(
						'campo'			=> 'departamento',
						'label'			=> 'Departamento',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_departamentos',
						'load'			=> 'provincia||id,nombre|geo_provincias|where id_departamento=',
						'style'			=> 'width:150px;',
						'derecha'		=> '1'
				),
				'provincia'		=>array(
						'campo'			=> 'provincia',
						'label'			=> 'Provincia',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_provincias',
						'load'			=> 'distrito||id,nombre|geo_distritos|where id_provincia=',
						'style'			=> 'width:150px;',
						'derecha'		=> '2'
				),
				'distrito'		=>array(
						'campo'			=> 'distrito',
						'label'			=> 'Distrito',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_distritos',
						'style'			=> 'width:150px;',
						'derecha'		=> '2'
				),
				'direccion'		=>array(
						'campo'			=> 'direccion',
						'label'			=> 'Dirección',
						'tipo'			=> 'txt',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '150px',
						'style'			=> 'width:600px;height:40px;',
						'derecha'		=> '1'
				),
				'email'			=>array(
						'campo'			=> 'email',
						'label'			=> 'Email',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '150px',
						'style'			=> 'width:150px;',
						'derecha'		=> '1',
						'default'		=> '',
						'like'			=> '1',
						'unique'		=> '0'
				),
				'telefono'		=>array(
						'campo'			=> 'telefono',
						'label'			=> 'Teléfono Fijo',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'celular_claro'	=>array(
						'campo'			=> 'celular_claro',
						'label'			=> 'Celular',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'telefono_oficina'=>array(
						'campo'			=> 'telefono_oficina',
						'label'			=> 'Teléfono Oficina',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '1'
				),
				'celular_movistar'=>array(
						'campo'			=> 'celular_movistar',
						'label'			=> 'Movistar',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'nextel'		=>array(
						'campo'			=> 'nextel',
						'label'			=> 'Entel',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'rpm'			=>array(
						'campo'			=> 'rpm',
						'label'			=> 'RPM',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'rpc'			=>array(
						'campo'			=> 'rpc',
						'label'			=> 'RPC',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'nombre_conyuge'	=>array(
						'campo'			=> 'nombre_conyuge',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '150px',
						'style'			=> 'width:120px;',
						'derecha'		=> '1',
						'like'			=> '0',
						'tags'			=> '1',
						'queries'		=> '0',
						'dlquery'		=> '0',
						'legend'		=> 'Conyuge'
				),
				'apellidos_conyuge'=>array(
						'campo'			=> 'apellidos_conyuge',
						'label'			=> 'Apellidos',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '130px',
						'style'			=> 'width:150px;',
						'derecha'		=> '2',
						'like'			=> '0',
						'tags'			=> '1'
				),
				'dni_conyuge'	=>array(
						'campo'			=> 'dni_conyuge',
						'label'			=> 'DNI',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '150px',
						'derecha'		=> '2',
						'default'		=> '',
						'like'			=> '1',
						'unique'		=> '0',
						'size'			=> '11',
						'onchange'		=> 'if(this.value.length<8){alert("minimo 8 caracteres");}'
				),
				'genero_conyuge'	=>array(
						'campo'			=> 'genero_conyuge',
						'label'			=> 'Género',
						'tipo'			=> 'com',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'Masculino',
								'2'			=> 'Femenino'
						),
						'default'		=> '1',
						'style'			=> 'width:45px;',
						'derecha'		=> '2',
						'width'			=> '30px'
				),
				'departamento_conyuge'=>array(
						'campo'			=> 'departamento_conyuge',
						'label'			=> 'Departamento',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_departamentos',
						'load'			=> 'provincia_conyuge||id,nombre|geo_provincias|where id_departamento=',
						'style'			=> 'width:150px;',
						'derecha'		=> '1'
				),
				'provincia_conyuge'=>array(
						'campo'			=> 'provincia_conyuge',
						'label'			=> 'Provincia',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_provincias',
						'load'			=> 'distrito_conyuge||id,nombre|geo_distritos|where id_provincia=',
						'style'			=> 'width:150px;',
						'derecha'		=> '2'
				),
				'distrito_conyuge'=>array(
						'campo'			=> 'distrito_conyuge',
						'label'			=> 'Distrito',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_distritos',
						'style'			=> 'width:150px;',
						'derecha'		=> '2'
				),
				'direccion_conyuge'=>array(
						'campo'			=> 'direccion_conyuge',
						'label'			=> 'Dirección',
						'tipo'			=> 'txt',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '150px',
						'style'			=> 'width:600px;height:40px;',
						'derecha'		=> '1'
				),
				'email_conyuge'	=>array(
						'campo'			=> 'email_conyuge',
						'label'			=> 'Email',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '150px',
						'style'			=> 'width:150px;',
						'derecha'		=> '1',
						'default'		=> '',
						'like'			=> '1',
						'unique'		=> '0'
				),
				'telefono_conyuge'=>array(
						'campo'			=> 'telefono_conyuge',
						'label'			=> 'Teléfono Casa',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'telefono_oficina_conyuge'=>array(
						'campo'			=> 'telefono_oficina_conyuge',
						'label'			=> 'Teléfono Oficina',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'celular_claro_conyuge'=>array(
						'campo'			=> 'celular_claro_conyuge',
						'label'			=> 'Claro',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '1'
				),
				'celular_movistar_conyuge'=>array(
						'campo'			=> 'celular_movistar_conyuge',
						'label'			=> 'Movistar',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'nextel_conyuge'	=>array(
						'campo'			=> 'nextel_conyuge',
						'label'			=> 'Entel',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'rpm_conyuge'	=>array(
						'campo'			=> 'rpm_conyuge',
						'label'			=> 'RPM',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'rpc_conyuge'	=>array(
						'campo'			=> 'rpc_conyuge',
						'label'			=> 'RPC',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'pag_tipo_documento'=>array(
						'legend'		=> 'Pago',
						'campo'			=> 'pag_tipo_documento',
						'label'			=> 'Tipo de Recibo',
						'tipo'			=> 'com',
						'radio'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'Boleta',
								'2'			=> 'Factura'
						),
						'default'		=> '0'
				),
				'empresa'		=>array(
						'campo'			=> 'empresa',
						'label'			=> 'Empresa',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '200px',
						'style'			=> 'width:200px;',
						'derecha'		=> '1',
						'constante'		=> '0',
						'like'			=> '1',
						'disabled'		=> '1'
				),
				'pag_factura_razonsocial'=>array(
						'campo'			=> 'pag_factura_razonsocial',
						'label'			=> 'Razón Social',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'style'			=> 'width:200px;',
						'width'			=> '200px',
						'derecha'		=> '1'
				),
				'pag_factura_ruc'=>array(
						'campo'			=> 'pag_factura_ruc',
						'label'			=> 'RUC',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'style'			=> 'width:100px;',
						'width'			=> '100px',
						'derecha'		=> '2'
				),
				'contacto_nombre'=>array(
						'campo'			=> 'contacto_nombre',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '150px',
						'style'			=> 'width:150px;',
						'derecha'		=> '1',
						'legend'		=> 'Persona Contacto',
						'like'			=> '1'
				),
				'contacto_apellidos'=>array(
						'campo'			=> 'contacto_apellidos',
						'label'			=> 'Apellidos',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '130px',
						'style'			=> 'width:150px;',
						'derecha'		=> '2',
						'like'			=> '1'
				),
				'contacto_departamento'=>array(
						'campo'			=> 'contacto_departamento',
						'label'			=> 'Departamento',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_departamentos',
						'load'			=> 'contacto_provincia||id,nombre|geo_provincias|where id_departamento=',
						'style'			=> 'width:150px;',
						'derecha'		=> '1'
				),
				'contacto_provincia'=>array(
						'campo'			=> 'contacto_provincia',
						'label'			=> 'Provincia',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_provincias',
						'load'			=> 'contacto_distrito||id,nombre|geo_distritos|where id_provincia=',
						'style'			=> 'width:150px;',
						'derecha'		=> '2'
				),
				'contacto_distrito'=>array(
						'campo'			=> 'contacto_distrito',
						'label'			=> 'Distrito',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_distritos',
						'style'			=> 'width:150px;',
						'derecha'		=> '2'
				),
				'contacto_direccion'=>array(
						'campo'			=> 'contacto_direccion',
						'label'			=> 'Dirección',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '150px',
						'style'			=> 'width:300px;',
						'derecha'		=> '1'
				),
				'contacto_email'	=>array(
						'campo'			=> 'contacto_email',
						'label'			=> 'Email',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '150px',
						'style'			=> 'width:150px;',
						'derecha'		=> '1',
						'default'		=> ''
				),
				'contacto_telefono'=>array(
						'campo'			=> 'contacto_telefono',
						'label'			=> 'Teléfono Casa',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'contacto_telefono_oficina'=>array(
						'campo'			=> 'contacto_telefono_oficina',
						'label'			=> 'Teléfono Oficina',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'contacto_celular_claro'=>array(
						'campo'			=> 'contacto_celular_claro',
						'label'			=> 'Claro',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '1'
				),
				'contacto_celular_movistar'=>array(
						'campo'			=> 'contacto_celular_movistar',
						'label'			=> 'Movistar',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'contacto_nextel'=>array(
						'campo'			=> 'contacto_nextel',
						'label'			=> 'Entel',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'contacto_rpm'	=>array(
						'campo'			=> 'contacto_rpm',
						'label'			=> 'RPM',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'contacto_rpc'	=>array(
						'campo'			=> 'contacto_rpc',
						'label'			=> 'RPC',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'info'			=>array(
						'campo'			=> 'info',
						'tipo'			=> 'txt',
						'style'			=> 'display:none;'
				),
				'user'			=>array(
						'campo'			=> 'user',
						'tipo'			=> 'user',
						'width'			=> ''
				),
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1'
				),
				'id_usuario'	=>array(
						'campo'			=> 'id_usuario',
						'label'			=> 'Asesor',
						'width'			=> '120px',
						'listable'		=> '1',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,nombre;apellidos|usuarios',
						'derecha'		=> '1',
						'tip_foreig'	=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'noedit'		=> '1',
						'default'		=> '[id_usuario]'
				),
				'info2'			=>array(
						'campo'			=> 'info2',
						'tipo'			=> 'inp',
						'indicador'		=> '0'
				)
		),
		'edicion_rapida'	=> '1',
		'edicion_completa'=> '1',
		'exportar_excel'	=> '0',
		'importar_csv'	=> '0',
		'user'			=> '1'
);
/******************************************************************************************************************************************************/

$objeto_tabla['VENTAS_MENSAJES']=array(
		'grupo'			=> 'atenciones',
		'alias_grupo'	=> '',
		'titulo'		=> 'Actividades',
		'nombre_singular'=> 'actividad',
		'nombre_plural'	=> 'actividades',
		'tabla'			=> 'ventas_mensajes',
		'archivo'		=> 'ventas_mensajes',
		'prefijo'		=> 'venmen',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'crear'			=> '1',
		'crear_label'	=> '60px',
		'crear_txt'		=> '550px',
		'menu'			=> '0',
		'menu_label'	=> 'Actividades',
		'por_pagina'	=> '10',
		'me'			=> 'VENTAS_MENSAJES',
		'onload_include'	=> 'base2/update_ventas_mensajes.php',
		'orden'			=> '0',
		'postscript'	=> '
			$linea=fila("id_item,id_cliente,id_usuario,user","ventas_items","where id=".LL["id_grupo"],0);
			if(SS=="update" or SS=="insert")
			{
				update(array("id_status"=>LL["id_status"]),"ventas_items","where id=".LL["id_grupo"],0);
				update(array("id_usuario"=>$linea["id_usuario"],"user"=>$linea["user"]),TT,"where id=".II,0);
			}



			if(SS=="insert" or SS=="update"){

				$linea=fila("id_cliente,id_usuario","ventas_items","where id=".LL["id_grupo"],0);

				$info2=" (".dato("nombre","usuarios","where id=".$linea["id_usuario"],0)
					 ." ".dato("apellidos","usuarios","where id=".$linea["id_usuario"],0)
					 ." ".fecha_formato("now()",0)
					 .")";

				update(
						[
					    "info2"		=>$info2
					    ],
						"clientes",
						"where id=".$linea["id_cliente"],
						0
						);

			}

			// include("base2/apps/crear_notificaciones.php");

		',
		'app'			=> '
		<a href="custom/ventas_mensajes.php?conf=estado%257Clistable%3D0%26alerta_fecha%257Cqueries%3D0%26fecha_creacion%257Cqueries%3D1%26crear%3D0%26order_by%3Did%2Bdesc">Actividades</a>
		<a href="custom/ventas_mensajes.php?conf=alerta_fecha%257Cqueries%3D1%26fecha_creacion%257Cqueries%3D0%26fecha_creacion%257Clistable%3D0%26titulo%3DAlertas%26crear%3D0%26edit%3D0%26order_by%3Did%2Bdesc&filter=ventas_mensajes%5B%5D=alerta_fecha%7C%5Btoday%5D%7C%5Btoday%5D">Alertas</a>
		',
		'joins'			=>array(
				'ventas_items'	=> 'ventas_mensajes.id_grupo=ventas_items.id',
				'usuarios'		=> 'ventas_items.id_usuario=usuarios.id'
		),
		'more'			=>array(
				'ventas_items'	=> '
				id_cliente?listable=1&queries=1&after=fecha_creacion&controles=,
				id_item?listable=1&queries=1&after=fecha_creacion,
				',
				'usuarios'		=> 'id_jefe?listable=1&queries=1&after=id_usuario'
		),
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr',
						'listable'		=> '1',
						'formato'		=> '7b',
						'width'			=> '100px',
						'queries'		=> '1'
				),
				'id_grupo'		=>array(
						'campo'			=> 'id_grupo',
						'tipo'			=> 'hid',
						'listable'		=> '0',
						'validacion'	=> '0',
						'default'		=> '[id]',
						'foreig'		=> '1'
				),
				'tipo'			=>array(
						'campo'			=> 'tipo',
						'label'			=> 'Tipo',
						'width'			=> '80px',
						'listable'		=> '1',
						'tipo'			=> 'hid',
						'validacion'	=> '1',
						'opciones'		=> 'id,nombre|mensajes_status',
						'default'		=> '3',
						'queries'		=> '1',
						'controles'		=> '<a href="custom/ventas_items.php?i=[id_grupo]" rel="file">atención</a>'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> '',
						'width'			=> '200px',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '1',
						'disabled'		=> '1'
				),
				'texto'			=>array(
						'campo'			=> 'texto',
						'label'			=> 'Mensaje',
						'tipo'			=> 'html',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '170px',
						'style'			=> 'height:200px;width:550px;',
						'listhtml'		=> '1'
				),
				'alerta'		=>array(
						'campo'			=> 'alerta',
						'label'			=> 'Alerta',
						'width'			=> '80px',
						'listable'		=> '1',
						'tipo'			=> 'hid',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|mensajes_alertas',
						'default'		=> '3',
						'queries'		=> '1'
				),
				'alerta_fecha'	=>array(
						'campo'			=> 'alerta_fecha',
						'label'			=> '',
						'tipo'			=> 'fch',
						'listable'		=> '1',
						'formato'		=> '7b',
						'time'			=> '1',
						'width'			=> '136px',
						'derecha'		=> '1',
						'default'		=> '',
						'rango'			=> 'now,+1 years',
						'queries'		=> '0'
				),
				'id_status'		=>array(
						'campo'			=> 'id_status',
						'label'			=> 'Status',
						'width'			=> '80px',
						'listable'		=> '1',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,nombre|ventas_status|order by calificacion asc',
						'derecha'		=> '2',
						'tags'			=> '1',
						'queries'		=> '1'
				),
				'adjunto'		=>array(
						'campo'			=> 'adjunto',
						'label'			=> 'Adjunto',
						'tipo'			=> 'sto',
						'width'			=> '150px',
						'style'			=> 'width:200px;',
						'listable'		=> '1',
						'validacion'	=> '0',
						'prefijo'		=> 'atc',
						'carpeta'		=> 'atc_imas',
						'disabled'		=> '1',
						'name'			=> 'adjunto',
						'enlace'		=> 'down'
				),
				'id_usuario'	=>array(
						'campo'			=> 'id_usuario',
						'label'			=> 'Asesor',
						'width'			=> '120px',
						'listable'		=> '1',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,nombre;apellidos|usuarios',
						'derecha'		=> '1',
						'tip_foreig'	=> '0',
						'tags'			=> '1',
						'queries'		=> '1',
						'noedit'		=> '1',
						'inherited'		=> '1',
						'disabled'		=> '0',
						'dlquery'		=> '0'
				),
				'id_speech'		=>array(
						'campo'			=> 'id_speech',
						'label'			=> '',
						'tipo'			=> 'inp',
						'derecha'		=> '1',
						'indicador'		=> '1',
						'listable'		=> '0',
						'width'			=> '20px'
				),
				'estado'		=>array(
						'campo'			=> 'estado',
						'label'			=> 'Estado',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'indicador'		=> '1',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'pendiente|#136CB2',
								'2'			=> 'para hoy|green',
								'3'			=> 'atrazado|red',
								'4'			=> 'cumplido|black'
						),
						'default'		=> '1',
						'style'			=> 'width:150px;',
						'width'			=> '100px'
				),
				'cumplido'		=>array(
						'campo'			=> 'cumplido',
						'label'			=> 'Cumplido',
						'radio'			=> '1',
						'tipo'			=> 'com',
						'opciones'		=>array(
								'1'			=> 'si',
								'0'			=> 'no'
						),
						'default'		=> '0',
						'style'			=> 'width:150px;',
						'width'			=> '70px'
				),
				'user'			=>array(
						'campo'			=> 'user',
						'tipo'			=> 'user',
						'queries'		=> '1'
				),
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1'
				)
		),
		'edicion_rapida'	=> '1',
		'calificacion'	=> '0',
		'edicion_completa'=> '1',
		'disabled'		=> '0',
		'user'			=> '1',
		'order_by'		=> 'id asc',
		'stat'			=> '0',
		'exportar_excel'	=> '1'
);
/******************************************************************************************************************************************************/

$objeto_tabla['TODOS']=array(
		'grupo'			=> 'atenciones',
		'alias_grupo'	=> '',
		'titulo'		=> 'Agenda',
		'nombre_singular'=> 'tarea',
		'nombre_plural'	=> 'tareas',
		'tabla'			=> 'todos',
		'archivo'		=> 'todos',
		'prefijo'		=> 'tod',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'crear'			=> '1',
		'crear_label'	=> '60px',
		'crear_txt'		=> '550px',
		'menu'			=> '1',
		'menu_label'	=> 'Agenda',
		'por_pagina'	=> '10',
		'me'			=> 'TODOS',
		'orden'			=> '0',
		'seccion'		=> 'Agenda',
		'onload_include'	=> 'base2/update_alertas_todos.php',	
		'events'		=>array(
				'on_session'	=> ''
		),
		'postscript'	=> '
				
				// if(LL["fecha_creacion2"]!="0000-00-00 00:00:00"){
				// 	update(["fecha_creacion"=>LL["fecha_creacion2"]],TT,"where id=II",0);
				// }

				if(SS=="insert" or SS=="update"){

					update(
						[
						"user"						=>dato("id_sesion","usuarios","where id=".LL["id_usuario"])
						],
						TT,
						"where id=".II,0);													

					update(
							[
						    "id_usuario"=>LL["id_usuario"],
						    "user"		=>LL["user"],
						    ],
							"todos_contactos",
							"where id=".LL["id_cliente"],
							0
							);

				}

		',
		'joins'			=>array(
				'todos_contactos'=> 'todos.id_cliente=todos_contactos.id',
				'usuarios'		=> 'todos.id_usuario=usuarios.id'
		),
		'more'			=>array(
		),
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr',
						'listable'		=> '1',
						'formato'		=> '7b',
						'width'			=> '100px',
						'queries'		=> '1'
				),
				'id_cliente'	=>array(
						'campo'			=> 'id_cliente',
						'label'			=> 'Contacto',
						'width'			=> '100px',
						'listable'		=> '1',
						'foreig'		=> '1',
						'default'		=> '[id_cliente]',
						'tipo'			=> 'hid',
						'derecha'		=> '1',
						'directlink'	=> 'id,nombre;apellidos;dni|todos_contactos|where visibilidad=1|6',
						// 'ondlselect'	=> '1',
						'opciones'		=> 'id,nombre;apellidos|todos_contactos||telefono',
						'style'			=> 'width:600px;',
						'tip_foreig'	=> '1',
						'like'			=> '0',
						'tags'			=> '1',
						'validacion'	=> '1',
						'noedit'		=> '1',
						'crearforeig'	=> '1',
						'queries'		=> '1',
						'dlquery'		=> '1',
						'controles'		=> '
							<a href="custom/todos_mensajes.php?id=[id]" rel="subs crear popup">{select count(*) from todos_mensajes where id_grupo=[id]} mensajes</a>
							'
				),
				'id_usuario'	=>array(
						'campo'			=> 'id_usuario',
						'label'			=> 'Asesor',
						'width'			=> '120px',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'opciones'		=> 'id,nombre;apellidos|usuarios',
						'derecha'		=> '1',
						'tip_foreig'	=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'noedit'		=> '1',
						'crearforeig'	=> '0',
						'validacion'	=> '0',
						'indicador'		=> '0'
				),
				'user'			=>array(
						'campo'			=> 'user',
						'tipo'			=> 'user'
				),
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1'
				)
		),
		'edicion_rapida'	=> '1',
		'calificacion'	=> '0',
		'edicion_completa'=> '1',
		'disabled'		=> '0',
		'user'			=> '1',
		'order_by'		=> 'id asc',
		'stat'			=> '0',
		'exportar_excel'	=> '1'
);
/******************************************************************************************************************************************************/

$objeto_tabla['TODOS_MENSAJES']=array(
		'grupo'			=> 'atenciones',
		'alias_grupo'	=> '',
		'titulo'		=> 'Actividades',
		'nombre_singular'=> 'actividad',
		'nombre_plural'	=> 'actividades',
		'tabla'			=> 'todos_mensajes',
		'archivo'		=> 'todos_mensajes',
		'prefijo'		=> 'todmen',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'crear'			=> '1',
		'crear_label'	=> '60px',
		'crear_txt'		=> '550px',
		'menu'			=> '0',
		'menu_label'	=> 'Actividades',
		'por_pagina'	=> '10',
		'me'			=> 'TODOS_MENSAJES',
		'orden'			=> '0',
		'onload_include'	=> 'base2/update_alertas_todos.php',		
		'onload_script'	=> '
		<style>
		#group_persona_jurídica { display:none; }
		#group_persona_contacto { display:none; }
		</style>
		<script>
		window.addEvent("domready",function(){
		//alert($("in_tipo_cliente").value);
		});
		</script>
		',		
		'postscript'	=> '
			$linea=fila("id_cliente,id_usuario,user","todos","where id=".LL["id_grupo"],0);
			if(SS=="update" or SS=="insert")
			{
			// 	update(array("id_status"=>LL["id_status"]),"ventas_items","where id=".LL["id_grupo"],0);
				update(array("id_usuario"=>$linea["id_usuario"],"user"=>$linea["user"]),TT,"where id=".II,0);
			}

			if(SS=="update" or SS=="insert")
			{
				include("base2/apps/crear_notificaciones.php");
			}

		',
		'joins'			=>array(
				'todos'			=> 'todos_mensajes.id_grupo=todos.id',
				'usuarios'		=> 'todos.id_usuario=usuarios.id'
		),
		'more'			=>array(
				'todos'			=> 'id_cliente?listable=1&queries=1&after=fecha_creacion&controles=',
				'usuarios'		=> 'id_jefe?listable=1&queries=1&after=id_usuario'
		),
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),

				'alerta_fecha'	=>array(
						'campo'			=> 'alerta_fecha',
						'label'			=> 'Fecha de la Alerta',
						'tipo'			=> 'fch',
						'listable'		=> '1',
						'formato'		=> '7b',
						'time'			=> '2',
						'width'			=> '136px',
						'derecha'		=> '1',
						'default'		=> '',
						'rango'			=> 'now,+1 years',
						'queries'		=> '1'
				),
				'alerta'		=>array(
						'campo'			=> 'alerta',
						'label'			=> 'Asunto de la Alerta',
						'tipo'			=> 'txt',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '170px',
						'style'			=> 'height:80px;width:550px;'
				),

				'texto2'			=>array(
						'campo'			=> 'texto2',
						'label'			=> 'Detalle de la Alerta',
						'tipo'			=> 'txt',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '170px',
						'style'			=> 'height:80px;width:550px;',
						'controles'		=> '<a href="custom/todos.php?i=[id_grupo]" rel="file">tareas</a>'
				),	
				'estado'		=>array(
						'campo'			=> 'estado',
						'label'			=> 'Estado',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'indicador'		=> '1',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'pendiente|#136CB2',
								'2'			=> 'para hoy|green',
								'3'			=> 'atrazado|red',
								'4'			=> 'cumplido|black'
						),
						'queries'		=> '1',
						'default'		=> '1',
						'style'			=> 'width:150px;',
						'width'			=> '100px'
				),				
				'id_grupo'		=>array(
						'campo'			=> 'id_grupo',
						'tipo'			=> 'hid',
						'listable'		=> '0',
						'validacion'	=> '0',
						'default'		=> '[id]',
						'foreig'		=> '1'
				),
			
				'texto'			=>array(
						'campo'			=> 'texto',
						'label'			=> 'Detalle Realizado',
						'tipo'			=> 'txt',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '170px',
						'style'			=> 'height:80px;width:550px;',
						'controles'		=> '<a href="custom/todos.php?i=[id_grupo]" rel="file">tareas</a>'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'label'			=> 'Fecha de la Realizado',
						'tipo'			=> 'fcr',
						'listable'		=> '1',
						'formato'		=> '7b',
						'width'			=> '100px',
						'queries'		=> '1'
				),				
				'id_usuario'	=>array(
						'campo'			=> 'id_usuario',
						'label'			=> 'Usuarios',
						'width'			=> '120px',
						'listable'		=> '1',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,nombre;apellidos|usuarios',
						'derecha'		=> '1',
						'tip_foreig'	=> '0',
						'tags'			=> '1',
						'queries'		=> '1',
						'noedit'		=> '1',
						'inherited'		=> '1',
						'disabled'		=> '0',
						'dlquery'		=> '0'
				),

				'cumplido'		=>array(
						'campo'			=> 'cumplido',
						'label'			=> 'Cumplido',
						'radio'			=> '1',
						'tipo'			=> 'com',
						'opciones'		=>array(
								'1'			=> 'si',
								'0'			=> 'no'
						),
						'default'		=> '0',
						'style'			=> 'width:150px;',
						'width'			=> '70px'
				),
				'foto_descripcion'=>array(
						'campo'			=> 'foto_descripcion',
						'label'			=> 'Archivo',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '207px'
				),
				'fichero'		=>array(
						'campo'			=> 'fichero',
						'label'			=> '',
						'tipo'			=> 'sto',
						'width'			=> '300px',
						'style'			=> 'width:200px;',
						'listable'		=> '1',
						'validacion'	=> '0',
						'prefijo'		=> 'age',
						'carpeta'		=> 'age_fil',
						'name'			=> 'nombre',
						'enlace'		=> 'down'
				),

				'user'			=>array(
						'campo'			=> 'user',
						'tipo'			=> 'user',
						'queries'		=> '1'
				),
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1'
				)
		),
		'edicion_rapida'	=> '1',
		'calificacion'	=> '0',
		'edicion_completa'=> '1',
		'disabled'		=> '0',
		'user'			=> '1',
		'order_by'		=> 'alerta_fecha asc',
		'stat'			=> '0',
		'exportar_excel'	=> '1'
);
/******************************************************************************************************************************************************/

$objeto_tabla['TODOS_CONTACTOS']=array(
		'grupo'			=> 'atenciones',
		'titulo'		=> 'Contacto',
		'nombre_singular'=> 'contacto',
		'nombre_plural'	=> 'contactos',
		'tabla'			=> 'todos_contactos',
		'archivo'		=> 'todos_contactos',
		'prefijo'		=> 'clie',
		'eliminar'		=> '0',
		'editar'		=> '1',
		'crear'			=> '1',
		'crear_label'	=> '100px',
		'crear_txt'		=> '400px',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '1',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Contactos',
		'me'			=> 'TODOS_CONTACTOS',
		'orden'			=> '1',
		'onload_script'	=> '
		',
		'postscript'	=> '
			/*
			$linea=fila("id_jefe,id","usuarios","where id_sesion=".LL["user"],1);

			update(array("id_jefe"=>$linea["id_jefe"],"id_usuario"=>$linea["id"]),TT,"where id=II",1);
			*/
		',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'tipo_cliente'	=>array(
						'campo'			=> 'tipo_cliente',
						'label'			=> 'Tipo de Contacto',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'validacion'	=> '1',
						'opciones'		=>array(
								'1'			=> 'Proveedor',
								'2'			=> 'Cliente',
								'3'			=> 'Colaborador'
						),
						'derecha'		=> '1',
						'width'			=> '60px',
						'queries'		=> '1'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'inlist'		=> 'nombre;apellidos',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '140px',
						'style'			=> 'width:110px;',
						'derecha'		=> '1',
						'like'			=> '0',
						'tags'			=> '1',
						'queries'		=> '1',
						'dlquery'		=> '1',
						'concat'		=> 'apellidos'
				),
				'apellidos'		=>array(
						'campo'			=> 'apellidos',
						'label'			=> 'Apellidos',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '140px',
						'style'			=> 'width:110px;',
						'derecha'		=> '2',
						'like'			=> '0',
						'tags'			=> '1',
						'dlquery'		=> '0',
						'queries'		=> '0'
				),
				'tipo_documento'	=>array(
						'campo'			=> 'tipo_documento',
						'label'			=> 'Tipo de Doc',
						'tipo'			=> 'com',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'DNI',
								'2'			=> 'Carnet de Extranjeria'
						),
						'default'		=> '1',
						'style'			=> 'width:45px;',
						'derecha'		=> '2',
						'width'			=> '70px'
				),
				'dni'			=>array(
						'campo'			=> 'dni',
						'label'			=> '# de doc',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '130px',
						'style'			=> 'width:60px;',
						'derecha'		=> '2',
						'default'		=> '',
						'like'			=> '1',
						'unique'		=> '0',
						'size'			=> '11',
						'onchange'		=> 'if(this.value.length<8){alert("minimo 8 caracteres");}'
				),
				'departamento'	=>array(
						'campo'			=> 'departamento',
						'label'			=> 'Departamento',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_departamentos',
						'load'			=> 'provincia||id,nombre|geo_provincias|where id_departamento=',
						'style'			=> 'width:150px;',
						'derecha'		=> '1'
				),
				'provincia'		=>array(
						'campo'			=> 'provincia',
						'label'			=> 'Provincia',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_provincias',
						'load'			=> 'distrito||id,nombre|geo_distritos|where id_provincia=',
						'style'			=> 'width:150px;',
						'derecha'		=> '2'
				),
				'distrito'		=>array(
						'campo'			=> 'distrito',
						'label'			=> 'Distrito',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_distritos',
						'style'			=> 'width:150px;',
						'derecha'		=> '2'
				),
				'direccion'		=>array(
						'campo'			=> 'direccion',
						'label'			=> 'Dirección',
						'tipo'			=> 'txt',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '150px',
						'style'			=> 'width:600px;height:40px;',
						'derecha'		=> '1'
				),
				'email'			=>array(
						'campo'			=> 'email',
						'label'			=> 'Email',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '150px',
						'style'			=> 'width:150px;',
						'derecha'		=> '1',
						'default'		=> '',
						'like'			=> '1',
						'unique'		=> '0'
				),
				'telefono'		=>array(
						'campo'			=> 'telefono',
						'label'			=> 'Tel Fijo',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '1'
				),
				'celular_claro'	=>array(
						'campo'			=> 'celular_claro',
						'label'			=> 'Celular',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'celular_movistar'=>array(
						'campo'			=> 'celular_movistar',
						'label'			=> 'Movistar',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'nextel'		=>array(
						'campo'			=> 'nextel',
						'label'			=> 'Entel',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'empresa'		=>array(
						'campo'			=> 'empresa',
						'legend'		=> 'Empresa',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '200px',
						'style'			=> 'width:160px;',
						'derecha'		=> '1',
						'constante'		=> '0',
						'like'			=> '1'
				),
				'empresa_razon'	=>array(
						'campo'			=> 'empresa_razon',
						'label'			=> 'Razón Social',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '200px',
						'style'			=> 'width:160px;',
						'derecha'		=> '2',
						'constante'		=> '0',
						'like'			=> '1'
				),
				'empresa_ruc'	=>array(
						'campo'			=> 'empresa_ruc',
						'label'			=> 'Ruc',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '200px',
						'style'			=> 'width:80px;',
						'derecha'		=> '2',
						'constante'		=> '0',
						'like'			=> '1'
				),
				'empresa_direccion'=>array(
						'campo'			=> 'empresa_direccion',
						'label'			=> 'Dirección',
						'tipo'			=> 'txt',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '150px',
						'style'			=> 'width:600px;height:40px;',
						'derecha'		=> '1'
				),
				'info'			=>array(
						'campo'			=> 'info',
						'tipo'			=> 'txt',
						'style'			=> 'display:none;'
				),
				'user'			=>array(
						'campo'			=> 'user',
						'tipo'			=> 'user',
						'width'			=> ''
				),
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1'
				),
				'id_usuario'	=>array(
						'campo'			=> 'id_usuario',
						'label'			=> 'Asesor',
						'width'			=> '120px',
						'listable'		=> '1',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,nombre;apellidos|usuarios',
						'derecha'		=> '1',
						'tip_foreig'	=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'noedit'		=> '1',
						'default'		=> '[id_usuario]'
				)
		),
		'edicion_rapida'	=> '1',
		'edicion_completa'=> '1',
		'exportar_excel'	=> '0',
		'importar_csv'	=> '0',
		'user'			=> '1'
);
/******************************************************************************************************************************************************/

$objeto_tabla['CONTACTO']=array(
		'titulo'		=> 'Mensajes de Contacto',
		'nombre_singular'=> 'mensaje',
		'nombre_plural'	=> 'mensajes',
		'tabla'			=> 'contacto',
		'archivo'		=> 'contacto',
		'prefijo'		=> 'con',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'crear'			=> '1',
		'crear_label'	=> '100px',
		'crear_txt'		=> '400px',
		'menu'			=> '1',
		'menu_label'	=> 'Mensajes de Contacto',
		'me'			=> 'CONTACTO',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'fecha'			=>array(
						'campo'			=> 'fecha',
						'label'			=> 'Fecha',
						'tipo'			=> 'fch',
						'width'			=> '80px',
						'listable'		=> '1',
						'validacion'	=> '1',
						'constante'		=> '1',
						'formato'		=> '7'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '150px'
				),
				'empresa'		=>array(
						'campo'			=> 'empresa',
						'label'			=> 'Empresa',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '150px',
						'disabled'		=> '1'
				),
				'ciudad'		=>array(
						'campo'			=> 'ciudad',
						'label'			=> 'Ciudad',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '150px'
				),
				'pais'			=>array(
						'campo'			=> 'pais',
						'label'			=> 'País',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '150px',
						'disabled'		=> '1'
				),
				'telefono'		=>array(
						'campo'			=> 'telefono',
						'label'			=> 'Teléf/Celular',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '150px'
				),
				'email'			=>array(
						'campo'			=> 'email',
						'label'			=> 'Email',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '150px'
				),
				'comentario'	=>array(
						'campo'			=> 'comentario',
						'label'			=> 'Comentario',
						'tipo'			=> 'txt',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '350px'
				)
		),
		'grupo'			=> 'ventas',
		'disabled'		=> '1'
);
/******************************************************************************************************************************************************/

$objeto_tabla['PRODUCTOS_VENTAS']=array(
		'grupo'			=> 'ventas',
		'titulo'		=> 'Ventas',
		'nombre_singular'=> 'venta',
		'nombre_plural'	=> 'ventas',
		'tabla'			=> 'productos_ventas',
		'archivo'		=> 'productos_ventas',
		'prefijo'		=> 'proven',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '0',
		'duplicar'		=> '0',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Ventas',
		'por_pagina'	=> '20',
		'me'			=> 'PRODUCTOS_VENTAS',
		'orden'			=> '1',
		'crear_label'	=> '80px',
		'crear_txt'		=> '660px',
		'filtros_extra'	=> '',
		'oncreate'		=> 'base2/create_productos_ventas.php',
		'repos'			=> 'ratios=Ratios Ventas&ratios_atenciones=Ratios Atenciones&ratios_publicidad=Ratios Publicidad&ventas=Resúmen de ventas y por vender&evolucion=Evolución del precio promedio&cierre=Informe de cierre de publicidad',
		'script'		=> '

			update(
				["estado"=>"CASE"],
				"productos_ventas_documentos","
			    WHEN DATE(fecha_vencimiento) > DATE(NOW()) AND (cumplido=0 or cumplido is null) THEN 1
			    WHEN DATE(fecha_vencimiento) = DATE(NOW()) AND (cumplido=0 or cumplido is null) THEN 2
			    WHEN DATE(fecha_vencimiento) < DATE(NOW()) AND (cumplido=0 or cumplido is null) THEN 3	
			    WHEN cumplido=1 THEN 4	
			    END
				where fecha_vencimiento!=\"0000-00-00 00:00:00\" ",
				0);

		',
		'postscript'	=> '

				if(LL["fecha_creacion2"]!="0000-00-00 00:00:00"){

					update(array("fecha_creacion"=>LL["fecha_creacion2"]),TT,"where id=II",0);

				}

				$pedidos=dato("pedido","ventas_items","where id=".LL["id_ventas_item"],0);

				if(SS=="insert"){
									
					//vendido
					if(LL["forma_pago"]=="1"){
						
						//set items status						
						$id_status=3;
						$venta_fecha=LL["fecha_creacion"];
													
						//set ventas_items a is_status = vendido
						$atencion_id_status=6;

					} else {

						//set items status
						$id_status=2;						
						$venta_fecha="NULL";

						//set ventas_items a is_status = separado
						$atencion_id_status=7;

					} 

					update([
						"id_status"=>$atencion_id_status
						],
						"ventas_items",
						"where id=".LL["id_ventas_item"],
						0
						);							

					insert([
							"fecha_creacion"=> "now()",
							"id_grupo"		=> LL["id_ventas_item"],
							"texto"			=> "vendido",
							"id_usuario"	=> LL["id_usuario"],
							"id_status"		=> $atencion_id_status
							],
							"ventas_mensajes",
							0
							);	

					// update(["venta_id_vendedor"=>LL["id_usuario"]],"productos_items_items","where id=".LL["id_item_item"]);

					//set todos los departamentos, estacionamiento y depositos id_status = separado o vendido
					foreach(json_decode($pedidos) as $pedido){
						if($pedido->type=="departamento")
							update(array("id_status"=>$id_status,"venta_fecha"=>$venta_fecha,"venta_precio"=>$pedido->price,"venta_id_vendedor"=>LL["id_usuario"]),"productos_items_items","where id=".$pedido->id,0);
						elseif($pedido->type=="estacionamiento")
							update(array("id_status"=>$id_status,"venta_fecha"=>$venta_fecha,"venta_precio"=>$pedido->price,"venta_id_vendedor"=>LL["id_usuario"]),"productos_estacionamientos_items_items","where id=".$pedido->id,0);
						elseif($pedido->type=="deposito")
							update(array("id_status"=>$id_status,"venta_fecha"=>$venta_fecha,"venta_precio"=>$pedido->price,"venta_id_vendedor"=>LL["id_usuario"]),"productos_depositos_items_items","where id=".$pedido->id,0);													
					}

				}
				if(SS=="delete"){

					// update(
					// 	[
					// 	"venta_id_vendedor"=>"",
					// 	"id_status"=>2
					// 	],
					// 	"productos_items_items",
					// 	"where id=".LL["id_item_item"]
					// 	);

					//set ventas_items a is_status = en seguimiento
					update(array("id_status"=>"3"),"ventas_items","where id=".LL["id_ventas_item"],0);					

					//set todos los departamentos, estacionamiento y depositos id_status = disponible
					foreach(json_decode($pedidos) as $pedido){
						if($pedido->type=="departamento")
							update(array("id_status"=>"1","venta_fecha"=>"NULL","venta_precio"=>"0","venta_id_vendedor"=>""),"productos_items_items","where id=".$pedido->id,0);
						elseif($pedido->type=="estacionamiento")
							update(array("id_status"=>"1","venta_fecha"=>"NULL","venta_precio"=>"0","venta_id_vendedor"=>""),"productos_estacionamientos_items_items","where id=".$pedido->id,0);
						elseif($pedido->type=="deposito")
							update(array("id_status"=>"1","venta_fecha"=>"NULL","venta_precio"=>"0","venta_id_vendedor"=>""),"productos_depositos_items_items","where id=".$pedido->id,0);
					}

					insert([
							"fecha_creacion"=> "now()",
							"id_grupo"		=> LL["id_ventas_item"],
							"texto"			=> "venta eliminada",
							"id_usuario"	=> LL["id_usuario"],
							"id_status"		=> 3
							],
							"ventas_mensajes",
							0
							);	

					delete("productos_ventas_documentos","where id_grupo=".II);

					delete("productos_ventas_docs","where id_grupo=".II);

					delete("notificaciones","where modulo=\"abonos\" and item=".II);

				}

				include("base2/apps/update_bonos.php");				

		',
		'joins'			=>array(
				'ventas_items'	=> 'productos_ventas.id_ventas_item=ventas_items.id',
				'usuarios'		=> 'productos_ventas.id_usuario=usuarios.id'
		),
		'more'			=>array(
				'ventas_items'	=> '
				id_cliente?listable=1&after=fecha_creacion&controles=,
				pedido?listable=1&after=fecha_creacion,
				id_item?listable=1&queries=1&after=fecha_creacion,
				id_canal?listable=1&after=id_item_item,
				id_sectorista?listable=1&after=id_item_item,
				id_banco?listable=1&after=id_item_item,
				',
				'usuarios'		=> 'id_jefe?listable=1&queries=0&after=id_usuario'
		),
		'procesos'		=>array(
				array(
						'label'			=> 'Contrato Venta',
						'accion'		=> 'custom_load',
						'file'			=> 'base2/apps/download_word_doc.php',
						'rel'			=> 'width:250,height:80',
						'extra'			=> 'nombre=contrato_venta&id=[id]',
						'class'			=> ''
				)
		),
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id',
						'listable'		=> '0',
						'width'			=> '50px',
						'label'			=> 'Correl'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr',
						'listable'		=> '1',
						'formato'		=> '7b',
						'queries'		=> '1',
						'edit'			=> '1',
						'controles'		=> '
						<a href="custom/productos_ventas_documentos.php?id=[id]" rel="subs popup">{select count(*) from productos_ventas_documentos where id_grupo=[id]} mensajes</a>
						<a href="custom/productos_ventas_docs.php?id=[id]" rel="subs popup">{select count(*) from productos_ventas_docs where id_grupo=[id]} mensajes</a>
							'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_ventas_item'	=>array(
						'campo'			=> 'id_ventas_item',
						'tipo'			=> 'hid',
				),			
				'id_item_item'	=>array(
						'listable'		=> '1',					
						'label'			=> 'Dpto',
						'campo'			=> 'id_item_item',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,numero|productos_items_items',	
						'tip_foreig'	=> '1',											
				),	
				'id_item_estacionamiento'	=>array(
						'listable'		=> '1',					
						'label'			=> 'Estac.',
						'campo'			=> 'id_item_estacionamiento',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,numero|productos_estacionamientos_items_items',	
						'tip_foreig'	=> '1',											
				),	
				'id_item_deposito'	=>array(
						'listable'		=> '1',					
						'label'			=> 'Depos.',
						'campo'			=> 'id_item_deposito',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,numero|productos_depositos_items_items',	
						'tip_foreig'	=> '1',											
				),												
				'fecha_creacion2'=>array(
						'campo'			=> 'fecha_creacion2',
						'label'			=> 'Fecha Creacion',
						'tipo'			=> 'fch',
						'width'			=> '80px',
						'listable'		=> '0',
						'validacion'	=> '0',
						'formato'		=> '7b',
						'derecha'		=> '1',
						'rango'			=> '-1 years,now',
						'time'			=> '0',
						'default'		=> 'now()'
				),
				'forma_pago'	=>array(
						'campo'			=> 'forma_pago',
						'label'			=> 'Forma de Pago',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'Contado',
								'2'			=> 'Crédito Directo',
								'3'			=> 'Crédito Hipotecario Tradicional',
								'4'			=> 'Plan Ahorro'
						),
						'eventos'		=>array(
								'1'			=> '$0("id_in_porcentaje_cuota_inicial");$0("id_in_cuota_inicial");$0("id_in_saldo_financiar");$0("id_in_saldo_inmobiliaria");$0("id_in_saldo_inmobiliaria_cuotas");$0("id_in_saldo_ahorro");$0("id_in_saldo_ahorro_cuotas");',
								'2'			=> '$0("id_in_porcentaje_cuota_inicial");$0("id_in_cuota_inicial");$0("id_in_saldo_financiar");$0("id_in_saldo_inmobiliaria");$0("id_in_saldo_inmobiliaria_cuotas");$0("id_in_saldo_ahorro");$0("id_in_saldo_ahorro_cuotas");',
								'3'			=> '$1("id_in_porcentaje_cuota_inicial");$1("id_in_cuota_inicial");$1("id_in_saldo_financiar");$0("id_in_saldo_inmobiliaria");$0("id_in_saldo_inmobiliaria_cuotas");$0("id_in_saldo_ahorro");$0("id_in_saldo_ahorro_cuotas");',
								'4'			=> '$1("id_in_porcentaje_cuota_inicial");$1("id_in_cuota_inicial");$1("id_in_saldo_financiar");$1("id_in_saldo_inmobiliaria");$1("id_in_saldo_inmobiliaria_cuotas");$1("id_in_saldo_ahorro");$1("id_in_saldo_ahorro_cuotas");'
						),
						'derecha'		=> '1',
						'legend'		=> 'Pago'
				),
				'pvlista'		=>array(
						'campo'			=> 'pvlista',
						'label'			=> 'Precio',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency'
				),
				'pvpromocion'	=>array(
						'campo'			=> 'pvpromocion',
						'label'			=> 'Precio Final',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'onchange'		=> '$("in_saldo_financiar").value=$("in_pvpromocion").value-$("in_cuota_inicial").value;',
						'format'		=> 'currency'
				),
				'porcentaje_cuota_inicial'=>array(
						'campo'			=> 'porcentaje_cuota_inicial',
						'label'			=> 'Cuota Inicial %',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:30px;',
						'onchange'		=> '$("in_cuota_inicial").value=0.01*$("in_pvpromocion").value*$("in_porcentaje_cuota_inicial").value;$("in_saldo_financiar").value=$("in_pvpromocion").value-$("in_cuota_inicial").value;'
				),
				'cuota_inicial'	=>array(
						'campo'			=> 'cuota_inicial',
						'label'			=> '',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'onchange'		=> '$("in_saldo_financiar").value=$("in_pvpromocion").value-$("in_cuota_inicial").value;'
				),
				'saldo_inmobiliaria'=>array(
						'campo'			=> 'saldo_inmobiliaria',
						'label'			=> 'Pagar a inmobiliaria',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'listyle'		=> 'margin-left:49.7%;clear:left;display:none;',
						'onchange'		=> '$("in_saldo_ahorro").value=$("in_cuota_inicial").value-$("in_saldo_inmobiliaria").value;',
						'format'		=> 'currency'
				),
				'saldo_inmobiliaria_cuotas'=>array(
						'campo'			=> 'saldo_inmobiliaria_cuotas',
						'label'			=> 'Nro Cuotas Inmobiliaria',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:40px;',
						'listyle'		=> 'display:none;',
						'default'		=> '2'
				),
				'saldo_ahorro'	=>array(
						'campo'			=> 'saldo_ahorro',
						'label'			=> 'Pagar Plan Ahorro',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'listyle'		=> 'margin-left:50.7%;clear:left;display:none;',
						'onchange'		=> '$("in_saldo_inmobiliaria").value=$("in_cuota_inicial").value-$("in_saldo_ahorro").value;',
						'format'		=> 'currency'
				),
				'saldo_ahorro_cuotas'=>array(
						'campo'			=> 'saldo_ahorro_cuotas',
						'label'			=> 'Nro Cuotas Plan Ahorro',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:40px;',
						'listyle'		=> 'display:none;',
						'default'		=> '6'
				),
				'saldo_financiar'=>array(
						'campo'			=> 'saldo_financiar',
						'label'			=> 'Saldo a Financiar',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency'
				),
				'separacion'	=>array(
						'campo'			=> 'separacion',
						'label'			=> 'Separación',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency'
				),
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1',
						'listable'		=> '0'
				),
				'id_usuario'	=>array(
						'campo'			=> 'id_usuario',
						'label'			=> 'Asesor',
						'width'			=> '120px',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'opciones'		=> 'id,nombre;apellidos|usuarios',
						'derecha'		=> '1',
						'tip_foreig'	=> '1',
						'tags'			=> '1',
						'queries'		=> '0',
						'noedit'		=> '1',
						'crearforeig'	=> '0',
						'validacion'	=> '0',
						'legend'		=> 'Asesor'
				),
				'method'		=>array(
						'campo'			=> 'method',
						'tipo'			=> 'inp',
						'indicador'		=> '1'
				),
				'user'			=>array(
						'campo'			=> 'user',
						'tipo'			=> 'user'
				)
		),
		'edicion_completa'=> '1',
		'calificacion'	=> '0',
		'importar_csv'	=> '0',
		'width_listado'	=> '',
		'edicion_rapida'	=> '0',
		'crear_pruebas'	=> '0',
		'exportar_excel'	=> '1',
		'disabled'		=> '0',
		'seccion'		=> 'ventas',
		'user'			=> '1'
);
/******************************************************************************************************************************************************/

$objeto_tabla['PRODUCTOS_VENTAS_DOCUMENTOS']=array(
		'grupo'			=> 'ventas',
		'titulo'		=> 'Abonos',
		'nombre_singular'=> 'abono',
		'nombre_plural'	=> 'abonos',
		'tabla'			=> 'productos_ventas_documentos',
		'archivo'		=> 'productos_ventas_documentos',
		'prefijo'		=> 'provendoc',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'duplicar'		=> '0',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'menu'			=> '0',
		'menu_label'	=> 'Abonos',
		'por_pagina'	=> '20',
		'me'			=> 'PRODUCTOS_VENTAS_DOCUMENTOS',
		'orden'			=> '1',
		'crear_label'	=> '80px',
		'crear_txt'		=> '660px',
		'filtros_extra'	=> '',
		'subbottom'		=> 'factnum=TOTAL&monto=SUM&recibido=SUM',
		'script'		=> '

			update(
				["estado"=>"CASE"],
				"productos_ventas_documentos","
			    WHEN DATE(fecha_vencimiento) > DATE(NOW()) AND (cumplido=0 or cumplido is null) THEN 1
			    WHEN DATE(fecha_vencimiento) = DATE(NOW()) AND (cumplido=0 or cumplido is null) THEN 2
			    WHEN DATE(fecha_vencimiento) < DATE(NOW()) AND (cumplido=0 or cumplido is null) THEN 3	
			    WHEN cumplido=1 THEN 4	
			    END
				where fecha_vencimiento!=\"0000-00-00 00:00:00\" ",
				0);

		',
		'postscript'	=> '
				if(LL["moneda"]=="soles")
				{
					$ttcc=LL["tc"];
					$solr=LL["recibido"]/$ttcc;
					$solm=LL["monto"]/$ttcc;
					LL["recibido"]=$solr;
					LL["monto"]=$solm;
					$solr=D3($solr);
					$solm=D3($solm);
					update(array("recibido"=>$solr),TT,"where id=II",0);
					update(array("monto"=>$solm),TT,"where id=II",0);
				}
				if(SS=="insert" or SS=="update")
				{

					$avgcumplidos=fila("avg(cumplido)","productos_ventas_documentos","where id_grupo=".LL["id_grupo"],0);

					$id_status=($avgcumplidos["avg(cumplido)"]==1)?4:3;

					$id_ventas_item=dato("id_ventas_item","productos_ventas","where id=".LL["id_grupo"],0);

					$pedidos=dato("pedido","ventas_items","where id=".$id_ventas_item,0);

					$id_item_item=dato("id_item_item","ventas_items","where id=".$id_ventas_item,0);
	
					foreach(json_decode($pedidos) as $pedido){
						if($pedido->type=="departamento")
							$tt="productos_items_items";
						elseif($pedido->type=="estacionamiento")
							$tt="productos_estacionamientos_items_items";
						elseif($pedido->type=="deposito")
							$tt="productos_depositos_items_items";
						update(["id_status"=>$id_status],$tt,"where id=".$pedido->id,0);						
					}


					$pvfinal=dato("pvpromocion","productos_ventas","where id=".LL["id_grupo"],0);
					$fecha0=dato("fecha_creacion","productos_ventas","where id=".LL["id_grupo"],0);

					$item_item=fila("id_ventas_item","productos_ventas","where id=".LL["id_grupo"],0);

					$item_item3=fila("id_usuario,id_cliente","ventas_items","where id=".$item_item["id_ventas_item"],0);

					$saldo=$pvfinal;
					$montoT=0;
					$recibidoT=0;
					$docs=select("id,operacion,monto,fecha_creacion",TT,"where cumplido=1 and id_grupo=".LL["id_grupo"],0);
					foreach($docs as $doc)
					{
						$saldo=$saldo-$doc["recibido"];
						$recibidoT	=$recibidoT+$doc["monto"];
						$montoT		=$montoT+$doc["monto"];
						if($doc["operacion"]=="2")
						{
							$mon_factura=$doc["monto"];
							$fecha	=$doc["fecha_creacion"];
						}
						$saldo=D3($saldo);
						update(array("saldo"=>$saldo),TT,"where id=".$doc["id"],0);
					}
					update(array("saldo"=>$saldo),"productos_ventas","where id=".LL["id_grupo"],0);

					// echo "( $recibidoT==$pvfinal or $montoT==$pvfinal )";
					if($recibidoT==$pvfinal or $montoT==$pvfinal)
					{
						update(array("venta_fecha"=>$fecha0,"venta_precio"=>$pvfinal,"venta_factura"=>$factura),"productos_items_items","where id=".$id_item_item,0);

						update(array("mon_factura"=>$mon_factura,"num_factura"=>$factura),TT,"where id=II",0);//TEMPORAL

						if($recibidoT==$pvfinal) //cancelado
						{
							update(array("id_status"=>"4"),"productos_items_items","where id=".$id_item_item,0);
					
							update(array("id_status"=>"6"),"ventas_items","where id=".$item_item["id_ventas_item"],0);		

						}
						elseif($montoT==$pvfinal) //facturado
						{
							update(array("id_status"=>"3"),"productos_items_items","where id=".$id_item_item,0);
						}
					}
					$recibidoT=D3($recibidoT);
					$montoT=D3($montoT);
					update(array("venta_abono"=>$recibidoT,"venta_total_facturas"=>$montoT,"venta_id_cliente"=>$item_item3["id_cliente"],"venta_id_vendedor"=>$item_item3["id_usuario"]),"productos_items_items","where id=".$id_item_item,0);

				}
				if(SS=="delete")
				{
					$pvfinal=dato("pvpromocion","productos_ventas","where id=".LL["id_grupo"],0);
					$saldo=dato("pvpromocion","productos_ventas","where id=".LL["id_grupo"],0);
					//$saldo=$saldo*1;
					$docs=select("recibido,id",TT,"where id_grupo=".LL["id_grupo"],0);
					foreach($docs as $doc)
					{
						$saldo=$saldo-$doc["recibido"];
						$saldo=D3($saldo);
						update(array("saldo"=>$saldo),TT,"where id=".$doc["id"],0);
					}
					update(array("saldo"=>$saldo),"productos_ventas","where id=".LL["id_grupo"],0);
					$item_item1=fila("id_item_item","productos_ventas","where id=".LL["id_grupo"],0);
					update(array("id_item_item"=>$item_item1["id_item_item"]),TT,"where id=".II);
				}

				include("base2/apps/crear_notificaciones.php");

				include("base2/apps/update_bonos.php");				


		',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id',
						'listable'		=> '0',
						'width'			=> '50px',
						'label'			=> 'Correl'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr',
						'listable'		=> '0',
						'formato'		=> '7b',
						'width'			=> '85px'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_grupo'		=>array(
						'campo'			=> 'id_grupo',
						'tipo'			=> 'hid',
						'listable'		=> '0',
						'validacion'	=> '0',
						'default'		=> '[id]',
						'foreig'		=> '1'
				),
				'operacion'		=>array(
						'campo'			=> 'operacion',
						'label'			=> 'Operación',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'Separación',
								'2'			=> 'Inicial',
								'3'			=> 'Abono',
								'4'			=> 'Desembolso Bancario',
								'5'			=> 'Plan Ahorro'
						),
						'default'		=> '1',
						'style'			=> 'width:150px;',
						'derecha'		=> '1',
						'width'			=> '120px'
				),
				'ctabanco'		=>array(
						'campo'			=> 'ctabanco',
						'label'			=> 'Cuenta de Banco',
						'width'			=> '130px',
						'tipo'			=> 'hid',
						'style'			=> 'width:170px;',
						'opciones'		=> 'id,nombre|bancos_cuentas',
						'load'			=> '|||moneda as moneda|bancos_cuentas|where id=[ctabanco]',
						'afterload'		=> 'update_ini_moneda',
						'derecha'		=> '1',
						'listable'		=> '0'
				),
				'moneda'		=>array(
						'campo'			=> 'moneda',
						'label'			=> 'Moneda del Abono',
						'width'			=> '130px',
						'tipo'			=> 'inp',
						'style'			=> 'width:50px;',
						'derecha'		=> '2',
						'listable'		=> '0',
						'frozen'		=> '1'
				),
				'importe'		=>array(
						'campo'			=> 'importe',
						'label'			=> 'Importe en Moneda del Abono',
						'width'			=> '130px',
						'tipo'			=> 'inp',
						'style'			=> 'width:60px;',
						'derecha'		=> '2',
						'frozen'		=> '1',
						'listable'		=> '0'
				),
				'opeban'		=>array(
						'campo'			=> 'opeban',
						'label'			=> 'Ope Banc',
						'width'			=> '70px',
						'tipo'			=> 'inp',
						'style'			=> 'width:60px;',
						'derecha'		=> '2',
						'listable'		=> '1',
						'unique'		=> '1',
						'validacion'	=> '1'
				),
				'tc'			=>array(
						'campo'			=> 'tc',
						'label'			=> 'Tipo de Cambio',
						'width'			=> '130px',
						'tipo'			=> 'inp',
						'style'			=> 'width:40px;',
						'derecha'		=> '1',
						'listable'		=> '0',
						'default'		=> '2.64'
				),
				'monto'			=>array(
						'campo'			=> 'monto',
						'label'			=> 'Mont Doc',
						'width'			=> '100px',
						'tipo'			=> 'inp',
						'style'			=> 'width:60px;',
						'derecha'		=> '1',
						'listable'		=> '1',
						'format'		=> 'currency'
				),
				'saldo'			=>array(
						'campo'			=> 'saldo',
						'label'			=> 'Saldo',
						'width'			=> '100px',
						'tipo'			=> 'inp',
						'style'			=> 'width:60px;',
						'derecha'		=> '2',
						'listable'		=> '1',
						'frozen'		=> '1',
						'format'		=> 'currency'
				),
				'fecha_vencimiento'=>array(
						'campo'			=> 'fecha_vencimiento',
						'label'			=> 'Vencimiento',
						'tipo'			=> 'fch',
						'width'			=> '110px',
						'listable'		=> '1',
						'validacion'	=> '0',
						'formato'		=> '5b',
						'derecha'		=> '1',
						'rango'			=> '-5 years,+5 years'
				),
				'fecha_abono'	=>array(
						'campo'			=> 'fecha_abono',
						'label'			=> 'Abono',
						'tipo'			=> 'fch',
						'width'			=> '110px',
						'listable'		=> '1',
						'validacion'	=> '0',
						'formato'		=> '5b',
						'derecha'		=> '1',
						'rango'			=> '-5 years,+5years'
				),
				'estado'		=>array(
						'campo'			=> 'estado',
						'label'			=> 'Estado',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'indicador'		=> '1',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'pendiente|navy',
								'2'			=> 'para hoy|orange',
								'3'			=> 'atrazado|red',
								'4'			=> 'cumplido|green'
						),
						'default'		=> '1',
						'style'			=> 'width:150px;',
						'width'			=> '100px'
				),
				'cumplido'		=>array(
						'campo'			=> 'cumplido',
						'label'			=> 'Cumplido',
						'radio'			=> '1',
						'tipo'			=> 'com',
						'opciones'		=>array(
								'1'			=> 'si',
								'0'			=> 'no'
						),
						'listable'		=> '1',
						'default'		=> '0',
						'style'			=> 'width:150px;',
						'width'			=> '70px'
				),
				'fichero'		=>array(
						'campo'			=> 'fichero',
						'label'			=> 'Archivo',
						'tipo'			=> 'sto',
						'width'			=> '300px',
						'style'			=> 'width:200px;',
						'listable'		=> '1',
						'validacion'	=> '0',
						'prefijo'		=> 'doc',
						'carpeta'		=> 'age_fil',
						'name'			=> 'nombre',
						'enlace'		=> 'down'
				),
				'foto_descripcion'=>array(
						'campo'			=> 'foto_descripcion',
						'label'			=> 'texto',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '207px'
				),
				'id_usuario'	=>array(
						'campo'			=> 'id_usuario',
						'label'			=> 'Vendedor',
						'width'			=> '120px',
						'tipo'			=> 'hid',
						'listable'		=> '0',
						'opciones'		=> 'id,nombre;apellidos|usuarios',
						'derecha'		=> '1',
						'tip_foreig'	=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'noedit'		=> '1',
						'crearforeig'	=> '0',
						'validacion'	=> '0',
						'indicador'		=> '0'
				),
				'id_jefe'		=>array(
						'campo'			=> 'id_jefe',
						'label'			=> 'Jefe',
						'tipo'			=> 'hid',
						'listable'		=> '0',
						'default'		=> '[id_jefe]',
						'foreig'		=> '1',
						'style'			=> 'width:160px,',
						'opciones'		=> 'id,nombre;apellidos|usuarios2',
						'width'			=> '120px',
						'derecha'		=> '2',
						'tip_foreig'	=> '1',
						'queries'		=> '1'
				),
				'method'		=>array(
						'campo'			=> 'method',
						'tipo'			=> 'inp',
						'indicador'		=> '1'
				),
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1',
						'listable'		=> '0'
				),
				'user'			=>array(
						'campo'			=> 'user',
						'tipo'			=> 'user'
				)
		),
		'edicion_completa'=> '0',
		'calificacion'	=> '0',
		'importar_csv'	=> '0',
		'width_listado'	=> '',
		'edicion_rapida'	=> '1',
		'crear_pruebas'	=> '0',
		'order_by'		=> 'id asc',
		'user'			=> '1',
		'disabled'		=> '0',
		'seccion'		=> ''
);
/******************************************************************************************************************************************************/

$objeto_tabla['PRODUCTOS_VENTAS_DOCS']=array(
		'grupo'			=> 'ventas',
		'titulo'		=> 'Documentos',
		'nombre_singular'=> 'documento',
		'nombre_plural'	=> 'documentos',
		'tabla'			=> 'productos_ventas_docs',
		'archivo'		=> 'productos_ventas_docs',
		'prefijo'		=> 'provendoc',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'duplicar'		=> '0',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'menu'			=> '0',
		'menu_label'	=> 'Documentos',
		'por_pagina'	=> '20',
		'me'			=> 'PRODUCTOS_VENTAS_DOCS',
		'orden'			=> '1',
		'crear_label'	=> '80px',
		'crear_txt'		=> '660px',
		'filtros_extra'	=> '',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id',
						'listable'		=> '0',
						'width'			=> '50px',
						'label'			=> 'Correl'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr',
						'listable'		=> '0',
						'formato'		=> '7b',
						'width'			=> '85px'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_grupo'		=>array(
						'campo'			=> 'id_grupo',
						'tipo'			=> 'hid',
						'listable'		=> '0',
						'validacion'	=> '0',
						'default'		=> '[id]',
						'foreig'		=> '1'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '130px',
						'tipo'			=> 'inp',
						'style'			=> 'width:240px;',
						'derecha'		=> '1',
						'listable'		=> '1'
				),
				'fichero'		=>array(
						'campo'			=> 'fichero',
						'label'			=> 'Archivo',
						'tipo'			=> 'sto',
						'width'			=> '300px',
						'style'			=> 'width:200px;',
						'listable'		=> '1',
						'validacion'	=> '0',
						'prefijo'		=> 'doc',
						'carpeta'		=> 'doc_fil',
						'name'			=> 'nombre',
						'enlace'		=> 'down'
				),
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1',
						'listable'		=> '0'
				),
				'user'			=>array(
						'campo'			=> 'user',
						'tipo'			=> 'user'
				)
		),
		'edicion_completa'=> '0',
		'calificacion'	=> '0',
		'importar_csv'	=> '0',
		'width_listado'	=> '',
		'edicion_rapida'	=> '1',
		'crear_pruebas'	=> '0',
		'order_by'		=> 'id asc',
		'user'			=> '1',
		'disabled'		=> '0',
		'seccion'		=> ''
);
/******************************************************************************************************************************************************/

$objeto_tabla['NOTIFICACIONES']=array(
		'grupo'			=> 'ventas',
		'alias_grupo'	=> '',
		'titulo'		=> 'Notificaciones',
		'nombre_singular'=> 'notificación',
		'nombre_plural'	=> 'notificaciones',
		'tabla'			=> 'notificaciones',
		'archivo'		=> 'notificaciones',
		'prefijo'		=> 'notfic',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'crear'			=> '1',
		'crear_label'	=> '60px',
		'crear_txt'		=> '550px',
		'menu'			=> '1',
		'menu_label'	=> 'Notificaciones',
		'por_pagina'	=> '10',
		'me'			=> 'NOTIFICACIONES',
		'orden'			=> '0',
		'postscript'	=> '
			$linea=fila("id_item,id_cliente,id_jefe,id_usuario,user","ventas_items","where id=".LL["id_grupo"],0);
			if(SS=="update" or SS=="insert")
			{
				update(array("id_status"=>LL["id_status"]),"ventas_items","where id=".LL["id_grupo"],0);
				update(array("id_cliente"=>$linea["id_cliente"],"id_item"=>$linea["id_item"],"id_jefe"=>$linea["id_jefe"],"id_usuario"=>$linea["id_usuario"],"user"=>$linea["user"]),TT,"where id=".II,0);
			}
		',
		'joins'			=>array(
				'usuarios'		=> 'notificaciones.id_usuario=usuarios.id'
		),
		'more'			=>array(
				'usuarios'		=> 'id_jefe?listable=1&queries=1&after=id_usuario'
		),
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr',
						'formato'		=> '7b',
						'width'			=> '100px',
						'queries'		=> '1'
				),
				'modulo'		=>array(
						'campo'			=> 'modulo',
						'label'			=> 'Módulo',
						'tipo'			=> 'com',
						'opciones'		=>array(
								'abonos'		=> 'abonos',
								'seguimiento'	=> 'seguimiento',
								'agenda'	=> 'agenda',
								'tramite'	=> 'tramite',
								'prestamo'	=> 'prestamo',
						),
						'default'		=> '0',
						'style'			=> 'width:150px;',
						'width'			=> '100px'
				),
				'id_item'		=>array(
						'campo'			=> 'id_item',
						'label'			=> 'Proyecto',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'default'		=> '[id_item]',
						'foreig'		=> '1',
						'style'			=> 'width:150px;',
						'opciones'		=> 'id,nombre|productos_items|0',
						'width'			=> '200px',
						'derecha'		=> '2',
						'tip_foreig'	=> '1',
						'tags'			=> '1',
						'noedit'		=> '1',
						'inherited'		=> '1',
						'derecha'		=> '1',
						'queries'		=> '1'
				),
				'item'			=>array(
						'campo'			=> 'item',
						'tipo'			=> 'hid'
				),
				'sub_item'		=>array(
						'campo'			=> 'sub_item',
						'tipo'			=> 'hid'
				),
				'id_cliente'	=>array(
						'campo'			=> 'id_cliente',
						'label'			=> 'Cliente',
						'width'			=> '40px',
						'listable'		=> '1',
						'tipo'			=> 'inp',
						'derecha'		=> '1',
						'style'			=> 'width:40px;',
						'noedit'		=> '1',
				),
				'id_usuario'	=>array(
						'campo'			=> 'id_usuario',
						'label'			=> 'Asesor',
						'width'			=> '120px',
						'listable'		=> '0',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,nombre;apellidos|usuarios',
						'derecha'		=> '1',
						'tip_foreig'	=> '0',
						'tags'			=> '1',
						'queries'		=> '1',
						'noedit'		=> '1',
						'inherited'		=> '1',
						'disabled'		=> '0',
						'dlquery'		=> '0'
				),
				'fecha_programada'=>array(
						'campo'			=> 'fecha_programada',
						'label'			=> 'Fecha',
						'tipo'			=> 'fch',
						'listable'		=> '1',
						'formato'		=> '7b',
						'time'			=> '2',
						'width'			=> '136px',
						'derecha'		=> '1',
						'default'		=> '',
						'rango'			=> 'now,+1 years',
						'queries'		=> '0',
						'main'			=> '1'
				),
				'asunto'			=>array(
						'campo'			=> 'asunto',
						'label'			=> 'Asunto',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '200px',
						'style'			=> 'width:550px;',
				),
				'texto'			=>array(
						'campo'			=> 'texto',
						'label'			=> 'Mensaje',
						'tipo'			=> 'html',
						'listable'		=> '1',
						'width'			=> '270px',
						'style'			=> 'height:200px;width:550px;',
						'listhtml'		=> '1'
				),
				'estado'		=>array(
						'campo'			=> 'estado',
						'label'			=> 'Estado',
						'tipo'			=> 'com',
						'opciones'		=>array(
								'1'			=> 'pendiente|#136CB2',
								'2'			=> 'enviado|green'
						),
						'default'		=> '0',
						'style'			=> 'width:150px;',
						'width'			=> '100px',
						'listable'		=> '1'
				),
				'tipo'			=>array(
						'campo'			=> 'tipo',
						'label'			=> 'Tipo',
						'tipo'			=> 'com',
						'opciones'		=>array(
								'email'			=> 'email',
								'push'			=> 'push'
						),
						'default'		=> '0',
						'style'			=> 'width:150px;',
						'width'			=> '100px',
						'listable'		=> '1'
				),
				'user'			=>array(
						'campo'			=> 'user',
						'tipo'			=> 'user'
				),
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1'
				)
		),
		'edicion_rapida'	=> '1',
		'calificacion'	=> '0',
		'edicion_completa'=> '1',
		'disabled'		=> '0',
		'user'			=> '1',
		'order_by'		=> 'id asc',
		'stat'			=> '0',
		'exportar_excel'	=> '1',
		'seccion'		=> 'notificaciones'
);
/******************************************************************************************************************************************************/

$objeto_tabla['PUBLICIDADES']=array(
		'grupo'			=> 'ventas',
		'alias_grupo'	=> '',
		'titulo'		=> 'Publicidades',
		'nombre_singular'=> 'publicidad',
		'nombre_plural'	=> 'publicidades',
		'tabla'			=> 'publicidades',
		'archivo'		=> 'publicidades',
		'prefijo'		=> 'spe',
		'eliminar'		=> '1',
		'crear'			=> '1',
		'editar'		=> '1',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'crear_label'	=> '100px',
		'crear_txt'		=> '600px',
		'menu_label'	=> 'Publicidades',
		'me'			=> 'PUBLICIDADES',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'fecha_creacion2'=>array(
						'campo'			=> 'fecha_creacion2',
						'label'			=> 'Fecha Creacion',
						'tipo'			=> 'fch',
						'width'			=> '80px',
						'listable'		=> '1',
						'validacion'	=> '0',
						'formato'		=> '7b',
						'derecha'		=> '1',
						'rango'			=> '-4 years,now',
						'default'		=> 'now()',
						'time'			=> '1'
				),
				'id_item'		=>array(
						'campo'			=> 'id_item',
						'label'			=> 'Proyecto',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '1',
						'default'		=> '[id_item]',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,codigo;nombre|productos_items',
						'width'			=> '140px',
						'derecha'		=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'tip_foreig'	=> '1'
				),
				'tamano'		=>array(
						'campo'			=> 'tamano',
						'label'			=> 'Tamaño',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'validacion'	=> '0',
						'opciones'		=>array(
								'2 X 2'			=> '2 X 2',
								'3 X 2'			=> '3 X 2',
								'3 X 3'			=> '3 X 3',
								'3 X 5'			=> '3 X 5',
								'3 X 6'			=> '3 X 6',
								'4 X 3'			=> '4 X 3',
								'6 X 3'			=> '6 X 3',
								'6 X 6'			=> '6 X 6'
						),
						'style'			=> 'width:150px;',
						'width'			=> '100px',
						'derecha'		=> '1'
				),
				'cantidad'		=>array(
						'campo'			=> 'cantidad',
						'label'			=> 'Cantidad',
						'width'			=> '60px',
						'tipo'			=> 'inp',
						'style'			=> 'width:60px;',
						'derecha'		=> '2',
						'listable'		=> '1',
						'validacion'	=> '1'
				),
				'precio'		=>array(
						'campo'			=> 'precio',
						'label'			=> 'Precio Unitario',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency'
				)
		),
		'seccion'		=> 'publicidad',
		'calificacion'	=> '1'
);
/******************************************************************************************************************************************************/

$objeto_tabla['SPEECHES']=array(
		'grupo'			=> 'ventas',
		'alias_grupo'	=> '',
		'titulo'		=> 'Speaches',
		'nombre_singular'=> 'speech',
		'nombre_plural'	=> 'speeches',
		'tabla'			=> 'speeches',
		'archivo'		=> 'speeches',
		'prefijo'		=> 'spe',
		'eliminar'		=> '1',
		'crear'			=> '1',
		'editar'		=> '1',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'crear_label'	=> '100px',
		'crear_txt'		=> '600px',
		'menu_label'	=> 'Speeches',
		'me'			=> 'SPEECHES',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_item'		=>array(
						'campo'			=> 'id_item',
						'label'			=> 'Proyecto',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '1',
						'default'		=> '[id_item]',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,codigo;nombre|productos_items',
						'width'			=> '140px',
						'derecha'		=> '1',
						'tags'			=> '1',
						'queries'		=> '1',
						'tip_foreig'	=> '1'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '300px',
						'validacion'	=> '1'
				),
				'texto'			=>array(
						'campo'			=> 'texto',
						'label'			=> 'Texto',
						'tipo'			=> 'html',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '500px',
						'style'			=> 'height:270px;'
				)
		)
);
/******************************************************************************************************************************************************/

$objeto_tabla['TRAMITES_SPEECHES']=array(
		'grupo'			=> 'ventas',
		'alias_grupo'	=> '',
		'titulo'		=> 'Speaches',
		'nombre_singular'=> 'speech',
		'nombre_plural'	=> 'speeches',
		'tabla'			=> 'tramites_speeches',
		'archivo'		=> 'tramites_speeches',
		'prefijo'		=> 'traspe',
		'eliminar'		=> '1',
		'crear'			=> '1',
		'editar'		=> '1',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'crear_label'	=> '100px',
		'crear_txt'		=> '600px',
		'menu_label'	=> 'Speeches',
		'me'			=> 'TRAMITES_SPEECHES',
		'seccion'		=> 'trámites',				
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '300px',
						'validacion'	=> '1'
				),
				'texto'			=>array(
						'campo'			=> 'texto',
						'label'			=> 'Texto',
						'tipo'			=> 'html',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '500px',
						'style'			=> 'height:270px;'
				)
		)
);

$objeto_tabla['TRAMITES_ITEMS_BASE']=array(
		'grupo'			=> 'ventas',
		'alias_grupo'	=> '',
		'titulo'		=> 'Trámites Pasos - Mantenimiento',
		'nombre_singular'=> 'paso',
		'nombre_plural'	=> 'pasos',
		'tabla'			=> 'tramites_items_base',
		'archivo'		=> 'tramites_items_base',
		'prefijo'		=> 'tra_ite_bas',
		'eliminar'		=> '1',
		'crear'			=> '1',
		'editar'		=> '1',
		'edicion_completa'=> '1',		
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'crear_label'	=> '100px',
		'crear_txt'		=> '600px',
		'menu_label'	=> 'Trámites Pasos',
		'me'			=> 'TRAMITES_ITEMS_BASE',
		'orden'			=> '1',
		'crear_quick'	=> '0',	
		'order_by'		=> 'orden asc',		
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'sibcp'		=>array(
						'campo'			=> 'sibcp',
						'label'			=> 'Banco',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'Ambos',
								'2'			=> 'Banco =BCP',
								'3'			=> 'Banco!=BCP',
						),
						'default'		=> '1',
						'style'			=> 'width:150px;',
						'width'			=> '100px'
				),
				'orden'		=>array(
						'campo'			=> 'orden',
						'label'			=> 'Orden',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '40px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '2',
						'style'			=> 'width:40px;',
				),	
				'nombre'	=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'tipo'			=> 'com',
						'default'		=> '0',
						'opciones'		=>array(
								'1'			=> 'Inmobiliaria',
								'2'			=> 'Cliente',
								'3'			=> 'Notaria',
								'4'			=> 'Otro Banco',
								'5'			=> 'BCP',
						),
						'listable'		=> '1',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'queries'		=> '1'
				),							
				'paso'		=>array(
						'campo'			=> 'paso',
						'label'			=> 'Paso',
						'tipo'			=> 'txt',
						'listable'		=> '1',
						'width'			=> '800px',
						'style'			=> 'width:500px;',						
						'validacion'	=> '1',
						'derecha'		=> '1',
				),
				'texto'			=>array(
						'campo'			=> 'texto',
						'label'			=> 'Detalle',
						'tipo'			=> 'txt',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '500px',
						'style'			=> 'width:500px;'
				)
		)
);

$objeto_tabla['TRAMITES_ITEMS']=array(
		'grupo'			=> 'ventas',
		'titulo'		=> 'Trámites',
		'nombre_singular'=> 'trámite',
		'nombre_plural'	=> 'trámites',
		'tabla'			=> 'tramites_items',
		'archivo'		=> 'tramites_items',
		'prefijo'		=> 'traite',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'duplicar'		=> '0',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Trámites',
		'por_pagina'	=> '20',
		'me'			=> 'TRAMITES_ITEMS',
		'orden'			=> '1',
		'crear_label'	=> '80px',
		'crear_txt'		=> '660px',
		'filtros_extra'	=> '',
		// 'script'		=> '

		// 	update(
		// 		["estado"=>"CASE"],
		// 		"productos_ventas_documentos","
		// 	    WHEN DATE(fecha_vencimiento) > DATE(NOW()) AND (cumplido=0 or cumplido is null) THEN 1
		// 	    WHEN DATE(fecha_vencimiento) = DATE(NOW()) AND (cumplido=0 or cumplido is null) THEN 2
		// 	    WHEN DATE(fecha_vencimiento) < DATE(NOW()) AND (cumplido=0 or cumplido is null) THEN 3	
		// 	    WHEN cumplido=1 THEN 4	
		// 	    END
		// 		where fecha_vencimiento!=\"0000-00-00 00:00:00\" ",
		// 		0);

		// ',
		// 'postscript'	=> '

		// 		if(LL["fecha_creacion2"]!="0000-00-00 00:00:00"){

		// 			update(array("fecha_creacion"=>LL["fecha_creacion2"]),TT,"where id=II",0);

		// 		}
		// 		if(SS=="insert"){
									
		// 			//vendido
		// 			if(LL["forma_pago"]=="1"){
						
		// 				//set items status						
		// 				$id_status=3;
		// 				$venta_fecha=LL["fecha_creacion"];
													
		// 				//set ventas_items a is_status = vendido
		// 				$atencion_id_status=6;

		// 			} else {

		// 				//set items status
		// 				$id_status=2;						
		// 				$venta_fecha="NULL";

		// 				//set ventas_items a is_status = separado
		// 				$atencion_id_status=7;

		// 			} 

		// 			update([
		// 				"id_status"=>$atencion_id_status
		// 				],
		// 				"ventas_items",
		// 				"where id=".LL["id_ventas_item"],
		// 				0
		// 				);							

		// 			insert([
		// 					"fecha_creacion"=> "now()",
		// 					"id_grupo"		=> LL["id_ventas_item"],
		// 					"texto"			=> "vendido",
		// 					"id_usuario"	=> LL["id_usuario"],
		// 					"id_status"		=> $atencion_id_status
		// 					],
		// 					"ventas_mensajes",
		// 					0
		// 					);	

		// 			//set todos los departamentos, estacionamiento y depositos id_status = separado o vendido
		// 			foreach(json_decode(LL["pedido"]) as $pedido){
		// 				if($pedido->type=="departamento")
		// 					update(array("id_status"=>$id_status,"venta_fecha"=>$venta_fecha,"venta_precio"=>$pedido->price),"productos_items_items","where id=".$pedido->id,0);
		// 				elseif($pedido->type=="estacionamiento")
		// 					update(array("id_status"=>$id_status,"venta_fecha"=>$venta_fecha,"venta_precio"=>$pedido->price),"productos_estacionamientos_items_items","where id=".$pedido->id,0);
		// 				elseif($pedido->type=="deposito")
		// 					update(array("id_status"=>$id_status,"venta_fecha"=>$venta_fecha,"venta_precio"=>$pedido->price),"productos_depositos_items_items","where id=".$pedido->id,0);													
		// 			}

		// 		}
		// 		if(SS=="delete"){

		// 			//set ventas_items a is_status = en seguimiento
		// 			update(array("id_status"=>"3"),"ventas_items","where id=".LL["id_ventas_item"],0);					

		// 			//set todos los departamentos, estacionamiento y depositos id_status = disponible
		// 			foreach(json_decode(LL["pedido"]) as $pedido){
		// 				if($pedido->type=="departamento")
		// 					update(array("id_status"=>"1","venta_fecha"=>"NULL","venta_precio"=>"0"),"productos_items_items","where id=".$pedido->id,0);
		// 				elseif($pedido->type=="estacionamiento")
		// 					update(array("id_status"=>"1","venta_fecha"=>"NULL","venta_precio"=>"0"),"productos_estacionamientos_items_items","where id=".$pedido->id,0);
		// 				elseif($pedido->type=="deposito")
		// 					update(array("id_status"=>"1","venta_fecha"=>"NULL","venta_precio"=>"0"),"productos_depositos_items_items","where id=".$pedido->id,0);
		// 			}

		// 			insert([
		// 					"fecha_creacion"=> "now()",
		// 					"id_grupo"		=> LL["id_ventas_item"],
		// 					"texto"			=> "venta eliminada",
		// 					"id_usuario"	=> LL["id_usuario"],
		// 					"id_status"		=> 3
		// 					],
		// 					"ventas_mensajes",
		// 					0
		// 					);	

		// 			delete("productos_ventas_documentos","where id_grupo=".II);

		// 			delete("productos_ventas_docs","where id_grupo=".II);

		// 			delete("notificaciones","where modulo=\"abonos\" and item=".II);

		// 		}

		// ',
		// 'joins'			=>array(
		// 		'ventas_items'	=> 'productos_ventas.id_ventas_item=ventas_items.id',
		// 		'usuarios'		=> 'productos_ventas.id_usuario=usuarios.id'
		// ),
		// 'more'			=>array(
		// 		'ventas_items'	=> '
		// 		id_cliente?listable=1&after=fecha_creacion&controles=,
		// 		pedido?listable=1&after=fecha_creacion,
		// 		id_item?listable=1&queries=1&after=fecha_creacion,
		// 		id_canal?listable=1&after=fecha_creacion,
		// 		id_sectorista?listable=1&after=fecha_creacion,
		// 		id_banco?listable=1&after=fecha_creacion,
		// 		',
		// 		'usuarios'		=> 'id_jefe?listable=1&queries=0&after=id_usuario'
		// ),
		'procesos'		=>array(
				array(
						'label'			=> 'Crear Siguiente Registro',
						'ot'			=> 'tramites_subitems',
						'accion'		=> 'insert',
						'extra'			=> 'id=[id]',
						'buttom'		=> 'Crear Registro',
						'params'		=> 'crear=1&id_canal%7Cindicador=1&id_item%7Cindicador=1&pedido%7Cindicador=1&id_usuario%7Cindicador=1&id_sectorista%7Cindicador=1&id_cliente%7Cindicador=1&id_banco%7Cindicador=1&onload_include=base2%2Fapps%2Fnext_tramite_subitem.php'
				)
		),
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id',
						'listable'		=> '0',
						'width'			=> '50px',
						'label'			=> 'Correl'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr',
						'listable'		=> '1',
						'formato'		=> '7b',
						'queries'		=> '1',
						'edit'			=> '1',
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_ventas_item'	=>array(
						'campo'			=> 'id_ventas_item',
						'tipo'			=> 'hid'
				),

				'id_cliente'	=>array(
						'campo'			=> 'id_cliente',
						'label'			=> 'Cliente',
						'width'			=> '100px',
						'listable'		=> '1',
						'foreig'		=> '1',
						'default'		=> '[id_cliente]',
						'tipo'			=> 'hid',
						'derecha'		=> '1',
						'directlink'	=> 'id,nombre;apellidos;dni;info|clientes|where visibilidad=1|6',
						'opciones'		=> 'id,nombre;apellidos|clientes||telefono;celular_claro;celular_movistar;nextel;rpm;rpc;email;empresa',
						'style'			=> 'width:600px;',
						'controles'		=> '
							<a href="custom/tramites_subitems.php?id=[id]" rel="subs popup">{select count(*) from tramites_subitems where id_grupo=[id]} pasos</a>
							<a href="pop.php?app=enviar_email_tramite&id=[id]" style="color:red;" >Mensaje</a>							
							',
						'tip_foreig'	=> '1',
						'like'			=> '0',
						'tags'			=> '1',
						'validacion'	=> '1',
						'noedit'		=> '1',
						'queries'		=> '1',
						'dlquery'		=> '1'
				),

				'id_banco'		=>array(
						'campo'			=> 'id_banco',
						'label'			=> 'Banco',
						'tipo'			=> 'hid',
						'validacion'	=> '0',
						'foreig'		=> '1',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,nombre|bancos',
						'width'			=> '95px',
						'derecha'		=> '1',
						'load'			=> 'id_sectorista||id,apellidos|bancos_sectoristas|where id_grupo=',
						'queries'		=> '1',
						'listable'		=> '1'
				),				
				'forma_pago'	=>array(
						'campo'			=> 'forma_pago',
						'label'			=> 'Forma de Pago',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'Contado',
								'2'			=> 'Crédito Directo',
								'3'			=> 'Crédito Hipotecario Tradicional',
								'4'			=> 'Plan Ahorro'
						),
						'eventos'		=>array(
								'1'			=> '$0("id_in_porcentaje_cuota_inicial");$0("id_in_cuota_inicial");$0("id_in_saldo_financiar");$0("id_in_saldo_inmobiliaria");$0("id_in_saldo_inmobiliaria_cuotas");$0("id_in_saldo_ahorro");$0("id_in_saldo_ahorro_cuotas");',
								'2'			=> '$0("id_in_porcentaje_cuota_inicial");$0("id_in_cuota_inicial");$0("id_in_saldo_financiar");$0("id_in_saldo_inmobiliaria");$0("id_in_saldo_inmobiliaria_cuotas");$0("id_in_saldo_ahorro");$0("id_in_saldo_ahorro_cuotas");',
								'3'			=> '$1("id_in_porcentaje_cuota_inicial");$1("id_in_cuota_inicial");$1("id_in_saldo_financiar");$0("id_in_saldo_inmobiliaria");$0("id_in_saldo_inmobiliaria_cuotas");$0("id_in_saldo_ahorro");$0("id_in_saldo_ahorro_cuotas");',
								'4'			=> '$1("id_in_porcentaje_cuota_inicial");$1("id_in_cuota_inicial");$1("id_in_saldo_financiar");$1("id_in_saldo_inmobiliaria");$1("id_in_saldo_inmobiliaria_cuotas");$1("id_in_saldo_ahorro");$1("id_in_saldo_ahorro_cuotas");'
						),
						'derecha'		=> '1',
						'legend'		=> 'Pago',
						'disabled'		=> '1'
				),
				'pvlista'		=>array(
						'campo'			=> 'pvlista',
						'label'			=> 'Precio',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency',
						'disabled'		=> '1'
				),
				'pvpromocion'	=>array(
						'campo'			=> 'pvpromocion',
						'label'			=> 'Precio Final',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'onchange'		=> '$("in_saldo_financiar").value=$("in_pvpromocion").value-$("in_cuota_inicial").value;',
						'format'		=> 'currency',
						'disabled'		=> '1'

				),
				'cuota_inicial'	=>array(
						'campo'			=> 'cuota_inicial',
						'label'			=> 'Inicial',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'onchange'		=> '$("in_saldo_financiar").value=$("in_pvpromocion").value-$("in_cuota_inicial").value;',
						'disabled'		=> '1'						
				),
				'saldo_inmobiliaria'=>array(
						'campo'			=> 'saldo_inmobiliaria',
						'label'			=> 'Pagar a inmobiliaria',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'listyle'		=> 'margin-left:49.7%;clear:left;display:none;',
						'onchange'		=> '$("in_saldo_ahorro").value=$("in_cuota_inicial").value-$("in_saldo_inmobiliaria").value;',
						'format'		=> 'currency',
						'disabled'		=> '1'

				),
				'saldo_inmobiliaria_cuotas'=>array(
						'campo'			=> 'saldo_inmobiliaria_cuotas',
						'label'			=> 'Nro Cuotas Inmobiliaria',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '50px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '2',
						'size'			=> '8',
						'style'			=> 'width:40px;',
						'listyle'		=> 'display:none;',
						'default'		=> '2',
						'disabled'		=> '1'						
				),
				'separacion'	=>array(
						'campo'			=> 'separacion',
						'label'			=> 'Separación',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency',
						'disabled'		=> '1'						
				),
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1',
						'listable'		=> '0'
				),
				'method'		=>array(
						'campo'			=> 'method',
						'tipo'			=> 'inp',
						'indicador'		=> '1'
				),
				'user'			=>array(
						'campo'			=> 'user',
						'tipo'			=> 'user'
				)
		),
		'crear_quick'	=> '0',
		'edicion_completa'=> '1',
		'calificacion'	=> '0',
		'importar_csv'	=> '0',
		'width_listado'	=> '',
		'edicion_rapida'	=> '0',
		'crear_pruebas'	=> '0',
		'exportar_excel'	=> '1',
		'disabled'		=> '0',
		'user'			=> '1'
);
/******************************************************************************************************************************************************/

$objeto_tabla['TRAMITES_SUBITEMS']=array(
		'grupo'			=> 'ventas',
		'titulo'		=> 'Avance',
		'nombre_singular'=> 'avance',
		'nombre_plural'	=> 'avances',
		'tabla'			=> 'tramites_subitems',
		'archivo'		=> 'tramites_subitems',
		'prefijo'		=> 'trasubite',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '0',
		'duplicar'		=> '0',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Avances',
		'por_pagina'	=> '20',
		'me'			=> 'TRAMITES_SUBITEMS',
		'orden'			=> '1',
		'crear_label'	=> '80px',
		'crear_txt'		=> '660px',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id',
						'listable'		=> '0',
						'width'			=> '50px',
						'label'			=> 'Correl'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr',
						'listable'		=> '1',
						'formato'		=> '7b',
						'width'			=> '85px'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_grupo'		=>array(
						'campo'			=> 'id_grupo',
						'tipo'			=> 'hid',
						'listable'		=> '0',
						'validacion'	=> '0',
						'default'		=> '[id]',
						'foreig'		=> '1'
				),
				'orden'		=>array(
						'campo'			=> 'orden',
						'label'			=> 'Orden',
						'tipo'			=> 'hid',
						'listable'		=> '0',
						'width'			=> '40px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '2',
						'style'			=> 'width:40px;',
				),
				'nombre'	=>array(
						'campo'			=> 'nombre',
						'label'			=> '',
						'tipo'			=> 'com',
						'default'		=> '0',
						'opciones'		=>array(
								'1'			=> 'Inmobiliaria',
								'2'			=> 'Cliente',
								'3'			=> 'Notaria',
								'4'			=> 'Otro Banco',
								'5'			=> 'BCP',
								'10'		=> '<span class="zz ico_gm"></span>',
						),
						'listable'		=> '1',
						'width'			=> '60px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'queries'		=> '1',
				),							
				'paso'		=>array(
						'campo'			=> 'paso',
						'label'			=> 'Acción',
						'tipo'			=> 'txt',
						'listable'		=> '1',
						'width'			=> '300px',
						'style'			=> 'width:300px;height:40px;',						
						'validacion'	=> '1',
						'derecha'		=> '1',
				),

				'detalle'		=>array(
						'campo'			=> 'detalle',
						'label'			=> 'Detalle',
						'tipo'			=> 'txt',
						'listable'		=> '1',
						'width'			=> '250px',
						'style'			=> 'width:250px;height:40px;',						
						'validacion'	=> '0',
						'derecha'		=> '1',
				),				
				'alerta_fecha'	=>array(
						'campo'			=> 'alerta_fecha',
						'label'			=> 'Alerta',
						'tipo'			=> 'fch',
						'listable'		=> '1',
						'formato'		=> '7b',
						'time'			=> '1',
						'width'			=> '156px',
						'derecha'		=> '1',
						'default'		=> 'now()',
						'rango'			=> 'now,+1 years',
						'queries'		=> '0'
				),
				'estado'		=>array(
						'campo'			=> 'estado',
						'label'			=> 'Estado',
						'tipo'			=> 'com',
						'listable'		=> '0',
						'indicador'		=> '1',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'pendiente|navy',
								'2'			=> 'para hoy|orange',
								'3'			=> 'atrazado|red',
								'4'			=> 'cumplido|green'
						),
						'default'		=> '1',
						'style'			=> 'width:150px;',
						'width'			=> '100px'
				),
				'cumplido'		=>array(
						'campo'			=> 'cumplido',
						'label'			=> 'Cumplido',
						'radio'			=> '1',
						'tipo'			=> 'com',
						'opciones'		=>array(
								'1'			=> 'si',
								'0'			=> 'no'
						),
						'listable'		=> '1',
						'default'		=> '0',
						'style'			=> 'width:150px;',
						'width'			=> '40px'
				),
				'foto_descripcion'=>array(
						'campo'			=> 'foto_descripcion',
						'label'			=> 'archivo',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '207px',
						'derecha'		=> '1',						
				),
				'fichero'		=>array(
						'campo'			=> 'fichero',
						'label'			=> '',
						'tipo'			=> 'sto',
						'width'			=> '300px',
						'style'			=> 'width:200px;',
						'listable'		=> '1',
						'validacion'	=> '0',
						'prefijo'		=> 'doc',
						'carpeta'		=> 'abo_fil',
						'name'			=> 'nombre',
						'enlace'		=> 'down',
						'derecha'		=> '2',						
				),


				'method'		=>array(
						'campo'			=> 'method',
						'tipo'			=> 'inp',
						'indicador'		=> '1'
				),
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1',
						'listable'		=> '0'
				),
				'user'			=>array(
						'campo'			=> 'user',
						'tipo'			=> 'user'
				)
		),
		'edicion_completa'=> '0',
		'calificacion'	=> '0',
		'importar_csv'	=> '0',
		'width_listado'	=> '',
		'edicion_rapida'	=> '1',
		'crear_pruebas'	=> '0',
		'order_by'		=> 'id asc',
		'user'			=> '1',
		'disabled'		=> '0'
);

$objeto_tabla['BONOS_INTERVALOS']=array(
		'grupo'			=> 'ventas',
		'titulo'		=> 'Intervalo de Comisiones',
		'nombre_singular'=> 'intervalo',
		'nombre_plural'	=> 'intervalos',
		'tabla'			=> 'bonos_intervalos',
		'archivo'		=> 'bonos_intervalos',
		'prefijo'		=> 'bonint',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'duplicar'		=> '0',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Intervalo de Comisiones',
		'por_pagina'	=> '20',
		'me'			=> 'BONOS_INTERVALOS',
		'orden'			=> '1',
		'crear_label'	=> '80px',
		'crear_txt'		=> '660px',
		'filtros_extra'	=> '',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_item'		=>array(
						'campo'			=> 'id_item',
						'label'			=> 'Proyecto',
						'unique'		=> '0',
						'width'			=> '200px',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,nombre|productos_items|where id not in (select id_item from bonos_intervalos)',
						'listable'		=> '1',
						'validacion'	=> '1',
						'like'			=> '0',
						'controles'		=> '

<a rel="subs popup" href="custom/bonos_intervalos_subitems.php?id_item=[id_item]">{select count(*) from bonos_intervalos_subitems where id_item=[id_item]} intervalos</a>

						',
						'size'			=> '140',
						'style'			=> 'width:450px;',
						'tags'			=> '1',
						'derecha'		=> '1',
						'noedit'		=> '1'																		
				),
				'comision_esta'			=>array(
						'campo'			=> 'comision_esta',
						'label'			=> 'Comisión Estacionamiento',
						'width'			=> '100px',
						'tipo'			=> 'inp',
						'style'			=> 'width:60px;',
						'derecha'		=> '1',
						'listable'		=> '1',
						'format'		=> 'currency'
				),
				'comision_depo'			=>array(
						'campo'			=> 'comision_depo',
						'label'			=> 'Comisión Deposito',
						'width'			=> '100px',
						'tipo'			=> 'inp',
						'style'			=> 'width:60px;',
						'derecha'		=> '1',
						'listable'		=> '1',
						'format'		=> 'currency'
				),								
		),
		'edicion_completa'=> '0',
		'calificacion'	=> '0',
		'importar_csv'	=> '0',
		'width_listado'	=> '',
		'edicion_rapida'	=> '1',
		'crear_pruebas'	=> '0',
		'order_by'		=> 'id asc',
		'user'			=> '1',
		'disabled'		=> '0',
		'seccion'		=> 'Bonos'
);

/******************************************************************************************************************************************************/

$objeto_tabla['BONOS_INTERVALOS_SUBITEMS']=array(
		'grupo'			=> 'ventas',
		'titulo'		=> 'Intervalos',
		'nombre_singular'=> 'intervalo',
		'nombre_plural'	=> 'intervalos',
		'tabla'			=> 'bonos_intervalos_subitems',
		'archivo'		=> 'bonos_intervalos_subitems',
		'prefijo'		=> 'bonintsub',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'duplicar'		=> '0',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'menu'			=> '0',
		'menu_label'	=> 'Intervalos',
		'por_pagina'	=> '20',
		'me'			=> 'BONOS_INTERVALOS_SUBITEMS',
		'orden'			=> '1',
		'crear_label'	=> '80px',
		'crear_txt'		=> '660px',
		'filtros_extra'	=> '',
		'postscript'	=> 'include("base2/apps/update_bonos.php");',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id',
						'listable'		=> '0',
						'width'			=> '50px',
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr',
						'listable'		=> '0',
						'formato'		=> '7b',
						'width'			=> '85px'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_item'		=>array(
						'campo'			=> 'id_item',
						'label'			=> 'Proyecto',
						'tipo'			=> 'hid',
						'validacion'	=> '1',
						'default'		=> '[id_item]',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,codigo;nombre|productos_items',
						'width'			=> '140px',
						'derecha'		=> '1',
						'tags'			=> '1',
						'tip_foreig'	=> '1',
						'foreig'		=> '1',
						'queries'		=> '1'												
				),
				'bono'			=>array(
						'campo'			=> 'bono',
						'label'			=> 'Bono',
						'width'			=> '100px',
						'tipo'			=> 'inp',
						'style'			=> 'width:60px;',
						'derecha'		=> '1',
						'listable'		=> '1',
						'format'		=> 'currency'
				),
				'bono_porcentaje'			=>array(
						'campo'			=> 'bono_porcentaje',
						'label'			=> 'Porcentaje',
						'width'			=> '100px',
						'tipo'			=> 'inp',
						'style'			=> 'width:60px;',
						'derecha'		=> '1',
						'listable'		=> '1',
				),				
				'desde'		=>array(
						'campo'			=> 'desde',
						'label'			=> 'Desde',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'derecha'		=> '2',						
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> '1',
								'2'			=> '2',
								'3'			=> '3',
								'4'			=> '4',
								'5'			=> '5',
								'6'			=> '6',
								'7'			=> '7',
								'8'			=> '8',
								'9'			=> '9',
								'10'		=> '10',
								'11'		=> '11',
								'12'		=> '12',
								'13'		=> '13',
								'14'		=> '14',
								'15'		=> '15',
								'16'		=> '16',
								'17'		=> '17',
								'18'		=> '18',
								'19'		=> '19',
								'20'		=> '20',							
						),
						'width'			=> '100px'
				),
				'hasta'		=>array(
						'campo'			=> 'hasta',
						'label'			=> 'Hasta',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'derecha'		=> '2',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> '1',
								'2'			=> '2',
								'3'			=> '3',
								'4'			=> '4',
								'5'			=> '5',
								'6'			=> '6',
								'7'			=> '7',
								'8'			=> '8',
								'9'			=> '9',
								'10'		=> '10',
								'11'		=> '11',
								'12'		=> '12',
								'13'		=> '13',
								'14'		=> '14',
								'15'		=> '15',
								'16'		=> '16',
								'17'		=> '17',
								'18'		=> '18',
								'19'		=> '19',
								'20'		=> '20',							
								'100'		=> 'a mas',						
						),
						'width'			=> '100px'
				),								
				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1',
						'listable'		=> '0'
				),
				'user'			=>array(
						'campo'			=> 'user',
						'tipo'			=> 'user'
				)
		),
		'edicion_completa'=> '0',
		'calificacion'	=> '0',
		'importar_csv'	=> '0',
		'width_listado'	=> '',
		'edicion_rapida'	=> '1',
		'crear_pruebas'	=> '0',
		'order_by'		=> 'bono asc',
		'user'			=> '1',
		'disabled'		=> '0',
);



$objeto_tabla['BONOS_ABONOS']=array(
		'grupo'			=> 'ventas',
		'titulo'		=> 'Abonos',
		'nombre_singular'=> 'abono',
		'nombre_plural'	=> 'abonos',
		'tabla'			=> 'bonos_abonos',
		'archivo'		=> 'bonos_abonos',
		'prefijo'		=> 'bonabon',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '0',
		'duplicar'		=> '0',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Abonos',
		'por_pagina'	=> '20',
		'me'			=> 'BONOS_ABONOS',
		'orden'			=> '1',
		'crear_label'	=> '80px',
		'crear_txt'		=> '660px',
		'filtros_extra'	=> '',
		// 'postscript'	=> 'include("base2/apps/update_bonos.php");',
		// 'repos'			=> 'vendedores=Reporte de Ventas|fecha_creacion,id_item'
		// 'repos'			=> 'abonos=Reporte de Abonos|venta_fecha,id_item,estado',
		'repos'			=> 'abonos=Reporte de Abonos',
		
		'joins'			=>array(
				'productos_items_items'=> 'bonos_abonos.id_item_item=productos_items_items.id'
				// 'productos_estacionamientos_items_items'=> 'bonos_abonos.id_item_estacionamiento=productos_estacionamientos_items_items.id',
				// 'productos_depositos_items_items'=> 'bonos_abonos.id_item_deposito=productos_depositos_items_items.id'
		),	
		'more'			=>array(
				'productos_items_items'=> '
			venta_id_vendedor?queries=1&listable=1&after=venta_fecha&width=130px,
			id_subgrupo?listable=1&after=venta_fecha&label=Torre&width=50px,
			'
				// 'productos_estacionamientos_items_items'=>'venta_precio?listable=1&after=id_item_deposito&label=P.Estac&width=50px',
				// 'productos_depositos_items_items'=>'venta_precio?listable=1&after=id_item_deposito&label=P.Depos&width=50px'

		),			
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id',
						'width'			=> '40px',
						'listable'		=> '1',											
						'indicador'		=> '1',											
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr',
						'listable'		=> '0',
						'formato'		=> '7b',
						'width'			=> '85px',
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),

				'venta_fecha'	=>array(
						'campo'			=> 'venta_fecha',
						'label'			=> 'Fecha V',
						'tipo'			=> 'fch',
						'width'			=> '80px',
						'listable'		=> '1',
						'indicador'		=> '1',
						'validacion'	=> '0',
						'formato'		=> '0a',
						'style'			=> '',
						'derecha'		=> '2',
						'frozen'		=> '0',
						'queries'		=> '1'
				),
				'id_item'	=>array(
						'label'			=> 'Proyecto',
						'campo'			=> 'id_item',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,nombre|productos_items',	
						'tip_foreig'	=> '1',											
						'indicador'		=> '1',
						'queries'		=> '1',
				),	
				'id_item_item'	=>array(
						'listable'		=> '1',	
						'legend'		=> 'Inmueble',										
						'label'			=> 'Dpto',
						'campo'			=> 'id_item_item',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,numero|productos_items_items',	
						'tip_foreig'	=> '1',											
						'width'			=> '50px',
						'indicador'		=> '1',
				),	
				'id_item_estacionamiento'	=>array(
						'listable'		=> '1',					
						'label'			=> 'Estac.',
						'campo'			=> 'id_item_estacionamiento',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,numero|productos_estacionamientos_items_items',	
						'tip_foreig'	=> '1',											
						'width'			=> '50px',
						'indicador'		=> '1',
				),	
				'id_item_deposito'	=>array(
						'listable'		=> '1',					
						'label'			=> 'Depos.',
						'campo'			=> 'id_item_deposito',
						'tipo'			=> 'hid',
						'opciones'		=> 'id,numero|productos_depositos_items_items',	
						'tip_foreig'	=> '1',											
						'width'			=> '50px',
						'indicador'		=> '1',
				),
				// 'id_item'		=>array(
				// 		'campo'			=> 'id_item',
				// 		'label'			=> 'Proyecto',
				// 		'tipo'			=> 'hid',
				// 		'listable'		=> '1',
				// 		'validacion'	=> '1',
				// 		'default'		=> '[id_item]',
				// 		'style'			=> 'width:200px,',
				// 		'opciones'		=> 'id,codigo;nombre|productos_items',
				// 		'load'			=> 'id_items_tipo||id,nombre|productos_tipos|where id_item=[id_item];id_subgrupo||id,nombre|productos_subgrupos|where id_item=[id_item]',
				// 		'width'			=> '140px',
				// 		'derecha'		=> '1',
				// 		'tags'			=> '1',
				// 		'queries'		=> '1',
				// 		'tip_foreig'	=> '1',
				// 		'foreig'		=> '1'
				// ),

				'item_venta_comision'		=>array(
						'campo'			=> 'item_venta_comision',
						'legend'		=> 'Comision',						
						'label'			=> 'C.Dpto',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency',
						'noedit'		=> '1'												
				),
				'estacionamiento_venta_comision'		=>array(
						'campo'			=> 'estacionamiento_venta_comision',
						'label'			=> 'C.Esta',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency',
						'noedit'		=> '1'												
				),

				'deposito_venta_comision'		=>array(
						'campo'			=> 'deposito_venta_comision',
						'label'			=> 'C.Depos',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency',
						'noedit'		=> '1'												
				),				

				'extra'		=>array(
						'campo'			=> 'extra',
						'label'			=> 'C.Extra',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency',
						'noedit'		=> '1'												
				),
												
				'total'		=>array(
						'campo'			=> 'total',
						'label'			=> 'Total',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '100px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency',
						'noedit'		=> '1'						
				),


				'adelanto_monto'		=>array(
						'legend'		=> 'Adelanto',
						'campo'			=> 'adelanto_monto',
						'label'			=> 'Adelanto 80%',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '90px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency'
				),
				'adelanto_fecha'	=>array(
						'campo'			=> 'adelanto_fecha',
						'label'			=> 'Fecha',
						'tipo'			=> 'fch',
						'width'			=> '120px',
						'listable'		=> '1',
						'validacion'	=> '0',
						'formato'		=> '7',
						'style'			=> '',
						'derecha'		=> '2',
						'frozen'		=> '0',
						'rango'			=> '-1 years,+1 years',												
				),								
				'adelanto_cheque'		=>array(
						'campo'			=> 'adelanto_cheque',
						'label'			=> 'N Cheque',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'derecha'		=> '1'
				),	

				'saldo_monto'		=>array(
						'legend'		=> 'Saldo',					
						'campo'			=> 'saldo_monto',
						'label'			=> 'Saldo 20%',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '90px',
						'validacion'	=> '0',
						'variable'		=> 'float',
						'derecha'		=> '1',
						'size'			=> '8',
						'style'			=> 'width:100px;',
						'format'		=> 'currency'
				),

				'saldo_fecha'	=>array(
						'campo'			=> 'saldo_fecha',
						'label'			=> 'Fecha',
						'tipo'			=> 'fch',
						'width'			=> '120px',
						'listable'		=> '1',
						'validacion'	=> '0',
						'formato'		=> '7',
						'style'			=> '',
						'derecha'		=> '2',
						'frozen'		=> '0',
						'rango'			=> '-1 years,+1 years',												
				),		
				'saldo_cheque'		=>array(
						'campo'			=> 'saldo_cheque',
						'label'			=> 'N Cheque',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'derecha'		=> '1'
				),								

				'estado'		=>array(
						'campo'			=> 'estado',
						'label'			=> 'Estado',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'queries'		=> '1',
						'indicador'		=> '1',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'pendiente|red',
								'2'			=> 'adelantado|blue',
								'3'			=> 'pagado|green'
						),
						'default'		=> '1',
						'style'			=> 'width:150px;',
						'width'			=> '80px',
				),

				'tags'			=>array(
						'campo'			=> 'tags',
						'label'			=> 'tags',
						'tipo'			=> 'txt',
						'indicador'		=> '1',
						'fulltext'		=> '1',
						'autotags'		=> '1',
						'listable'		=> '0'
				),
				// 'user'			=>array(
				// 		'campo'			=> 'user',
				// 		'tipo'			=> 'user'
				// )
		),
		'edicion_completa'=> '1',
		'calificacion'	=> '0',
		'importar_csv'	=> '0',
		'width_listado'	=> '',
		'edicion_rapida'	=> '1',
		'crear_pruebas'	=> '0',
		'order_by'		=> 'id asc',
		'user'			=> '1',
		'disabled'		=> '0',
		'seccion'		=> ''
);

/******************************************************************************************************************************************************/

$objeto_tabla['VARIABLES']=array(
		'titulo'		=> 'Variables',
		'nombre_singular'=> 'variable',
		'nombre_plural'	=> 'variables',
		'tabla'			=> 'variables',
		'archivo'		=> 'variables',
		'prefijo'		=> 'var',
		'eliminar'		=> '0',
		'ocultar'		=> '0',
		'crear'			=> '0',
		'editar'		=> '1',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'crear_label'	=> '100px',
		'crear_txt'		=> '400px',
		'menu'			=> '1',
		'menu_label'	=> 'Variables',
		'me'			=> 'VARIABLES',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'variable'		=>array(
						'campo'			=> 'variable',
						'label'			=> 'Variable',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'constante'		=> '1',
						'width'			=> '300px'
				),
				'valor'			=>array(
						'campo'			=> 'valor',
						'label'			=> 'Valor',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '300px'
				),
				'web'			=>array(
						'campo'			=> 'web',
						'tipo'			=> 'web'
				)
		),
		'grupo'			=> 'contenidos',
		'web'			=> '1',
		'disabled'		=> '1'
);
/******************************************************************************************************************************************************/

$objeto_tabla['USUARIOS_ACCESO']=array(
		'grupo'			=> 'sistema',
		'alias_grupo'	=> 'core',
		'titulo'		=> 'Administración de Acceso de Usuarios',
		'nombre_singular'=> 'usuario',
		'nombre_plural'	=> 'usuarios',
		'tabla'			=> 'usuarios_acceso',
		'archivo'		=> 'usuarios_acceso',
		'prefijo'		=> 'usu',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'buscar'		=> '1',
		'menu'			=> '0',
		'menu_label'	=> 'usuarios',
		'me'			=> 'USUARIOS_ACCESO',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'sesion_login'	=> '1',
						'like'			=> '1'
				),
				'password'		=>array(
						'campo'			=> 'password',
						'label'			=> 'Password',
						'tipo'			=> 'pas',
						'listable'		=> '1',
						'validacion'	=> '1',
						'sesion_password'=> '1',
						'width'			=> '200px'
				),
				'nombre_completo'=>array(
						'campo'			=> 'nombre_completo',
						'label'			=> 'Nombre Completo',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'sesion_complete'=> '1',
						'width'			=> '200px',
						'like'			=> '1'
				),
				'id_permisos'	=>array(
						'campo'			=> 'id_permisos',
						'label'			=> 'Permisos',
						'width'			=> '120px',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'opciones'		=> 'id,nombre|usuarios_permisos',
						'sesion_permisos'=> '1',
						'tip_foreig'	=> '1',
						'queries'		=> '1'
				)
		),
		'importar_csv'	=> '0',
		'disabled'		=> '0'
);
/******************************************************************************************************************************************************/

$objeto_tabla['USUARIOS_PERMISOS']=array(
		'grupo'			=> 'sistema',
		'titulo'		=> 'Permisos de Usuarios',
		'nombre_singular'=> 'permiso',
		'nombre_plural'	=> 'permisos',
		'tabla'			=> 'usuarios_permisos',
		'archivo'		=> 'usuarios_permisos',
		'prefijo'		=> 'usuper',
		'eliminar'		=> '0',
		'editar'		=> '1',
		'buscar'		=> '0',
		'menu'			=> '0',
		'menu_label'	=> 'Permisos',
		'me'			=> 'USUARIOS_PERMISOS',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'unique'		=> '1',
						'width'			=> '200PX'
				),
				'texto'			=>array(
						'campo'			=> 'texto',
						'label'			=> 'Propiedades',
						'tipo'			=> 'txt',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '700px',
						'style'			=> 'width:500px;height:300px;'
				),
				'multiusuario'	=>array(
						'campo'			=> 'multiusuario',
						'label'			=> 'Multiusuario',
						'width'			=> '100px',
						'listable'		=> '1',
						'tipo'			=> 'com',
						'opciones'		=>array(
								'2'			=> 'Multi Grupo',
								'1'			=> 'Multi Total',
								'0'			=> 'Individual'
						),
						'default'		=> '0',
						'derecha'		=> '2'
				)
		),
		'importar_csv'	=> '0',
		'disabled'		=> '0',
		'edicion_completa'=> '1',
		'visibilidad'	=> '0',
		'calificacion'	=> '0'
);
/******************************************************************************************************************************************************/

$objeto_tabla['CONFIGURACIONES_ROOT']=array(
		'grupo'			=> 'sistema',
		'titulo'		=> 'Configuración root',
		'nombre_singular'=> 'variable',
		'nombre_plural'	=> 'variables',
		'tabla'			=> 'configuraciones_root',
		'archivo'		=> 'configuraciones_root',
		'prefijo'		=> 'conr',
		'eliminar'		=> '0',
		'ocultar'		=> '0',
		'crear'			=> '1',
		'editar'		=> '1',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'crear_label'	=> '100px',
		'crear_txt'		=> '400px',
		'menu'			=> '0',
		'menu_label'	=> 'Configuración root',
		'me'			=> 'CONFIGURACIONES_ROOT',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'variable'		=>array(
						'campo'			=> 'variable',
						'label'			=> 'Variable',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'constante'		=> '1',
						'width'			=> '300px'
				),
				'valor'			=>array(
						'campo'			=> 'valor',
						'label'			=> 'Valor',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '300px'
				)
		)
);
/******************************************************************************************************************************************************/

$objeto_tabla['CONFIGURACIONES']=array(
		'grupo'			=> 'sistema',
		'titulo'		=> 'Configuración',
		'nombre_singular'=> 'variable',
		'nombre_plural'	=> 'variables',
		'tabla'			=> 'configuraciones',
		'archivo'		=> 'configuraciones',
		'prefijo'		=> 'con',
		'eliminar'		=> '0',
		'ocultar'		=> '0',
		'crear'			=> '0',
		'editar'		=> '1',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'crear_label'	=> '100px',
		'crear_txt'		=> '400px',
		'menu'			=> '0',
		'menu_label'	=> 'Configuración',
		'me'			=> 'CONFIGURACIONES',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'variable'		=>array(
						'campo'			=> 'variable',
						'label'			=> 'Variable',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'constante'		=> '1',
						'width'			=> '300px'
				),
				'valor'			=>array(
						'campo'			=> 'valor',
						'label'			=> 'Valor',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '300px'
				)
		)
);
/******************************************************************************************************************************************************/

$objeto_tabla['WEB_CONFIG']=array(
		'grupo'			=> 'sistema',
		'titulo'		=> 'Webs',
		'nombre_singular'=> 'web',
		'nombre_plural'	=> 'webs',
		'tabla'			=> 'web_config',
		'archivo'		=> 'web_config',
		'prefijo'		=> 'webcon',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'buscar'		=> '0',
		'menu'			=> '0',
		'menu_label'	=> 'Webs',
		'me'			=> 'WEB_CONFIG',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '300px'
				),
				'proyecto'		=>array(
						'campo'			=> 'proyecto',
						'label'			=> 'ID Proyecto',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1'
				)
		),
		'importar_csv'	=> '0',
		'disabled'		=> '0'
);
/******************************************************************************************************************************************************/

$objeto_tabla['BANCOS']=array(
		'titulo'		=> 'Bancos',
		'nombre_singular'=> 'banco',
		'nombre_plural'	=> 'bancos',
		'tabla'			=> 'bancos',
		'archivo'		=> 'bancos',
		'prefijo'		=> 'banc',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Bancos',
		'me'			=> 'BANCOS',
		'orden'			=> '1',
		'width_listado'	=> '600px',
		'seccion'		=> 'bancos',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'controles'		=> '<a href="custom/bancos_sectoristas.php?id=[id]">{select count(*) from bancos_sectoristas where id_grupo=[id]} sectoristas</a>'
				),
				'direccion'		=>array(
						'campo'			=> 'direccion',
						'label'			=> 'Dirección',
						'width'			=> '150px',
						'tipo'			=> 'txt',
						'listable'		=> '1',
						'validacion'	=> '0',
						'style'			=> 'width:400px;height:80px;'
				),
				'porcentaje_cuota_inicial'=>array(
						'campo'			=> 'porcentaje_cuota_inicial',
						'label'			=> 'Cuota Inicial %',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'variable'		=> 'float',
						'validacion'	=> '0',
						'style'			=> 'width:40px;',
						'default'		=> '20'
				)
		),
		'grupo'			=> 'config',
		'edicion_completa'=> '1',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '1',
		'calificacion'	=> '0',
		'set_fila_fijo'	=> '4',
		'crear_quick'	=> '1',
		'disabled'		=> '0'
);
/******************************************************************************************************************************************************/

$objeto_tabla['BANCOS_SECTORISTAS']=array(
		'titulo'		=> 'Sectoristas',
		'nombre_singular'=> 'sectorista',
		'nombre_plural'	=> 'sectoristas',
		'tabla'			=> 'bancos_sectoristas',
		'archivo'		=> 'bancos_sectoristas',
		'prefijo'		=> 'banc_sec',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Sectoristas',
		'me'			=> 'BANCOS_SECTORISTAS',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_grupo'		=>array(
						'campo'			=> 'id_grupo',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '0',
						'default'		=> '[id]',
						'foreig'		=> '1',
						'foreigkey'		=> 'BANCOS',
						'opciones'		=> 'id,nombre|bancos'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '150px',
						'style'			=> 'width:120px;',
						'derecha'		=> '1',
						'like'			=> '0',
						'tags'			=> '1',
						'queries'		=> '0',
						'dlquery'		=> '0'
				),
				'apellidos'		=>array(
						'campo'			=> 'apellidos',
						'label'			=> 'Apellidos',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '130px',
						'style'			=> 'width:150px;',
						'derecha'		=> '2',
						'like'			=> '0',
						'tags'			=> '1'
				),
				'dni'			=>array(
						'campo'			=> 'dni',
						'label'			=> 'DNI',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '1',
						'width'			=> '150px',
						'derecha'		=> '2',
						'default'		=> '',
						'like'			=> '1',
						'unique'		=> '0',
						'size'			=> '11',
						'onchange'		=> 'if(this.value.length<8){alert("minimo 8 caracteres");}'
				),
				'genero'		=>array(
						'campo'			=> 'genero',
						'label'			=> 'Género',
						'tipo'			=> 'com',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'Masculino',
								'2'			=> 'Femenino'
						),
						'default'		=> '1',
						'style'			=> 'width:45px;',
						'derecha'		=> '2',
						'width'			=> '30px'
				),
				'departamento'	=>array(
						'campo'			=> 'departamento',
						'label'			=> 'Departamento',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_departamentos',
						'load'			=> 'provincia||id,nombre|geo_provincias|where id_departamento=',
						'style'			=> 'width:150px;',
						'derecha'		=> '1'
				),
				'provincia'		=>array(
						'campo'			=> 'provincia',
						'label'			=> 'Provincia',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_provincias',
						'load'			=> 'distrito||id,nombre|geo_distritos|where id_provincia=',
						'style'			=> 'width:150px;',
						'derecha'		=> '2'
				),
				'distrito'		=>array(
						'campo'			=> 'distrito',
						'label'			=> 'Distrito',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_distritos',
						'style'			=> 'width:150px;',
						'derecha'		=> '2'
				),
				'direccion'		=>array(
						'campo'			=> 'direccion',
						'label'			=> 'Dirección',
						'tipo'			=> 'txt',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '150px',
						'style'			=> 'width:600px;height:40px;',
						'derecha'		=> '1'
				),
				'email'			=>array(
						'campo'			=> 'email',
						'label'			=> 'Email',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '150px',
						'style'			=> 'width:150px;',
						'derecha'		=> '1',
						'default'		=> '',
						'like'			=> '1',
						'unique'		=> '0'
				),
				'telefono'		=>array(
						'campo'			=> 'telefono',
						'label'			=> 'Teléfono',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				)
		),
		'grupo'			=> 'config',
		'edicion_completa'=> '0',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '1',
		'calificacion'	=> '0',
		'set_fila_fijo'	=> '4',
		'crear_quick'	=> '0',
		'disabled'		=> '0'
);
/******************************************************************************************************************************************************/

$objeto_tabla['BANCOS_CUENTAS']=array(
		'titulo'		=> 'Cuentas',
		'nombre_singular'=> 'cuenta',
		'nombre_plural'	=> 'cuentas',
		'tabla'			=> 'bancos_cuentas',
		'archivo'		=> 'bancos_cuentas',
		'prefijo'		=> 'bancue',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Cuentas',
		'me'			=> 'BANCOS_CUENTAS',
		'orden'			=> '1',
		'width_listado'	=> '600px',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1'
				),
				'id_banco'		=>array(
						'campo'			=> 'id_banco',
						'label'			=> 'Banco',
						'tipo'			=> 'hid',
						'validacion'	=> '0',
						'default'		=> '[id_banco]',
						'foreig'		=> '1',
						'style'			=> 'width:200px,',
						'opciones'		=> 'id,nombre|bancos',
						'width'			=> '95px',
						'derecha'		=> '1',
						'listable'		=> '1'
				),
				'moneda'		=>array(
						'campo'			=> 'moneda',
						'label'			=> 'Moneda',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'validacion'	=> '1',
						'opciones'		=>array(
								'soles'			=> 'soles',
								'dólares'		=> 'dólares'
						),
						'default'		=> '2',
						'style'			=> 'width:45px;',
						'derecha'		=> '2',
						'width'			=> '30px'
				),
				'cuenta'		=>array(
						'campo'			=> 'cuenta',
						'label'			=> 'Cta',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1'
				)
		),
		'grupo'			=> 'config',
		'edicion_completa'=> '0',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '1',
		'calificacion'	=> '0',
		'set_fila_fijo'	=> '4',
		'crear_quick'	=> '1',
		'disabled'		=> '0'
);
/******************************************************************************************************************************************************/

$objeto_tabla['TIPO_CAMBIO']=array(
		'titulo'		=> 'Tipo de cambio',
		'nombre_singular'=> 'tipo de cambio',
		'nombre_plural'	=> 'tipos de cambio',
		'tabla'			=> 'tipo_cambio',
		'archivo'		=> 'tipo_cambio',
		'prefijo'		=> 'tip',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Tipo de cambio',
		'me'			=> 'TIPO_CAMBIO',
		'orden'			=> '1',
		'width_listado'	=> '600px',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'periodo'		=>array(
						'campo'			=> 'periodo',
						'label'			=> 'Período',
						'tipo'			=> 'fch',
						'width'			=> '120px',
						'listable'		=> '1',
						'validacion'	=> '0',
						'formato'		=> '0a',
						'derecha'		=> '1',
						'rango'			=> '-2 years,now',
						'unique'		=> '1'
				),
				'compra'		=>array(
						'campo'			=> 'compra',
						'derecha'		=> '2',
						'label'			=> 'Compra',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'variable'		=> 'float',
						'validacion'	=> '0',
						'style'			=> 'width:40px;',
						'format'		=> 'currency'
				)
		),
		'grupo'			=> 'config',
		'edicion_completa'=> '0',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '1',
		'calificacion'	=> '0',
		'set_fila_fijo'	=> '4',
		'disabled'		=> '0',
		'order_by'		=> 'periodo desc',
		'crear_quick'	=> '1'
);
/******************************************************************************************************************************************************/

$objeto_tabla['CONTRATOS']=array(
		'titulo'		=> 'contratos',
		'nombre_singular'=> 'contrato',
		'nombre_plural'	=> 'contratos',
		'tabla'			=> 'contratos',
		'archivo'		=> 'contratos',
		'prefijo'		=> 'cont',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '0',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Contratos',
		'me'			=> 'CONTRATOS',
		'orden'			=> '1',
		'width_listado'	=> '600px',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '300px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'setup'			=> 'contrato_venta,contrato_anexo2',
						'constante'		=> '1'
				),
				'file'			=>array(
						'campo'			=> 'file',
						'label'			=> 'File',
						'tipo'			=> 'sto',
						'width'			=> '200px',
						'style'			=> 'width:200px;',
						'listable'		=> '1',
						'validacion'	=> '0',
						'prefijo'		=> 'contr',
						'carpeta'		=> 'ctr_doc',
						'name'			=> 'nombre',
						'enlace'		=> 'down'
				)
		),
		'grupo'			=> 'config',
		'edicion_completa'=> '1',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '0',
		'calificacion'	=> '0',
		'set_fila_fijo'	=> '4',
		'crear_quick'	=> '0',
		'disabled'		=> '0',
		'seccion'		=> 'contratos'
);
/******************************************************************************************************************************************************/

$objeto_tabla['VENTAS_CUENTAS']=array(
		'grupo'			=> 'config',
		'titulo'		=> 'Cuentas para envio de pedidos',
		'nombre_singular'=> 'cuenta',
		'nombre_plural'	=> 'cuentas',
		'tabla'			=> 'ventas_cuentas',
		'archivo'		=> 'ventas_cuentas',
		'prefijo'		=> 'vencue',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'buscar'		=> '0',
		'menu'			=> '0',
		'menu_label'	=> 'Cuentas',
		'me'			=> 'VENTAS_CUENTAS',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0'
				),
				'email'			=>array(
						'campo'			=> 'email',
						'label'			=> 'Email',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0'
				),
				'password'		=>array(
						'campo'			=> 'password',
						'label'			=> 'Password',
						'tipo'			=> 'pas',
						'listable'		=> '1',
						'validacion'	=> '1'
				),
				'relays'		=>array(
						'campo'			=> 'relays',
						'label'			=> 'Relays',
						'tipo'			=> 'inp',
						'variable'		=> 'float',
						'size'			=> '10',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '30px'
				),
				'enabled'		=>array(
						'campo'			=> 'enabled',
						'label'			=> 'Enabled',
						'tipo'			=> 'com',
						'radio'			=> '1',
						'listable'		=> '1',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'si',
								'0'			=> 'no'
						),
						'width'			=> '30px'
				),
				'time_0'		=>array(
						'campo'			=> 'time_0',
						'label'			=> 'Tiempo Cero',
						'tipo'			=> 'fch',
						'width'			=> '50px',
						'listable'		=> '1',
						'validacion'	=> '1',
						'constante'		=> '1',
						'formato'		=> '7'
				)
		),
		'disabled'		=> '1'
);
/******************************************************************************************************************************************************/

$objeto_tabla['PRODUCTOS_STOCK_STATUS']=array(
		'titulo'		=> 'Inmuebles Status',
		'nombre_singular'=> 'status',
		'nombre_plural'	=> 'status',
		'tabla'			=> 'productos_stock_status',
		'archivo'		=> 'productos_stock_status',
		'prefijo'		=> 'prostosta',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Inmuebles Status',
		'me'			=> 'PRODUCTOS_STOCK_STATUS',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1'
				),
				'color'			=>array(
						'campo'			=> 'color',
						'label'			=> 'Color',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1'
				)
		),
		'grupo'			=> 'config',
		'edicion_completa'=> '0',
		'expandir_vertical'=> '0',
		'calificacion'	=> '0',
		'edicion_rapida'	=> '1',
		'width_listado'	=> '600px',
		'set_fila_fijo'	=> '4',
		'crear_quick'	=> '1',
		'disabled'		=> '0',
		'seccion'		=> 'producto'
);
/******************************************************************************************************************************************************/

$objeto_tabla['VENTAS_STATUS']=array(
		'titulo'		=> 'Status Atenciones',
		'nombre_singular'=> 'status',
		'nombre_plural'	=> 'status',
		'tabla'			=> 'ventas_status',
		'archivo'		=> 'ventas_status',
		'prefijo'		=> 'vensta',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Status Atenciones',
		'me'			=> 'VENTAS_STATUS',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1'
				)
		),
		'grupo'			=> 'config',
		'edicion_completa'=> '0',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '1',
		'calificacion'	=> '1',
		'width_listado'	=> '300px',
		'set_fila_fijo'	=> '4',
		'crear_quick'	=> '1',
		'order_by'		=> 'calificacion asc',
		'seccion'		=> 'atenciones'
);
/******************************************************************************************************************************************************/

$objeto_tabla['CLIENTES_STATUS']=array(
		'titulo'		=> 'Status Clientes',
		'nombre_singular'=> 'status',
		'nombre_plural'	=> 'status',
		'tabla'			=> 'clientes_status',
		'archivo'		=> 'clientes_status',
		'prefijo'		=> 'clista',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Status Clientes',
		'me'			=> 'CLIENTES_STATUS',
		'orden'			=> '1',
		'width_listado'	=> '300px',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1'
				)
		),
		'grupo'			=> 'config',
		'edicion_completa'=> '0',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '1',
		'calificacion'	=> '1',
		'set_fila_fijo'	=> '4',
		'crear_quick'	=> '1',
		'disabled'		=> '0'
);
/******************************************************************************************************************************************************/

$objeto_tabla['ENVIOS_CUENTAS']=array(
		'grupo'			=> 'config',
		'titulo'		=> 'Cuentas para envios',
		'nombre_singular'=> 'cuenta',
		'nombre_plural'	=> 'cuentas',
		'tabla'			=> 'envios_cuentas',
		'archivo'		=> 'envios_cuentas',
		'prefijo'		=> 'envcue',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'buscar'		=> '0',
		'menu'			=> '0',
		'menu_label'	=> 'Cuentas para envios',
		'me'			=> 'ENVIOS_CUENTAS',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '100px'
				),
				'email'			=>array(
						'campo'			=> 'email',
						'label'			=> 'Email',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '200px'
				),
				'password'		=>array(
						'campo'			=> 'password',
						'label'			=> 'Password',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0'
				),
				'server'		=>array(
						'campo'			=> 'server',
						'label'			=> 'Server',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0'
				),
				'port'			=>array(
						'campo'			=> 'port',
						'label'			=> 'PORT',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '100px'
				),
				'logo'			=>array(
						'campo'			=> 'logo',
						'label'			=> 'Logo',
						'tipo'			=> 'sto',
						'width'			=> '150px',
						'style'			=> 'width:200px;',
						'listable'		=> '1',
						'validacion'	=> '0',
						'prefijo'		=> 'log',
						'carpeta'		=> 'log_imas'
				),
				'dominio'		=>array(
						'campo'			=> 'dominio',
						'label'			=> 'Dominio',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '200px'
				)
		),
		'seccion'		=> '',
		'edicion_rapida'	=> '1',
		'edicion_completa'=> '1',
		'disabled'		=> '1'
);
/******************************************************************************************************************************************************/

$objeto_tabla['CLIENTE_EDADES']=array(
		'titulo'		=> 'Rango de Edades',
		'nombre_singular'=> 'rango',
		'nombre_plural'	=> 'rangos',
		'tabla'			=> 'cliente_edades',
		'archivo'		=> 'cliente_edades',
		'prefijo'		=> 'clieda',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Rango de Edades',
		'me'			=> 'CLIENTE_EDADES',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Rango',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1'
				)
		),
		'grupo'			=> 'config',
		'edicion_completa'=> '0',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '1',
		'calificacion'	=> '1',
		'width_listado'	=> '300px',
		'set_fila_fijo'	=> '4',
		'crear_quick'	=> '1',
		'order_by'		=> 'id asc'
);
/******************************************************************************************************************************************************/

$objeto_tabla['VENTAS_NIVELES']=array(
		'titulo'		=> 'Niveles de interés',
		'nombre_singular'=> 'status',
		'nombre_plural'	=> 'status',
		'tabla'			=> 'ventas_niveles',
		'archivo'		=> 'ventas_niveles',
		'prefijo'		=> 'vensta',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Niveles de interés',
		'me'			=> 'VENTAS_NIVELES',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1'
				)
		),
		'grupo'			=> 'config',
		'edicion_completa'=> '0',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '1',
		'calificacion'	=> '1',
		'width_listado'	=> '300px',
		'set_fila_fijo'	=> '4',
		'crear_quick'	=> '1',
		'order_by'		=> 'calificacion asc'
);
/******************************************************************************************************************************************************/

$objeto_tabla['VENTAS_ALERTAS']=array(
		'grupo'			=> 'config',
		'alias_grupo'	=> '',
		'titulo'		=> 'Alertas',
		'nombre_singular'=> 'alerta',
		'nombre_plural'	=> 'alertas',
		'tabla'			=> 'ventas_alertas',
		'archivo'		=> 'ventas_alertas',
		'prefijo'		=> 'venale',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'buscar'		=> '1',
		'bloqueado'		=> '0',
		'crear'			=> '1',
		'crear_label'	=> '50px',
		'crear_txt'		=> '550px',
		'menu'			=> '0',
		'menu_label'	=> 'Alertas',
		'por_pagina'	=> '20',
		'me'			=> 'VENTAS_ALERTAS',
		'orden'			=> '1',
		'onedit'		=> 'base2/update_alertas.php',
		'oncreate'		=> 'base2/update_alertas.php',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr',
						'formato'		=> '7',
						'width'			=> '120px'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_grupo'		=>array(
						'campo'			=> 'id_grupo',
						'tipo'			=> 'hid',
						'listable'		=> '0',
						'validacion'	=> '0',
						'default'		=> '[id]',
						'foreig'		=> '1',
						'foreig_parent'	=> 'ventas_items|where id=[id]'
				),
				'alerta_fecha'	=>array(
						'campo'			=> 'alerta_fecha',
						'label'			=> '',
						'tipo'			=> 'fch',
						'listable'		=> '1',
						'formato'		=> '7',
						'time'			=> '1',
						'width'			=> '140px',
						'derecha'		=> '1',
						'default'		=> 'tomorrow()',
						'rango'			=> 'now,+2 years'
				),
				'texto'			=>array(
						'campo'			=> 'texto',
						'label'			=> 'Mensaje',
						'tipo'			=> 'txt',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '400px',
						'style'			=> 'width:350px;height:70px;',
						'listhtml'		=> '1'
				),
				'estado'		=>array(
						'campo'			=> 'estado',
						'label'			=> 'Estado',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'indicador'		=> '1',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'pendiente|navy',
								'2'			=> 'para hoy|orange',
								'3'			=> 'atrazado|red',
								'4'			=> 'cumplido|green'
						),
						'default'		=> '1',
						'style'			=> 'width:150px;',
						'width'			=> '100px'
				),
				'cumplido'		=>array(
						'campo'			=> 'cumplido',
						'label'			=> 'Cumplido',
						'radio'			=> '1',
						'tipo'			=> 'com',
						'opciones'		=>array(
								'1'			=> 'si',
								'0'			=> 'no'
						),
						'default'		=> '0',
						'style'			=> 'width:150px;',
						'width'			=> '0px'
				)
		),
		'edicion_rapida'	=> '1',
		'calificacion'	=> '0',
		'edicion_completa'=> '1',
		'disabled'		=> '0',
		'crear_quick'	=> '1',
		'seccion'		=> ''
);
/******************************************************************************************************************************************************/

$objeto_tabla['MENSAJES_STATUS']=array(
		'titulo'		=> 'Status Actividades',
		'nombre_singular'=> 'status',
		'nombre_plural'	=> 'status',
		'tabla'			=> 'mensajes_status',
		'archivo'		=> 'mensajes_status',
		'prefijo'		=> 'mensta',
		'eliminar'		=> '0',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Status Actividades',
		'me'			=> 'MENSAJES_STATUS',
		'orden'			=> '1',
		'width_listado'	=> '300px',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1'
				)
		),
		'grupo'			=> 'config',
		'edicion_completa'=> '0',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '1',
		'calificacion'	=> '0',
		'set_fila_fijo'	=> '4',
		'crear_quick'	=> '0',
		'disabled'		=> '0',
		'seccion'		=> ''
);
/******************************************************************************************************************************************************/

$objeto_tabla['MENSAJES_ALERTAS']=array(
		'titulo'		=> 'Alertas Actividades',
		'nombre_singular'=> 'alerta',
		'nombre_plural'	=> 'alertas',
		'tabla'			=> 'mensajes_alertas',
		'archivo'		=> 'mensajes_alertas',
		'prefijo'		=> 'menale',
		'eliminar'		=> '0',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Alertas Actividades',
		'me'			=> 'MENSAJES_ALERTAS',
		'orden'			=> '1',
		'width_listado'	=> '300px',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1'
				)
		),
		'grupo'			=> 'config',
		'edicion_completa'=> '0',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '0',
		'calificacion'	=> '0',
		'set_fila_fijo'	=> '4',
		'crear_quick'	=> '1',
		'disabled'		=> '0'
);
/******************************************************************************************************************************************************/

$objeto_tabla['PRODUCTOS_PTOVENTA']=array(
		'titulo'		=> 'Puntos de Venta',
		'nombre_singular'=> 'punto de venta',
		'nombre_plural'	=> 'puntos de venta',
		'tabla'			=> 'productos_ptoventa',
		'archivo'		=> 'productos_ptoventa',
		'prefijo'		=> 'propto',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Puntos de Venta',
		'me'			=> 'PRODUCTOS_PTOVENTA',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1'
				),
				'direccion'		=>array(
						'campo'			=> 'direccion',
						'label'			=> 'Dirección',
						'tipo'			=> 'txt',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '400px',
						'style'			=> 'width:400px;',
						'derecha'		=> '1'
				)
		),
		'grupo'			=> 'config',
		'edicion_completa'=> '1',
		'expandir_vertical'=> '0',
		'calificacion'	=> '0',
		'edicion_rapida'	=> '0',
		'disabled'		=> '0',
		'seccion'		=> 'canales'
);
/******************************************************************************************************************************************************/

$objeto_tabla['CONTACTO_CANALES']=array(
		'titulo'		=> 'Código de Publicidad',
		'nombre_singular'=> 'código',
		'nombre_plural'	=> 'códigos',
		'tabla'			=> 'contacto_canales',
		'archivo'		=> 'contacto_canales',
		'prefijo'		=> 'cancon',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Código de Publicidad',
		'me'			=> 'CONTACTO_CANALES',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1'
				)
		),
		'grupo'			=> 'config',
		'edicion_completa'=> '0',
		'expandir_vertical'=> '0',
		'calificacion'	=> '0',
		'edicion_rapida'	=> '1',
		'width_listado'	=> '300px',
		'set_fila_fijo'	=> '4',
		'crear_quick'	=> '1'
);
/******************************************************************************************************************************************************/

$objeto_tabla['GEO_DEPARTAMENTOS']=array(
		'titulo'		=> 'Departamentos',
		'nombre_singular'=> 'departamento',
		'nombre_plural'	=> 'departamentos',
		'tabla'			=> 'geo_departamentos',
		'archivo'		=> 'geo_departamentos',
		'archivo_hijo'	=> 'geo_provincias',
		'prefijo'		=> 'geodep',
		'eliminar'		=> '0',
		'editar'		=> '0',
		'crear'			=> '0',
		'visibilidad'	=> '1',
		'altura_listado'	=> 'auto',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Departamentos',
		'por_pagina'	=> '100',
		'me'			=> 'GEO_DEPARTAMENTOS',
		'orden'			=> '0',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Departamento',
						'width'			=> '150px',
						'unique'		=> '1',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'controles'		=> '<a href="custom/geo_provincias.php?id=[id]">{select count(*) from geo_provincias where id_departamento=[id]} provincias</a>'
				),
				'geo'			=>array(
						'campo'			=> 'geo',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'disabled'		=> '1'
				)
		),
		'grupo'			=> 'config',
		'width_listado'	=> '400px',
		'set_fila_fijo'	=> '4',
		'edicion_rapida'	=> '0',
		'edicion_completa'=> '0',
		'seccion'		=> 'ubigeo'
);
/******************************************************************************************************************************************************/

$objeto_tabla['GEO_PROVINCIA']=array(
		'titulo'		=> '<a href="custom/geo_departamentos.php">Departamentos del Perú</a>  -
                      Provincias de {select nombre from geo_departamentos where id=[id]}',
		'nombre_singular'=> 'provincia',
		'nombre_plural'	=> 'provincias',
		'tabla'			=> 'geo_provincias',
		'archivo'		=> 'geo_provincias',
		'archivo_hijo'	=> 'geo_distritos',
		'prefijo'		=> 'geodis',
		'eliminar'		=> '0',
		'editar'		=> '0',
		'crear'			=> '0',
		'crear_label'	=> '200px',
		'crear_txt'		=> '400px',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '1',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '0',
		'menu_label'	=> '',
		'por_pagina'	=> '100',
		'me'			=> 'GEO_PROVINCIA',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'unique'		=> '1',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '150px',
						'controles'		=> '<a href="custom/geo_distritos.php?id=[id]">{select count(*) from geo_distritos where id_provincia=[id]} distritos</a>'
				),
				'id_departamento'=>array(
						'campo'			=> 'id_departamento',
						'tipo'			=> 'hid',
						'listable'		=> '0',
						'validacion'	=> '0',
						'foreig'		=> '1',
						'default'		=> '[id]'
				),
				'geo'			=>array(
						'campo'			=> 'geo',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'disabled'		=> '1'
				)
		),
		'grupo'			=> 'config',
		'edicion_rapida'	=> '0',
		'set_fila_fijo'	=> '1',
		'width_listado'	=> '400px'
);
/******************************************************************************************************************************************************/

$objeto_tabla['GEO_DISTRITOS']=array(
		'titulo'		=> '<a href="custom/geo_departamentos.php">Departamentos del Perú</a>
                          - <a href="custom/geo_provincias.php?id={select id_departamento from geo_provincias where id=[id]}">Provincias de {select geo_departamentos.nombre from geo_departamentos,geo_provincias where geo_departamentos.id=geo_provincias.id_departamento and geo_provincias.id=[id]}</a>
                          - Distritos de {select nombre from geo_provincias where id=[id]}',
		'nombre_singular'=> 'distrito',
		'nombre_plural'	=> 'distritos',
		'tabla'			=> 'geo_distritos',
		'archivo'		=> 'geo_distritos',
		'prefijo'		=> 'geodis',
		'eliminar'		=> '0',
		'editar'		=> '0',
		'crear'			=> '0',
		'crear_label'	=> '200px',
		'crear_txt'		=> '400px',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '1',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '0',
		'menu_label'	=> '',
		'por_pagina'	=> '100',
		'me'			=> 'GEO_DISTRITOS',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'id_provincia'	=>array(
						'campo'			=> 'id_provincia',
						'tipo'			=> 'hid',
						'listable'		=> '0',
						'validacion'	=> '0',
						'default'		=> '[id]',
						'foreig'		=> '1'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'unique'		=> '1',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '150px'
				),
				'geo'			=>array(
						'campo'			=> 'geo',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'disabled'		=> '1'
				)
		),
		'grupo'			=> 'config',
		'width_listado'	=> '400px',
		'set_fila_fijo'	=> '1',
		'edicion_rapida'	=> '0',
		'edicion_completa'=> '0'
);
/******************************************************************************************************************************************************/

$objeto_tabla['SUPER_ADMINISTRADORES']=array(
		'titulo'		=> 'Super Administradores',
		'nombre_singular'=> 'administrador',
		'nombre_plural'	=> 'administrafores',
		'tabla'			=> 'super_administradores',
		'archivo'		=> 'super_administradores',
		'prefijo'		=> 'supadm',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Super Administradores',
		'me'			=> 'SUPER_ADMINISTRADORES',
		'orden'			=> '1',
		'width_listado'	=> '800px',
		'archivo_sub'	=> 'usuarios_acceso',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'derecha'		=> '1'
				),
				'telefono'		=>array(
						'campo'			=> 'telefono',
						'label'			=> 'Teléfono',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '1'
				),
				'email'			=>array(
						'campo'			=> 'email',
						'label'			=> 'Email',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '150px',
						'style'			=> 'width:150px;',
						'derecha'		=> '1',
						'default'		=> '',
						'like'			=> '1',
						'unique'		=> '1'
				),
				'usuarios_acceso_nombre'=>array(
						'legend'		=> 'Datos de Acceso',
						'campo'			=> 'usuarios_acceso_nombre',
						'label'			=> 'Usuario',
						'tipo'			=> 'inp',
						'unique'		=> '1',
						'validacion'	=> '1',
						'sync'			=> 'usuarios_acceso,nombre,[usuarios_acceso_nombre],id,[id_sesion]',
						'listable'		=> '1',
						'style'			=> 'width:150px;',
						'width'			=> '150px'
				),
				'usuarios_acceso_password'=>array(
						'campo'			=> 'usuarios_acceso_password',
						'label'			=> 'Password',
						'tipo'			=> 'pas',
						'validacion'	=> '1',
						'sync'			=> 'usuarios_acceso,password,[usuarios_acceso_password],id,[id_sesion]',
						'listable'		=> '1',
						'style'			=> 'width:150px;',
						'width'			=> '150px'
				),
				'usuarios_acceso_id_permisos'=>array(
						'campo'			=> 'usuarios_acceso_id_permisos',
						'tipo'			=> 'inp',
						'sync'			=> 'usuarios_acceso,id_permisos,[usuarios_acceso_id_permisos],id,[id_sesion]',
						'default'		=> '12',
						'indicador'		=> '1'
				),
				'id_sesion'		=>array(
						'campo'			=> 'id_sesion',
						'label'			=> 'usuario sessión',
						'width'			=> '120px',
						'tipo'			=> 'hid',
						'listable'		=> '0',
						'opciones'		=> 'id,nombre|usuarios_acceso',
						'biunivoca'		=> '1',
						'subform'		=> '1',
						'unique'		=> '1',
						'indicador'		=> '1'
				)
		),
		'grupo'			=> 'usuarios',
		'edicion_completa'=> '0',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '1',
		'calificacion'	=> '0',
		'set_fila_fijo'	=> '4',
		'crear_quick'	=> '1',
		'disabled'		=> '0',
		'seccion'		=> 'administradores'
);
/******************************************************************************************************************************************************/

$objeto_tabla['ADMINISTRADORES_GENERALES']=array(
		'titulo'		=> 'Administradores Generales',
		'nombre_singular'=> 'administrador general',
		'nombre_plural'	=> 'administradores generales',
		'tabla'			=> 'administradores_generales',
		'archivo'		=> 'administradores_generales',
		'prefijo'		=> 'admgen',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Administradores Generales',
		'me'			=> 'ADMINISTRADORES_GENERALES',
		'orden'			=> '1',
		'width_listado'	=> '800px',
		'archivo_sub'	=> 'usuarios_acceso',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'derecha'		=> '1'
				),
				'telefono'		=>array(
						'campo'			=> 'telefono',
						'label'			=> 'Teléfono',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '1'
				),
				'email'			=>array(
						'campo'			=> 'email',
						'label'			=> 'Email',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '150px',
						'style'			=> 'width:150px;',
						'derecha'		=> '1',
						'default'		=> '',
						'like'			=> '1',
						'unique'		=> '1'
				),
				'usuarios_acceso_nombre'=>array(
						'legend'		=> 'Datos de Acceso',
						'campo'			=> 'usuarios_acceso_nombre',
						'label'			=> 'Usuario',
						'tipo'			=> 'inp',
						'unique'		=> '1',
						'validacion'	=> '1',
						'sync'			=> 'usuarios_acceso,nombre,[usuarios_acceso_nombre],id,[id_sesion]',
						'listable'		=> '1',
						'style'			=> 'width:150px;',
						'width'			=> '150px'
				),
				'usuarios_acceso_password'=>array(
						'campo'			=> 'usuarios_acceso_password',
						'label'			=> 'Password',
						'tipo'			=> 'pas',
						'validacion'	=> '1',
						'sync'			=> 'usuarios_acceso,password,[usuarios_acceso_password],id,[id_sesion]',
						'listable'		=> '1',
						'style'			=> 'width:150px;',
						'width'			=> '150px'
				),
				'usuarios_acceso_id_permisos'=>array(
						'campo'			=> 'usuarios_acceso_id_permisos',
						'tipo'			=> 'inp',
						'sync'			=> 'usuarios_acceso,id_permisos,[usuarios_acceso_id_permisos],id,[id_sesion]',
						'default'		=> '10',
						'indicador'		=> '1'
				),
				'id_sesion'		=>array(
						'campo'			=> 'id_sesion',
						'label'			=> 'usuario sessión',
						'width'			=> '120px',
						'tipo'			=> 'hid',
						'listable'		=> '0',
						'opciones'		=> 'id,nombre|usuarios_acceso',
						'biunivoca'		=> '1',
						'subform'		=> '1',
						'unique'		=> '1',
						'indicador'		=> '1'
				)
		),
		'grupo'			=> 'usuarios',
		'edicion_completa'=> '0',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '1',
		'calificacion'	=> '0',
		'set_fila_fijo'	=> '4',
		'crear_quick'	=> '1',
		'disabled'		=> '0'
);
/******************************************************************************************************************************************************/

$objeto_tabla['ADMINISTRADORES_VENTAS']=array(
		'titulo'		=> 'Administradores Ventas',
		'nombre_singular'=> 'administrador venta',
		'nombre_plural'	=> 'administradores ventas',
		'tabla'			=> 'administradores_ventas',
		'archivo'		=> 'administradores_ventas',
		'prefijo'		=> 'admven',
		'eliminar'		=> '1',
		'editar'		=> '1',
		'crear'			=> '1',
		'altura_listado'	=> 'auto',
		'visibilidad'	=> '0',
		'buscar'		=> '0',
		'bloqueado'		=> '0',
		'menu'			=> '1',
		'menu_label'	=> 'Administradores Ventas',
		'me'			=> 'ADMINISTRADORES_VENTAS',
		'orden'			=> '1',
		'width_listado'	=> '800px',
		'archivo_sub'	=> 'usuarios_acceso',
		'seccion'		=> 'ventas',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'width'			=> '150px',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'derecha'		=> '1'
				),
				'telefono'		=>array(
						'campo'			=> 'telefono',
						'label'			=> 'Teléfono',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '1'
				),
				'email'			=>array(
						'campo'			=> 'email',
						'label'			=> 'Email',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '1',
						'width'			=> '150px',
						'style'			=> 'width:150px;',
						'derecha'		=> '1',
						'default'		=> '',
						'like'			=> '1',
						'unique'		=> '1'
				),
				'usuarios_acceso_nombre'=>array(
						'legend'		=> 'Datos de Acceso',
						'campo'			=> 'usuarios_acceso_nombre',
						'label'			=> 'Usuario',
						'tipo'			=> 'inp',
						'unique'		=> '1',
						'validacion'	=> '1',
						'sync'			=> 'usuarios_acceso,nombre,[usuarios_acceso_nombre],id,[id_sesion]',
						'listable'		=> '1',
						'style'			=> 'width:150px;',
						'width'			=> '150px'
				),
				'usuarios_acceso_password'=>array(
						'campo'			=> 'usuarios_acceso_password',
						'label'			=> 'Password',
						'tipo'			=> 'pas',
						'validacion'	=> '1',
						'sync'			=> 'usuarios_acceso,password,[usuarios_acceso_password],id,[id_sesion]',
						'listable'		=> '1',
						'style'			=> 'width:150px;',
						'width'			=> '150px'
				),
				'usuarios_acceso_id_permisos'=>array(
						'campo'			=> 'usuarios_acceso_id_permisos',
						'tipo'			=> 'inp',
						'sync'			=> 'usuarios_acceso,id_permisos,[usuarios_acceso_id_permisos],id,[id_sesion]',
						'default'		=> '11',
						'indicador'		=> '1'
				),
				'id_sesion'		=>array(
						'campo'			=> 'id_sesion',
						'label'			=> 'usuario sessión',
						'width'			=> '120px',
						'tipo'			=> 'hid',
						'listable'		=> '0',
						'opciones'		=> 'id,nombre|usuarios_acceso',
						'biunivoca'		=> '1',
						'subform'		=> '1',
						'unique'		=> '1',
						'indicador'		=> '1'
				)
		),
		'grupo'			=> 'usuarios',
		'edicion_completa'=> '0',
		'expandir_vertical'=> '0',
		'edicion_rapida'	=> '1',
		'calificacion'	=> '0',
		'set_fila_fijo'	=> '4',
		'crear_quick'	=> '1',
		'disabled'		=> '0'
);
/******************************************************************************************************************************************************/

$objeto_tabla['USUARIOS']=array(
		'grupo'			=> 'usuarios',
		'alias_grupo'	=> '',
		'titulo'		=> 'Asesores',
		'nombre_singular'=> 'asesor',
		'nombre_plural'	=> 'asesores',
		'tabla'			=> 'usuarios',
		'archivo'		=> 'usuarios',
		'prefijo'		=> 'usuope',
		'eliminar'		=> '1',
		'archivo_sub'	=> 'usuarios_acceso',
		'editar'		=> '1',
		'buscar'		=> '1',
		'menu'			=> '1',
		'menu_label'	=> 'Asesores',
		'me'			=> 'USUARIOS',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'id_jefe'		=>array(
						'campo'			=> 'id_jefe',
						'label'			=> 'Jefe de Comerciales',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'validacion'	=> '1',
						'default'		=> '[id_jefe]',
						'foreig'		=> '1',
						'style'			=> 'width:160px,',
						'opciones'		=> 'id,nombre;apellidos|usuarios2',
						'width'			=> '120px',
						'derecha'		=> '1',
						'tip_foreig'	=> '1',
						'queries'		=> '1'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '150px',
						'derecha'		=> '1',
						'like'			=> '1',
						'validacion'	=> '1'
				),
				'apellidos'		=>array(
						'campo'			=> 'apellidos',
						'label'			=> 'Apellidos',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '150px',
						'derecha'		=> '2',
						'like'			=> '1',
						'validacion'	=> '1'
				),
				'genero'		=>array(
						'campo'			=> 'genero',
						'label'			=> 'Género',
						'tipo'			=> 'com',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'Masculino',
								'2'			=> 'Femenino'
						),
						'default'		=> '1',
						'style'			=> 'width:45px;',
						'derecha'		=> '2',
						'width'			=> '30px'
				),
				'email'			=>array(
						'campo'			=> 'email',
						'label'			=> 'Email',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '150px',
						'derecha'		=> '2',
						'validacion'	=> '1'
				),
				'departamento'	=>array(
						'campo'			=> 'departamento',
						'label'			=> 'Departamento',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_departamentos',
						'load'			=> 'provincia||id,nombre|geo_provincias|where id_departamento=',
						'style'			=> 'width:150px;',
						'derecha'		=> '1'
				),
				'provincia'		=>array(
						'campo'			=> 'provincia',
						'label'			=> 'Provincia',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_provincias',
						'load'			=> 'distrito||id,nombre|geo_distritos|where id_provincia=',
						'style'			=> 'width:150px;',
						'derecha'		=> '2'
				),
				'distrito'		=>array(
						'campo'			=> 'distrito',
						'label'			=> 'Distrito',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_distritos',
						'style'			=> 'width:150px;',
						'derecha'		=> '2'
				),
				'direccion'		=>array(
						'campo'			=> 'direccion',
						'label'			=> 'Dirección casa',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '120px',
						'style'			=> 'width:250px;',
						'derecha'		=> '1'
				),
				'id_ptoventa'	=>array(
						'campo'			=> 'id_ptoventa',
						'label'			=> 'Pto de venta',
						'width'			=> '90px',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'opciones'		=> 'id,nombre|productos_ptoventa'
				),
				'telefono'		=>array(
						'campo'			=> 'telefono',
						'label'			=> 'Teléfono Casa',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '60px',
						'style'			=> 'width:70px;',
						'derecha'		=> '1'
				),
				'telefono_oficina'=>array(
						'campo'			=> 'telefono_oficina',
						'label'			=> 'Teléfono Oficina / Sucursal',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '60px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'celular_claro'	=>array(
						'campo'			=> 'celular_claro',
						'label'			=> 'Claro',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '60px',
						'style'			=> 'width:70px;',
						'derecha'		=> '1'
				),
				'celular_movistar'=>array(
						'campo'			=> 'celular_movistar',
						'label'			=> 'Movistar',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '60px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'nextel'		=>array(
						'campo'			=> 'nextel',
						'label'			=> 'Entel',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '60px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'rpm'			=>array(
						'campo'			=> 'rpm',
						'label'			=> 'RPM',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'rpc'			=>array(
						'campo'			=> 'rpc',
						'label'			=> 'RPC',
						'tipo'			=> 'inp',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '70px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'firma'			=>array(
						'campo'			=> 'firma',
						'label'			=> 'Firma',
						'tipo'			=> 'html',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '500px',
						'style'			=> 'height:200px;width:450px;'
				),
				'status'		=>array(
						'campo'			=> 'status',
						'label'			=> 'Status',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'Activo',
								'2'			=> 'Cesado'
						),
						'default'		=> '1',
						'style'			=> 'width:60px;',
						'derecha'		=> '1',
						'width'			=> '30px',
						'queries'		=> '1'
				),
				'usuarios_acceso_nombre'=>array(
						'legend'		=> 'Datos de Acceso',
						'campo'			=> 'usuarios_acceso_nombre',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'unique'		=> '1',
						'validacion'	=> '1',
						'sync'			=> 'usuarios_acceso,nombre,[usuarios_acceso_nombre],id,[id_sesion]',
						'listable'		=> '1'
				),
				'usuarios_acceso_password'=>array(
						'campo'			=> 'usuarios_acceso_password',
						'label'			=> 'Password',
						'tipo'			=> 'pas',
						'validacion'	=> '1',
						'sync'			=> 'usuarios_acceso,password,[usuarios_acceso_password],id,[id_sesion]',
						'listable'		=> '1'
				),
				'usuarios_acceso_id_permisos'=>array(
						'campo'			=> 'usuarios_acceso_id_permisos',
						'tipo'			=> 'inp',
						'sync'			=> 'usuarios_acceso,id_permisos,[usuarios_acceso_id_permisos],id,[id_sesion]',
						'default'		=> '3',
						'indicador'		=> '1'
				),
				'id_sesion'		=>array(
						'campo'			=> 'id_sesion',
						'label'			=> 'usuario sessión',
						'width'			=> '120px',
						'tipo'			=> 'hid',
						'listable'		=> '0',
						'opciones'		=> 'id,nombre|usuarios_acceso',
						'biunivoca'		=> '1',
						'subform'		=> '1',
						'unique'		=> '1',
						'indicador'		=> '1'
				)
		),
		'importar_csv'	=> '0',
		'disabled'		=> '0',
		'edicion_rapida'	=> '1',
		'crear_label'	=> '',
		'group'			=> 'id_jefe'
);
/******************************************************************************************************************************************************/

$objeto_tabla['USUARIOS2']=array(
		'grupo'			=> 'usuarios',
		'alias_grupo'	=> '',
		'titulo'		=> 'Jefes Comerciales',
		'nombre_singular'=> 'jefe comerciales',
		'nombre_plural'	=> 'jefes comercial',
		'tabla'			=> 'usuarios2',
		'archivo'		=> 'usuarios2',
		'prefijo'		=> 'usuope2',
		'eliminar'		=> '1',
		'archivo_sub'	=> 'usuarios_acceso',
		'editar'		=> '1',
		'buscar'		=> '1',
		'menu'			=> '1',
		'menu_label'	=> 'Jefes Comerciales',
		'me'			=> 'USUARIOS2',
		'orden'			=> '1',
		'campos'		=>array(
				'id'			=>array(
						'campo'			=> 'id',
						'tipo'			=> 'id'
				),
				'fecha_creacion'	=>array(
						'campo'			=> 'fecha_creacion',
						'tipo'			=> 'fcr'
				),
				'fecha_edicion'	=>array(
						'campo'			=> 'fecha_edicion',
						'tipo'			=> 'fed'
				),
				'posicion'		=>array(
						'campo'			=> 'posicion',
						'tipo'			=> 'pos'
				),
				'visibilidad'	=>array(
						'campo'			=> 'visibilidad',
						'tipo'			=> 'vis'
				),
				'calificacion'	=>array(
						'campo'			=> 'calificacion',
						'tipo'			=> 'cal'
				),
				'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '100px',
						'derecha'		=> '1',
						'controles'		=> '<a rel="subs" href="custom/usuarios.php?id=[id]">{select count(*) from usuarios where id_jefe=[id]} fotos</a>
',
						'like'			=> '1',
						'validacion'	=> '1'
				),
				'apellidos'		=>array(
						'campo'			=> 'apellidos',
						'label'			=> 'Apellidos',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'width'			=> '80px',
						'derecha'		=> '2',
						'like'			=> '1',
						'validacion'	=> '1'
				),
				'genero'		=>array(
						'campo'			=> 'genero',
						'label'			=> 'Género',
						'tipo'			=> 'com',
						'listable'		=> '1',
						'validacion'	=> '0',
						'opciones'		=>array(
								'1'			=> 'Masculino',
								'2'			=> 'Femenino'
						),
						'default'		=> '1',
						'style'			=> 'width:45px;',
						'derecha'		=> '2',
						'width'			=> '30px'
				),
				'email'			=>array(
						'campo'			=> 'email',
						'label'			=> 'Email',
						'tipo'			=> 'inp',
						'listable'		=> '2',
						'width'			=> '150px',
						'derecha'		=> '2',
						'validacion'	=> '1'
				),
				'departamento'	=>array(
						'campo'			=> 'departamento',
						'label'			=> 'Departamento',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_departamentos',
						'load'			=> 'provincia||id,nombre|geo_provincias|where id_departamento=',
						'style'			=> 'width:150px;',
						'derecha'		=> '1'
				),
				'provincia'		=>array(
						'campo'			=> 'provincia',
						'label'			=> 'Provincia',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_provincias',
						'load'			=> 'distrito||id,nombre|geo_distritos|where id_provincia=',
						'style'			=> 'width:150px;',
						'derecha'		=> '2'
				),
				'distrito'		=>array(
						'campo'			=> 'distrito',
						'label'			=> 'Distrito',
						'tipo'			=> 'hid',
						'combo'			=> '1',
						'listable'		=> '0',
						'validacion'	=> '0',
						'opciones'		=> 'id,nombre|geo_distritos',
						'style'			=> 'width:150px;',
						'derecha'		=> '2'
				),
				'direccion'		=>array(
						'campo'			=> 'direccion',
						'label'			=> 'Dirección casa',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '100px',
						'style'			=> 'width:300px;',
						'derecha'		=> '1'
				),
				'id_ptoventa'	=>array(
						'campo'			=> 'id_ptoventa',
						'label'			=> 'Pto de venta',
						'width'			=> '120px',
						'tipo'			=> 'hid',
						'listable'		=> '1',
						'opciones'		=> 'id,nombre|productos_ptoventa',
						'derecha'		=> '1'
				),
				'telefono'		=>array(
						'campo'			=> 'telefono',
						'label'			=> 'Teléfono Casa',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '60px',
						'style'			=> 'width:70px;',
						'derecha'		=> '1'
				),
				'telefono_oficina'=>array(
						'campo'			=> 'telefono_oficina',
						'label'			=> 'Teléfono Oficina / Sucursal',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '60px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'celular_claro'	=>array(
						'campo'			=> 'celular_claro',
						'label'			=> 'Claro',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '60px',
						'style'			=> 'width:70px;',
						'derecha'		=> '1'
				),
				'celular_movistar'=>array(
						'campo'			=> 'celular_movistar',
						'label'			=> 'Movistar',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '60px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'nextel'		=>array(
						'campo'			=> 'nextel',
						'label'			=> 'Entel',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '60px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'rpm'			=>array(
						'campo'			=> 'rpm',
						'label'			=> 'RPM',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '60px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'rpc'			=>array(
						'campo'			=> 'rpc',
						'label'			=> 'RPC',
						'tipo'			=> 'inp',
						'listable'		=> '1',
						'validacion'	=> '0',
						'width'			=> '60px',
						'style'			=> 'width:70px;',
						'derecha'		=> '2'
				),
				'firma'			=>array(
						'campo'			=> 'firma',
						'label'			=> 'Firma',
						'tipo'			=> 'html',
						'listable'		=> '0',
						'validacion'	=> '0',
						'width'			=> '500px',
						'style'			=> 'height:200px;width:550px;'
				),
				'usuarios_acceso_nombre'=>array(
						'legend'		=> 'Datos de Acceso',
						'campo'			=> 'usuarios_acceso_nombre',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'unique'		=> '1',
						'validacion'	=> '1',
						'sync'			=> 'usuarios_acceso,nombre,[usuarios_acceso_nombre],id,[id_sesion]',
						'listable'		=> '1'
				),
				'usuarios_acceso_password'=>array(
						'campo'			=> 'usuarios_acceso_password',
						'label'			=> 'Password',
						'tipo'			=> 'pas',
						'validacion'	=> '1',
						'sync'			=> 'usuarios_acceso,password,[usuarios_acceso_password],id,[id_sesion]',
						'listable'		=> '1'
				),
				'usuarios_acceso_id_permisos'=>array(
						'campo'			=> 'usuarios_acceso_id_permisos',
						'tipo'			=> 'inp',
						'sync'			=> 'usuarios_acceso,id_permisos,[usuarios_acceso_id_permisos],id,[id_sesion]',
						'default'		=> '2',
						'indicador'		=> '1'
				),
				'id_sesion'		=>array(
						'campo'			=> 'id_sesion',
						'label'			=> 'usuario sessión',
						'width'			=> '120px',
						'tipo'			=> 'hid',
						'listable'		=> '0',
						'opciones'		=> 'id,nombre|usuarios_acceso',
						'biunivoca'		=> '1',
						'subform'		=> '1',
						'unique'		=> '1',
						'indicador'		=> '1'
				)
		),
		'importar_csv'	=> '0',
		'disabled'		=> '0',
		'edicion_rapida'	=> '1',
		'crear_label'	=> ''
);
/******************************************************************************************************************************************************/



?>