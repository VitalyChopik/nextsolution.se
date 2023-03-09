<?php
/**
 * Block Name: Konstlagret result
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
$title                 = getFieldValue( $page_fields, 'title' );
$description           = getFieldValue( $page_fields, 'description' );
$image_url             = getFieldValue( $page_fields, 'image' );

?>

<div class="section__wrapper" <?php if(!empty(get_field('block_id'))){ echo 'id="'. get_field('block_id') .'"'; } ?>>
<section class="result bg <?php echo $additional_class; ?>">
	<div class="container">
		<div class="col-md-12 result__content">
			<div class="row text custom__animate slideIn-bottom">
				<div class="col-md-12">
					<span>
						<?php echo ( $title )
							? do_shortcode( $title )
							: ''; ?>
					</span>
					<div class="description">
						<?php echo ( $description )
							? do_shortcode( $description )
							: ''; ?>
					</div>
				</div>
			</div>
			<div class="result-block custom__animate appear delay-2">
				<div class="result-block--screen">
					<img src="<?php echo ($image_url)
							? do_shortcode($image_url)
							: ''; ?>"
					     alt="Result image">
					<i class="icon-arrow-right"></i>
				</div>
			</div>
		</div>
	</div>
</section>
</div>

