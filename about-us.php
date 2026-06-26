<?php
   $meta_Title = 'Garage Door Experts at Mass Garage Doors Expert';
   
   $meta_Description = 'Do you feel like you need to speak with garage door experts for your next repair or installation? Call Mass Garage Doors Expert today!';
   
   $meta_url = 'https://massgaragedoorsexpert.com/about-us';
   
   $meta_ogTitle = 'About Us';
   
   ?>
<?php include './includes/header.php' ?>
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
        .banner.inner_banner .banner_text .cont {
        width: -webkit-fill-available !important;
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
            <h1>GARAGE DOORS EXPERT</h1>
            <text class="punchline-text"><?php echo $city_name . ",";  ?> <?php echo $state_name  ?> Top Rated<br />Company</text>
            <ul class="btn_list">
               <li><a href="#" class="btn1" onclick="show_workiz()">BOOK AN APPOINTMENT</a></li>
               <li><a href="#" class="btn2">
                  <img loading="lazy" src="images/phone-.svg" alt="" loading="lazy" style="width: 26px;display: inline-block;">
                  <span class="respo">Call: </span><?= $printableNumber ?></a>
               </li>
            </ul>
         </div>
      </div>
   </div>
</section>
<h2 class="headstrip">GARAGE DOORS EXPERT</h2>
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
         in and around the <?php echo $city_name . ",";  ?> area.
      </p>
   </div>
</section>
<section class="about_row1">
   <div class="wrapper">
      <div class="intro_img">
         <img loading="lazy" src="images/ronen-img.jpg" alt="" loading="lazy">
         <p>Mass Garage Doors Expert Owner</p>
      </div>
      <h4>Tech Savvy with an Eye on the Future.</h4>
      <p>I am Ronen Sisso, the owner and operator of Mass Garage Door Experts. With over 10 years of experience with garage door service and repair, I have diligently hand trained my staff at Mass Garage Door Experts and with their help, we have become an extended family with shared work ethics and goals. We have been going strong and lead the way in and around the Boston area. Also pleased to outreach to the counties of Suffolk MA, Middlesex MA, Norfolk MA, Plymouth MA, Bristol MA, Worcester MA, Essex MA, Rockingham NH, Hillsborough NH, and Providence RI., our crew is available to come to your home or office any time of day or night. With Mass Garage Doors Experts, you get 24/7/365 service, and you get it with a smile.
         <br><br>
         During my tenure, I have proudly led my staff into the rank of regional leaders in and around Boston when it comes to installing and servicing garage doors for homes and businesses. Successfully recommended and reviewed by our clientele, there are 3 reasons why consumers carry on their patronage with us at Mass Garage Door Experts:
      </p>
      <br><br>
      <ul style="list-style: disc;">
         <li style="list-style: disc;">
            Perfectionism at a reasonable cost because there is no second-guessing Quality Assurance
         </li>
         <li style="list-style: disc;">
            The efficiency with your precious time in mind
         </li>
         <li style="list-style: disc;">
            The communicative caring consumerism: where you are updated regularly and consulted with; not kept in the dark
         </li>
      </ul>
      <br>
      <h4>Let me walk you through what we can provide and guide you through</h4>
      <h4 style="display: none;">HIGHLY-TRAINED GARAGE DOOR REPAIR & REPLACEMENT TECHNICIANS</h4>
      <p style="display: none;">I have a hand in personally training every technician that performs a garage door service for
         you. As
         a result, our team has a passion for arriving on time, when we say we will. Once we arrive,
         we’ll
         evaluate the problem and keep you in the loop, every step of the way. We’ll take care of things
         and,
         if there are any other issues or ways to save money and increase the life of your garage door,
         we’ll
         do that too.
         <br><br>
         We provide a number of garage door services such as garage door installation, automatic openers,
         broken spring replacement, cables, pulleys, roller, weather strips, bottom rubbers and garage
         door
         accessories! Our garage door repair and service technicians service the <?php echo $city_name . ",";  ?> area and the
         counties
         of Suffolk MA, Middlesex MA, Norfolk MA, Plymouth MA, Bristol MA, Worcester MA, Essex MA,
         Rockingham
         NH, Hillsborough NH, and Providence RI. We’re available to come to your home or office any time
         of
         day or night. With us, you get 24/7/365 service, and you get it with a smile.
         We always love to hear feedback and questions from our loyal clients. Go to our contact page to
         make
         an appointment or reach out to our team.
      </p>
   </div>
</section>
<section class="black_dividers">
   <div class="wrapper">
      <h3>EXTRAORDINARILY SKILLED SPECIALIST PROVIDING FIRST CLASS RESULTS</h3>
      <p>Under the elite care that only comes with years of experience, with Garage Doors Expert you’ll be given high priority attention and first-rate service that always includes:
      </p>
      <br>
      <ul style="list-style: disc;">
         <li>
            Quick responses via phone or self-booking. | A detailed evaluation.
         </li>
         <li>
            Thorough onsite inspection. | Timely work site arrival.
         </li>
         <li>
            Additional maintenance upon request.
         </li>
         <li>
            Advice, tips and any troubleshooting guidance or recommendations.
         </li>
      </ul>
   </div>
</section>
<section class="split_row">
   <div class="cont">
      <h3>OUR SERVICES</h3>
      <p>Mass Garage Door Experts offers highly competitive rates for installation and service, and we
         provide only top quality parts materials. Whatever brand of garage door you have, we’ll take
         care of it with a smile!
      </p>
      <a href="#" class="btn1">Read More</a>
   </div>
   <div class="img"><img loading="lazy" src="images/our-service-img.webp" alt="" loading="lazy"></div>
</section>
<section class="black_dividers">
   <div class="wrapper">
      <h3>HIGHLY TRAINED GARAGE DOOR TECHNICIANS</h3>
      <p>Ronen takes great pride in personally training every technician at our company. This is the
         reason why all the members of our team share the same principles when it comes to the work we do
         best.
         <br><br>
         We always make sure to arrive on time and give you regular updates of what we are doing to your
         property. Our team will explain every step of the process, from the evaluation to helpful
         maintenance tips after your garage door is installed.
      </p>
   </div>
</section>
<section class="split_row">
   <div class="img"><img loading="lazy" src="images/about-us-img.webp" alt="" loading="lazy"></div>
   <div class="cont">
      <h3>MORE THAN JUST A DOOR</h3>
      <p>
        A garage door is an extension of your home or workplace. With every cycle, it is on-the-job 24 hours a day, providing you additional safety, weather protection, and aesthetic curb appeal. You rely on your system to be ready to go when you need it. Whether you experience a broken remote, forgotten keypad code or weather related damage, to the need for an entire system replacement or repair to any of the vast array of components, your first and only stop is Mass Garage Doors Expert.
      </p>
      <a href="#" class="btn1">Read More</a>
   </div>
</section>
<section class="black_dividers">
   <div class="wrapper">
      <a name="residential"></a>
      <h3>Reach Out to Us</h3>
      <p>Our friendly and trustworthy technicians are available whenever you need them. We serve clients
         in the Greater Boston, area as well as the counties of Suffolk, Middlesex, Norfolk, and Essex, MA. We
         would also appreciate any feedback from our valued clients. If you have any questions about our
         services or rates, feel free to get in touch with us. We always look forward to hearing from
         you!
      </p>
      <button onclick="show_workiz()" role="button" id="book_an_appointment" class="btn1">BOOK AN APPOINTMENT</button>
   </div>
</section>
<?php include './includes/footer.php' ?>