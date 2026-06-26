<?php

$meta_Title = 'Garage Door Installation Around Plymouth County, MA';

$meta_Description = 'Are you interested in garage door installation services in Plymouth County, MA? Pick up the phone and call Mass Garage Doors Expert. We’re ready to help!';

$meta_url = 'https://massgaragedoorsexpert.com/plymouth-county';

$meta_ogTitle = 'Plymouth County';
$pageType="locationPage";

include './includes/header.php'; 

?>
<link rel="stylesheet" href="./css/locations.style.css">
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
            top: 122px !important;
        }
        .banner.inner_banner > img {
            height: 475px !important;
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



    @media (min-width: 991px){
        #firstSection .white_section, #secondSection .white_section, #thirdSection{
            height: auto;
            padding-top: 0;
        }
        .split_row .cont {
            padding: 1vw;
        }
        .bd_fix {
            padding: 25px 0;
        }
        .cont .text-white-center a {
            text-decoration: underline;
        }
        .cont .text-white-center a:hover {
            text-decoration: none;
            color: #ffc600;
        }
    }
</style>

<section class="banner inner_banner">
    <?php // include './banner-image.php' ?>
    <img src="/images/about-us-banner.jpg" srcset="/images/residential-banner-clear-garage-door.webp 600w,/images/residential-banner-clear-garage-door.webp 980w,/images/about-us-banner.webp" alt="" loading="lazy">

    <div class="banner_text">
        <div class="wrapper">
            <div class="cont">
                <h1>GARAGE DOOR REPAIR IN PLYMOUTH COUNTY, MA</h1>
                <text class="punchline-text">Plymouth County, MASSACHUSETTS Top Rated Company</text>
                <ul class="btn_list">
                    <li><a href="#" class="btn1" onclick="show_workiz()">BOOK AN APPOINTMENT</a></li>
                    <li><a href="#" class="btn2">
                        <img loading="lazy" src="/images/phone-.svg" alt="" style="width: 26px;display: inline-block;">
                        <span class="respo">Call: </span><?= $printableNumber ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<h2 class="headstrip">24/7 Emergency Garage Door Services.</h2>


<section class="black_dividers dividers d-inherit bd_fix">

    <div class="wrapper">
        <h3 style="margin: 10px 70px;">NEED TO KNOW IF WE SERVE YOUR NEIGHBORHOOD OR CITY? CHECK OUT OUR SERVICE
            AREAS BELOW.</h3>
        <hr style="background: white; height: 2px; width: 100%; margin-top: 20px; margin-bottom: 20px;">
        <div class="flex_container">
            <div class="split_row">

                <div class="cont" style="font-size: 15px;">
                    <p class="text-white-center"><a href="/locations/plymouth/hull/">Hull</a></p>
                    <p class="text-white-center"><a href="/locations/plymouth/hingham/">Hingham</p>
                    <p class="text-white-center"><a href="/locations/plymouth/accord/">Accord</p>
                    <p class="text-white-center"><a href="/locations/plymouth/abington/">Abington</p>
                </div> 
                <div class="cont" style="font-size: 15px;">
                    <p class="text-white-center"><a href="/locations/plymouth/brockton/">Brockton</p>
                    <p class="text-white-center"><a href="/locations/plymouth/rockland/">Rockland</p>
                    <p class="text-white-center"><a href="/locations/plymouth/north-scituate/">North Scituate</p>
                    <p class="text-white-center"><a href="/locations/plymouth/whitman/">Whitman</p>
                </div>    
                <div class="cont" style="font-size: 15px;">    
                    <p class="text-white-center"><a href="/locations/plymouth/minot/">Minot</a></p>
                    <p class="text-white-center"><a href="/locations/plymouth/scituate/">Scituate</a></p>
                    <p class="text-white-center"><a href="/locations/plymouth/norwell/">Norwell</a></p>
                    <p class="text-white-center"><a href="/locations/plymouth/hanover/">Hanover</a></p>
                    <p class="text-white-center"><a href="/locations/plymouth/west-bridgewater/">West Bridgewater</a></p>
                </div>
                <div class="cont" style="font-size: 15px;">
                    <p class="text-white-center"><a href="/locations/plymouth/greenbush/">Greenbush</a></p>
                    <p class="text-white-center"><a href="/locations/plymouth/east-bridgewater/">East Bridgewater</p>
                    <p class="text-white-center"><a href="/locations/plymouth/north-marshfirld/">North Marshfield</p>
                    <p class="text-white-center"><a href="/locations/plymouth/hanson/">Hanson</p>
                    <p class="text-white-center"><a href="/locations/plymouth/elmwood/">Elmwood</p>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="split_row service_split_row" id="firstSection">
    <div class="cont service_cont white_section">
        <p style="margin-bottom: 20px;">
            When it comes to needing garage repair or installation services in PLYMOUTH County, you should know that
            your trusted neighbors at Mass Garage Doors are here to help. Check out the services we offer in PLYMOUTH
            County below, as well as the areas our garage door team services!
        </p>
        <p>
            Named after a county in England, which sports the literal meaning of “northern folk”, PLYMOUTH County has
            that old world look with a new world feel. With a beautiful view of Boston from the harbor, it’s no wonder
            that families and young singles alike have settled into in this beautiful place. With extravagant homes and
            picturesque sites, who wouldn’t want to call this place their home?
        </p>
    </div>
    <div class="service_cont_img fade">
        <iframe loading="lazy" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1518790.7428098018!2d-70.701442!3d41.970475!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e40ebf71379281%3A0x4d5fdc05eff9ea58!2sPlymouth%20County%2C%20MA!5e0!3m2!1sen!2sus!4v1640886001634!5m2!1sen!2sus" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen=""></iframe>
    </div>
