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
		Kunskapsbank<span></span>Kunskapsbank<span></span>Kunskapsbank<span></span>
		Kunskapsbank<span></span>Kunskapsbank<span></span>Kunskapsbank<span></span>
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
					$i=1;
					echo '<li class="'.$blog_class.' tab-category all">
							<a href="'.get_permalink($page_for_posts_id).'">All</a>
						  </li>';
					$i++;
					foreach($categories as $category) {
						$cat_id  = $category->term_id;

						$add_class = ( $queried_id === $cat_id ) ? 'current-menu-item' : '';
						
						echo '<li class="'.$add_class.' tab-category ">
								<a href="' . get_category_link($category->term_id) . '" id="'.$category->slug.'">'
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
<script>
(function() {
	const categoryLinks = document.querySelectorAll('.tab-category');
	const categoryLinkAll = document.querySelectorAll('.tab-category.all');
	const pagination = document.querySelector('.navigation.pagination');
	if(categoryLinks) {
		categoryLinks.forEach(item => {
			categoryLink = item.querySelector('a');
			categoryLink.addEventListener('click', function(event) {
				event.preventDefault();
				categoryLinks.forEach(activeClass =>{
					activeClass.classList.remove('current-menu-item');
				})
				item.classList.add('current-menu-item');
				var catID = this.getAttribute('id');
				var xhr = new XMLHttpRequest();
				xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>');
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				xhr.onreadystatechange = function() {
					if (xhr.readyState === 4 && xhr.status === 200) {
						document.querySelector('.row.list-card').innerHTML = xhr.responseText;
					}
				};
				if(catID !== null){
					xhr.send('action=load_posts_by_category&category_slug=' + catID);
					pagination.classList.add('d-none');
				} else {
					xhr.send('action=load_posts_by_category');
					pagination.classList.remove('d-none');
				}

			});
		})
	}

	
  
})();
</script>

<?php get_footer(); ?>
