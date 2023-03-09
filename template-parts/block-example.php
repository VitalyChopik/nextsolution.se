<?php
/**
 * Block Name: About banner block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$page_fields = get_fields();

$additional_class   = ( $block['className'] ) ? $block['className'] : '';
$image_id           = getFieldValue($page_fields, 'about_banner_image');
$side_image_url     = wp_get_attachment_image_url( $image_id, 'full' );
?>

<div class="about-banner <?php echo $additional_class; ?>" <?php if(!empty(get_field('block_id'))){ echo 'id="'. get_field('block_id') .'"'; } ?>>
	<div class="container about-banner__container">
		<div class="about-banner__content">
			<?php
			if ( $side_image_url ) {
				echo '<img src="'.$side_image_url.'" alt="about us image" />';
			}
			?>
		</div>
	</div>
</div>
