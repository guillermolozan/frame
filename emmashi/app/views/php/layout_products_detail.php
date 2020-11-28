<?php if (!function_exists('mixin__button_side_nav')) { function mixin__button_side_nav($block = null, $attributes = array()) { ?><a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a><?php } } ?><?php if (!function_exists('mixin__post_item')) { function mixin__post_item($block = null, $attributes = array(), $post = null, $imgfirst = null, $type = null) { global $■;$■['post'] = $post;$■['imgfirst'] = $imgfirst;$■['type'] = $type;?><?php if ($post['name']) : ?><?php if ($type == 'h1') : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php elseif ($type == 'h2') : ?><h2><?php mixin__item(null, array(), $post) ?></h2><?php elseif ($type == 'h3') : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php elseif ($type == 'h4') : ?><h4><?php mixin__item(null, array(), $post) ?></h4><?php else : ?><h3><?php mixin__item(null, array(), $post) ?></h3><?php endif ?><?php endif ?><?php if ($post['html']) : ?><div><?php echo $post['html'] ?></div><?php endif ?><?php if ($post['text']) : ?><div><p><?php echo htmlspecialchars($post['text']) ?></p></div><?php endif ?><?php mixin__img_item(null, array(), $post) ?><?php if ($post['video']) : ?><?php mixin__post_video(null, array(), $post['video']) ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__post_video')) { function mixin__post_video($block = null, $attributes = array(), $video = null) { global $■;$■['video'] = $video;?><div class="video-container"><iframe width="853" height="480" src="//www.youtube.com/embed/<?php echo htmlspecialchars($video) ?>?rel=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div><?php } } ?><?php if (!function_exists('mixin__items_list')) { function mixin__items_list($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li class="collection-item"><?php mixin__link_item(null, array(), $men_item) ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__link_item')) { function mixin__link_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><a href="<?php echo htmlspecialchars(strtolower($item['url'])) ?>" rel="<?php echo htmlspecialchars($item['rel']) ?>" title="<?php echo htmlspecialchars(strtolower($item['name'])) ?>" target="<?php echo htmlspecialchars($item['target']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?php echo htmlspecialchars($item['name']) ?> <?php if ($item['sub']) : ?><b><?php echo htmlspecialchars($item['sub']) ?></b><?php endif ?></a><?php } } ?><?php if (!function_exists('mixin__item')) { function mixin__item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['url']) : ?><?php mixin__link_item(null, array(), $item) ?><?php else : ?><span><?php echo htmlspecialchars($item['name']) ?></span><?php endif ?><?php } } ?><?php if (!function_exists('mixin__imgg')) { function mixin__imgg($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['name']) : ?><img src="<?php echo htmlspecialchars($item['img']) ?>" alt="<?php echo htmlspecialchars(strtolower($item['name'])) ?>" title="<?php echo htmlspecialchars(strtolower($item['name'])) ?>" data-caption="<?php echo htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php else : ?><img src="<?php echo htmlspecialchars($item['img']) ?>" alt="foto" title="foto" class="responsive-img"/><?php endif ?><?php } } ?><?php if (!function_exists('mixin__img_item')) { function mixin__img_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['img']) : ?><?php if ($item['url']) : ?><a href="<?php echo htmlspecialchars(strtolower($item['url'])) ?>" target="<?php echo htmlspecialchars($item['target']) ?>" title="<?php echo htmlspecialchars(strtolower($item['name'])) ?>"<?php attr_class(add("photo ", $item['aclass'], "")) ?>><?php mixin__imgg(null, array(), $item) ?></a><?php else : ?><div class="photo"><?php mixin__imgg(null, array(), $item) ?></div>
<?php endif ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items')) { function mixin__menu_items($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li<?php attr_class(add("", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?><?php if ($men_item['items']) : ?><ul class="submenu "><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul><?php endif ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items_collapsible')) { function mixin__menu_items_collapsible($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><?php if ($men_item['items']) : ?><li class="collapse collection-item"><a<?php attr_class(add("collapsible-header waves-effect ", $men_item['class'], "")) ?>><?php echo htmlspecialchars($men_item['name']) ?></a><div class="collapsible-body"><ul><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul></div></li><?php else : ?><li<?php attr_class(add("", $clas, " collection-item ", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?></li><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__video_youtube')) { function mixin__video_youtube($block = null, $attributes = array(), $video = null) { global $■;$■['video'] = $video;?><iframe width="853" height="480" src="//www.youtube.com/embed/<?php echo htmlspecialchars($video) ?>?rel=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe><?php } } ?><?php if (!function_exists('mixin__render_email')) { function mixin__render_email($block = null, $attributes = array(), $email = null) { global $■;$■['email'] = $email;?><a href="mailto:<?php echo htmlspecialchars($email) ?>" title="email"><?php echo htmlspecialchars($email) ?></a><?php } } ?><?php if (!function_exists('mixin__render_emails')) { function mixin__render_emails($block = null, $attributes = array(), $emails = null) { global $■;$■['emails'] = $emails;?><?php if ($emails) : foreach ($emails as $index => $email) : $■['index'] = $index;$■['email'] = $email; ?><?php if ($index == 0) : ?><?php mixin__render_email(null, array(), $email) ?><?php else : ?><span> / </span><?php mixin__render_email(null, array(), $email) ?><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__render_whatsapp')) { function mixin__render_whatsapp($block = null, $attributes = array(), $wa = null) { global $■;$■['wa'] = $wa;?><a title="whatsapp" target="_blank" href="https://api.whatsapp.com/send?phone=51<?php echo htmlspecialchars($wa) ?>"<?php attr_class($attributes['class']) ?>><?php echo htmlspecialchars($wa) ?></a><?php } } ?><?php if (!function_exists('mixin__render_phone')) { function mixin__render_phone($block = null, $attributes = array(), $phone = null) { global $■;$■['phone'] = $phone;?><a href="tel:<?php echo htmlspecialchars($phone) ?>" title="teléfono"><?php echo htmlspecialchars($phone) ?></a><?php } } ?><?php if (!function_exists('mixin__render_phones')) { function mixin__render_phones($block = null, $attributes = array(), $phones = null) { global $■;$■['phones'] = $phones;?><?php if ($phones) : foreach ($phones as $index => $phone) : $■['index'] = $index;$■['phone'] = $phone; ?><?php if ($index == 0) : ?><?php mixin__render_phone(null, array(), $phone) ?><?php else : ?><span> - </span><?php mixin__render_phone(null, array(), $phone) ?><?php endif ?><?php endforeach; endif ?><?php } } ?>
<?php if (!function_exists('mixin__form')) { function mixin__form($block = null, $attributes = array(), $name = null, $form = null) { global $■;$■['name'] = $name;$■['form'] = $form;?><?php if ($form) : foreach ($form as $item) : $■['item'] = $item; ?><?php $clas = ($item['divclass']) ? $item['divclass'] : "col s12" ?><?php if ($item['group']) : ?><div class="col s12 group"><?php echo htmlspecialchars($item['group']) ?></div><?php endif ?><?php if ($item['hidden']) : ?><?php mixin__input_hidden(null, array(), $name, $item) ?><?php else : ?><?php if ($item['type'] == 'textarea') : ?><?php mixin__input_textarea(null, array(), $name, $item, $clas) ?><?php elseif ($item['type'] == 'radio') : ?><?php mixin__input_radio(null, array(), $name, $item, $clas, $options) ?><?php elseif ($item['type'] == 'select_materialize') : ?><?php mixin__select_materialize(null, array(), $name, $item, $clas, $options) ?><?php elseif ($item['type'] == 'select') : ?><?php mixin__input_select_without_materialize(null, array(), $name, $item, $clas, $options) ?><?php elseif ($item['type'] == 'select_2') : ?><?php mixin__input_select_2(null, array(), $name, $item, $clas, $options) ?><?php elseif ($item['type'] == 'file') : ?><?php mixin__input_file(null, array(), $name, $item, $clas) ?><?php elseif ($item['type'] == 'date') : ?><?php mixin__input_date(null, array(), $name, $item, $clas) ?><?php else : ?><?php mixin__input_text(null, array(), $name, $item, $clas) ?><?php endif ?><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__input_textarea')) { function mixin__input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><textarea id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?php echo htmlspecialchars($line['value']) ?></textarea><label for="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>"><?php echo htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_radio')) { function mixin__input_radio($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><div class="row"><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><div class="col"><?php if ($item == $line['value']) : ?><input id="<?php echo htmlspecialchars($line['name']) ?>_<?php echo htmlspecialchars($item) ?>" type="radio" name="<?php echo htmlspecialchars($line['name']) ?>" value="<?php echo htmlspecialchars($item) ?>" checked="checked"/><?php else : ?><input id="<?php echo htmlspecialchars($line['name']) ?>_<?php echo htmlspecialchars($item) ?>" type="radio" name="<?php echo htmlspecialchars($line['name']) ?>" value="<?php echo htmlspecialchars($item) ?>"/><?php endif ?><label for="<?php echo htmlspecialchars($line['name']) ?>_<?php echo htmlspecialchars($item) ?>"><?php echo htmlspecialchars($item) ?></label></div><?php endforeach; endif ?></div></div><?php } } ?><?php if (!function_exists('mixin__select_materialize')) { function mixin__select_materialize($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><select id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>"><option value="" disabled="disabled" selected="selected"><?php echo htmlspecialchars($line['label']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><?php if ($item == $line['value']) : ?><option value="<?php echo htmlspecialchars($item) ?>" selected="selected"><?php echo htmlspecialchars($item) ?></option><?php else : ?><option value="<?php echo htmlspecialchars($item) ?>"><?php echo htmlspecialchars($item) ?>		</option><?php endif ?><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__input_select_without_materialize')) { function mixin__input_select_without_materialize($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><select id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" class="browser-default"><option value="" disabled="disabled" selected="selected"><?php echo htmlspecialchars($line['label']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><?php if ($item == $line['value']) : ?><option value="<?php echo htmlspecialchars($item) ?>" selected="selected"><?php echo htmlspecialchars($item) ?></option><?php else : ?><option value="<?php echo htmlspecialchars($item) ?>"><?php echo htmlspecialchars($item) ?>					</option><?php endif ?><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__input_select_2')) { function mixin__input_select_2($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><?php mixin__input_select_without_materialize(null, array(), $name, $line, $clas) ?><?php } } ?><?php if (!function_exists('mixin__input_date')) { function mixin__input_date($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><label for="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>"><?php echo htmlspecialchars($line['label']) ?> </label><input id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="text" value="<?php echo htmlspecialchars($line['value']) ?>"<?php attr_class(add("datepicker ", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__input_text')) { function mixin__input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><?php if ($line['required']) : ?><input required="required" id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($name) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="<?php echo htmlspecialchars($line['type']) ?>" value="<?php echo htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><?php elseif ($line['disabled']) : ?><input disabled="disabled" id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="<?php echo htmlspecialchars($line['type']) ?>" value="<?php echo htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><?php else : ?><input id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="<?php echo htmlspecialchars($line['type']) ?>" value="<?php echo htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><?php endif ?><label for="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>"><?php echo htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_file')) { function mixin__input_file($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field file-field ", $clas, "")) ?>><div class="btn"><span>Archivo</span><input type="file"/></div><div class="file-path-wrapper"><input type="text" class="file-path validate"/></div></div><?php } } ?>
<?php if (!function_exists('mixin__simple_input_textarea')) { function mixin__simple_input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><label> <span><?php echo htmlspecialchars($line['label']) ?></span><?php if ($line['required'] == '1') : ?><textarea id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" required="required" autocomplete="<?php echo htmlspecialchars($line['autocomplete']) ?>" placeholder="<?php echo htmlspecialchars($line['placeholder']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>"<?php attr_class('form_input', add("materialize-textarea ", $line['class'], "")) ?>><?php echo htmlspecialchars($line['value']) ?></textarea><?php else : ?><textarea id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" autocomplete="<?php echo htmlspecialchars($line['autocomplete']) ?>" placeholder="<?php echo htmlspecialchars($line['placeholder']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>"<?php attr_class('form_input', add("materialize-textarea ", $line['class'], "")) ?>><?php echo htmlspecialchars($line['value']) ?></textarea><?php endif ?></label></div><?php } } ?><?php if (!function_exists('mixin__simple_input_radio')) { function mixin__simple_input_radio($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><div><label><?php echo htmlspecialchars($line['label']) ?></label></div><div class="row"><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><div class="col"><?php if ($item == $line['value']) : ?><input id="<?php echo htmlspecialchars($line['name']) ?>_<?php echo htmlspecialchars($item) ?>" type="radio" name="<?php echo htmlspecialchars($line['name']) ?>" value="<?php echo htmlspecialchars($item) ?>" checked="checked"/><?php else : ?><input id="<?php echo htmlspecialchars($line['name']) ?>_<?php echo htmlspecialchars($item) ?>" type="radio" name="<?php echo htmlspecialchars($line['name']) ?>" value="<?php echo htmlspecialchars($item) ?>"/><?php endif ?><label for="<?php echo htmlspecialchars($line['name']) ?>_<?php echo htmlspecialchars($item) ?>"><?php echo htmlspecialchars($item) ?></label></div><?php endforeach; endif ?></div></div><?php } } ?><?php if (!function_exists('mixin__simple_input_text')) { function mixin__simple_input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><label> <span><?php echo htmlspecialchars($line['label']) ?></span><?php if ($line['required'] == '1') : ?><input id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" required="required" autocomplete="<?php echo htmlspecialchars($line['autocomplete']) ?>" placeholder="<?php echo htmlspecialchars($line['placeholder']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="<?php echo htmlspecialchars($line['type']) ?>" value="<?php echo htmlspecialchars($line['value']) ?>"<?php attr_class('form_input', add("", $line['class'], "")) ?>/><?php else : ?><input id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" autocomplete="<?php echo htmlspecialchars($line['autocomplete']) ?>" placeholder="<?php echo htmlspecialchars($line['placeholder']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="<?php echo htmlspecialchars($line['type']) ?>" value="<?php echo htmlspecialchars($line['value']) ?>"<?php attr_class('form_input', add("", $line['class'], "")) ?>/><?php endif ?></label></div><?php } } ?><?php if (!function_exists('mixin__simple_input_select')) { function mixin__simple_input_select($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><label> <span><?php echo htmlspecialchars($line['label']) ?></span><?php if ($line['required'] == '1') : ?><select id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" required="required" class="form_input browser-default"><?php mixin__simple_input_select_options(null, array(), $line) ?></select><?php else : ?><select id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" class="form_input browser-default"><?php mixin__simple_input_select_options(null, array(), $line) ?></select><?php endif ?></label></div><?php } } ?><?php if (!function_exists('mixin__simple_input_select_options')) { function mixin__simple_input_select_options($block = null, $attributes = array(), $line = null) { global $■;$■['line'] = $line;?><option value="" disabled="disabled" selected="selected"><?php echo htmlspecialchars($line['label']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><option value="<?php echo htmlspecialchars($item) ?>"><?php echo htmlspecialchars($item) ?></option><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__simple_input_file')) { function mixin__simple_input_file($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input type="file"/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_date')) { function mixin__simple_input_date($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="<?php echo htmlspecialchars($line['type']) ?>" value="<?php echo htmlspecialchars($line['value']) ?>"<?php attr_class(add("datepicker ", $line['class'], "")) ?>/></div><?php } } ?>
<?php if (!function_exists('mixin__input_submit')) { function mixin__input_submit($block = null, $attributes = array(), $msg = null) { global $■;$■['msg'] = $msg;?><div class="input-field col s12"><button type="submit" class="btn waves-effect waves-blue submit"><?php echo htmlspecialchars($msg) ?></button></div><?php } } ?><?php if (!function_exists('mixin__card_sended')) { function mixin__card_sended($block = null, $attributes = array(), $msg = null) { global $■;$■['msg'] = $msg;?><?php if ($msg) : ?><div class="card-panel lime lighten-5"><?php echo $msg ?></div><?php endif ?><?php } } ?><?php if (!function_exists('mixin__input_hidden')) { function mixin__input_hidden($block = null, $attributes = array(), $name = null, $line = null) { global $■;$■['name'] = $name;$■['line'] = $line;?><input id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="hidden" value="<?php echo htmlspecialchars($line['value']) ?>"/><?php } } ?><!DOCTYPE html><html lang="es"><head><base href="<?php echo htmlspecialchars($base) ?>"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge"><link href="<?php echo htmlspecialchars($pub_img) ?><?php echo htmlspecialchars($icon) ?>" rel="shortcut icon" type="image/png"><?php if ($framework_css == 'materialize') : ?><link href="<?php echo htmlspecialchars($base_work_ven_css) ?>materialize0990.css" type="text/css" rel="stylesheet" media="screen,projection"><link href="<?php echo htmlspecialchars($pub_css) ?><?php echo htmlspecialchars($build_css) ?>" type="text/css" rel="stylesheet" media="screen,projection"><?php endif ?><?php if ($framework_css == 'tailwind') : ?><link href="<?php echo htmlspecialchars($pub_css) ?><?php echo htmlspecialchars($build_css) ?>" type="text/css" rel="stylesheet" media="screen,projection"><?php endif ?><title><?php echo htmlspecialchars($head_title) ?></title><?php if ($canonical) : ?><link rel="canonical" href="<?php echo htmlspecialchars($canonical) ?>"><?php endif ?><?php if ($head_description) : ?><meta name="description" content="<?php echo htmlspecialchars($head_description) ?>"><?php endif ?><?php if ($head_keywords) : ?><meta name="keywords" content="<?php echo htmlspecialchars($head_keywords) ?>"><meta http-equiv="keywords" content="<?php echo htmlspecialchars($head_keywords) ?>"><?php endif ?><?php if ($opengraph) : ?><meta name="og:url" content="<?php echo htmlspecialchars($canonical) ?>"><meta name="og:title" content="<?php echo htmlspecialchars($head_title) ?>"><meta name="og:type" content="website"><?php endif ?><?php if ($theme_color) : ?><meta name="theme-color" content="<?php echo htmlspecialchars($theme_color) ?>"><meta name="msapplication-navbutton-color" content="<?php echo htmlspecialchars($theme_color) ?>"><meta name="apple-mobile-web-app-status-bar-style" content="<?php echo htmlspecialchars($theme_color) ?>"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"><?php endif ?><meta name="robots" content="index, follow"><?php if ($map) : ?><script src="//maps.google.com/maps/api/js?key=<?php echo htmlspecialchars($gmap_key) ?>"></script><script src="<?php echo htmlspecialchars($ven_js) ?>gmaps.js"></script><?php endif ?><?php if ($more_metas) : ?><?php echo $more_metas ?><?php endif ?></head><?php if ($pre_output) : ?><div style="background:#eee;order:-9999;width:100%;position:relative;" class="pre_output"><?php echo $pre_output ?></div><?php endif ?><body<?php attr_class(add("", $classbody, "")) ?>> <header class="navbar-fixed"><?php if ($is_home) : ?><h1><?php echo htmlspecialchars($web_name) ?></h1><?php $main = false ?><?php endif ?><section class="header_pre hide-on-med-and-down"><nav><div class="container"><ul class="menu"><?php if ($web_facebook) : ?><li class="facebook"><a target="_blank" href="<?php echo htmlspecialchars($web_facebook) ?>"></a></li><?php endif ?><?php if ($web_youtube) : ?><li class="youtube"><a target="_blank" href="<?php echo htmlspecialchars($web_youtube) ?>"></a></li><?php endif ?><?php if ($web_twitter) : ?><li class="twitter"><a target="_blank" href="<?php echo htmlspecialchars($web_twitter) ?>"></a></li><?php endif ?><?php if ($web_instagram) : ?><li class="instagram"><a target="_blank" href="<?php echo htmlspecialchars($web_instagram) ?>"></a></li><?php endif ?><?php if ($web_whatsapp) : ?><li class="whatsapp"><?php mixin__render_whatsapp(null, array(), $web_whatsapp) ?></li><?php endif ?><?php if ($web_phone) : ?><li class="phone"><?php mixin__render_phone(null, array(), $web_phone) ?></li><?php endif ?><?php if ($web_email) : ?><li class="email"><?php mixin__render_email(null, array(), $web_email) ?></li><?php endif ?></ul></div></nav></section><div class="prenav"><div class="container"><a href="<?php echo htmlspecialchars($link_home) ?>" title="<?php echo htmlspecialchars($web_name) ?>" class="logo"><img src="<?php echo htmlspecialchars($pub_img) ?><?php echo htmlspecialchars($logo) ?>" title="<?php echo htmlspecialchars($web_name) ?>" alt="<?php echo htmlspecialchars($web_name) ?>"></a></div></div><nav><?php mixin__button_side_nav() ?><div class="container"><ul class="menu menu_top"><?php mixin__menu_items(null, array(), $menu_top) ?></ul></div></nav></header><ul id="mobile-nav" class="menu_left side-nav collapsible collapsible-accordion"><?php mixin__menu_items_collapsible(null, array(), $menu_left) ?></ul><main class="container row"><div class="post project"><?php mixin__card_sended(null, array(), $message) ?><div class="row"><div class="col s12 l12"><div class="block_habitaciones"><?php $habitacion_item = $post ?><h1><?php echo htmlspecialchars($habitacion_item['name']) ?></h1><div class="block_habitacion detail_habitacion"><div class="row"><div class="galle col s12 m6"><div class="col"><div class="foto"><a href="<?php echo htmlspecialchars($habitacion_item['photos'][0]) ?>" class="zoom"><img src="<?php echo htmlspecialchars($habitacion_item['photos'][0]) ?>" class="responsive-img"></a><div class="orange"></div><a href="<?php echo htmlspecialchars($habitacion_item['url']) ?>" class="name"><?php echo htmlspecialchars($habitacion_item['name']) ?></a><a href="<?php echo htmlspecialchars($habitacion_item['url']) ?>" class="more btn">VER MAS ></a></div><div class="train"><?php if ($habitacion_item['photos']) : foreach ($habitacion_item['photos'] as $foto) : $■['foto'] = $foto; ?><div><a><img src="<?php echo htmlspecialchars($foto) ?>" class="responsive-img"></a></div><?php endforeach; endif ?></div></div></div><div class="text col s12 m6"><div class="col"><ul data-collapsible="accordion" class="collapsible"><li><div class="collapsible-header active">Descripción</div><div class="collapsible-body"><p><?php echo $habitacion_item['text'] ?></p></div></li><li><div class="collapsible-header">Ficha</div><div class="collapsible-body ficha"><p><?php echo $habitacion_item['text2'] ?></p></div></li><li><div class="collapsible-header">Garantía</div><div class="collapsible-body"><p><?php echo htmlspecialchars($habitacion_item['text3']) ?></p></div></li><li><a href="<?php echo htmlspecialchars($habitacion_item['url']) ?>#cotizar" class="collapsible-header">Cotizar</a></li></ul>

</div></div></div></div></div><div id="cotizar" class="col s12 l8 offset-l2  scrollspy form_consulta"><article class="card-panel"><?php if ($message) : ?><?php mixin__card_sended(null, array(), $message) ?><?php endif ?><?php if ($form_title) : ?><h2><?php echo htmlspecialchars($form_title) ?></h2><?php endif ?><form method="POST"<?php attr('name', $form_name, true) ?>><div class="row"><?php mixin__form(null, array(), $form_name, $form_fields) ?><?php mixin__input_submit(null, array(), $form_button) ?></div></form></article></div></div></div></div></main><a target="_blank" href="https://api.whatsapp.com/send?phone=51<?php echo htmlspecialchars($web_whatsapp) ?>" class="whatsapp_button"></a><footer><div class="container row"><div class="col s12 l8 first"><ul class="menu"><?php mixin__menu_items(null, array(), $menu_footer) ?></ul></div><div class="col s12 l4 two"><ul class="menu"><?php if ($web_whatsapp && false) : ?><li><span class="corp">WhatsApp: <strong><?php mixin__render_whatsapp(null, array(), $web_whatsapp) ?></strong></span></li><?php endif ?><?php if ($web_address) : ?><li><span class="corp">Dirección: <strong><?php echo htmlspecialchars($web_address) ?></strong>	</span></li><?php endif ?><li><span class="corp">Celular: <strong><?php mixin__render_phones(null, array(), $web_phones) ?></strong></span></li><li><span class="corp">Correo: <strong><?php mixin__render_emails(null, array(), $web_emails) ?></strong></span></li>
</ul></div></div></footer><?php if ($localhost) : ?><div class="footer_post"><div class="container"><nav class="transparent"><ul><li><a href="<?php echo htmlspecialchars($link_home) ?>">© <?php echo htmlspecialchars($current_year) ?> <?php echo htmlspecialchars($web_name) ?></a></li></ul><ul class="right menu"><?php mixin__menu_items(null, array(), $by_prodiserv) ?></ul></nav></div></div><?php endif ?><script type="text/javascript">var ven_css      ='<?php echo htmlspecialchars($ven_css) ?>';
var pub_img      ='<?php echo htmlspecialchars($pub_img) ?>';
var is_local     =<?php echo htmlspecialchars($localhost) ?>;
var work_ven_css ='<?php echo htmlspecialchars($work_ven_css) ?>';
var is_debug 	  =<?php echo htmlspecialchars($is_debug) ?>;
//- var Materialize;</script><?php if ($use_jquery) : ?><script src="<?php echo htmlspecialchars($ven_js) ?>jquery-2.1.4.min.js"></script><?php endif ?><?php if ($framework_css == 'materialize') : ?><script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script><?php endif ?>
<script src="<?php echo htmlspecialchars($ven_js) ?>loadcss.js"></script><script src="<?php echo htmlspecialchars($ven_js) ?>require.js" data-main="<?php echo htmlspecialchars($work_ven_js) ?>"></script><script src="<?php echo htmlspecialchars($pub_js) ?><?php echo htmlspecialchars($build_js) ?>"></script><?php if ($analytics && !$localhost && false) : ?><script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', '<?php echo htmlspecialchars($analytics) ?>', 'auto');
ga('send', 'pageview');
</script><?php endif ?><?php if ($analytics && !$localhost) : ?><script src="https://www.googletagmanager.com/gtag/js?id=<?php echo htmlspecialchars($analytics) ?>" async></script><script>window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', '<?php echo htmlspecialchars($analytics) ?>');</script><?php endif ?><?php if ($opengraph) : ?><div id="fb-root"></div><script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.6&appId=276802375855277";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script><?php endif ?><?php if ($smartlook && !$localhost) : ?><script>window.smartlook||(function(d) {
var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
c.charset='utf-8';c.src='https://rec.smartlook.com/recorder.js';h.appendChild(c);
})(document);
smartlook('init', '<?php echo htmlspecialchars($smartlook) ?>');</script><?php endif ?></body></html>