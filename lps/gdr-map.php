<?php
$folder_Depth = 1;
$meta_Title = 'Garage Door Repair';
$meta_Description = 'Mass Garage Doors Expert Broken Springs. Are you looking for the foremost garage door experts serving Massachusetts. Click the link above or call us by phone today!';
$meta_url = 'https://massgaragedoorsexpert.com/broken-springs';
$meta_ogTitle = 'Broken Springs';
$title = 'Garage Door Repair';
$pageTitle = 'lpsPage';
?>
<?php
session_start();
include '../includes/header.php';


if($_GET['logos'] == "true")
{
    $logosFound = 1;
?>
    <style>
        .banner_text .cont 
        {
            padding: 1rem !important;
        }

        .dividers {
            height: 250px;
        }

        .black_dividers {
            padding: 35px 0 !important;
        }

    </style>
<?php

}
else
{
    $logosFound = 0;
}

?>

<style>
   
    .d-none {
        display: none !important;
    }
    .d-block {
        display: block !important;
    }
    .d-webkit-box {
        display: -webkit-box !important;
    }

    .points {
        list-style: disc; 
        margin-left:2em; 
        /* padding-left: 3%;  */
        font-size: 15px; 
        line-height: 23px; 
        color:#494949;
    }

    .parags {
        text-align: left;
    }

    @media only screen and (max-device-width: 600px) {
        .dskt_view {
            display: none !important;
        }
        .mob_view {
            display: inline-block !important;
        }
        .banner .banner_text {
            top: 112px !important;
        }
        .banner.inner_banner > img {
            height: 460px !important;
        }
    }

    @media only screen and (min-device-width: 600px) {
        .dskt_view {
            display: inline-block !important;
        }
        .mob_view {
            display: none !important;
        }
    }

    @media screen and (max-width: 980px) {
        .service_cont_img {
            height: 400px;
        }

        .footer_youtube_video {
            border: solid 3px #fff;
            border-radius: 4px;
            padding: 0 !important;
        }

        .points {
            /* margin-left: 0;  */
            padding-left: 0; 
        }

        .parags {
            text-align: left;
        }

        .split_row .cont p {
            text-align: left !important;
        }
    }

</style>

<section class="banner inner_banner test_banner">

    <?php // include '../banner-image.php' ?>

    <!-- <img src="/images/about-us-banner.jpg" srcset="/images/residential-banner-clear-garage-door.webp 600w,/images/residential-banner-clear-garage-door.webp 980w,/images/about-us-banner.webp" alt="" loading="lazy"> -->
    <img loading="lazy" src="/images/about-us-banner.jpg" srcset="/images/residential-banner-480.webp 480w, /images/residential-banner-768.webp 768w, /images/residential-banner-980.webp 980w, /images/about-us-banner.jpg" alt="">

    <div class="banner_text">

        <div class="wrapper">
<?php

    if($_GET['logos'] == "true")
    {
        $logosFound = 1;

?>
            <div class="banner-logos-div web_view">
                <img loading="lazy" src="/images/achievement_logo_1.png" alt="" >
                <img loading="lazy" src="/images/achievement_logo_2.png" alt="" >
                <img loading="lazy" src="/images/achievement_logo_3.png" alt="" >
                <!-- <img loading="lazy" src="/images/achievement_logo_4.png" alt="" style="width: 100px;display: inline-block;">
                <img loading="lazy" src="/images/achievement_logo_.png" alt="" style="width: 100px;display: inline-block;"> -->
            </div>
<?php
}
?>

            <div class="cont">

                <h1><?php echo $title ?></h1>

                <text class="punchline-text"><?php echo $city_name . ",";  ?> <?php echo $state_name  ?> Top Rated Company</text>
                

                <ul class="btn_list">

                    <li><button onclick="show_workiz()" role="button" id="book_an_appointment" class="btn1">BOOK AN APPOINTMENT</button></li>

                    <li><a href="tel:<?= $printableNumber ?>" class="btn2">

                            <img loading="lazy" src="/images/phone-.svg" alt="" style="width: 26px;display: inline-block;">

                            <span class="respo">Call: </span><?= $printableNumber ?></a>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</section>

<h2 class="headstrip">Garage Doors Repair & Service with a 4.8 Star Rating on Google</h2>

<?php
    if($logosFound == 1)
    {
?>
    <section class="black_dividers mobile_view">
        <div class="" >
            <img loading="lazy" src="/images/achievement_logo_1.png" alt="" style="width: 150px;display: inline-block;">
            <img loading="lazy" src="/images/achievement_logo_2.png" alt="" style="width: 150px;display: inline-block;">
        </div>
    </section>
<?php
    }
