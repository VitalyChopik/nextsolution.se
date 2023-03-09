<?php
get_header();
$categories        = get_categories();
$page_for_posts_id = get_option('page_for_posts');
$corp              = new Corppix();
$blog_class        = ( $corp->is_blog() && !is_category() ) ? 'current-menu-item' : '';
$queried_id        = get_queried_object_id();
?>

<div class="nyheter bg">
	<section class="nyheter--header">
		<div class="running-string slideInRight <?php /* i`ve remove styles: 'animated slower'; */ ?> overflow-auto">
			Nyheter<span></span>Nyheter<span></span>Nyheter<span></span>
			Nyheter<span></span>Nyheter<span></span>Nyheter<span></span>
		</div>
	</section>

	<section class="container">
	<div class="co-md-12">
	<?php
	do_action( 'corppix_before_page_content' );
	$args = array(
		'post_status'		=> 'publish',
	);

	$wp_query = new WP_Query($args);
	if ($wp_query->have_posts()) :


		?>
		<div id="tabs" class="blog__tabs">
			<?php 		
			if ( $categories ) {
				?>
				<ul class="tabs-ul custom__animate appear">
					<li>
						<a class="js-nav-selector active <?php echo $blog_class?>" href="#tab-all">
							<?php _e('All', 'corppix_site'); ?>
						</a>
					</li>
					<?php $cat_posts = array();
					foreach ($categories as $category) { 
						$cat_id  = $category->cat_ID;
						?>

						<li>
							<a class="js-nav-selector" href="#tab-<?php echo $category->slug; ?>">
								<?php echo $category->name; ?>
							</a>
						</li>
					<?php $cat_posts[$category->slug] = array();
					} ?>

				</ul>
				<?php 
			} ?>
		</div>
		<?php

		echo '<div class="row list-card tab js-tab-selector active" id="tab-all" >';
			while ($wp_query->have_posts()) {
				$wp_query->the_post();
				// add_filter( 'the_content', 'wpautop' );
				$block_class = (isset($block_class) && !empty($block_class)) ? $block_class : 'col-md-4';
				$post_ID     = (isset($post_ID) && !empty($post_ID)) ? $post_ID : $post->ID;
				// $feat_image  = wp_get_attachment_url(get_post_thumbnail_id($post_ID));
				$feat_image  = get_the_post_thumbnail_url();
				
				$post_date   = get_the_date('j F Y');

				$categories = get_the_category();
				foreach ($categories as $cat) {
					$cat_post = array(
						'title' => get_the_title(),
						'date' => get_the_date('j F Y'),
						'thumb_url' => get_the_post_thumbnail_url(),
						'permalink' => get_the_permalink(),
					);

					array_push($cat_posts[$cat->slug], $cat_post);
					?>

					<?php
				}
				
				?>

				
				<div class="blog-post " data-id="<?php echo $post_ID; ?>" <?php if (!empty(get_field('block_id'))) {
																				echo 'id="' . get_field('block_id') . '"';
																			} ?>>
					<div class="img custom__animate zoomIn--custom delay-1">
						<?php
						$image_url = kama_thumb_src(array(
							'src' => $feat_image,
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
					<div class="text custom__animate appear delay-2">
						<div class="post-date"><span><?php echo $post_date; ?></span></div>
						<h3 class="title-h3"><?php the_title(); ?></h3>
					</div>
					<a href="<?php echo get_permalink(); ?>" class="blog-post__cover-full"></a>
				</div>
			<?php
			}
			wp_reset_query(); 
		echo '</div>';
		 foreach ($cat_posts as $key => $value) {?>
			
			<div id="tab-<?php echo $key; ?>" class="row list-card tab js-tab-selector">
			
				<?php $i = 0;
				foreach ($value as $post) {
					?>
					<div class="blog-post " data-id="<?php echo $post_ID; ?>" <?php if (!empty(get_field('block_id'))) {
																					echo 'id="' . get_field('block_id') . '"';
																				} ?>>
						<div class="img custom__animate zoomIn--custom delay-1">
							<?php
							$image_url = kama_thumb_src(array(
								'src' => $post['thumb_url'],
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
						<div class="text custom__animate appear delay-2">
							<div class="post-date"><span><?php echo $post['date']; ?></span></div>
							<h3 class="title-h3"><?php echo $post['title']; ?></h3>
						</div>
						<a href="<?php echo $post['permalink']; ?>" class="blog-post__cover-full"></a>
					</div>
					<?php
				 } ?>
			
			</div>
			
			<?php } 
		// Previous/next page navigation.
		the_posts_pagination( array(
			'prev_text' => __( '', 'twentyfifteen' ),
			'next_text' => __( '', 'twentyfifteen' ),
			'prev_next' => true,
			'screen_reader_text' => __( '' ),
			'mid_size' => 1,
			'before_page_number' => '',
		) );

	endif;
	wp_reset_postdata();
	do_action( 'corppix_after_page_content' );
	?>
	
	</div>
	</div>
</section>

<?php get_footer(); ?>
