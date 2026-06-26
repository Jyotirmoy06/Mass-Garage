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

    .footer_youtube_video {
        height: auto !important;
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

<h2 class="headstrip"> Why choose Mass Garage Doors Expert? </h2>
<?php 
    include './includes/services/testimonials.php';
    include './includes/services/residential/res-doors-repair.php' ;
    include './includes/services/residential/res-door-woes.php';
    include './includes/services/residential/res-surrounding-areas-map.php';
    include './includes/services/residential/res-silent-threat.php';
    include './includes/services/residential/res-doors-spring.php' ;
    include './includes/services/residential/res-unsung-lifeline.php';
    $image_position = 'right';
    include './includes/services/residential/res-cable-replacement.php' ;
    include './includes/services/residential/res-manual-magic.php';
    include './includes/services/residential/res-doors-opener.php' ;
    include './includes/reach-out-to-us.php' ;

?>

<script src="../js/carousel.js"></script>

<script src="../js/carousel2.js"></script>


<?php
include '../includes/footer.php';
?>?>