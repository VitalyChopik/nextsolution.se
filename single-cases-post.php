<?php get_header(); 

do_action( 'corppix_before_page_content' );

if ( have_posts() ) :
	// Start the loop.
	while ( have_posts() ) : the_post();
		add_filter( 'the_content', 'wpautop' );
		the_content();
	endwhile;
endif;

do_action( 'corppix_after_page_content' );
?>
<script>
  // получаем все якорные ссылки на странице
  var links = document.querySelectorAll('a[href^="#"]');
	const headerHeightItem = document.querySelector('.site-header');
  // обходим каждую ссылку
  for (var i = 0; i < links.length; i++) {
    // добавляем обработчик событий на клик по ссылке
    links[i].addEventListener('click', function(e) {
      // отменяем стандартное поведение браузера при клике на ссылку
      e.preventDefault();

      // получаем элемент на странице, на который ссылается якорь
      var target = document.querySelector(this.getAttribute('href'));

      // если такой элемент существует
      if (target) {
        // вычисляем его координаты на странице
        var targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeightItem.offsetHeight;

        // перемещаем окно просмотра страницы на вычисленную позицию
        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth'
        });
      }
    });
  }
</script>

<?php
get_footer(); ?>