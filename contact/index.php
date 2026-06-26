<?php
$page_id = "5";

$hideOverlay = TRUE;

$pageTitle = 'Contact Us at  Mass Carpet Cleaning';

$pathToRoot = '../';

//include $pathToRoot . 'includes/header.php';

?>
<div class="inner_head">

    <h1>Contact Us Mass Carpet Cleanup</h1></div><div class="contact_address">

    <div class="wrapper">

    

     <div class="content_row3" style="text-align:left;

">

    

    

    <h2>We Serve Properties All Over Eastern Massachusetts</h2>

    

    

    You can get in touch with us via one of the following methods:

    

    

    <ul>

    

    

    

    <li>- Shoot An Email: We respond to all email queries, so don't be afraid to use the email below to contact us.

    

    

    

    <li>- Give Us A Call: We're always happy to take calls, and are fast about calling back. You can use the number below.

    

    

    

     <li>- Fill Out The Form: It's convenient and quick for you. Fill out the message section for a more customized response to your query.

    

    

    </ul>

    

      </div>

    

    

    

    <div class="address">

    

    

    <h3>Office:</h3>

    

    

    <p><?php echo $siteName;

 ?><br/>

    

    

    

    <?php

    

    

    

    if (!empty($address)) {

    

    

    

    

    echo $address['street'] . '<br />' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip'] . '<br />';



    

    

    

    }

    

    

    

    ?>

    

    

    

    <span class="dskt_view"><a class="dskt_view"><?php echo $phone;

 ?></a></span><a class="mob_view" href="tel:<?php echo $phone;

 ?>"><?php echo $phone;

 ?></a><br/>

    

    

    

    Email :  <a href="mailto:<?php echo $email;

 ?>"><?php echo $email;

 ?></a>

    

    

    </p>

    

    </div>

    

    <div class="hours">

    

    

    <h3>Hours:</h3>

    

    

    <p><span>Monday :</span><span>8:00 am - 7:00 pm</span></p>

    

    

    <p><span>Tuesday :</span><span>8:00 am - 7:00 pm</span></p>

    

    

    <p><span>Wednesday :</span><span>8:00 am - 7:00 pm</span></p>

    

    

    <p><span>Thursday :</span><span>8:00 am - 7:00 pm</span></p>

    

    

    <p><span>Friday :</span><span>8:00 am - 7:00 pm</span></p>

    

    

    <p><span>Saturday :</span><span>Open for Emergencies</span></p>

    

    

    <p><span>Sunday :</span><span>9:00 am - 7:00 pm</span></p>

    

    </div>

    </div></div>
	<?php include $pathToRoot . 'includes/contact-box.php';

 ?>
    <?php include $pathToRoot . 'includes/modal-covid.php'; ?>
 <?php include $pathToRoot . 'includes/footer.php';

 ?>