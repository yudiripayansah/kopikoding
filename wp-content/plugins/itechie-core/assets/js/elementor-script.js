(function ($) {
    "use strict";

    /* -----------------------------------------------------
          Variables
      ----------------------------------------------------- */
    var leftArrow = '<i class="fas fa-arrow-left"></i>';
    var rightArrow = '<i class="fas fa-arrow-right"></i>';

    var BannerSlider = function () {

        /*--------------------------------------------------
          project-slider
      ---------------------------------------------------*/
        $('.banner-slider').owlCarousel({
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            smartSpeed: 450,
            loop: true,
            autoplay: true,
            autoplayTimeout: 10000,
            nav: true,
            dots: false,
            items: 1,
            smartSpeed: 1800,
            navText: [leftArrow, rightArrow],
        });
    }


    var TestimonialSlider = function () {
        /*--------------------------------------------------
                testimonial-slider
            ---------------------------------------------------*/
        $('.testimonial-thumb').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            autoplay: true,
            fade: true,
            autoplaySpeed: 1500,
            speed: 1500,
            asNavFor: '.testimonial-nav-slider'
        });

        $('.testimonial-nav-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.testimonial-thumb',
            dots: false,
            autoplay: true,
            autoplaySpeed: 1500,
            centerMode: false,
            focusOnSelect: true,
            arrows: false,
        });

        /*--------------------------------------------------
            testimonial-slider
        ---------------------------------------------------*/
        $('.testimonial-slider-2').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            smartSpeed: 1500,
            center: true,
            navText: [leftArrow, rightArrow],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
            }
        });

        $('.testimonial-slider-3').owlCarousel({
            loop: true,
            thumbs: true,
            items: 1,
            responsiveClass: true, autoplayHoverPause: true,
            autoplay: true,
            slideSpeed: 1000,
            paginationSpeed: 900,
            thumbsPrerendered: true,
            autoplayTimeout: 3000,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                },
                360: {
                    items: 1,
                    nav: false
                },
                768: {
                    items: 1,
                    nav: false,
                },
                1000: {
                    items: 1,
                    nav: false,
                    loop: true
                }
            }
        });

    }


    var ProjectSlider = function ($scope) {


        /* -------------------------------------------------------------
          All-item isotope
       ------------------------------------------------------------- */


        if ($scope.find(".project-isotope").length) {
            var $galleryFilterArea = $('.project-isotope'),
                $galleryFilterMenu = $('.project-isotope-btn');


            /*Filter*/
            $galleryFilterMenu.on('click', 'button, a', function () {
                var $this = $(this),
                    $filterValue = $this.attr('data-filter');
                $galleryFilterMenu.find('button, a').removeClass('active');
                $this.addClass('active');
                $galleryFilterArea.isotope({ filter: $filterValue });
            });
            /*Grid*/
            $galleryFilterArea.each(function () {
                var $this = $(this),
                    $galleryFilterItem = '.all-isotope-item';
                $this.imagesLoaded(function () {
                    $this.isotope({
                        itemSelector: $galleryFilterItem,
                        percentPosition: true,
                        masonry: {
                            columnWidth: '.item-sizer',
                        }
                    });
                });
            });

        }


        /*--------------------------------------------------
           project-slider
       ---------------------------------------------------*/
        $('.project-slider').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: false,
            smartSpeed: 1500,
            navText: [leftArrow, rightArrow],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
            }
        });

        /*--------------------------------------------------
          project-slider
      ---------------------------------------------------*/
        $('.project-slider-2').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: false,
            smartSpeed: 1500,
            navText: [leftArrow, rightArrow],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 3
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                },
                1600: {
                    items: 5
                },
            }
        });


    }


    var SponsorsSlider = function ($scope, $) {

        $('.client-slider').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: false,
            smartSpeed: 1500,
            navText: [leftArrow, rightArrow],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 4
                },
            }
        });
    }

    var WidgetDefault = function ($scope, $) {

        $('.blog-thumb-slider').owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            smartSpeed: 1500,
            navText: [leftArrow, rightArrow],
            items: 1,
        });

        /**banner-move**/
        if ($('.banner-bg-img').length) {
            function touches(e) {
                var x = e.touches ? e.touches[0].clientX : e.clientX,
                    y = e.touches ? e.touches[0].clientY : e.clientY;
                var w = window.innerWidth / 2;
                var h = window.innerHeight / 2;
                var l = -(x - w) / (w / 1) - 1;
                var t = -(y - h) / (h / 1) - 1;
                TweenMax.to($('.banner-bg-img'), 1, {
                    top: t + "%",
                    left: l + "%"
                });
            }
            window.addEventListener("mousemove", touches);
            window.addEventListener("touchstart", touches);
            window.addEventListener("touchmove", touches);
        }


        /*------------------------------------------------
            Magnific JS
        ------------------------------------------------*/
        $('.video-play-btn').magnificPopup({
            type: 'iframe',
            removalDelay: 260,
            mainClass: 'mfp-zoom-in',
        });
        $.extend(true, $.magnificPopup.defaults, {
            iframe: {
                patterns: {
                    youtube: {
                        index: 'youtube.com/',
                        id: 'v=',
                        src: 'https://www.youtube.com/embed/Wimkqo8gDZ0'
                    }
                }
            }
        });

        function td_Progress() {
            var progress = $('.progress-rate');
            var len = progress.length;
            for (var i = 0; i < len; i++) {
                var progressId = '#' + progress[i].id;
                var dataValue = $(progressId).attr('data-value');
                $(progressId).css({ 'width': dataValue + '%' });
            }
        }
        var progressRateClass = $('.progress-item');
        if ((progressRateClass).length) {
            td_Progress();
        }
        $('.counting').each(function () {
            var $this = $(this),
                countTo = $this.attr('data-count');

            $({ countNum: $this.text() }).animate({
                countNum: countTo
            },

                {
                    duration: 2000,
                    easing: 'linear',
                    step: function () {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function () {
                        $this.text(this.countNum);
                    }
                });
        });
    }


    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/itechie-banner-widget.default', BannerSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/itechie-testimonial-widget.default', TestimonialSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/itechie-case-study-widget.default', ProjectSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/itechie-sponsor-widget.default', SponsorsSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/widget', WidgetDefault);
    });


})(jQuery);