<?php include './includes/header.php' ?>
<style>
    .default {
        background-color: black;
    }
    body {background-color: black}
    /* .iframe-column {
        width: 1078px;
        margin-left: 22%;
        margin: 22% 0 0 22%;
        text-align: center;
        vertical-align: middle;
        padding-top: 10%;
        padding-bottom: 5%;
    }

    .iframe-top-adjust {
        margin-top: 28%;
    } */

    .iframe-column iframe {
        width: 100%;
        height: 900px; 
        background-color: black;
    }
    @media only screen and (min-device-width: 768px) {
        .iframe-column iframe {
            width: 75%;
            height: 900px;
            padding-top: 5%;
            padding-bottom: 5%;
            /* background-color: black; */
            display: block;
            margin: auto;
        }
    }

    @media only screen and (min-device-width: 1600px) {
        .iframe-column iframe {
            height: 1066px;
        }
    }
</style>
<section class="banner inner_banner">
    <?php include './banner-image.php' ?>
    <div class="banner_text">

        <div class="wrapper">

            <div class="cont">

                <h2>GARAGE DOORS EXPERT</h2>

                <h5><?php echo $city_name . ",";  ?> <?php echo $state_name  ?> Top Rated Company</h5>

                <ul class="btn_list">

                    <li><a href="#" class="btn1" onclick="show_workiz()">BOOK AN APPOINTMENT</a></li>

                    <li><a href="#" class="btn2">

                            <img loading="lazy" src="images/phone-.svg" alt="" style="width: 26px;display: inline-block;">

                            <span class="respo">Call: </span><?= $printableNumber ?></a>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</section>

<h1 class="headstrip">GARAGE DOOR DESIGN SERVICES IN MASSACHUSETTS</h1>
<div style="height: 100%;" style="background-color: black;">

    <div class="row iframe-top-adjust">
        <!-- <div class="col-md-2"></div> -->
        <div class="col-md-8 iframe-column">
            <iframe allowtransparency="true" id="amarr" src="https://feedback.wayne-dalton.com/Default.aspx" style="" frameborder="0"></iframe>
        </div>
        <!-- <div class="col-md-2"></div> -->
    </div>

    <!-- <iframe allowtransparency="true" id="amarr" src="https://feedback.wayne-dalton.com/Default.aspx" style="width: 100%;height: 900px; background-color: black;" frameborder="0"></iframe> -->

</div>

<?php include './includes/footer.php' ?>
