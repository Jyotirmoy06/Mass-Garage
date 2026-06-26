<?php


require '../../Functions/curl.php'; // Include the Curl class
require 'checkAuthToken.php'; // Ensure this file contains getAccessToken() function



if (empty($_GET['phone']) && empty($_GET['email']) )  
{
    die(json_encode(["error" => "Missing parameter"]));
}

if (!empty($_GET)) 
{
    if (!empty($_GET['phone'])) 
    {
        $phone = preg_replace('/\D/', '', $_GET['phone']);
        if (strlen($phone) === 10) 
        {
            $phone = '1' . $phone;
        }
        $search_filters[] = [
            "field" => "phone",
            "operator" => "contains",
            "value" => $phone
        ];
    }

    if (isset($_GET['email'])) 
    {
        $search_filters[] = [
            "field" => "email",
            "operator" => "contains",
            "value" => $_GET['email']
        ];
    }

}

if (!empty($search_filters)) 
{

    $access_token = getAccessToken(); 
    $base_url = "https://services.leadconnectorhq.com";
    $curl = new Curl();
    $version = '2021-07-28';

    $request_body = json_encode([
        "locationId" => $locationId,
        "page" => 1,
        "pageLimit" => 1,
        "filters" => $search_filters
    ]);

    $request_header = [
        "Authorization: Bearer $access_token",
        "Content-Type: application/json",
        "Accept: application/json",
        "Version: ".$version
    ];

    $curl = new Curl();
    /**
     * we search for contact to get contactId
     * $method = POST
    */
        $api_url = "$base_url/contacts/search";
        $search_response = $curl->call($api_url,'POST',  $request_header, $request_body);
        $search_data = json_decode($search_response, true);
 
        if (empty($search_data['contacts'][0]['id'])) 
        {
            die(json_encode(["error" => "No contact found for this phone number"]));
        }

        $contactId = $search_data['contacts'][0]['id'];

    /**
     * search for appointment
     * $method = GET
    */
        $appointments_url = "$base_url/contacts/$contactId/appointments";
        $appointments_response = $curl->call($appointments_url, 'GET', $request_header);
        $appointments = json_decode($appointments_response, true);
        if(empty($appointments['events'][0]['id']))
        {
            $appointmentId = null;
        }else{
             $appointmentId = $appointments['events'][0]['id'];
        }

        if(empty($appointments['events'][0]['calendarId']))
        {
            $calendarId = null;
        }else{
             $calendarId = $appointments['events'][0]['calendarId'];
        }
        
        if (!$appointmentId) 
        {
            die(json_encode(["error" => "No appointments found for this contact"]));
        }

    /**
     * Get Calendar Information
     * $method = GET
    */
    $calendar_url = "$base_url/calendars/$calendarId";
    $appointments_response = $curl->call($calendar_url, 'GET', $request_header);
    $calendar_data = json_decode($appointments_response, true);

    /**
     * Get Notes for the Appointment
     * $method = GET
    */
    $notes_url = "$base_url/calendars/appointments/$appointmentId/notes?limit=20&offset=0";
    $notes_response = $curl->call($notes_url, 'GET', $request_header);
    $notes_data = json_decode($notes_response, true);

    // Response
    header('Content-Type: application/json');
    echo json_encode([
        "contact" => $search_data['contacts'][0],
        "appointments" => $appointments,
        "calendar" => $calendar_data,
        "notes" => $notes_data
    ], JSON_PRETTY_PRINT);
} 


?>
