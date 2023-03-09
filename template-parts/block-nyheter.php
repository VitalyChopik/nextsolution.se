<?php

/**
 * Block Name: Nyheter
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
$title = getFieldValue($page_fields, 'title');
$categories = getFieldValue($page_fields, 'categories');

if (!function_exists('get_cat_ids')) {
	function get_cat_ids($category)
	{
		return $category->term_id;
	}
}

$categories = array_map('get_cat_ids', $categories);
?>

<div class="section__wrapper" <?php if (!empty(get_field('block_id'))) {
									echo 'id="' . get_field('block_id') . '"';
								} ?>>
	<section class="nyheter bg2 <?php echo $additional_class; ?>">
		<div class="container">
			<div class="nyheter__content">
				<h2 class="title-h2">
					<?php echo $title ?>
				</h2>
				<div class="nyheter__list d-flex row justify-content-md-between">
					<?php
					$args = array(
						'post_type'			=> 'post',
						'posts_per_page'	=> 2,
						'post_status'		=> 'publish',
						'category__in'		=> $categories,
					);

					$wp_query = new WP_Query($args);

					if ($wp_query->have_posts()) { ?>

						<?php while ($wp_query->have_posts()) {
							$wp_query->the_post(); ?>
							<a href="<?php the_permalink(); ?>" class=" col-md-6 col-sm-12 nyheter__list--item blog-post">
								<div class="nyheter__list--item--img">
									<?php
									$image_url = kama_thumb_src(array(
										'src' => get_the_post_thumbnail_url(get_the_ID()),
										'w' => 600,
										'h' => 600,
									));
									?>
									<svg viewBox="0 0 420 420" role="img" class="image-mask" preserveAspectRatio="xMidYMid slice">
										<?php $rand_id = bin2hex(random_bytes(10)); ?>
										<mask id="svgmask-<?php echo $rand_id; ?>">
											<path fill="#ffffff" d="M58.1,84.3C137.8,15,316.4-40.2,369.2,38.7c52.8,78.9,66.3,178.4,31.7,250.2c-20,41.5-44.1,58-81.9,81.7
	c-87.8,55.2-187.9,75.8-260.9,0C-17,292.7-21.7,153.6,58.1,84.3z" />
										</mask>
										<image width="100%" height="100%" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $image_url ?>" mask="url(#svgmask-<?php echo $rand_id; ?>)"></image>
									</svg>
								</div>
								<div class="text">
									<div class="nyheter__list--item--date"><?php the_date('j F Y'); ?></div>
									<h3 class="nyheter__list--item--title title-h3"><?php the_title(); ?></h3>
								</div>
							</a>

						<?php }
						wp_reset_query(); ?>

					<?php }
					wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</section>
</div>