<?php

ob_start();
// session_start();

date_default_timezone_set('US/Eastern');

if (empty($meta_Title)) {
    $meta_Title = 'Mass Garage Doors Expert';
    $meta_Description = 'Mass Garage Doors Expert';
    $meta_ogTitle = $meta_Title;
}
if (isset($folder_Depth) && $folder_Depth == 1) {
    include "../Functions/CallTracking.php";
    spl_autoload_register(function ($class_name) {

        // include "../Functions/CallTracking.php";
        include '../Functions/' . $class_name . '.php';
    });
} else {
    // require "Functions/CallTracking.php";
    include $_SERVER['DOCUMENT_ROOT'] . '/Functions/CallTracking.php';
    spl_autoload_register(function ($class_name) {
        // require "Functions/CallTracking.php";
        // include 'Functions/' . $class_name . '.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/Functions/' . $class_name . '.php';
    });
}
if (!empty($_COOKIE['trafficSource'])) {
    $previousTrafficSource = $_COOKIE['trafficSource'];
} else {
    $previousTrafficSource = "";
}
$trafficSource = new TrafficSource(); //set the traffic source in a cookie
$callTracking = new CallTracking();
$printableNumber = $callTracking->initialize($trafficSource->getTrafficSource(), $previousTrafficSource);

// var_dump($printableNumber);
// var_dump($trafficSource->getTrafficSource());

if($trafficSource->getTrafficSource() == "Yelp")
{
    $printableNumber = "617-744-4384";
}
elseif($trafficSource->getTrafficSource() == "Google My Business")
{
    $printableNumber = "617-996-7574";
}
elseif($trafficSource->getTrafficSource() == "Facebook")
{
    $printableNumber = "617-693-0999";
}
elseif($trafficSource->getTrafficSource() == "SEO")
{
    $printableNumber = "617-693-5485";
}

if($printableNumber == "")
{
   $printableNumber = "888-989-8758"; 
}

$meta_Description = str_replace("888-989-8758", $printableNumber, $meta_Description);
// $bookingObj = new Book_Now(); // Initializing the booking URL ahead of time
$cityState = new CityState;
$city_name =  $cityState->get_city();
$state_name = $cityState->get_state();

if($city_name != "Greater Boston")
{
    // var_dump($city_name);
    $mapLocationDB = $cityState->getMapLocationByCity($city_name);
}

#Company Information
$addressLine1 = '1925 Commonwealth Ave Unit 715';
$addressLine2 = 'Boston, MA 02135';
$hoursOperationLine1 = 'Monday - Thursday : 8 AM - 6 PM';
$hoursOperationLine2 = 'Friday - Sunday : Closed';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- SearchAtlas OTTO SEO script below -->
    <!-- <script nowprocket nitro-exclude type="text/javascript" id="sa-dynamic-optimization" data-uuid="c17d09b9-3c4b-4e28-a368-18d5e5b79174" src="data:text/javascript;base64,dmFyIHNjcmlwdCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoInNjcmlwdCIpO3NjcmlwdC5zZXRBdHRyaWJ1dGUoIm5vd3Byb2NrZXQiLCAiIik7c2NyaXB0LnNldEF0dHJpYnV0ZSgibml0cm8tZXhjbHVkZSIsICIiKTtzY3JpcHQuc3JjID0gImh0dHBzOi8vZGFzaGJvYXJkLnNlYXJjaGF0bGFzLmNvbS9zY3JpcHRzL2R5bmFtaWNfb3B0aW1pemF0aW9uLmpzIjtzY3JpcHQuZGF0YXNldC51dWlkID0gImMxN2QwOWI5LTNjNGItNGUyOC1hMzY4LTE4ZDVlNWI3OTE3NCI7c2NyaXB0LmlkID0gInNhLWR5bmFtaWMtb3B0aW1pemF0aW9uLWxvYWRlciI7ZG9jdW1lbnQuaGVhZC5hcHBlbmRDaGlsZChzY3JpcHQpOw=="></script> -->
    <title><?php echo $meta_Title; ?></title>
    <meta charset="utf-8">
    <meta name="description" content="<?php echo $meta_Description; ?>">
    <meta property="og:url" content="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI];" ?>">
    <meta property="og:title" content="<?php echo $meta_Title; ?> ">
    <meta property="og:description" content="<?php echo $meta_Description; ?> ">
    <meta name="keywords" content="Mass Garage Doors Expert">

    <?php
    if (isset($noIndexNoFollow) && $noIndexNoFollow == true) {
    ?>
        <meta name="robots" content="noindex, nofollow">
    <?php
    } else {
    ?>
        <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <?php
    }
    ?>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="Mass Garage Doors Expert">
    <meta property="article:publisher" content="https://www.facebook.com/garage.doors.services/">
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">

    <link href="/css/style.css?v=<?php echo rand(); ?>" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/services.style.css">

    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/owl.carousel.min.css?v=1.0">
    <script src="/js/owl.carousel.js"></script>

    <link href="/css/modal.css" type="text/css" rel="stylesheet" />
    <?php
