<?php

$quotasTotals = calculateTotals($orderDetails->quotas, $orderDetails->fee_initial);

// Inicializa la variable para almacenar la cuota que buscas
$firstPendingOrDefeatedQuota = null;
// Recorre las cuotas para encontrar la primera con estado "Pending" o "Defeated"
foreach ($orderDetails->quotas as $quota) {
    if ($quota->status === 'Pending' || $quota->status === 'Defeated') {
        $firstPendingOrDefeatedQuota = $quota->id;
        break; // Salir del bucle una vez encontrada la primera
    }
}

?>

<h2 class="text-primary fs-5 fw-medium mb-4">Reporte de pago</h2>

<div class="row d-flex align-items-stretch">
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row">
                    <div class="col-3 col-lg-4 col-xxl-3 d-flex align-items-center">
                        <img src="<?php echo CONFIG_API_URL ?>src/storage/app/public/products/<?php echo $orderDetails->product_image ?>" class="img-fluid" alt="<?php echo $orderDetails->product_name ?>">
                    </div>
                    <div class="col-9 col-lg-8 col-xxl-9 d-flex flex-column justify-content-center">
                        <p class="fs-6 fw-medium mb-2"><?php echo $orderDetails->product_name; ?></p>
                        <p class="fs-7 fw-medium mb-1">Por pagar:
                            <span class="fw-semibold">
                                <span class="fs-8"><?php echo $company->currency3; ?></span><?php echo $quotasTotals['total_pending']; ?>
                            </span>
                        </p>
                        <p class="fs-7 fw-medium">Total pagado:
                            <span class="fw-semibold">
                                <span class="fs-8"><?php echo $company->currency3; ?></span><?php echo $quotasTotals['total_paid']; ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row">
                    <div class="col-3 col-lg-4 col-xxl-3 d-flex align-items-center">
                        <img src="<?php echo CONFIG_API_URL ?>src/storage/app/public/stores/<?php echo $orderDetails->store_image ?>" class="img-fluid" alt="<?php echo $orderDetails->store_name ?>">
                    </div>
                    <div class="col-9 col-lg-8 col-xxl-9 d-flex flex-column justify-content-center">
                        <p class="fs-6 fw-medium mb-2"><?php echo $orderDetails->store_name; ?></p>
                        <p class="fs-6 fw-medium mb-1"><?php echo $orderDetails->branch_name; ?></p>
                        <p class="fs-7 fw-medium"><?php echo $orderDetails->branch_rif; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="row mt-4">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Detalles de las cuotas
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ul class="list-group">
                        <?php
                        // Supongamos que tienes un array de cuotas con la siguiente estructura
                        $cuotas = [
                            ['fecha' => '2024-09-10', 'numero' => '001', 'monto' => 100, 'estado' => 'pendiente'],
                            ['fecha' => '2024-08-10', 'numero' => '002', 'monto' => 150, 'estado' => 'pagado'],
                            ['fecha' => '2024-07-10', 'numero' => '003', 'monto' => 120, 'estado' => 'vencido'],
                        ];

                        foreach ($cuotas as $cuota) {
                            // Determina la clase CSS según el estado de la cuota
                            $badgeClass = '';
                            switch ($cuota['estado']) {
                                case 'pendiente':
                                    $badgeClass = 'badge-warning';
                                    break;
                                case 'pagado':
                                    $badgeClass = 'badge-success';
                                    break;
                                case 'vencido':
                                    $badgeClass = 'badge-danger';
                                    break;
                            }
                            echo "
                        <li class='list-group-item d-flex justify-content-between align-items-center'>
                            <span><strong>Fecha:</strong> {$cuota['fecha']} - <strong>Cuota:</strong> #{$cuota['numero']} - <strong>Monto:</strong> {$cuota['monto']}</span>
                            <span class='badge $badgeClass'>{$cuota['estado']}</span>
                        </li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5 d-flex align-items-center mb-3">
                        <h3 class="fw-normal fs-5">Método de pago</h3>
                    </div>
                    <div class="col-sm-7 d-sm-flex justify-content-end mb-3">
                        <div class="dropdown">
                            <button class="btn rounded-pill d-flex align-items-center justify-content-between gap-4 px-4 w-100" type="button" id="paymentMethodDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="-5,6">
                                <span id="selectedPaymentMethod" class="fw-medium">Seleccionar</span>
                                <i class="fas fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end border-dark border-opacity-10 rounded-3 p-2" aria-labelledby="paymentMethodDropdown">
                                <?php if ($orderDetails->branch_pay_mobile): ?>
                                    <li>
                                        <button class="dropdown-item d-flex gap-3 rounded-3 px-3 py-3" onclick="showBankDetails('mobilepay', 'Pago Móvil')" type="button">
                                            <i class="fas fa-mobile"></i>
                                            <span>Pago Móvil</span>
                                        </button>
                                    </li>
                                <?php endif; ?>
                                <?php if ($orderDetails->branch_pay_transfer): ?>
                                    <li>
                                        <button class="dropdown-item d-flex gap-3 rounded-3 px-3 py-3" onclick="showBankDetails('transferpay', 'Transferencia Bancaria')" type="button">
                                            <i class="fas fa-landmark"></i>
                                            <span>Transferencia Bancaria</span>
                                        </button>
                                    </li>
                                <?php endif; ?>
                                <?php if ($orderDetails->branch_pay_cash): ?>
                                    <li>
                                        <button class="dropdown-item d-flex gap-3 rounded-3 px-3 py-3" onclick="showBankDetails('cashpay', 'Efectivo')" type="button">
                                            <i class="fas fa-money-bill-wave"></i>
                                            <span>Efectivo</span>
                                        </button>
                                    </li>
                                <?php endif; ?>
                                <?php if ($orderDetails->branch_pay_card): ?>
                                    <li>
                                        <button class="dropdown-item d-flex gap-3 rounded-3 px-3 py-3" onclick="showBankDetails('cardpay', 'Tarjeta de Crédito')" type="button">
                                            <i class="far fa-credit-card"></i>
                                            <span>Tarjeta de Crédito</span>
                                        </button>
                                    </li>
                                <?php endif; ?>
                                <?php if ($orderDetails->branch_pay_other): ?>
                                    <li>
                                        <button class="dropdown-item d-flex gap-3 rounded-3 px-3 py-3" onclick="showBankDetails('other', 'Otros')" type="button">
                                            <i class="fas fa-coins"></i>
                                            <span>Otros</span>
                                        </button>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="bank_details">
                    <!-- Not Selected -->
                    <div id="notselected">
                        <div class="border border-2 text-center rounded-4 p-4">
                            <i class="fas fa-plus text-secundary"></i>
                            <p class="fs-6 mt-3">Selecciona el método de pago.</p>
                        </div>
                    </div>
                    <!-- Collapse for Mobile Pay -->
                    <div id="mobilepay" class="collapse">
                        <div>
                            <h5 class="fw-medium mb-2">Datos de cuenta</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="py-2">Banco: <span class="text-primary fw-medium"><?php echo $orderDetails->bank_name ?></span></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="py-2">Rif: <span class="text-primary fw-medium"><?php echo $orderDetails->branch_rif ?></span></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="py-2">Teléfono: <span class="text-primary fw-medium"><?php echo $orderDetails->branch_movil ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Collapse for Transfer -->
                    <div id="transferpay" class="collapse">
                        <div>
                            <h5 class="fw-medium mb-2">Datos de cuenta</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="py-2">Banco: <span class="text-primary fw-medium"><?php echo $orderDetails->bank_name ?></span></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="py-2">Cuenta: <span class="text-primary fw-medium"><?php echo $orderDetails->branch_bank_info4 ?></span></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="py-2">Tipo: <span class="text-primary fw-medium"><?php echo $orderDetails->branch_bank_info3 ?></span></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="py-2">Titular: <span class="text-primary fw-medium"><?php echo $orderDetails->branch_bank_info2 ?></span></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="py-2">Rif: <span class="text-primary fw-medium"><?php echo $orderDetails->branch_rif ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Collapse for Cash -->
                    <div id="cashpay" class="collapse">
                        <div class="text-center fw-medium rounded-4 p-4">
                            <p class="pb-3">Diríjase a nuestra tienda autorizada para continuar con el pago</p>
                            <span class="text-primary"><?php echo $orderDetails->branch_address ?></span>
                        </div>
                    </div>
                    <!-- Collapse for Card Payment -->
                    <div id="cardpay" class="collapse">
                        <div class="text-center fw-medium rounded-4 p-4">
                            <p class="pb-3">Diríjase a nuestra tienda autorizada para continuar con el pago</p>
                            <span class="text-primary"><?php echo $orderDetails->branch_address ?></span>
                        </div>
                    </div>
                    <!-- Collapse for Other -->
                    <div id="other" class="collapse">
                        <div class="text-center fw-medium rounded-4 p-4">
                            <p class="pb-3">Consulta los métodos de pago adicionales al número de contacto de <?php echo $orderDetails->store_name; ?></p>
                            <a class="text-primary" href="https://api.whatsapp.com/send?phone=<?php echo convertToInternational($orderDetails->store_phone); ?>&text=¡Hola! Soy <?php echo $firstName; ?>, C.I. <?php echo $customerNationality; ?>-<?php echo $customerIdentification; ?>, me gustaría conocer los métodos de pago adicionales, para pagar mi cuota Chollo*." target="_blank">
                                <?php echo $orderDetails->store_phone ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="amount" class="form-label mb-4">Ingresa el monto (Bolívares)</label>
                    <div class="input-group">
                        <span class="input-group-text"><?php echo $company->currency2; ?></span>
                        <input type="text" name="amount" id="amount" class="form-control" value="0.00" oninput="formatAmount(this)">
                        <span class="input-group-text">
                            <span class="fs-8 pt-1"><?php echo $company->currency3; ?></span>
                            <span id="calculatedAmount">0.00</span>
                        </span>
                    </div>
                    <div id="maxPendingPay">
                        <p class="mx-1 mt-2">
                            Máx. pendiente por pagar
                            <span id="amountMaxPendingPay" class="text-primary">
                                <span class="fs-8"><?php echo $company->currency2; ?></span><?php echo calculateRateBS($quotasTotals['total_pending'], $company->rate); ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="paymentForm">
    <!-- Formulario para Pago Móvil -->
    <div id="mobilePaymentForm" style="display: none;">
        <?php require_once 'layouts/payment/pay-mobile.php'; ?>
    </div>

    <!-- Formulario para Transferencia -->
    <div id="transferPaymentForm" style="display: none;">
        <?php require_once 'layouts/payment/pay-transfer.php'; ?>
    </div>
</div>

<!-- Modal para la respuesta -->
<div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="responseModalLabel">Respuesta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalMessage">
                <!-- Mensaje de respuesta -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showBankDetails(methodId, methodText) {
        // Ocultar todas las secciones de detalles
        var selectedCollapse = document.getElementById(methodId);
        var collapses = document.querySelectorAll('.collapse');
        var notselected = document.getElementById('notselected');

        // Actualizar texto del boton dropdown
        document.getElementById('selectedPaymentMethod').textContent = methodText;

        collapses.forEach(function(collapse) {
            collapse.classList.remove('show');
        });

        if (selectedCollapse) {
            selectedCollapse.classList.add('show');
            notselected.style.display = 'none';
        }

        selectPaymentMethod(methodId);
    }

    function selectPaymentMethod(methodId) {
        // Ocultar todos los formularios
        document.getElementById('mobilePaymentForm').style.display = 'none';
        document.getElementById('transferPaymentForm').style.display = 'none';

        // Mostrar el formulario según el método seleccionado
        if (methodId === 'mobilepay') {
            document.getElementById('mobilePaymentForm').style.display = 'block';
        } else if (methodId === 'transferpay') {
            document.getElementById('transferPaymentForm').style.display = 'block';
        } else {
            // Si no se selecciona un método válido, se ocultan todos
            document.getElementById('paymentForm').innerHTML = '';
        }
    }

    function formatAmount(input) {
        // Remover cualquier carácter que no sea un dígito
        let cleanValue = input.value.replace(/[^\d]/g, '');

        // Si solo hay un dígito, agregar ceros a la izquierda
        while (cleanValue.length < 3) {
            cleanValue = '0' + cleanValue;
        }

        // Insertar el punto decimal antes de los últimos dos dígitos
        let integerPart = cleanValue.slice(0, -2).replace(/^0+(?=\d)/, ''); // Eliminar ceros adicionales a la izquierda
        let decimalPart = cleanValue.slice(-2);

        // Si la parte entera queda vacía, poner un cero
        if (integerPart === '') {
            integerPart = '0';
        }

        // Establecer el valor formateado en el input
        input.value = integerPart + '.' + decimalPart;

        // Mantener el cursor a la derecha del número ingresado
        input.setSelectionRange(input.value.length, input.value.length);

        // Calcular la tasa en tiempo real
        calculateRealTimeRate(parseFloat(input.value));

        // Validar si supera el máximo
        validateMax(parseFloat(input.value));
    }

    function calculateRealTimeRate(amount) {
        const rate = <?php echo $company->rate; ?>; // Aquí obtienes la tasa desde el backend
        const calculatedAmount = (amount / rate).toFixed(2); // Calcular con la tasa y redondear a 2 decimales
        document.getElementById('calculatedAmount').innerHTML = calculatedAmount; // Actualizar el contenido
    }

    function validateMax(amount) {
        const maxPending = <?php echo calculateRateBS($quotasTotals['total_pending'], $company->rate); ?>; // Máximo permitido
        const maxPendingFixed = (maxPending).toFixed(2); // Calcular con la tasa y redondear a 2 decimales

        const pendingPay = document.getElementById('maxPendingPay');
        const amountPendingPay = document.getElementById('amountMaxPendingPay');
        const amountPay = document.getElementById('amount');

        // Cambiar el color a rojo si se excede el máximo permitido
        if (amount > maxPendingFixed) {
            pendingPay.classList.add('text-danger');
            amountPay.classList.add('border-danger');
            amountPendingPay.classList.remove('text-primary');
            amountPendingPay.classList.add('text-danger');
        } else {
            pendingPay.classList.remove('text-danger');
            amountPay.classList.remove('border-danger');
            amountPendingPay.classList.remove('text-danger');
            amountPendingPay.classList.add('text-primary');
        }
    }

    // Configuración inicial para el input
    document.getElementById('amount').addEventListener('focus', function() {
        if (this.value === '0.00') {
            this.setSelectionRange(4, 4); // Posiciona el cursor antes de los centavos
        }
    });
</script>