// import $ from "jquery";
//
// import '../scss/main.scss'

/**
 * All custom code is wrapped in IIFE function
 * to prevent affect our code to another parts of code
 */
(function ($) {
    $(document).ready(function () {
        // trigger animation
        $("section").each(function () {
            var sectionElement = $(this);
            var inview = new Waypoint({
                element: sectionElement[0],
                handler: function (direction) {
                    if (direction === "down") {
                        sectionElement.addClass("animate__now");
                    }
                },
                offset: "60%",
            });
        });
        $(".services__content .card").each(function () {
            var sectionElement = $(this);
            var inview = new Waypoint({
                element: sectionElement[0],
                handler: function (direction) {
                    if (direction === "down") {
                        sectionElement.addClass("animate__now");
                    }
                },
                offset: "70%",
            });
        });
        // Menu show
        $(".btn-menu").on("click", function () {
            $(".burger-content").toggleClass("active");
            $("body").toggleClass("lock");
        });
        $(".btn-menu-cross").on("click", function () {
            $(".burger-content").toggleClass("active");
            $("body").toggleClass("lock");
        });

        // Onboarding menu show
        $(".js-onboarding-btn").on("click", function () {
            $(".js-onboarding-content").toggleClass("active");
            $("body").toggleClass("lock");
        });

        $(".js-cross-onboarding").on("click", function () {
            $(".js-onboarding-content").toggleClass("active");
            $("body").toggleClass("lock");
        });

        // Footer mobile
        moveOnMobile();
        $(window).resize(function (e) {
            moveOnMobile();
        });
        function moveOnMobile() {
            if (window.innerWidth <= 1024) {
                console.log(window.innerWidth);
                $("footer .title").prependTo(".top-title");
                $("footer .social").prependTo(".bottom-social");
            } else {
                console.log(window.innerWidth);
                $("footer .title").prependTo("footer .image-block");
                $("footer .social").prependTo("footer .social-block");
            }
        }
        $(window).scroll(function () {
            var sticky = $(".site-header"),
                scroll = $(window).scrollTop();

            if (scroll >= 1) sticky.addClass("sticky");
            else sticky.removeClass("sticky");
        });
    });
})(jQuery);