//     <link href="/css/boxicons.min.css" type="text/css" rel="stylesheet" />
//     <script type="text/javascript" src="/js/porduct-gallery/xzoom.min.js"></script>
// <script src="/js/porduct-gallery/magnific-popup.js"></script>
?>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "LocalBusiness",
            "name": "Mass Garage Doors Expert",
            "image": "https://massgaragedoorsexpert.com/images/logo.png",
            "@id": "https://massgaragedoorsexpert.com",
            "url": "https://massgaragedoorsexpert.com/",
            "telephone": "+1(888)989-8758",
            "priceRange": "$$$",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "1925 Commonwealth Ave Unit 715 Boston",
                "addressLocality": "Boston",
                "addressRegion": "MA",
                "postalCode": "02135",
                "addressCountry": "US"
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday",
                    "Sunday"
                ],
                "opens": "00:00",
                "closes": "23:59"
            },
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.6",
                "reviewCount": "149"
            },

            "review": [{
                    "@type": "Review",
                    "author": {
                        "@type": "Person",
                        "name": "John Steurer"
                    },
                    "datePublished": "2021-12-16",
                    "description": "Excellent Communication and Quality Work! No guess work as to when they are showing up, and when they do, its fast efficient and their attention to detail is outstanding! I would highly recommend this company for anyone that needs garage door repair work.",

                    "reviewRating": {
                        "@type": "Rating",
                        "bestRating": "5",
                        "ratingValue": "5",
                        "worstRating": "1"
                    }
                },
                {
                    "@type": "Review",
                    "author": {
                        "@type": "Person",
                        "name": "Valerie DeNatale"
                    },
                    "datePublished": "2022-02-07",
                    "description": "I was impressed from the start; response time was very fast, very professional,  great communication and fair pricing.  Ronen's work is meticulous, his website easy to navigate and he's very easy to work with.  I would recommend Mass Garage Doors to family and friends.",

                    "reviewRating": {
                        "@type": "Rating",
                        "bestRating": "5",
                        "ratingValue": "5",
                        "worstRating": "1"
                    }
                }
            ]
        }
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-58XGGJD');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1PMLPDKCM7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-1PMLPDKCM7');
        gtag('config', 'AW-859841349');
    </script>

    <!--  ClickCease.com event tracking-->
    <script type='text/javascript'>
        function initCCConvertion(val) {
            window.ccConVal = val || 0;
            var script = document.createElement('script');
            var target = 'https://www.clickcease.com/monitor/cccontrack.js';
            var elem = document.head;
            script.type = 'text/javascript';
            script.src = target;
            elem.appendChild(script);
        }
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1PMLPDKCM7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-1PMLPDKCM7');
    </script>

    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '224679125625246');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=224679125625246&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Meta Pixel Code -->

</head>

