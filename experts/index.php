<?php include '../includes/header.php' ?>
<style>
    .default {
        background-color: #ededed;
    }
    body {background-color: #ededed;}

    .d-none {
        display: none !important;
    }
    .d-block {
        display: block !important;
    }

    .wrapper .cont p {
        line-height: 23px;
        all: unset;
    }

    .images {
        display: flex;
        flex-wrap: wrap;
        /* margin: 0 50px; */
        padding: 30px;
    }

    .photo {
        max-width: 33.333%;
        padding: 0 10px;
        height: 240px;
    }

    .photo img {
        width: 100%;
        height: 100%;
    }

    .li-pl-adjust{
        padding-left: 5px;
        padding-top: 15px;
        list-style: decimal;
    }

    .li-img {
        max-width: 600px;
        padding-top: 5px;
        border-radius: 8px;
    }

    .content_section .form_section {
       margin-bottom: 30px !important;
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
        .images {
            padding: 0;
        }

        .photo {
            padding: 0;
            max-width: fit-content;
        }

        .photo img{
            padding-top: 10px;
        }

        .li-img {
            max-width: 100%;
        }

        .li-pl-adjust {
            margin-left: 5%;
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
        background-color: #ededed;
    }
    @media only screen and (min-device-width: 768px) {
        /* .iframe-column iframe {
             width: 75%;
            height: 900px;
            padding-top: 5%;
            padding-bottom: 5%; */
            /* background-color: black; */
            /* display: block;
            margin: auto; 
        } */

        .iframe-column iframe {
            margin-top: 30px;
            float: left;
            margin-left: -4.5%;
        }
    }

    @media only screen and (min-device-width: 1600px) {
        /* .iframe-column iframe {
            height: 1066px;
        } */
    }
</style>
<section class="banner inner_banner">
    <?php // include './banner-image.php' ?>

    <img src="/images/about-us-banner.jpg" srcset="/images/residential-banner-clear-garage-door.webp 600w,/images/residential-banner-clear-garage-door.webp 980w,/images/about-us-banner.webp" alt="" loading="lazy">
    
    <div class="banner_text">

        <div class="wrapper">

            <div class="cont">

                <h1>GARAGE DOORS EXPERT</h1>

                <text class="punchline-text"><?php echo $city_name . ",";  ?> <?php echo $state_name  ?> Top Rated Company</text>

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

<h2 class="headstrip">Garage Doors Expert and the best advice for you</h2>

<section class="black_dividers">
    <div class="wrapper">
        <p>The garage door mechanism incorporates different components that work together to ensure a smooth, safe, and secure operation of the garage door.</p>
        <p>When you need a new installation for a garage or an opener you want to do some homework and check what is available on the market and what works the best for your home and budget.</p>
        <p>When it comes to repair you want to make sure the diagnosis is correct, that only the best parts are used, and that the technician is knowledgeable, insured, and dependable.</p>
        <p>We are here to assist you every step of the way to assure your satisfaction. From finding advice when choosing the right parts for your garage door to helping you decide on the ultimate garage door opener for your home. We understand the choices you are faced with.</p>
    </div>
</section>
<section clas="about_row1" style="margin-top: 3%;">
<!-- <div style="height: 100%;" style="background-color: black;">

    <div class="banner_text"> -->
        <div class="wrapper" style="min-height: 300px !important;">

            <article>
                <h2>How to choose your garage door?</h2>
                <img src="/images/gde-img1.png" alt="The Garage Door Sensor" class="article-image" style="height: auto !important;">
                <p>Choosing the right garage door materials, styles, and functionality that fit both your budget and personal tastes, this section will provide options to best accommodate your needs.</p>
                <ol class="cont">
                    
                    <li>
                        ● <a href="https://www.massgaragedoorsexpert.com/info/information/garage-doors-materials">Garage Door Materials</a>
                    </li>
                    
                </ol>
                <br/>
                <br/>
            </article>
        </div>
        <br/>
        <br/>
        <div class="wrapper" style="min-height: 300px !important;">
            <article>    
                <h2>All about the garage door opener.</h2>
                <img src="/images/gde-img2.png" alt="The Garage Door Sensor" class="article-image" style="height: auto !important;">
                <p>A smart shopper is a comparison shopper, who understands the value of pros and cons. So do we, which is why we've composed a comprehensive and informative guide showcasing the different openers on the market. From chain openers to belt drive systems, and anything in between, get the best for your buck in our shopper’s guide.</p>
                <ol class="cont">
                    
                    <li>
                        ● <a href="https://www.massgaragedoorsexpert.com/info/openers/liftmaster-garage-door-openers">Liftmaster opener</a>
                    </li>
                    <li>
                        ● <a href="https://www.massgaragedoorsexpert.com/info/openers/brandname-garage-openers">Brand-name openers</a>
                    </li>
                    
                </ol>
            
            </article>
        </div>
        <br/>
        <br/>
        <div class="wrapper" style="min-height: 300px !important;">
            <article>
                <h2>Garage door parts.</h2>
                <img src="/images/gde-img3.png" alt="The Garage Door Sensor" class="article-image" style="height: auto !important; margin-bottom: 5%;">
                <p> Essentials like cables, rollers, rails, and springs along with maintenance supplies, sales and services, including upgrades and inquiries about accessing SMART Wi-Fi technology are easy to access right here.</p>
                <p>And always if you have a question that we did not answer please send us an email or call us, we will be happy to address any concern that you have.</p>
                <ol class="cont">
                    
                    <li>
                        ● <a href="https://www.massgaragedoorsexpert.com/info/repair/garage-door-rollers">Rollers</a>
                    </li>
                    
                </ol>
            </article>
        </div>
        <br/>
        <br/>    



            <!-- <p>The majority of my clientele are often astounded when they discover that I am in the business of <b>repairing your operating systems, garage doors, and associated components</b> more than I am invested in only new installations and sales. Equally able to perform all facets of the job description deemed upon a certified garage door technician, I have also discovered that my specialty is repairing.</p>
            <br/>
            <p>I have dedicated years to attain the meticulous precision that is the base of my craftsmanship, along with pairing it with historical and sturdy homes, structures, and commercial properties that are known to stand the test of time right here in <b>Massachusetts.</b></p>
            <br/>
            <p>Now, as new advances are being upgraded to meet industry, environmental, and mobile net standards, which turn the basic garage door system into an all-in-one multipurpose residential and commercial complete monitoring home base, garages are becoming THE extension of your home and will be expected to last as strong and in some cases, provide the optimal point where expansions around them offer the best alternatives to build and grow from.</p>
            <br/>
            <p>As specialized as I am with repairing older models, I am also dedicated and proven to meet and surpass today's modernizing urban renewal trends to give you a garage and all the parts guaranteed to get the most of its lifespan. At the same time, you can enjoy the relief of knowing I understand that there is so much more riding on and behind that door.</p>
            <br/>
            <p>When you consult with me, you'll enjoy double the benefits because of my preferred go-to product line produced by <a href="https://www.massgaragedoorsexpert.com/info/openers/liftmaster-garage-door-openers"><b>LiftMaster Ⓡ</b></a>; the number one subsidiary of the Chamberlain™Group. Now, the industry's top-shelf equipment and parts are readily available for you when you choose me as your garage service pro.</p>
            <br/>
            <p>Like LiftMaster's extensive catalog of parts manufactured exclusively for their systems, I am proud to promote this line. Why? Well, simply written by Liftmaster themselves:</p>
            <br/>
            <p><b>"As the industry's largest manufacturer of garage door openers with over 40 years of experience, <a href="https://www.massgaragedoorsexpert.com/info/openers/liftmaster-garage-door-openers"><b>LiftMaster®</b></a> knows what you want in a garage door opener."</b></p>
            <br/>
            <p>This page will have updates on some easy DIY maintenance options, expert advice on choosing openers, garage door parts, garage door materials, and all kinds of pros and cons of garage doors.</p>
            <br/>
            <ol class="cont">
                
                <li>
                    ● <a href="https://www.massgaragedoorsexpert.com/info/openers/brandname-garage-openers">Garage door remote openers</a>
                </li>
                <li>
                    ● <a href="https://www.massgaragedoorsexpert.com/info/repair/garage-door-rollers">Garage door rollers</a>
                </li>
                <li>
                    ● <a href="https://www.massgaragedoorsexpert.com/info/information/garage-doors-materials">Garage door materials</a>
                </li>
                <li>
                    ● <a href="#">Garage door wifi sensors</a>
                </li>
                <li>
                    ● <a href="#">Garage door springs</a>
                </li>
                <li>
                    ● <a href="#">Door panel warps</a>
                </li>
                <li>
                    ● <a href="#">Track support failure</a>
                </li>
                <li>
                    ● <a href="#">Rails</a>
                </li>
            </ol> -->
            <br/>
        <!-- </div>
    </div> -->


    <!-- <div class="banner_text">
        <div class="wrapper">
            <ol class="cont">
                <li class="li-pl-adjust">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam fermentum, turpis a tempus elementum, lacus risus convallis felis, vitae tempor tortor elit nec risus. Sed sem tortor, mattis id nulla id, lacinia luctus dolor. Fusce nisi eros, pharetra ac pharetra suscipit, auctor non ante. Ut eget tellus sit amet nisl finibus iaculis ut a mi. Nunc facilisis volutpat nibh ac pretium. Phasellus a gravida tellus. Nam eget velit quis velit gravida consequat ultricies nec neque. Mauris id odio accumsan, ultrices mi id, efficitur nulla. In justo risus, venenatis vitae velit nec, fringilla fermentum metus.
                    <br/>
                    <img class="li-img" src="images/west_garage_2.webp"/>
                </li>
                
                <br/>
                <li class="li-pl-adjust">
                    Integer cursus dapibus odio eu dapibus. Curabitur quis pharetra nunc. Nam tellus nunc, hendrerit quis pellentesque nec, volutpat eu dolor. Sed non semper massa, sit amet feugiat felis. Vestibulum eleifend consectetur ultricies. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam facilisis tortor mollis neque interdum, ut tempor urna volutpat. Proin consectetur blandit augue, nec vehicula lorem ullamcorper eu. Curabitur ultricies quam velit, ut facilisis ante condimentum vitae. Vivamus tempor et risus vel tristique. Ut diam augue, eleifend in convallis dignissim, tristique vestibulum ante.
                    <br/>
                    <img class="li-img" src="images/west_garage_3.webp"/>
                </li>
                <br/>
                <li class="li-pl-adjust">
                    Donec et urna arcu. Vestibulum commodo massa dignissim lectus hendrerit, vel sollicitudin orci convallis. Cras sit amet quam vehicula, fermentum orci vel, iaculis neque. Nunc non aliquet quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec viverra massa, id sagittis dolor. Ut nisl sem, viverra sit amet orci a, vehicula porttitor odio. Morbi sed ante nisl. Pellentesque semper arcu augue, non fringilla ex fermentum nec. Integer id leo a orci euismod tincidunt.
                    <br/>
                    <img class="li-img" src="images/west_garage_4.webp"/>
                </li>
            </ol>
        </div>
    </div> -->

    <!-- <div class="banner_text">
        <div class="wrapper">
            <div class="cont">
                <br/>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam fermentum, turpis a tempus elementum, lacus risus convallis felis, vitae tempor tortor elit nec risus. Sed sem tortor, mattis id nulla id, lacinia luctus dolor. Fusce nisi eros, pharetra ac pharetra suscipit, auctor non ante. Ut eget tellus sit amet nisl finibus iaculis ut a mi. Nunc facilisis volutpat nibh ac pretium. Phasellus a gravida tellus. Nam eget velit quis velit gravida consequat ultricies nec neque. Mauris id odio accumsan, ultrices mi id, efficitur nulla. In justo risus, venenatis vitae velit nec, fringilla fermentum metus.
                </p>
                <br/>
                <p>
                    Integer cursus dapibus odio eu dapibus. Curabitur quis pharetra nunc. Nam tellus nunc, hendrerit quis pellentesque nec, volutpat eu dolor. Sed non semper massa, sit amet feugiat felis. Vestibulum eleifend consectetur ultricies. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam facilisis tortor mollis neque interdum, ut tempor urna volutpat. Proin consectetur blandit augue, nec vehicula lorem ullamcorper eu. Curabitur ultricies quam velit, ut facilisis ante condimentum vitae. Vivamus tempor et risus vel tristique. Ut diam augue, eleifend in convallis dignissim, tristique vestibulum ante.
                </p>
                <br/>
                <p>
                    Maecenas molestie odio est, a finibus erat consectetur eu. Ut in est in ex finibus porta. Nunc egestas lobortis ligula. Nulla lacinia ac felis non ornare. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam eu lobortis sem, vitae ullamcorper dolor. Pellentesque pharetra laoreet neque, eget posuere enim sagittis et.
                </p>
            </div>
        </div>
    </div> -->

    <!-- <iframe allowtransparency="true" id="amarr" src="https://feedback.wayne-dalton.com/Default.aspx" style="width: 100%;height: 900px; background-color: black;" frameborder="0"></iframe> -->


</section>



<?php include '../includes/footer.php' ?>
