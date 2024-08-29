<h2 class="title-primary mb-4">Reporte de pago</h2>

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
    <div class="col-md-12">
        <div class="border p-4 rounded shadow-sm">
            <div class="mb-3">
                <label class="form-label">Método de pago:</label>
                <div class="btn-group" role="group">
                    <?php if ($orderDetails->branch_pay_mobile): ?>
                        <input type="radio" class="btn-check" name="payment_method" id="mobile_pay" value="2" autocomplete="off" onclick="showBankDetails('mobilepay')">
                        <label class="btn btn-outline-primary" for="mobile_pay">Pago Móvil</label>
                    <?php endif; ?>

                    <?php if ($orderDetails->branch_pay_transfer): ?>
                        <input type="radio" class="btn-check" name="payment_method" id="transfer_pay" value="3" autocomplete="off" onclick="showBankDetails('transferpay')">
                        <label class="btn btn-outline-primary" for="transfer_pay">Transferencia</label>
                    <?php endif; ?>

                    <?php if ($orderDetails->branch_pay_cash): ?>
                        <input type="radio" class="btn-check" name="payment_method" id="cash_pay" value="1" autocomplete="off" onclick="showBankDetails('cashpay')">
                        <label class="btn btn-outline-primary" for="cash_pay">Efectivo</label>
                    <?php endif; ?>

                    <?php if ($orderDetails->branch_pay_card): ?>
                        <input type="radio" class="btn-check" name="payment_method" id="card_pay" value="4" autocomplete="off" onclick="showBankDetails('cardpay')">
                        <label class="btn btn-outline-primary" for="card_pay">Tarjeta de Crédito</label>
                    <?php endif; ?>
                </div>
            </div>

            <div id="bank_details" class="mt-3" style="display: none;">
                <div id="mobilepay" style="display: none;">
                    <p>Datos de cuenta</p>
                    <p>Banco: <?php echo $orderDetails->bank_name ?></p>
                    <p>Rif: <?php echo $orderDetails->branch_rif ?></p>
                    <p>Teléfono: <?php echo $orderDetails->branch_movil ?></p>
                </div>

                <div id="transferpay" style="display: none;">
                    <p>Datos de cuenta</p>
                    <p>Banco: <?php echo $orderDetails->bank_name ?></p>
                    <p>Cuenta: <?php echo $orderDetails->branch_bank_info4 ?></p>
                    <p>Tipo: <?php echo $orderDetails->branch_bank_info3 ?></p>
                    <p>Titular: <?php echo $orderDetails->branch_bank_info2 ?></p>
                    <p>Rif: <?php echo $orderDetails->branch_rif ?></p>
                </div>

                <div id="cashpay" style="display: none;">
                    <p>Dirijase a nuestra tienda autorizada para continuar con el pago</p>
                    <p><?php echo $orderDetails->branch_address ?></p>
                </div>

                <div id="cardpay" style="display: none;">
                    <p>Dirijase a nuestra tienda autorizada para continuar con el pago</p>
                    <p><?php echo $orderDetails->branch_address ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="border p-4 rounded shadow-sm">
            <form action="pay.php" method="GET">
                <input type="hidden" name="section" value="report">
                <input type="hidden" name="order_id" value="<?php echo $orderDetails->id; ?>">
                <input type="hidden" name="fee_amount" value="<?php echo $orderDetails->fee_amount; ?>">

                <div class="mb-3">
                    <label for="amount_pay" class="form-label mb-3">Ingresa el monto (<?php echo $company->currency2; ?>):</label>
                    <div class="input-group">
                        <span class="input-group-text"><?php echo $company->currency2; ?></span>
                        <input type="text" name="amount_pay" id="amount_pay" class="form-control" value="0.00" oninput="formatAmount(this)">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Reportar</button>
            </form>
        </div>
    </div>
</div>

<script>
    function showBankDetails(method) {
        // Ocultar todas las secciones de detalles
        document.getElementById('mobilepay').style.display = 'none';
        document.getElementById('transferpay').style.display = 'none';
        document.getElementById('cashpay').style.display = 'none';
        document.getElementById('cardpay').style.display = 'none';
        document.getElementById('bank_details').style.display = 'block';

        // Mostrar la sección correspondiente según el método seleccionado
        if (method === 'mobilepay') {
            document.getElementById('mobilepay').style.display = 'block';
        } else if (method === 'transferpay') {
            document.getElementById('transferpay').style.display = 'block';
        } else if (method === 'cashpay') {
            document.getElementById('cashpay').style.display = 'block';
        } else if (method === 'cardpay') {
            document.getElementById('cardpay').style.display = 'block';
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