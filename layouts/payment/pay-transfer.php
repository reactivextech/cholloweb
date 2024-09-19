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
                            <label for="reference_number" class="form-label">Número de referencia del pago</label>
                            <input type="text" class="form-control" id="reference_number" name="reference_number" placeholder="Últimos 8 dígitos" maxlength="8" pattern="\d{8}" required>
                        </div>

                        <!-- Banco de origen del pago -->
                        <div class="col-md-6 mb-4">
                            <label for="id_bank" class="form-label">Banco de origen del pago</label>
                            <select class="form-select" id="id_bank" name="id_bank" required>
                                <option selected disabled>Seleccionar</option>
                                <?php foreach ($orderDetails->active_banks as $active_bank): ?>
                                    <option value="<?php echo $active_bank->id ?>"><?php echo $active_bank->code ?> - <?php echo $active_bank->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Fecha del pago -->
                        <div class="col-md-6 mb-4">
                            <label for="date_paid" class="form-label">Fecha en la que se realizo el pago</label>
                            <input type="date" class="form-control" id="date_paid" name="date_paid" required>
                        </div>

                        <!-- Botón de enviar -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">Verificar</button>
                        </div>

                        <!-- Campos ocultos con los datos del pedido -->
                        <input type="hidden" name="order_id" value="<?php echo $orderDetails->id; ?>">
                        <input type="hidden" name="order_quota_id" value="<?php echo $firstPendingOrDefeatedQuota; ?>">
                        <input type="hidden" name="store_id" value="<?php echo $orderDetails->store_id; ?>">
                        <input type="hidden" name="branch_id" value="<?php echo $orderDetails->branch_id; ?>">
                        <input type="hidden" name="customer_id" value="<?php echo $orderDetails->customer_id; ?>">
                        <input type="hidden" name="id_bank" value="<?php echo $orderDetails->bank_id; ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>