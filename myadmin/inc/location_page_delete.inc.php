<?php
session_start();
include "autoloader.php";

if(isset($_GET['pageId']) && !empty($_GET['pageId']))
{
    $pageId = $_GET['pageId'];
    $obj = new Database();
    if($obj->removeData("location_page_contents", "id", $pageId))
    {
        $_SESSION['pageStatus'] = "Location Deleted Successfully!";
    }
    else
    {
        $_SESSION['pageStatus'] = "Error While Deleting Location!";
        // return header("Location: ". Root.'/location_page_contents.php?error=deletefailed');
    }

    return header("Location: ". Root.'/location_page_contents.php');
}
elseif (isset($_GET['botLogId']) && !empty($_GET['botLogId'])) 
{
    $botLogId = $_GET['botLogId'];
    $obj = new Database();
    if($obj->removeData("bot_log", "id", $botLogId))
    {
        $_SESSION['pageStatus'] = "Log Deleted Successfully!";
    }
    else
    {
        $_SESSION['pageStatus'] = "Error While Deleting Log!";
        // return header("Location: ". Root.'/location_page_contents.php?error=deletefailed');
    }

    return header("Location: ". Root.'/bot_log.php');
}