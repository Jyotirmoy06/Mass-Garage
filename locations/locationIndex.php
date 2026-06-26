<?php
ob_start();
// header("HTTP/1.0 404 Not Found");
// http_response_code(404);

// header('HTTP/1.1 404 Unauthorized');
// http_response_code(404);
// print(http_response_code());
// die();

session_start();
include '../Functions/Database.php';


$url= $_SERVER['REQUEST_URI'];   
$explodedUrl = explode('/', $url);

$citySlug = $explodedUrl[3];
$city = ucfirst(str_replace("-", " ", $citySlug));
$countySlug = $explodedUrl[2];
$county = ucfirst(str_replace("-", " ", $countySlug));

$db = new Database();
$defaultData = $db->read_query('location_page_contents', [], ['id' => 1], 1);
$defaultData = $defaultData[0];


// $locationData = $db->read_query('location_page_contents', [], ['citySlug' => $citySlug, 'countySlug' => $countySlug, 'status' => 1], 1);

$urlSlug = "/".$countySlug."/".$citySlug."/";
$locationData = $db->read_query('location_page_contents', [], ['slug' => $urlSlug, 'status' => 1], 1);
$locationData = $locationData[0];
// var_dump($locationData);
// echo "<br/>";

function changeDefaultText($fullString, $city, $county)
{
    $firstReplace = str_replace("{CITY}", $city, $fullString);
    // $secondReplace = str_replace("{PHONE}", $printableNumber, $firstReplace);
    $finalReplace = str_replace("{COUNTY}", $county, $firstReplace);
    return $finalReplace;
}

    // var_dump($countySlug);
    // echo "<br/>";
    // var_dump($citySlug);
    // echo "<br/>";

if(count($locationData) > 0)
{
    if(isset($countySlug) && isset($citySlug))
    {
        $cityName = ($locationData['city'] != "") ? $locationData['city'] : $city;
        $countyName = ($locationData['county'] != "") ? $locationData['county'] : $county;
        $image = ($locationData['image'] != "") ? $locationData['image'] : $defaultData['image'];
        $map = ($locationData['map'] != "") ? $locationData['map'] : $defaultData['map'];
        $metaTitle = ($locationData['metaTitle'] != "") ? $locationData['metaTitle'] : changeDefaultText($defaultData['metaTitle'], $city,$county);
        $metaDescription = ($locationData['metaDescription'] != "") ? $locationData['metaDescription'] : changeDefaultText($defaultData['metaDescription'], $city,$county);
        $h1 = ($locationData['h1'] != "") ? $locationData['h1'] : changeDefaultText($defaultData['h1'], $city,$county);
        $topBlackH3 = ($locationData['topBlackH3'] != "") ? $locationData['topBlackH3'] : changeDefaultText($defaultData['topBlackH3'], $city,$county);
        $topBlackHtml = ($locationData['topBlackHtml'] != "") ? $locationData['topBlackHtml'] : changeDefaultText($defaultData['topBlackHtml'], $city,$county);
        $textBlockTopLeft = ($locationData['textBlockTopLeft'] != "") ? $locationData['textBlockTopLeft'] : changeDefaultText($defaultData['textBlockTopLeft'], $city,$county);
        $blackTextSection1 = ($locationData['blackTextSection1'] != "") ? $locationData['blackTextSection1'] : changeDefaultText($defaultData['blackTextSection1'], $city,$county);
        $textBlock2ndRight = ($locationData['textBlock2ndRight'] != "") ? $locationData['textBlock2ndRight'] : changeDefaultText($defaultData['textBlock2ndRight'], $city,$county);
        $blackTextSection2 = ($locationData['blackTextSection2'] != "") ? $locationData['blackTextSection2'] : changeDefaultText($defaultData['blackTextSection2'], $city,$county);
        $textBlockBottomLeft = ($locationData['textBlockBottomLeft'] != "") ? $locationData['textBlockBottomLeft'] : changeDefaultText($defaultData['textBlockBottomLeft'], $city,$county);
        // $stateName = "";
    }
    else
    {
        // header("HTTP/1.0 404 Not Found");

        // echo 1;die();
        header("Location:  https://massgaragedoorsexpert.com/404.html");
        die();
    }
}
else
{
    // echo 1;die();
    // flush();
    header("Location:  https://massgaragedoorsexpert.com/404.html");
    die('');

}


// var_dump($defaultData['id']);
// echo "<br/><br/><br/>";
// var_dump($locationData);

$meta_Title = $metaTitle;
$meta_Description = $metaDescription;
$meta_url = 'https://massgaragedoorsexpert.com/bristol-county';
$meta_ogTitle = 'Bristol County';
$pageType="locationPage";

include '../includes/header.php';

function updateContentPhoneNumber($fullString, $printableNumber)
{
    $phoneLink = "<a href='tel: $printableNumber'>".$printableNumber."</a>";
    $updatedContent = str_replace("{PHONE}", $phoneLink, $fullString);
    return $updatedContent;
}

?>

