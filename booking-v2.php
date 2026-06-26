<?php
$meta_Title = 'Garage Door Repair in Massachusetts';
$meta_Description = 'Mass Garage Doors Expert is the team to call for your garage door repair in Massachusetts. We have locations across the state to help with your situation!';
$meta_url = 'https://massgaragedoorsexpert.com/';
$meta_ogTitle = 'Booking';
?>
<?php
session_start();
// include 'connection.php';
include 'includes/header.php';
?>
<style>
    .d-none {
        display: none !important;
    }
    .d-block {
        display: block !important;
    }
    #bannerReadMoreLessBtn {
        color: #ffc600;
        padding: 2px;
        border-radius: 3px;
        font-weight: bold;
    }
    .banner .banner_text .cont text {
        font-family: "Open Sans", sans-serif;
        font-size: 22px;
        line-height: auto;
        font-weight: bolder;
        color: #ffc600;
        margin-bottom: 18px;
        text-transform: uppercase;
        display: inline-block;
    }
    .about_row1 {
        margin-top: -50px;
    }

    .vdpRow .selected {
        border: none !important;
    }

    @media only screen and (max-device-width: 600px) {
        .dskt_view {
            display: none !important;
        }
        .mob_view {
            display: inline-block !important;
        }
        .banner .banner_text {
            top: 130px;
        }

        .banner .item > img {
            height: 460px;
        }

        .banner .banner_text .cont text {
            font-size: 15px;
            margin-bottom: 10px !important;
        }

        .about_row1 {
            margin-top: -50px;
            margin-bottom: -40px;
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

<section class="about_row1" style="background-color: black;"> 


    <iframe src="https://api.leadconnectorhq.com/widget/booking/xUe948oH3tcAdOonkvOu" style="width: 100%;border:none;overflow: hidden;" scrolling="no" id="VvBwmW3K0GxB465TKO1Y_1720118838502"></iframe>
    <br>
    <script src="https://link.msgsndr.com/js/form_embed.js" type="text/javascript"></script>
</section>



<?php include 'includes/footer.php' ?>
