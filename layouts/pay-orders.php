<div id="home-account-type-wrapper-stage0 stage1">
    <p class="home_application_create_title">Mis compras</p>
    <?php if ($orders): ?>
        <?php foreach ($orders as $order): ?>
            <div class="card mb-3 card-selectable" style="max-width: 540px;" onclick="selectOrder('<?php echo $order->id; ?>')">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?php echo CONFIG_API_URL ?>src/storage/app/public/products/<?php echo $order->product->image ?>" class="img-fluid rounded-start" alt="<?php echo $order->product->name ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $order->product->name ?></h5>
                            <p class="card-text">Tienda: <?php echo $order->store_name ?></p>
                            <p class="card-text">Sucursal: <?php echo $order->branch_name ?></p>
                            <p class="card-text"><small class="text-body-secondary">Inicial: <?php echo $order->fee_initial ?></small></p>
                            <p class="card-text"><small class="text-body-secondary">Cuotas: <?php echo $order->quota_qty ?> x <?php echo $order->fee_amount ?></small></p>
                            <p class="card-text"><small class="text-body-secondary">Fecha de compra: <?php echo $order->date_registration ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No se encontraron órdenes.</p>
    <?php endif; ?>

    <script>
        function selectOrder(orderId) {
            window.location.href = 'pay?section=select&order_id=' + orderId;
        }
    </script>
</div>