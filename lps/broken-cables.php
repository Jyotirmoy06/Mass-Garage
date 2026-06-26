<?php
$folder_Depth=1;
$meta_Title = 'Broken Garage Cable? We Can Get Them Stable';
$meta_Description = 'Right out of the gate, the top service engineers at Mass Garage Doors Experts will shoot from the hip and say that it is usually a better bet to call in professional help. A garage door cable supports a massive amount of weight, and one misaligned breach of tension could cause a chain reaction. Please consider the following before attempting this on your own.';
$meta_ogTitle = 'Broken Garage Cable?';
$meta_url='https://massgaragedoorsexpert.com/broken-cables';
$title = 'Broken Garage Cable';
$pageTitle = "lpsPage";
?>
<?php
session_start();
include '../includes/header.php';

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
            top: 132px !important;
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

        <img src="/images/about-us-banner.jpg" srcset="/images/residential-banner-clear-garage-door.webp 600w,/images/residential-banner-clear-garage-door.webp 980w,/images/about-us-banner.webp" alt="" loading="lazy">

        <div class="banner_text">

            <div class="wrapper">

                <div class="cont">
                    <h1><?php echo $title ?></h1>

                    <text class="punchline-text"><?php echo $city_name . ",";  ?> <?php echo $state_name  ?> Top Rated Company</text>

                    <ul class="btn_list">

                        <li><button onclick="show_workiz()" role="button" id="book_an_appointment" class="btn1">BOOK AN APPOINTMENT</button></li>

                        <li><a href="tel:<?=$printableNumber?>" class="btn2">

                                <img loading="lazy" src="/images/phone-.svg" alt="" style="width: 26px;display: inline-block;">

                                <span class="respo">Call: </span><?=$printableNumber?></a>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </section>

    <h2 class="headstrip">Why choose Mass Garage Doors Expert?</h2>

    <?php 
        include './includes/services/testimonials.php';
        include './includes/services/residential/res-cable-replacement.php' ;
        include './includes/services/residential/res-unsung-lifeline.php';
        include './includes/services/residential/res-surrounding-areas-map.php';
        include './includes/services/residential/res-door-woes.php';
        include './includes/services/residential/res-doors-repair.php' ;
        include './includes/services/residential/res-silent-threat.php';
        $image_position = 'right';
        include './includes/services/residential/res-doors-spring.php' ;
        include './includes/services/residential/res-manual-magic.php';
        include './includes/services/residential/res-doors-opener.php' ;
        include './includes/reach-out-to-us.php' ;

    ?>

    <script src="../js/carousel.js"></script>

    <script src="../js/carousel2.js"></script>
<?php
include '../includes/footer.php';
?>