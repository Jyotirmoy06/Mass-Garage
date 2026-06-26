<section class="slogan_row">

    <h4>Mass Garage Doors Expert Service Area</h4>

</section>

<?php 
    
    $pageType = $pageType ?? null;
    $pageTitle = $pageTitle ?? null;
    // if ($pageType == "locationPage" || $pageTitle == "lpsPage" || $pageTitle == "BookingPage") {  
    if ($pageType == "locationPage" || $pageTitle == "lpsPage") {  
        // var_dump("4444444444");
?>
    
    <section class="footer_youtube_video">
        <iframe width="100%" height="650" src="https://www.youtube.com/embed/CQOFybqcSyA" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </section>
    

<?php } else {  ?>






    <section class="map">
    
    <?php 
        $showRadiusMap = "false";
        $pageType = $pageType ?? null;
        // $pageTitle = $pageTitle ?? null;
        // if(format_mapType == "locationIDCity")
        // if($trafficSource->getTrafficSource() == "Google Ads" && $mapLocationDB != "")
        if ($pageType != "locationPage")
        {
            // var_dump($pageType);
            // die();
        if($trafficSource->getTrafficSource() == "Google Ads" && $mapLocationDB != "")
        {
            // city specific
    ?> 
            <!-- Map code for city specific dotted line maps -->
            <iframe src="<?php echo $mapLocationDB;?>"  width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    <?php
        }
        elseif ( $trafficSource->getTrafficSource() == "Google Ads" && $mapLocationDB == "") 
        {
            // boston 25 miles 
            // Will be auto generated under the id=map section by JS
            $showRadiusMap = "true";
    ?>
            <div id="map" style="width: 100%; height: 450px;"></div>
    <?php
        }
        else 
        {
            $showRadiusMap = "true";
    ?>
            <div id="map" style="width: 100%; height: 450px; position: relative;"></div>
    <?php        
            // <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2949.1720801159872!2d-71.15674638516852!3d42.33885444443413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e38349314433b7%3A0xad31b84430944b!2sMass%20Garage%20Doors%20Expert!5e0!3m2!1sen!2sin!4v1628530770671!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    ?>
    <?php
        }
        
        }
    ?>

    </section>













<?php
    // <section class="map">
    //     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2949.1720801159872!2d-71.15674638516852!3d42.33885444443413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e38349314433b7%3A0xad31b84430944b!2sMass%20Garage%20Doors%20Expert!5e0!3m2!1sen!2sin!4v1628530770671!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    // </section>

?>

    <section class="footer_youtube_video">
        <iframe width="100%" height="650" src="https://www.youtube.com/embed/CQOFybqcSyA" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </section>

<?php } ?>

<section class="footer" style="padding-bottom: 80px;">

    <div class="footer_flex">

        <div class="col col-1" style="display: flex; flex-direction: column; padding-top: 8px;">
            <div class="cont">
                <div class="content_box center">
                <img loading="lazy" class="logo" src="/images/logo.png" alt="">
                <ul class="footer_social_icons">
                     <?php include 'includes/social_icons.php' ?>
                </ul>
                <p style="text-align: left;">Our mission is to provide you with 100% customer satisfactory as well as take care of our
customers by excelling in creating the garage door that you want and the service that you
deserve. </p>
                </div>
            </div>
        </div>

        <div class="col col-2 tab">
            <h3>Services</h3>
            <ul>
                <li><a href="/lps/garage-door-repairs.php">Garage Door Repairs</a></li>
                <li><a href="/lps/broken-cables.php">Garage Cable Repairs</a></li>
                <li><a href="/lps/broken-opener.php">Automatic Door Openers</a></li>
                <li><a href="/lps/broken-springs.php">Broken Springs</a></li>
                <li><a href="/lps/commercial.php">Commercial Repair</a></li>
                <li><a href="/lps/commercial-cables.php">Commercial Cables</a></li>
                <li><a href="/lps/commercial-openers.php">Commercial Openers</a></li>
                <li><a href="/lps/commercial-springs.php">Commercial Springs</a></li>
            </ul>
        </div>

        <div class="col col-3 tab">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/shop-category.php">Shop</a></li>
                <li><a href="/about-us.php">About Us</a></li>
                <li><a href="/services.php">Services</a></li>
                <li><a href="/mass-garage-doors-service-area.php">Location</a></li>
                <li><a href="/info/">Blog</a></li>
                <li><a href="/wayne-dalton.php">Design</a></li>
                <li><a href="/gallery.php">Gallery</a></li>
                <li><a href="/contact-us.php">Contact</a></li>
                <li><a href="/certificate.php">Certificate</a></li>
                <li><a href="/tos.php">Terms Of Service</a></li>
                <li><a href="/privacy-policy.php">Privacy Policy</a></li>
            </ul>
        </div>

        <div class="col col-4">
            <h3>Contacts</h3>
            <ul class="contact_icons">
                <li><a href="tel:<?= $printableNumber ?>"><?= $printableNumber ?></a></li>
                <li><a href="/contact-us.php" class="mail">Email Us</a></li>
                <li><?= $addressLine1 ?><br>
                    <?= $addressLine2 ?></li>
                <li><?= $hoursOperationLine1 ?><br>
                    <?= $hoursOperationLine2 ?></li>
            </ul>

        </div>


    </div>

    <p class="copyright">&copy <?php echo date("Y"); ?> Mass Garage Doors Expert</p>

