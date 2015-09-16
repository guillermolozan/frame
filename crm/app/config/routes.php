<?php

return [

	// panel2
	'/$'                => 'controller=Home&method=index',
	
	// / modules 
	'/modules/(:any)$' => 'controller=Modules&param=$1',
	
	// / modules 
	'/login$'          => 'controller=Login',



	/* home */
	// '/$' => 'modulo=app&tab=home',
	// 'index.php' => 'modulo=app&tab=home',

	/* formularios */
	'/(contactenos)$' => 'modulo=formularios&tab=$1',

	/* paginas */
		'/(nuestra_flota|cobertura)$' => 'modulo=app&tab=pages&page=$1',

	/*servicios, empresa*/

		/* detail */
		'/(servicios|empresa)/(:any)/(:num)$' => 'modulo=items&tab=$1&acc=file&id=$3&friendly=$2',

	/*blog*/	

		/* detail */
		'/(noticias|comunicados|fotos|videos)/(:any)/(:num)$' => 'modulo=items&tab=$1&acc=file&id=$3&friendly=$2',

		/* detail pag */
		'/(noticias|comunicados|fotos|videos)/(:any)/(:num)/pag-(:num)$' => 'modulo=items&tab=$1&acc=file&id=$3&friendly=$2&pag=$4',

		/* list */
		'/(noticias|comunicados|fotos|videos)$' => 'modulo=items&tab=$1',

		/* list pag */
		'/(noticias|comunicados|fotos|videos)/pag-(:num)$' => 'modulo=items&tab=$1&pag=$2',

		/* list filter / val */
		'/(noticias|comunicados|fotos|videos)/(fecha)/(:any)/(:any)' => 'modulo=items&tab=$1&fil=$2&val=$3&friendly=$4',
		
];