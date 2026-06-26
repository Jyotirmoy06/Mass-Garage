<?php

require '../../Functions/curl.php'; // Include the Curl class
require 'checkAuthToken.php'; // Ensure this file contains getAccessToken() function


if (!empty($_GET)) 
{
    $search_filters = [];
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

    if (!empty($_GET['email'])) 
    {
        $search_filters[] = [
            "field" => "email",
            "operator" => "contains",
            "value" => $_GET['email']
        ];
    }

    $access_token = getAccessToken();
    $curl = new Curl();
    $version = '2021-07-28';
    if (!empty($search_filters)) 
    {


        $api_url = "https://services.leadconnectorhq.com/contacts/search";
        $request_body = json_encode([
            "locationId" => $locationId,
            "page" => 1,
            "pageLimit" => 20,
            "filters" => $search_filters
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
    } 
    elseif (!empty($_GET['type']) && $_GET['type'] == 'all') 
    {
        // search all record
        $api_url = "https://services.leadconnectorhq.com/contacts/?limit=100&locationId=$locationId";

            $all_contacts = [];
            do {
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
            } while ($api_url);
        
        header('Content-Type: application/json');
        echo json_encode($all_contacts, JSON_PRETTY_PRINT);

    } 
    else 
    {
        echo json_encode("no result");
        die;
    }
}
