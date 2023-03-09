<?php

/*/**
 * Block Name: Hero banner
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
$top_title        = getFieldValue( $page_fields, 'top_title' );
$bottom_title     = getFieldValue( $page_fields, 'bottom_title' );
$block_image_url  = getFieldValue( $page_fields, 'block_image' );

?>

<div class="section__wrapper" <?php if(!empty(get_field('block_id'))){ echo 'id="'. get_field('block_id') .'"'; } ?>>
    <section class="welcome bg <?php echo $additional_class; ?>">
        <div class="welcome__content">
            <div class="top-title-animate h1-style js-top-title-logo">
                <?php echo ( $top_title )
                    ? do_shortcode( $top_title )
                    : ''; ?>
            </div>
            <div class="animate-logo__wrapper">
                <img src="<?php echo ( $block_image_url )
                    ? $block_image_url
                    : ''; ?>"
                        class="animate-logo"
                        alt="Site logo">
                <!--                         animate__animated animate__rotateIn-->

            </div>
            <div class="bottom-title-logo h1-style js-bottom-title-logo">
                <!--                    animate__animated animate__slideInUp animate__delay-2s animate__slow 2s-->
                <?php echo ( $bottom_title )
                    ? do_shortcode( $bottom_title )
                    : ''; ?>
            </div>
        </div>
    </section>
</div>
