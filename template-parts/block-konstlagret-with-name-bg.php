<?php
/**
 * Block Name: Konstlagret with name bg
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$page_fields = get_fields();

$additional_class       = ( array_key_exists( 'className', $block ) )
	? $block['className']
	: '';
$repeater_slider_title  = getFieldValue( $page_fields, 'repeater_slider_title' );
$left_side_title        = getFieldValue( $page_fields, 'left_side_title' );
$left_side_description  = getFieldValue( $page_fields, 'left_side_description' );
$right_side_title       = getFieldValue( $page_fields, 'right_side_title' );
$right_side_description = getFieldValue( $page_fields, 'right_side_description' );
$button_text            = getFieldValue( $page_fields, 'button_text' );
$button_link            = getFieldValue( $page_fields, 'button_link' );

?>

<div class="section__wrapper" <?php if(!empty(get_field('block_id'))){ echo 'id="'. get_field('block_id') .'"'; } ?>>
<section class="challenge bg <?php echo $additional_class; ?>">
	<div class="container">
		<div class="col-md-12 challenge__content custom__animate slideIn-bottom">
			<div class="row">
				<div class="col-md-6 text">
					<span class="title">
						<?php echo ( $left_side_title )
							? do_shortcode( $left_side_title )
							: ''; ?>
					</span>
						<?php echo ( $left_side_description )
							? do_shortcode( $left_side_description )
							: ''; ?>
                    </div>
                    <div class="col-md-5 offset-md-1 description btn-block">
                        <div class="d-flex btn-block__container">
                            <div>
                                <p class="title">
									<?php echo ( $right_side_title )
										? do_shortcode( $right_side_title )
										: ''; ?>
                                </p>
								<?php echo ( $right_side_description )
									? do_shortcode( $right_side_description )
									: ''; ?>
                            </div>

						<div class="btn-position">
							<a href="<?php echo ($button_link )
								? do_shortcode($button_link)
								: ''; ?>"
							   class="btn">
								<?php echo ($button_text)
									? do_shortcode($button_text)
									: ''; ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
