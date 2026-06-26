
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

    $('.productSlider').owlCarousel({
        margin: 18,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            481: {
                items: 2
            },
            600: {
                items: 3
            },
            890: {
                items: 4
            },
            1260: {
                items: 5
            },
            1360: {
                items: 6
            },
            1440: {
                items: 7
            }
        }
    });

    $('.megamenu').parent('li').addClass('hasSubmenu');
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


