<?php

// CONFIG REQUIRE
require_once 'includes/config.php';
require_once 'includes/function.php';

session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['session_token'])) {
    // Redirigir al usuario a pay.php si ya está autenticado
    header('Location: pay');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $credential = $_POST['credential'];
    $password = $_POST['password'];

    // Llamada a la API de autenticación
    $loginResponse = login($credential, $password);

    if ($loginResponse && $loginResponse->success) {
        // Guardar token de sesión
        $sessionData = [
            'session_token' => 'session_token',
            'customer_id' => 'id',
            'customer_name' => 'name',
            'customer_lastname' => 'lastname',
            'customer_nationality' => 'nationality',
            'customer_identification' => 'identification',
        ];

        foreach ($sessionData as $sessionKey => $responseKey) {
            $_SESSION[$sessionKey] = $loginResponse->data->{$responseKey};
        }

        // Redirigir a la página de pagos
        header('Location: pay');
        exit();
    } else {
        // $error = $loginResponse->message ?? 'No se pudo iniciar sesión, intente nuevamente.';
        $_SESSION['error'] = $loginResponse->message ?? 'No se pudo iniciar sesión, intente nuevamente.';

        // Redirigir para evitar que se repita la solicitud POST
        header('Location: login');
        exit();
    }
}

// Mostrar mensaje de error si existe en la sesión
$error = '';
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']); // Limpiar el mensaje de error después de mostrarlo
}

?>

<!-- HEAD:BEGIN -->
<?php

$page = 'login';
require_once 'layouts/common/head.php';

?>
<!-- HEAD:END -->

<body>
    <!-- BANNERTOP:BEGIN -->
    <?php require_once 'layouts/theme/banner-top.php'; ?>
    <!-- BANNERTOP:END -->

    <!-- HEADER:BEGIN -->
    <?php require_once 'layouts/theme/header.php'; ?>
    <!-- HEADER:END -->

    <!-- LOGIN:BEGIN -->
    <section id="section_login" class="login-form">
        <div id="home_application_container">
            <div id="login-page">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="recover-form">
                            <div class="modal-title">Reporta tu Pago</div>
                            <p class="modal-description">Para iniciar el proceso, ingrese su cédula o correo electrónico de su cuenta registrada.</p>
                        </div>

                        <form class="login-form" action="login.php" method="POST" novalidate>
                            <div class="input-control">
                                <label>Cédula o Correo electrónico</label>
                                <input type="text" id="credential" name="credential" placeholder="Ingresa tu cédula o correo electrónico" required>
                                <div class="invalid-feedback">Por favor, ingresa tu cédula o correo electrónico.</div>
                            </div>
                            <div class="input-control">
                                <label>Contraseña</label>
                                <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required minlength="6">
                                <div class="invalid-feedback">La contraseña debe tener al menos 6 caracteres.</div>
                            </div>

                            <!-- Muestra el mensaje de error del servidor -->
                            <?php if (isset($error)): ?>
                                <p id="error-message" class="text-danger text-center"><?php echo $error; ?></p>
                            <?php endif; ?>

                            <button type="submit" class="login">Ingresar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </section>
    <!-- LOGIN:END -->

    <!-- QRAPP:BEGIN -->
    <?php require_once 'layouts/theme/qr-app.php'; ?>
    <!-- QRAPP:END -->

    <!-- FOOTER:BEGIN -->
    <?php require_once 'layouts/theme/footer.php'; ?>
    <!-- FOOTER:END -->

    <div id="mobile_nav_overlay_wrapper"></div>

    <div id="homepage_overlay_wrapper"></div>

    <!-- SCRIPTS:BEGIN -->
    <?php require_once 'layouts/common/scripts.php'; ?>
    <!-- SCRIPTS:END -->

    <script>
        // Validación del formulario usando Bootstrap
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.login-form')
            var errorMessage = document.getElementById('error-message');

            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (errorMessage) {
                        errorMessage.style.display = 'none'; // Oculta el mensaje
                    }

                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>