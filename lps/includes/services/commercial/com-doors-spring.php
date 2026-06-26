<?php 
$display_position = "";
if(isset($image_position) && $image_position == 'right')
{ 
 $display_position = 'flex-direction: row-reverse;';
}?> 

<section class="split_row service_split_row" style="<?=$display_position?>" > 
    <div>
        <div class="service_cont_img">
            <picture>
                <source srcset="/images/broken-spring1.webp" media="(max-width: 600px)">
                <source srcset="/images/broken-spring1.webp">
                <img src="/images/broken-spring1.webp" alt="Flowers" style="width:auto;">
            </picture>
        </div>
    </div>
    <div class="cont service_cont white_section">
    
        <h3>Spring Repair: A Vital Service for Commercial Businesses</h3>
        <div class="parags">
            <p>Garage door springs are a critical component of commercial garage doors, providing the necessary tension and counterbalance for proper operation. When springs become damaged, worn, or broken, it can lead to safety hazards and operational disruptions. That's why professional spring repair services are essential for maintaining the efficiency and reliability of your commercial garage doors.</p>
            <br/>
            <p>Mass Garage Doors Expert offers expert spring repair services for commercial garage doors. Our technicians have the experience and expertise to diagnose and address various spring issues, including:</p>
            <br/>
            <ul style="text-align: left;">
                <li class="points"><b>Broken springs:</b> We can safely and efficiently replace broken springs, restoring your garage door's functionality.</li>
                <li class="points"><b>Worn springs:</b> We can assess the condition of your springs and recommend replacement if necessary to prevent future failures.</li>
                <li class="points"><b>Incorrect spring tension:</b> We can adjust spring tension to ensure proper balance and smooth operation of your garage door.</li>
                <li class="points"><b>Spring alignment issues:</b> We can realign springs that have become misaligned, preventing uneven operation and potential damage.</li>
            </ul>
        </div>

    </div>
</section>
<?php 
$image_position = "";
?>