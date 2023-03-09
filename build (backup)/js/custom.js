
(function ($) {

	// console.log('work');

	$(document).ready(function(){
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

		

		if($('.section-wrapper')){

			$.smartscroll({
				mode:"set",
				sectionWrapperSelector:"#primary-wrapper",
				sectionClass:"section-wrapper",

			});
			var i = 0;
			$('.section-wrapper').each(function () {
				var height = $(this).height()
				i = i+1;
				$(this).attr('data-hash', 'section-'+i) ;
				//console.log($(this).height());
				
				
			});
			
		}
		


	});
})(jQuery);