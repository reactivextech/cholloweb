<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-6 d-flex align-items-center">
                    <h3 class="fw-normal fs-5">Pago Móvil</h3>
                </div>
                <form class="mt-4" id="mobileFormData" novalidate>
                    <div class="row">
                        <!-- Número de referencia del pago -->
                        <div class="col-md-6 mb-4">
                            <label for="reference_number_mobile" class="form-label">Número de referencia del pago</label>
                            <input type="text" class="form-control" id="reference_number_mobile" name="reference_number_mobile" placeholder="Últimos 6 dígitos" maxlength="6" pattern="\d{6}" required>
                            <div class="invalid-feedback">Ingrese un número de referencia válido (6 dígitos).</div>
                        </div>
                        <!-- Teléfono de origen del pago móvil -->
                        <div class="col-md-6 mb-4">
                            <label for="mobile_phone" class="form-label">Teléfono de origen del Pago Móvil</label>
                            <input type="tel" class="form-control" id="mobile_phone" name="mobile_phone" placeholder="0412xxxxxxx" pattern="^0[0-9]{10}$" title="Debe ingresar un número de teléfono válido." required>
                            <div class="invalid-feedback">Ingrese un número de teléfono valido.</div>
                        </div>
                        <!-- Banco de origen del pago móvil -->
                        <div class="col-md-6 mb-4">
                            <label for="id_bank_mobile" class="form-label">Banco de origen del pago móvil</label>
                            <select class="form-select" id="id_bank_mobile" name="id_bank_mobile" required>
                                <option selected disabled>Seleccionar</option>
                                <?php foreach ($orderDetails->active_banks as $active_bank): ?>
                                    <option value="<?php echo $active_bank->id ?>"><?php echo $active_bank->code ?> - <?php echo $active_bank->name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Seleccione un banco.</div>
                        </div>
                        <!-- Fecha del pago -->
                        <div class="col-md-6 mb-4">
                            <label for="date_paid_mobile" class="form-label">Fecha en la que se realizo el pago</label>
                            <input type="date" class="form-control" id="date_paid_mobile" name="date_paid_mobile" required>
                            <div class="invalid-feedback">Seleccione una fecha válida.</div>
                        </div>
                        <!-- Botón de enviar -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">Verificar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('mobileFormData').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita el envío normal del formulario

        // Validar el formulario
        let form = event.target;
        if (!form.checkValidity()) {
            event.stopPropagation();
            form.classList.add('was-validated');
            return;
        }

        let amountPay = document.getElementById('amount').value;

        let phone = $('#mobile_phone').val();

        // Recopilar los datos del formulario
        var formData = {
            order_id: <?php echo $orderDetails->id; ?>,
            order_quota_id: <?php echo $firstPendingOrDefeatedQuota; ?>,
            store_id: <?php echo $orderDetails->store_id; ?>,
            branch_id: <?php echo $orderDetails->branch_id; ?>,
            customer_id: <?php echo $orderDetails->customer_id; ?>,
            amount: amountPay,
            reference_number: $('#reference_number_mobile').val(),
            id_bank: $('#id_bank_mobile').val(),
            id_bank_destination: <?php echo $orderDetails->bank_id; ?>,
            city_code: <?php echo substr($orderDetails->branch_movil, 0, 4); ?>,
            phone: <?php echo substr($orderDetails->branch_movil, 4); ?>,
            city_code_ori: $('#mobile_phone').val().substr(0, 4),
            phone_ori: $('#mobile_phone').val().substr(4),
            date_paid: $('#date_paid_mobile').val()
        };

        // Enviar los datos mediante AJAX
        $.ajax({
            url: 'submit/submit-pay-mobile.php',
            type: 'POST',
            dataType: 'json',
            data: formData,
            success: function(response) {
                // Mostrar la respuesta en el modal
                $('#modalMessage').text(response.message);
                $('#responseModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.log('Server: ' + xhr.responseText);
                // console.log(error);

                // Mostrar mensaje de error en caso de fallo
                $('#modalMessage').text('No se pudo aplicar el pago, intente nuevamente. Si persiste comunícate con soporte.');
                $('#responseModal').modal('show');
            }
        });
    });
</script>