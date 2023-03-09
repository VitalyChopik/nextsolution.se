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

	if ( have_posts() ) :
		if ( $categories ) {
			?>
			<nav class="nav-case custom__animate appear">
				<ul>
					<?php
					echo '<li class="'.$blog_class.'">
							<a href="'.get_permalink($page_for_posts_id).'">All</a>
						  </li>';

					foreach($categories as $category) {
						$cat_id  = $category->term_id;

						$add_class = ( $queried_id === $cat_id ) ? 'current-menu-item' : '';

						echo '<li class="'.$add_class.'">
								<a href="' . get_category_link($category->term_id) . '">'
									. $category->name .
								'</a></li>';
					}
					?>
				</ul>
			</nav>
			<?php
		}

		echo '<div class="row list-card">';
		$i = 0;
			while ( have_posts() ) : the_post();
			$i+=2;
				add_filter( 'the_content', 'wpautop' );
				$index=$i;
				include( locate_template( 'template-parts/blog-card-item.php',
					false, false ) );
			endwhile;
		echo '</div>';

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

	do_action( 'corppix_after_page_content' );
	?>
	
	</div>
	</div>
</section>

<?php get_footer(); ?>
