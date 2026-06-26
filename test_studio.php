<?php

ob_start();
session_start();
date_default_timezone_set('US/Eastern');

require_once "./Functions/Database.php";

$db = new Database();
$conn = $db->getConnection();

function convertPSTToEST($pstTime)
{
    $date = new DateTime($pstTime, new DateTimeZone('PST'));
    $date->setTimezone(new DateTimeZone('US/Eastern'));
    return $date->format('Y-m-d H:i:s');
}


if( $_GET["action_type"] != "" && $_GET["action_type"] == "call" )
{
    $callTo = $_GET["call_to"];
    $callFrom = $_GET["call_from"];
    $callDuraion = $_GET["duration"];
    $callStatus = $_GET["status"];
    $actionType = $_GET["action_type"];
    $callStartTime = convertPSTToEST($_GET["start_time"]);
    $callEndTime = convertPSTToEST($_GET["end_time"]);

    $updateSql = "UPDATE 
                    visitor_number_assignments as na
                    SET 
                    na.call_status = '$callStatus', 
                    na.call_duration = '$callDuraion',
                    na.call_start_time = '$callStartTime',
                    na.call_end_time = '$callEndTime',
                    na.call_from_no = '$callFrom',
                    na.has_called = '1'
                    WHERE na.number_pool_id = (
                        SELECT id FROM number_pool WHERE phone_no = '$callTo'
                    )
                    ORDER BY na.id DESC 
                    LIMIT 1
                ";
//    $testQueryResult = $conn->query($updateSql);
//    var_dump($testQueryResult);
//    die();
    if ($conn->query($updateSql) === TRUE)
    {
        $postResult = "Record updated successfully!";
//        var_dump($postResult);
    }
    else
    {
        $postResult = "Something went wrong. Please Contact Admin!";
//        var_dump($postResult);
    }
}

if($_GET["action_type"] != "" && $_GET["action_type"] == "message" )
{

    $msgTo = $_GET["msg_to"];
    $msgFrom = $_GET["msg_from"];
    $msgBody = $_GET["msg_content"];
    $actionType = $_GET["action_type"];
    $msgAt = convertPSTToEST($_GET["msg_at"]);

    $updateSql = "UPDATE 
                    visitor_number_assignments as na
                    SET 
                    na.msg_at = '$msgAt',
                    na.msg_content = '$msgBody',
                    na.message_from_no = '$msgFrom',
                    na.has_messaged = '1'
                    WHERE na.number_pool_id = (
                        SELECT id FROM number_pool WHERE phone_no = '$msgTo'
                    )
                    ORDER BY na.id DESC 
                    LIMIT 1
                ";
 
    if ($conn->query($updateSql) === TRUE) 
    {
        $postResult = "Record updated successfully!";
    } 
    else 
    {
        $postResult = "Something went wrong. Please Contact Admin!";
    }

}