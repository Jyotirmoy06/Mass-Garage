var viewportWidth = window.innerWidth || document.documentElement.clientWidth;
console.log(viewportWidth);
if (viewportWidth > 1124) {
    console.log("yes");
    let productTab = document.querySelector('.product_tab');

    let productTabClone = productTab.cloneNode(true);

    let addClassToClone = productTabClone.classList.add('product_top_slide');


    let bodyTag = document.querySelector('body');

    bodyTag.prepend(productTabClone);

    let topProductTab = document.querySelector('.product_tab');

    window.addEventListener('scroll', function() {

        let scrollPosition = window.scrollY;

        // let reviewSec = document.querySelector('.review_head').getBoundingClientRect().top;

        let info_head = document.querySelector('.product_info .info_head');

        if (scrollPosition >= 10) {

            console.log("yes");
            topProductTab.classList.add('active');

            info_head.style.cssText = "top: 88px;";

        } else {

            topProductTab.classList.remove('active');

            info_head.style.cssText = "top: 0px;";

        }

    });

} else {

    $(window).scroll(function() {

        var scroll = $(window).scrollTop();

        if (scroll >= 90) {

            $("nav").addClass("no");

        } else {

            $("nav").removeClass("no");

        }

    });

}

window.addEventListener('scroll', function() {
    if (viewportWidth > 1124)
        var heightgap = 300;
    else
        var heightgap = 500;
    // Tab OnScroll Add Class

    let infoheadHeight = document.querySelector('.info_head').getBoundingClientRect().height + document.querySelector('.info_head').getBoundingClientRect().top;

    let tabContentDiv = document.querySelectorAll('.tab_content > *');

    let tabElement = document.querySelectorAll('ul.tabnav li');

    tabContentDiv.forEach(function(el, i) {

        if (el.getBoundingClientRect().top <= infoheadHeight + heightgap) {

            [...tabElement[i].parentElement.children].forEach(sib => sib.classList.remove('active'));

            tabElement[i].classList.add('active');

        }

    });

});