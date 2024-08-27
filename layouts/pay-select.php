<h2 class="title-primary mb-4">Pago de cuota</h2>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-3 font-weight-bold"><?php echo $orderDetails->product_name; ?></h5>
                <p class="mb-1"><strong>Cuota:</strong> <?php echo $company->currency3; ?><?php echo $orderDetails->fee_amount; ?></p>
                <p><strong>Total por pagar:</strong> <?php echo $company->currency3; ?><?php echo $orderDetails->fee_amount; ?></p>
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
            <form action="pay.php" method="GET">
                <input type="hidden" name="section" value="report">
                <input type="hidden" name="order_id" value="<?php echo $orderDetails->id; ?>">
                <input type="hidden" name="fee_amount" value="<?php echo $orderDetails->fee_amount; ?>">

                <div class="mb-3">
                    <label for="other_amount" class="form-label">Otro monto a pagar:</label>
                    <input type="text" name="other_amount" id="other_amount" class="form-control" placeholder="Ingrese el monto adicional">
                </div>

                <div class="mb-3">
                    <label for="payment_method" class="form-label">Método de pago:</label>
                    <select name="payment_method" id="payment_method" class="form-select">
                        <option value="1">Tarjeta de Crédito</option>
                        <option value="2">Transferencia Bancaria</option>
                        <option value="3">Pago Móvil</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Continuar</button>
            </form>
        </div>
    </div>
</div>