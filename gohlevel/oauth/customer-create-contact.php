<?php

require '../../Functions/curl.php'; // Include the Curl class
require 'checkAuthToken.php'; // Ensure this file contains getAccessToken() function


if (!empty($_GET['phone']) && !empty($_GET['email']) && !empty($_GET['fname']) && !empty($_GET['lname']) ) 
{

    if (!empty($_GET['phone'])) 
    {
        $phone = preg_replace('/\D/', '', $_GET['phone']);
        if (strlen($phone) === 10) 
        {
            $phone = '1' . $phone;
        }
    }
    $email = $_GET['email'];
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];

    $access_token = getAccessToken();
    $curl = new Curl();

        $version = "2021-07-28";
        $api_url = "https://services.leadconnectorhq.com/contacts/";

        $request_body = json_encode([
            'firstName' => $fname,
            'lastName' =>  $lname,
            'name' => $fname." " . $lname,
            'email' => $email,
            'locationId' => $locationId,
            'phone' => $phone,
            'assignedTo' => $userId,
            'timezone'=> $timezone
          ]);

        $request_header = [
            "Authorization: Bearer $access_token",
            "Content-Type: application/json",
            "Accept: application/json",
            "Version: $version"
        ];

        $search_result = $curl->post($api_url, $request_body, $request_header);

        header('Content-Type: application/json');
        echo $search_result;
        exit;
    

}else
{
    echo json_encode("Some Parameters are missing");
    die;
}
