<?php
/**
 * Block Name: Onboarding section
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

$background_image        = getFieldValue( $page_fields, 'onboarding_bg_image' );
$onboarding_top_title    = getFieldValue( $page_fields, 'onboarding_top_title' );
$onboarding_bottom_title = getFieldValue( $page_fields, 'onboarding_bottom_title' );
$left_side_image         = getFieldValue( $page_fields, 'left_side_image' );
$right_side_image_url    = getFieldValue( $page_fields, 'right_side_image' );

?>

<div class="section__wrapper" <?php if(!empty(get_field('block_id'))){ echo 'id="'. get_field('block_id') .'"'; } ?>>
    <section class="onboarding bg <?php echo $additional_class; ?>">
        <div class="onboarding__menu-wrapper container">
			<?php
			wp_nav_menu( [
				'theme_location'  => 'primary',
				'menu'            => '',
				'container'       => null,
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'onboarding__menu nav',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => '',
			] );
			?>

            <button class="icon-menu onboarding__btn-menu js-onboarding-btn">
                <svg width="63"
                     height="23"
                     class="icon-menu-burger"
                     viewBox="0 0 63 23"
                     fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <line y1="1.5"
                          x2="46" y2="1.5" stroke="#F6921E" stroke-width="2"/>
                    <line y1="11.5"
                          x2="46" y2="11.5" stroke="#F6921E" stroke-width="2"/>
                    <line y1="21.5"
                          x2="46" y2="21.5" stroke="#F6921E" stroke-width="2"/>
                </svg>
            </button>
        </div>
        <div class="container onboarding__container">
            <div class="row onboarding__row">
                <div class="col-md-6 onboarding__side onboarding__left-side px-0">
                    <div class="onboarding__left-side-content">
                        <div class="onboarding__title">
							<?php echo ( $onboarding_top_title )
								? do_shortcode( $onboarding_top_title )
								: ''; ?>
                        </div>
                        <div class="onboarding__site-logo">
                            <img src="<?php echo ( $left_side_image )
								? do_shortcode( $left_side_image )
								: ''; ?>"
                                 alt="Logo site">
                        </div>
                        <div class="onboarding__subtitle">
							<?php echo ( $onboarding_bottom_title )
								? do_shortcode( $onboarding_bottom_title )
								: ''; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 onboarding__side onboarding__right-side px-0">
                    <div class="onboarding__right-side-image">
                        <img src="<?php echo ( $right_side_image_url )
							? do_shortcode( $right_side_image_url )
							: ''; ?>"
                             alt="Gallery image">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>