?>

<section class="black_dividers dividers">

<?php
    if($logosFound == 1)
    {
?>
        <div class="web_view" style="margin-left: 2%;">
            <img loading="lazy" src="/images/achievement_logo_4.png" alt="" style="width: 160px;display: inline-block;">
        </div>
<?php
    }
?>
    <div class="wrapper">

        <h3>Why choose Mass Garage Doors Expert?</h3>
        <p>We have a long history of satisfied clients all over the Greater Boston area and Central Massachusetts, with high rating reviews on Google and Home Advisor.</p>
        <br/>
        <p>We have a quick response time, same day service and 24/7 emergency service, we are licensed and insured. Our mission is to make sure the job is done right the first time.</p>
    </div>
<?php
    if($logosFound == 1)
    {
?>
        <div class="web_view" style="margin-right: 2%;">
            <img loading="lazy" src="/images/achievement_logo_5.png" alt="" style="width: 150px;display: inline-block;">
        </div>
<?php
    }
?>    

</section>

<?php
    if($logosFound == 1)
    {
?>
    <section class="black_dividers mobile_view">
        <div class="" >
            <img loading="lazy" src="/images/achievement_logo_3.png" alt="" style="width: 150px;display: inline-block;">
            <img loading="lazy" src="/images/achievement_logo_4.png" alt="" style="width: 150px;display: inline-block;">
            <img loading="lazy" src="/images/achievement_logo_5.png" alt="" style="width: 150px;display: inline-block;">
        </div>
    </section>
<?php
    }
?>



<section class="split_row service_split_row">
    <div>
        <!-- <div class="service_cont_img">
            <div class="numbertext"></div> -->
            <!-- <img src="/images/lps/Job_track2.jpg" loading="lazy"> -->
            <!-- <img src="/images/garage-door-repair.webp" loading="lazy">
        </div> -->
        <div class="service_cont_img">
            <img loading="lazy" class="" src="/images/garage-door-repair.webp" data-src="/images/garage-door-repair.webp" data-srcset="/images/garage-door-repair.webp 768w, /images/garage-door-repair-cropped-new.webp 500w, /images/garage-door-repair-cropped-new.webp 360w, /images/garage-door-repair.webp" alt="" style="object-fit: unset;" srcset="/images/garage-door-repair.webp 768w, /images/garage-door-repair-cropped-new.webp 500w, /images/garage-door-repair-cropped-new.webp 360w, /images/garage-door-repair.webp">
        </div>

    </div>
    <div class="cont service_cont white_section">
        <h3>GARAGE DOORS REPAIR</h3>
        <!-- <p>We have over 15 years of experience in the field of garage doors repair and installations. Our team of professional and experienced technicians is equipped with the knowledge and tools to handle any garage door issue, ensuring your door is back to optimal performance in no time. We understand that garage door problems can occur at the most inconvenient times. That's why we offer same day service and 24/7 emergency service.</p>
        <p>We carry a versatile selection of factory parts in stock to ensure quick and efficient service. We work with all the big brand names in the industry</p>
        <p>Some of our services incloudes but not limited to:</p>
        <li style="list-style: disc; margin-left:2em;  font-size: 15px; line-height: 23px; color:#494949;">Tortion and Extention spring repair.</li>
        <li style="list-style: disc; margin-left:2em;font-size: 15px; line-height: 23px; color:#494949;">Cable repair and replace.</li>
        <li style="list-style: disc; margin-left:2em;font-size: 15px; line-height: 23px; color:#494949;">Garage door opener repair and installation.</li>
        <li style="list-style: disc; margin-left:2em;font-size: 15px; line-height: 23px; color:#494949;">Tracks and frame repair.</li>
        <li style="list-style: disc; margin-left:2em;font-size: 15px; line-height: 23px; color:#494949;">Sensor repair and replacement.</li>
        <li style="list-style: disc; margin-left:2em;font-size: 15px; line-height: 23px; color:#494949;">System Alignment</li> -->
        <div class="parags"> 
            <p>Boost your garage door's performance with over 15 years of experience behind us! Our highly skilled technicians can tackle any issue, big or small, using their expertise and cutting-edge tools. We understand emergencies don't wait for convenient times, which is why we offer same-day service and 24/7 emergency repairs to get your garage back in action ASAP.</p>
            <br/>
            <p>Fast and efficient repairs are guaranteed thanks to our stocked inventory of top-quality parts from all leading garage door brands. Our comprehensive services include, but are not limited to:</p>
            <br/>
            <li class="points">Torsion and extension spring repair</li>
            <li class="points">Cable repair and replacement</li>
            <li class="points">Garage door opener repair and installation</li>
            <li class="points">Track and frame repair</li>
            <li class="points">Sensor repair and replacement</li>
            <li class="points">System alignment</li>   
            <br/>
            <p>Let us handle your garage door woes - contact us today!</p>
        </div>
    </div>
