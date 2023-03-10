</div><!-- end of <div id="primary-wrapper"> -->
</main><!-- end of <main> -->

<?php do_action( 'corppix_before_site_footer' ); ?>

<?php
global $global_options;

$footer_image_url = getFieldValue( $global_options, 'footer_image' );
$copyright_text   = getFieldValue( $global_options, 'copyright_text' );
$footer_title     = getFieldValue( $global_options, 'footer_title' );
$email            = getFieldValue( $global_options, 'email' );
$phone            = getFieldValue( $global_options, 'phone' );
$address          = getFieldValue( $global_options, 'address' );
$repeater_social  = getFieldValue( $global_options, 'repeater_social' );

?>

<?php include( locate_template( 'template-parts/custom-footer.php', false, false ) ); ?>

<?php do_action( 'corppix_after_site_footer' ); ?>

</div><!-- .wrapper -->
<?php
do_action( 'corppix_after_site_page_tag' );
wp_footer();
do_action( 'corppix_before_body_closing_tag' );
?>

<div class="scroll-to-top js-scroll-to-top" data-role="scroll-page-to-top"></div>

<svg class="list-clip-path" xmlns="http://www.w3.org/2000/svg" height="0" width="0" height="0" viewBox="0 0 236.08308 221.33841">
	<clipPath id="information" transform="translate(7.1777929,-29.789422)">
		<path d="M 80.843086,250.90932 C 57.332746,248.64096 36.926946,238.32967 20.964696,220.6521 5.6366862,203.67691 -3.7832238,182.6516 -6.7250738,158.84829 c -0.59986,-4.85362 -0.60469,-19.21496 -0.008,-23.98888 2.2136,-17.71224 8.00096,-32.52272 17.9634098,-45.970265 3.22577,-4.35417 11.73607,-12.93771 16.29345,-16.43364 33.5319,-25.72206 87.094424,-43.961312 125.084334,-42.594051 13.49309,0.485618 23.38407,2.727203 32.27916,7.315406 9.03613,4.660953 13.33982,9.022606 21.056,21.339615 3.19422,5.0988 8.64538,15.41406 10.88833,20.60404 16.05219,37.143325 16.10074,76.498515 0.1299,105.309825 -9.05514,16.33542 -18.48132,25.14024 -41.61119,38.86828 -26.37388,15.65342 -48.6991,24.08674 -71.77831,27.11416 -5.049404,0.66236 -18.063544,0.94667 -22.728824,0.49654 z"   />
	</clipPath>
	<clipPath id="information-mobile" transform="translate(-14.132723,-23.635765)">
		<path d="m 86.309525,237.85522 c -17.84269,-1.86509 -33.69633,-10.88516 -47.03444,-26.76065 -12.85438,-15.29972 -21.49285,-36.38914 -24.49308,-59.79583 -0.86476,-6.74657 -0.86599,-22.01385 -0.002,-28.575 2.66957,-20.27971 9.56681,-37.103553 20.61409,-50.282149 15.46626,-18.450113 48.22569,-37.317859 78.041825,-44.948075 11.57244,-2.96149 18.18578,-3.848818 28.75139,-3.857649 8.74158,-0.0073 12.07375,0.372891 18.48683,2.109327 9.42871,2.55296 18.12121,8.450754 22.88496,15.527278 2.17454,3.230281 6.27342,10.66242 8.73289,15.834604 20.78596,43.712194 21.3745,92.152374 1.51945,125.060274 -7.06041,11.70198 -15.4076,19.51121 -34.51441,32.29002 -8.04663,5.38166 -13.33061,8.46618 -20.6375,12.04713 -18.77782,9.2026 -36.38259,13.01975 -52.349705,11.35072 z"/>
	</clipPath>
	<clipPath id="kundcase" transform="translate(7.1777929,-29.789422)">
		<path d="M 80.843086,250.90932 C 57.332746,248.64096 36.926946,238.32967 20.964696,220.6521 5.6366862,203.67691 -3.7832238,182.6516 -6.7250738,158.84829 c -0.59986,-4.85362 -0.60469,-19.21496 -0.008,-23.98888 2.2136,-17.71224 8.00096,-32.52272 17.9634098,-45.970265 3.22577,-4.35417 11.73607,-12.93771 16.29345,-16.43364 33.5319,-25.72206 87.094424,-43.961312 125.084334,-42.594051 13.49309,0.485618 23.38407,2.727203 32.27916,7.315406 9.03613,4.660953 13.33982,9.022606 21.056,21.339615 3.19422,5.0988 8.64538,15.41406 10.88833,20.60404 16.05219,37.143325 16.10074,76.498515 0.1299,105.309825 -9.05514,16.33542 -18.48132,25.14024 -41.61119,38.86828 -26.37388,15.65342 -48.6991,24.08674 -71.77831,27.11416 -5.049404,0.66236 -18.063544,0.94667 -22.728824,0.49654 z"   />
	</clipPath>
	<clipPath id="omoss" transform="translate(-14.132723,-23.635765)">
		<path d="m 86.309525,237.85522 c -17.84269,-1.86509 -33.69633,-10.88516 -47.03444,-26.76065 -12.85438,-15.29972 -21.49285,-36.38914 -24.49308,-59.79583 -0.86476,-6.74657 -0.86599,-22.01385 -0.002,-28.575 2.66957,-20.27971 9.56681,-37.103553 20.61409,-50.282149 15.46626,-18.450113 48.22569,-37.317859 78.041825,-44.948075 11.57244,-2.96149 18.18578,-3.848818 28.75139,-3.857649 8.74158,-0.0073 12.07375,0.372891 18.48683,2.109327 9.42871,2.55296 18.12121,8.450754 22.88496,15.527278 2.17454,3.230281 6.27342,10.66242 8.73289,15.834604 20.78596,43.712194 21.3745,92.152374 1.51945,125.060274 -7.06041,11.70198 -15.4076,19.51121 -34.51441,32.29002 -8.04663,5.38166 -13.33061,8.46618 -20.6375,12.04713 -18.77782,9.2026 -36.38259,13.01975 -52.349705,11.35072 z"/>
	</clipPath>
	<clipPath id="comment-img-small" transform="translate(7.1777929,-29.789422)">
		<path d="M 80.843086,250.90932 C 57.332746,248.64096 36.926946,238.32967 20.964696,220.6521 5.6366862,203.67691 -3.7832238,182.6516 -6.7250738,158.84829 c -0.59986,-4.85362 -0.60469,-19.21496 -0.008,-23.98888 2.2136,-17.71224 8.00096,-32.52272 17.9634098,-45.970265 3.22577,-4.35417 11.73607,-12.93771 16.29345,-16.43364 33.5319,-25.72206 87.094424,-43.961312 125.084334,-42.594051 13.49309,0.485618 23.38407,2.727203 32.27916,7.315406 9.03613,4.660953 13.33982,9.022606 21.056,21.339615 3.19422,5.0988 8.64538,15.41406 10.88833,20.60404 16.05219,37.143325 16.10074,76.498515 0.1299,105.309825 -9.05514,16.33542 -18.48132,25.14024 -41.61119,38.86828 -26.37388,15.65342 -48.6991,24.08674 -71.77831,27.11416 -5.049404,0.66236 -18.063544,0.94667 -22.728824,0.49654 z"   />
	</clipPath>
	<clipPath id="comment-img-big" transform="translate(7.1777929,-29.789422)">
		<path d="M 80.843086,250.90932 C 57.332746,248.64096 36.926946,238.32967 20.964696,220.6521 5.6366862,203.67691 -3.7832238,182.6516 -6.7250738,158.84829 c -0.59986,-4.85362 -0.60469,-19.21496 -0.008,-23.98888 2.2136,-17.71224 8.00096,-32.52272 17.9634098,-45.970265 3.22577,-4.35417 11.73607,-12.93771 16.29345,-16.43364 33.5319,-25.72206 87.094424,-43.961312 125.084334,-42.594051 13.49309,0.485618 23.38407,2.727203 32.27916,7.315406 9.03613,4.660953 13.33982,9.022606 21.056,21.339615 3.19422,5.0988 8.64538,15.41406 10.88833,20.60404 16.05219,37.143325 16.10074,76.498515 0.1299,105.309825 -9.05514,16.33542 -18.48132,25.14024 -41.61119,38.86828 -26.37388,15.65342 -48.6991,24.08674 -71.77831,27.11416 -5.049404,0.66236 -18.063544,0.94667 -22.728824,0.49654 z"   />
	</clipPath>
	<clipPath id="konstlagret" transform="translate(7.1777929,-29.789422)">
		<path d="M 80.843086,250.90932 C 57.332746,248.64096 36.926946,238.32967 20.964696,220.6521 5.6366862,203.67691 -3.7832238,182.6516 -6.7250738,158.84829 c -0.59986,-4.85362 -0.60469,-19.21496 -0.008,-23.98888 2.2136,-17.71224 8.00096,-32.52272 17.9634098,-45.970265 3.22577,-4.35417 11.73607,-12.93771 16.29345,-16.43364 33.5319,-25.72206 87.094424,-43.961312 125.084334,-42.594051 13.49309,0.485618 23.38407,2.727203 32.27916,7.315406 9.03613,4.660953 13.33982,9.022606 21.056,21.339615 3.19422,5.0988 8.64538,15.41406 10.88833,20.60404 16.05219,37.143325 16.10074,76.498515 0.1299,105.309825 -9.05514,16.33542 -18.48132,25.14024 -41.61119,38.86828 -26.37388,15.65342 -48.6991,24.08674 -71.77831,27.11416 -5.049404,0.66236 -18.063544,0.94667 -22.728824,0.49654 z"   />
	</clipPath>
	<clipPath id="nyheter" transform="translate(7.1777929,-29.789422)">
		<path d="M 80.843086,250.90932 C 57.332746,248.64096 36.926946,238.32967 20.964696,220.6521 5.6366862,203.67691 -3.7832238,182.6516 -6.7250738,158.84829 c -0.59986,-4.85362 -0.60469,-19.21496 -0.008,-23.98888 2.2136,-17.71224 8.00096,-32.52272 17.9634098,-45.970265 3.22577,-4.35417 11.73607,-12.93771 16.29345,-16.43364 33.5319,-25.72206 87.094424,-43.961312 125.084334,-42.594051 13.49309,0.485618 23.38407,2.727203 32.27916,7.315406 9.03613,4.660953 13.33982,9.022606 21.056,21.339615 3.19422,5.0988 8.64538,15.41406 10.88833,20.60404 16.05219,37.143325 16.10074,76.498515 0.1299,105.309825 -9.05514,16.33542 -18.48132,25.14024 -41.61119,38.86828 -26.37388,15.65342 -48.6991,24.08674 -71.77831,27.11416 -5.049404,0.66236 -18.063544,0.94667 -22.728824,0.49654 z"   />
	</clipPath>
	<clipPath id="nyheter-welcom" transform="translate(7.1777929,-29.789422)">
		<path d="M 80.843086,250.90932 C 57.332746,248.64096 36.926946,238.32967 20.964696,220.6521 5.6366862,203.67691 -3.7832238,182.6516 -6.7250738,158.84829 c -0.59986,-4.85362 -0.60469,-19.21496 -0.008,-23.98888 2.2136,-17.71224 8.00096,-32.52272 17.9634098,-45.970265 3.22577,-4.35417 11.73607,-12.93771 16.29345,-16.43364 33.5319,-25.72206 87.094424,-43.961312 125.084334,-42.594051 13.49309,0.485618 23.38407,2.727203 32.27916,7.315406 9.03613,4.660953 13.33982,9.022606 21.056,21.339615 3.19422,5.0988 8.64538,15.41406 10.88833,20.60404 16.05219,37.143325 16.10074,76.498515 0.1299,105.309825 -9.05514,16.33542 -18.48132,25.14024 -41.61119,38.86828 -26.37388,15.65342 -48.6991,24.08674 -71.77831,27.11416 -5.049404,0.66236 -18.063544,0.94667 -22.728824,0.49654 z"   />
	</clipPath>
	<clipPath id="nyheter-four" transform="translate(7.1777929,-29.789422)">
		<path d="M 80.843086,250.90932 C 57.332746,248.64096 36.926946,238.32967 20.964696,220.6521 5.6366862,203.67691 -3.7832238,182.6516 -6.7250738,158.84829 c -0.59986,-4.85362 -0.60469,-19.21496 -0.008,-23.98888 2.2136,-17.71224 8.00096,-32.52272 17.9634098,-45.970265 3.22577,-4.35417 11.73607,-12.93771 16.29345,-16.43364 33.5319,-25.72206 87.094424,-43.961312 125.084334,-42.594051 13.49309,0.485618 23.38407,2.727203 32.27916,7.315406 9.03613,4.660953 13.33982,9.022606 21.056,21.339615 3.19422,5.0988 8.64538,15.41406 10.88833,20.60404 16.05219,37.143325 16.10074,76.498515 0.1299,105.309825 -9.05514,16.33542 -18.48132,25.14024 -41.61119,38.86828 -26.37388,15.65342 -48.6991,24.08674 -71.77831,27.11416 -5.049404,0.66236 -18.063544,0.94667 -22.728824,0.49654 z"   />
	</clipPath>
	<clipPath id="kontact">
		<path d="M349.757 0.565421C447.689 -4.15009 547.354 20.2818 619.145 86.9372C693.293 155.78 738.784 254.958 732.406 355.838C726.333 451.914 661.836 531.893 587.166 592.818C520.338 647.347 436.02 665.086 349.757 668.057C259.37 671.17 162.788 669.943 95.3805 609.755C25.2238 547.113 -1.75684 449.779 0.0880968 355.838C1.89615 263.776 40.5136 177.37 105.162 111.686C170.425 45.3775 256.742 5.04415 349.757 0.565421Z"   />
	</clipPath>
