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
            top: 103px !important;
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
<section class="banner inner_banner">

    <?php // include './banner-image.php' ?>
    <!-- <img src="/images/about-us-banner.jpg" srcset="/images/residential-banner-clear-garage-door.webp 600w,/images/residential-banner-clear-garage-door.webp 980w,/images/about-us-banner.webp" alt="" loading="lazy"> -->
    <img loading="lazy" src="/images/about-us-banner.jpg" srcset="/images/residential-banner-480.webp 480w, /images/residential-banner-768.webp 768w, /images/residential-banner-980.webp 980w, /images/about-us-banner.jpg" alt="">
    
    <div class="banner_text">
        <div class="wrapper">
            <div class="cont">
                <h1>GARAGE DOORS EXPERT</h1>
                <text class="punchline-text"><?php echo $city_name . ",";  ?> <?php echo $state_name  ?> Top Rated Company</text>
                <ul class="btn_list">
                    <li>
                        <a href="#" class="btn1" onclick="show_workiz()">BOOK AN APPOINTMENT</a>
                    </li>
                    <li>
                        <a href="#" class="btn2">
                            <img loading="lazy" src="/images/phone-.svg" alt="" loading="lazy" style="width: 26px;display: inline-block;">
                            <span class="respo">Call: </span><?= $printableNumber ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</section>

<!-- <section class="blog_banner">

<div class="banner_text">

    <h2>GARAGE DOORS BLOG</h2>

    <p>Our lineup of Storage, Gear, and Outdoor Tools and Storage can meet all your work demands.

        Customize

        the right solution for your needs with stackable ToughSystem® Storage and more.</p>

</div>

<div class="banner_post">

    <div class="post">

        <h4>Accessories</h4>

        <p>FIND THE GARAGE DOOR ACCESSORIES YOU NEED</p>

        <a href="/accessories.php">Read Article</a>

    </div>

    <div class="post">

        <h4>RESIDENTIAL GARAGE DOOR SERVICES</h4>

        <p>When you have a residential garage door installed or repaired at your home, you want it to not only properly function, but you also want to ensure that it is going to last a reasonable amount of time.</p>

        <a href="/resedential-garage-doors.php">Read Article</a>

    </div>

    <div class="post">

        <h4>GET A QUALITY GARAGE DOOR OPENER FOR YOUR <?php // echo $city_name; ?>-AREA HOME</h4>

        <p> Remember the old days when during a blizzard or rainstorm, you’d arrive home and have to get out of your car to open your garage door?</p>

        <a href="/automatic-openers.php">Read Article</a>

    </div>

</div>

</section> -->
