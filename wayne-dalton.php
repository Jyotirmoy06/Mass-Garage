<?php include './includes/header.php' ?>
<?php include './includes/dropZone-css.php' ?>

<style>


    .default {
        background-color: #ededed;
    }
    body {background-color: #ededed;}

    .bg-black {
        background-color: black !important;
    }

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

        .smsCheckbox {
            top: -72px;
        }
        
        .dimension-row {
            /* display: inline-block !important; */
            padding-bottom: 10px;
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

    .iframe-column iframe {
        width: 100%;
        /* width: 98%; */
        height: 900px; 
        background-color: #ededed;
    }
    @media only screen and (min-device-width: 768px) {
        .iframe-column iframe {
            /* margin-top: 30px; */
            margin-bottom: 30px;
            float: left;
            /* margin-left: 1%; */
            /* margin-left: -4.5%; */
        }
    }

    .smsCheckbox {
        width: min-content !important; 
        margin-right: 2%;
        position: relative;
        top: -24px;
    }

    /* Dropdown Button */
    .dropbtn1, .dropbtn2, .dropbtn3, .dropbtn4 {
        background-color: #f9f8f8;
        color: #444444;
        padding: 8px;
        font-weight: 500;
        font-size: 14px;
        border: none;
        border-left: solid 4px #ffc600;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {background-color: #ddd;}

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {display: block;}

    /* Change the background color of the dropdown button when the dropdown content is shown */
    /* .dropdown:hover .dropbtn {background-color: #3e8e41;} */
    .dropdown .dropbtn1:hover, .dropdown .dropbtn2:hover, .dropdown .dropbtn3:hover, .dropdown .dropbtn4:hover {
        /* background-color: #000;
        color: white; */
        cursor: pointer;
    }

    .heightLabel {
        padding: 5px 5px 0 0;
    }

    .widthLabel {
        padding: 5px 5px 0px 5px;
        margin-left: 5px;
    }

    .ml-1 {
        margin-left: 1%;
    }

    .dimension-row {
        display: inline-flex;
    }

    .add-new-dimension-row
    {
        font-family: "Open Sans", sans-serif;
        font-size: 12px;
        line-height: 2px;
        font-weight: bold;
        color: #000;
        background: #ffc600;
        text-transform: uppercase;
        float: left;
        padding: 12px 20px;
        border-radius: 3px;
        cursor: pointer;
        margin-top: 8px;
    }

    .delete-new-dimension-row 
    {
        width: 100px;
        margin: 0px 0px 6px 10px;
        font-family: "Open Sans", sans-serif;
        font-size: 12px;
        line-height: 12px;
        font-weight: bold;
        color: #000;
        background: #ffc600;
        text-transform: uppercase;
        float: left;
        padding: 6px 4px;
        border-radius: 3px;
        cursor: pointer;
        margin-top: 8px;
    }

    .instruction-text-li 
    {
        list-style: disc outside none;
        display: list-item;
        margin-left: 18px;
    }

    .ln-yellow{
        position: relative;
        background: #ffc600;
        width: 100%;
        top: 20px;
        height: 10px;
    }

    .ln-top{
        top: 20px;
       /*padding: 10px;*/
        z-index: 999;
    }

    @media only screen and (min-device-width: 767px) {
      .ln-bot{
           top: 900px; 
        }
    }
    @media only screen and (max-device-width: 767px) {
      .ln-bot{
           position: static;
        }
    }

    #amarr{
        position: relative;
        border-top: solid 5px #ffc600;
        border-bottom: solid 5px #ffc600;
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

                            <img loading="lazy" src="images/phone-.svg" alt="" style="width: 26px;display: inline-block;">

                            <span class="respo">Call: </span><?= $printableNumber ?></a>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</section>

<h2 class="headstrip">Garage Door Design Center</h2>
<section clas="about_row1" style="background-color: black; padding-top: 64px;">
    <!-- <div class="ln-yellow ln-top"></div> -->

<div style="height: 100%;" style="background-color: black;">

    <div class="banner_text">
                
        <!-- iframe -->
        
        <div class="row iframe-top-adjust">
            <div class="col-md-8 iframe-column">
                <iframe allowtransparency="true" id="amarr" src="https://feedback.wayne-dalton.com/Default.aspx" style="" frameborder="0"></iframe>
            </div>

        </div>
        
        
    </div>

</div>
<!-- <div class="ln-yellow ln-bot"></div> -->
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
                        <?= $addressLine1 ?> <br>
                        <?= $addressLine2 ?>
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
                        <a href="tel:<?= $printableNumber ?>"><?= $printableNumber ?></a></li>
                    <li>
                        <svg enable-background="new 0 0 96 96" id="clock" version="1.1" viewBox="0 0 96 96" width="19px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000">
                            <path d="M48,4C23.7,4,4,23.7,4,48c0,24.301,19.7,44,44,44c24.301,0,44-19.699,44-44C92,23.7,72.301,4,48,4z M48,84  c-19.882,0-36-16.118-36-36s16.118-36,36-36s36,16.118,36,36S67.882,84,48,84z"/>
                            <path d="M52,46.343V24c0-2.209-1.791-4-4-4s-4,1.791-4,4v24c0,0.009,0.003,0.018,0.003,0.027c0.001,0.253,0.026,0.506,0.076,0.755  c0.024,0.123,0.069,0.234,0.104,0.354c0.039,0.132,0.069,0.266,0.122,0.395c0.058,0.138,0.136,0.264,0.208,0.394  c0.054,0.1,0.097,0.2,0.16,0.295c0.147,0.221,0.314,0.428,0.501,0.613l11.311,11.312c1.562,1.562,4.097,1.562,5.658,0  c1.562-1.562,1.562-4.097,0-5.656L52,46.343z"/>
                        </svg>
                        <?= $hoursOperationLine1 ?><br>
                        <?= $hoursOperationLine2 ?><br>
                    </li>
                </ul>

                <ul class="social_icons">
                     <?php include 'includes/social_icons.php' ?>
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

                    <h3>Door 1</h3>
                    <div class="col_count_2">
                        <div class="form_div">
                            <label style="padding-bottom: 5px;">Height:</label>
                            <div class="dropdown dimension-row">
                                <select id="height-feet" class="dropbtn1" name="door1-height-feet">
                                    <option label="" value="">-- Select Feet --</option>
                                    <?php
                                        for ($i=1; $i <= 30; $i++) 
                                        { 
                                    ?>
                                        <option label="<?=$i?>" value="<?=$i?>"><?=$i?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                
                                <select id="height-inches" class="dropbtn2 ml-1" name="door1-height-inches">
                                    <option label="" value="">-- Select Inches --</option>
                                    <?php
                                        for ($j=0; $j <= 11; $j++) 
                                        { 
                                    ?>
                                        <option label="<?=$j?>" value="<?=$j?>"><?=$j?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form_div">
                            <label style="padding-bottom: 5px;">Width:</label>
                            <div class="dropdown dimension-row">
                                <select id="width-feet" class="dropbtn3" name="door1-width-feet">
                                    <option label="" value="">-- Select Feet --</option>
                                    <?php
                                        for ($k=1; $k <= 30; $k++) 
                                        { 
                                    ?>
                                        <option label="<?=$k?>" value="<?=$k?>"><?=$k?></option>
                                    <?php
                                        }
                                    ?>
                                </select>

                                <select id="width-inches" class="dropbtn4 ml-1" name="door1-width-inches">
                                    <option label="" value="">-- Select Inches --</option>
                                    <?php
                                        for ($l=0; $l <= 11; $l++) 
                                        { 
                                    ?>
                                        <option label="<?=$l?>" value="<?=$l?>"><?=$l?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>


                    

                    <button type="button" id="addRow" class="add-new-dimension-row">Add Row</button>


                    <div class="form_div" style="color: red;" >
                        <?php if(isset($message)){ echo $message; }; ?>
                    </div>

                    <div class="form_div">
                        <label class="form-check-label" for="flexCheckDefault">
                            For a smooth and accurate installation, we need some visual information about your current garage door(s). Please upload the following photos: 
                            <br/>
                            <ul style="margin-top: 5px;">
                                <li class="instruction-text-li"><b>Exterior:</b> A clear photo of the entire door frame from the outside.</li>
                                <li class="instruction-text-li"><b>Interior:</b> A photo showing the full door frame from the inside. If you have an existing opener, please include a photo of the tracks and opener mechanism. If you plan to install a new opener, please take a photo of the desired location.</li>
                            </ul>
                        </label>
                    </div>

                    <div class="form_div">
                        <div class="drop-zone" id="dropZone">
                            Drag and drop files here or click to upload
                        </div>
                        <input type="file" id="fileInput" name="attachment[]" multiple accept="application/pdf, image/*" style="display: none;">
                        <div class="preview" id="preview"></div>
                      
                        <input type="hidden" name="typeEstimateForm" value="1">
                    </div>

                    <div class="form_div" style="display: inline-flex;">
                        <input class="form-check-input smsCheckbox" name="acceptSMS" type="checkbox" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Accepting SMS Messages: By checking this box, I agree to receive text messages regarding future services from Mass Garage Doors Expert. Messaging frequency varies based on requested service. Message and data rates may apply. 
                            I also agree to the <a href="/privacy-policy.php" style="text-decoration: underline;">Privacy Policy</a> & <a href="/tos.php" style="text-decoration: underline;">Terms and Conditions</a>. 
                            Text "STOP" to cancel at any time.
                        </label>
                    </div>

                    <div class="form_div">
                        <input type="hidden" id="totalDoorsCount" name="totalDoorsCount" value="1">
                        <input type="submit" value="Send Us Your Quote" name="submit" id="" />
                    </div>
                </form>
            </aside>
        </section>

        <h1 style="color: white;">Send Us Your Query</h1>
        <p style="color: white;">Any question or remarks? Just write a message!</p>

    </div>
</section>

<?php include './includes/dropZone-js.php' ?>

<?php include './includes/footer.php' ?>
