<?php

require '../../Functions/curl.php'; // Include the Curl class
require 'checkAuthToken.php'; // Ensure this file contains getAccessToken() function

if(!empty($_GET))
{

    // Validate Required Fields
    if (empty($_GET['contactId']) ||  empty($_GET['eventId'])  ) 
    {
        die(json_encode(["error" => "Missing required parameters"]));
    }
    
    $contactId = $_GET['contactId'];
    $eventId = $_GET['eventId'];

    $access_token = getAccessToken();
    $curl = new Curl();
    $version = "2021-04-15";

    // API URL
    $api_url = "https://services.leadconnectorhq.com/calendars/events/appointments/$eventId";

    // Request Body
    $request_body = json_encode([
        "calendarId" => $calendarId,
        "locationId" => $locationId,
        "contactId" => $contactId,
        "appointmentStatus"=> "cancelled"
    ]);

    // Request Headers
    $request_header = [
        "Authorization: Bearer $access_token",
        "Content-Type: application/json",
        "Accept: application/json",
        "Version: " . $version
    ];

    // Send Request
    $search_result = $curl->call($api_url, 'PUT', $request_header, $request_body);

    // Decode & Output Response
    $search_data = json_decode($search_result, true);
    header('Content-Type: application/json');
    echo json_encode($search_data, JSON_PRETTY_PRINT);

}

?>
