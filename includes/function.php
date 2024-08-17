<?php

// GLOBAL Function
function apiRequest($endpoint, $method = 'GET', $data = null, $token = null)
{
    $curl = curl_init(CONFIG_API_URL . 'api/v1/' . $endpoint); // CONFIG_API_URL de config.php

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

    if ($method === 'POST') {
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    }

    if ($token) {
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer ' . $token,
        ]);
    } else {
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
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
    try {
        $response = apiRequest('auth/check-session', 'GET', null, $token);
        return $response->success ?? false;
    } catch (Exception $e) {
        echo 'Check session failed: ' . $e->getMessage();
        return false;
    }
}

function logout($token)
{
    try {
        $response = apiRequest('auth/logout', 'GET', null, $token);
        return $response;
    } catch (Exception $e) {
        echo 'Logout failed: ' . $e->getMessage();
        return null;
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

function getOrderById($orderId, $token)
{
    try {
        $response = apiRequest('order/findQuotasByOrder/' . $orderId, 'GET', null, $token);
        return $response;
    } catch (Exception $e) {
        echo 'Fetching order failed: ' . $e->getMessage();
        return null;
    }
}

function getQuotasByOrder($orderId, $token)
{
    try {
        $response = apiRequest('order/findQuotasByOrder/' . $orderId, 'GET', null, $token);
        return $response;
    } catch (Exception $e) {
        echo 'Fetching quotas failed: ' . $e->getMessage();
        return null;
    }
}

?>