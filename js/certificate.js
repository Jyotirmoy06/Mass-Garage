
$(document).ready(function () {

    // Responsive Menu

    $('.respo_menu').click(function () {

        $(this).toggleClass('active');

        $('.nav').toggleClass('slideIn');

        $('body').toggleClass('blur');

    });

    $('li.close').click(function () {

        $('.respo_menu').removeClass('active');

        $('.nav').removeClass('slideIn');

        $('body').removeClass('blur');

    });

    $('.megamenu').parent('li').addClass('hasSubmenu');

    $('.cetificateSlider').owlCarousel({

        margin: 1,

        margin: 20,

        nav: true,

        loop: true,

        responsive: {

            0: {

                items: 1

            },

            481: {

                items: 1

            },

            768: {

                items: 1,

                margin: 10

            },

            1000: {

                items: 1

            }

        }

    });

    $(window).scroll(function () {

        var scroll = $(window).scrollTop();

        if (scroll >= 90) {

            $("nav").addClass("stickyMenu");

        } else {

            $("nav").removeClass("stickyMenu");

        }

    });

    if ($(window).width() <= 980) {

        $('li.hasSubmenu').on('click', function () {

            $(this).children('.megamenu').slideToggle();

        });

    }

});



