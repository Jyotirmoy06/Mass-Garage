<?php
session_start();
$page_id = "calendar_page";
$meta_Title = 'Garage Door Repair Booking in Massachusetts';
$meta_Description = 'For premier garage door services around Massachusetts, consider Mass Garage Doors Expert. Contact our team today for a free quote!';
$meta_url='https://massgaragedoorsexpert.com/calendar';
$meta_ogTitle='Services';
?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/header.php' ?>


<section class="banner inner_banner">

    <img src="/images/about-us-banner.jpg" alt="">

    <div class="banner_text">

        <div class="wrapper">

            <div class="cont">

                <h2>GARAGE DOORS EXPERT</h2>

                <h5><?php echo $city_name . ",";  ?> <?php echo $state_name  ?> Top Rated Company</h5>

                <ul class="btn_list">

                    <li><a href="#" class="btn2">

                            <img src="/images/phone.svg" alt="" style="width: 26px;display: inline-block;">

                            <span class="respo">Call: </span><?=$printableNumber?></a>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</section>

<h1 class="headstrip">GARAGE DOOR EXPERTS FOR MASSACHUSETTS</h1>

<section class="about_row1">

    <div class="wrapper">

        <div class="wrapper">
            <div style="text-align:center;">
                <a style="width: 30%; font-size: 25px;" href="#" class="btn1" onclick="show_workiz()">SCHEDULE AN APPOINTMENT</a>  
            </div>
        </div>

    </div>

</section>



<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php' ?>
<script type="text/javascript">
        window.onload = show_workiz();
</script>
