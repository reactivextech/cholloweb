<?php

// GLOBAL Function
function apiRequest($endpoint, $method = 'GET', $data = null, $token = null)
{
    $curl = curl_init(CONFIG_API_URL . 'api/web/' . $endpoint); // CONFIG_API_URL de config.php

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

    // if ($httpCode == 201) {
    //     return json_decode($result);
    // } else {
    //     throw new Exception($httpCode);
    // }

    return json_decode($result);
}

function convertToInternational($phoneNumber)
{
    // Si el número empieza con '0', reemplazamos con '58'
    if (substr($phoneNumber, 0, 1) === '0') {
        return '58' . substr($phoneNumber, 1);
    }
    return $phoneNumber; // Si no empieza con '0', no modificamos
}

function calculateTotals($orderQuotas, $fee_initial)
{
    $totalPending = 0.0;
    $totalQuotas = 0.0;
    $totalPaid = 0.0;

    foreach ($orderQuotas as $quota) {
        // Sumar balance (total pendiente)
        $totalPending += floatval($quota->balance ?? 0);

        // Sumar amount (total de cuotas)
        $totalQuotas += floatval($quota->amount ?? 0);
    }

    // Calcular el total pagado
    $totalPaid = ($totalQuotas - $totalPending) + floatval($fee_initial ?? 0);

    return [
        'total_pending' => $totalPending,
        'total_quotas' => $totalQuotas,
        'total_paid' => $totalPaid
    ];
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
        return null;
    }
}

function checkSession($token)
{
    try {
        $response = apiRequest('auth/check-session', 'GET', null, $token);
        return $response->success ?? false;
    } catch (Exception $e) {
        return false;
    }
}

function logout($token)
{
    try {
        $response = apiRequest('auth/logout', 'GET', null, $token);
        return $response;
    } catch (Exception $e) {
        return null;
    }
}

// COMPANY Function
function getCompany($token)
{
    try {
        $response = apiRequest('company/getCompany/1', 'GET', null, $token);
        return $response;
    } catch (Exception $e) {
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
        return null;
    }
}

function getOrderById($orderId, $token)
{
    try {
        $response = apiRequest('order/findByOrderId/' . $orderId, 'GET', null, $token);
        return $response;
    } catch (Exception $e) {
        return null;
    }
}

// PAYMENT Function

?>