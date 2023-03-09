<?php
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

				<?php if (is_single()) {
					$this_post = get_the_ID();
				} else {
					$this_post = '';
				}
				if (!empty(get_field('exclude_posts'))) {
					$exclude_posts = array_push(get_field('exclude_posts'), $this_post);
				} else {
					$exclude_posts = array($this_post);
				}

				$args = array(
					'post_type'			=> 'services-post',
					'posts_per_page'	=> -1,
					'post_status'		=> 'publish',
					'post__not_in'		=> $exclude_posts,
					'post__in'			=> get_field('include_posts')
				);

				$wp_query = new WP_Query($args);

				if ($wp_query->have_posts()) { ?>

					<?php while ($wp_query->have_posts()) {
						$wp_query->the_post(); ?>

						<div class="row card custom__animate appear--custom fast">
							<div class="col-md-4 info">
								<h2 class="title-h2">
									<?php echo get_the_title(); ?>
								</h2>

								<p class="description">
									<?php echo get_field('subtitle', get_the_ID()); ?>
								</p>

								<?php if (get_field('service_role', get_the_ID())) { ?>
									<ul>
										<?php foreach (get_field('service_role', get_the_ID()) as $role) { ?>
											<li>
												<a href="<?php echo $role['link']; ?>"><?php echo $role['item']; ?></a>
											</li>
										<?php } ?>
									</ul>
								<?php } ?>

							</div>
							<div class="col-md-7 offset-md-1 text">

								<p class="description">
									<?php echo get_field('short_description', get_the_ID()); ?>
								</p>
								<div class="d-flex justify-content-md-start justify-content-center">
									<a href="<?php echo get_the_permalink(); ?>">
										<div class="btn">
											<?php _e('Läs mer', 'corppix_site'); ?>
										</div>
									</a>
								</div>


							</div>
						</div>

					<?php }
					wp_reset_query(); ?>

				<?php }
				wp_reset_postdata(); ?>

			</div>
		</div>
	</section>
</div>