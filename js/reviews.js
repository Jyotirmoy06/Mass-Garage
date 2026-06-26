var element = document.getElementById("bv-mboxzone-lightbox");

function showlightbox() {


    element.classList.remove("noshow");
}

function hidelightbox() {

    element.classList.add("noshow");
}

$('.close-alert').click(function () {
    $('.alert').slideUp().fadeOut(1000);
});

// Display selected image filename
$('#image_url').on('change', function () {
    var filename = $('#image_url')[0].files[0].name;
    $('#add-photo-button-description').text(filename);
});

$('.bv-radio-isrecommended').click(function (e) {
    e.preventDefault();
    $('.bv-radio-isrecommended').removeClass('bv-radio-container-li-active');
    $('.bv-radio-wrapper-label').removeClass('bv-radio-wrapper-label-focused');
    $(this).addClass('bv-radio-container-li-active');
    $(this).find('.bv-radio-wrapper-label').addClass('bv-radio-wrapper-label-focused');
});

// Dynamic Ratings Method (for all ratings)
function ratings(type, rating){
    $('#'+type+'_rating').val(rating);
    $('.'+type+'_rating').removeClass('bv-submission-star-rating-on star_rating_1 star_rating_2 star_rating_3 star_rating_4 star_rating_5');
    for(var i = 1; i <= rating; i++)
    {
        $('.bv-radio-rating-'+type+'-'+i).addClass('bv-submission-star-rating-on star_rating_'+rating);
        // alert(i)
    }
    if (rating == 1)
    {
        $('.bv-rating-helper-'+type+'-1').text("Poor");
    }
    else if (rating == 2)
    {
        $('.bv-rating-helper-'+type+'-1').text("Fair");
    }
    else if (rating == 3)
    {
        $('.bv-rating-helper-'+type+'-1').text("Average");
    }
    else if (rating == 4)
    {
        $('.bv-rating-helper-'+type+'-1').text("Good");
    }
    else if (rating == 5)
    {
        $('.bv-rating-helper-'+type+'-1').text("Excellent");
    }
    else
    {
        $('.bv-rating-helper-'+type+'-1').text("Click to rate!");
    }
}