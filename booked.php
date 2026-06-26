<?php include 'includes/header.php'; ?>

    <!--  ClickCease.com Conversion tracking-->
    <script type="text/javascript">
    ccConVal = 0;
    var script = document.createElement("script");
    script.async = true;
    script.type = "text/javascript";
    var target = 'https://www.clickcease.com/monitor/cccontrack.js';
    script.src = target; var elem = document.head; elem.appendChild(script);
    </script>
    <noscript>
    <a href="https://www.clickcease.com" rel="nofollow"><img src="https://monitor.clickcease.com/conversions/conversions.aspx?value=0" alt="ClickCease"/></a>
    </noscript>
    <!--  ClickCease.com Conversion tracking-->

    <!-- Event snippet for Book appointment conversion page -->
    <script>
        gtag('event', 'conversion', {'send_to': 'AW-859841349/5ZLYCILQxvkCEMXGgJoD'});
    </script>
    
    <style>
        .nav, .navbar {
            display: block !important;
        }

        .thankyou-small-text {
            font-family: "Open Sans", sans-serif;
            font-size: 22px !important;
            line-height: auto !important;
            font-weight: 600 !important;
            color: #ffc600 !important;
            margin-bottom: 18px;
            text-transform: none !important;
        }
        @media (max-width: 480px){
            .banner .banner_text .cont p {
                font-size: 15px !important;
                margin-bottom: 0;
            }
            .banner > img {
                height: 325px;
            }

            .thankyou-small-text {
                font-size: 17px !important;
            }
        }
    </style>

    <section class="banner inner_banner">
        <?php include './banner-image.php' ?>
        <div class="banner_text">
            <div class="wrapper">
                <div class="cont" style="max-width: 700px;">
                    <h1>Thank You <?php if(isset($_GET['name'])){echo $_GET['name'] . '!' ;}; ?></h1>
                    <h5 class="thankyou-small-text">Thanks for booking your service with us. We will get back to you <strong>ASAP</strong>. For immediate or emergency assitance please click on the Call button below</h5>
                    <ul class="btn_list">
                        <li>
                            <a href="tel:<?= $printableNumber ?>" class="btn2">
                            <img loading="lazy" src="images/phone-.svg" alt="" loading="lazy" style="width: 26px; display: inline-block !important;">
                            <span class="respo">Call:</span><?= $printableNumber ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>