<?php

 /**
 * Block Name: Cta
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
$cta_title      = getFieldValue($page_fields, 'cta_title');
$cta_subtitle      = getFieldValue($page_fields, 'cta_subtitle');
$cta_button_text           = getFieldValue($page_fields, 'cta_button_text');
$cta_button_link           = getFieldValue($page_fields, 'cta_button_text');
$page_post = getFieldValue($page_fields, 'page_post');
?>


<div class="ctaction <?php echo $additional_class; if($page_post === false){ ?> ctaction__page<?php }?>" <?php if(!empty(get_field('block_id'))){ echo 'id="'. get_field('block_id') .'"'; } ?>>
	<div class="ctaction__block">
		<span class="ctaction__title">
			<?php echo ($cta_title)
			? do_shortcode($cta_title)
			: ''; ?>
		</span>
		<span class="ctaction__subtitle">
			<?php echo ($cta_subtitle)
			? do_shortcode($cta_subtitle)
			: ''; ?>
		</span>
		<a href="<?php echo $cta_button_link; ?>" class="ctaction__btn" rel="nofollow"><?php echo $cta_button_text; ?></a>
	</div>
</div>