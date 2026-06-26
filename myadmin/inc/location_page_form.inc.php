<?php
session_start();
include "autoloader.php";

if (isset($_POST['submit']) || isset($_POST['continue']))
{

    // echo "111 <br/>";
    //     var_dump($_POST);
    //     die();

    // Instantiate ArticleController class
    $category = new Database();

    if(!isset($_POST['status']))
    {
        $_POST['status'] = 0;
    }

    $_POST["slug"] = "/".$_POST["countySlug"]."/".$_POST["citySlug"]."/";
    $_POST["topBlackH3"] = addslashes($_POST["topBlackH3"]);
    $_POST["topBlackHtml"] = addslashes($_POST["topBlackHtml"]);
    $_POST["textBlockTopLeft"] = addslashes($_POST["textBlockTopLeft"]);
    $_POST["blackTextSection1"] = addslashes($_POST["blackTextSection1"]);
    $_POST["textBlock2ndRight"] = addslashes($_POST["textBlock2ndRight"]);
    $_POST["blackTextSection2"] = addslashes($_POST["blackTextSection2"]);
    $_POST["textBlockBottomLeft"] = addslashes($_POST["textBlockBottomLeft"]);
    

    if (isset($_POST['id']) && !empty($_POST['id']))
    {
        $pageQueryStr = "city = '".$_POST["city"]."', county = '".$_POST["county"]."', state = '".$_POST['state']."', slug = '".$_POST["slug"]."', image = '".$_POST["large_image_url"]."', metaTitle = '".$_POST["metaTitle"]."', metaDescription = '".$_POST["metaDescription"]."', h1 = '".$_POST["h1"]."', topBlackH3 = '".$_POST["topBlackH3"]."', topBlackHtml = '".$_POST["topBlackHtml"]."', textBlockTopLeft = '".$_POST["textBlockTopLeft"]."', blackTextSection1 = '".$_POST["blackTextSection1"]."', textBlock2ndRight = '".$_POST["textBlock2ndRight"]."', blackTextSection2 = '".$_POST["blackTextSection2"]."', textBlockBottomLeft = '".$_POST["textBlockBottomLeft"]."'";
        $pagesUpdateReport = $category->updateData('location_page_contents', $pageQueryStr, $_POST['id']);
        if($pagesUpdateReport)
        {
            $_SESSION['pageStatus'] = "Location Updated Successfully!";
        }
        else
        {
            $_SESSION['pageStatus'] = "Error While Updating Location!";
        }
        
        // var_dump($pagesUpdateReport);
    }
    else
    {
        unset($_POST['submit']);   
        $save = $category->insertData(
            "location_page_contents", 
            ['city', 'county', 'state', 'slug', 'image', 'map', 'pageType', 'status', 'metaTitle', 'metaDescription', 'h1', 'topBlackH3', 'topBlackHtml', 'textBlockTopLeft', 'blackTextSection1', 'textBlock2ndRight', 'blackTextSection2', 'textBlockBottomLeft'],
            [ $_POST['city'], $_POST['county'], $_POST['state'], $_POST['slug'], $_POST['large_image_url'], $_POST['map'], $_POST['pageType'], $_POST['status'], $_POST['metaTitle'], $_POST['metaDescription'], $_POST['h1'], $_POST['topBlackH3'], $_POST['topBlackHtml'], $_POST['textBlockTopLeft'], $_POST['blackTextSection1'], $_POST['textBlock2ndRight'], $_POST['blackTextSection2'], $_POST['textBlockBottomLeft'] ]
        );

        if($save)
        {
            $_SESSION['pageStatus'] = "Location Insertion Successfully!";
        }
        else
        {
            $_SESSION['pageStatus'] = "Error While Inserting Location!";
        }
        // var_dump($save);
    }

    
    header("Location: ".Root."/location_page_contents.php");

}
