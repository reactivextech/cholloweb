<h2 class="text-primary fs-5 fw-medium mb-4">Reporte de pago</h2>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <!-- <h5 class="mb-3 font-weight-bold"><?php echo $orderDetails->product_name; ?></h5> -->
                <p class="mb-1"><strong>Por cuota:</strong> <br> <?php echo $company->currency3; ?><?php echo $orderDetails->fee_amount; ?> / <?php echo $company->currency2; ?><?php echo $orderDetails->fee_amount; ?></p>
                <p><strong>Total pendiente:</strong> <br><?php echo $company->currency3; ?><?php echo $orderDetails->fee_amount; ?> / <?php echo $company->currency2; ?><?php echo $orderDetails->fee_amount; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 d-flex align-items-center">
                        <img src="<?php echo CONFIG_API_URL ?>src/storage/app/public/stores/<?php echo $orderDetails->store_image ?>" class="img-fluid rounded" alt="<?php echo $orderDetails->store_name ?>">
                    </div>

                    <div class="col-md-9">
                        <p class="card-text mb-2"><?php echo $orderDetails->store_name; ?></p>
                        <p class="card-text mb-1"><?php echo $orderDetails->branch_name; ?></p>
                        <p class="card-text"><?php echo $orderDetails->branch_rif; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
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
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h3 class="fw-normal fs-5">Método de pago</h3>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <div class="dropdown">
                            <button class="btn btn-outline-secundary rounded-pill d-flex align-items-center justify-content-between gap-4 px-4" type="button" id="paymentMethodDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="-5,6">
                                <span class="fw-medium">Seleccionar</span>
                                <i class="fas fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end border-dark border-opacity-10 rounded-3 p-2" aria-labelledby="paymentMethodDropdown">
                                <?php if ($orderDetails->branch_pay_mobile): ?>
                                    <li>
                                        <button class="dropdown-item d-flex gap-3 rounded-3 px-3 py-3" onclick="showBankDetails('mobilepay')" type="button">
                                            <i class="fas fa-mobile"></i>
                                            <span>Pago Móvil</span>
                                        </button>
                                    </li>
                                <?php endif; ?>
                                <?php if ($orderDetails->branch_pay_transfer): ?>
                                    <li>
                                        <button class="dropdown-item d-flex gap-3 rounded-3 px-3 py-3" onclick="showBankDetails('transferpay')" type="button">
                                            <i class="fas fa-landmark"></i>
                                            <span>Transferencia Bancaria</span>
                                        </button>
                                    </li>
                                <?php endif; ?>
                                <?php if ($orderDetails->branch_pay_cash): ?>
                                    <li>
                                        <button class="dropdown-item d-flex gap-3 rounded-3 px-3 py-3" onclick="showBankDetails('cashpay')" type="button">
                                            <i class="fas fa-money-bill-wave"></i>
                                            <span>Efectivo</span>
                                        </button>
                                    </li>
                                <?php endif; ?>
                                <?php if ($orderDetails->branch_pay_card): ?>
                                    <li>
                                        <button class="dropdown-item d-flex gap-3 rounded-3 px-3 py-3" onclick="showBankDetails('cardpay')" type="button">
                                            <i class="far fa-credit-card"></i>
                                            <span>Tarjeta de Crédito</span>
                                        </button>
                                    </li>
                                <?php endif; ?>
                                <?php if ($orderDetails->branch_pay_other): ?>
                                    <li>
                                        <button class="dropdown-item d-flex gap-3 rounded-3 px-3 py-3" onclick="showBankDetails('other')" type="button">
                                            <i class="fas fa-coins"></i>
                                            <span>Otros</span>
                                        </button>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="bank_details" class="mt-3">
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
                            <p class="py-2">Banco: <span class="text-primary fw-medium"><?php echo $orderDetails->bank_name ?></span></p>
                            <p class="py-2">Rif: <span class="text-primary fw-medium"><?php echo $orderDetails->branch_rif ?></span></p>
                            <p class="py-2">Teléfono: <span class="text-primary fw-medium"><?php echo $orderDetails->branch_movil ?></span></p>
                        </div>
                    </div>
                    <!-- Collapse for Transfer -->
                    <div id="transferpay" class="collapse">
                        <div>
                            <h5 class="fw-medium mb-2">Datos de cuenta</h5>
                            <p class="py-2">Banco: <span class="text-primary fw-medium"><?php echo $orderDetails->bank_name ?></span></p>
                            <p class="py-2">Cuenta: <span class="text-primary fw-medium"><?php echo $orderDetails->branch_bank_info4 ?></span></p>
                            <p class="py-2">Tipo: <span class="text-primary fw-medium"><?php echo $orderDetails->branch_bank_info3 ?></span></p>
                            <p class="py-2">Titular: <span class="text-primary fw-medium"><?php echo $orderDetails->branch_bank_info2 ?></span></p>
                            <p class="py-2">Rif: <span class="text-primary fw-medium"><?php echo $orderDetails->branch_rif ?></span></p>
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

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="pay.php" method="GET">
                    <input type="hidden" name="section" value="report">
                    <input type="hidden" name="order" value="<?php echo $orderDetails->id; ?>">
                    <input type="hidden" name="fee_amount" value="<?php echo $orderDetails->fee_amount; ?>">

                    <div class="mb-3">
                        <label for="amount_pay" class="form-label mb-3">Ingresa el monto (Bolívares)</label>
                        <div class="input-group">
                            <span class="input-group-text"><?php echo $company->currency2; ?></span>
                            <input type="text" name="amount_pay" id="amount_pay" class="form-control" value="0.00" oninput="formatAmount(this)">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'layouts/payment/pay-mobile.php'; ?>

<script>
    function showBankDetails(method) {
        // Ocultar todas las secciones de detalles
        document.getElementById('mobilepay').style.display = 'none';
        document.getElementById('transferpay').style.display = 'none';
        document.getElementById('cashpay').style.display = 'none';
        document.getElementById('cardpay').style.display = 'none';
        document.getElementById('other').style.display = 'none';
        document.getElementById('bank_details').style.display = 'block';

        // Mostrar la sección correspondiente según el método seleccionado
        if (method === 'mobilepay') {
            document.getElementById('mobilepay').style.display = 'block';
            document.getElementById('notselected').style.display = 'none';
        } else if (method === 'transferpay') {
            document.getElementById('transferpay').style.display = 'block';
            document.getElementById('notselected').style.display = 'none';
        } else if (method === 'cashpay') {
            document.getElementById('cashpay').style.display = 'block';
            document.getElementById('notselected').style.display = 'none';
        } else if (method === 'cardpay') {
            document.getElementById('cardpay').style.display = 'block';
            document.getElementById('notselected').style.display = 'none';
        } else if (method === 'other') {
            document.getElementById('other').style.display = 'block';
            document.getElementById('notselected').style.display = 'none';
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
    }

    // Configuración inicial para el input
    document.getElementById('amount_pay').addEventListener('focus', function() {
        if (this.value === '0.00') {
            this.setSelectionRange(4, 4); // Posiciona el cursor antes de los centavos
        }
    });
</script>