</section>

</section>
<div class="cont sticky-footer-cta cta">
    <ul class="btn_list">
        <?php
            if ($meta_ogTitle != 'Booking') 
            {
        ?>
                <li>
                    <button onclick="show_workiz()" role="button" id="book_an_appointment" class="btn1">BOOK AN APPOINTMENT</button>
                </li>
                <li>
                    <span class="or-space">OR</span>
                </li>
        <?php
            }
        ?>
        <li>
            <a href="tel:<?= $printableNumber ?>" id="call_btn" class="btn2"><img loading="lazy" src="/images/phone-.svg" alt="" style="width: 26px;display: inline-block;">
                <span class="respo">Call:</span><?= $printableNumber ?></a>
        </li>
    </ul>
   
</div>

<link rel="stylesheet" href="/css/owl.carousel.min.css?v=1.1">

<script>
    if (window.location.pathname == '/certificate.php') {
        var cert_js = document.createElement('script');

        cert_js.setAttribute('src', 'js/certificate.js');

        document.body.appendChild(cert_js);
    } else {
        var base_js = document.createElement('script');

        base_js.setAttribute('src', '/js/respo.js?v=1.1');

        document.body.appendChild(base_js);
    }
</script>

<script>
    $('.productSlider').owlCarousel({
        margin: 18,
        nav: true,
        loop: false,
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
            1000: {
                items: 5
            }
        }
    });
</script>

<script src="/js/modal.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD69Zrm4V0m-epWBm-4w9g5D0iG6dBI9k0&libraries=places" loading="async"></script>

