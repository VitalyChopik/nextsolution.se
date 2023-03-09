<?php

/**
 * Block Name: Konstlagret banner
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$page_fields = get_fields();

$additional_class      = (array_key_exists('className', $block))
	? $block['className']
	: '';
$repeater_slider_title = getFieldValue($page_fields, 'repeater_slider_title');
$pretitle              = getFieldValue($page_fields, 'pretitle');
$title                 = getFieldValue($page_fields, 'title');
$sub_title             = getFieldValue($page_fields, 'sub_title');
$button_text           = getFieldValue($page_fields, 'button_text');
$button_link           = getFieldValue($page_fields, 'button_link');
$image_url             = getFieldValue($page_fields, 'image');
?>

<div class="section__wrapper" <?php if (!empty(get_field('block_id'))) {
									echo 'id="' . get_field('block_id') . '"';
								} ?>>
	<section class="konstlagret bg <?php echo $additional_class; ?>">
		<div class="container">
			<div class="row z-in">
				<div class="col-md-12 konstlagret__content">
					<div class="row">
						<div class="col-md-7">
							<span class="custom__animate appear delay-3">
								<?php echo ($pretitle)
									? do_shortcode($pretitle)
									: ''; ?>
							</span>
							<h2 class="custom__animate slideIn-top delay-2">
								<?php echo ($title)
									? do_shortcode($title)
									: ''; ?>
							</h2>
							<h3 class="title-h3 custom__animate slideIn-bottom delay-2">
								<?php echo ($sub_title)
									? do_shortcode($sub_title)
									: ''; ?>
							</h3>
							<a href="<?php echo ($button_link)
											? do_shortcode($button_link)
											: ''; ?>" class="btn konstlagret__btn-more custom__animate appear delay-3">
								<?php echo ($button_text)
									? do_shortcode($button_text)
									: ''; ?>
								<i class="icon-arrow-down"></i>
							</a>
						</div>
						<div class="col-md-5">
							<div class="img custom__animate zoomIn-goRight-konstlagret">
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>