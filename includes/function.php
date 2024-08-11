<?php

// GLOBAL Function
function apiRequest($endpoint, $method = 'GET', $payload = null, $token = null)
{
    $curl = curl_init(CONFIG_API_URL . 'api/v1/' . $endpoint); // CONFIG_API_URL de config.php

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

    if ($method === 'POST') {
        curl_setopt($curl, CURLOPT_POST, true);
    }

    if ($payload) {
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    }

    if ($token) {
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json',
        ]);
    }

    $result = curl_exec($curl);

    if (curl_errno($curl)) {
        throw new Exception('Error in CURL: ' . curl_error($curl));
    }

    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    if ($httpCode == 201) {
        return json_decode($result);
    } else {
        throw new Exception('API request failed with status code ' . $httpCode);
    }
}

function getYear()
{
    return date('Y');
}

// AUTH function
function login($credential, $password)
{
    try {
        $myUser = ['credential' => $credential, 'password' => $password];
        $response = apiRequest('auth/login', 'POST', $myUser);
        return $response ?? null;
    } catch (Exception $e) {
        echo 'Login failed: ' . $e->getMessage();
        return null;
    }
}

function checkSession($token)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, CONFIG_API_URL . 'api/v1/auth/check-session'); // CONFIG_API_URL de config.php
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

// ORDER Function
function getOrdersByCustomer($customerId, $token)
{
    try {
        $response = apiRequest('order/findByCustomer/' . $customerId, 'GET', null, $token);
        return $response;
    } catch (Exception $e) {
        echo 'Fetching orders failed: ' . $e->getMessage();
        return null;
    }
}

?>