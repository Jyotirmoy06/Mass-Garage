<?php

ob_start();
session_start();
date_default_timezone_set('US/Eastern');

require_once "../Functions/Database.php";

$db = new Database();

if (!empty($_GET['twilio_no']))
{
    $twilioNo = $_GET['twilio_no']; 

    $numbersData = $db->read_query('number_pool', [], ['phone_no' => $twilioNo], 1); //get group id
    $numbersInfo = $db->read_query('number_groups', [], ['id' => $numbersData[0]['group_id']], 1); //get whisper & forward

    $receiverNo = $numbersInfo[0]['forwardTo'];
    if(empty($receiverNo))
    {
        $receiverNo = "+16179016873";
    }


    $message = $numbersInfo[0]['whisper'];
    if(empty($message))
    {
        $message = "CallForMassGarageDoorsExpert";
    }
    /*
    if($numbersData[0]["group_id"] == 1)
    {
        $message = "GoogleCallForMassGarageDoorsExpert";
    }
    elseif($numbersData[0]["group_id"] == 2)
    {
        $message = "BingCallForMassGarageDoorsExpert";
    }
    else
    {
        $message = "CallForMassGarageDoorsExpert";
    }
    */

    $data = [ 'message' => $message, 'receiver' => $receiverNo ];

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);

}