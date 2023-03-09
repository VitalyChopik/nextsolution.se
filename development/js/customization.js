// import smoothscroll from 'smoothscroll-polyfill';
import Popup from './modules/popup-window.js';



import { gsap } from "gsap/dist/gsap";
import { ScrollTrigger } from "gsap/dist/ScrollTrigger";
import { ScrollToPlugin } from "gsap/dist/ScrollToPlugin";


gsap.registerPlugin(ScrollTrigger);
gsap.registerPlugin(ScrollToPlugin);
// Take some useful functions
import {
	closest_polyfill,
	debounce,        // Very useful function. Always use it for such events like:
                     // scroll, resize, keyup, keydown, keypress etc..
} from './modules/helpers.js';

// Tabs functionality (uncomment it if you need it)
import { tabsNavigation } from './modules/navi-tabs';




/**
 * All custom code is wrapped in IIFE function
 * to prevent affect our code to another parts of code
 */
;(function ( $ ) {

	

	/**
	 * PLease Collect here all variables with DOM elements
	 * Use const for all DOM elements and type it as UPPERCASE text
	 * It will help to each developer understand that it's a const not a variable
	 */

	//const EXAMPLE = document.querySelector('.js-preloader-wrapper');


	/**
	 * Occurs when all HTML has been fully loaded and passed by the parser,
	 * without waiting for the stylesheets, images and frames to finish loading
	 */
	document.addEventListener( "DOMContentLoaded", function ( event ) {
		console.log( "DOM fully loaded and parsed - READY event" );
		const TEAMET_SLIDER = document.querySelector( '.js-teams-scroll' );


		// Animate elements
		const HEAD_EL = document.querySelector( '.js-head' );
		const BOTTOM_TITLE_LOGO = document.querySelector( '.js-bottom-title-logo' );
		const TOP_TITLE_LOGO = document.querySelector( '.js-top-title-logo' );
		const BLINK_CHILD_ELEMENTs = document.querySelectorAll('.information .blink_child ');
		const BLINK_PARENT = document.querySelector('.information .blink_parent');


		const delay_head_animate = setTimeout( () => {
			(HEAD_EL) && HEAD_EL.classList.add( 'active' );
			(TOP_TITLE_LOGO) && TOP_TITLE_LOGO.classList.add( 'active' );
			(BOTTOM_TITLE_LOGO) && BOTTOM_TITLE_LOGO.classList.add( 'active' );
			clearTimeout( delay_head_animate );
		}, 2000 );

		// Start script Blink elements
		let BLINK_INFO_ELEMENTs = [];
		(BLINK_CHILD_ELEMENTs)
			&& BLINK_INFO_ELEMENTs.push([...BLINK_CHILD_ELEMENTs]);

		(BLINK_PARENT) && BLINK_INFO_ELEMENTs[0].push(BLINK_PARENT);
		const BLINK_ARR_LENGTH = BLINK_INFO_ELEMENTs[0].length;
		let blink_elem_index = 0;
		BLINK_INFO_ELEMENTs[0].sort(() => Math.random() - 0.5);

		setInterval(() => {
			let prev_blink_element = document.querySelector('.blink-element');

			if ((BLINK_ARR_LENGTH - 1) === blink_elem_index) {
				blink_elem_index = 0;
			}
			if (prev_blink_element) {
				prev_blink_element.classList.remove('custom__animate');
				prev_blink_element.classList.remove('blink-element');
			}

			if (BLINK_INFO_ELEMENTs[0][blink_elem_index]) {
				BLINK_INFO_ELEMENTs[0][blink_elem_index].classList.add('custom__animate');
				BLINK_INFO_ELEMENTs[0][blink_elem_index].classList.add('blink-element');
			}

			blink_elem_index++;
		}, 2000);

		// End script Blink elements


		// kick off the polyfill ( Don't delete it )
		// smoothscroll.polyfill();

		// Init Closest polyfill method ( Don't delete it )
		// closest_polyfill();

		// Init Popup Windows ( use it if you need Popup functionality )
		//const popup_instance = new Popup();
		//popup_instance.init();

		tabsNavigation( '.js-nav-selector', '.js-tab-selector' );

		// Slider slick initialization

		(TEAMET_SLIDER)
		&& $( TEAMET_SLIDER ).on('init', function(event, slick) {
			$('.slick-track .slick-slide').each(function() {
				console.log(this);
				const container = $('.slick-list')[0].getBoundingClientRect();
				const element = this.getBoundingClientRect();

				console.log(container);
				console.log(element);

				if(element.x < container.x) {
					$(this).addClass('hide-slide')
				} 
				// console.log(this.getBoundingClientRect());
			});
		});

		(TEAMET_SLIDER)
		&& $( TEAMET_SLIDER ).slick( {
			// slidesToShow: 1,
			infinite: true,
			dots: false,
			arrows: false,
			variableWidth: true,
			swipe: false,
			// nextArrow: '<div class="btn-scroll">' +
			// 	'Scroll' +
			// 	'<div class="btn-arrows"></div>' +
			// 	'</div>',
			// prevArrow: '<button class="slick-prev-btn"></button>',
			// responsive: [
			// 	{
			// 		breakpoint: 480,
			// 		settings: {
			// 			slidesToShow: 1,
			// 			slidesToScroll: 1,
			// 			variableWidth: true
			// 		}
			// 	}
			// ],
			
		} );

		

		(TEAMET_SLIDER)
		&& $( TEAMET_SLIDER ).on('beforeChange', function(event, slick, currentSlide, nextSlide){
			$('.slick-track .slick-slide.slick-active').addClass('hide-slide');
			
			// console.log(nextSlide);
			
			// 	$('.slick-track .slick-slide').each(function() {
			// 		// console.log(this);
			// 		const container = $('.slick-list')[0].getBoundingClientRect();
			// 		const element = this.getBoundingClientRect();

			// 		if(element.x <= container.x) {
			// 			$(this).addClass('hide-slide')
			// 		} 
			// 		// console.log(this.getBoundingClientRect());
			// 	});

			// if(nextSlide == 0) {
			// 	$('.slick-track .slick-slide').each(function(index) {
						
			// 		if(index != 0) {
			// 			$(this).removeClass('hide-slide');
			// 		}
			// 	});
			// }
			// console.log($(slick.$slides[currentSlide]).addClass('hide-slide'));
			// if(nextSlide == 0) {
			// 	slick.$slides.each(function() {
			// 		$(this).removeClass('hide-slide')
			// 	});
			// }
			// console.log(currentSlide);
			// console.log(nextSlide);
		  });


		  (TEAMET_SLIDER)
		&& $( TEAMET_SLIDER ).on('afterChange', function(event, slick, currentSlide){
			console.log(currentSlide);
				if(currentSlide == 0) {
					setTimeout(() => {
						$('.slick-track .slick-slide').each(function() {
							console.log(this);
							const container = $('.slick-list')[0].getBoundingClientRect();
							const element = this.getBoundingClientRect();
			
							console.log(container);
							console.log(element);
			
							if(element.x >= container.x) {
								$(this).removeClass('hide-slide')
							} 
							// console.log(this.getBoundingClientRect());
						});
					}, 0);
					

					
				}
				// $('.slick-track .slick-slide').each(function() {
				// 	// console.log(this);
				// 	const container = $('.slick-list')[0].getBoundingClientRect();
				// 	const element = this.getBoundingClientRect();

				// 	if(element.x <= container.x) {
				// 		$(this).addClass('hide-slide')
				// 	} 
				// 	// console.log(this.getBoundingClientRect());
				// });
		  });



		
		if(document.querySelector('.teamet .btn-scroll')) {
			document.querySelector('.teamet .btn-scroll').addEventListener('click', () => {
				$( TEAMET_SLIDER ).slick('slickNext');
			});
		}


		/**
		 * Add global handler for click event
		 * The main idea - to improve site performance
		 * We added only 1 event handler to "click" event
		 * and then use date-role attribute on each( needed ) elements
		 * to define on which element event was executed..
		 */
		document.body.addEventListener( 'click', event => {
			const ROLE = event.target.dataset.role;

			if ( !ROLE ) return;

			switch ( ROLE ) {

				case 'filter': {
					event.preventDefault();

					(async () => {

						let el = event.target;
						let ul = el.closest( 'ul' );
						let active = ul.querySelector( '.current-menu-item' );
						console.log( active );
						active.classList.remove( 'current-menu-item' );
						el.closest( 'li' ).classList.add( 'current-menu-item' );

						let container = document.querySelector( '.js-container-card' );
						let slug = el.dataset.value;
						const formData = new FormData();
						let action_url = 'filter_data';

						formData.append( 'action', action_url );
						formData.append( 'product_slug', slug );

						const option = {
							method: 'POST',
							body: formData,
						};

						let result = await fetch( var_from_php.ajax_url, option );
						let result_data = await result.json();
						if ( result_data.success ) {
							container.innerHTML = result_data.data;
						}
					})();

				}
				// Scroll page to top
				case 'element1': {
					// some required action
				}
					break;


				case 'element2': {
					// some required action
				}
					break;
			}
		} );

	} );


	// Use it when you need to know that everything is loaded (html, styles, images)
	window.addEventListener( 'load', ( event ) => {
		console.log( 'page is fully loaded' );


		/**
		 * Simple hack for some cases
		 */
		setTimeout( () => {
			document.querySelector('html').classList.remove( 'lock' );
			document.body.classList.remove( 'lock' );
			document.body.classList.add( 'loaded' );
		}, 500 );


	} );

	

})( jQuery );


