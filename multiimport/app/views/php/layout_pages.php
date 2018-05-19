<?php if (!function_exists('mixin__post_item')) { function mixin__post_item($block = null, $attributes = array(), $post = null, $imgfirst = null, $type = null) { global $■;$■['post'] = $post;$■['imgfirst'] = $imgfirst;$■['type'] = $type;?><?php if ($post['name']) : ?><?php if ($type == 'h1') : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php elseif ($type == 'h2') : ?><h2><?php mixin__item(null, array(), $post) ?></h2><?php elseif ($type == 'h3') : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php elseif ($type == 'h4') : ?><h4><?php mixin__item(null, array(), $post) ?></h4><?php else : ?><h3><?php mixin__item(null, array(), $post) ?></h3><?php endif ?><?php endif ?><?php if ($imgfirst) : ?><?php mixin__img_item(null, array(), $post) ?><?php if ($post['video']) : ?><?php mixin__post_video(null, array(), $post['video']) ?><?php endif ?><?php endif ?><?php if ($post['html']) : ?><div><?= $post['html'] ?></div><?php endif ?><?php if ($post['text']) : ?><p><?= htmlspecialchars($post['text']) ?></p><?php endif ?><?php if (!$imgfirst) : ?><?php mixin__img_item(null, array(), $post) ?><?php if ($post['video']) : ?><?php mixin__post_video(null, array(), $post['video']) ?><?php endif ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__post_video')) { function mixin__post_video($block = null, $attributes = array(), $video = null) { global $■;$■['video'] = $video;?><div class="video-container"><iframe width="853" height="480" src="//www.youtube.com/embed/<?= htmlspecialchars($video) ?>?rel=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div><?php } } ?><?php if (!function_exists('mixin__items_list')) { function mixin__items_list($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li class="collection-item"><?php mixin__link_item(null, array(), $men_item) ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__link_item')) { function mixin__link_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['target']) : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>" target="<?= htmlspecialchars($item['target']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?= htmlspecialchars($item['name']) ?></a><?php else : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?= htmlspecialchars($item['name']) ?></a><?php endif ?><?php } } ?><?php if (!function_exists('mixin__item')) { function mixin__item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['url']) : ?><?php mixin__link_item(null, array(), $item) ?><?php else : ?><span><?= htmlspecialchars($item['name']) ?></span><?php endif ?><?php } } ?><?php if (!function_exists('mixin__imgg')) { function mixin__imgg($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['name']) : ?><img src="<?= htmlspecialchars($item['img']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" title="<?= htmlspecialchars($item['name']) ?>" data-caption="<?= htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php else : ?><img src="<?= htmlspecialchars($item['img']) ?>" class="responsive-img"/><?php endif ?><?php } } ?><?php if (!function_exists('mixin__img_item')) { function mixin__img_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['img']) : ?><?php if ($item['url']) : ?><?php if ($item['target']) : ?><a href="<?= htmlspecialchars($item['url']) ?>" target="<?= htmlspecialchars($item['target']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?php mixin__imgg(null, array(), $item) ?></a><?php else : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?php mixin__imgg(null, array(), $item) ?></a><?php endif ?><?php else : ?><img src="<?= htmlspecialchars($item['img']) ?>" title="<?= htmlspecialchars($item['name']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php endif ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items')) { function mixin__menu_items($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li<?php attr_class(add("", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?><?php if ($men_item['items']) : ?><ul class="submenu z-depth-5"><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul><?php endif ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items_collapsible')) { function mixin__menu_items_collapsible($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><?php if ($men_item['items']) : ?><li class="collapse"><a<?php attr_class(add("collapsible-header waves-effect waves-teal ", $men_item['class'], "")) ?>><?= htmlspecialchars($men_item['name']) ?></a><div class="collapsible-body"><ul><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul></div></li><?php else : ?><li<?php attr_class(add("", $clas, "")) ?>><?php mixin__link_item(null, array(), $men_item) ?></li><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__input_hidden')) { function mixin__input_hidden($block = null, $attributes = array(), $name = null, $line = null) { global $■;$■['name'] = $name;$■['line'] = $line;?><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="hidden" value="<?= htmlspecialchars($line['value']) ?>"/><?php } } ?><?php if (!function_exists('mixin__input_text')) { function mixin__input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_textarea')) { function mixin__input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><textarea id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?= htmlspecialchars($line['value']) ?></textarea><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_select')) { function mixin__input_select($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><select id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" class="browser-default"><option value="" disabled="disabled" selected="selected"><?= htmlspecialchars($line['label']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><option value="<?= htmlspecialchars($item) ?>"><?= htmlspecialchars($item) ?></option><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__input_file')) { function mixin__input_file($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field file-field ", $clas, "")) ?>><div class="btn"><span>Archivo</span><input type="file"/></div><div class="file-path-wrapper"><input type="text" class="file-path validate"/></div></div><?php } } ?><?php if (!function_exists('mixin__input_date')) { function mixin__input_date($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?> </label><br/><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("datepicker ", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_text')) { function mixin__simple_input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" placeholder="<?= htmlspecialchars($line['label']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_textarea')) { function mixin__simple_input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><textarea id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" placeholder="<?= htmlspecialchars($line['label']) ?>" name="<?= htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?= htmlspecialchars($line['value']) ?></textarea></div><?php } } ?><?php if (!function_exists('mixin__simple_input_select')) { function mixin__simple_input_select($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><select id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" class="browser-default"><option value="" disabled="disabled" selected="selected">Seleccione <?= htmlspecialchars($line['name']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><option value="<?= htmlspecialchars($item) ?>"><?= htmlspecialchars($item) ?></option><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__simple_input_file')) { function mixin__simple_input_file($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input type="file"/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_date')) { function mixin__simple_input_date($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("datepicker ", $line['class'], "")) ?>/></div><?php } } ?><!DOCTYPE html><html lang="es"><head><base href="<?= htmlspecialchars($base) ?>"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge"><link href="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($icon) ?>" rel="shortcut icon" type="image/png"><link href="<?= htmlspecialchars($pub_css) ?><?= htmlspecialchars($build_css) ?>" type="text/css" rel="stylesheet" media="screen,projection"><title><?= htmlspecialchars($head_title) ?></title><?php if ($canonical) : ?><link rel="canonical" href="<?= htmlspecialchars($canonical) ?>"><?php endif ?><?php if ($head_description) : ?><meta name="description" content="<?= htmlspecialchars($head_description) ?>"><?php endif ?><?php if ($opengraph) : ?><meta name="og:url" content="<?= htmlspecialchars($baseurl) ?><?= htmlspecialchars($canonical) ?>"><meta name="og:type" content="website"><meta name="og:title" content="<?= htmlspecialchars($head_title) ?>"><?php endif ?><meta name="robots" content="index, follow"><?php if ($map) : ?><script src="//maps.google.com/maps/api/js?sensor=true"></script><script src="<?= htmlspecialchars($ven_js) ?>gmaps.js"></script><?php endif ?></head><body<?php attr_class(add("", $classbody, "")) ?>><header class="navbar-fixed"><nav><div class="container"><?php if ($is_home) : ?><h1><?= htmlspecialchars($web_name) ?></h1><?php $main = false ?><?php endif ?><a href="<?= htmlspecialchars($link_home) ?>" title="<?= htmlspecialchars($web_name) ?>" class="brand-logo hide-on-med-and-down"><img src="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($logo) ?>" title="<?= htmlspecialchars($web_name) ?>" alt="<?= htmlspecialchars($web_name) ?>"></a><a href="#" class="menutext">MENU</a><a href="#" data-activates="mobile-nav" class="button-collapse"><i class="mdi-navigation-menu"></i></a><ul class="second_menu"><li><a href="promociones">Promociones</a></li><li><a href="social">Social</a></li><li><a href="curriculum">Trabaja con nosotros</a></li></ul></div><ul class="menu menu_top hide-on-med-and-down"><div class="container"><?php mixin__menu_items(null, array(), $menu_top) ?></div></ul></nav></header><ul id="mobile-nav" class="menu_left side-nav collapsible collapsible-accordion"><?php mixin__menu_items_collapsible(null, array(), $menu_left) ?></ul><?php if ($banner) : ?><div class="banner"><main class="container row no-bottom"><img src="<?= htmlspecialchars($banner) ?>" class="responsive-img"></main></div><?php endif ?><main class="container row"><div class="wide"><div class="post"><article><div class="card-title"><?php if ($main) : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php $main = false ?><?php else : ?><h2><?php mixin__item(null, array(), $post) ?></h2><?php endif ?></div><?php if ($group_post == 'Nosotros') : ?><div class="col s6 side_left"><?php if ($post['sub']) : ?><h3><?= htmlspecialchars($post['sub']) ?></h3><?php endif ?><?php if ($post['html']) : ?><div><?= $post['html'] ?></div><?php endif ?><?php if ($post['img']) : ?><div class="center-align"><img src="<?= htmlspecialchars($post['img']) ?>" class="responsive-img"></div><?php endif ?></div><div class="col s6 side_right"><img src="<?= htmlspecialchars($pub_img) ?>nosotros_foto.jpg" class="responsive-img"><ul class="inner_menu"><?php mixin__menu_items(null, array(), $menu_post) ?></ul></div><?php else : ?><?php if ($post['parts'] > 1) : ?><div class="side_left"><div class="col s12 l6"><div><?= $post['html'][0] ?></div></div><div class="col s12 l6"><div><?= $post['html'][1] ?></div></div></div><?php else : ?><div class="col s12 l10 side_left"><?php if ($post['html']) : ?><div><?= $post['html'] ?></div><?php endif ?><?php if ($params['item'] != 1) : ?><?php if ($post['img']) : ?><div class="center-align"><img src="<?= htmlspecialchars($post['img']) ?>" class="responsive-img"></div><?php endif ?><?php endif ?></div><?php endif ?><?php endif ?><?php if ($buttons) : ?><?php if ($buttons) : foreach ($buttons as $button) : $■['button'] = $button; ?><div<?php attr_class(add("", $item_responsive, " boton")) ?>><a href="<?= htmlspecialchars($button['url']) ?>"><?= htmlspecialchars($button['name']) ?> <strong><?= htmlspecialchars($button['sub']) ?></strong></a></div><?php endforeach; endif ?><?php endif ?><?php if ($params['item'] == 18) : ?><div id="azure" class="micrositios"><div class="col s12"><p>Microsoft Azure es una colección cada vez mayor de servicios integrados en la nube (análisis, proceso, bases de datos, móviles, redes, almacenamiento y Web) para moverse con más rapidez, llegar más lejos y ahorrar dinero. Esto es lo que puede hacer con Azure.</p><p>Consiga mayor productividad: Cualquier desarrollador o profesional de TI puede ser productivo con Azure. Las herramientas integradas, las plantillas precompiladas y los servicios administrados facilitan en gran medida la compilación y administración de aplicaciones empresariales, para móviles, la Web y el Internet de las cosas (IoT) con rapidez, usando los conocimientos que ya tiene y las tecnologías que ya conoce.<br></p>Microsoft es también el único proveedor situado como líder en los cuadrantes mágicos de Gartner de Infraestructura en la nube como servicio, Plataforma de aplicaciones como servicio y Servicios de almacenamiento en la nube por segundo año consecutivo.<p>Utilice una plataforma abierta y flexible: Azure admite la mayor selección de sistemas operativos, lenguajes de programación, marcos, herramientas, bases de datos y dispositivos. Ejecute contenedores de Linux con integración de Docker; compile aplicaciones con JavaScript, Python, .NET, PHP, Java, Node.js; cree back-ends para dispositivos con iOS, Android y Windows. Azure admite las mismas tecnologías en las que ya confían millones de desarrolladores y profesionales de TI.</p></div><div class="col s12 soluciones"><h3>Soluciones populares</h3><div class="col s12 m6 l4"><div class="solucion"><h4>Aplicaciones web</h4><div class="svg"><?= $svg_aplicacion_web ?></div><p>Implemente y escale sitios web modernos en cuestión de segundos</p><a target="_blank" href="https://azure.microsoft.com/es-es/services/app-service/">Mas información</a></div></div><div class="col s12 m6 l4"><div class="solucion"><h4>Máquinas virtuales</h4><div class="svg"><?= $svg_maquinas_virtuales ?></div><p>Lance Windows Server y Linux en cuestión de minutos</p><a target="_blank" href="https://azure.microsoft.com/es-es/services/virtual-machines/">Mas información</a></div></div><div class="col s12 m6 l4"><div class="solucion"><h4>Base de datos SQL</h4><div class="svg"><?= $svg_base_sql ?></div><p>SQL relacional administrada Base de datos como servicio</p><a target="_blank" href="https://azure.microsoft.com/es-es/services/sql-database/">Mas información		</a></div></div><div class="col s12 m6 l4"><div class="solucion"><h4>Aprendizaje automático</h4><div class="svg"><?= $svg_aprendizaje_automatico ?></div><p>Potentes análisis predictivos basados en la nube</p><a target="_blank" href="https://azure.microsoft.com/es-es/services/machine-learning/">Mas información</a></div></div><div class="col s12 m6 l4"><div class="solucion"><h4>Back-ends móviles</h4><div class="svg"><?= $svg_backend_moviles ?></div><p>Cree y hospede el servidor back-end para cualquier aplicación móvil</p><a target="_blank" href="https://azure.microsoft.com/es-es/services/cloud-services/">Mas información</a></div></div><div class="col s12 m6 l4"><div class="solucion"><h4>RemoteApp</h4><div class="svg"><?= $svg_remoteapp ?></div><p>Implemente aplicaciones cilente Windows en la nube, ejecutar en cualquier dispositivo</p><a target="_blank" href="https://azure.microsoft.com/es-es/services/remoteapp/">Mas información</a></div></div></div><div class="col s12"><p>Amplíe su TI existente: Algunos proveedores de servicios en la nube obligan a elegir entre un centro de datos del cliente y la nube. No es el caso en Azure, que se integra fácilmente con su entorno de TI actual a través de la mayor red de conexiones privadas seguras, soluciones de base de datos y almacenamiento híbridos, así como funciones de residencia y cifrado de datos, de forma que sus activos permanecen justo donde los necesita. Incluso puede ejecutar Azure en su propio centro de datos con Azure Stack. Las soluciones de nube híbrida de Azure ofrecen lo mejor de ambos mundos: más opciones de TI, menos complejidad y menos costos.</p><p>Escale de acuerdo con sus necesidades, pague por uso: Los servicios de Azure de pago por uso se pueden escalar o reducir verticalmente con rapidez para adaptarse a la demanda, de forma que solo paga por lo que utiliza. La facturación por minuto y el compromiso de ajustarnos a los precios de la competencia para los servicios de infraestructura más populares, como proceso, almacenamiento y ancho de banda, hacen que siempre obtenga la mejor relación calidad-precio.</p><p>Proteja sus datos: Sabemos que algunas organizaciones están aún recelosas de la nube. Este es el motivo por el que Microsoft ha adoptado un compromiso líder en el sector de proteger sus datos y su privacidad. Fuimos el primer proveedor de servicios en la nube reconocido por las autoridades de protección de datos de la Unión Europea por nuestro compromiso de cumplir la exigente legislación de la UE en cuanto a privacidad.</p></div><div class="col s12 m4 l3"><div class="gris card"><div class="card-content"><h5>Proceso</h5><ul><li><a>Windows Virtual Machines</a></li><li><a>Linux Virtual Machines</a></li><li><a>Cloud Services</a></li><li><a>Remote App</a></li><li><a>Service Fabric</a></li><li><a>Batch</a></li><li><a>Azure Container Service</a></li></ul></div></div></div><div class="col s12 m4 l3"><div class="gris card"><div class="card-content"><h5>Web y móvil</h5><ul><li><a>Servicio de aplicaciones de Azure</a></li><li><a>Servicios móviles</a></li><li><a>Administración de API</a></li><li><a>Bases de datos centrales de notificaciones</a></li><li><a>Mobile Engagement</a></li></ul></div></div></div><div class="col s12 m4 l3"><div class="gris card"><div class="card-content"><h5>Datos + Almacenamiento</h5><ul><li><a>SQL Database</a></li><li><a>DocumentDB</a></li><li><a>Redis Cache</a></li><li><a>Storage</a></li><li><a>StorSimple</a></li><li><a>Azure Search</a></li><li><a>SQL Sata Warehouse</a></li><li><a>SQL Server Strech Database</a></li></ul></div></div></div><div class="col s12 m4 l3"><div class="gris card"><div class="card-content"><h5>Análisis</h5><ul><li><a>HDInsight</a></li><li><a>Aprendizaje automático</a></li><li><a>Análisis de transmisiones</a></li><li><a>Factoría de datos</a></li><li><a>Centros de eventos</a></li><li><a>Catálogo de datos</a></li><li><a>Almacén Data Lake</a></li><li><a>Análisis con Data Lake</a></li></ul></div></div></div><div class="col s12 m4 l3"><div class="gris card"><div class="card-content"><h5>Redes</h5><ul><li><a>Red virtual</a></li><li><a>ExpressRoute</a></li><li><a>Administrador de tráfico</a></li><li><a>Ancho de banda</a></li><li><a>Equilibrador de carga</a></li><li><a>Puerta de enlace de VPN DNS</a></li><li><a>Application Gateway</a></li></ul></div></div></div><div class="col s12 m4 l3"><div class="gris card"><div class="card-content"><h5>Integración híbrida</h5><ul><li><a>Servicio de Biztalk</a></li><li><a>Servicio Bus</a></li><li><a>Copia de seguridad</a></li><li><a>Recuperación de sitios</a></li></ul></div></div></div><div class="col s12 m4 l3"><div class="gris card"><div class="card-content"><h5>Administración de identidades y acceso</h5><ul><li><a>Active Directory</a></li><li><a>Azure Active Directory B2C</a></li><li><a>Servicios de dominio de Azure Active Directory</a></li><li><a>Autenticación multifactor</a></li></ul></div></div></div><div class="col s12 m4 l3"><div class="gris card"><div class="card-content"><h5>Multimedia y CDN</h5><ul><li><a>Servicios multimedia</a></li><li><a>CDN</a></li></ul></div></div></div><div class="col s12 m4 l3"><div class="gris card"><div class="card-content"><h5>Servicios para desarrolladores</h5><ul><li><a>Visual Studio Team Service</a></li><li><a>Application Insights</a></li><li><a>Laboratorio de DevTest</a></li></ul></div></div></div><div class="col s12 m4 l3"><div class="gris card"><div class="card-content"><h5>Administración</h5><ul><li><a>Programador</a></li><li><a>Automatización</a></li><li><a>Visión operativa</a></li><li><a>Almacén de claves</a></li><li><a>Centro de IoT de Azure</a></li><li><a>Centro de seguridad</a></li></ul></div></div></div><div class="col s12"><p>Microsoft fue también el primero de los principales proveedores de servicios en la nube en adoptar el nuevo estándar internacional de privacidad en la nube, ISO 27018. También creamos Azure Government, una versión independiente de Azure diseñada para cumplir los rigurosos requisitos de cumplimiento de las agencias públicas de Estados Unidos.</p><p>Ejecute sus aplicaciones en cualquier lugar: Azure se ejecuta en una red mundial de centros de datos administrados por Microsoft en 22 regiones, es decir, más países y regiones que la competencia de Amazon Web Services y Google Cloud juntos. Esta superficie mundial de rápido crecimiento aporta montones de opciones para ejecutar aplicaciones y asegurar un gran rendimiento para el cliente. Azure es también el primer proveedor de nube multinacional en China continental.</p><p>Tome decisiones más inteligentes: Los servicios de análisis predictivo de Azure como Aprendizaje automático, Análisis de Cortana y Análisis de transmisiones, están redefiniendo la inteligencia empresarial. Tome decisiones más inteligentes, mejore el servicio a los clientes y descubra nuevas posibilidades de negocio con sus datos estructurados, no estructurados y de streaming del Internet de las cosas.</p></div><ul class="checks"><li class="col s12 m6">Sin costos por adelantado</li><li class="col s12 m6">Pague solo por lo que usa</li><li class="col s12 m6">Sin tarifas de cancelación</li><li class="col s12 m6">Facturación por minuto</li></ul><div class="col s12"><p>Cuente con un servicio en la nube de confianza: Desde proyectos pequeños de desarrollo y pruebas hasta lanzamientos internacionales de productos, Azure está diseñado para controlar cualquier carga de trabajo. Más del 57 % de las empresas de Fortune 500 confían en Azure, que ofrece contratos de nivel de servicio para empresas, soporte técnico ininterrumpido y supervisión continua del estado de los servicios. Entre los clientes se encuentran Skanska, Heineken, 3M, Dyson, Paul Smith, Mazda, GE Healthcare, Trek, McKesson, Milliman, Towers Watson, NBC Sports, TVB y muchos, muchos más.</p><p>Microsoft Azure permite implementar infraestructuras y servicios con rapidez para satisfacer todas sus necesidades empresariales. Puede ejecutar aplicaciones basadas en Windows y Linux en 22 regiones de centros de datos de Azure, ofrecidas con contratos de nivel de servicio de nivel empresarial.</p><p>Suscríbase y comience a usar una versión de evaluación hoy mismo. Llámenos al número +51 1 429-0000 si tiene alguna pregunta sobre los precios o la funcionalidad de Azure.</p><p><img src="<?= htmlspecialchars($pub_img) ?>azure1.png" class="responsive-img"><img src="<?= htmlspecialchars($pub_img) ?>azure2.png" class="responsive-img"></p></div></div><?php elseif ($params['item'] == 19) : ?><div id="licenciamiento" class="micrositios"><div class="col s12"><p>El nuevo Microsoft Volume Licensing Center tiene una interfaz intuitiva y fácil de usar que le permite ver y generar rápidamente informes de todo lo que compra con el contrato Microsoft Products and Services Agreement. Puede administrar la cartera de productos y servicios Microsoft de toda la organización. Microsoft Volume Licensing Center también le permite aprovisionar usted mismo servicios en línea, descargar software más rápidamente, acceder a claves de licencias por volumen más fácilmente y administrar y usar de forma eficaz los beneficios de Software Assurance.</p></div><div class="col s12 l6"><div class="gris card"><div class="card-content"><h5>Pequeñas empresas</h5><h6><strong>Menos de 250 licencias</strong></h6><p>Programas de licenciamiento rentables que ofrecen comodidad y flexibilidad.</p><ul><li><p><a target="_blank" href="https://www.microsoft.com/en-us/Licensing/licensing-programs/open-license.aspx">Open Licence</a></p></li><li><p><a target="_blank" href="https://www.microsoft.com/en-us/Licensing/licensing-programs/open-license.aspx">Open Value</a></p></li><li><p><a target="_blank" href="https://www.microsoft.com/en-us/Licensing/licensing-programs/open-license.aspx">Open Subscription</a></p></li><li><p><a target="_blank" href="https://www.microsoft.com/en-us/Licensing/product-licensing/online-services.aspx">Servicios en línea de Microsoft</a></p></li></ul></div></div></div><div class="col s12 l6"><div class="gris card"><div class="card-content"><h5>Medianas y grandes empresas</h5><h6><strong>250 o más licencias</strong></h6><p>Soporte para una infraestructura dinámica de TI con licenciamiento y administración de software simplificados.</p><ul><li><p><a target="_blank" href="https://www.microsoft.com/en-us/Licensing/licensing-programs/enterprise.aspx">Enterprise Agreement</a></p></li><li><p><a target="_blank" href="https://www.microsoft.com/en-us/Licensing/MPSA/default.aspx">Open Value</a></p></li><li><p><a target="_blank" href="https://www.microsoft.com/en-us/Licensing/licensing-programs/select.aspx">Open Subscription</a></p></li></ul></div></div></div><div class="col s12"><p>El nuevo Microsoft Products and Services Agreement (MPSA) es un único contrato para sus compras de Online Services, software y Software Assurance en toda la organización. Le permite ahorrar tiempo y dinero ya que combina puntos de compra para el mejor nivel de precio y reduce la sobrecarga administrativa asociada con la administración de varios contratos.</p><p>¿Cómo el contrato Microsoft Products and Services Agreement (MPSA) hace que Software Assurance (SA) sea más fácil de entender, administrar y usar? </p><p>El contrato MPSA ofrece herramientas que le ayudan a administrar SA y a ver con claridad los beneficios que tiene su organización. Las vistas consolidadas muestran cómo los beneficios de SA se corresponden con las licencias que ha comprado. Los procesos de cálculo simplificados para los beneficios clave le permiten entender fácilmente cómo se obtienen. Y las herramientas de autoservicio fáciles de usar le proporcionan formas sencillas de asignar inmediatamente y administrar de forma eficaz sus beneficios, además de controlar su uso.</p></div><div class="col s12"><p><strong>Software Assurance a través de Microsoft Products and Services Agreement</strong></p><div class="col s12"><div class="esquema morado card"><div class="colu card-content"><h4 class="card-title">Software Assurance</h4><p class="card-content">Software Assurance es más fácil de entender, administrar y usar a través del nuevo Volume Licencing Agreement.</p></div><div class="colu"><img src="<?= htmlspecialchars($pub_img) ?>licenciamiento.png"></div></div></div><p> ¿Cómo empiezo a usar Software Assurance con el contrato MPSA de mi organización? <br>Microsoft Volume Licensing Center (MVLC) es su destino para administrar los beneficios de SA. MVLC es un sistema intuitivo y sencillo diseñado para ayudarle a simplificar la administración y uso de sus beneficios de SA. Encontrará un resumen de los beneficios de SA, incluidas las cantidades disponibles y usadas, breves descripciones de cada beneficio y formas claras de asignar los distintos beneficios a los usuarios adecuados.</p></div></div><?php elseif ($params['item'] == 20) : ?><div id="office365" class="micrositios"><div class="col s12"><p>Tanto si está en su oficina o fuera de ella, tendrá a su disposición un conjunto de herramientas de productividad de calidad superior. Las aplicaciones de Office (siempre con la última versión) le permiten crear, editar y compartir desde un equipo PC o Mac, así como desde un dispositivo iOS, Android™ o Windows con cualquier usuario en tiempo real.</p><p>Herramientas para el profesional: Cree su dirección de correo electrónico empresarial para aportar reconocimiento al nombre y promocione su negocio con materiales de marketing personalizados fáciles de crear. Disfrute de una mejor comunicación con sus clientes y compañeros gracias a una variedad de herramientas de comunicación, desde correo electrónico y mensajería instantánea hasta redes sociales y videoconferencias.</p><p>Herramientas para trabajar en equipo: Con 1 TB de almacenamiento por usuario, tendrá espacio para todos sus archivos. Además, como sus archivos se almacenan en línea, puede compartirlos con usuarios que estén dentro o fuera de su compañía, desde dondequiera que esté trabajando y siempre que lo necesite. Y con el vídeo HD de varios participantes, el uso compartido de contenido y los calendarios compartidos, siempre estará sincronizado con su grupo.</p><p>Fácil configuración y administración: Gracias a las instrucciones paso a paso, puede configurar usuarios de forma sencilla y empezar a usar los servicios rápidamente. Puede acceder al sencillo centro de administración desde cualquier lugar para administrar todos sus servicios. Office 365 también se encarga de la TI para que sus servicios siempre estén actualizados y en funcionamiento.</p><p><img src="<?= htmlspecialchars($pub_img) ?>office1.png" class="responsive-img"></p><h2>Planes para Pymes</h2></div><div class="planes"><div class="col s12 m4"><div class="plan"><h3 class="rojo">Business</h3><h4>US$ 8.25 usuario / mes</h4><div>Todos los programas de Office en PC/Mac con aplicaciones para tabletas y smartphones</div><ul><li>Correo electrónico no incluido)</li><li>1 TB de almacenamiento y uso compartido de archivos</li><li>Todos los programas de Office instalados en PC/Mac</li><li>Aplicaciones de Office en tabletas y smartphones</li></ul></div></div><div class="col s12 m4"><div class="plan"><h3 class="rojo">Business Essential</h3><h4>US$ 5.00 usuario / mes</h4><div>Versiones en línea de Office con correo electrónico y videoconferencias</div><ul><li>Correo electrónico con buzón de correo de 50 GB</li><li>1 TB de almacenamiento y uso compartido de archivos</li><li>Videoconferencias en HD</li><li>Office Online</li></ul></div></div><div class="col s12 m4"><div class="plan"><h3 class="rojo">Business Premium</h3><h4>US$ 12.50 usuario / mes</h4><div>Todas las características de Empresa Essentials y Empresa en un plan integrado</div><ul><li>Correo electrónico con buzón de correo de 50 GB</li><li>1 TB de almacenamiento y uso compartido de archivos</li><li>Videoconferencias en HD</li><li>Todos los programas de Office instalados en PC/Mac</li><li>Aplicaciones de Office en tabletas y smartphones</li></ul></div></div></div><div class="col s12"><h4>Su Office en cualquier lugar</h4><p>Gracias a Office 365 Empresa, las herramientas conocidas como Word, Excel, PowerPoint y Outlook están disponibles en el lugar y en el momento que las necesita.</p><h4>Colaboración simplificada</h4><p>Como sus archivos se almacenan en línea, puede compartirlos con todo el mundo, e incluso crearlos de forma conjunta, en tiempo real. Independientemente de su ubicación.</p><h4>Herramientas siempre actualizadas</h4><p>OneDrive para la Empresa almacena los archivos en línea, por lo que siempre están sincronizados y actualizados. Además, las aplicaciones de Office siempre disponen de la última versión.</p><h4>Confiabilidad</h4><p>Disfrute de la tranquilidad de saber que sus servicios están disponibles con un contrato de nivel de servicio (SLA) con respaldo financiero que garantiza un tiempo de actividad del 99,9 %.</p><h4>Seguridad</h4><p>Los procedimientos de seguridad de última generación con cinco capas de seguridad y supervisión proactiva ayudan a proteger los datos del cliente.</p><h4>Privacidad</h4><p>Sus datos y su privacidad le pertenecen y nosotros los protegemos. </p><h4>Integración de Active Directory</h4><p>Administre las credenciales y los permisos de usuario. Inicio de sesión único y sincronización con Active Directory.</p><h4>Administración</h4><p>Implemente y administre Office 365 en su compañía, no se necesita ser un experto en TI. Puede agregar y quitar usuarios en cuestión de minutos.</p><h4>Soporte</h4><p>El Soporte técnico de Microsoft ofrece asistencia telefónica y en línea, recursos de ayuda y conexiones con otros clientes de Office 365 para realizar configuraciones y correcciones rápidas. </p><h2>Planes Empresariales.</h2></div><div class="planes"><div class="col s12 m4"><div class="plan"><h3 class="rojo">Enterprise E1</h3><h4>US$ 8.00 usuario / mes</h4><div>Proporcione a sus usuarios los últimos servicios de colaboración y disfrute del control de TI y de la flexibilidad que necesita para gestionar su empresa sin problemas.</div><ul><li>Correo electrónico con buzón de correo de 50 GB</li><li>1 TB de almacenamiento y uso compartido de archivos</li><li>Videoconferencias en HD</li><li>Todos los programas de Office instalados en PC/Mac</li><li>Aplicaciones de Office en tabletas y smartphones</li></ul></div></div><div class="col s12 m4"><div class="plan"><h3 class="rojo">Proplus</h3><h4>US$ 12.00 usuario / mes</h4><p>Disponga de Office allá donde vaya. Adquiera las herramientas más recientes de productividad, colaboración, cumplimiento y BI distribuidas rápidamente, con actualizaciones sin problemas.</p><p>Office 365 ProPlus incluye ahora las nuevas aplicaciones de Office 2016 para equipos PC y Mac.</p><ul><li>Correo electrónico con buzón de correo de 50 GB</li><li>1 TB de almacenamiento y uso compartido de archivos</li><li>Videoconferencias en HD</li><li>Todos los programas de Office instalados en PC/Mac</li><li>Aplicaciones de Office en tabletas y smartphones</li></ul></div></div><div class="col s12 m4"><div class="plan"><h3 class="rojo">Enterprise E3</h3><h4>US$ 20.00 usuario / mes</h4><p>Dé impulso a su negocio con la última versión completa de Office, además de una amplia gama de servicios de colaboración integrados combinados con avanzadas características de cumplimiento normativo y plena eficacia de TI.</p><p>Office 365 Enterprise E3 incluye ahora las nuevas aplicaciones de Office 2016 para equipos PC y Mac.</p><ul><li>Correo electrónico con buzón de correo de 50 GB</li><li>1 TB de almacenamiento y uso compartido de archivos</li><li>Videoconferencias en HD</li><li>Todos los programas de Office instalados en PC/Mac</li><li>Aplicaciones de Office en tabletas y smartphones</li></ul></div></div></div><div class="col s12"><p><img src="<?= htmlspecialchars($pub_img) ?>office2.png" class="responsive-img"></p></div></div><?php elseif ($params['item'] == 21) : ?><div id="sqlserver" class="micrositios"><div class="col s12"><h2>SQL Server 2014  y la plataforma de datos de Microsoft.</h2><p>Descubra las novedades en SQL Server, Big Data y en los servicios de datos de Microsoft Azure. Lea lo último sobre productos, clientes, asociaciones y otras noticias oficiales aquí.</p><h3>Ventajas</h3><h4>Rendimiento confiable</h4><p>SQL Server 2014 agiliza las aplicaciones críticas con un nuevo motor OLTP in-memory que proporciona un rendimiento transaccional hasta 30 veces superior. En cuanto al almacenamiento de datos, el nuevo almacén de columnas in-memory actualizable ofrece una velocidad de procesamiento de consultas 100 veces superior a la de las soluciones antiguas. SQL Server transmite también una gran confianza, ya que ofrece una seguridad sin parangón y se ha considerado la base de datos empresarial con menos vulnerabilidades durante seis años seguidos. (Base de datos de vulnerabilidades del National Institute of Standards and Technology, 21 de enero de 2015)</p><h4>Mayor rapidez</h4><p>En la obtención de la información privilegiada que subyace en datos de cualquier tipo <br>Obtenga información privilegiada más rápido con una plataforma BI completa que agiliza las operaciones de acceso, análisis, limpieza y formato de datos internos y externos. Con SQL Server 2014 y Microsoft Power BI es muy sencillo conectar a cada usuario de la organización con los datos correctos que necesita para tomar decisiones más inteligentes y rápidas.</p><h4>Plataforma para la nube híbrida</h4><p>SQL Server 2014 se ha diseñado para trabajar en entornos híbridos, ya sea de manera local o en la nube. Las nuevas herramientas de SQL Server y de Microsoft Azure facilitan aún más la creación de soluciones de aplicación de revisiones, de recuperación ante desastres y las copias de seguridad con Microsoft Azure. Estas herramientas proporcionan un traslado sencillo a la nube de bases de datos de SQL Server locales, lo que permite a los clientes usar sus conocimientos actuales para aprovechar las ventajas de los centros de datos globales de Microsoft.</p></div><div class="col s12"><img src="<?= htmlspecialchars($pub_img) ?>sqlserver.png" class="responsive-img"><h4>Gartner sitúa a SQL Server como líder en el Cuadrante mágico de sistemas de administración de bases de datos operativas</h4><p>Por su “visión líder en el mercado”, su rendimiento y su ejecución sólida, Gartner ha situado a Microsoft SQL Server 2014 como líder en el Cuadrante mágico para sistemas de administración de bases de datos operativas.</p><h3>Comparación.</h3><h4>La evolución de SQL Server</h4><p>SQL Server 2014 permite usar una tecnología de seguridad in-memory de alto rendimiento en cargas de trabajo de análisis y BI, OLTP y de almacenamiento de datos para conseguir unas transacciones 30 veces más rápidas y un rendimiento de consultas 100 veces superior. Use SQL Server 2014 para obtener una alta disponibilidad mejorada con hasta ocho secundarios de lectura, una mayor seguridad y escalabilidad, recuperación ante desastres y copias de seguridad híbridas en las instalaciones locales o en la nube.</p></div><div class="col s12"><h2>Comparación de versiones de SQL Server</h2>
<table class="striped">    
    <thead>
        <tr role="row">
            <th><span>Características</span></th>            
            <th></th>            
            <th><span>SQL Server 2014</span></th>            
            <th><span>SQL Server 2012</span></th>            
            <th><span>SQL Server 2008&nbsp;R2</span></th>            
            <th><span>SQL Server 2008</span></th>            
        </tr>
    </thead>
    
    <tbody>
        
        <tr role="row">            
            <td><span><b>Rendimiento</b></span></td>            
            <td><span>OLTP in-memory*</span></td>            
            <td class="ball"></td>            
            <td></td>            
            <td></td>            
            <td></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Almacén de columnas in-memory*</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td></td>            
            <td></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Extensión de grupo de búferes a SSD</span></td>            
            <td class="ball"></td>            
            <td></td>            
            <td></td>            
            <td></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Regulador de recursos</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
        </tr>
        
        <tr role="row">            
            <td><span><b>Disponibilidad</b></span></td>            
            <td><span>AlwaysOn*</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td></td>            
            <td></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Migración dinámica y soporte para la virtualización mejorados</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td></td>            
        </tr>
        
        <tr role="row">            
            <td><span><b>Seguridad</b></span></td>            
            <td><span>Cifrado de base de datos transparente*</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Soporte para el cifrado de copias de seguridad</span></td>            
            <td class="ball"></td>            
            <td></td>            
            <td></td>            
            <td></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Auditorías específicas</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Separación de tareas</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td></td>            
            <td></td>            
        </tr>
        
        <tr role="row">            
            <td><span><b>Preparación para la nube</b></span></td>            
            <td><span>Copias de seguridad en Microsoft Azure</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td></td>            
            <td></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Recuperación ante desastres en Microsoft Azure</span></td>            
            <td class="ball"></td>            
            <td></td>            
            <td></td>            
            <td></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Imágenes de máquinas virtuales optimizadas en la galería de Microsoft Azure</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td></td>            
            <td></td>            
        </tr>
        
        <tr role="row">            
            <td><span><b>Administración y programación</b></span></td>            
            <td><span>Distributed Replay</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td></td>            
            <td></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Administración basada en directivas</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Programación mejorada</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
        </tr>
        
        <tr role="row">            
            <td><span><b>BI y análisis</b></span></td>            
            <td><span>PowerPivot para Excel</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Servicios de integración administrados como un servidor</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td></td>            
            <td></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Conector de Hadoop a través de Apache Sqoop</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Modelo de semántica de BI tabular*</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Master Data Services*</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Data Quality Services*</span></td>            
            <td class="ball"></td>            
            <td class="ball"></td>            
            <td></td>            
            <td></td>        
        </tr>
    </tbody>
</table></div><div class="col s12"><h4>Rendimiento excepcional con SQL Server 2014</h4><p>SQL Server 2014 ofrece un rendimiento excepcional con la tecnología in-memory integrada en la base de datos para realizar transacciones, consultas y análisis, y permite obtener más rápidamente insights de los datos mediante herramientas de análisis conocidas y soluciones Big Data listas para la empresa. Un modelo de programación coherente y herramientas comunes tanto en entornos locales como en la nube admiten infraestructuras y escenarios híbridos.</p></div><div class="col s12"><h2 class="accordion-title">Funcionalidad</h2>

<ul class="collapsible" data-collapsible="expandable">

    <li>    
    <div class="collapsible-header">Rendimiento in-memory y avanzado</div>
    
    <div class="collapsible-body">
                    
            <p>Las tecnologías actuales de almacenamiento y análisis de datos se complementan con la nueva funcionalidad in-memory para procesamiento de transacciones y las mejoras del almacenamiento de datos presentes en SQL Server 2014. Escale y transforme su negocio con mejoras que multiplican por 30 el rendimiento del procesamiento de transacciones mediante el uso del hardware existente y por más de 100 el rendimiento del almacenamiento de datos.
            
            <a target="_blank" href="https://www.microsoft.com/es-es/server-cloud/solutions/oltp-database-management.aspx">Más información</a>
            
            </p>   
    </div>
    </li>
    <li>    
    <div class="collapsible-header">Rendimiento predecible y demostrado</div>
    
    <div class="collapsible-body">
                        
            <p>SQL Server encabeza constantemente las pruebas comparativas de rendimiento de aplicaciones TPC-E, TPC-H y en la práctica. SQL Server cuenta con la certificación de SAP para ejecutar algunas de las cargas de trabajo más exigentes. Obtenga un rendimiento más predecible de las instancias de SQL Server virtualizadas con el control de E/S del regulador de recursos.
            
            <a target="_blank" href="https://www.microsoft.com/es-es/server-cloud/products/sql-server-benchmarks/industry.aspx">Más información</a>

            </p>

    </div>
    </li>
    <li>    
    <div class="collapsible-header">Alta disponibilidad y recuperación ante desastres</div>
    
    <div class="collapsible-body">
                        
            <p>Amplíe el tiempo de actividad crítico, agilice la conmutación por error, mejore la capacidad de administración y optimice el uso de los recursos de hardware a través de la función mejorada AlwaysOn en SQL Server 2014: la solución unificada para ofrecer una alta disponibilidad. En SQL Server 2014, la configuración de AlwaysOn resulta aún más sencilla gracias al nuevo asistente para agregar réplicas. Si desea implementar un entorno de alta disponibilidad híbrida con Máquinas virtuales de Microsoft Azure, puede aprovechar las nuevas plantillas de AlwaysOn para automatizar la configuración de la alta disponibilidad. 
            
            <a target="_blank" href="https://www.microsoft.com/es-es/server-cloud/solutions/oltp-database-management.aspx">Más información</a>

            </p>

    </div>
    </li>
    <li>    
    <div class="collapsible-header">Escalabilidad empresarial de procesos, redes y almacenamiento</div>
    
    <div class="collapsible-body">
                        
            <p>Con SQL Server y Windows Server, el procesamiento físico se puede escalar a un máximo de 640 procesadores lógicos y las máquinas virtuales a 64 procesadores lógicos como máximo. SQL Server también utiliza los espacios de almacenamiento y la virtualización de red para optimizar los recursos. También se puede ejecutar en Windows Server Core para reducir el área expuesta a ataques.
            
            <a target="_blank" href="http://technet.microsoft.com/library/hh393519.aspx">Más información</a>

            </p>
    </div>
    </li>
    <li>    
    <div class="collapsible-header">Seguridad y conformidad</div>
    
    <div class="collapsible-body">
                        
            <p>Ayude a proteger los datos de las cargas de trabajo críticas mediante el cifrado de datos transparente, auditorías eficaces, administración de claves extensible y copias de seguridad cifradas. Nunca había sido tan fácil administrar permisos para el acceso a los datos para admitir la separación de tareas entre varios usuarios.
            
            <a target="_blank" href="https://www.microsoft.com/es-es/server-cloud/solutions/oltp-database-management.aspx">Más información</a>
            
            </p>

    </div>
    </li>
    <li>    
    <div class="collapsible-header">Plataforma de datos coherente para el entorno local y la nube</div>
    
    <div class="collapsible-body">
                        
            <p>Aproveche los conocimientos existentes y las herramientas conocidas, como Active Directory y SQL Server Management Studio, en las implementaciones locales de SQL Server y Microsoft Azure. Disfrute de la flexibilidad de poder ejecutar sus cargas de trabajo de SQL Server en Máquinas virtuales de Azure (VM), lo que le permite controlar totalmente la máquina virtual. También puede usar el servicio Base de datos SQL de Azure para simplificar aún más la necesidad de administrar las instancias de SQL Server y ofrecer al mismo tiempo una arquitectura única de escalado horizontal.
            
            <a target="_blank" href="http://azure.microsoft.com/es-es/solutions/data-management/">Más información</a>

            </p>

    </div>
    </li>
    <li>    
    <div class="collapsible-header">Business Intelligence corporativa</div>
    
    <div class="collapsible-body">
                        
            <p>Escale sus modelos de BI y enriquezca y proteja sus datos, sin dejar de lado la calidad y la veracidad, con una solución BI completa. Compile soluciones de análisis completas, a escala empresarial, con Analysis Services y simplifique la implementación del modelo de BI con el modelo semántico BI.
            
            <a target="_blank" href="https://www.microsoft.com/es-es/server-cloud/solutions/bi-analytics.aspx">Más información</a>

            </p>

    </div>
    </li>
    <li>    
    <div class="collapsible-header">Consulta de datos en herramientas conocidas como Excel</div>
    
    <div class="collapsible-body">
                        
            <p>Acelere el tiempo necesario para extraer la información útil con Microsoft Excel. Utilice Excel para buscar datos, analizarlos, tener acceso a ellos y darles forma, ya sean internos o externos e incluso no estructurados.
            
            <a target="_blank" href="https://www.microsoft.com/es-es/server-cloud/solutions/bi-analytics.aspx">Más información</a>

            </p>

    </div>
    </li>
    <li>    
    <div class="collapsible-header">Rápida obtención de la información útil subyacente para los usuarios con Power BI</div>
    
    <div class="collapsible-body">
                    
            <p>Reduzca el tiempo necesario para extraer la información útil, en el entorno local y en la nube, con SQL Server 2014 y Power BI. Obtenga visualizaciones enriquecidas con Power Map y Power View. Utilice Power Query para buscar datos, tener acceso a ellos y darles forma, ya sean internos o externos, e incluso no estructurados. Acceda a información reveladora privilegiada desde cualquier lugar mediante Power BI.
            
            <a target="_blank" href="http://powerbi.microsoft.com/">Más información</a>

            </p>

    </div>
    </li>
    <li>    
    <div class="collapsible-header">Almacenamiento de datos escalable</div>
    
    <div class="collapsible-body">
                        
            <p>Amplíe hasta un volumen equivalente a petabytes de datos para el almacenamiento de datos relacionales de tipo empresarial mediante la arquitectura de escalado horizontal de procesamiento paralelo masivo (MPP) a través de Analytics Platform System (APS). Además, disfrute de la capacidad de integrar con orígenes no relacionales como Hadoop.  Responda a sus necesidades de data marts más pequeños o almacenes de datos empresariales de gran volumen mientras administra consultas incluso 100 veces más rápido que con su plataforma de datos heredada, y reduzca el almacenamiento con la nueva compresión de datos mejorada.
            
            <a target="_blank" href="https://www.microsoft.com/es-es/server-cloud/solutions/data-warehouse-big-data.aspx">Más información</a>

            </p>

    </div>
    </li>
    <li>    
    <div class="collapsible-header">Data Quality Services e Integration Services</div>
    
    <div class="collapsible-body">
                        
            <p>Integration Services admite de una forma muy completa las tareas de extracción, transformación y carga (ETL), y también permite la ejecución y administración como una instancia de SQL Server individual. Mejore la calidad de los datos haciendo uso de los conocimientos de la organización y recurriendo a proveedores de datos de terceros para su limpieza mediante Data Quality Services.
            
            <a target="_blank" href="http://technet.microsoft.com/sqlserver/cc511477.aspx">Más información</a>

            </p>

    </div>
    </li>
    <li>    
    <div class="collapsible-header">Herramientas de administración fáciles de usar</div>
    
    <div class="collapsible-body">
                        
            <p>SQL Server Management Studio le ayuda a administrar su infraestructura de base de datos de forma centralizada, tanto en la nube como en el entorno local. La compatibilidad que incorpora para Windows PowerShell 2.0 automatiza las tareas de administración, y las mejoras de Sys Prep permiten crear máquinas virtuales con una mayor eficiencia. Utilice Distributed Replay para simplificar las pruebas de aplicaciones en una única base de datos.
            
            <a target="_blank" href="http://technet.microsoft.com/library/hh213248.aspx">Más información</a>

            </p>

    </div>
    </li>
    <li>    
    <div class="collapsible-header">Herramientas de desarrollo sólidas</div>
    
    <div class="collapsible-body">
        
        <div class="accordionLeftSection">
            
            <p>Las herramientas para desarrolladores actualizadas se integran en Visual Studio y están disponibles para descargarlas a fin de compilar aplicaciones web, empresariales, móviles y de Business Intelligence avanzadas, locales y en la nube. Los clientes pueden usar las API estándar del sector (ADO.NET, ODBC, JDBC, PDO y ADO) en varias plataformas, como .NET, C/C++, Java, Linux y PHP.
            
            <a target="_blank" href="http://msdn.microsoft.com/data/tools.aspx">Más información</a>
            
            </p>
            
        </div>

    </div>
    </li>    
</ul></div></div><?php elseif ($params['item'] == 22) : ?><div id="windowsserver" class="micrositios"><div class="col s12"><h2>Windows Server 2012 R2</h2><p>Disfrute de una mayor flexibilidad y agilidad</p><Windows>Server 2012 R2, que ocupa un lugar central en la estrategia de Microsoft Cloud Platform, aporta la experiencia de Microsoft al dotar su infraestructura de servicios en la nube de escala global, gracias a las nuevas características y mejoras en virtualización, administración, almacenamiento, redes, infraestructura de escritorio virtual, protección de la información y del acceso, plataforma de aplicaciones y web, etc.</Windows><h4>Ventajas</h4><p>Con Windows Server 2012 R2 podrá ejecutar las cargas de trabajo más importantes y dispondrá de opciones de recuperación sólidas. Recuperará la inversión rápidamente gracias al amplio abanico de opciones de almacenamiento rentables y de alto rendimiento, además de la entrega simplificada de servicios de TI multiempresa. Puede crear, implementar, utilizar y supervisar aplicaciones en un entorno local y en la nube. Provea a los usuarios un acceso seguro a los recursos corporativos en los dispositivos que ellos elijan.</p></div><div class="col s12 ventajas card azul"><div class="card-content"><div class="col s12 l6 ventaja"><div class="col s3"><img src="<?= htmlspecialchars($pub_img) ?>microsoft1.png"></div><div class="col s9"><h4>Empresarial</h4><p>Mejore el rendimiento y escale la capacidad de manera más eficaz para ejecutar las cargas de trabajo de mayor tamaño mientras habilita opciones de recuperación sólidas para protegerse de las interrupciones imprevistas.</p></div></div><div class="col s12 l6 ventaja"><div class="col s3"><img src="<?= htmlspecialchars($pub_img) ?>microsoft2.png"></div><div class="col s9"><h4>Sencillo y rentable</h4><p>Suministre almacenamiento multiempresa y funciones de red de arquitectura multiempresa para almacenamiento y conectividad con hardware estándar del sector a bajo costo.</p></div></div><div class="col s12 l6 ventaja"><div class="col s3"><img src="<?= htmlspecialchars($pub_img) ?>microsoft3.png"></div><div class="col s9"><h4>Orientado a las aplicaciones</h4><p>Gracias a la compatibilidad mejorada con los marcos abiertos, es posible compilar, implementar y escalar aplicaciones y sitios web de manera más flexible al permitir la portabilidad de las aplicaciones entre los entornos locales y las nubes públicas y de proveedores de servicios.</p></div></div><div class="col s12 l6 ventaja"><div class="col s3"><img src="<?= htmlspecialchars($pub_img) ?>microsoft4.png"></div><div class="col s9"><h4>El usuario en el punto de mira</h4><p>Implemente una infraestructura de escritorio virtual y reduzca los costos de almacenamiento de manera significativa. Aproveche para esto las distintas opciones de almacenamiento y la desduplicación de discos duros virtuales.</p></div></div></div></div><div class="col s12"><h4>La evolución de Windows Server</h4><p>Windows Server 2012 R2 resulta en un rendimiento elevado y acomoda cargas de trabajo de gran escala e innovaciones en la infraestructura para almacenamiento, identidad, redes, virtualización y más. Windows Server 2012 R2 es una plataforma de categoría empresarial que ofrece 5 veces más procesadores lógicos, 4 veces más memoria física y 16 veces más memoria para cada máquina virtual. La siguiente tabla ofrece un resumen de las características disponibles en las diferentes versiones de Windows Server.</p><p>Compare la escalabilidad de Windows Server </p><div><h2>Compare la escala de Windows Server</h2>
<table class="striped">
    
    <thead>
        <tr role="row">
            <th><span>Sistema</span></th>
            <th></th>
            <th><span>Windows Server 2008 R2</span></th>
            <th><span>Windows Server 2012 R2</span></th>
        </tr>
    </thead>
    
    <tbody>
    
        <tr role="row">            
            <td><span><b>Host</b></span></td>            
            <td><span>Procesadores lógicos</span></td>            
            <td><span>64</span></td>            
            <td><span>320</span></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Memoria física</span></td>            
            <td><span>1&nbsp;TB</span></td>            
            <td><span>4&nbsp;TB</span></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Procesadores virtuales por host</span></td>            
            <td><span>512</span></td>            
            <td><span>2,048</span></td>            
        </tr>
        
        <tr role="row">            
            <td><span><b>Máquina virtual</b></span></td>            
            <td><span>Procesadores virtuales por VM</span></td>            
            <td><span>64&nbsp;GB</span></td>            
            <td><span>1&nbsp;TB</span></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Capacidad de disco duro</span></td>            
            <td><span>2&nbsp;TB</span></td>            
            <td><span>64&nbsp;TB</span></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Máquinas virtuales activas</span></td>            
            <td><span>384</span></td>            
            <td><span>1,024</span></td>            
        </tr>
        
        <tr role="row">            
            <td><span><b>Clúster</b></span></td>            
            <td><span>Nodos</span></td>            
            <td><span>16</span></td>            
            <td><span>64</span></td>            
        </tr>
        
        <tr role="row">            
            <td></td>            
            <td><span>Máquinas virtuales</span></td>            
            <td><span>1,000</span></td>            
            <td><span>8,000</span></td>            
        </tr>
        
    </tbody>
    
</table></div><p>Compare las versiones de Windows Server </p><div><h2>Compare las versiones de Windows Server</h2>
<table class="striped">
    
    <thead>
        <tr role="row">      
            <th><span>Características</span></th>
            <th></th>
            <th><span>Server 2003</span></th>
            <th><span>Server 2008 / 2008 R2</span></th>
            <th><span>Server 2012</span></th>
            <th><span>Server 2012 R2</span></th>
        </tr>
    </thead>
    
    <tbody>
    
        <tr role="row">
            <td><span><b>Identidad y acceso</b></span></td>            
            <td><span>Servicios de Active Directory</span></td>            
            <td class="ball"></td>
            <td class="ball"></td>
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td></td>            
            <td><span>Control de acceso dinámico</span></td>            
            <td></td>            
            <td></td>            
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td></td>            
            <td><span>Virtualización de AD</span></td>            
            <td></td>            
            <td></td>            
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td><span><b>Virtualización</b></span></td>            
            <td><span>Migración en tiempo real sin nada compartido</span></td>            
            <td></td>            
            <td></td>            
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td></td>            
            <td><span>Réplica de Hyper-V</span></td>            
            <td></td>            
            <td></td>            
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td></td>            
            <td><span>Clústeres de Hyper-V</span></td>            
            <td></td>            
            <td class="ball"></td>
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td></td>            
            <td><span>Infraestructura de escritorio virtual</span></td>            
            <td></td>            
            <td class="ball"></td>
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td><span><b>Almacenamiento</b></span></td>            
            <td><span>Espacios de almacenamiento con niveles</span></td>            
            <td></td>            
            <td></td>            
            <td></td>            
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td></td>            
            <td><span>VHDX compartido</span></td>            
            <td></td>            
            <td></td>            
            <td></td>            
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td></td>            
            <td><span>Migración de almacenamiento en tiempo real</span></td>            
            <td></td>            
            <td></td>            
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td></td>            
            <td><span>QoS para el almacenamiento</span></td>            
            <td></td>            
            <td></td>            
            <td></td>            
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td></td>            
            <td><span>Volúmenes compartidos de clúster</span></td>            
            <td></td>            
            <td class="ball"></td>
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td><span><b>Plat. de aplicaciones y web</b></span></td>            
            <td><span>Sitios web multiempresa de alta densidad</span></td>            
            <td></td>            
            <td class="ball"></td>
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td></td>            
            <td><span>Escalabilidad con NUMA</span></td>            
            <td></td>            
            <td></td>            
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td></td>            
            <td><span>Restricciones de IP dinámicas</span></td>            
            <td></td>            
            <td></td>            
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td><span><b>Redes</b></span></td>            
            <td><span>Virtualización de redes Hyper-V</span></td>            
            <td></td>            
            <td></td>            
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td></td>            
            <td><span>Formación de equipos NIC</span></td>            
            <td></td>            
            <td></td>            
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td></td>            
            <td><span>Administración de direcciones IP</span></td>            
            <td></td>            
            <td></td>            
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td><span><b>Automatización y administración</b></span></td>            
            <td><span>Server Core</span></td>            
            <td></td>            
            <td class="ball"></td>
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td></td>            
            <td><span>Administración multiservidor</span></td>            
            <td></td>            
            <td></td>            
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td></td>            
            <td><span>Windows PowerShell</span></td>            
            <td class="ball"></td>
            <td class="ball"></td>
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>
        
        <tr role="row">
            <td></td>            
            <td><span>Flujo de trabajo con Windows PowerShell y acceso Internet</span></td>            
            <td></td>            
            <td></td>            
            <td class="ball"></td>
            <td class="ball"></td>     
        </tr>

    </tbody>
</table></div><p>La plataforma de servidor y nube sencilla y económica</p><p>Windows Server 2012 R2 le permite aprovechar sus conocimientos e inversiones existentes para optimizar el negocio para la nube.</p><p>Compare las características visitando el siguiente </p><div><h2 class="accordion-title">Características</h2>

<ul class="collapsible" data-collapsible="expandable">
    
    <li>
    <div class="collapsible-header">Virtualización de servidor</div>
    <div class="collapsible-body">
                        
                <p>Aproveche el ahorro que supone la virtualización y maximice las inversiones en hardware de servidor mediante la consolidación de los servidores como máquinas virtuales en un único host físico. Hyper-V ejecuta varios sistemas operativos (como Windows, Linux y otros) en paralelo, en un único servidor. Windows Server 2012 R2 amplía la funcionalidad de Hyper-V con características adicionales y escalabilidad inigualadas en lo que a procesadores host y memoria se refiere. 
                
                <a target="_blank" href="http://download.microsoft.com/download/A/2/7/A27F60C3-5113-494A-9215-D02A8ABCFD6B/Windows_Server_2012_R2_Server_Virtualization_White_Paper.pdf">Más información
                </a>

                </p>
                
    </div>    
    </li>

    <li>    
    <div class="collapsible-header">Almacenamiento</div>
    <div class="collapsible-body">
                        
                <p>Sea cual sea su plataforma de almacenamiento, los datos que contiene son la base de su negocio. Windows Server 2012 R2 le ayuda a optimizar su inversión actual en almacenamiento; por ejemplo, en redes SAN. También le permite crear soluciones de almacenamiento escalables de alta disponibilidad y alto rendimiento mediante el uso de hardware estándar en el sector y Windows Server 2012 R2. Con la ayuda de Windows Server 2012 R2, puede estar seguro de que su almacenamiento estará disponible de manera continua y, en consecuencia, también lo estarán sus servicios. 
                
                <a target="_blank" href="http://download.microsoft.com/download/9/4/A/94A15682-02D6-47AD-B209-79D6E2758A24/Windows_Server_2012_R2_Storage_White_Paper.pdf">Más información
                </a>

                </p>
                
    </div>    
    </li>

    <li>    
    <div class="collapsible-header">Redes</div>
    <div class="collapsible-body">
                        
                <p>Puede administrar una red completa como un único servidor. De esta forma, obtiene la confiabilidad y escalabilidad de varios servidores por un costo menor. La redistribución automática en caso de errores de almacenamiento, servidor o red mantiene los servicios de archivo alineados con un tiempo de inactividad mínimo, prácticamente imperceptible. Junto con System Center 2012 R2, Windows Server 2012 R2 puede proporcionar una solución de red definida en software de un extremo a otro en las implementaciones de nube pública, privada e híbrida.
                
                <a target="_blank" href="http://download.microsoft.com/download/E/0/A/E0A3CB9E-5E76-46C1-83BD-D40FD96600E1/Windows_Server_2012_R2_Networking_White_Paper.pdf">Más información
                </a>

                </p>
                
    </div>    
    </li>

    <li>    
    <div class="collapsible-header">Automatización y administración de servidores</div>
    <div class="collapsible-body">
                        
                <p>A partir de un enfoque de administración basado en estándares, Windows Management Framework proporciona una plataforma común para la automatización e integración con el fin de ayudar a automatizar las tareas rutinarias con herramientas como Windows PowerShell. Existen otras mejoras que simplifican la implementación, garantizan que los componentes de los centros de datos tengan la configuración correcta y que permiten tomar medidas para administrar varios servidores a través de un panel único y pertinente en el Administrador del servidor.
                
                <a target="_blank" href="https://technet.microsoft.com/library/hh801900.aspx">Más información</a>

                </p>
                

    </div>    
    </li>

    <li>    
    <div class="collapsible-header">Plataforma de aplicaciones y web</div>
    <div class="collapsible-body">
                        
                <p>Windows Server 2012 R2 se basa en la tradición de la familia Windows Server como plataforma de aplicaciones demostrada, con miles de aplicaciones compiladas e implementadas y una comunidad de millones de desarrolladores expertos y cualificados perfectamente instaurada. Permite compilar e implementar aplicaciones en un entorno local o en la nube, o en ambos a la vez, gracias a las soluciones híbridas que funcionan en uno y otro. 
                
                <a target="_blank" href="https://technet.microsoft.com/library/hh831725">Más información</a>

                </p>
                

    </div>    
    </li>

    <li>    
    <div class="collapsible-header">Protección de la información</div>
    <div class="collapsible-body">
                        
                <p>Las soluciones de protección de la información de Microsoft le permiten administrar una única identidad para cada usuario, en aplicaciones tanto locales como basadas en la nube (SaaS). Debe definir el nivel de acceso de cada usuario a la información y las aplicaciones en función de quién es, a qué accede y desde qué dispositivo, y aplicar incluso la autenticación multifactor. Puede proporcionar acceso remoto seguro a los trabajadores móviles por medio de las funciones de Acceso remoto de Windows Server (RRAS) DirectAccess y VPN (incluidas las conexiones VPN automáticas) y permitir que los usuarios sincronicen los archivos del trabajo desde un servidor corporativo con sus dispositivos. También se pueden administrar los dispositivos móviles para eliminar los datos corporativos y las aplicaciones en caso de pérdida, sustracción o baja del dispositivo.
                
                <a target="_blank" href="https://www.microsoft.com/es-xl/server-cloud/solutions/information-protection.aspx">Más información</a>

                </p>
                

    </div>    
    </li>

    <li>    
    <div class="collapsible-header">Infraestructura de escritorio virtual (VDI)</div>
    <div class="collapsible-body">
                    
            <p>Con Windows Server 2012 R2, es incluso más fácil implementar y entregar recursos virtuales en distintos dispositivos. Las tecnologías de VDI permiten acceder fácilmente, prácticamente desde cualquier dispositivo, a un entorno Windows completo, de una fidelidad absoluta, que se ejecuta en el centro de datos. A través de Hyper-V y los Servicios de Escritorio remoto, Microsoft ofrece tres opciones flexibles de implementación de VDI con una sola solución: escritorios combinados, escritorios personales y sesiones de Escritorio remoto.
            
            <a target="_blank" href="https://www.microsoft.com/es-xl/server-cloud/products/virtual-desktop-infrastructure/overview.aspx">Más información</a>

            </p>
            
    </div>
    </li>

</div>
</div></div></div><?php elseif ($params['item'] == 1) : ?><div id="nosotros"><div class="last_line"><div class="container"><div class="conllap_side"><b>Acerca de Nosotros</b><ul data-collapsible="accordion" class="collapsible"><li><div class="collapsible-header">Visión</div><div class="collapsible-body"><p>Procuramos ser  una organización líder en el sector informático que trabaja con Honestidad y Diligencia,  brindando  un servicio diferenciado en  cada una de nuestras unidades  de negocio.</p></div></li><li><div class="collapsible-header active">Misión</div><div class="collapsible-body"><p>Proporcionamos soluciones oportunas e integrales ofreciendo productos y servicios de Tecnología Informática, que genere óptimos resultados y relaciones de largo plazo con nuestros clientes y socios comerciales  a través de un equipo de consultores,  comprometidos con los valores de la empresa. </p></div></li><li><div class="collapsible-header">Valores</div><div class="collapsible-body"><p> 
<span>Honestidad</span> e Integridad base fundamental que crea una sólida cultura organizacional.<br>
<span>Comunicación Efectiva</span>  que  genere confianza, efectividad  y bienestar en nuestras actividades.<br>
<span>Profesionalismo</span> contamos con personas proactivas que ayuden a corregir fallos y a buscar soluciones integrales con disciplina, esfuerzo y humildad.<br>
<span>Trabajo en Equipo</span> que logra  óptimos resultados.</p></div></li></ul></div><div class="img_side"><img src="<?= htmlspecialchars($post['img']) ?>"></div></div></div></div><?php elseif ($params['item'] == 27) : ?><div id="servidores" class="infraestructura"><div class="col s12"><p><strong>¿Deseas modernizar e integrar la información de tu empresa?</strong></p><p>Adquirir un server o servidor es un equipo que, formando parte de una red, te provee servicios a tus diferentes usuarios, este asesoramiento es fundamental para dimensionar el equipo adecuado que crezca con tu empresa. </p><p>Hace un tiempo la importancia de contar con un servidor estaba centrada en poder compartir archivos e impresoras. Hoy la importancia de un servidor está centrada en poder habilitar servicios para una organización o empresa, es decir generar escenarios de movilidad, alta seguridad, acceso remoto a empleados, sitios web para clientes, integración con servicios de nube, por solo nombrar algunos escenarios. Los beneficios más importantes están en poder reducir costos al integrar las diferentes tecnologías existentes en la empresa, ser más seguros y tener mejor control para así evitar pérdidas de información.</p><p>Multimport, puede brindarte esta asesoría como apoyo porque contamos con las principales marcas como:</p><div class="col s12"><a target="_blank" href="https://www.hpe.com/lamerica/es/servers.html#tab=TAB2"><img src="<?= htmlspecialchars($pub_img) ?>i_hp.png"></a></div><div class="col s12 m4"><img src="<?= htmlspecialchars($pub_img) ?>i_blades.png"></div><div class="col s12 m4"><img src="<?= htmlspecialchars($pub_img) ?>i_torre.png"></div><div class="col s12"><a target="_blank" href="http://www.dell.com/learn/pe/es/pebsdt1/campaigns/server-solutions"><img src="<?= htmlspecialchars($pub_img) ?>i_dell.png"></a></div><div class="col s12 m4"><img src="<?= htmlspecialchars($pub_img) ?>i_dell2.png"></div><div class="col s12"><a target="_blank" href="http://shop.lenovo.com/pe/es/systems/"><img src="<?= htmlspecialchars($pub_img) ?>i_lenovo.png"></a></div><div class="col s12 m4"><img src="<?= htmlspecialchars($pub_img) ?>i_racks.png"></div><div class="col s12 m4"><img src="<?= htmlspecialchars($pub_img) ?>i_torre2.png"></div></div></div><?php elseif ($params['item'] == 28) : ?><div id="storage" class="infraestructura"><div class="col s12"><p><strong>Storage</strong></p><p><strong>El riesgo y valor más alto en una empresa es perder su información.</strong></p><p>Proteger y almacenar la información todavía es una tarea pendiente en las empresas. Las faltas de políticas de storage en las compañías responden a la ausencia de cultura respecto a la importancia de respaldar los datos, mientras que para otros a una excesiva confianza en que la pérdida de información no los afectará. Los proveedores de storage apuestan a que esta industria crecerá y que las empresas entenderán que guardar los datos es sinónimo de protección y que permite la continuidad del negocio.</p><p>Multimport y las principales empresas que brindan soluciones integrales de server + storage </p><div class="col s12"><a target="_blank" href="https://www.hpe.com/lamerica/es/storage.html"><img src="<?= htmlspecialchars($pub_img) ?>i_hp2.png"></a></div><div class="col s12 m4"><img src="<?= htmlspecialchars($pub_img) ?>i_hp3.png"></div><div class="col s12"><a target="_blank" href="http://shop.lenovo.com/pe/es/systems/almacenamiento"><img src="<?= htmlspecialchars($pub_img) ?>i_lenovo2.png"></a></div><div class="col s12 m4"><img src="<?= htmlspecialchars($pub_img) ?>i_almacenamiento_1.png"></div><div class="col s12 m4"><img src="<?= htmlspecialchars($pub_img) ?>i_almacenamiento_2.png"></div><div class="col s12 m4"><img src="<?= htmlspecialchars($pub_img) ?>i_almacenamiento_3.png"></div></div></div><?php elseif ($params['item'] == 29) : ?><div id="virtualizacion" class="infraestructura"><div class="col s12"><p><strong>Virtualización</strong></p><p>Consiga una virtualización de tipo empresarial para su centro de datos y nube híbrida</p><p>Refuerce la eficiencia y la flexibilidad de las tecnologías de la información con una implementación y un mantenimiento virtualizados y más rápidos de las aplicaciones. Las soluciones de virtualización permiten reducir los costos mediante la consolidación de un mayor número de cargas de trabajo en menos servidores. Mejore la agilidad y la flexibilidad de TI de manera local y en la nube con las soluciones de virtualización.</p><p>En Multimport tenemos la experiencia necesaria en virtualización de los diferentes fabricantes lo que nos permite tener un conocimiento amplio de las soluciones de:</p><div class="col s12 m4"><a target="_blank" href="https://www.microsoft.com/es-es/server-cloud/solutions/virtualization.aspx"><img src="<?= htmlspecialchars($pub_img) ?>i_windows.png"></a></div><div class="col s12 m4"><a target="_blank" href="https://www.redhat.com/en/technologies/virtualization"><img src="<?= htmlspecialchars($pub_img) ?>i_redhat.png"></a></div><div class="col s12 m4"><a target="_blank" href="http://www.vmware.com/latam/virtualization/overview"><img src="<?= htmlspecialchars($pub_img) ?>i_vmware.png"></a></div></div></div><?php elseif ($params['item'] == 30) : ?><div id="proteccion" class="infraestructura"><div class="col s12"><p><strong>Protección Eléctrica</strong></p><p>Toda instalación eléctrica que se requiere para la utilización de equipos electrónicos tienen que estar dotados de una serie de protecciones que la hagan segura, tanto desde el punto de vista de los conductores y los aparatos a ellos conectados y principalmente de las personas que han de trabajar con ella.</p><p>En este contexto trabajamos con APC garantizando soluciones en diferentes tecnologías de acuerdo a la necesidad para la alimentación, protección o respaldo de aquellos sistemas que deben ser suministrados eléctricamente de manera continua, debido a la importancia y cargas críticas de los procesos en que están involucrados.</p><div class="col s12"><a target="_blank" href="http://www.apcperu.com/index.php"><img src="<?= htmlspecialchars($pub_img) ?>i_apc.png"></a></div><div class="col s4"><img src="<?= htmlspecialchars($pub_img) ?>i_apc2.png"></div></div></div><?php elseif ($params['item'] == 31) : ?><div id="computo" class="infraestructura"><div class="col s12"><p><strong>Computo</strong></p></div></div><?php elseif ($params['item'] == 32) : ?><div id="impresion" class="infraestructura"><div class="col s12"><p><strong>Impresión</strong></p></div></div><?php elseif ($params['item'] == 33) : ?><div id="infraestructura"><div class="galleries"><?php if ($main) : ?><h1><?php mixin__item(null, array(), $gallery) ?></h1><?php $main = false ?><?php else : ?><h2><?php mixin__item(null, array(), $gallery) ?></h2><?php endif ?></div><div class="col s12"><p>En el actual mundo de los negocios es primordial que las empresas utilicen una adecuada tecnología de la información para ofrecer respuestas más ágiles a las exigencias del mercado y por ende ser más competitivos y rentables.</p><p>En este contexto Multimport en alianza estratégica con las principales marcas del sector TI ofrece una solución integral, que le permita a su empresa, crecer gradualmente y realizar inversiones según su necesidad, dedicándose Ud. al core de su negocio y nosotros al equipamiento de sus necesidades TI en :</p><ul class="botones row"><li id="computo" class="col l4 m6 s12"><a href="infraestructura/equipos-de-computo/31">Equipos de Computo</a></li><li id="impresion" class="col l4 m6 s12"><a href="infraestructura/impresion-e-imagen/32">Impresión e imagen</a></li><li id="virtualizacion" class="col l4 m6 s12"><a href="infraestructura/virtualizacion/29">Virtualización</a></li><li id="servidores" class="col l4 m6 s12"><a href="infraestructura/servidores/27">Servidores</a></li><li id="storage" class="col l4 m6 s12"><a href="infraestructura/storage/28">Storage</a></li><li id="proteccion" class="col l4 m6 s12"><a href="infraestructura/proteccion-electrica/30">Protección Eléctrica</a></li></ul></div></div><?php endif ?></article></div></div></main><footer><div class="white"></div><div class="container"><ul class="footer_menu"><li><a href="desarrollo">INICIO</a></li><li><a href="pagina/nosotros/1">NOSOTROS</a></li><li><a href="pagina-infraestructura-ti/1">UNIDADES DE NEGOCIOS</a></li><li><a href="clientes">CLIENTES</a></li><li><a href="contactenos">CONTACTENOS</a></li></ul><div class="direccion">Jr. Aguamarina 122 Urb. San Antonio Callao 02<br>
Teléfonos: (511) 429-0000<br>
429-6943 / 429 9809<br></div><div class="copyright">Copyright © Multimport Srl todos los derechos reservados</div><nav class="transparent z-depth-0"><ul class="right menu"><div class="container"><?php if ($visiters) : ?><li><?= htmlspecialchars($visiters) ?> visitas</li><?php endif ?><?php mixin__menu_items(null, array(), $menu_footer) ?></div></ul></nav>
</div></footer><script type="text/javascript">var ven_css='<?= htmlspecialchars($ven_css) ?>';</script><script src="<?= htmlspecialchars($ven_js) ?>jquery-2.1.4.min.js"></script><script src="<?= htmlspecialchars($ven_js) ?>materialize.min.js"></script><script src="<?= htmlspecialchars($ven_js) ?>loadcss.js"></script><script src="<?= htmlspecialchars($ven_js) ?>require.js" data-main="<?= htmlspecialchars($ven_js) ?>"></script><script src="<?= htmlspecialchars($pub_js) ?><?= htmlspecialchars($build_js) ?>"></script><?php if ($analytics && !$localhost) : ?><script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', '<?= htmlspecialchars($analytics) ?>', 'auto');
ga('send', 'pageview');
</script><?php endif ?><?php if ($opengraph) : ?><div id="fb-root"></div><script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.6&appId=276802375855277";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script><?php endif ?></body></html>