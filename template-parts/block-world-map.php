<?php
/**
 * Block Name: World map
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$page_fields = get_fields();

$additional_class = ( array_key_exists( 'className', $block ) )
	? $block['className']
	: '';
$block_title      = getFieldValue( $page_fields, 'block_title' );
$image_url        = getFieldValue( $page_fields, 'image' );

?>

<div class="section__wrapper" <?php if(!empty(get_field('block_id'))){ echo 'id="'. get_field('block_id') .'"'; } ?>>
    <section class="map bg <?php echo $additional_class; ?>">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <h2 class="title-h1 slideIn-top">
						<?php echo ( $block_title )
							? do_shortcode( $block_title )
							: ''; ?>
                    </h2>
                </div>
                <div class="col-12 map__contant">
                    <div class="map__block custom__animate appear slower delay-1">
                        <img src="<?php echo ( $image_url ) ? $image_url : ''; ?>"
                             alt="map">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>