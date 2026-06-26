<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$baseUrl = 'https://marketplace.gohighlevel.com';
$client_id = '67b36fa9255c58ec89f3d49b-m79hagll';
$client_secret = 'd8350c4c-2a72-4a29-b639-47fc44b1ad29';
$locationId = 'eEjUwz9OhAfNMmhjpf3i';
$code =  '8625ff8a0e1757c5adf06ce57df1ab09123b9d08';
$calendarId =  'T2DaBWFTBcq8Q1lJY7YT';
$secret_token =  '28E275D957Zgqcvyg7TLsKrIzeH3qP4SXm8fbU5y8Z3366852ABF7AF5C5mONSq6gZYFY0eE4HQ4g61WVZEImUwXQF4DAE81B';
$userId = 'GtAllf8kidTfhPGiDVPq'; #in GHL staff team
$timezone =  'America/New_York'; // Default to EST
$token_url = "https://services.leadconnectorhq.com/oauth/token";

// Get the token from the request headers
$headers = getallheaders();

if(empty($headers['X-Webhook-Token'])){
    $received_token = '';
}else{
    $received_token = $headers['X-Webhook-Token'];
}

// Verify the token
if ($received_token !== $secret_token) 
{
    http_response_code(401);
    echo json_encode(["error" => "Unauthorized"]);
    exit;
}

$grantCode_file = 'auth_token.json';
$config = json_decode(file_get_contents('oauth-main/config.json'), true);
if(!file_exists($grantCode_file))
{
    refreshAccessToken();
    sleep(5);
    header("Refresh:0");
    exit;
}

$token_data = json_decode(file_get_contents($grantCode_file), true); 
// HighLevel Config API Credentials
$refresh_token = $token_data['refresh_token'];

// Function to get access token
function getAccessToken()
{
    global $client_id, $client_secret, $token_url, $grantCode_file;

    // Check if token file exists
    if (file_exists($grantCode_file)) 
    {
        $token_data = json_decode(file_get_contents($grantCode_file), true);
        // Check if token is still valid
        $expires_at = time() + $token_data['expires_in']; 
        if (isset($token_data['expires_in']) && time() >= $expires_at ) 
        {
            return $token_data["access_token"];
        }
    }

    // If no valid token, get a new one
    return refreshAccessToken();
}

// Function to refresh and store a new token
function refreshAccessToken()
{
    global $client_id, $client_secret, $token_url, $grantCode_file, $refresh_token;

    $data = http_build_query([
        "client_id" => $client_id,
        "client_secret" => $client_secret,
        "grant_type" => "refresh_token",
        "refresh_token"=>$refresh_token
    ]);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $token_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/x-www-form-urlencoded"
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // Send as form data

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);

    if (isset($result["access_token"])) 
    {
        if(empty($result["expires_in"])){
            $expires_in = 3600;
        }else{
            $expires_in = $result["expires_in"];
        }
        
        $result["expires_at"] = time() + $expires_in;

        file_put_contents($grantCode_file, json_encode($result));

        return $result["access_token"];
    } else 
    {
        die("Error retrieving access token: " . $response);
    }
}

?>
