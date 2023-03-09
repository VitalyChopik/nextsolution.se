<?php
/**
 * Block Name: Top slider
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$page_fields = get_fields();

$additional_class      = ( array_key_exists( 'className', $block ) )
	? $block['className']
	: '';
$repeater_slider_title = getFieldValue( $page_fields, 'repeater_slider_title' );

?>

<div class="section__wrapper section__wrapper--no-full-height" <?php if(!empty(get_field('block_id'))){ echo 'id="'. get_field('block_id') .'"'; } ?>>
<section class="info-omoss bg <?php echo $additional_class; ?>">
	<div class="running-string  slower overflow-auto ">
		<?php if ( $repeater_slider_title ): ?>
			<?php foreach ( $repeater_slider_title as $key => $item ): ?>
				<?php
				$slider_title = ( array_key_exists( 'slider_title', $item ) )
					? $item['slider_title']
					: '';
				?>
				<?php echo do_shortcode( $slider_title ); ?>
				<?php if ( $key !== ( count( $repeater_slider_title )  ) ): ?>
					<span></span>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>
</div>
</section>
</div>