<?php include './includes/header.php' ?>
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

    .cont p {
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
            top: 112px !important;
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
    <?php // include './banner-image.php' ?>

    <img src="/images/about-us-banner.jpg" srcset="/images/residential-banner-clear-garage-door.webp 600w,/images/residential-banner-clear-garage-door.webp 980w,/images/about-us-banner.webp" alt="" loading="lazy">
    
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

<h1 class="headstrip">Design Center Instructions</h1>
<section clas="about_row1" style="margin-top: 3%;">
<div style="height: 100%;" style="background-color: black;">

    <div class="banner_text">
        <div class="wrapper">
            <ol class="cont">
                <li class="li-pl-adjust">
                    Select your Garage Door Style by clicking on it.
                    <br/>
                    <!-- <img class="li-img" src="images/west_garage_4.webp"/> -->
                    <img class="li-img" src="images/door_model.webp"/>
                </li>
                
                <br/>
                <li class="li-pl-adjust">
                    Choose your desired panel designs for that style.
                    <br/>
                    <img class="li-img" src="images/panels.webp"/>
                </li>
                <br/>
                <li class="li-pl-adjust">
                    Customize your door, selecting the Size (A), Color (B), Window (C) and Hardware (D). Do not worry if the size you selected is not exact. We will come out to measure it for you free of charge when you send us the design.
                    <br/>
                    Once you finish with your select click on the print icon (E) to generate a PDF of your design with all the details.
                    <br/>
                    <img class="li-img" src="images/configuration.webp"/>
                </li>
                <br/>
                <li class="li-pl-adjust">
                    Download the PDF to your device.
                    <br/>
                    <img class="li-img" src="images/download_PDF.webp"/>
                </li>
                <li class="li-pl-adjust">
                    Fill out the form at the bottom of this page and make sure to upload the PDF you just generated. 
                    <br/>
                    We will then contact you to schedule a time for us to come out, double check your measurements and go over additional options and costs with you.
                    <br/>
                    <img class="li-img" src="images/send_us _the_PDF.webp"/>
                </li>
            </ol>
        </div>
    </div>

    <!-- <div class="banner_text">
        <div class="wrapper">
            <div class="cont">

                <div class="images">
                    <div class="photo">
                        <img src="images/west_garage_4.webp" alt="photo" />
                    </div>
            
                    <div class="photo">
                        <img src="images/west_garage_3.webp" alt="photo" />
                    </div>
                    
                    <div class="photo">
                        <img src="images/west_garage_2.webp" alt="photo" />
                    </div>
                </div>

            </div>
        </div>
    </div> -->


    <div class="row iframe-top-adjust">
        <!-- <div class="col-md-2"></div> -->
        <div class="col-md-8 iframe-column">
            <iframe allowtransparency="true" id="amarr" src="https://feedback.wayne-dalton.com/Default.aspx" style="" frameborder="0"></iframe>
        </div>
        <!-- <div class="col-md-2"></div> -->
    </div>


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

</div>
</section>

<section class="content_section center bg-black">
    <div class="wrapper">

        <section class="form_section">
            <div class="left">
                <h2>Get in touch <span>Our Experts will be in contact with you.</span></h2>
                <ul class="contact_details">
                    <li>
                        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="20">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: none;
                                        stroke: #000;
                                        stroke-linecap: round;
                                        stroke-linejoin: round;
                                        stroke-width: 2px;
                                    }
                                </style>
                            </defs>
                            <title />
                            <g data-name="10-location" id="_10-location">
                                <path class="cls-1"
                                    d="M27,12A11,11,0,0,0,5,12C5,22,16,31,16,31S27,22,27,12Z" />
                                <circle class="cls-1" cx="16" cy="12" r="5" />
                            </g>
                        </svg>
                        1925 Commonwealth Ave Unit 715 <br>
                        Boston, MA 02135
                    </li>

                    <li>
                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#000" width="23">
                            <title/>
                            <g data-name="1" id="_1">
                                <path d="M348.73,450.06a198.63,198.63,0,0,1-46.4-5.85c-52.43-12.65-106.42-44.74-152-90.36s-77.71-99.62-90.36-152C46.65,146.75,56.15,99.61,86.69,69.07l8.72-8.72a42.2,42.2,0,0,1,59.62,0l50.11,50.1a42.18,42.18,0,0,1,0,59.62l-29.6,29.59c14.19,24.9,33.49,49.82,56.3,72.63s47.75,42.12,72.64,56.31L334.07,299a42.15,42.15,0,0,1,59.62,0l50.1,50.1a42.16,42.16,0,0,1,0,59.61l-8.73,8.72C413.53,439,383.73,450.06,348.73,450.06ZM125.22,78a12,12,0,0,0-8.59,3.56l-8.73,8.72c-22.87,22.87-29.55,60-18.81,104.49,11.37,47.13,40.64,96.1,82.41,137.86s90.73,71,137.87,82.41c44.5,10.74,81.61,4.06,104.48-18.81l8.72-8.72a12.16,12.16,0,0,0,0-17.19l-50.09-50.1a12.16,12.16,0,0,0-17.19,0l-37.51,37.51a15,15,0,0,1-17.5,2.72c-30.75-15.9-61.75-39.05-89.65-66.95s-51-58.88-66.94-89.63a15,15,0,0,1,2.71-17.5l37.52-37.51a12.16,12.16,0,0,0,0-17.19l-50.1-50.11A12.07,12.07,0,0,0,125.22,78Z"/>
                                <path d="M364.75,269.73a15,15,0,0,1-15-15,99.37,99.37,0,0,0-99.25-99.26,15,15,0,0,1,0-30c71.27,0,129.25,58,129.25,129.26A15,15,0,0,1,364.75,269.73Z"/>
                                <path d="M428.15,269.73a15,15,0,0,1-15-15c0-89.69-73-162.66-162.65-162.66a15,15,0,0,1,0-30c106.23,0,192.65,86.43,192.65,192.66A15,15,0,0,1,428.15,269.73Z"/>
                            </g>
                        </svg>
                        <a href="tel:<?=$printableNumber?>"><?=$printableNumber?></a></li>
                    <li>
                        <svg enable-background="new 0 0 96 96" id="clock" version="1.1" viewBox="0 0 96 96" width="19px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000">
                            <path d="M48,4C23.7,4,4,23.7,4,48c0,24.301,19.7,44,44,44c24.301,0,44-19.699,44-44C92,23.7,72.301,4,48,4z M48,84  c-19.882,0-36-16.118-36-36s16.118-36,36-36s36,16.118,36,36S67.882,84,48,84z"/>
                            <path d="M52,46.343V24c0-2.209-1.791-4-4-4s-4,1.791-4,4v24c0,0.009,0.003,0.018,0.003,0.027c0.001,0.253,0.026,0.506,0.076,0.755  c0.024,0.123,0.069,0.234,0.104,0.354c0.039,0.132,0.069,0.266,0.122,0.395c0.058,0.138,0.136,0.264,0.208,0.394  c0.054,0.1,0.097,0.2,0.16,0.295c0.147,0.221,0.314,0.428,0.501,0.613l11.311,11.312c1.562,1.562,4.097,1.562,5.658,0  c1.562-1.562,1.562-4.097,0-5.656L52,46.343z"/>
                        </svg>
                        Monday - Thursday : 8 AM - 4 PM<br>
                        Friday : 8 AM - 2 PM<br>
                        Saturday - Sunday : Closed<br>
                        <!-- Sunday : 8 AM - 4 PM -->
                    </li>
                </ul>

                <ul class="social_icons">
                    <li><a href="https://www.facebook.com/garage.doors.services/"><img src="images/facebook.svg" alt="" width="18"></a></li>
                    <li><a href="https://www.youtube.com/channel/UCER71U7NDMPnRDcZzqlyK9g?view_as=subscriber"><img src="images/youtube.svg" alt="" width="16"></a></li>
                    <li><a href="https://www.instagram.com/massgaragedoorsexpert/"><img src="images/instagram.svg" alt="" width="18"></a></li>
                    <li><a href="https://www.bbb.org/us/ma/boston/profile/garage-doors/mass-garage-doors-expert-0021-140580#bbbonlineclick"><img src="images/bbb.svg" alt="" width="15"></a></li>
                    <li><a href="#"><img src="images/home.svg" alt="" width="18"></a></li>
                    <li><a href="#"><img src="images/yellow-pages-icon.png" alt="" width="15"></a></li>
                    <li><a href="https://www.google.com/search?q=Mass+Garage+Doors+Expert,+1925+Commonwealth+Avenue+%23715,+Brighton,+MA+02135&ludocid=48749838458721355#lrd=0x89e38349314433b7:0xad31b84430944b,1,"><img src="images/google.svg" alt="" width="18"></a></li>
                    <li><a href="https://www.yelp.com/biz/mass-garage-doors-expert-boston"><img src="images/yelp.svg" alt="" width="18"></a></li>
                </ul>
            </div>

            <aside class="right">
                <form action="contactFunctions.php" method="POST" enctype="multipart/form-data" >
                    <div class="col_count_2">
                        <div class="form_div">
                            <label for="">First Name: *</label>
                            <input type="text" placeholder="Your Name" name="first_name" id="" required>
                        </div>

                        <div class="form_div">
                            <label for="">Last Name: *</label>
                            <input type="text" placeholder="Your Last Name" name="last_name" id="" required>
                        </div>
                    </div>

                    <div class="col_count_2">
                        <div class="form_div">
                            <label for="">Email: *</label>
                            <input type="text" placeholder="Your Email" name="email" id="">
                        </div>
                        <div class="form_div">
                            <label for="">Phone: *</label>
                            <input type="text" placeholder="Your Phone" name="phone" id="">
                        </div>
                    </div>
                    <div class="form_div">
                        <label for="">Address: *</label>
                        <input type="text" placeholder="Address" name="address" id="">
                    </div>

                    <div class="col_count_3">
                        <div class="form_div">
                            <label for="">City: *</label>
                            <input type="text" placeholder="City" name="city" id="">
                        </div>
                        <div class="form_div">
                            <label for="">State: *</label>
                            <input type="text" placeholder="State" name="state" id="">
                        </div>
                        <div class="form_div">
                            <label for="">ZIP Code: *</label>
                            <input type="text" placeholder="ZIP Code" name="zip" id="">
                        </div>
                    </div>

                    <div class="form_div">
                        <label for="">Subject:</label>
                        <input type="text" placeholder="Subject" name="subject" id="" value="">
                    </div>

                    <div class="form_div">
                        <label for="">Message:</label>
                        <textarea name="message" id="" placeholder="Message"></textarea>
                    </div>

                    <div class="form_div" style="color: red;" >
                        <?php if(isset($message)){ echo $message; }; ?>
                    </div>

                    <div class="form_div">
                        <input type="file" name="attachment" accept="application/pdf, image/*" />
                    </div>

                    <!-- <div class="form_div" style="display: inline-flex;">
                        <input class="form-check-input smsCheckbox" name="acceptSMS" type="checkbox" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Accepting SMS Messages: By checking this box, I agree to receive text messages regarding future services from Mass Garage Doors Expert. Messaging frequency varies based on requested service. Message and data rates may apply. 
                            I also agree to the <a href="/privacy-policy.php" style="text-decoration: underline;">Privacy Policy</a> & <a href="/tos.php" style="text-decoration: underline;">Terms and Conditions</a>. 
                            Text "STOP" to cancel at any time.
                        </label>
                    </div> -->

                    <div class="form_div">
                        <input type="submit" value="Send Message" name="submit" id="" />
                    </div>
                </form>
            </aside>
        </section>

        <h1>Send Us Your Query</h1>
        <p>Any question or remarks? Just write a message!</p>

    </div>
</section>

<?php include './includes/footer.php' ?>
