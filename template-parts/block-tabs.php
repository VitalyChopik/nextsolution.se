<?php

/**
 * Block Name: Tabs
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$page_fields = get_fields();
$tabs = getFieldValue($page_fields, 'tabs-group');
$rand = rand(1, 999);
?>

<div class="section__wrapper" <?php if (!empty(get_field('block_id'))) {
									echo 'id="' . get_field('block_id') . '"';
								} ?>>
	<section class="info-omoss pd-0 bg" <?php if (!empty(get_field('block_id'))) {
											echo 'id="' . get_field('block_id') . '"';
										} ?>>
		<div class="container">
			<div class="row">
				<div id="tabs" class="col-md-12 info-omoss__content">
					<ul class="tabs-ul d-md-flex d-none custom__animate zoomIn--custom">
						<?php foreach ($tabs as $key => $val) { ?>
							<li>
								<a class="js-nav-selector <?php echo $key === 0 ? 'active' : ''; ?>" href="#tab-<?php echo $rand + $key ?>">
									<?php echo $val['nav_text']; ?>
								</a>
							</li>
						<?php } ?>
					</ul>
					<?php foreach ($tabs as $key => $val) { ?>
						<div id="tab-<?php echo $rand + $key ?>" class="tab js-tab-selector <?php echo $key === 0 ? 'active' : ''; ?>">
							<div class="row">

								<div class="col-md-6 custom__animate slideIn-left">
									<div class="col-md-12 d-md-none d-block mob-title">
										<?php if (isset($val['title']) && !empty($val['title'])) { ?>
											<h3 class="title-h3">
												<?php echo $val['title']; ?>
											</h3>
										<?php } ?>
									</div>
									<div class="description">
										<?php echo $val['description']; ?>
									</div>
									<div class="d-flex justify-content-md-start justify-content-center">
										<?php if (is_array($val['link'])) { ?>
											<a href="<?php echo $val['link']['url']; ?>" class="btn">
												<?php echo $val['button_text']; ?>
											</a>
										<?php } ?>
									</div>
								</div>
								<div class="col-md-5 offset-md-1 col-7 image arrow custom__animate zoomIn--custom">
									<?php if ($val['image']) { ?>
										<div class="info-omoss__content-img arrow">
											<?php
											$image_url = kama_thumb_src(array(
												'src' => $val['image'],
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
									<?php } ?>
								</div>
							</div>

						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
</div>