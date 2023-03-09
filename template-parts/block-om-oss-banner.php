<?php

/**
 * Block Name: Om oss banner
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$page_fields = get_fields();

$additional_class         = (array_key_exists('className', $block))
	? $block['className']
	: '';
$repeater_slider_title    = getFieldValue($page_fields, 'repeater_slider_title');
$description              = getFieldValue($page_fields, 'description');
$image_url                = getFieldValue($page_fields, 'image');
$bottom_description_block = getFieldValue($page_fields, 'bottom_description_block');
$block_button_text           = getFieldValue($page_fields, 'button_text');
$block_button_link           = getFieldValue($page_fields, 'button_link');

$is_bottom_description = false;

//if ( $additional_class && $additional_class === 'additional-bottom-description' ) {
//	$is_bottom_description = true;
//}




?>

<div class="section__wrapper" <?php if (!empty(get_field('block_id'))) {
									echo 'id="' . get_field('block_id') . '"';
								} ?>>
	<section class="info-omoss info-omoss--run bg <?php echo $additional_class; ?>">
		<div class="running-string slideInRight <?php /* i`ve remove styles: 'animated slower'; */ ?> overflow-auto">
			<?php if ($repeater_slider_title) : ?>
				<?php foreach ($repeater_slider_title as $key => $item) : ?>
					<?php
					$slider_title = (array_key_exists('slider_title', $item))
						? $item['slider_title']
						: '';
					?>
					<?php echo do_shortcode($slider_title); ?>
					<?php /* if ( $key !== ( count( $repeater_slider_title ) - 1 ) ): ?>
                        <span></span>
					<?php endif; */ ?>
					<span></span>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="container">
			<div class="info-omoss__content">
				<div class="row align-items-md-center">
					<div class="col-lg-7 offset-lg-0 col-md-6 offset-md-1 col-12 custom__animate delay-4 m-delay-4 slideIn-right">
						<div class="description <?php echo ($is_bottom_description)
													? 'arrow mob'
													: ''; ?>">
							<?php echo ($description)
								? do_shortcode($description)
								: ''; ?>
						</div>
					</div>
					<div class="col-lg-4 offset-lg-0 col-md-4 offset-md-0 col-8 offset-2 image">
						<?php if ($image_url) : ?>
							<div class="info-omoss__content-img delay-3 custom__animate slideIn-left">
								<?php
								$image_url = kama_thumb_src(array(
									'src' => $image_url,
									'w' => 840,
									'h' => 840,
								));
								?>
								<svg viewBox="0 0 420 420" role="img" class="image-mask" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
									<?php $rand_id = bin2hex(random_bytes(10)); ?>
									<mask id="svgmask-<?php echo $rand_id; ?>">
										<path fill="#ffffff" d="M58.1,84.3C137.8,15,316.4-40.2,369.2,38.7c52.8,78.9,66.3,178.4,31.7,250.2c-20,41.5-44.1,58-81.9,81.7
c-87.8,55.2-187.9,75.8-260.9,0C-17,292.7-21.7,153.6,58.1,84.3z" />
									</mask>
									<image width="100%" height="100%" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $image_url ?>" mask="url(#svgmask-<?php echo $rand_id; ?>)"></image>
								</svg>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<?php if ($block_button_link && $block_button_text) { ?>
					<div class="information__button d-flex justify-content-center delay-3 custom__animate slideIn-bottom">
						<a href="<?php echo $block_button_link; ?>"><?php echo $block_button_text; ?></a>
					</div>
				<?php } ?>
				<?php if ($bottom_description_block) : ?>
					<div class="row sub-description">
						<!-- <div class="col-md-12 description custom__animate text-left"> -->
						<div class="col-md-12 description text-left">
							<?php echo ($bottom_description_block)
								? do_shortcode($bottom_description_block)
								: ''; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>