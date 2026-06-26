<?php

$grantCode_file = 'auth_token.json';
if (file_exists($grantCode_file)) 
{
    if(isset($_GET['initiate']) && $_GET['initiate']=='new' )
    {
        redirectAuth();
    }else
    {
        $token_data = json_decode(file_get_contents($grantCode_file), true);
        header("Location: https://massgaragedoorsexpert.com/gohlevel/oauth/callback.php?code=$token_data");
        die;
    }

}else{
    redirectAuth();
}


function redirectAuth()
{
    // Load configuration from JSON file
    $config = json_decode(file_get_contents('oauth-main/config.json'), true);

    // Define options
    $options = [
        'requestType' => 'code',
        'redirectUri' => 'https://massgaragedoorsexpert.com/gohlevel/oauth/callback.php',
        'clientId' => $config['clientId'],
        'scopes' => [
            'calendars.readonly',
            'calendars/events.readonly',
            'contacts.readonly'
        ]
    ];

    // Construct the redirect URL
    $authUrl = sprintf(
        "%s/oauth/chooselocation?response_type=%s&redirect_uri=%s&client_id=%s&scope=%s",
        $config['baseUrl'],
        $options['requestType'],
        urlencode($options['redirectUri']),
        $options['clientId'],
        urlencode(implode(' ', $options['scopes']))
    );

    // Redirect to authorization URL
    header("Location: $authUrl");
    exit;
}
?>
