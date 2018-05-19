<?php if (!function_exists('mixin__button_side_nav')) { function mixin__button_side_nav($block = null, $attributes = array()) { ?><a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a><?php } } ?><?php if (!function_exists('mixin__post_item')) { function mixin__post_item($block = null, $attributes = array(), $post = null, $imgfirst = null, $type = null) { global $■;$■['post'] = $post;$■['imgfirst'] = $imgfirst;$■['type'] = $type;?><?php if ($post['name']) : ?><?php if ($type == 'h1') : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php elseif ($type == 'h2') : ?><h2><?php mixin__item(null, array(), $post) ?></h2><?php elseif ($type == 'h3') : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php elseif ($type == 'h4') : ?><h4><?php mixin__item(null, array(), $post) ?></h4><?php else : ?><h3><?php mixin__item(null, array(), $post) ?></h3><?php endif ?><?php endif ?><?php if ($post['html']) : ?><div><?= $post['html'] ?></div><?php endif ?><?php if ($post['text']) : ?><div><p><?= htmlspecialchars($post['text']) ?></p></div><?php endif ?><?php mixin__img_item(null, array(), $post) ?><?php if ($post['video']) : ?><?php mixin__post_video(null, array(), $post['video']) ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__post_video')) { function mixin__post_video($block = null, $attributes = array(), $video = null) { global $■;$■['video'] = $video;?><div class="video-container"><iframe width="853" height="480" src="//www.youtube.com/embed/<?= htmlspecialchars($video) ?>?rel=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div><?php } } ?><?php if (!function_exists('mixin__items_list')) { function mixin__items_list($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li class="collection-item"><?php mixin__link_item(null, array(), $men_item) ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__link_item')) { function mixin__link_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><a href="<?= htmlspecialchars(strtolower($item['url'])) ?>" rel="<?= htmlspecialchars($item['rel']) ?>" title="<?= htmlspecialchars(strtolower($item['name'])) ?>" target="<?= htmlspecialchars($item['target']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?= htmlspecialchars($item['name']) ?> <?php if ($item['sub']) : ?><b><?= htmlspecialchars($item['sub']) ?></b><?php endif ?></a><?php } } ?><?php if (!function_exists('mixin__item')) { function mixin__item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['url']) : ?><?php mixin__link_item(null, array(), $item) ?><?php else : ?><span><?= htmlspecialchars($item['name']) ?></span><?php endif ?><?php } } ?><?php if (!function_exists('mixin__imgg')) { function mixin__imgg($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['name']) : ?><img src="<?= htmlspecialchars($item['img']) ?>" alt="<?= htmlspecialchars(strtolower($item['name'])) ?>" title="<?= htmlspecialchars(strtolower($item['name'])) ?>" data-caption="<?= htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php else : ?><img src="<?= htmlspecialchars($item['img']) ?>" alt="foto" title="foto" class="responsive-img"/><?php endif ?><?php } } ?><?php if (!function_exists('mixin__img_item')) { function mixin__img_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['img']) : ?><?php if ($item['url']) : ?><a href="<?= htmlspecialchars(strtolower($item['url'])) ?>" target="<?= htmlspecialchars($item['target']) ?>" title="<?= htmlspecialchars(strtolower($item['name'])) ?>"<?php attr_class(add("photo ", $item['aclass'], "")) ?>><?php mixin__imgg(null, array(), $item) ?></a><?php else : ?><div class="photo"><?php mixin__imgg(null, array(), $item) ?></div>
<?php endif ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items')) { function mixin__menu_items($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li<?php attr_class(add("", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?><?php if ($men_item['items']) : ?><ul class="submenu "><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul><?php endif ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items_collapsible')) { function mixin__menu_items_collapsible($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><?php if ($men_item['items']) : ?><li class="collapse collection-item"><a<?php attr_class(add("collapsible-header waves-effect ", $men_item['class'], "")) ?>><?= htmlspecialchars($men_item['name']) ?></a><div class="collapsible-body"><ul><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul></div></li><?php else : ?><li<?php attr_class(add("", $clas, " collection-item ", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?></li><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__video_youtube')) { function mixin__video_youtube($block = null, $attributes = array(), $video = null) { global $■;$■['video'] = $video;?><iframe width="853" height="480" src="//www.youtube.com/embed/<?= htmlspecialchars($video) ?>?rel=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe><?php } } ?><?php if (!function_exists('mixin__form')) { function mixin__form($block = null, $attributes = array(), $name = null, $form = null) { global $■;$■['name'] = $name;$■['form'] = $form;?><?php if ($form) : foreach ($form as $item) : $■['item'] = $item; ?><?php $clas = ($item['divclass']) ? $item['divclass'] : "col s12" ?><?php if ($item['group']) : ?><div class="col s12 group"><?= htmlspecialchars($item['group']) ?></div><?php endif ?><?php if ($item['hidden']) : ?><?php mixin__input_hidden(null, array(), $name, $item) ?><?php else : ?><?php if ($item['type'] == 'textarea') : ?><?php mixin__input_textarea(null, array(), $name, $item, $clas) ?><?php elseif ($item['type'] == 'select') : ?><?php mixin__input_select(null, array(), $name, $item, $clas, $options) ?><?php elseif ($item['type'] == 'select_2') : ?><?php mixin__input_select_2(null, array(), $name, $item, $clas, $options) ?><?php elseif ($item['type'] == 'file') : ?><?php mixin__input_file(null, array(), $name, $item, $clas) ?><?php elseif ($item['type'] == 'date') : ?><?php mixin__input_date(null, array(), $name, $item, $clas) ?><?php else : ?><?php mixin__input_text(null, array(), $name, $item, $clas) ?><?php endif ?><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__input_hidden')) { function mixin__input_hidden($block = null, $attributes = array(), $name = null, $line = null) { global $■;$■['name'] = $name;$■['line'] = $line;?><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="hidden" value="<?= htmlspecialchars($line['value']) ?>"/><?php } } ?><?php if (!function_exists('mixin__input_text')) { function mixin__input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><?php if ($line['required']) : ?><input required="required" id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>" oninvalid="this.setCustomValidity('El campo no puede estar vació')"<?php attr_class(add("", $line['class'], "")) ?>/><?php else : ?><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><?php endif ?><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_textarea')) { function mixin__input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><textarea id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?= htmlspecialchars($line['value']) ?></textarea><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_select')) { function mixin__input_select($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><select id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>"><option value="" disabled="disabled" selected="selected"><?= htmlspecialchars($line['label']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><option value="<?= htmlspecialchars($item) ?>"><?= htmlspecialchars($item) ?></option><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__input_select_2')) { function mixin__input_select_2($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><select id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" class="browser-default"><option value="" disabled="disabled" selected="selected"><?= htmlspecialchars($line['label']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><option value="<?= htmlspecialchars($item) ?>"><?= htmlspecialchars($item) ?></option><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__input_file')) { function mixin__input_file($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field file-field ", $clas, "")) ?>><div class="btn"><span>Archivo</span><input type="file"/></div><div class="file-path-wrapper"><input type="text" class="file-path validate"/></div></div><?php } } ?><?php if (!function_exists('mixin__input_date')) { function mixin__input_date($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?> </label><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="text" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("datepicker ", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_text')) { function mixin__simple_input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" placeholder="<?= htmlspecialchars($line['label']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_textarea')) { function mixin__simple_input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><textarea id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" placeholder="<?= htmlspecialchars($line['label']) ?>" name="<?= htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?= htmlspecialchars($line['value']) ?></textarea></div><?php } } ?><?php if (!function_exists('mixin__simple_input_select')) { function mixin__simple_input_select($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><select id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" class="browser-default"><option value="" disabled="disabled" selected="selected">Seleccione <?= htmlspecialchars($line['name']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><option value="<?= htmlspecialchars($item) ?>"><?= htmlspecialchars($item) ?></option><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__simple_input_file')) { function mixin__simple_input_file($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input type="file"/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_date')) { function mixin__simple_input_date($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("datepicker ", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__input_submit')) { function mixin__input_submit($block = null, $attributes = array(), $msg = null) { global $■;$■['msg'] = $msg;?><div class="input-field col s12"><button type="submit" class="btn waves-effect waves-blue submit"><?= htmlspecialchars($msg) ?></button></div><?php } } ?><?php if (!function_exists('mixin__card_sended')) { function mixin__card_sended($block = null, $attributes = array(), $msg = null) { global $■;$■['msg'] = $msg;?><?php if ($msg) : ?><div class="card-panel lime lighten-5"><?= $msg ?></div><?php endif ?><?php } } ?><!DOCTYPE html><html lang="es"><head><base href="<?= htmlspecialchars($base) ?>"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge"><link href="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($icon) ?>" rel="shortcut icon" type="image/png"><link href="<?= htmlspecialchars($pub_css) ?><?= htmlspecialchars($build_css) ?>" type="text/css" rel="stylesheet" media="screen,projection"><title><?= htmlspecialchars($head_title) ?></title><?php if ($canonical) : ?><link rel="canonical" href="<?= htmlspecialchars($canonical) ?>"><?php endif ?><?php if ($head_description) : ?><meta name="description" content="<?= htmlspecialchars($head_description) ?>"><?php endif ?><?php if ($head_keywords) : ?><meta name="keywords" content="<?= htmlspecialchars($head_keywords) ?>"><?php endif ?><?php if ($opengraph) : ?><meta name="og:url" content="<?= htmlspecialchars($baseurl) ?><?= htmlspecialchars($canonical) ?>"><meta name="og:type" content="website"><meta name="og:title" content="<?= htmlspecialchars($head_title) ?>"><?php endif ?><meta name="robots" content="index, follow"><?php if ($map) : ?><script src="//maps.google.com/maps/api/js?key=<?= htmlspecialchars($gmap_key) ?>"></script><script src="<?= htmlspecialchars($ven_js) ?>gmaps.js"></script><?php endif ?></head><?php if ($pre_output) : ?><div style="background:#eee;" class="pre_output"><?= $pre_output ?></div><?php endif ?><body<?php attr_class(add("", $classbody, "")) ?>><header class="navbar-fixed"><?php if ($is_home) : ?><h1><?= htmlspecialchars($web_name) ?></h1><?php $main = false ?><?php endif ?><section class="header_pre hide-on-med-and-down"><nav><div class="container"><ul class="menu"><?php if ($web_facebook) : ?><li class="facebook"><a target="_blank" href="<?= htmlspecialchars($web_facebook) ?>"></a></li><?php endif ?><?php if ($web_youtube) : ?><li class="youtube"><a target="_blank" href="<?= htmlspecialchars($web_youtube) ?>"></a></li><?php endif ?><?php if ($web_twitter) : ?><li class="twitter"><a target="_blank" href="<?= htmlspecialchars($web_twitter) ?>"></a></li><?php endif ?><?php if ($web_whatsapp) : ?><li class="whatsapp"><?= $web_whatsapp ?></li><?php endif ?><?php if ($web_phone) : ?><li class="phone"><?= $web_phone ?></li><?php endif ?><?php if ($web_email) : ?><li class="email"><?= $web_email ?></li><?php endif ?></ul></div></nav></section><nav><div class="container"><?php mixin__button_side_nav() ?><ul class="menu menu_top"><li class="brand-logo"><a href="<?= htmlspecialchars($link_home) ?>" title="<?= htmlspecialchars($web_name) ?>"><img src="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($logo) ?>" title="<?= htmlspecialchars($web_name) ?>" alt="<?= htmlspecialchars($web_name) ?>"></a></li><?php mixin__menu_items(null, array(), $menu_top) ?></ul></div></nav></header><ul id="mobile-nav" class="menu_left side-nav collapsible collapsible-accordion"><?php mixin__menu_items_collapsible(null, array(), $menu_left) ?></ul><main class="container row"><div class="post project"><?php mixin__card_sended(null, array(), $message) ?><div class="cabecera"><?php if ($breadcrumb) : ?><ol class="breadcrumb"><?php if ($breadcrumb) : foreach ($breadcrumb as $item) : $■['item'] = $item; ?><?php if ($item['class']) : ?><li<?php attr_class(add("", $item['class'], "")) ?>><?php mixin__item(null, array(), $item) ?></li><?php else : ?><li><?php mixin__item(null, array(), $item) ?></li><?php endif ?><?php endforeach; endif ?></ol><?php endif ?><div class="contacts cparts"><span class="whatsapp"><a href="tel:<?= htmlspecialchars($web_whatsapp) ?>"><?= htmlspecialchars($web_whatsapp) ?></a></span><span class="cotizar hide-on-med-and-down"><a href="#cotizar">Consultar</a></span></div></div><div class="row"><div class="col s12 l12"><article class="card-panel galleries product_detail"><div class="row"><div class="col s12 l6 main"><h1><?= htmlspecialchars($post['name']) ?></h1><h3><?= htmlspecialchars($post['marca']) ?></h3><div data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true" class="fb-like"></div><div><?= $post['html'] ?></div><?php if ($post['precio'] != 'S/.') : ?><div class="precio"><?= htmlspecialchars($post['precio']) ?></div><?php endif ?><?php if ($post['oferta'] != '') : ?><div class="oferta"><?= htmlspecialchars($post['oferta']) ?></div><?php endif ?><?php if ($post['adjunto']) : ?><div><a href="<?= htmlspecialchars($post['adjunto']) ?>" class="waves-effect waves-light btn-large right-align download"><i></i> Descargar Ficha Técnica</a></div><?php endif ?></div><div class="col s12 l6 fotos"><div class="row"><div class="col s3 m2 train"><?php if ($fotos) : foreach ($fotos as $foto) : $■['foto'] = $foto; ?><div><a><img src="<?= htmlspecialchars($foto['img']) ?>" class="responsive-img"></a></div><?php endforeach; endif ?></div><div class="col s9 m10 foto"><a href="<?= htmlspecialchars($fotos[0]['img']) ?>" class="zoom"><img src="<?= htmlspecialchars($fotos[0]['img']) ?>" class="responsive-img"></a></div></div></div></div></article></div><div id="cotizar" class="col l6 offset-l3 scrollspy form_consulta"><article class="card-panel"><h2>Consultar</h2><form method="POST" name="contact"><?php mixin__form(null, array(), 'contact', $contact) ?><?php mixin__input_submit(null, array(), 'ENVIAR') ?></form></article></div></div></div></main><section class="pages_footer row"><div class="col s12 m6 l6"><img src="<?= htmlspecialchars($pub_img) ?>nosotros-1.png"></div><div class="col s12 m6 l6"><img src="<?= htmlspecialchars($pub_img) ?>nosotros-2.png"></div></section><footer><div class="container"><ul><li><h3>CONTÁCTANOS</h3></li><?php if ($web_facebook) : ?><li class="facebook icon-circle"> <a title="Facebook" target="_blank" href="<?= htmlspecialchars($web_facebook) ?>"></a></li><?php endif ?><?php if ($web_youtube) : ?><li class="youtube icon-circle"><a title="Youtube" target="_blank" href="<?= htmlspecialchars($web_youtube) ?>"></a></li><?php endif ?><?php if ($web_twitter) : ?><li class="twitter icon-circle"><a title="Twitter" target="_blank" href="<?= htmlspecialchars($web_twitter) ?>"></a></li><?php endif ?><li><span>Teléfono <?= htmlspecialchars($web_phone) ?></span></li><li><span>E-mail: <?= htmlspecialchars($web_email) ?></span></li></ul><ul class="menu"><li><h3>LA EMPRESA</h3></li><?php if ($visiters) : ?><li><?= htmlspecialchars($visiters) ?> visitas</li><?php endif ?><?php mixin__menu_items(null, array(), $menu_footer) ?></ul></div></footer><script type="text/javascript">var ven_css      ='<?= htmlspecialchars($ven_css) ?>';
var pub_img      ='<?= htmlspecialchars($pub_img) ?>';
var is_local     =<?= htmlspecialchars($localhost) ?>;
var work_ven_css ='<?= htmlspecialchars($work_ven_css) ?>';
var is_debug 	  =<?= htmlspecialchars($is_debug) ?>;
//- var Materialize;</script><script src="<?= htmlspecialchars($ven_js) ?>jquery-2.1.4.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script><script src="<?= htmlspecialchars($ven_js) ?>loadcss.js"></script><script src="<?= htmlspecialchars($ven_js) ?>require.js" data-main="<?= htmlspecialchars($work_ven_js) ?>"></script><script src="<?= htmlspecialchars($pub_js) ?><?= htmlspecialchars($build_js) ?>"></script><?php if ($analytics && !$localhost) : ?><script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
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