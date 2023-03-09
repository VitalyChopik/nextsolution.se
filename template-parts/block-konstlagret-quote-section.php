<?php
/**
 * Block Name: Konstlagret quote section
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
$quote                 = getFieldValue( $page_fields, 'quote' );

?>

<div class="section__wrapper" <?php if(!empty(get_field('block_id'))){ echo 'id="'. get_field('block_id') .'"'; } ?>>
<section class="citat bg <?php echo $additional_class; ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-8 citat__content custom__animate slideIn-bottom">
				<div class="description">
					<?php echo ( $quote )
						? do_shortcode( $quote )
						: ''; ?>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