<script>
    if (window.matchMedia("(max-width: 980px)").matches) {
        let footerTab = document.querySelectorAll('.footer .tab h3');
        footerTab.forEach((el) => {
            el.addEventListener('click', (e) => {
                e.target.classList.toggle('active');
            });
        });
    }

    function isMobile() {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent); 1 
    } 


    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 9,
            center: { lat: 42.33885104534481, lng: -71.15455678429771 }, // Replace with your desired coordinates
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                // position: google.maps.ControlPosition.TOP_CENTER
                position: google.maps.ControlPosition.BOTTOM_LEFT
                // marginLeft: "10px",
                // marginBottom: "30px"
                
            }
        });

        if (isMobile()) {
            map.zoom = 8; // Adjust zoom level for mobile
        }

        // Add a circle to the map
        const circle = new google.maps.Circle({
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#FFFFFF",
            fillOpacity: 0.20,
            map,
            center: { lat: 42.33885104534481, lng: -71.15455678429771 }, // Center of the circle
            radius: 40233.6 // Radius in meters
        });

        // Add a marker at the center of the circle
        const marker = new google.maps.Marker({
            position: { lat: 42.33885104534481, lng: -71.15455678429771 },
            map,
        });

        // Add location details to the map
        const locationDetails = document.createElement('div');
        locationDetails.style = '';
        locationDetails.style.position = 'absolute';
        locationDetails.style.marginTop = '10px';
        locationDetails.style.marginLeft = '10px';
        locationDetails.style.backgroundColor = 'white';
        locationDetails.style.padding = '10px';
        
        locationDetails.innerHTML += "<h3 style='font-family: Roboto,Arial; text-transform: inherit; font-size: 13px; font-weight: bolder; margin-bottom: 0; line-height: 15px;'>Mass Garage Doors Expert</h3>";

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(locationDetails);


        // Add Google Reviews count and star rating (requires Google Places API)
        const placeService = new google.maps.places.PlacesService(map);
        placeService.getDetails({ placeId: 'ChIJtzNEMUmD44kRS5QwRLgxrQA' }, (place, status) => {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                const rating = place.rating;
                const userRatingsTotal = place.user_ratings_total;

                locationDetails.innerHTML += `${rating} `;

                // Add star rating using CSS or a library like Font Awesome
                const starRating = document.createElement('span');
                starRating.setAttribute("style","color:#FF9529;");
                starRating.innerHTML = '★'.repeat(Math.round(rating));
                locationDetails.appendChild(starRating);

                // Add review count and star rating to the location details
                locationDetails.innerHTML += `    <a href="https://www.google.com/search?q=Mass+garage+doors+expert" target="_blank">${userRatingsTotal} Reviews</a>\r\n\n`;
                
                // Add a link to a larger map
                locationDetails.innerHTML += `<a href="https://maps.google.com/maps?ll=42.338851,-71.154563&z=16&t=m&hl=en&gl=IN&mapclient=embed&cid=48749838458721355" target="_blank">View larger map</a>`;
            }
        }); 


        console.log("this is inside initMap function!");
    }

    $(document).ready(function() {

        var rowCounter = 1;

        var showRadiusMap = <?=$showRadiusMap;?>;
        if(showRadiusMap == true)
        {
            initMap();
        }

        $("#addRow").click(function(){

            // console.log($('.all-row-contents').length);
            var newlyAddedRowsCount = $('.all-row-contents').length;

            if(newlyAddedRowsCount == 0)
            {
                rowCounter = 2;
            } else {
                rowCounter = rowCounter + 1;
            }


            var newRow = '<div class="all-row-contents">';

            newRow += '<div style="display: inline-flex;">';

            newRow += '<h3 class="door'+rowCounter+'">Door '+rowCounter+'</h3>';

            newRow += '<button type="button" id="deleteRow" class="delete-new-dimension-row mob_view" style="margin-top: 1%;">Delete Door #'+rowCounter+'</button>';
            
            newRow += '</div>'

            newRow += '<div class="col_count_2">';
            // newRow += '<div class="hiddenDoorCounter" style="display: none;">'+rowCounter+'</div>';
            newRow += '<div class="form_div">';
            newRow += '<label style="padding-bottom: 5px;">Height:</label>';
            newRow += '<div class="dropdown dimension-row">';
            newRow += '<select id="height-feet" class="dropbtn1" name="door'+rowCounter+'-height-feet">';
            newRow += '<option label="" value="">-- Select Feet --</option>';

            for (let feet1 = 1; feet1 <= 30; feet1++) {
                newRow += '<option label="'+feet1+'" value="'+feet1+'">'+feet1+'</option>';
            }


            newRow += '</select>';
            newRow += '<select id="height-inches" class="dropbtn2 ml-1" name="door'+rowCounter+'-height-inches">';
            newRow += '<option label="" value="">-- Select Inches --</option>';

            for (let inches1 = 0; inches1 <= 11; inches1++) {
                newRow += '<option label="'+inches1+'" value="'+inches1+'">'+inches1+'</option>';
            }

            newRow += '</select>';
            newRow += '</div>';
            newRow += '</div>';
            newRow += '<div class="form_div">';
            newRow += '<label style="padding-bottom: 5px;">Width:</label>';
            newRow += '<div class="dropdown dimension-row">';
            newRow += '<select id="width-feet" class="dropbtn3" name="door'+rowCounter+'-width-feet">';
            newRow += '<option label="" value="">-- Select Feet --</option>';
                    
            for (let feet2 = 1; feet2 <= 30; feet2++) {
                newRow += '<option label="'+feet2+'" value="'+feet2+'">'+feet2+'</option>';
            }
                    
            newRow += '</select>';
            newRow += '<select id="width-inches" class="dropbtn4 ml-1" name="door'+rowCounter+'-width-inches">';
            newRow += '<option label="" value="">-- Select Inches --</option>';

            for (let inches2 = 0; inches2 <= 11; inches2++) {
                newRow += '<option label="'+inches2+'" value="'+inches2+'">'+inches2+'</option>';
            }
                    
            newRow += '</select>';
            newRow += '<button type="button" id="deleteRow" class="delete-new-dimension-row dskt_view">Delete Door #'+rowCounter+'</button>';
            newRow += '</div></div></div>';

           
            $("#addRow").before(newRow); 
            
            $latestRowCount = $('.all-row-contents').length;
            $("#totalDoorsCount").val($latestRowCount+1);
        });

        $(document).on("click", ".delete-new-dimension-row", function(){

            var aa = $(this).closest(".hiddenDoorCounter").html();
            console.log(aa);
            
            $(this).closest(".all-row-contents").remove();

            $latestRowCount = $('.all-row-contents').length;
            $("#totalDoorsCount").val($latestRowCount+1);
            
        });

    });



    $(document).on('load', function() {
        $(".default").css("background-color", "black");
        console.log("hello world iframe1");
        console.log(<?=$showRadiusMap?>);
    });



    function BannerSectionReadMoreLessFunction() {
        if ($("#moreText").hasClass('d-none')) {
            $("span#moreText").removeClass("d-none");
            $("span#dots").toggleClass("d-none");
            $("a#bannerReadMoreLessBtn").html('hide');

            console.log($(window).width());
            var screenWidth = $(window).width();
            if (screenWidth > 400) {
                $("div#homepage_banner_readmore_block").css('top', '212px');
            } else {
                $("div#homepage_banner_readmore_block").css('top', '196px');
            }


            // $("div#homepage_banner_readmore_block").css('margin-top', '-11%');
        } else {
            $("span#moreText").addClass("d-none");
            $("span#dots").toggleClass("d-none");
            $("a#bannerReadMoreLessBtn").html('more');
            $("div#homepage_banner_readmore_block").css('top', '155px');
            // $("div#homepage_banner_readmore_block").css({'margin-top': '-23%'});
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        let lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
        let active = false;

        const lazyLoad = function() {
            if (active === false) {
                active = true;

                setTimeout(function() {
                    lazyImages.forEach(function(lazyImage) {
                        if ((lazyImage.getBoundingClientRect().top <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0) && getComputedStyle(lazyImage).display !== "none") {
                            lazyImage.src = lazyImage.dataset.src;
                            lazyImage.srcset = lazyImage.dataset.srcset;
                            lazyImage.classList.remove("lazy");

                            lazyImages = lazyImages.filter(function(image) {
                                return image !== lazyImage;
                            });

                            if (lazyImages.length === 0) {
                                document.removeEventListener("scroll", lazyLoad);
                                window.removeEventListener("resize", lazyLoad);
                                window.removeEventListener("orientationchange", lazyLoad);
                            }
                        }
                    });

                    active = false;
                }, 200);
            }
        };

        document.addEventListener("scroll", lazyLoad);
        window.addEventListener("resize", lazyLoad);
        window.addEventListener("orientationchange", lazyLoad);
        // fadeSideCarouselItems();
    });

    $(document.body).on('touchmove', onScrollBottomMobile);
    $(window).on('scroll', onScrollBottom);

    function onScrollBottom() {
        if ($(window).scrollTop() >=
            $('.footer').offset().top + $('.footer').outerHeight() -
            window.innerHeight) {
            $('.sticky-footer-cta').css('position', 'static')
        } else {

            $('.sticky-footer-cta').css('position', 'fixed')
        }
    }

    function onScrollBottomMobile() {
        
        var footerPos = $('.slogan_row').offset().top - $(window).scrollTop();
        if (footerPos < 100) {
            $('.sticky-footer-cta').css('position', 'static');
        } else {
            $('.sticky-footer-cta').css('position', 'fixed');
        }

    }
    
