<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-6 d-flex align-items-center">
                    <h3 class="fw-normal fs-5">Pago Móvil</h3>
                </div>
                <form class="mt-4">
                    <div class="row">
                        <!-- Número de referencia del pago -->
                        <div class="col-md-6 mb-4">
                            <label for="reference_number" class="form-label">Número de referencia del pago</label>
                            <input type="text" class="form-control" id="reference_number" name="reference_number" placeholder="Últimos 6 dígitos" required>
                        </div>
                        <!-- Teléfono de origen del pago móvil -->
                        <div class="col-md-6 mb-4">
                            <label for="mobile_phone" class="form-label">Teléfono de origen del Pago Móvil</label>
                            <input type="tel" class="form-control" id="mobile_phone" name="mobile_phone" placeholder="0412xxxxxxx" pattern="^0[0-9]{9}$" title="Debe ingresar un número de teléfono válido." required>
                        </div>
                        <!-- Banco de origen del pago móvil -->
                        <div class="col-md-6 mb-4">
                            <label for="origin_bank" class="form-label">Banco de origen del Pago Móvil</label>
                            <select class="form-select" id="origin_bank" name="origin_bank" required>
                                <option selected disabled>Seleccionar</option>
                                <option value="banco1">Banco de Venezuela</option>
                                <option value="banco2">Banesco</option>
                                <option value="banco3">Mercantil</option>
                                <option value="banco4">BBVA Provincial</option>
                                <option value="banco5">Bicentenario</option>
                            </select>
                        </div>
                        <!-- Fecha del pago -->
                        <div class="col-md-6 mb-4">
                            <label for="payment_date" class="form-label">Fecha en la que se realizo el pago</label>
                            <input type="date" class="form-control" id="payment_date" name="payment_date" required>
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