<?php // include '../includes/header.php' ?>
<link rel="stylesheet" href="./css/locations.style.css">
<style>

    .tt-capitalize {
        text-transform: capitalize !important;
    }

    @media (min-width: 991px){
        #firstSection .white_section, #secondSection .white_section, #thirdSection{
            height: auto;
            padding-top: 0;
        }
        .split_row .cont {
            padding: 1vw;
        }
    }

    @media (max-width: 800px) {
        .headstrip {
            height: auto !important;
            padding: 3px 10px;
        }
        .white_section {
            height: auto !important;
        }
    }

    @media only screen and (max-device-width: 600px) {
        .dskt_view {
            display: none !important;
        }
        .mob_view {
            display: inline-block !important;
        }
        .banner .banner_text {
            top: 122px !important;
        }
        .banner.inner_banner > img {
            height: 475px !important;
        }
    }

    @media only screen and (min-device-width: 600px) {
        .dskt_view {
            display: inline-block !important;
        }
        .mob_view {
            display: none !important;
        }
    }


</style>
<div id="fullLocationContentDiv">
<section class="banner inner_banner">
    <?php // include '../banner-image.php' ?>
    <img src="/images/about-us-banner.jpg" srcset="/images/residential-banner-clear-garage-door.webp 600w,/images/residential-banner-clear-garage-door.webp 980w,/images/about-us-banner.webp" alt="" loading="lazy">
    <div class="banner_text">
        <div class="wrapper">
            <div class="cont">
                <?php
                    if($cityName == "Newton")
                    {
                        echo "<h1 style='font-size: 36px;'>Repair, Installation <br/> and 24/7 Emergency Service</h1>";
                    }
                    else
                    {
                        echo "<h1>GARAGE DOORS REPAIR IN ".$cityName."</h1>";
                    }
                ?>
                

                <text class="punchline-text"><?php echo $cityName;?><?php //echo ", ".$state_name;  ?>, MASSACHUSETTS Top Rated Company</text>
                <ul class="btn_list">
                    <li><a href="#" class="btn1" onclick="show_workiz()">BOOK AN APPOINTMENT</a></li>
                    <li><a href="#" class="btn2">
                        <img loading="lazy" src="/images/phone-.svg" alt="" style="width: 26px;display: inline-block;">
                        <span class="respo">Call: </span><?= $printableNumber ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<h2 class="headstrip tt-capitalize">
    <?=$h1?>
</h2>
<section class="dividers black_dividers d-inherit">
    <div class="wrapper">
        <h3 class="tt-capitalize" style="margin: 10px 70px;"><?=$topBlackH3?></h3>
        <hr style="background: white; height: 2px; width: 100%; margin-top: 20px; margin-bottom: 20px;">
        <div class="flex_container">
            <div class="split_row">
                <p><?= updateContentPhoneNumber($topBlackHtml, $printableNumber);?></p>
                
            </div>
        </div> 
    </div>
</section>

<section class="split_row service_split_row" id="firstSection">
    <div class="cont service_cont">
        <?=$textBlockTopLeft?>
    </div>
    <div class="service_cont_img fade dskt_view">
        <iframe src="<?=$map?>" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class="service_cont_img fade mob_view">
        <iframe src="<?=$map?>" width="100%" height="375" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>


<section class="black_dividers dividers">
    <div class="wrapper">
        <?=$blackTextSection1?>
    </div>
</section>

<section class="split_row service_split_row">
    <div>
        <div class="service_cont_img fade">
            <div class="numbertext"></div>
            <img src="<?=$image?>" alt="" loading="lazy">
        </div>
    </div>
    <!-- carousel-->
    <div class="cont service_cont white_section" id="thirdSection">
        <?=$textBlock2ndRight?>
    </div>
</section>

<section class="black_dividers dividers">
    <div class="wrapper">
        <?=$blackTextSection2?>
    </div>
</section>

<section class="split_row service_split_row" id="secondSection">
    <div class="cont service_cont white_section">
        <?=$textBlockBottomLeft?>
    </div>
    <div class="service_cont_img fade dskt_view">
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/LMbMW_6CYOo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
    </div>
    <div class="service_cont_img fade mob_view">
        <iframe width="100%" height="90%" src="https://www.youtube.com/embed/LMbMW_6CYOo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
    </div>
</section>

<section class="dividers black_dividers" style="height: 100%;">

    <div class="wrapper">
        <a name="residential"></a>
        <h3>Reach Out to Us</h3>
        <p>Our friendly and trustworthy technicians are available whenever you need them. We serve clients in the Greater Boston, area as well as the counties of Suffolk, Middlesex, Norfolk, and Essex, MA. We would also appreciate any feedback from our valued clients. If you have any questions about our services or rates, feel free to get in touch with us. We always look forward to hearing from you!</p>
        <br/>
        <h4 style="letter-spacing: 0.8px;">For your free initial consultation and follow up service inspection</h4>
        <button onclick="show_workiz()" role="button" id="book_an_appointment" class="btn1">BOOK AN APPOINTMENT</button>
        
        <h3 style="margin-top: 30px;">Thank You!</h3>
        <p>We are looking forward to meeting you and satisfying you with the solutions you deserve.</p>
    </div>

</section>
</div>

<?php 
    include '../includes/footer.php';
    ob_end_flush();
?>