<body id="page-top" data-spy="scroll" data-taget=".navbar-fixe-top">

    <!--  ClickCease.com tracking-->
    <script type='text/javascript'>
        var script = document.createElement('script');
        script.async = true;
        script.type = 'text/javascript';
        var target = 'https://www.clickcease.com/monitor/stat.js';
        script.src = target;
        var elem = document.head;
        elem.appendChild(script);
    </script>
    <noscript>
        <a href='https://www.clickcease.com' rel='nofollow'><img src='https://monitor.clickcease.com' alt='ClickCease' /></a>
    </noscript>
    <!--  ClickCease.com tracking-->

    <!--  ClickCease.com Conversion tracking-->
    <script type="text/javascript">
        ccConVal = 0;
        var script = document.createElement("script");
        script.async = true;
        script.type = "text/javascript";
        var target = 'https://www.clickcease.com/monitor/cccontrack.js';
        script.src = target;
        var elem = document.head;
        elem.appendChild(script);


        function initCCConvertion(val) {
            window.ccConVal = val || 0;
            var script = document.createElement('script');
            var target = 'https://www.clickcease.com/monitor/cccontrack.js';
            var elem = document.head;
            script.type = 'text/javascript';
            script.src = target;
            elem.appendChild(script);
        }
    </script>

    <noscript>
        <a href="https://www.clickcease.com" rel="nofollow"><img src="https://monitor.clickcease.com/conversions/conversions.aspx?value=0" alt="ClickCease" /></a>
    </noscript>
    <!--  ClickCease.com Conversion tracking-->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-58XGGJD"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <section class="main">



        <section class="header">



            <div class="grid">



                <div class="logo_div">



                    <a href="/" class="logo"><img loading="lazy" src="/images/logo.png" alt=""></a>



                </div>



                <div class="search">



                    <form action="">



                        <input type="text" name="search" id="" placeholder="Search...">



                        <input type="submit" name="submit">



                    </form>



                </div>



                <div class="head_menu">



                    <ul>



                        <li><a href="/experts/">Expert Advice</a></li>
                        <li><a href="https://store.massgaragedoorsexpert.com/">Shop</a></li>



                        <li><a href="/contact-us.php">Contact Us</a></li>



                    </ul>



                </div>



                <div class="number">



                    <ul>



                        <li class="languange" style="display: none;">



                            <img loading="lazy" src="/images/globe.svg" alt="" width="13"> en



                            <div class="langMenu">



                                <div class="wrapper">



                                    <ul>



                                        <li><a href="#">United States</a></li>



                                        <li><a href="#">Argentina</a></li>



                                        <li><a href="#">Australia</a></li>



                                        <li><a href="#">België/Belgique</a></li>



                                        <li><a href="#">Brasil</a></li>



                                        <li><a href="#">CANADA</a></li>



                                        <li><a href="#">Centroamérica y El Caribe</a></li>



                                        <li><a href="#">Česká republika</a></li>



                                        <li><a href="#">Chile</a></li>



                                        <li><a href="#">China (中国)</a></li>



                                        <li><a href="#">Colombia</a></li>



                                        <li><a href="#">Danmark</a></li>



                                        <li><a href="#">Deutschland</a></li>



                                        <li><a href="#">Eire (Ireland)</a></li>



                                        <li><a href="#">España (Spain)</a></li>



                                        <li><a href="#">France</a></li>



                                        <li><a href="#">India</a></li>



                                        <li><a href="#">Italia</a></li>



                                        <li><a href="#">Japan (日本)</a></li>



                                        <li><a href="#">Latvia</a></li>



                                        <li><a href="#">Magyarország (Hungary)</a></li>



                                        <li><a href="#">México</a></li>



                                        <li><a href="#">Nederland</a></li>



                                        <li><a href="#">New Zealand</a></li>



                                        <li><a href="#">Norge (Norway)</a></li>



                                        <li><a href="#">Österreich (Austria)</a></li>



                                        <li><a href="#">Perú</a></li>



                                        <li><a href="#">Polska (Poland)</a></li>



                                        <li><a href="#">Portugal</a></li>



                                        <li><a href="#">România</a></li>



                                        <li><a href="#">Slovensko</a></li>



                                        <li><a href="#">South Africa</a></li>



                                        <li><a href="#">South Korea (대한민국)</a></li>



                                        <li><a href="#">Suomi (Finland)</a></li>



                                        <li><a href="#">Sverige (Sweden)</a></li>



                                        <li><a href="#">Switzerland</a></li>



                                        <li><a href="#">Türkiye</a></li>



                                        <li><a href="#">United Arab Emirates</a></li>



                                        <li><a href="#">United Kingdom</a></li>



                                        <li><a href="#">Ελλάς (Greece)</a></li>



                                        <li><a href="#">Россия (Russia)</a></li>



                                    </ul>



                                </div>



                            </div>



                        </li>



                        <li>
                            <a href="tel:<?= $printableNumber ?>">
                                <img loading="lazy" src="/images/phone-.svg" alt="" width="30">
                                <?= $printableNumber ?>
                            </a>



                        </li>



                    </ul>



                </div>



            </div>



        </section>



        <nav>



            <div class="navlogo"><img loading="lazy" src="/images/logo.png" alt=""></div>



            <label class="respo_menu"><span></span>Menu</label>



            <ul class="nav">



                <li class="close">



                    <a>



                        <svg height="30px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" fill="#fff">



                            <path d="M189.3,128.4L89,233.4c-6,5.8-9,13.7-9,22.4c0,8.7,3,16.5,9,22.4l100.3,105.4c11.9,12.5,31.3,12.5,43.2,0  c11.9-12.5,11.9-32.7,0-45.2L184.4,288h217c16.9,0,30.6-14.3,30.6-32c0-17.7-13.7-32-30.6-32h-217l48.2-50.4  c11.9-12.5,11.9-32.7,0-45.2C220.6,115.9,201.3,115.9,189.3,128.4z" />



                        </svg>



                    </a>



                </li>



                <li><a href="/">Home</a></li>



                <li><a href="/about-us.php">About Us</a></li>



                <li><a href="/info/">Blog</a></li>



                <li>



                    <a href="#">Services</a>



                    <div class="megamenu">



