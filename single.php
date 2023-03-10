<?php
get_header();

$post_id    = $post->ID;
$feat_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID) );
$post_date  = get_the_date('j F Y', $post_id);
?>


<?php
do_action( 'corppix_before_page_content' );

if ( have_posts() ) :
	// Start the loop.
	while ( have_posts() ) : the_post();
		add_filter( 'the_content', 'wpautop' );
		?>
		<section class="nyheter-welcome bg">
			<div class="container">
				<div class="row">
					<div class="col-md-5 nyheter-welcome__image custom__animate zoomIn--custom over">
						<div class="img">
						<?php
						$image_url = kama_thumb_src( array(
							'src' => $feat_image,
							'w' => 840,
							'h' => 840,
						));
						?>
						<svg viewBox="0 0 420 420" role="img" class="image-mask" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
							<?php $rand_id = bin2hex(random_bytes(10)); ?>
							<mask id="svgmask-<?php echo $rand_id; ?>">
								<path fill="#ffffff" d="M58.1,84.3C137.8,15,316.4-40.2,369.2,38.7c52.8,78.9,66.3,178.4,31.7,250.2c-20,41.5-44.1,58-81.9,81.7
				c-87.8,55.2-187.9,75.8-260.9,0C-17,292.7-21.7,153.6,58.1,84.3z"/>
							</mask>
							<image width="100%" height="100%" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $image_url ?>" mask="url(#svgmask-<?php echo $rand_id; ?>)"></image>
						</svg>
						</div>
					</div>
					<div class="col-md-6 offset-md-1 nyheter-welcome__text custom__animate slideIn-left under">
						<span><?php echo $post_date; ?></span>
						<h1 class="title-h2"><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
		</section>

		<section class="vanilla-descript bg blog__content">
			<div class="container">
				<div class="row">
					<!-- <div class="col-md-8 mx-auto"> -->
					<div class="col-md-8">
						<div class="description custom__animate slideIn-bottom single__content">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	endwhile;
endif;
?>
<section class="nyheter-list bg">
	<div class="container">
		<div class="co-md-12">
			<h3 class="title-h3 custom__animate slideIn-top"><?php _e('Du kanske även gillar'); ?></h3>
			<div class="row list-card">
			<?php		
				$block_class = 'col-md-4';
        global $post;
        $query = new WP_Query( [
          'post_type'    => 'post',
          'posts_per_page' => 2,
          'post__not_in' =>  array( $post_id ),
          'orderby'      => 'date',
          'order'        =>  'DESC',
          
        ] );
        if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
            $query->the_post();
						$post_ID = $query->ID;
						include( locate_template( 'template-parts/blog-card-item.php',
						false, false ) );
					}
          ?>
				<?php
        }
        wp_reset_postdata(); // Сбрасываем $post
      ?>
			</div>
		</div>
	</div>
</section>
<?php
do_action( 'corppix_after_page_content' );
?>


<?php get_footer(); ?>
