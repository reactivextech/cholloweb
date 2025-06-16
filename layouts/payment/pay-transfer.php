<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-6 d-flex align-items-center">
                    <h3 class="fw-normal fs-5">Transferencia Bancaria</h3>
                </div>
                <form class="mt-4" id="transferFormData" novalidate>
                    <div class="row">
                        <!-- Número de referencia del pago -->
                        <div class="col-md-6 mb-4">
                            <label for="reference_number_transfer" class="form-label">Número de referencia del pago</label>
                            <input type="text" class="form-control" id="reference_number_transfer" name="reference_number_transfer" placeholder="Últimos 8 dígitos" maxlength="8" pattern="\d{8}" required>
                            <div class="invalid-feedback">Ingrese un número de referencia válido (8 dígitos).</div>
                        </div>

                        <!-- Banco de origen del pago -->
                        <div class="col-md-6 mb-4">
                            <label for="id_bank_transfer" class="form-label">Banco de origen del pago</label>
                            <select class="form-select" id="id_bank_transfer" name="id_bank_transfer" required>
                                <option selected disabled>Seleccionar</option>
                                <?php foreach ($orderDetails->active_banks as $active_bank): ?>
                                    <option value="<?php echo $active_bank->id ?>"><?php echo $active_bank->code . ' - ' . $active_bank->name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Seleccione un banco.</div>
                        </div>

                        <!-- Nacionalidad del pagador -->
                        <div class="col-md-6 mb-4">
                            <label for="nationality_ori" class="form-label">Nacionalidad de la cedula del pagador</label>
                            <select class="form-select" id="nationality_ori" name="nationality_ori" required>
                                <option selected disabled>Seleccionar</option>
                                <option value="V">V</option>
                                <option value="E">E</option>
                            </select>
                            <div class="invalid-feedback">Seleccione la nacionalidad.</div>
                        </div>
                        <!-- Número de cedula del pagador -->
                        <div class="col-md-6 mb-4">
                            <label for="identification_ori" class="form-label">Número de cedula del pagador</label>
                            <input type="number" class="form-control" id="identification_ori" name="identification_ori" placeholder="Cedula del pagador" title="Debe ingresar el número de cedula del que realizo el pago." required>
                            <div class="invalid-feedback">Ingrese un número de cedula valido.</div>
                        </div>

                        <!-- Fecha del pago -->
                        <div class="col-md-6 mb-4">
                            <label for="date_paid_transfer" class="form-label">Fecha en la que se realizo el pago</label>
                            <input type="date" class="form-control" id="date_paid_transfer" name="date_paid_transfer" required>
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
    document.getElementById('transferFormData').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita el envío normal del formulario

        // Validar el formulario
        let form = event.target;
        if (!form.checkValidity()) {
            event.stopPropagation();
            form.classList.add('was-validated');
            return;
        }

        let amountPay = document.getElementById('amount').value;

        // Recopilar los datos del formulario
        var formData = {
            order_id: <?php echo $orderDetails->id; ?>,
            order_quota_id: <?php echo $firstPendingOrDefeatedQuota; ?>,
            store_id: <?php echo $orderDetails->store_id; ?>,
            branch_id: <?php echo $orderDetails->branch_id; ?>,
            customer_id: <?php echo $orderDetails->customer_id; ?>,
            amount: amountPay,
            rate: <?php echo $rate; ?>,
            reference_number: $('#reference_number_transfer').val(),
            id_bank: $('#id_bank_transfer').val(),
            id_bank_destination: <?php echo $orderDetails->bank_id; ?>,
            nationality_ori: $('#nationality_ori').val(),
            identification_ori: $('#identification_ori').val(),
            date_paid: $('#date_paid_transfer').val()
        };

        // Enviar los datos mediante AJAX
        $.ajax({
            url: 'submit/submit-pay-transfer.php',
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