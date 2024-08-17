<!-- Sección para seleccionar monto y método de pago -->
<h2>Seleccionar Monto y Método de Pago</h2>
<h5><?php echo $orderDetails->product_name; ?></h5>
<p>Tienda: <?php echo $orderDetails->store_name; ?></p>
<p>Sucursal: <?php echo $orderDetails->branch_name; ?></p>
<p>Monto a pagar: <?php echo $orderDetails->fee_amount; ?></p>

<form action="pay.php" method="GET">
    <input type="hidden" name="section" value="report">
    <input type="hidden" name="order_id" value="<?php echo $orderDetails->id; ?>">
    <input type="hidden" name="fee_amount" value="<?php echo $orderDetails->fee_amount; ?>">

    <label for="other_amount">Otro monto a pagar:</label>
    <input type="text" name="other_amount" id="other_amount">

    <label for="payment_method">Método de pago:</label>
    <select name="payment_method" id="payment_method">
        <option value="1">Tarjeta de Crédito</option>
        <option value="2">Transferencia Bancaria</option>
        <option value="3">Pago Móvil</option>
    </select>

    <button type="submit" class="btn btn-primary">Continuar</button>
</form>