jQuery(document).ready(function($){
	// Animate

	

	$.fn.isInViewport = function() {
		var elementTop = $(this).offset().top;
		var elementBottom = elementTop + $(this).outerHeight();

		var viewportTop = $(window).scrollTop();
		var viewportBottom = viewportTop + $(window).height();

		return elementBottom > viewportTop && elementTop < viewportBottom;
	};
	$('.animate-brands-left').each(function () {
		$(this).attr('id', '');
	 });
	// console.log('work');
	$(window).on('resize scroll', function() {

		$('.animate-brands-left').each(function () {
			if ($(this).isInViewport()) {
				$(this).removeClass('animate-brands-left');
				$(this).addClass('list-icon-left-marquee');
				$('.list-icon-left-marquee').marquee({
					direction:'left',
					duplicated: true,
					gap: 0,
					duration: 10000,
				});
			}
		});
					// var i = 0;
		// $('.animate-brands-left').each(function () {
			
		// 	if ($(this).isInViewport()) {

		// 		$(this).removeClass('animate-brands-left');
		// 		$(this).addClass('list-icon-left');
				
		// 		$('.list-item').each(function()
		// 		    { 
						
		// 		        $(this).css('animation-delay', i + 's');
		// 				i = i+2;
		// 		    });

		// 	}

		// });
		$('.animate-brands-right').each(function () {
			if ($(this).isInViewport()) {
				$(this).removeClass('animate-brands-right');
				$(this).addClass('list-icon-right-marquee');
				$('.list-icon-right-marquee').marquee({
					direction:'right',
					duplicated: true,
					gap: 0,
					duration: 10000,
				});
			}
		});
		$('.animate-card').each(function () {
			if ($(this).isInViewport()) {
				$(this).removeClass('animate-card');
			}
		});



		
		// console.log('in view');
		// if ($('.animate-brands-left').isInViewport()) {
		// 	// console.log('in view');
		// 	$(this).removeClass('animate-brands-left'); 	
		// }
	});
	if($('.running-string')){
		$('.running-string').marquee({
			direction:'left',
			duplicated: true,
			gap: 0,
			duration: 7500,
		});
	}



	if($('.information__content .col-md-4 .information__content-text')) {
		$('.information__content .col-md-4 .information__content-text').height($('.information__content .col-md-4 .information__content-text').height() + 15);
	}

	if($('.kundcase')) {


		$( document ).mousemove(function( event ) {
			// console.log(event);
			const clientY = event.clientY;
			const clientX = event.clientX;
			$('.kundcase .card').each(function() {
				const coordinates = this.getBoundingClientRect();
				// const offset = $(this).offset();
				// if(coordinates.height > 0) {
				// 	console.log(this);
				// console.log(coordinates);
				// }
				// console.log(offset);
				if(coordinates.height > 0 && clientX > coordinates.x && clientX < (coordinates.x + coordinates.width) && clientY > coordinates.y && clientY < (coordinates.y + coordinates.height)) {
					const cardImg = $(this).find('.card-img');
					cardImg.css('display', 'block');
					cardImg.css('top',  clientY);
					cardImg.css('left',  clientX);
				} else {
					const cardImg = $(this).find('.card-img');
					cardImg.css('display', 'none');
				}
			});
		  });
	}

	$( '.btn' ).hover(
		function() {
			
			$( this ).addClass('btn-in');
		  
		}, function() {
			const $this = $( this );
			$this.addClass('btn-out');
			setTimeout(function() {
				$this.removeClass('btn-in');
				$this.removeClass('btn-out');
			}, 300);
		}
	);
	


	
	

	if($('.section-wrapper')){

		

		// $.smartscroll({
		// 	mode:"set",
		// 	sectionWrapperSelector:"#primary-wrapper",
		// 	sectionClass:"section-wrapper",
		// 	autoHash: true,
		// });


		

		const sections = document.querySelectorAll(".section-wrapper");

		const scrolling = {
			enabled: true,
			events: "scroll,wheel,touchmove,pointermove".split(","),
			prevent: e => e.preventDefault(),
			disable() {
			if (scrolling.enabled) {
				scrolling.enabled = false;
				window.addEventListener("scroll", gsap.ticker.tick, {passive: true});
				scrolling.events.forEach((e, i) => (i ? document : window).addEventListener(e, scrolling.prevent, {passive: false}));
			}
			},
			enable() {
			if (!scrolling.enabled) {
				scrolling.enabled = true;
				window.removeEventListener("scroll", gsap.ticker.tick);
				scrolling.events.forEach((e, i) => (i ? document : window).removeEventListener(e, scrolling.prevent));
			}
			}
		};


		function goToSection(section, anim, i) {
		if (scrolling.enabled) { // skip if a scroll tween is in progress
			scrolling.disable();
			gsap.to(window, {
			scrollTo: {y: section, autoKill: false},
			onComplete: scrolling.enable,
			duration: 1
			});

			anim && anim.restart();
		}
		}

		sections.forEach((section, i) => {
		// const intoAnim = gsap.from(section.querySelector(".right-col"), {yPercent: 50, duration: 1, paused: true});
		
		ScrollTrigger.create({
			trigger: section,
			start: "top bottom-=1",
			end: "bottom top+=1",
			// onEnter: () => goToSection(section, intoAnim),
			onEnter: () => goToSection(section),
			onEnterBack: () => goToSection(section)
		});
		
		});
		
	}

	

	// Onboarding menu show
	$('.js-onboarding-btn').on('click', function(){
		$('.js-onboarding-content').toggleClass('active');
		$('body').toggleClass('lock');
	});

	$('.js-cross-onboarding').on('click', function(){
		$('.js-onboarding-content').toggleClass('active');
		$('body').toggleClass('lock');
	});


});
