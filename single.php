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
				// $block_class = 'col-md-3';
				// $categories  = get_the_category( $post_id );
				// $cats_ads    = '';

				// foreach( $categories as $cat ){
				// 	$cats_ads.= ','.$cat->cat_ID;
				// }

				// $args = array(
				// 	'numberposts' => 3,
				// 	'offset'      => 0,
				// 	'category'    => trim($cats_ads,","),
				// 	'post__not_in' => array( $post_id )
				// );
				// $recent_posts = get_posts($args);

				// if ( !empty($recent_posts) ) {
				// 	foreach ( $recent_posts as $key=>$recent_post ) {
				// 		$post_ID = $recent_post->ID;
				// 		$index = $key;
				// 		include( locate_template( 'template-parts/blog-card-item.php',
				// 			false, false ) );
				// 	}
				// }

				?>
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
<script>

// скрипт для добавления ссылок к заголовкам
window.addEventListener('DOMContentLoaded', () => {
  const blogContent = document.querySelector('.blog__content'),
    blockContent = blogContent.querySelector('.single__content'),
    titleContent = blockContent.querySelectorAll('h2, h3, h4'),
		subTitleContent = blockContent.querySelectorAll('h3'),
		subSubTitleContent = blockContent.querySelectorAll('h4'),
    blogContentRow = blogContent.querySelector('.row'),
    contentBox = blogContentRow.querySelector('.col-md-8');
  function createNavigationElement(tagName, className) {
    const element = document.createElement(tagName);
    element.classList.add(className);
    return element;
  }
  if (titleContent.length > 0) {
    const contentNav = createNavigationElement('div', 'content__navigation');
		contentNav.classList.add('custom__animate','slideIn-bottom')
    const colMd4 = createNavigationElement('div', 'col-md-4');
    blogContentRow.prepend(colMd4);
    colMd4.prepend(contentNav);
    const contentNavBtn = createNavigationElement('span', 'content__navigation-btn');
    contentNavBtn.innerText = titleContent[0].innerText;
    contentNav.prepend(contentNavBtn);
    

    // Получаем ссылку на элемент навигации
    const nav = document.querySelector('.content__navigation');
    const headerHeight = document.querySelector('.site-header');
    // Получаем позицию навигации относительно документа
    var navPosition = nav.getBoundingClientRect().top + window.pageYOffset;

    // Функция для обновления положения навигации
    function updateNavPosition() {
      // Если текущая позиция скролла больше или равна позиции навигации
      if (window.pageYOffset >= navPosition - headerHeight.offsetHeight - 87) {
        // Добавляем класс для прижатия навигации
        nav.classList.add('fixed');
				if (window.innerWidth < 992) {
					nav.style.top = `${headerHeight.offsetHeight}px`;
        	blockContent.style.marginTop = `${headerHeight.offsetHeight}px`;
				} else {
					nav.style.top = `${headerHeight.offsetHeight + 20}px`;
				}

      } else {
        // Удаляем класс для прижатия навигации
        nav.classList.remove('fixed');
        nav.style.top = 0;
        blockContent.style.marginTop = 0;

      }
    }

    // Обновляем положение навигации при загрузке страницы
    updateNavPosition();

    // Обновляем положение навигации при каждом скролле страницы
    window.addEventListener('scroll', updateNavPosition);

		// перебирает все заголовки и выполняет функцию если нажатие на новосозданную ссылку 
		titleContent.forEach((title, index) => {
      const contentNavLink = createNavigationElement('a', 'content__navigation-link');
      contentNavLink.innerText = title.innerText;
      contentNavLink.href = `#title-${index + 1}`;
      contentNav.append(contentNavLink);
      title.id = `title-${index + 1}`;
			// h3
			subTitleContent.forEach(item=>{
				if(title === item) {
					contentNavLink.classList.add('content__navigation-sublink')
				}
			})
			// h4
			subSubTitleContent.forEach(item=>{
				if(title === item) {
					contentNavLink.classList.add('content__navigation-subsublink')
				}
			})

      contentNavLink.addEventListener('click', () => {
        contentNav.classList.toggle('active');
        contentNavBtn.innerText = contentNavLink.innerText;
				if (window.innerWidth < 992) {
					setTimeout(() => {
					window.scrollBy(0, -headerHeight.offsetHeight - nav.offsetHeight - 20);
				}, 1);
				} else {
					setTimeout(() => {
					window.scrollBy(0, -headerHeight.offsetHeight);
				}, 1);
				}
      });

    })
		// нажатие на текст добавляет актив
    contentNavBtn.addEventListener('click', () => {
      contentNav.classList.toggle('active');
    })
		window.addEventListener('scroll', () => {
			if (window.innerWidth < 992 && blockContent.getBoundingClientRect().bottom < 0) {
				nav.classList.add('hidden');
			}else {
				nav.classList.remove('hidden');
			}
		});
  } else {
    contentBox.classList.add('mx-auto');
  }


});
</script>

<?php get_footer(); ?>
