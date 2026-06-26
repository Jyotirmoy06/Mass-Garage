<section class="banner bg-white inner_banner test_banner">

    <?php// include '../banner-image.php' ?>

    <div class="row">
        <div class="col-md-4 banner-left-outer-block">
            <div class="banner-left-inner-block">
                <h1 style="font-size: 35px !important;"><?php echo $title ?></h1>
                <p style="font-size: 20px!important;">
                    <?php echo $city_name . ",";  ?> <?php echo $state_name  ?> Top Rated Company
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <!-- <img src="/images/garage-door-repair-cropped.webp" srcset="/images/garage-door-repair-cropped.webp 600w,/images/garage-door-repair-cropped.webp 980w,/images/garage-door-repair-cropped.webp" alt="" loading="lazy"> -->
            <img src="<?=$img_url?>" srcset="<?=$img_url?> 600w,<?=$img_url?> 980w,<?=$img_url?>" alt="" loading="lazy">
        </div>
        <div class="col-md-4 banner-left-outer-block">

            <div class="banner-left-inner-block">
                <li>
                    <button onclick="show_workiz()" role="button" id="book_an_appointment" class="btn1">BOOK AN APPOINTMENT</button>
                </li>
                <li><b>OR</b></li>
                <li>
                    <a href="tel:<?= $printableNumber ?>" class="btn2">
                    <img loading="lazy" src="/images/phone-.svg" alt="" style="width: 26px;display: inline-block;">
                    <span class="respo">Call: </span><?= $printableNumber ?></a>
                </li>
            </div>

        </div>

    </div>


</section>