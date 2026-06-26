<?php
session_start();
include '../../connection.php';
include '../../includes/header.php';

// Load configuration (ensure the path is correct)
$configPath = realpath(__DIR__ . '/oauth-main/config.json');
if (!file_exists($configPath)) 
{
    die("<h1 style='text-align: center'>Configuration file is missing</h1>");
}
$config = json_decode(file_get_contents($configPath), true);

if (!isset($_GET['code'])) 
{
    die("<h1 style='text-align: center'>Authorization code is missing</h1>");
}
    
    $grantCode_file = 'auth_token.json';
    $grantCode = $_GET['code'];
    // If file exists, check if the stored code is different
    if (file_exists($grantCode_file)) 
    {
        $storedCode = json_decode(file_get_contents($grantCode_file) );
        if(!isset($storedCode->access_token))
        {
            die("<h1 style='text-align: center'>Please Initiate from start here <a href='https://massgaragedoorsexpert.com/gohlevel/oauth/initiate.php?initiate=new'>here</a> </h1>");
        }
    } else 
    {
        // If file doesn't exist, create and save the new grant code
        $retVal = req_token($config);
        if (isset($retVal['expires_in'])) 
        {
            $retVal['expired_at'] = time() + $retVal['expires_in']; // Calculate expiration time
        }
        file_put_contents($grantCode_file, json_encode($retVal) );
    }

function req_token($config)
{
    // Prepare request data
    $data = http_build_query([
        'client_id' => $config['clientId'],
        'client_secret' => $config['clientSecret'],
        'grant_type' => 'authorization_code',
        'code' => $_GET['code'],
        'user_type' => 'Location',
        'redirect_uri' => 'https://massgaragedoorsexpert.com/gohlevel/oauth/callback.php'
    ]);

    // Initialize cURL request
    $ch = curl_init('https://services.leadconnectorhq.com/oauth/token');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: application/json',
        'Content-Type: application/x-www-form-urlencoded'
    ]);

    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);

}
 
 $data = json_decode(file_get_contents($grantCode_file) );
 if(!isset($data->access_token))
 {
    die("<h1 style='text-align: center'>Please Initiate from start here <a href='https://massgaragedoorsexpert.com/gohlevel/oauth/initiate.php?initiate=new'>here</a> </h1>");
 }

// Check if access token exists
$accessToken = isset($data->access_token) ? htmlspecialchars($data->access_token) : 'No access token received';
$refresh_token = isset($data->refresh_token) ? htmlspecialchars($data->refresh_token) : 'No refresh token received';
$companyId = isset($data->companyId) ? htmlspecialchars($data->companyId) : 'No company ID received';
$scope = isset($data->scope) ? htmlspecialchars($data->scope) : 'No scope received';
$codex = isset($_GET['code']) ? htmlspecialchars($_GET['code']) : 'No access Code received';

?>

    <style>

        .container23 {
            width: 100%;
            max-width: 500px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin: auto;
            position: initial;
            top: 50px;
        }

        .label23 {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        .textarea23 {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            background-color: #fafafa;
            resize: none;
            outline: none;
        }

        .textarea23:focus {
            border-color: #007bff;
            background-color: #fff;
        }
    </style>



<div class="container23" style="">
      <div>
        <label for="accessToken1" class="label23">Code</label>
        <textarea id="accessToken1" class="textarea23" rows="5" readonly><?= $codex ?></textarea>
    </div>
    <div>
        <label for="accessToken1" class="label23">Access Token </label>
        <textarea id="accessToken1" class="textarea23" rows="5" readonly><?= $accessToken ?></textarea>
    </div>
    <div>
        <label for="refresh_token" class="label23">Refresh Token</label>
        <textarea id="refresh_token" class="textarea23" rows="5" readonly><?= $refresh_token ?></textarea>
    </div>
    <div>
        <label for="scope" class="label23">Scope</label>
        <textarea id="scope" class="textarea23" rows="5" readonly><?= $scope ?></textarea>
    </div>
    <div>
        <label for="scope" class="label23">Company ID</label>
        <textarea id="scope" class="textarea23" rows="5" readonly><?= $companyId ?></textarea>
    </div>
</div>


<?php
include '../../includes/footer.php';
?>