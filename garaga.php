<?php 
header("location:http://www.garaga.com/designcentre/selection/");
exit();

include './includes/header.php' ?>
<section class="banner inner_banner">

    <img src="images/about-us-banner.jpg" alt="">

    <div class="banner_text">

        <div class="wrapper">

            <div class="cont">

                <h2>GARAGE DOORS EXPERT</h2>

                <h5><?php echo $city_name . ",";  ?> <?php echo $state_name  ?> Top Rated Company</h5>

                <ul class="btn_list">

                    <li><a href="#" class="btn1" onclick="show_workiz()"  >BOOK AN APPOINTMENT</a></li>

                    <li><a href="#" class="btn2">

                            <img src="images/phone.svg" alt="" style="width: 26px;display: inline-block;">

                            <span class="respo">Call: </span><?=$printableNumber?></a>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</section>

<h1 class="headstrip">GARAGE DOOR DESIGN SERVICES IN MASSACHUSETTS</h1>
<div style="height: 100%;" >

<iframe id="amarr" src="http://www.garaga.com/designcentre/selection/" style="width: 100%;height: 1200px; " frameborder="0"></iframe>

</div>

<?php include './includes/footer.php' ?>