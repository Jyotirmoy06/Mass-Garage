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
                <source srcset="/images/commercial-garage-door-mobile.webp" media="(max-width: 600px)">
                <source srcset="/images/commercial-garage-door.webp">
                <img src="/images/commercial-garage-door.webp" alt="Flowers" style="width:auto;">
            </picture>

        </div>

    </div>
    <div class="cont service_cont white_section">

        <h3>HIGHLY RATED INDUSTRIAL GARAGE DOOR SPECIALISTS</h3>
        <div class="parags">
            <p>
                You've already chosen us to deliver you superior service for your home garage door repairs, maintenance, and installations. However, did you know that as your experienced garage door technician, we also in the business of commercial garage doors? With our quick emergency response time, our licensed, bonded, and insured tech can be at your site and have you and your clients on the road again. When your business relies on delivery, shipping, storage or workspace, you can trust us to keep you open when you are on the job and secure up tight in the end of your day. 
            </p>
            <br/>
            <p>  
                With over a decade of experience, Mass Garage Door Expert are qualified professionals skilled and proficient in every aspect of commercial and industrial remote and manually operated door repair services. Within the <?=$city_name?> area, you rely on deliveries, shipments, and customers having immediate access to your products. Whether your commercial-grade door fails to open, a lock won’t secure, or a torsion spring renders your delivery door inoperable, you lose time, money, product, profitability, and your client’s trust. A garage door relies on a finely calibrated series of parts that must function together. That is why we partner with only top-notch industry parts providers with brand names you can also rely on. You’ve come to expect the best, and the best is what we expect you to receive. Day or night, holiday, and emergency services included.
            </p>    
            <br/>
            <ul class="shortPoints">
                <li class="points">Cables</li>
                <li class="points">Springs</li>
                <li class="points">Tracking</li>
                <li class="points">Auto Openers/lock</li>
                <li class="points">Sensors</li>
            </ul>
        </div>

    </div>
</section>

<?php 
$image_position = "";
?>