</section>


<section class="black_dividers dividers">
    <div class="wrapper">
        <!-- <h3>Grage Door repair in <?=$city_name?> and the surrounding areas</h3> -->
        <p>Does your garage door groan and sputter or refuse to budge at all? If you're in the <?=$city_name?> and the surrounding towns Mass Garage Doors Expert is here to help.</p>
    </div>
</section>


<section class="split_row service_split_row" id="firstSection">

    <div class="cont service_cont white_section d-webkit-box">
        <h3>Garage Door Repair in <?=$city_name?> and the surrounding areas</h3>
        <!-- <p style="margin-bottom: 20px;"> -->
        <p>
            We're a trusted service provider in the region, known for our expertise in diagnosing and repairing all types of garage door issues. From malfunctioning openers to worn-out springs, our technicians have more than 15 years of experience and can quickly identify the problem and get your door functioning smoothly again.
        </p>
        <br/>
        <p>Mass Garage Door is operating and fully insured in <?=$city_name?> and the surrounding towns.</p>
        <br/>
        <p>We have a 24/7 emergency service. Our mission is to provide you with 100% customer satisfaction.</p>
        <!-- <p>
            Slightly removed from the busy urban streets of Boston, Middlesex County owes its claim to fame to the
            Middlesex County Volunteers, as well as a number of sprawling picturesque homes. As the third largest
            county in all of Massachusetts, this county is home to a number of communities such as Cambridge, Medford,
            Watertown and more!
        </p> -->
    </div>
    <!-- carousel-->
    <div>
        <div class="service_cont_img fade">
            <!-- <iframe loading="lazy" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1507391.047740224!2d-70.33879960296659!3d42.446396!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e40bee412d0c99%3A0xe270155393f2b008!2sMiddlesex%20County%2C%20MA!5e0!3m2!1sen!2sus!4v1640990357115!5m2!1sen!2sus" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen=""></iframe> -->
            
        
            <?php
                if( !isset($city_name) || $city_name == "" || $city_name == "Greater Boston") {
            ?>
                <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD69Zrm4V0m-epWBm-4w9g5D0iG6dBI9k0&loading=async&callback=initMap">
                </script>
                <div id="map-canvas" style="width: 100%; height: 100%;"></div>
            <?php    
                }else{ 
            ?>
                <iframe loading="lazy" src="https://maps.google.com/maps?q=<?=$city_name?>&output=embed" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen=""></iframe>
            <?php
                }
            ?>
                
        </div>
    </div>

</section>


<section class="black_dividers dividers">
    <div class="wrapper">
        <!-- <h3>Spring repair and replacement</h3> -->
        <p>Your garage door springs are silent partners, ensuring smooth operation by balancing the door's weight. But worn or broken springs can cause big problems. A malfunctioning door can be a real hassle, but more importantly, it can be a safety hazard.</p>
    </div>
</section>


<section class="split_row service_split_row">
    <div>
        <div class="service_cont_img">
            <div class="numbertext"></div>
            <!-- <img src="/images/lps/Job_track3.jpg" loading="lazy"> -->
            <img src="/images/broken-spring1.webp" loading="lazy">
        </div>
    </div>
    <div class="cont service_cont white_section">
        <h3>Spring Repair and Replacement.</h3>
        <div class="parags">
            <p>Don't underestimate the importance of your garage door springs! These components balance the weight of your door, making it open and close effortlessly. Worn or broken springs can lead to a malfunctioning door, posing a safety hazard.</p>
            <br/>
            <p>There are two types of springs used in garage doors: torsion springs and extension springs. We usually suggest replacing the garage door springs anywhere between 5-9 years, depending on the use. Broken springs can be extremely dangerous, can cause the cable to snap, destroy your electric opener, or cause the garage door to drop and cause irreparable damage.</p>
            <br/>
            <p>Luckily, Mass Garage Doors Expert is here to help. Our skilled technicians can diagnose spring issues and determine the best course of action, be it repair or replacement. With our expertise and the right tools, we'll ensure your garage door springs are handled safely and efficiently, getting your door back to smooth operation in no time.</p>
            
            <p>Here are a few signs that you need to replace/ repair your garage door springs:</p>
            <br/>
            <li class="points">Difficulty opening or closing</li>
            <li class="points">Uneven movement</li>
            <li class="points">Visibly gaps in the springs</li>
            <li class="points">Visibly rusty springs</li>
            <li class="points">Visibly broken spring</li>
            <li class="points">Excessive squeaky noise</li>
            <li class="points">Abnormal strain on opener</li>
        </div>
        <br/>
    </div>
