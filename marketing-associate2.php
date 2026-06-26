<?php
$meta_Title = 'Garage Door Repair in Massachusetts';
$meta_Description = 'Mass Garage Doors Expert is the team to call for your garage door repair in Massachusetts. We have locations across the state to help with your situation!';
$meta_url = 'https://massgaragedoorsexpert.com/';
$meta_ogTitle = 'Booking';
$pageTitle = "BookingPage";
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
    /* .about_row1 {
        margin-top: -50px;
        padding: 0 !important;
    } */

    .vdpRow .selected {
        border: none !important;
    }

    .booking-header-text {
        font-size: 42px; 
        line-height: 52px; 
        font-weight: normal; 
        color: #fff;
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
            /* margin-top: -23%; */
        }

        .banner .item > img {
            height: 460px;
        }

        .banner .banner_text .cont text {
            font-size: 15px;
            margin-bottom: 10px !important;
        }

        /* .about_row1 {
            margin-top: -50px;
            margin-bottom: -40px;
        } */

        .booking-header-text {
            font-size: 28px;
            line-height: 38px;
        }

        .booking-header {
            /* margin-top: 13%;
            margin-bottom: 3%; */
            margin-top: 0%;
            margin-bottom: -10%;
        }

        /* .booking-iframe-class {
            margin-bottom: 11% !important;
        } */

        /* .banner_text .cont {
            height: 350px !important;
        } */
    }

    @media only screen and (min-device-width: 600px) {
        .dskt_view {
            display: inline-block !important;
        }
        .mob_view {
            display: none !important;
        }

        .booking-header {
            color: white;
            margin-top: 20px;
            margin-bottom: -1%;
        }

    }

    /* @media only screen and (min-device-width: 768px) {
        .appointment_widgets-xl--revamp {
            margin-top: 0 !important;
        } 
        

    } */
    

    /* .appointment_widgets--revamp--steps.step-form { */
    .appointment_widgets--revamp--steps.custom-form { 
        max-height: 1800px !important;
        margin-top: 0!important;
    }

    .appointment_widgets-xl--revamp {
        padding-bottom: 0.25rem!important;
        padding-top: 0.25rem!important;
    }

</style>
   
<section class="about_row1" style="background-color: black;padding-top: 0px;">
    <div class="booking-header" style="text-align: center !important;">
        <h1 class="booking-header-text">Associate Applicant Form</h1>
    </div>  
</section>
<section class="about_row1" style="background-color: black;padding-top: 10px;">
    



    <iframe class="booking-iframe-class" src="https://api.leadconnectorhq.com/widget/form/Zpdma5ieH0XP6USbC5mX" style="width: 100%; border:none;overflow: scroll;" scrolling="no" id="<?=$iframeId?>"></iframe>
    <br>
    <script src="https://link.msgsndr.com/js/form_embed.js" type="text/javascript"></script>

        <!-- <iframe src="https://api.leadconnectorhq.com/widget/booking/i4G1A9xfO9TlBekyYKg0" style="width: 100%;border:none;overflow: hidden; margin-bottom: 50px;" scrolling="no" id="gpcBenlrxVi4V8j0sqaM_1731678599933"></iframe>
        <br>
        <script src="https://link.msgsndr.com/js/form_embed.js" type="text/javascript"></script> -->

        <!-- <iframe src="https://api.leadconnectorhq.com/widget/booking/VvBwmW3K0GxB465TKO1Y" style="width: 100%;border:none;overflow: hidden;" scrolling="no" id="gpcBenlrxVi4V8j0sqaM_1731436849198"></iframe>
        <br>
        <script src="https://link.msgsndr.com/js/form_embed.js" type="text/javascript"></script>

        <iframe src="https://api.leadconnectorhq.com/widget/booking/osUoWGa5Lk5yoL40RJaA" style="width: 100%;border:none;overflow: hidden;" scrolling="no" id="osUoWGa5Lk5yoL40RJaA_1731436979836"></iframe>
        <br>
        <script src="https://link.msgsndr.com/js/form_embed.js" type="text/javascript"></script> -->
    
</section>



<?php include 'includes/footer.php' ?>

<script type="text/javascript">
    // $(document).on('load', function() {
    //     $(".default").css("background-color", "black");
    //     console.log("hello world iframe1");
    // });

    // $( document ).ready(function() {
    //     setTimeout(function(){
    //         // Magic happens here
    //         $("#gpcBenlrxVi4V8j0sqaM_1731436849198").height("1800");
    //         $("#gpcBenlrxVi4V8j0sqaM_1731436849198").css("height","1800px !important");
    //         // $("iframe").addClass("hd");
    //         console.log("Script ran after 5 seconds");
    //     },5000); 
    // });
</script>