<section class="banner bg-white inner_banner test_banner">

    <?php // include '../banner-image.php' ?>

    <div class="text-center">
        <div class="col-md-4 banner-left-outer-block">
            <div class="banner-left-inner-block">
                <h1 style="font-size: 35px !important;"><?php echo $title ?></h1>
                <!-- <p style="font-size: 20px!important;"> -->
                <text class="punchline-text">    
                    <?php echo $city_name . ",";  ?> <?php echo $state_name  ?> Top Rated Company
                </text>
                <!-- </p> -->
            </div>
        </div>
        <div class="col-md-4 img-col">
            <!-- <div class="img-col"></div> -->
            <!-- <img src="/images/garage-door-repair-cropped.webp" srcset="/images/garage-door-repair-cropped.webp 600w,/images/garage-door-repair-cropped.webp 980w,/images/garage-door-repair-cropped.webp" alt="" loading="lazy"> -->
                
            <div class="">
                <img src="<?=$img_url?>" srcset="<?=$img_url?> 600w,<?=$img_url?> 980w,<?=$img_url?>" alt="" loading="lazy">
            </div>
            <!-- <div class="img-col"></div> -->
        </div>
        <!-- <div class="col-md-4 banner-left-outer-block btn-block">

            

        </div> -->

    </div>


</section>