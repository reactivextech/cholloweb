<h2 class="text-primary fs-5 fw-medium mb-4">Compras pendientes</h2>

<?php if ($orders): ?>
    <?php foreach ($orders as $order): ?>
        <div class="card card-button mb-4" onclick="selectOrder('<?php echo $order->id; ?>')">
            <div class="card-body">
                <div class="row">
                    <div class="col-3 d-flex align-items-center">
                        <img src="<?php echo CONFIG_API_URL ?>src/storage/app/public/products/<?php echo $order->product_image ?>" class="img-fluid rounded" alt="<?php echo $order->product_name ?>">
                    </div>

                    <div class="col-9">
                        <h5 class="card-title font-weight-bold"><?php echo $order->product_name ?></h5>
                        <p class="card-text mb-1">Tienda: <?php echo $order->store_name ?></p>
                        <p class="card-text">Sucursal: <?php echo $order->branch_name ?></p>

                        <div class="row mt-3">
                            <div class="col-md-8">
                                <div class="p-2">
                                    <p class="card-text mb-1"><small class="text-body-secondary">Inicial: <?php echo $company->currency3; ?><?php echo $order->fee_initial ?></small></p>
                                    <p class="card-text mb-0"><small class="text-body-secondary">Cuotas: <?php echo $order->quota_qty ?> x <?php echo $company->currency3; ?><?php echo $order->fee_amount ?></small></p>
                                </div>
                            </div>

                            <div class="col-md-4 d-flex align-items-center justify-content-end">
                                <p class="card-text"><small class="text-body-secondary">Fecha de compra: <?php echo $order->date_registration ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="no-orders rounded-3 p-1">
        <p class="text-center fs-5 fw-medium d-inline-block">No tienes órdenes pendientes.</p>
    </div>
<?php endif; ?>

<script>
    function selectOrder(orderId) {
        window.location.href = 'pay?section=report&order=' + orderId;
    }
</script>