
<section class="split_row service_split_row" id="firstSection">

    <div class="cont service_cont white_section d-webkit-box">
        <h3>Commercial Garage Door Repair in <?=$city_name?> and the surrounding areas</h3>
        <p>
            We're a trusted service provider in the region, known for our expertise in diagnosing and repairing all commercial garage door issues. From malfunctioning openers to worn-out springs, our technicians have more than 15 years of experience and can quickly identify the problem and get your business open and functioning smoothly again.
        </p>
        <br/>
        <p>
            Mass Garage Door is operating and fully insured in <?=$city_name?> and the surrounding towns.
        </p>
        <br/>
        <p>
            We have a 24/7 emergency service. Our mission is to provide you with 100% customer satisfaction.
        </p>
    </div>
    <!-- carousel-->
    <div>
        <div class="service_cont_img fade">
            
            <?php
                $showRadiusMap = "false";
                // if(format_mapType == "locationIDCity")
                if($trafficSource->getTrafficSource() == "Google Ads" && $mapLocationDB != "")
                {
                    // city specific
                    // var_dump("1111111111");
            ?> 
                    <!-- Map code for city specific dotted line maps -->
                    <iframe src="<?php echo $mapLocationDB;?>"  width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen="" loading="lazy"></iframe>
            <?php
                }
                elseif ( $trafficSource->getTrafficSource() == "Google Ads" && $mapLocationDB == "") 
                {
                    // boston 25 miles 
                    // Will be auto generated under the id=map section by JS
                    $showRadiusMap = "true";
            ?>
                    <div id="map" style="width: 100%; height: 100%;"></div>
            <?php
                }
                else 
                {
                    $showRadiusMap = "true";
            ?>
                    <div id="map" style="width: 100%; height: 100%;"></div>
            <?php
                }
            ?>

        </div>
    </div>

</section>