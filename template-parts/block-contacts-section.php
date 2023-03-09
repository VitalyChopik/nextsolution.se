<?php
/**
 * Block Name: Contacts section
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
$image_url             = getFieldValue( $page_fields, 'image' );
$info_card_title       = getFieldValue( $page_fields, 'info_card_title' );
$info_card_description = getFieldValue( $page_fields, 'info_card_description' );
global $global_options;
$phone                 = getFieldValue( $global_options, 'phone' );
$email            	   = getFieldValue( $global_options, 'email' );

?>

<div class="section__wrapper" <?php if(!empty(get_field('block_id'))){ echo 'id="'. get_field('block_id') .'"'; } ?>>
    <section class="kontact bg <?php echo $additional_class; ?>">
        <div class="running-string slower overflow-auto">
			<?php if ( $repeater_slider_title ): ?>
				<?php foreach ( $repeater_slider_title as $key => $item ): ?>
					<?php
					$slider_title = ( array_key_exists( 'slider_title', $item ) )
						? $item['slider_title']
						: '';
					?>
					<?php echo do_shortcode( $slider_title ); ?>
					<?php /* if ( $key !== ( count( $repeater_slider_title ) - 1 ) ): ?>
                        <span></span>
					<?php endif; */ ?>
                        <span></span>
				<?php endforeach; ?>
			<?php endif; ?>
        </div>
        <div class="container">
            <div class="kontact__content">
                <div class="kontact__image custom__animate zoomIn--custom delay-2">
                    <div class="img">
                        <img src="<?php echo ( $image_url )
                            ? do_shortcode( $image_url )
                            : ''; ?>"
                                alt="image">
                    </div>
                </div>
                <div class="kontact__text">
                    <div class="square custom__animate appear delay-2">
                        <h2 class="title-h2">
                            <?php echo ( $info_card_title )
                                ? do_shortcode( $info_card_title )
                                : ''; ?>
                        </h2>
                        <h3 class="title-h3">
                            <?php echo ( $info_card_description )
                                ? do_shortcode( $info_card_description )
                                : ''; ?>
                        </h3>

                        <div class="trapeze custom__animate appear delay-3">
                            <div class="trapeze__block">
                                <?php
                                 if (!empty($phone)) {
                                        $phone_arr = explode(',', $phone);
                                        if (!empty($phone_arr)) {
                                            foreach ($phone_arr as $item) {
                                               $tel_attr = preg_replace('/([\-\s\(\)\/])+/', '', $item);
                                               echo '<a href="tel:' . $tel_attr . '" class="btn-phone" >' . '<span class="icon-phone"></span>' . '</a>';
                                            }
                                        }
                                 }
                                ?>
                                    
                                <?php if ($email) : ?>
                                    <a class="btn-mail btn-phone" href="mailto:<?php echo $email; ?>">
                                        <img src="<?php echo get_template_directory_uri();?>/development/img/mail-icon.svg" alt="mail">
                                    </a>
                                <?php endif; ?>
                                    
                                <span class="title-h3">
                                <?php _e( 'Ring eller maila oss!' ); ?>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>