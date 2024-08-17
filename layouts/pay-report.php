<!-- Sección para reportar pago -->
<h2>Reporte de Pago</h2>
<h5>Reportar Pago para la Orden #<?php echo $orderId; ?></h5>

<form action="process-payment.php" method="POST">
    <input type="hidden" name="order_id" value="<?php echo $orderId; ?>">
    <input type="hidden" name="fee_amount" value="<?php echo $feeAmount; ?>">
    <input type="hidden" name="other_amount" value="<?php echo $otherAmount; ?>">
    <input type="hidden" name="payment_method" value="<?php echo $paymentMethod; ?>">

    <label for="payment_reference">Referencia del Pago:</label>
    <input type="text" name="payment_reference" id="payment_reference" class="form-control" required>

    <button type="submit" class="btn btn-primary mt-3">Reportar Pago</button>
</form>