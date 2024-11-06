<?php

// CONFIG REQUIRE
require_once '../includes/config.php';
require_once '../includes/function.php';

session_start();
// Verificar autenticación
$token = $_SESSION['session_token'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados por AJAX
    $data = [
        "order_id" => $_POST['order_id'],
        "order_quota_id" => $_POST['order_quota_id'],
        "store_id" => $_POST['store_id'],
        "branch_id" => $_POST['branch_id'],
        "customer_id" => $_POST['customer_id'],
        "amount" => $_POST['amount'],
        "reference_number" => $_POST['reference_number'],
        "id_bank" => $_POST['id_bank'],
        "id_bank_destination" => $_POST['id_bank_destination'],
        "city_code" => $_POST['city_code'],
        "phone" => $_POST['phone'],
        "city_code_ori" => $_POST['city_code_ori'],
        "phone_ori" => $_POST['phone_ori'],
        "date_paid" => $_POST['date_paid']
    ];

    // API para realizar la transferencia
    $response = apiMobilePayment($data, $token);

    // Verificar la respuesta
    if ($response && $response->success) {
        echo json_encode(['success' => true, 'message' => $response->message ?? 'Pago aplicado con exito.']);
    } else {
        echo json_encode(['success' => false, 'message' => $response->message ?? 'No se pudo aplicar el pago, intente nuevamente.']);
    }
}