</script>

<?php 
    if ( (isset($_GET["gclid"]) && isset($_GET["ac"]) && $_GET["ac"] == 978) || (!empty($_COOKIE['ac']) && $_COOKIE['ac'] == 978) )
    {
?>
        <script src="https://backend.leadconnectorhq.com/appengine/loc/eEjUwz9OhAfNMmhjpf3i/pool/prlL1QoBHhCNepni5281/number_pool.js"></script>
        <script src="https://backend.leadconnectorhq.com/appengine/js/user_session.js"></script>
<?php
    }
    elseif ( (isset($_GET["gclid"]) && isset($_GET["ac"]) && $_GET["ac"] == 781) || (!empty($_COOKIE['ac']) && $_COOKIE['ac'] == 781) )
    {
?>
        <script src="https://backend.leadconnectorhq.com/appengine/loc/eEjUwz9OhAfNMmhjpf3i/pool/BpEX1cSlmZfv2Mg7FUMq/number_pool.js"></script>
        <script src="https://backend.leadconnectorhq.com/appengine/js/user_session.js"></script>
<?php
    }
    elseif ( (isset($_GET["gclid"]) && isset($_GET["ac"]) && $_GET["ac"] == 508) || (!empty($_COOKIE['ac']) && $_COOKIE['ac'] == 508) )
    {
?>
        <script src="https://backend.leadconnectorhq.com/appengine/loc/eEjUwz9OhAfNMmhjpf3i/pool/diXYyuU0j4vz8MtPWXCk/number_pool.js"></script>
        <script src="https://backend.leadconnectorhq.com/appengine/js/user_session.js"></script>
<?php
    }
    elseif ( (isset($_GET["gclid"]) && isset($_GET["ac"]) && $_GET["ac"] == 617) || (!empty($_COOKIE['ac']) && $_COOKIE['ac'] == 617) )
    {
?>
        <script src="https://backend.leadconnectorhq.com/appengine/loc/eEjUwz9OhAfNMmhjpf3i/pool/lGCV5LxaVBs0zrHTozmt/number_pool.js"></script>
        <script src="https://backend.leadconnectorhq.com/appengine/js/user_session.js"></script>
<?php
    } 
?>

</body>

</html>
<?php ob_end_flush() ?>