<?php include 'includes/header.php' ?>
<style>
    @media only screen and (max-device-width: 600px) {
        
        .banner .banner_text {
            top: 112px !important;
            /* margin-top: -23%; */
        }

        .banner.inner_banner > img {
            height: 460px !important;
        }

        /* .banner_text .cont {
            height: 350px !important;
        } */
    }
</style>

<section class="banner inner_banner">

<img src="/images/about-us-banner.jpg" srcset="/images/residential-banner-clear-garage-door.webp 600w,/images/residential-banner-clear-garage-door.webp 980w,/images/about-us-banner.webp" alt="" loading="lazy">
<!-- <img src="images/about-us-banner.jpg" alt=""> -->

<div class="banner_text">

    <div class="wrapper">

        <div class="cont">

            <h1>GARAGE DOORS EXPERT</h1>

            <h5> <?php echo $city_name ?>,  <?php echo $state_name  ?> Top Rated Company</h5>

            <ul class="btn_list">

                <li><a href="#" class="btn1">BOOK AN APPOINTMENT</a></li>

                <li><a href="#" class="btn2">

                        <img src="images/phone-.svg" alt="" style="width: 26px;display: inline-block;">

                        <span class="respo">Call: </span><?=$printableNumber?></a>

                </li>

            </ul>

        </div>

    </div>

</div>

</section>

<h2 class="headstrip">MASS GARAGE DOORS EXPERT CERTIFICATE</h2>

<section class="certificate_row">

<div class="wrapper">

    <!-- -->

    <div class="section owl-carousel owl-theme cetificateSlider">

        <div class="item">

            <a href="certificates/Better-Bureau-Business.jpg" target="_blank" class="ext_link">View Full Size <img

                    src="images/external-link.svg" alt=""></a>

            <a href="certificates/Better-Bureau-Business.jpg" data-lightbox="example-set"><img

                    src="certificates/Better-Bureau-Business.jpg" alt=""></a>

        </div>

        <div class="item">

            <a href="certificates/HICCard-img-11082023.jpg" target="_blank" class="ext_link">View Full Size <img

                src="images/external-link.svg" alt=""></a>

            <a href="certificates/HICCard-img-11082023.jpg" data-lightbox="example-set"><img

                    src="certificates/HICCard-img-11082023.jpg" alt=""></a>

        </div>

        <div class="item">

            <a href="certificates/RI-Pocket-Card.jpg" target="_blank" class="ext_link">View Full Size <img

                src="images/external-link.svg" alt=""></a>

            <a href="certificates/RI-Pocket-Card.jpg" data-lightbox="example-set"><img

                    src="certificates/RI-Pocket-Card.jpg" alt=""></a>

        </div>

        <div class="item">

            <a href="certificates/Business-Liability-Insurance-img.jpg" target="_blank" class="ext_link">View Full Size <img

                src="images/external-link.svg" alt=""></a>

            <a href="certificates/Business-Liability-Insurance-img.jpg" data-lightbox="example-set"><img

                    src="certificates/Business-Liability-Insurance-img.jpg" alt=""></a>

        </div>

    </div>

</div>

</section>

<?php include 'includes/footer.php' ?>