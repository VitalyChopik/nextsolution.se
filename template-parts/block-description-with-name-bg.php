<?php

/*/**
 * Block Name: Description with name bg
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$page_fields = get_fields();

$additional_class  = ( array_key_exists( 'className', $block ) )
	? $block['className']
	: '';
$title             = getFieldValue( $page_fields, 'title' );
$description_block = getFieldValue( $page_fields, 'description_block' );
$image_url         = getFieldValue( $page_fields, 'image' );
$bot_description   = getFieldValue( $page_fields, 'bot_description' );
?>

<div class="section__wrapper" <?php if(!empty(get_field('block_id'))){ echo 'id="'. get_field('block_id') .'"'; } ?>>
    <section class="info-omoss bg <?php echo $additional_class; ?>">

        <svg class="svg-image" width="286" height="577" viewBox="0 0 286 577" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <circle opacity="0.7" cx="8" cy="299" r="277.65" stroke="#F6921E" stroke-width="0.7"/>
            <circle opacity="0.5" cx="-59" cy="227" r="226.75" stroke="#F6921E" stroke-width="0.5"/>
        </svg>

        <div class="container">
            <div class="info-omoss__content">
                <div class="row align-items-center">
                    <div class="col-md-12 hidden mob-title">
                        <h3 class="title-h3">
                            <?php echo ( $title ) ? do_shortcode( $title ) : ''; ?>
                        </h3>
                    </div>
                    <div class="col-md-7 custom__animate delay-2 m-delay-1 slideIn-right">
                        <div class="description">
                            <h3 class="title-h3 mob-hide">
                                <?php echo ( $title ) ? do_shortcode( $title ) : ''; ?>
                            </h3>
                            <?php echo ( $description_block )
                                ? do_shortcode( $description_block )
                                : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-5 image no-arrow">
                        <div class="info-omoss__content-img custom__animate zoomIn-goRight">
                            <?php
                            $image_url = kama_thumb_src( array(
                                'src' => $image_url,
                                'w' => 840,
                                'h' => 840,
                            ));
                            ?>
                            <svg viewBox="0 0 420 420" role="img" class="image-mask" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                                <?php $rand_id = bin2hex(random_bytes(10)); ?>
                                <mask id="svgmask-<?php echo $rand_id; ?>">
                                    <path fill="#ffffff" d="M58.1,84.3C137.8,15,316.4-40.2,369.2,38.7c52.8,78.9,66.3,178.4,31.7,250.2c-20,41.5-44.1,58-81.9,81.7
    c-87.8,55.2-187.9,75.8-260.9,0C-17,292.7-21.7,153.6,58.1,84.3z"/>
                                </mask>
                                <image width="100%" height="100%" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $image_url ?>" mask="url(#svgmask-<?php echo $rand_id; ?>)"></image>
                            </svg>
                    
                            
                        </div>
                    </div>

                </div>
                <?php if ( $bot_description ) { ?>
                    <div class="row sub-description">
                        <div class="col-md-12 description">
                            <?php echo $bot_description; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</div>