<?php
                        // <div class="navbar" style="width: 80%; margin:auto;">
                        // <div class="dropdown">

                        //     <div class="dropdown-content">
                        //         <div class="row menualign">
                        // <div class="columnnew">
                        //                 <h4>Featured</h4>
                        //                 <ul>
                        //                     <li><a href="/services.php">Services</a></li>
                        //                     <li><a href="/residential-garage-doors.php">Residential Garage Doors</a></li>
                        //                     <li><a href="/commercial-garage-doors.php">Commercial Garage Doors</a></li>
                        //                 </ul>
                        //             </div>
                                    ?>

                        <div class="wrapper">
                            <h4>Services</h4>
                            <ul class="col4">
                                <li><a href="/lps/garage-door-repairs.php">Garage Door Repairs</a></li>
                                <li><a href="/lps/broken-cables.php">Garage Cable Repairs</a></li>
                                <li><a href="/lps/broken-opener.php">Automatic Door Openers</a></li>
                                <li><a href="/lps/broken-springs.php">Broken Springs</a></li>
                                <li><a href="/lps/commercial.php">Commercial Repair</a></li>
                                <li><a href="/lps/commercial-cables.php">Commercial Cables</a></li>
                                <li><a href="/lps/commercial-openers.php">Commercial Openers</a></li>
                                <li><a href="/lps/commercial-springs.php">Commercial Springs</a></li>
                            <?php   
                                // <li><a href="/lps/broken-track.php">Track Repairs</a></li>
                                // <li><a href="/lps/broken-wheel.php">Garage Door Wheel Repair</a></li>
                            ?>

                        </div>
                        <!-- </div> -->
                </li>
                </div>

                <li><a href="/wayne-dalton.php">Estimate</a></li>



                <li><a href="/gallery.php">Gallery</a></li>



                <li>



                    <a href="#">Location</a>



                    <div class="megamenu">



                        <div class="wrapper">



                            <h4>LOCATIONS</h4>



                            <ul class="col4">




                                <li><a href="/bristol-county.php">Bristol County, MA</a></li>



                                <li><a href="/essex-county.php">Essex County, MA</a></li>



                                <li><a href="/middlesex-county.php">Middlesex County, MA</a></li>



                                <li><a href="/norfolk-county.php">Norfolk County, MA</a></li>



                                <li><a href="/plymouth-county.php">Plymouth County, MA</a></li>



                                <li><a href="/suffolk-county.php">Suffolk County, MA</a></li>



                                <li><a href="/worcester-county.php">Worcester County, MA</a></li>



                                <?php 
                            //     <li><a href="/rockingham-county.php">Rockingham County, NH</a></li>



                            // <li><a href="/hillsborough-county.php">Hillsborough County, NH</a></li>



                            // <li><a href="/providence-county.php">Providence County, RI</a></li> 
                            ?>



                            </ul>



                        </div>



                    </div>



                </li>
                <?php

                // <li><a href="/experts/">Experts</a></li>
                // <li class="respo_link"><a href="/shop-category.php">Shop</a></li>
                ?>
                <li class="respo_link"><a href="/experts/">Expert Advice</a></li>
                <li class="respo_link"><a href="https://store.massgaragedoorsexpert.com/">Shop</a></li>



                <li class="respo_link"><a href="/contact-us.php">Contact Us</a></li>




                <li class="number">
                    <a href="tel:<?= $printableNumber ?>">
                        <?= $printableNumber ?>
                    </a>
                </li>



            </ul>



            <a href="tel:8889898758" class="nav_number nav_number_large">



                <img loading="lazy" src="/images/phone-.svg" alt="" width="30"><?= $printableNumber ?></a>





        </nav>

<script>

function checkScreenSize() {
    const navElement = document.querySelector('.nav_number');
  if (window.matchMedia("(max-width: 980px)").matches) {
        navElement.classList.remove('nav_number_large');
        navElement.classList.add('nav_number_small');
  } else {
    console.log("Screen width is larger than 980px");
    navElement.classList.remove('nav_number_small');
    navElement.classList.add('nav_number_large');
  }
}

// Run on page load
checkScreenSize();

// Listen for screen resize
window.addEventListener('resize', checkScreenSize);

</script>
<?php
        // <div class="bg-modal">
        //     <div id="workiz_main" style="margin-top: 5%;position:relative;">
        //         <div onclick="hide_workiz()" style="color: white;" class="workiz_close">+</div>

                ?>

                <?php //echo $bookingObj->get_workiz_code() ?>

            <?php
        //     </div>
        // </div>
        ?>