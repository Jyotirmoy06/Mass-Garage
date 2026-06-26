var slideIndex1 = [1, 1];
/* Class the members of each slideshow group with different CSS classes */
var slideId1 = ["mySlides1", "mySlides2"]
showSlides1(1, 0);
showSlides1(1, 1);

function plusSlides1(n1, no1) {
    showSlides1(slideIndex1[no1] += n1, no1);
}

function showSlides1(n1, no1) {
    var i1;
    var x1 = document.getElementsByClassName(slideId1[no1]);
    if (n1 > x1.length) { slideIndex1[no1] = 1 }
    if (n1 < 1) { slideIndex1[no1] = x1.length }
    for (i1 = 0; i1 < x1.length; i1++) {
        x1[i1].style.display = "none";
    }
    x1[slideIndex1[no1] - 1].style.display = "block";
}