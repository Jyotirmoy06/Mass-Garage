<?php
session_start();
$meta_Title = 'Garage Door Repair in Massachusetts';
$meta_Description = 'For premier garage door services around Massachusetts, consider Mass Garage Doors Expert. Contact our team today for a free quote!';
$meta_url='https://massgaragedoorsexpert.com/services';
$meta_ogTitle='Services';
?> 
<?php include './includes/header.php' ?> 

<style>
  .d-none 
  {
      display: none !important;
  }

  .d-block 
  {
      display: block !important;
  }

 .d-webkit-box 
  {
      display: -webkit-box !important;
  }
    
  .points 
  {
      margin-left:1.2em; 
      list-style: disc; 
      font-size: 15px; 
      line-height: 23px;
      color:#494949;

  }

  .parags 
  {
      text-align: left;
  }

  .footer_youtube_video 
  {
      height: auto !important;
  }

  .shortPoints 
  {
      text-align: left;
  }

  .disclist 
  {
      list-style: disc; 
      text-align:left;
  }

  .img-fix-mobile 
  {
      object-fit: none;
  }

  .banner.inner_banner .banner_text .cont 
  {
      width: auto;
      max-width: none;
      display: inline-block;
  }

  .service_split_row{
    height: 800px;
  }

  .split_row .cont {
    display: block;
  }
  
  @media only screen and (max-device-width: 600px) 
  {
      .dskt_view 
      {
          display: none !important;
      }
      .mob_view 
      {
          display: inline-block !important;
      }
      .banner .banner_text 
      {
          top: 118px !important;
      }
      .banner.inner_banner > img 
      {
          height: 460px !important;
      }
      .shortPoints 
      {
          margin-left: -50%;
          text-align: left;
      }
  }

  @media only screen and (min-device-width: 600px) 
  {
        .dskt_view 
        {
            display: inline-block !important;
        }
        .mob_view 
        {
            display: none !important;
        }
    }
    

    @media screen and (max-width: 980px) 
    {
        .service_cont_img 
        {
            height: 400px;
        }

        .footer_youtube_video 
        {
            border: solid 3px #fff;
            border-radius: 4px;
            padding: 0 !important;
        }
        .img-fix-mobile 
        {
            object-fit: fill;
        }

        .points 
        {
            padding-left: 0; 
        }
        .parags 
        {
            text-align: left;
        }

        .split_row .cont p 
        {
            text-align: left !important;
        }

        .service_split_row 
        {
            display: inline-table;
        }
    }

    @media only screen and (max-device-width: 601px)
     {
        .shortPoints{
            margin-left: 0;
        }
    }


</style>


<section class="banner inner_banner service_banner">
<?php // include './banner-image.php' ?>

<img src="/images/about-us-banner.jpg" srcset="/images/residential-banner-clear-garage-door.webp 600w,/images/residential-banner-clear-garage-door.webp 980w,/images/about-us-banner.webp" alt="" loading="lazy">
  <div class="banner_text">
    <div class="wrapper">
      <div class="cont">
        <h1>GARAGE DOORS EXPERT</h1>
        <h5> <?php echo $city_name . ",";  ?> <?php echo $state_name  ?> Top Rated Company </h5>
        <ul class="btn_list">
          <li>
            <a href="#" class="btn1" onclick="show_workiz()">BOOK AN APPOINTMENT</a>
          </li>
          <li>
            <a href="#" class="btn2">
              <img src="/images/phone-.svg" alt="" style="width: 26px;display: inline-block;">
              <span class="respo">Call: </span> <?=$printableNumber?> </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<h2 class="headstrip">GARAGE DOOR SERVICES FOR MASSACHUSETTS</h2>
<?php 
include './lps/includes/services/testimonials.php';

##### DOOR REPAIRS ####
// residentials
include './lps/includes/services/residential/res-doors-repair.php' ;
include './lps/includes/services/residential/res-door-woes.php';
// commercial
$image_position = 'right';
include './lps/includes/services/commercial/com-doors-repair.php' ;
include './lps/includes/services/commercial/com-dontsettle-forless.php' ;

##### SPRING ####
// residentials
include './lps/includes/services/residential/res-doors-spring.php' ;
include './lps/includes/services/residential/res-silent-threat.php';
// commercial
$image_position = 'right';
include './lps/includes/services/commercial/com-doors-spring.php' ;
include './lps/includes/services/commercial/com-silent-threat.php' ;

##### CABLES ####
// residentials
include './lps/includes/services/residential/res-cable-replacement.php' ;
include './lps/includes/services/residential/res-unsung-lifeline.php';
// commercial
$image_position = 'right';
include './lps/includes/services/commercial/com-cables-repair.php' ;
include './lps/includes/services/commercial/com-unsung-lifeline.php' ;

##### OPENERS ####
// residentials
include './lps/includes/services/residential/res-doors-opener.php' ;
include './lps/includes/services/residential/res-manual-magic.php';
// commercial
$image_position = 'right';
include './lps/includes/services/commercial/com-doors-opener.php' ;
// include './lps/includes/services/commercial/com-manual-magic.php' ;


include './lps/includes/reach-out-to-us.php' ;

include './includes/footer.php' ;

?>