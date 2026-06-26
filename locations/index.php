<?php
session_start();
include '../includes/header.php';


$citySlug = $_GET["city"];
$city = str_replace("-", " ", $citySlug);
$countySlug = $_GET["county"];
$county = str_replace("-", " ", $countySlug);


$db = new Database();
// $db->read_query('number_pool', [], ['phone_no' => $twilioNo], 1);
$defaultData = $db->read_query('location_page_contents', [], ['id' => 1], 1);
$defaultData = $defaultData[0];

$locationData = $db->read_query('location_page_contents', [], ['citySlug' => $citySlug, 'countySlug' => $countySlug, 'status' => 1], 1);
$locationData = $locationData[0];

if(isset($_GET["city"]) && isset($_GET["county"]))
{
    $cityName = ($locationData['city'] != "") ? $locationData['city'] : $_GET["city"];
    $countyName = ($locationData['county'] != "") ? $locationData['county'] : $_GET["city"];
    $image = ($locationData['image'] != "") ? $locationData['image'] : $defaultData['image'];
    $map = ($locationData['map'] != "") ? $locationData['map'] : $defaultData['map'];
    $metaTitle = ($locationData['metaTitle'] != "") ? $locationData['metaTitle'] : $defaultData['metaTitle'];
    $metaDescription = ($locationData['metaDescription'] != "") ? $locationData['metaDescription'] : $defaultData['metaDescription'];
    $h1 = ($locationData['h1'] != "") ? $locationData['h1'] : $defaultData['h1'];
    $topBlackH3 = ($locationData['topBlackH3'] != "") ? $locationData['topBlackH3'] : $defaultData['topBlackH3'];
    $topBlackHtml = ($locationData['topBlackHtml'] != "") ? $locationData['topBlackHtml'] : $defaultData['topBlackHtml'];
    $textBlockTopLeft = ($locationData['textBlockTopLeft'] != "") ? $locationData['textBlockTopLeft'] : $defaultData['textBlockTopLeft'];
    $blackTextSection1 = ($locationData['blackTextSection1'] != "") ? $locationData['blackTextSection1'] : $defaultData['blackTextSection1'];
    $textBlock2ndRight = ($locationData['textBlock2ndRight'] != "") ? $locationData['textBlock2ndRight'] : $defaultData['textBlock2ndRight'];
    $blackTextSection2 = ($locationData['blackTextSection2'] != "") ? $locationData['blackTextSection2'] : $defaultData['blackTextSection2'];
    $textBlockBottomLeft = ($locationData['textBlockBottomLeft'] != "") ? $locationData['textBlockBottomLeft'] : $defaultData['textBlockBottomLeft'];
    // $stateName = "";
}
else
{
    // header("HTTP/1.0 404 Not Found");
    http_response_code(404);
    die();
}

// var_dump($defaultData['id']);
// echo "<br/><br/><br/>";
// var_dump($locationData);

$meta_Title = 'Garage Door Installation for Bristol County, MA';
$meta_Description = 'Mass Garage Doors Expert is ready to provide you with garage door repair and installation around Bristol County, MA. Request a quote today!';
$meta_url = 'https://massgaragedoorsexpert.com/bristol-county';
$meta_ogTitle = 'Bristol County';
?>

<?php // include '../includes/header.php' ?>
<link rel="stylesheet" href="./css/locations.style.css">
<style>
    @media (min-width: 991px){
        #firstSection .white_section, #secondSection .white_section, #thirdSection{
            height: auto;
            padding-top: 0;
        }
        .split_row .cont {
            padding: 1vw;
        }
    }
</style>
<div id="fullLocationContentDiv">
<section class="banner inner_banner">
    <?php include '../banner-image.php' ?>
    <div class="banner_text">
        <div class="wrapper">
            <div class="cont">
                <h2>GARAGE DOORS EXPERT</h2>
                <h5><?php echo $countyName . ",";  ?> <?php echo $state_name  ?> Top Rated Company</h5>
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


<h1 class="headstrip">
    <?=$h1?>
</h1>
<section class="dividers black_dividers d-inherit">
    <div class="wrapper">
        <h3 style="margin: 10px 70px;"><?=$topBlackH3?></h3>
        <hr style="background: white; height: 2px; width: 100%; margin-top: 20px; margin-bottom: 20px;">
        <div class="flex_container">
            <div class="split_row">
                <p><?=$topBlackHtml?></p>
                <!-- <div class="cont" style="font-size: 15px; ">
                    <p class="text-white-center">Easton</p>    
                </div>
                <div class="cont" style="font-size: 15px; ">
                    <p class="text-white-center">North Easton</p>
                </div>
                <div class="cont" style="font-size: 15px; ">
                    <p class="text-white-center">South Easton</p>
                </div>
                <div class="cont" style="font-size: 15px; ">
                    <p class="text-white-center">Mansfield</p>
                </div> -->
            </div>
        </div> 
    </div>
</section>

<section class="split_row service_split_row" id="firstSection">
    <div class="cont service_cont">
        <?=$textBlockTopLeft?>
    </div>
    <div class="service_cont_img fade">
        <iframe src="<?=$map?>" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
    <div class="service_cont_img fade">
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/LMbMW_6CYOo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
    </div>
</section>





<section class="dividers black_dividers" style="height: 100%;">

    <div class="wrapper">
        <a name="residential"></a>
        <h3>Reach Out to Us</h3>
        <p>Our friendly and trustworthy technicians are available whenever you need them. We serve clients in the Greater Boston, area as well as the counties of Suffolk, Middlesex, Norfolk, and Essex, MA. We would also appreciate any feedback from our valued clients. If you have any questions about our services or rates, feel free to get in touch with us. We always look forward to hearing from you!</p>
        <button onclick="show_workiz()" role="button" id="book_an_appointment" class="btn1">BOOK AN APPOINTMENT</button>
    </div>

</section>
</div>

<script>
    $(document).ready(function(){ 
        var updatedContent = $("#fullLocationContentDiv").html().replace('{COUNTY}', '<?=$county?>').replace('{CITY}', '<?=$city?>');
        $("#fullLocationContentDiv").html(updatedContent);
    });
</script>
<?php include '../includes/footer.php' ?>
