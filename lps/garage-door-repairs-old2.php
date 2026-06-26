<?php
$folder_Depth = 1;
$meta_Title = 'Garage Door Repair';
$meta_Description = 'Mass Garage Doors Expert Broken Springs. Are you looking for the foremost garage door experts serving Massachusetts. Click the link above or call us by phone today!';
$meta_url = 'https://massgaragedoorsexpert.com/broken-springs';
$meta_ogTitle = 'Broken Springs';
$title = 'Garage Door Repair';
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

                <h5><?php echo $city_name . ",";  ?> <?php echo $state_name  ?> Top Rated Company</h5>

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

        <h3>HIGHLY RATED GARAGE DOOR SPECIALIST</h3>
        <p>
            Why choose us? As your experienced garage door maintenance technicians choice, we understand the importance you place on receiving a superior service for whatever your garage door repairs or replacement entails. From remotes and rails to entire packages installed, we strive to achieve 100 percent satisfaction from you, our valued Boston and area client. With our quick response time and same day or emergency service, our licensed, bonded and insured technician will be sure to complete the job along with any related components the first time, everytime.
        </p>
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

    <div class="cont service_cont white_section">

        <h3>MORE THAN GARAGE DOORS</h3>

        <p>
            With over a decade of experience, Mass Garage Door Experts are qualified industry professionals who are skilled and proficient in every aspect of repair service. A garage door is reliant on a finely calibrated series of parts that must function together. That is why we partner with only top notch industry parts providers with brand names you can also rely on.  You’ve come to expect the best and at GDE, the best is what we expect you to receive. Day or night, holiday and emergency services included.
        </p>    
        <br/>
        <li style="list-style: disc; margin-left:2em;  font-size: 15px; line-height: 23px;color:#494949;">Cables</li>
        <li style="list-style: disc; margin-left:2em;font-size: 15px; line-height: 23px;color:#494949;">Springs</li>
        <li style="list-style: disc; margin-left:2em;font-size: 15px; line-height: 23px;color:#494949;">Tracking</li>
        <li style="list-style: disc; margin-left:2em;font-size: 15px; line-height: 23px;color:#494949;">Auto Openers/lock</li>
        <li style="list-style: disc; margin-left:2em;font-size: 15px; line-height: 23px;color:#494949;">Sensors</li>

        

    </div>
    <!-- carousel-->
    <div>

        <!-- Full-width /images with number and caption text -->
        <div class="service_cont_img fade">
            <div class="numbertext"></div>
            <img src="/images/garage-door-repair.webp" style="width:100%" loading="lazy">

        </div>

        <!-- Next and previous buttons -->

    </div>
    <br>


</section>

<section class="black_dividers dividers">

    <div class="wrapper">

        <h3></h3>

        <p>
            Why risk losing your initial investment by starting from scratch with a lower grade new purchase due to affordability and economic-related confines when a top-of-the-line repair will get your garage door system back in brand new alignment?
            <br>

        </p>
    </div>

</section>

<section class="split_row service_split_row">

    <!-- carousel-->
    <div>

        <!-- Full-width /images with number and caption text -->
        <div class="service_cont_img">
            <div class="numbertext"></div>
            <img src="/images/garage-door-repair.webp" loading="lazy">

        </div>
        <!-- Next and previous buttons -->

    </div>

    <div class="cont service_cont white_section">

        <h3>REPAIR, REPLACE, or RENEW</h3>

        
            <li style="list-style: disc; margin-left:2em;  font-size: 15px; line-height: 23px; color:#494949;">Broken remotes</li>
            <li style="list-style: disc; margin-left:2em;font-size: 15px; line-height: 23px; color:#494949;">Springs</li>
            <li style="list-style: disc; margin-left:2em;font-size: 15px; line-height: 23px; color:#494949;">Rails.</li>
            <li style="list-style: disc; margin-left:2em;font-size: 15px; line-height: 23px; color:#494949;">Cables</li>
            <li style="list-style: disc; margin-left:2em;font-size: 15px; line-height: 23px; color:#494949;">Panels</li>
            <li style="list-style: disc; margin-left:2em;font-size: 15px; line-height: 23px; color:#494949;">Rollers</li>
            <li style="list-style: disc; margin-left:2em;font-size: 15px; line-height: 23px; color:#494949;">Remote eye sensors</li>
            <li style="list-style: disc; margin-left:2em;font-size: 15px; line-height: 23px; color:#494949;">Weather stripping</li>   
        <br/>
        <p>
            No matter what season, we are prepared to handle virtually all garage door repairs, replacements or install a brand new style for you. Upgrades to SMART, BLUTOOTH and web based apps or something as simple as a tuneup to clean, inspect or supply an estimate for your upcoming garage remote unit setup project, our commitment to quality, affordability, and overall detail to workmanship is evident with our attention given to every aspect of our service which begins with your initial contact with us to our on site evaluation and quoted work order. Only once you approve will we begin your service and will not deviate from it without contacting you first.
        </p>

    </div>

