<?php if (!function_exists('mixin__button_side_nav')) { function mixin__button_side_nav($block = null, $attributes = array()) { ?><a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a><?php } } ?><?php if (!function_exists('mixin__post_item')) { function mixin__post_item($block = null, $attributes = array(), $post = null, $imgfirst = null, $type = null) { global $■;$■['post'] = $post;$■['imgfirst'] = $imgfirst;$■['type'] = $type;?><?php if ($post['name']) : ?><?php if ($type == 'h1') : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php elseif ($type == 'h2') : ?><h2><?php mixin__item(null, array(), $post) ?></h2><?php elseif ($type == 'h3') : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php elseif ($type == 'h4') : ?><h4><?php mixin__item(null, array(), $post) ?></h4><?php else : ?><h3><?php mixin__item(null, array(), $post) ?></h3><?php endif ?><?php endif ?><?php if ($post['html']) : ?><div><?php echo $post['html'] ?></div><?php endif ?><?php if ($post['text']) : ?><div><p><?php echo htmlspecialchars($post['text']) ?></p></div><?php endif ?><?php mixin__img_item(null, array(), $post) ?><?php if ($post['video']) : ?><?php mixin__post_video(null, array(), $post['video']) ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__post_video')) { function mixin__post_video($block = null, $attributes = array(), $video = null) { global $■;$■['video'] = $video;?><div class="video-container"><iframe width="853" height="480" src="//www.youtube.com/embed/<?php echo htmlspecialchars($video) ?>?rel=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div><?php } } ?><?php if (!function_exists('mixin__items_list')) { function mixin__items_list($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li class="collection-item"><?php mixin__link_item(null, array(), $men_item) ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__link_item')) { function mixin__link_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><a href="<?php echo htmlspecialchars(strtolower($item['url'])) ?>" rel="<?php echo htmlspecialchars($item['rel']) ?>" title="<?php echo htmlspecialchars(strtolower($item['name'])) ?>" target="<?php echo htmlspecialchars($item['target']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?php echo htmlspecialchars($item['name']) ?> <?php if ($item['sub']) : ?><b><?php echo htmlspecialchars($item['sub']) ?></b><?php endif ?></a><?php } } ?><?php if (!function_exists('mixin__item')) { function mixin__item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['url']) : ?><?php mixin__link_item(null, array(), $item) ?><?php else : ?><span><?php echo htmlspecialchars($item['name']) ?></span><?php endif ?><?php } } ?><?php if (!function_exists('mixin__imgg')) { function mixin__imgg($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['name']) : ?><img src="<?php echo htmlspecialchars($item['img']) ?>" alt="<?php echo htmlspecialchars(strtolower($item['name'])) ?>" title="<?php echo htmlspecialchars(strtolower($item['name'])) ?>" data-caption="<?php echo htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php else : ?><img src="<?php echo htmlspecialchars($item['img']) ?>" alt="foto" title="foto" class="responsive-img"/><?php endif ?><?php } } ?><?php if (!function_exists('mixin__img_item')) { function mixin__img_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['img']) : ?><?php if ($item['url']) : ?><a href="<?php echo htmlspecialchars(strtolower($item['url'])) ?>" target="<?php echo htmlspecialchars($item['target']) ?>" title="<?php echo htmlspecialchars(strtolower($item['name'])) ?>"<?php attr_class(add("photo ", $item['aclass'], "")) ?>><?php mixin__imgg(null, array(), $item) ?></a><?php else : ?><div class="photo"><?php mixin__imgg(null, array(), $item) ?></div>
<?php endif ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items')) { function mixin__menu_items($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li<?php attr_class(add("", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?><?php if ($men_item['items']) : ?><ul class="submenu "><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul><?php endif ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items_collapsible')) { function mixin__menu_items_collapsible($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><?php if ($men_item['items']) : ?><li class="collapse collection-item"><a<?php attr_class(add("collapsible-header waves-effect ", $men_item['class'], "")) ?>><?php echo htmlspecialchars($men_item['name']) ?></a><div class="collapsible-body"><ul><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul></div></li><?php else : ?><li<?php attr_class(add("", $clas, " collection-item ", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?></li><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__video_youtube')) { function mixin__video_youtube($block = null, $attributes = array(), $video = null) { global $■;$■['video'] = $video;?><iframe width="853" height="480" src="//www.youtube.com/embed/<?php echo htmlspecialchars($video) ?>?rel=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe><?php } } ?><?php if (!function_exists('mixin__render_email')) { function mixin__render_email($block = null, $attributes = array(), $email = null) { global $■;$■['email'] = $email;?><a href="mailto:<?php echo htmlspecialchars($email) ?>" title="email"><?php echo htmlspecialchars($email) ?></a><?php } } ?><?php if (!function_exists('mixin__render_whatsapp')) { function mixin__render_whatsapp($block = null, $attributes = array(), $wa = null) { global $■;$■['wa'] = $wa;?><a title="whatsapp" target="_blank" href="https://api.whatsapp.com/send?phone=51<?php echo htmlspecialchars($wa) ?>"<?php attr_class($attributes['class']) ?>><?php echo htmlspecialchars($wa) ?></a><?php } } ?><?php if (!function_exists('mixin__render_phone')) { function mixin__render_phone($block = null, $attributes = array(), $phone = null) { global $■;$■['phone'] = $phone;?><a href="tel:<?php echo htmlspecialchars($phone) ?>" title="teléfono"><?php echo htmlspecialchars($phone) ?></a><?php } } ?>
<?php if (!function_exists('mixin__form')) { function mixin__form($block = null, $attributes = array(), $name = null, $form = null) { global $■;$■['name'] = $name;$■['form'] = $form;?><?php if ($form) : foreach ($form as $item) : $■['item'] = $item; ?><?php $clas = ($item['divclass']) ? $item['divclass'] : "col s12" ?><?php if ($item['group']) : ?><div class="col s12 group"><?php echo htmlspecialchars($item['group']) ?></div><?php endif ?><?php if ($item['hidden']) : ?><?php mixin__input_hidden(null, array(), $name, $item) ?><?php else : ?><?php if ($item['type'] == 'textarea') : ?><?php mixin__input_textarea(null, array(), $name, $item, $clas) ?><?php elseif ($item['type'] == 'radio') : ?><?php mixin__input_radio(null, array(), $name, $item, $clas, $options) ?><?php elseif ($item['type'] == 'select_materialize') : ?><?php mixin__select_materialize(null, array(), $name, $item, $clas, $options) ?><?php elseif ($item['type'] == 'select') : ?><?php mixin__input_select_without_materialize(null, array(), $name, $item, $clas, $options) ?><?php elseif ($item['type'] == 'select_2') : ?><?php mixin__input_select_2(null, array(), $name, $item, $clas, $options) ?><?php elseif ($item['type'] == 'file') : ?><?php mixin__input_file(null, array(), $name, $item, $clas) ?><?php elseif ($item['type'] == 'date') : ?><?php mixin__input_date(null, array(), $name, $item, $clas) ?><?php else : ?><?php mixin__input_text(null, array(), $name, $item, $clas) ?><?php endif ?><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__input_textarea')) { function mixin__input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><textarea id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?php echo htmlspecialchars($line['value']) ?></textarea><label for="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>"><?php echo htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_radio')) { function mixin__input_radio($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><div class="row"><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><div class="col"><?php if ($item == $line['value']) : ?><input id="<?php echo htmlspecialchars($line['name']) ?>_<?php echo htmlspecialchars($item) ?>" type="radio" name="<?php echo htmlspecialchars($line['name']) ?>" value="<?php echo htmlspecialchars($item) ?>" checked="checked"/><?php else : ?><input id="<?php echo htmlspecialchars($line['name']) ?>_<?php echo htmlspecialchars($item) ?>" type="radio" name="<?php echo htmlspecialchars($line['name']) ?>" value="<?php echo htmlspecialchars($item) ?>"/><?php endif ?><label for="<?php echo htmlspecialchars($line['name']) ?>_<?php echo htmlspecialchars($item) ?>"><?php echo htmlspecialchars($item) ?></label></div><?php endforeach; endif ?></div></div><?php } } ?><?php if (!function_exists('mixin__select_materialize')) { function mixin__select_materialize($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><select id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>"><option value="" disabled="disabled" selected="selected"><?php echo htmlspecialchars($line['label']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><?php if ($item == $line['value']) : ?><option value="<?php echo htmlspecialchars($item) ?>" selected="selected"><?php echo htmlspecialchars($item) ?></option><?php else : ?><option value="<?php echo htmlspecialchars($item) ?>"><?php echo htmlspecialchars($item) ?>		</option><?php endif ?><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__input_select_without_materialize')) { function mixin__input_select_without_materialize($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><select id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" class="browser-default"><option value="" disabled="disabled" selected="selected"><?php echo htmlspecialchars($line['label']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><?php if ($item == $line['value']) : ?><option value="<?php echo htmlspecialchars($item) ?>" selected="selected"><?php echo htmlspecialchars($item) ?></option><?php else : ?><option value="<?php echo htmlspecialchars($item) ?>"><?php echo htmlspecialchars($item) ?>					</option><?php endif ?><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__input_select_2')) { function mixin__input_select_2($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><?php mixin__input_select_without_materialize(null, array(), $name, $line, $clas) ?><?php } } ?><?php if (!function_exists('mixin__input_date')) { function mixin__input_date($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><label for="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>"><?php echo htmlspecialchars($line['label']) ?> </label><input id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="text" value="<?php echo htmlspecialchars($line['value']) ?>"<?php attr_class(add("datepicker ", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__input_text')) { function mixin__input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><?php if ($line['required']) : ?><input required="required" id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($name) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="<?php echo htmlspecialchars($line['type']) ?>" value="<?php echo htmlspecialchars($line['value']) ?>" oninvalid="this.setCustomValidity('El campo no puede estar vació')"<?php attr_class(add("", $line['class'], "")) ?>/><?php elseif ($line['disabled']) : ?><input disabled="disabled" id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="<?php echo htmlspecialchars($line['type']) ?>" value="<?php echo htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><?php else : ?><input disabled="disabled" id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="<?php echo htmlspecialchars($line['type']) ?>" value="<?php echo htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><?php endif ?><label for="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>"><?php echo htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_file')) { function mixin__input_file($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field file-field ", $clas, "")) ?>><div class="btn"><span>Archivo</span><input type="file"/></div><div class="file-path-wrapper"><input type="text" class="file-path validate"/></div></div><?php } } ?>
<?php if (!function_exists('mixin__simple_input_textarea')) { function mixin__simple_input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><label> <span><?php echo htmlspecialchars($line['label']) ?></span><?php if ($line['required'] == '1') : ?><textarea id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" required="required" autocomplete="<?php echo htmlspecialchars($line['autocomplete']) ?>" placeholder="<?php echo htmlspecialchars($line['placeholder']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?php echo htmlspecialchars($line['value']) ?></textarea><?php else : ?><textarea id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" autocomplete="<?php echo htmlspecialchars($line['autocomplete']) ?>" placeholder="<?php echo htmlspecialchars($line['placeholder']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?php echo htmlspecialchars($line['value']) ?></textarea><?php endif ?></label></div><?php } } ?><?php if (!function_exists('mixin__simple_input_radio')) { function mixin__simple_input_radio($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><div><label><?php echo htmlspecialchars($line['label']) ?></label></div><div class="row"><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><div class="col"><?php if ($item == $line['value']) : ?><input id="<?php echo htmlspecialchars($line['name']) ?>_<?php echo htmlspecialchars($item) ?>" type="radio" name="<?php echo htmlspecialchars($line['name']) ?>" value="<?php echo htmlspecialchars($item) ?>" checked="checked"/><?php else : ?><input id="<?php echo htmlspecialchars($line['name']) ?>_<?php echo htmlspecialchars($item) ?>" type="radio" name="<?php echo htmlspecialchars($line['name']) ?>" value="<?php echo htmlspecialchars($item) ?>"/><?php endif ?><label for="<?php echo htmlspecialchars($line['name']) ?>_<?php echo htmlspecialchars($item) ?>"><?php echo htmlspecialchars($item) ?></label></div><?php endforeach; endif ?></div></div><?php } } ?><?php if (!function_exists('mixin__simple_input_text')) { function mixin__simple_input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><label> <span><?php echo htmlspecialchars($line['label']) ?></span><?php if ($line['required'] == '1') : ?><input id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" required="required" autocomplete="<?php echo htmlspecialchars($line['autocomplete']) ?>" placeholder="<?php echo htmlspecialchars($line['placeholder']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="<?php echo htmlspecialchars($line['type']) ?>" value="<?php echo htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><?php else : ?><input id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" autocomplete="<?php echo htmlspecialchars($line['autocomplete']) ?>" placeholder="<?php echo htmlspecialchars($line['placeholder']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="<?php echo htmlspecialchars($line['type']) ?>" value="<?php echo htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><?php endif ?></label></div><?php } } ?><?php if (!function_exists('mixin__simple_input_select')) { function mixin__simple_input_select($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><label> <span><?php echo htmlspecialchars($line['label']) ?></span><?php if ($line['required'] == '1') : ?><select id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" required="required" class="browser-default"><?php mixin__simple_input_select_options(null, array(), $line) ?></select><?php else : ?><select id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" class="browser-default"><?php mixin__simple_input_select_options(null, array(), $line) ?></select><?php endif ?></label></div><?php } } ?><?php if (!function_exists('mixin__simple_input_select_options')) { function mixin__simple_input_select_options($block = null, $attributes = array(), $line = null) { global $■;$■['line'] = $line;?><option value="" disabled="disabled" selected="selected"><?php echo htmlspecialchars($line['label']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><option value="<?php echo htmlspecialchars($item) ?>"><?php echo htmlspecialchars($item) ?></option><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__simple_input_file')) { function mixin__simple_input_file($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input type="file"/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_date')) { function mixin__simple_input_date($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="<?php echo htmlspecialchars($line['type']) ?>" value="<?php echo htmlspecialchars($line['value']) ?>"<?php attr_class(add("datepicker ", $line['class'], "")) ?>/></div><?php } } ?>
<?php if (!function_exists('mixin__input_submit')) { function mixin__input_submit($block = null, $attributes = array(), $msg = null) { global $■;$■['msg'] = $msg;?><div class="input-field col s12"><button type="submit" class="btn waves-effect waves-blue submit"><?php echo htmlspecialchars($msg) ?></button></div><?php } } ?><?php if (!function_exists('mixin__card_sended')) { function mixin__card_sended($block = null, $attributes = array(), $msg = null) { global $■;$■['msg'] = $msg;?><?php if ($msg) : ?><div class="card-panel lime lighten-5"><?php echo $msg ?></div><?php endif ?><?php } } ?><?php if (!function_exists('mixin__input_hidden')) { function mixin__input_hidden($block = null, $attributes = array(), $name = null, $line = null) { global $■;$■['name'] = $name;$■['line'] = $line;?><input id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="hidden" value="<?php echo htmlspecialchars($line['value']) ?>"/><?php } } ?><!DOCTYPE html><html lang="es"><head><base href="<?php echo htmlspecialchars($base) ?>"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge"><link href="<?php echo htmlspecialchars($pub_img) ?><?php echo htmlspecialchars($icon) ?>" rel="shortcut icon" type="image/png"><link href="<?php echo htmlspecialchars($base_work_ven_css) ?>materialize0990.css" type="text/css" rel="stylesheet" media="screen,projection"><link href="<?php echo htmlspecialchars($pub_css) ?><?php echo htmlspecialchars($build_css) ?>" type="text/css" rel="stylesheet" media="screen,projection"><title><?php echo htmlspecialchars($head_title) ?></title><?php if ($canonical) : ?><link rel="canonical" href="<?php echo htmlspecialchars($canonical) ?>"><?php endif ?><?php if ($head_description) : ?><meta name="description" content="<?php echo htmlspecialchars($head_description) ?>"><?php endif ?><?php if ($head_keywords) : ?><meta name="keywords" content="<?php echo htmlspecialchars($head_keywords) ?>"><?php endif ?><?php if ($opengraph) : ?><meta name="og:url" content="<?php echo htmlspecialchars($baseurl) ?><?php echo htmlspecialchars($canonical) ?>"><meta name="og:type" content="website"><meta name="og:title" content="<?php echo htmlspecialchars($head_title) ?>"><?php endif ?><?php if ($theme_color) : ?><meta name="theme-color" content="<?php echo htmlspecialchars($theme_color) ?>"><meta name="msapplication-navbutton-color" content="<?php echo htmlspecialchars($theme_color) ?>"><meta name="apple-mobile-web-app-status-bar-style" content="<?php echo htmlspecialchars($theme_color) ?>"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"><?php endif ?><meta name="robots" content="index, follow"><?php if ($map) : ?><script src="//maps.google.com/maps/api/js?key=<?php echo htmlspecialchars($gmap_key) ?>"></script><script src="<?php echo htmlspecialchars($ven_js) ?>gmaps.js"></script><?php endif ?></head><?php if ($pre_output) : ?><div style="background:#eee;" class="pre_output"><?php echo $pre_output ?></div><?php endif ?><body<?php attr_class(add("", $classbody, "")) ?>><header class="navbar-fixed"><?php if ($is_home) : ?><h1><?php echo htmlspecialchars($web_name) ?></h1><?php $main = false ?><?php endif ?><section class="header_pre hide-on-med-and-down"><nav><div class="container"><ul class="menu"><?php if ($web_facebook) : ?><li class="facebook"><a target="_blank" href="<?php echo htmlspecialchars($web_facebook) ?>"></a></li><?php endif ?><?php if ($web_youtube) : ?><li class="youtube"><a target="_blank" href="<?php echo htmlspecialchars($web_youtube) ?>"></a></li><?php endif ?><?php if ($web_twitter) : ?><li class="twitter"><a target="_blank" href="<?php echo htmlspecialchars($web_twitter) ?>"></a></li><?php endif ?><?php if ($web_instagram) : ?><li class="instagram"><a target="_blank" href="<?php echo htmlspecialchars($web_instagram) ?>"></a></li><?php endif ?><?php if ($web_whatsapp) : ?><li class="whatsapp"><?php mixin__render_whatsapp(null, array(), $web_whatsapp) ?></li><?php endif ?><?php if ($web_phone) : ?><li class="phone"><?php mixin__render_phone(null, array(), $web_phone) ?></li><?php endif ?><?php if ($web_email) : ?><li class="email"><?php mixin__render_email(null, array(), $web_email) ?></li><?php endif ?></ul></div></nav></section><nav><div class="container"><?php mixin__button_side_nav() ?><ul class="menu menu_top"><li class="brand-logo"><a href="<?php echo htmlspecialchars($link_home) ?>" title="<?php echo htmlspecialchars($web_name) ?>"><img src="<?php echo htmlspecialchars($pub_img) ?><?php echo htmlspecialchars($logo) ?>" title="<?php echo htmlspecialchars($web_name) ?>" alt="<?php echo htmlspecialchars($web_name) ?>"></a></li><?php mixin__menu_items(null, array(), $menu_top) ?></ul></div></nav></header><ul id="mobile-nav" class="menu_left side-nav collapsible collapsible-accordion"><?php mixin__menu_items_collapsible(null, array(), $menu_left) ?></ul><?php if ($banner) : ?><div id="slider" class="slider"><ul class="slides"><?php if ($banner) : foreach ($banner as $item) : $■['item'] = $item; ?><li><?php if (!$item['url'] || $item['url'] == 'pagina//') : ?><img src="<?php echo htmlspecialchars($item['img']) ?>" class="desktop"><?php else : ?><a href="<?php echo htmlspecialchars($item['url']) ?>"><img aclass="desktop" src="<?php echo htmlspecialchars($item['img']) ?>"></a><?php endif ?></li><?php endforeach; endif ?></ul><div class="outside"><div class="container"><div id="form_reservar" class="home_form_reserva"><article class="card-panel"><form method="post" name="frm" action="reservar" class="row"><a id="close" class="right active"></a><h2>Reserva Ahora</h2><div class="form_content active"><?php mixin__form(null, array(), 'frm', $fields_reservar) ?><?php mixin__input_submit(null, array(), 'RESERVAR') ?></div></form></article></div></div></div></div><?php endif ?><?php if ($banner_imagen || $banner_absolute) : ?><figure class="responsive-img"><?php if ($banner_imagen) : ?><img alt="banner" src="<?php echo htmlspecialchars($pub_img) ?><?php echo htmlspecialchars($banner_imagen) ?>"><?php endif ?><?php if ($banner_absolute) : ?><img src="<?php echo htmlspecialchars($banner_absolute) ?>"><?php endif ?></figure><?php endif ?><main class="container"><div class="form_contact"><div class="container"><div class="row"><div class="col s12"><?php mixin__card_sended(null, array(), $message) ?></div></div><div class="row"><div class="col s12"><h2>CONTÁCTENOS</h2></div></div><div class="row"><div class="col l7 m12 s12"><div id="map"><a target="_blank" href="https://www.google.com.pe/maps/place/Hotel+Punta+Pari%C3%B1as/@-4.5766936,-81.2688833,17z/data=!3m1!4b1!4m5!3m4!1s0x9036441166062fe3:0xef855f4591ea19b!8m2!3d-4.5766936!4d-81.2666946"><img src="<?php echo htmlspecialchars($pub_img) ?>map.png"></a></div></div><div class="col l5 m12 s12 form"><form method="post" name="frm" class="row"><div class="col"><div>Completando el formulario te asesoramos según tu necesidad</div></div><?php mixin__form(null, array(), 'frm', $fields) ?><?php mixin__input_submit(null, array(), 'ENVIAR') ?></form></div></div></div></div></main><footer><div class="container"><div class="row logo"><div class="col s12 l3"><img src="<?php echo htmlspecialchars($pub_img) ?><?php echo htmlspecialchars($logo) ?>" title="<?php echo htmlspecialchars($web_name) ?>" alt="<?php echo htmlspecialchars($web_name) ?>"></div></div><div class="row items"><div class="col s12 l3 first"><ul class="menu"><?php mixin__menu_items(null, array(), $menu_prefooter) ?></ul></div><div class="col s12 l5 second"><h4>Llámenos</h4><ul class="menu"><div class="row"><li class="col s12"><span>Teléfono: <br> <strong><?php echo htmlspecialchars($web_phone) ?></strong></span></li></div><li><div class="address">Dirección: <br> <strong><?php echo htmlspecialchars($web_address) ?></strong></div><div class="email"><?php echo htmlspecialchars($web_email) ?></div></li></ul></div><div class="col s12 l4 third"><h4>Síganos</h4><ul class="menu"><?php if ($web_facebook) : ?><li class="facebook circle"> <a title="Facebook" target="_blank" href="<?php echo htmlspecialchars($web_facebook) ?>">/hotelpuntaparinas</a></li><?php endif ?><?php if ($web_youtube) : ?><li class="youtube circle"> <a title="Youtube" target="_blank" href="<?php echo htmlspecialchars($web_youtube) ?>">/hotelpuntaparinas</a></li><?php endif ?><?php if ($web_twitter) : ?><li class="twitter circle"> <a title="Twitter" target="_blank" href="<?php echo htmlspecialchars($web_twitter) ?>">/hotelpuntaparinas</a></li><?php endif ?></ul></div></div></div><div class="down"><div class="container"><div class="copy">Copyright © <?php echo htmlspecialchars($web_name) ?> <?php echo htmlspecialchars($current_year) ?></div><ul class="by right menu"><?php mixin__menu_items(null, array(), $menu_footer) ?></ul></div></div></footer><script type="text/javascript">var ven_css      ='<?php echo htmlspecialchars($ven_css) ?>';
var pub_img      ='<?php echo htmlspecialchars($pub_img) ?>';
var is_local     =<?php echo htmlspecialchars($localhost) ?>;
var work_ven_css ='<?php echo htmlspecialchars($work_ven_css) ?>';
var is_debug 	  =<?php echo htmlspecialchars($is_debug) ?>;
//- var Materialize;</script><script src="<?php echo htmlspecialchars($ven_js) ?>jquery-2.1.4.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script><script src="<?php echo htmlspecialchars($ven_js) ?>loadcss.js"></script><script src="<?php echo htmlspecialchars($ven_js) ?>require.js" data-main="<?php echo htmlspecialchars($work_ven_js) ?>"></script><script src="<?php echo htmlspecialchars($pub_js) ?><?php echo htmlspecialchars($build_js) ?>"></script><?php if ($analytics && !$localhost) : ?><script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', '<?php echo htmlspecialchars($analytics) ?>', 'auto');
ga('send', 'pageview');
</script><?php endif ?><?php if ($opengraph) : ?><div id="fb-root"></div><script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.6&appId=276802375855277";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script><?php endif ?></body></html>