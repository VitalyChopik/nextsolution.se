<?php

/**
 * Block Name: Services
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$page_fields = get_fields();

$additional_class = (array_key_exists('className', $block))
	? $block['className']
	: '';
$block_title      = getFieldValue($page_fields, 'block_title');
$repeater_cards   = getFieldValue($page_fields, 'repeater_cards');

?>

<div class="section__wrapper" <?php if (!empty(get_field('block_id'))) {
									echo 'id="' . get_field('block_id') . '"';
								} ?>>
	<section class="services bg2 <?php echo $additional_class; ?>">
		<div class="container">
			<div class="services__content">
				<h1 class="title-h1 custom__animate zoomIn--custom">
					<?php echo ($block_title)
						? do_shortcode($block_title)
						: ''; ?>
				</h1>

				<?php if ($repeater_cards) : ?>
					<?php foreach ($repeater_cards as $key => $card) : ?>
						<?php
						$item_title = (array_key_exists('item_title', $card))
							? $card['item_title']
							: '';
						$services_sub_title = (array_key_exists('services_sub_title', $card))
							? $card['services_sub_title']
							: '';
						$description = (array_key_exists('description', $card))
							? $card['description']
							: '';
						$repeater_services = (array_key_exists('repeater_services_items', $card))
							? $card['repeater_services_items']
							: null;
						$button_text = (array_key_exists('button_text', $card))
							? $card['button_text']
							: '';
						$button_link = (array_key_exists('button_link', $card))
							? $card['button_link']
							: '';
						?>
						<!-- <div class="row card custom__animate appear--custom fast delay-<?php echo $key + 1  ?>"> -->
						<div class="row card custom__animate appear--custom fast">
							<div class="col-md-6 info">
								<h2 class="title-h2">
									<?php echo do_shortcode($item_title); ?>
								</h2>
								<p class="description">
									<?php echo do_shortcode($services_sub_title); ?>
								</p>
								<ul>
									<?php if ($repeater_services) : ?>
										<?php foreach ($repeater_services as $service) : ?>
											<li>
												<a href="<?php echo (array_key_exists('service_link', $service))? $service['service_link']: ''; ?>">
												<?php echo (array_key_exists('service_name', $service))
													? $service['service_name']
													: ''; ?>
												</a>
											</li>
										<?php endforeach; ?>
									<?php endif; ?>
								</ul>
							</div>
							<div class="col-md-6 text">
								<p class="description">
									<?php echo do_shortcode($description); ?>
								</p>
								<div class="d-flex justify-content-md-start justify-content-center">
									<a href="<?php echo $button_link; ?>">
										<div class="btn">
											<?php echo do_shortcode($button_text); ?>
										</div>
									</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>