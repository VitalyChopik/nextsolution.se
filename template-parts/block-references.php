<?php

/**
 * Block Name: References
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$page_fields = get_fields();


$additional_class     = (array_key_exists('className', $block))
    ? $block['className']
    : '';
$image_url= getFieldValue($page_fields, 'image_url');
$name = getFieldValue($page_fields, 'name');
$position = getFieldValue($page_fields, 'position');
$linksTitle = getFieldValue($page_fields, 'links-title');
$links= getFieldValue($page_fields, 'links');
?>

<div class="references <?php echo $additional_class; if($page_post === false){ ?> ctaction__page<?php }?>" <?php if(!empty(get_field('block_id'))){ echo 'id="'. get_field('block_id') .'"'; } ?>>
	<div class="references__block">
		<div class="references__author">
        <div class="references__author-img">
        <?php
          $image_url = kama_thumb_src(array(
              'src' => $image_url,
              'w' => 70,
              'h' => 70,
          ));
          ?>
          <svg viewBox="0 0 420 420" role="img" class="image-mask" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
              <?php $rand_id = bin2hex(random_bytes(10)); ?>
              <mask id="svgmask-<?php echo $rand_id; ?>">
                  <path fill="#ffffff" d="M58.1,84.3C137.8,15,316.4-40.2,369.2,38.7c52.8,78.9,66.3,178.4,31.7,250.2c-20,41.5-44.1,58-81.9,81.7
    c-87.8,55.2-187.9,75.8-260.9,0C-17,292.7-21.7,153.6,58.1,84.3z" />
              </mask>
              <image width="100%" height="100%" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $image_url ?>" mask="url(#svgmask-<?php echo $rand_id; ?>)"></image>
          </svg>
        </div>
       <div class="references__author-text">
        <span class="references__author-name"><?php echo ($name) ? do_shortcode($name) : ''; ?></span>
        <span class="references__author-position"><?php echo ($position) ? do_shortcode($position) : ''; ?></span>
       </div>
    </div>
    <div class="references__links">
      <span class="references__links-title"><?php echo ($linksTitle) ? do_shortcode($linksTitle) : ''; ?></span>
      <?php if ($links) : ?>
        <?php foreach ($links as $link) : ?>
          <?php
          $link__text = (array_key_exists('text', $link))
          ? $link['text']
          : '';
          $link_item = (array_key_exists('link_item', $link))
          ? $link['link_item']
          : '';
          ?>
          <a href="<?php echo $link_item; ?>" class="references__link"><?php echo $link__text; ?></a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
	</div>
</div>