</svg>

<script>
	const sliderSwipper = document.querySelector('.reviews__slider');
	const swiper = new Swiper(sliderSwipper, {
	slidesPerView: 1,
	spaceBetween: 20,
  loop: true,
	direction: 'horizontal',
	autoplay: {
   delay: 5000,
 },
 effect: 'fade',
  fadeEffect: {
    crossFade: true
  },

});
</script>
<script>

// скрипт для добавления ссылок к заголовкам


window.addEventListener('DOMContentLoaded', () => {
  const blogContent = document.querySelector('.blog__content'),
    blockContent = blogContent.querySelector('.single__content'),
    titleContent = blockContent.querySelectorAll('h2'),
    blogContentRow = blogContent.querySelector('.row'),
    contentBox = blogContentRow.querySelector('.col-md-8');
  function createNavigationElement(tagName, className) {
    const element = document.createElement(tagName);
    element.classList.add(className);
    return element;
  }
  if (titleContent.length) {
		const colMd4 = createNavigationElement('div', 'col-md-4');
    const contentNav = createNavigationElement('div', 'content__navigation');
		contentNav.classList.add('custom__animate','slideIn-bottom')
    colMd4.append(contentNav);
		blogContentRow.prepend(colMd4);
    const contentNavBtn = createNavigationElement('span', 'content__navigation-btn');
    contentNavBtn.innerText = titleContent[0].innerText;
    contentNav.prepend(contentNavBtn);

    // Получаем ссылку на элемент навигации
    const headerHeight = document.querySelector('.site-header');
    // Получаем позицию навигации относительно документа
    var navPosition = contentNav.getBoundingClientRect().top + window.pageYOffset;

    // Функция для обновления положения навигации
    function updateNavPosition() {
      // Если текущая позиция скролла больше или равна позиции навигации
      if (window.pageYOffset >= navPosition - headerHeight.offsetHeight - 87) {
        // Добавляем класс для прижатия навигации
        contentNav.classList.add('fixed');
				if (window.innerWidth < 992) {
					contentNav.style.top = `${headerHeight.offsetHeight}px`;
        	blockContent.style.marginTop = `${headerHeight.offsetHeight}px`;
				} else {
					contentNav.style.top = `${headerHeight.offsetHeight + 20}px`;
				}

      } else {
        // Удаляем класс для прижатия навигации
        contentNav.classList.remove('fixed');
        contentNav.style.top = 0;
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
      contentNavLink.addEventListener('click', () => {
        contentNav.classList.toggle('active');
        contentNavBtn.innerText = contentNavLink.innerText;
				if (window.innerWidth < 992) {
					setTimeout(() => {
					window.scrollBy(0, -headerHeight.offsetHeight - contentNav.offsetHeight - 20);
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
				contentNav.classList.add('hidden');
			}else {
				contentNav.classList.remove('hidden');
			}
		});
		let contentNavTop = contentNav.offsetTop;
		let contentNavFixedTop = contentNavTop;
		const blogContentHeight = blogContent.offsetHeight - window.innerHeight;

		window.addEventListener('scroll', () => {
			const scrollTop = Math.min(window.scrollY - blogContent.offsetTop, blogContentHeight);

			if (scrollTop < 0) {
				contentNav.style.position = '';
				contentNav.style.top = '';
			} else if (scrollTop < contentNavFixedTop) {
				contentNav.style.position = 'fixed';
				contentNav.style.top = `${scrollTop}px`;
			} else {
				contentNav.style.position = 'absolute';
				contentNav.style.top = `${contentNavFixedTop}px`;
			}
		});



  } else {
    contentBox.classList.add('mx-auto');
  }
});
</script>
</body>
</html>