<?php
require '../../Functions/curl.php'; // Include the Curl class
require 'checkAuthToken.php'; // Ensure this file contains getAccessToken() function
                              // 
// Define the time range for availability check
$start_time = "2025-04-01T00:00:00Z"; // Replace with your start date
$end_time = "2025-04-01T23:59:59Z"; // Replace with your end date
$version = "2021-04-15";

// API Endpoint
$url = "$base_url/calendars/$calendar_id/availability?start=$start_time&end=$end_time";

        // search all record
        $api_url = "https://services.leadconnectorhq.com/contacts/?limit=100&locationId=$locationId";

        $result = $curl->get($api_url, [
            "Authorization: Bearer $access_token",
            "Accept: application/json",
            "Version: $version"
        ]);
        $data = json_decode($result, true);
        if (isset($data['contacts']) && is_array($data['contacts'])) 
        {
            $all_contacts = array_merge($all_contacts, $data['contacts']);
        }
        if(empty($data['meta']['nextPageUrl'])){
            $api_url = null;
        }else{
            $api_url = $data['meta']['nextPageUrl'];
        }
     
        
        header('Content-Type: application/json');
        echo json_encode($all_contacts, JSON_PRETTY_PRINT);

?>