</section>


<section class="black_dividers dividers">
    <div class="wrapper">
        <!-- <h3>Cable replacement</h3> -->
        <p>Garage door cables are lifelines, holding immense weight and ensuring smooth operation. A single broken cable can disrupt this entire system. These cables connect the spring system directly to the garage door.</p>
    </div>
</section>



<section class="split_row service_split_row">
    <div class="cont service_cont white_section d-webkit-box">
        <h3>Cable Replacement</h3>
        <p>Garage door cables are the unsung heroes of your garage door system. These thick steel cables work tirelessly behind the scenes, balancing the weight of your door and ensuring its smooth operation. They connect the spring system, which counteracts the door's weight, directly to the garage door itself. There are two main types of springs used in garage doors, torsion and extension, and each type relies on its own dedicated cable.</p>
        <br/>
        <p>Spotting a broken cable can be straightforward. A loud snapping sound is a giveaway, or you might see the opener working while the door remains stubbornly stuck. In some cases, a broken cable might become visibly tangled or dislodged.</p>  
        <br/>
        <p>If you suspect a cable issue, it's important to call a professional for repair. Leave the garage door cable repairs to the experts - they have the knowledge and tools to safely handle the tension and get your door back in working order quickly.</p>
    </div>

    <div>
        <div class="service_cont_img fade">
            <div class="numbertext"></div>
            <img src="/images/cable_repair.webp" style="width:100%" loading="lazy">
        </div>
    </div>
    <br>
</section>


<section class="black_dividers dividers">
    <div class="wrapper">
        <!-- <h3>Automatic garage door opener</h3> -->
        <p>An automatic garage door opener is a magical little device that transforms your garage door from a manual task to a remote-controlled breeze. It uses a motor and a track-and-dryer-cable system to lift and lower the door. You can control it with a remote control, a keypad outside the garage, or even your smartphone through a compatible app.</p>
    </div>
</section>


<section class="split_row service_split_row">
    <div>
        <div class="service_cont_img">
            <div class="numbertext"></div>
            <img src="/images/broken-opener1.webp" loading="lazy">
        </div>
    </div>
    <div class="cont service_cont white_section">
        <h3>Automatic Garage Door Opener</h3>
        <div class="parags">
            <p>Over time the mechanisms that operate the garage door can wear out or become damaged, leading to issues like the door not opening or closing properly, making unusual noises, or failing to respond to the remote control. The repair process typically involves diagnosing the problem, which can be anything from a misaligned photo eye to a worn-out gear or motor.</p>
            <br/>
            <p>It’s important to note that while some minor issues can be fixed by homeowners themselves, many require the expertise of a professional.</p>
            <br/>
            <p>Professional garage door opener repair service has the necessary knowledge and tools to handle a wide range of issues, from replacing broken parts, realigning sensors, reprogramming remotes and even installing a new opener if necessary.</p>
            <br/>
            <p>Signs of broken garage door opener:</p>
            <br/>
            <li class="points">Remote control or wall switch not working.</li>
            <li class="points">Door doesn't fully open or close</li>
            <li class="points">Motor continues to run and does not stop.</li>
            <li class="points">The door reverses after or before the door hits the floor.</li>
            <li class="points">Unusual noises.</li>
            <br/>
            <p><strong>Remember:</strong> by promptly addressing any issues and keeping up the routine maintenance you can extend the lifespan of your garage door opener and ensure it operates smoothly and safely.</p>
        </div>
    </div>
</section>












<section class="black_dividers dividers">

    <div class="wrapper">

        <h3>REACH OUT TO US</h3>

        <p>Our friendly and trustworthy technicians are available whenever you need them. We serve clients

            in the Boston area as well as the counties of Suffolk, Middlesex, Norfolk, and Essex, MA. We

            would also appreciate any feedback from our valued clients. If you have any questions about our

            services or rates, feel free to get in touch with us. We always look forward to hearing from

            you!</p>

        <button onclick="show_workiz()" role="button" id="book_an_appointment" class="btn1">BOOK AN APPOINTMENT</button>
    </div>

    