</section>
<!--
<section class="split_row">

    <div class="cont">

        <h3>SOMERVILLE “A simple door will floor you”</h3>

        <p>By far, the most talked about transformation around town and a hobbyist’s delight, this retrograde uplift on a double occupancy multi family duplex turned an old storage shed into a space saver delight with an easy up-down roll top weather tough vinyl. </p>

    </div>

    <div class="slideshow-container">

        <!-- Full-width /images with number and caption text
        <div class="mySlides3 fade">
            <div class="numbertext"></div>
            <img src="/images/sommerville_garage.jpg" style="width:100%">

        </div>

        <div class="mySlides3 fade">
            <div class="numbertext"></div>
            <img src="/images/sommerville_garage_1.jpg" style="width:100%">

        </div>

        <div class="mySlides3 fade">
            <div class="numbertext"></div>
            <img src="/images/sommerville_garage_2.jpg" style="width:100%">

        </div>

        <div class="mySlides3 fade">
            <div class="numbertext"></div>
            <img src="/images/sommerville_garage_3.jpg" style="width:100%; height:500px; object-fit:contain;">

        </div>

        <!-- Next and previous buttons
        <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
        <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
    </div>
    </div>
</section>
<section class="black_dividers yellow_bg">

    <div class="wrapper">

        <p> With high gloss appeal and secure locking features, the entry way was leveled from floor up and included a realignment of the roof top gutter drains, some general landscaping cleaning around the area and a good outer scrubbing in the concrete caulking and VOILA! This overhaul was calling out for customized creativity and delivered A+ results. The “good bones” of the stones still allows for a Mediterranean feel in style and will be a solid anchor for this garage shed for ages to come. <br><br>

        </p>

    </div>

</section>
<section class="split_row">

    <!-- carousel
    <div class="slideshow-container">

        <!-- Full-width /images with number and caption text
        <div class="mySlides4 fade">
            <div class="numbertext"></div>
            <img src="/images/west_garage.jpg" style="width:100%">

        </div>

        <div class="mySlides4 fade">
            <div class="numbertext"></div>
            <img src="/images/west_garage_1.jpg" style="width:100%; height:500px; object-fit:contain;">

        </div>

        <div class="mySlides4 fade">
            <div class="numbertext"></div>
            <img src="/images/west_garage_2.jpg" style="width:100%">

        </div>

        <div class="mySlides4 fade">
            <div class="numbertext"></div>
            <img src="/images/west_garage_3.jpg" style="width:100%; height:500px; object-fit:contain;">

        </div>
        <div class="mySlides4 fade">
            <div class="numbertext"></div>
            <img src="images/west_garage_4.jpg" style="width:100%">

        </div>
        <!-- Next and previous buttons
        <a class="prev" onclick="plusSlides(-1, 1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1, 1)">&#10095;</a>
    </div>

    <div class="cont">

        <h3>WEST ROXBURY “Focal points with secure access”</h3>

        <p>While drawing attention to the front sun porch, this boxed entry overhaul frames the hidden value of this gem and adds affordable curb appeal with a clean bright safe way into the attached home. Superb accessibility for all weather outdoor enthusiast, everyday wear, and tear or even that extra drift protection for snowplows and throwers. An easy blend into existing siding makes this simple over tracked auto up/down choice an excellent platform to consider adding on a matching designed inner cabinet and work tool storage system renewal. The limitations and design possibilities and extensions are endless with this backdrop.</p>

    </div>

</section>
        -->

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

<script src="../js/carousel.js"></script>

<script src="../js/carousel2.js"></script>
<?php
include '../includes/footer.php';
?>?>