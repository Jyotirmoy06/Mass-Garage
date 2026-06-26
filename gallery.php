<?php

$meta_Title = 'Garage Door Gallery';
$meta_Description = 'Mass Garage Doors Expert Photo Gallery. Are you looking for the foremost garage door experts serving Massachusetts. Click the link above or call us by phone today!';
$meta_url = 'https://massgaragedoorsexpert.com/gallery';
$meta_ogTitle = 'Gallery';
?>
<?php
session_start();
include 'includes/header.php';
?>

<style>
   
    .d-none {
        display: none !important;
    }
    .d-block {
        display: block !important;
    }

    .prev, .next {
        color: black;
        background: #ffc600;
    }

    .prev:hover, .next:hover {
        color: #ffc600;
        background: black;
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

</style>

<section class="banner inner_banner">

    <?php // include './banner-image.php' ?>

    <img src="/images/about-us-banner.jpg" srcset="/images/residential-banner-clear-garage-door.webp 600w,/images/residential-banner-clear-garage-door.webp 980w,/images/about-us-banner.webp" alt="" loading="lazy">

    <div class="banner_text">

        <div class="wrapper">

            <div class="cont">

                <h1>Work Gallery</h1>

                <text class="punchline-text"><?php echo $city_name . ",";  ?> <?php echo $state_name  ?> Top Rated Company</text>

                <ul class="btn_list">

                    <li><button onclick="show_workiz()" role="button" id="book_an_appointment" class="btn1">BOOK AN APPOINTMENT</button></li>

                    <li><a href="tel:<?= $printableNumber ?>" class="btn2">

                            <img loading="lazy" src="images/phone-.svg" alt="" style="width: 26px;display: inline-block;">

                            <span class="respo">Call: </span><?= $printableNumber ?></a>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</section>

<h2 class="headstrip">Work Gallery</h2>

<section class="black_dividers">

    <div class="wrapper">

        <h3>A TEAM OF SKILLED GARAGE DOOR TECHNICIANS AT YOUR SERVICE</h3>

        <p>Owned and operated by Ronen Sisso, Mass Garage Doors Expert has continuously been growing since

            we first started six years ago. With more than 10 years of experience in the industry, Ronen has

            been instrumental in building our reputation as a reliable garage door

            service provider.

            <br><br>

            Our eye for quality and perfection is what keeps our clients coming back and referring our

            services to their loved ones. As a result, we are now one of the leading garage door companies

            in and around the Boston area.

        </p>

    </div>

</section>

<section class="split_row">

    <div class="cont">

        <h3>LEXINGTON “Attention to Old World Detail”</h3>

        <p>For all appearances, it seems like this entire garage was given a royal treatment when in essence, this cinderblock double garage required a minimal amount of work to portray a maximum new overhaul. By updating the antiquated dark painted wooden doors with sturdy framework bolted securely with factory strong hardware, this double slide up carriage-style doors with dormer windows add life and light to both interior and exterior of this upper tracked remote system. The outer black accented powder coated spear strap hinges and weather resistant barn door handles speak volumes about the new charm of this beauty. Even on a misty New England morning, the stark contrast of the white double really makes the already well-maintained roof, trim, gutters and siding pop.</p>



    </div>
    <!-- carousel-->
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides1 fade">
            <div class="numbertext"></div>
            <img src="images/lexington_garage.webp" style="width:100%" alt="" loading="lazy">

        </div>

        <div class="mySlides1 fade">
            <div class="numbertext"></div>
            <img src="images/lexington_garage_1.webp" style="width:100%" alt="" loading="lazy">

        </div>

        <div class="mySlides1 fade">
            <div class="numbertext"></div>
            <img src="images/lexington_garage_2.webp" style="width:100%" alt="" loading="lazy">

        </div>

        <div class="mySlides1 fade">
            <div class="numbertext"></div>
            <img src="images/lexington_garage_3.webp" style="width:100%" alt="" loading="lazy">

        </div>
        <div class="mySlides1 fade">
            <div class="numbertext"></div>
            <img src="images/lexington_garage_4.webp" alt="" loading="lazy">

        </div>
        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides1(-1, 0)">&#10094;</a>
        <a class="next" onclick="plusSlides1(1, 0)">&#10095;</a>
    </div>
    <br>


</section>

<section class="black_dividers">

    <div class="wrapper">

        <h3>HIGHLY TRAINED GARAGE DOOR TECHNICIANS</h3>

        <p>Ronen takes great pride in personally training every technician at our company. This is the

            reason why all the members of our team share the same principles when it comes to the work we do

            best. <br><br>

            We always make sure to arrive on time and give you regular updates of what we are doing to your

            property. Our team will explain every step of the process, from the evaluation to helpful

            maintenance tips after your garage door is installed.

        </p>

    </div>

</section>

<section class="split_row">

    <!-- carousel-->
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides2 fade">
            <div class="numbertext"></div>
            <img src="images/chestnut_garage.webp" style="width:100%" alt="" loading="lazy">

        </div>

        <div class="mySlides2 fade">
            <div class="numbertext"></div>
            <img src="images/chestnut_garage_1.webp" style="width:100%" alt="" loading="lazy">

        </div>

        <div class="mySlides2 fade">
            <div class="numbertext"></div>
            <img src="images/chestnut_garage_2.webp" style="width:100%" alt="" loading="lazy">

        </div>

        <div class="mySlides2 fade">
            <div class="numbertext"></div>
            <img src="images/chestnut_garage_3.webp" style="width:100%" alt="" loading="lazy">

        </div>
        <div class="mySlides2 fade">
            <div class="numbertext"></div>
            <img src="images/chestnut_garage_4.webp" style="width:100%" alt="" loading="lazy">

        </div>
        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides1(-1, 1)">&#10094;</a>
        <a class="next" onclick="plusSlides1(1, 1)">&#10095;</a>
    </div>

    <div class="cont">

        <h3>CHESTNUT HILL “Framed in open swing affability”</h3>

        <p>These double swing barn doors and framework encasement sill provide rustic charm and warmth on a crisp Autumn Day. </p>

    </div>

</section>

<section class="black_dividers">

    <div class="wrapper">

        <p>The color scheme along with a blended mixed media carry the hide all stain resistant deep brown barn paneling onto the solid concrete front façade to the offset of the dove blue/grey entrance door smoothly and without creating an off balance visual. Affording the interior with more storage and inner light will be an added boon in the winter months offering ease of access for shovels, tools, sports equipment or even lawn furniture. Also, easy to clean track free for spring clean ups and leaf/dust blower maintenance, <br><br>

        </p>

    </div>

</section>
<section class="split_row">

    <div class="cont">

        <h3>SOMERVILLE “A simple door will floor you”</h3>

        <p>By far, the most talked about transformation around town and a hobbyist’s delight, this retrograde uplift on a double occupancy multi family duplex turned an old storage shed into a space saver delight with an easy up-down roll top weather tough vinyl. </p>

    </div>

    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides3 fade">
            <div class="numbertext"></div>
            <img src="images/sommerville_garage.webp" style="width:100%" alt="" loading="lazy">

        </div>

        <div class="mySlides3 fade">
            <div class="numbertext"></div>
            <img src="images/sommerville_garage_1.webp" style="width:100%" alt="" loading="lazy">

        </div>

        <div class="mySlides3 fade">
            <div class="numbertext"></div>
            <img src="images/sommerville_garage_2.webp" style="width:100%" alt="" loading="lazy">

        </div>

        <div class="mySlides3 fade">
            <div class="numbertext"></div>
            <img src="images/sommerville_garage_3.webp" style="width:100%; height:500px; object-fit:contain;" alt="" loading="lazy">

        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
        <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
    </div>
    </div>
</section>
<section class="black_dividers ">

    <div class="wrapper">

        <p> With high gloss appeal and secure locking features, the entry way was leveled from floor up and included a realignment of the roof top gutter drains, some general landscaping cleaning around the area and a good outer scrubbing in the concrete caulking and VOILA! This overhaul was calling out for customized creativity and delivered A+ results. The “good bones” of the stones still allows for a Mediterranean feel in style and will be a solid anchor for this garage shed for ages to come. <br><br>

        </p>

    </div>

</section>
<section class="split_row">

    <!-- carousel-->
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides4 fade">
            <div class="numbertext"></div>
            <img src="images/west_garage.webp" style="width:100%" alt="" loading="lazy">

        </div>

        <div class="mySlides4 fade">
            <div class="numbertext"></div>
            <img src="images/west_garage_1.webp" style="width:100%; height:500px; object-fit:contain;" alt="" loading="lazy">

        </div>

        <div class="mySlides4 fade">
            <div class="numbertext"></div>
            <img src="images/west_garage_2.webp" style="width:100%" alt="" loading="lazy">

        </div>

        <div class="mySlides4 fade">
            <div class="numbertext"></div>
            <img src="images/west_garage_3.webp" style="width:100%; height:500px; object-fit:contain;" alt="" loading="lazy">

        </div>
        <div class="mySlides4 fade">
            <div class="numbertext"></div>
            <img src="images/west_garage_4.webp" style="width:100%" alt="" loading="lazy">

        </div>
        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1, 1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1, 1)">&#10095;</a>
    </div>

    <div class="cont">

        <h3>WEST ROXBURY “Focal points with secure access”</h3>

        <p>While drawing attention to the front sun porch, this boxed entry overhaul frames the hidden value of this gem and adds affordable curb appeal with a clean bright safe way into the attached home. Superb accessibility for all weather outdoor enthusiast, everyday wear, and tear or even that extra drift protection for snowplows and throwers. An easy blend into existing siding makes this simple over tracked auto up/down choice an excellent platform to consider adding on a matching designed inner cabinet and work tool storage system renewal. The limitations and design possibilities and extensions are endless with this backdrop.</p>

    </div>

</section>


<section class="black_dividers">

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

<script src="js/carousel.js"></script>

<script src="js/carousel2.js"></script>
<?php
include 'includes/footer.php';
?>