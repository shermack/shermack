<?php

// Set the Consumer Key and Consumer Secret
$consumerKey = 'yAhYLcHhl6TsI5BdV4aNOwnwWHpyMUEq';
$consumerSecret = 'Np4KaAev4OGDrLOT';

// Generate the access token
function generateAccessToken($consumerKey, $consumerSecret)
{
    $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    $credentials = base64_encode($consumerKey . ':' . $consumerSecret);

    $headers = [
        'Authorization: Basic ' . $credentials,
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Generate the access token
$accessToken = generateAccessToken($consumerKey, $consumerSecret);

// Check if access token was successfully obtained
if (isset($accessToken['access_token'])) {
    // Use the access token to make API requests
    // ...
} else {
    echo 'Failed to generate access token';
}
