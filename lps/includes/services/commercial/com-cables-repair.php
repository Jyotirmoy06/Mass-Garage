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
                <source srcset="/images/cable_repair.webp" media="(max-width: 600px)">
                <source srcset="/images/cable_repair.webp">
                <img src="/images/cable_repair.webp" alt="Flowers" style="width:auto;">
            </picture>
        </div>

    </div>
    <div class="cont service_cont white_section">
        <div class="parags">    
            <h3>Commercial Garage Door Cable Repair</h3>
            <p>Garage door cables are a vital component of commercial garage doors, providing the necessary strength and support for proper operation. When cables become damaged, worn, or broken, it can lead to safety hazards and operational disruptions. That's why professional cable repair services are essential for maintaining the efficiency and reliability of your commercial garage doors.</p>
            <br>
            <p>Our technicians have the experience and expertise to diagnose and address various cable issues, including:</p>
            <br>
            <ul style="text-align: left;">
                <li class="points"><b>Broken cables:</b> We can quickly and efficiently replace broken cables to restore your garage door's functionality.</li>
                <li class="points"><b>Worn cables:</b> We can assess the condition of your cables and recommend replacement if necessary to prevent future failures. </li>
                <li class="points"><b>Misaligned cables:</b> We can realign cables that have become misaligned, ensuring smooth and safe operation.</li>
                <li class="points"><b>Cable routing issues:</b> We can inspect and correct any cable routing problems that may be affecting your garage door's performance.</li>
            </ul>
        </div>
    </div>
</section>

<?php 
$image_position = "";
?>