</section>

<!-- <section>    
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD69Zrm4V0m-epWBm-4w9g5D0iG6dBI9k0&loading=async&callback=initMap">
    </script>
    <div id="map-canvas" style="width: 800px; height: 500px;"></div>
</section> -->
<!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD69Zrm4V0m-epWBm-4w9g5D0iG6dBI9k0&loading=async&callback=initMap">
</script> -->
<script src="../js/carousel.js"></script>
<script src="../js/carousel2.js"></script>

<script>
    var map;
    var geocoder;
    var marker;
    var people = new Array();
    var latlng;
    var infowindow;

    $(document).ready(function() {
        ViewCustInGoogleMap();
    });

    function ViewCustInGoogleMap() {

        var mapOptions = {
            center: new google.maps.LatLng(42.2626, -71.8023),   // Coimbatore = (11.0168445, 76.9558321) -71.802293, 42.262593
            zoom: 9,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

        // Get data from database. It should be like below format or you can alter it.

        var data = '[{ "DisplayText": "adcE", "ADDRESS": "Essex County", "LatitudeLongitude": "42.2626,-71.8023", "MarkerId": "Customer" },{ "DisplayText": "abcB", "ADDRESS": "Bristol County", "LatitudeLongitude": "41.7938,-71.1449", "MarkerId": "Customer"},{ "DisplayText": "abcN", "ADDRESS": "Norfolk County", "LatitudeLongitude": "42.1767,-71.1449", "MarkerId": "Customer"},{ "DisplayText": "adcS", "ADDRESS": "Suffolk County", "LatitudeLongitude": "42.3577,-70.9785", "MarkerId": "Customer" },{ "DisplayText": "adcM", "ADDRESS": "Middlesex County", "LatitudeLongitude": "42.4672,-71.2874", "MarkerId": "Customer" },{ "DisplayText": "adcP", "ADDRESS": "Plymouth County", "LatitudeLongitude": "41.9120,-70.7168", "MarkerId": "Customer" },{ "DisplayText": "adcW", "ADDRESS": "Worcester County", "LatitudeLongitude": "42.4097,-71.8571", "MarkerId": "Customer" }]';

        // var data = '[{ "DisplayText": "adcE", "ADDRESS": "Essex County", "LatitudeLongitude": "42.2626,-71.8023", "MarkerId": "Customer" },{ "DisplayText": "abcB", "ADDRESS": "Bristol County", "LatitudeLongitude": "41.7938,-71.1449", "MarkerId": "Customer"}]';
        people = JSON.parse(data); 

        for (var i = 0; i < people.length; i++) {
            setMarker(people[i]);
        }

    }

    function setMarker(people) {
        geocoder = new google.maps.Geocoder();
        infowindow = new google.maps.InfoWindow();
        if ((people["LatitudeLongitude"] == null) || (people["LatitudeLongitude"] == 'null') || (people["LatitudeLongitude"] == '')) {
            geocoder.geocode({ 'address': people["Address"] }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    latlng = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
                    marker = new google.maps.Marker({
                        position: latlng,
                        map: map,
                        draggable: false,
                        html: people["DisplayText"],
                        icon: "images/marker/" + people["MarkerId"] + ".png"
                    });
                    //marker.setPosition(latlng);
                    //map.setCenter(latlng);
                    google.maps.event.addListener(marker, 'click', function(event) {
                        infowindow.setContent(this.html);
                        infowindow.setPosition(event.latLng);
                        infowindow.open(map, this);
                    });
                }
                else {
                    alert(people["DisplayText"] + " -- " + people["Address"] + ". This address couldn't be found");
                }
            });
        }
        else {
            var latlngStr = people["LatitudeLongitude"].split(",");
            var lat = parseFloat(latlngStr[0]);
            var lng = parseFloat(latlngStr[1]);
            latlng = new google.maps.LatLng(lat, lng);
            marker = new google.maps.Marker({
                position: latlng,
                map: map,
                draggable: false,               // cant drag it
                html: people["DisplayText"]    // Content display on marker click
                //icon: "images/marker.png"       // Give ur own image
            });
            //marker.setPosition(latlng);
            //map.setCenter(latlng);
            google.maps.event.addListener(marker, 'click', function(event) {
                infowindow.setContent(this.html);
                infowindow.setPosition(event.latLng);
                infowindow.open(map, this);
            });
        }
    }
</script>

<?php
include '../includes/footer.php';
?>?>