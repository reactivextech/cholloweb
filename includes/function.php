<?php

// GLOBAL Functions
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

function calculateRateBS($amount, $rate)
{
    $totalPending = 0.0;

    // Calcular el monto a tasa
    $totalPending = round(($amount * $rate), 2);

    return $totalPending;
}

function calculateRateREF($amount, $rate)
{
    $totalPending = 0.0;

    // Calcular el monto a tasa
    $totalPending = round(($amount / $rate), 2);

    return $totalPending;
}

function getYear()
{
    return date('Y');
}

function getDateFormat($date)
{
    return date('d/m/Y', strtotime($date));
}

// APIS request
function apiRequest($endpoint, $token = null, $method = 'GET', $data = null, $api = 'web')
{
    $curl = curl_init(CONFIG_API_URL . 'api/'.$api.'/' . $endpoint); // CONFIG_API_URL de config.php

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

    if ($method === 'POST') {
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    }

    // Configurar los encabezados HTTP
    $headers = [
        'Content-Type: application/json',
        'Accept: application/json',
        'User-Agent: MyApp/1.0',
    ];

    // Añadir el token si está disponible
    if ($token) {
        $headers[] = 'Authorization: Bearer ' . $token;
    }

    // Asignar los encabezados a la solicitud cURL
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($curl);

    if (curl_errno($curl)) {
        throw new Exception('Error in CURL: ' . curl_error($curl));
    }

    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    return json_decode($result);
}

// AUTH functions
function login($credential, $password)
{
    try {
        $myUser = ['credential' => $credential, 'password' => $password];
        $response = apiRequest('customer/login', null, 'POST', $myUser);

        return $response ?? null;
    } catch (Exception $e) {
        return null;
    }
}

function checkSession($token)
{
    try {
        $response = apiRequest('customer/checkSession', $token);
        return $response->success ?? false;
    } catch (Exception $e) {
        return false;
    }
}

function logout($token)
{
    try {
        $response = apiRequest('customer/logout', $token);
        return $response;
    } catch (Exception $e) {
        return null;
    }
}

// COMPANY Functions
function apiCompany($token)
{
    try {
        $response = apiRequest('company/getApp', $token);
        return $response;
    } catch (Exception $e) {
        return null;
    }
}

function apiRate($batch, $token)
{
    try {
        $response = apiRequest('company/getRate/' . $batch, $token);
        return $response;
    } catch (Exception $e) {
        return null;
    }
}

// ORDER Functions
function apiOrderByCustomer($customerId, $token)
{
    try {
        $response = apiRequest('order/findByCustomer/' . $customerId, $token);
        return $response;
    } catch (Exception $e) {
        return null;
    }
}

function apiOrderById($orderId, $token)
{
    try {
        $response = apiRequest('order/findById/' . $orderId, $token);
        // echo $response; // Para depuración, eliminar en producción
        return $response;
    } catch (Exception $e) {
        return null;
    }
}

// PAYMENT Functions
function apiTransferPayment($data, $token)
{
    try {
        $response = apiRequest('payment/transferPayment', $token, 'POST', $data, 'v1');
        return $response;
    } catch (Exception $e) {
        return null;
    }
}

function apiMobilePayment($data, $token)
{
    try {
        $response = apiRequest('payment/mobilePayment2', $token, 'POST', $data, 'v1');
        return $response;
    } catch (Exception $e) {
        return null;
    }
}

// INVENTORY Functions
function apiProductByFeatured()
{
    try {
        $response = apiRequest('product/findByFeatured');
        return $response;
    } catch (Exception $e) {
        return null;
    }
}

?>
