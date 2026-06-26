<?php

$meta_Title = 'Contact Us - Mass Garage Doors Expert';
$meta_Description = 'Lets Get in touch Our Experts will be in contact with you 1925 Commonwealth Ave Unit 715 Boston, MA 02135 Phone: (888) 989-8758';
$meta_url='https://massgaragedoorsexpert.com/contact-us';
$meta_ogTitle='Contact Us';


    $product_Title = $_POST['title'];    
   // $product_id=$_GET['productid'];
    $price=  $_POST['priceoption'];
   
    $product_SKU=$_POST['sku'];
    $product_url=$_POST['url'];
    if (!empty($_POST['priceoption'])){    
  //  $price_data = mysqli_query($con, "SELECT * FROM `product_pricing` WHERE `pricing_id`= '$price_id'");
    //$price_row = mysqli_fetch_assoc($price_data);
    //$product_price=$price_row['price_value'];
   // $product_id=$price_row['product_id'];
    //$product_option=$price_row['option_name'];

    //$product_data= mysqli_query($con, "SELECT * FROM `product` WHERE `product_id`=$product_id");
    //$product_row = mysqli_fetch_assoc($product_data);
  //  $product_Title = $product_row['title'];
   // $product_SKU=$product_row['sku_id'];
    //$product_url=$product_row['url_slug'];
}

?>
<?php include 'includes/header.php' ?>
<?php require 'contactFunctions.php'; ?>
<?php include './includes/dropZone-css.php' ?>

<style>
 
    .smsCheckbox {
        width: min-content !important; 
        margin-right: 2%;
        position: relative;
        top: -24px;
    }

    .bg-black {
        background-color: #000 !important;
    }

    .text-white {
        color: #ffffff !important;
    }

    @media only screen and (max-device-width: 600px) {
        .smsCheckbox {
            top: -72px;
        }
    }

</style>


<section class="content_section center bg-black">

<div class="wrapper">

    <h1 class="text-white">Contact Us</h1>

    <p class="text-white">Any question or remarks? Just write a message!</p>

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

                    <a href="tel:<?=$printableNumber?>"><?=$printableNumber?></a></li>

                <li>

                    <svg enable-background="new 0 0 96 96" id="clock" version="1.1" viewBox="0 0 96 96" width="19px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000">

                        <path d="M48,4C23.7,4,4,23.7,4,48c0,24.301,19.7,44,44,44c24.301,0,44-19.699,44-44C92,23.7,72.301,4,48,4z M48,84  c-19.882,0-36-16.118-36-36s16.118-36,36-36s36,16.118,36,36S67.882,84,48,84z"/>

                        <path d="M52,46.343V24c0-2.209-1.791-4-4-4s-4,1.791-4,4v24c0,0.009,0.003,0.018,0.003,0.027c0.001,0.253,0.026,0.506,0.076,0.755  c0.024,0.123,0.069,0.234,0.104,0.354c0.039,0.132,0.069,0.266,0.122,0.395c0.058,0.138,0.136,0.264,0.208,0.394  c0.054,0.1,0.097,0.2,0.16,0.295c0.147,0.221,0.314,0.428,0.501,0.613l11.311,11.312c1.562,1.562,4.097,1.562,5.658,0  c1.562-1.562,1.562-4.097,0-5.656L52,46.343z"/>

                    </svg>

                    <?= $hoursOperationLine1 ?><br>

                    <!-- Friday : 8 AM - 2 PM<br> -->

                    <?= $hoursOperationLine2 ?><br>

                    <!-- Sunday : 8 AM - 4 PM -->
                </li>

            </ul>

           
    <ul class="social_icons">

        <?php include 'includes/social_icons.php' ?>

    </ul>

        </div>

        <aside class="right">

            <?php if(isset($message)){ ?>                    
                <div class="form_div" style="color: red; margin-top: -20px !important; margin-bottom: 5px;" >
                    <?php echo $message; ?>
                </div>
            <?php } ?>

            <form method="POST" enctype="multipart/form-data">

                <div class="col_count_2">

                    <div class="form_div">

                        <label for="">First Name: *</label>

                        <input type="text" placeholder="Your Name" name="first_name" id="" value="<?= isset($_POST['first_name'])? $_POST['first_name'] : "" ?>" required>

                    </div>

                    <div class="form_div">

                        <label for="">Last Name:</label>

                        <input type="text" placeholder="Your Last Name" name="last_name" id="" value="<?= isset($_POST['last_name'])? $_POST['last_name'] : "" ?>">

                    </div>

                </div>

                <div class="col_count_2">

                    <div class="form_div">

                        <label for="">Email: *</label>

                        <input type="email" placeholder="Your Email" name="email" id="" value="<?= isset($_POST['email'])? $_POST['email'] : "" ?>" required>

                    </div>

                    <div class="form_div">

                        <label for="">Phone: *</label>

                        <input type="text" placeholder="Your Phone" name="phone" id="" value="<?= isset($_POST['phone'])? $_POST['phone'] : "" ?>" required>

                    </div>

                </div>

                <div class="form_div">

                    <label for="">Address:</label>

                    <input type="text" placeholder="Address" name="address" id="" value="<?= isset($_POST['address'])? $_POST['address'] : "" ?>">

                </div>

                <div class="col_count_3">

                    <div class="form_div">

                        <label for="">City:</label>

                        <input type="text" placeholder="City" name="city" id="" value="<?= isset($_POST['city'])? $_POST['city'] : "" ?>">

                    </div>

                    <div class="form_div">

                        <label for="">State:</label>

                        <input type="text" placeholder="State" name="state" id="" value="<?= isset($_POST['state'])? $_POST['state'] : "" ?>">

                    </div>

                    <div class="form_div">

                        <label for="">ZIP Code:</label>

                        <input type="text" placeholder="ZIP Code" name="zip" id="" value="<?= isset($_POST['zip'])? $_POST['zip'] : "" ?>">

                    </div>

                </div>

                <div class="form_div">

                    <label for="">Subject:</label>

                    <input type="text" placeholder="Subject" name="subject" id="" value="<?= isset($_POST['subject'])? $_POST['subject'] : "" ?>">

                </div>

                <div class="form_div">

                    <label for="">Message:</label>

                    <textarea name="message" id="" placeholder="Message">
                        <?= isset($_POST['message'])? $_POST['message'] : "" ?>
                    </textarea>

                </div>
                <div class="form_div" style="color: red;" >
                    <?php if(isset($message)){ echo $message; }; ?>
                </div>

                <div class="form_div">
                    <div class="drop-zone" id="dropZone">
                        Drag and drop files here or click to upload
                    </div>
                    <input type="file" id="fileInput" name="attachment[]" multiple accept="application/pdf, image/*" style="display: none;">
                    <div class="preview" id="preview"></div>
                    <!-- <input type="file" name="attachment" accept="application/pdf, image/*" /> -->
                    <!-- <input type="file" name="attach_file[]" accept="application/pdf, image/*"  multiple="multiple"/> -->
                    <input type="hidden" name="typeContactForm" value="1">
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

                    <input type="submit" value="Send Message" name="submit" id="" />

                </div>

            </form>

        </aside>

    </section>

</div>

</section>
    
<?php include './includes/dropZone-js.php' ?>

<?php include 'includes/footer.php' ?>