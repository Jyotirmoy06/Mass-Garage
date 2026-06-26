<?php
// Define environment: 'staging' or 'production'
if($_SERVER['HTTP_HOST']=='staging.massgaragedoorsexpert.com')
{
	$environment = 'staging'; 
}else{
	$environment = 'production'; 
}

// Configuration for both environments
$config = [
    'staging' => [
        'DB_HOST' => 'localhost',
        'DB_USER' => 'staging_myadmin',
        'DB_PASS' => '_]PGc,Z2Hc+j',
        'DB_NAME' => 'staging_massgarage',
    ],
    'production' => [
        'DB_HOST' => 'localhost',
        'DB_USER' => 'massdoor_admin',
        'DB_PASS' => 'wfhym4lvx2po',
        'DB_NAME' => 'massgaragedoors',
    ]
];

// Load the appropriate configuration
$env_config = $config[$environment];

// Define constants for easier access
define('DB_HOST', $env_config['DB_HOST']);
define('DB_USER', $env_config['DB_USER']);
define('DB_PASS', $env_config['DB_PASS']);
define('DB_NAME', $env_config['DB_NAME']);
?>

