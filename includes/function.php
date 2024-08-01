<?php

function checkSession($token)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, API_URL . 'api/v1/auth/check-session'); // API_URL de config.php
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Bearer ' . $token,
    ]);

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode == 201) {
        $data = json_decode($response, true);
        return $data['authenticated'];
    } else {
        return false;
    }
}

function getYear()
{
    return date('Y');
}

?>