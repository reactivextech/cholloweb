<h2 class="text-primary fs-5 fw-medium mb-4">Seleccione su compra</h2>

<?php if ($orders): ?>
    <?php foreach ($orders as $order): ?>
        <div class="card mb-4 c-pointer" onclick="selectOrder('<?php echo $order->id; ?>')">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-3 d-flex align-items-center justify-content-center rounded mb-3 mb-sm-0 payment-order-card-img">
                        <img src="<?php echo CONFIG_API_URL ?>src/storage/app/public/products/<?php echo $order->product_image ?>" class="img-fluid card-img w-auto" alt="<?php echo $order->product_name ?>">
                    </div>
                    <div class="col-12 col-sm-9 d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title fw-semibold mb-3"><?php echo $order->product_name ?></h5>
                            <p class="card-text fw-light mb-2">Tienda: <b class="fw-medium"><?php echo $order->store_name ?></b></p>
                            <!-- <p class="card-text fw-light">Sucursal: <b class="fw-medium"><?php echo $order->branch_name ?></b></p> -->
                        </div>
                        <div class="d-flex flex-column flex-sm-row justify-content-between mt-3">
                            <div class="d-flex flex-column gap-2">
                                <p class="card-text fw-light px-sm-1">
                                    Inicial:
                                    <b class="fw-medium">
                                        <span class="fs-6"><?php echo $company->currency3; ?></span><?php echo $order->fee_initial ?>
                                    </b>
                                </p>
                                <div class="bg-primary rounded-pill px-2 py-1 me-auto">
                                    <p class="card-text fs-6 fw-light text-white mb-0">
                                        Cuotas:
                                        <b class="fw-medium"><?php echo $order->quota_qty ?>
                                            x
                                            <span class="fs-7"><?php echo $company->currency3; ?></span><?php echo $order->fee_amount ?>
                                        </b>
                                    </p>
                                </div>
                            </div>
                            <div class="d-sm-flex flex-sm-column gap-2 align-items-sm-end justify-content-sm-center mt-2 mt-sm-0">
                                <span class="card-text fw-light">Fecha de compra: </span>
                                <span class="card-text fw-medium"><?php echo getDateFormat($order->date_registration) ?></span>
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