</section>

<section class="black_dividers dividers">
    <div class="wrapper">
        <h3>PLYMOUTH COUNTY MA GARAGE DOORS</h3>
        <p>
            Let’s be honest, not a single person misses the days when you had to get out of your car when you arrived
            home so that you could manually open your garage door. If this is something that you are still doing, it’s
            time to upgrade. Mass Garage Doors can provide you with belt drive garage door openers, chain drive garage
            door openers, and screw drive garage door openers. The choice is up to you! We’re just here to make your
            vision into a reality.
        </p>
    </div>
</section>

<section class="split_row service_split_row">
    <div>
        <div class="service_cont_img fade">
            <div class="numbertext"></div>
            <img src="./images/plymouth-county-service-area.webp" alt="" loading="lazy">
        </div>
    </div>
    <div class="cont service_cont white_section" id="thirdSection">
        <h3>PLYMOUTH COUNTY MA BROKEN SPRING REPLACEMENT</h3>
        <p>
            When a spring in your garage door breaks, it’s a huge inconvenience which means that you are going to
            need
            to have it fixed as soon as possible. We will provide you with a free consultation and a repair quickly
            and efficiently so that you don’t have to worry about going without a garage for more than a couple of
            days.
            Trust us, you don’t realize how much you rely on your garage door to work until it is out of order.
        </p>
    </div>
</section>

<section class="black_dividers dividers">
    <div class="wrapper">
        <h3>PLYMOUTH COUNTY MA GARAGE CABLES, PULLEYS, ROLLERS, WEATHER STRIPS, BOTTOM RUBBERS</h3>
        <p>
            While it may not seem like rocket science, there are many components that go into putting together a working
            garage door system. If one of the many parts needed to ensure your door works correctly needs to be replaced,
            you might think it would be quite the headache. However, when you involve the expert team at Mass Garage Doors,
            you won’t have to worry about a thing!
        </p>
    </div>
</section>

<section class="split_row service_split_row" id="secondSection">
    <div class="cont service_cont white_section">
        <h3>PLYMOUTH COUNTY MA GARAGE ACCESSORIES</h3>
        <p>
            We have all of the remote controls, key pads and surge protectors you need for your garage door!
            Don’t buy accessories from expensive third-party entities. Instead, purchase them from your trust
            garage door company to save on money and time!
        </p>
    </div>
    <div class="service_cont_img fade">
        <iframe width="100%" height="100%" loading="lazy" src="https://www.youtube.com/embed/LMbMW_6CYOo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</section>

<section class="dividers black_dividers" style="height: 100%;">
    <div class="wrapper">
        <a name="residential"></a>
        <h3>Reach Out to Us</h3>
        <p>Our friendly and trustworthy technicians are available whenever you need them. We serve clients in the Greater Boston, area as well as the counties of Suffolk, Middlesex, Norfolk, and Essex, MA. We would also appreciate any feedback from our valued clients. If you have any questions about our services or rates, feel free to get in touch with us. We always look forward to hearing from you!</p>
        <button onclick="show_workiz()" role="button" id="book_an_appointment" class="btn1">BOOK AN APPOINTMENT</button>
    </div>
</section>

<?php include './includes/footer.php' ?>