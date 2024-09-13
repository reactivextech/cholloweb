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
        $_SESSION['session_token'] = $loginResponse->data->session_token;
        $_SESSION['customer_id'] = $loginResponse->data->id;
        $_SESSION['customer_name'] = $loginResponse->data->name;
        $_SESSION['customer_lastname'] = $loginResponse->data->lastname;

        // Redirigir a la página de pagos
        header('Location: pay');
        exit();
    } else {
        $error = $loginResponse->message ?? 'No se pudo iniciar sesión, intente nuevamente.';
    }
}

?>

<!-- HEAD:BEGIN -->
<?php

$page = 'login';
require_once 'layouts/head.php';

?>
<!-- HEAD:END -->

<body>
    <!-- BANNERTOP:BEGIN -->
    <?php require_once 'layouts/banner-top.php'; ?>
    <!-- BANNERTOP:END -->

    <!-- HEADER:BEGIN -->
    <?php require_once 'layouts/header.php'; ?>
    <!-- HEADER:END -->

    <!-- LOGIN:BEGIN -->
    <section id="home_application_wrapper" class="login-form">
        <div id="home_application_container">
            <div id="login-page">
                <div class="modal-content">
                    <div id="home_application_right_col">
                        <div class="recover-form">
                            <div class="modal-title">Reporta tu Pago</div>
                            <p class="modal-description">Para iniciar el proceso, ingrese su cédula o correo electrónico de su cuenta registrada.</p>
                        </div>
                        <form class="login-form" action="login.php" method="POST">
                            <div class="input-control">
                                <label>Cédula o Correo electrónico</label>
                                <input type="text" id="credential" tabindex="5" name="credential" placeholder="Ingresa tu cédula o correo electrónico">
                            </div>
                            <div class="input-control">
                                <label>Contraseña</label>
                                <input type="password" id="password" tabindex="5" name="password" placeholder="Ingresa tu contraseña">
                            </div>

                            <!-- <a href="javascript:;" class="forgotten">¿Olvidaste la contraseña?</a> -->
                            <?php if (isset($error)): ?>
                                <p class="error-msg"><?php echo $error; ?></p>
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
    <?php require_once 'layouts/qr-app.php'; ?>
    <!-- QRAPP:END -->

    <!-- FOOTER:BEGIN -->
    <?php require_once 'layouts/footer.php'; ?>
    <!-- FOOTER:END -->

    <div id="mobile_nav_overlay_wrapper"></div>

    <div id="homepage_overlay_wrapper"></div>

    <!-- SCRIPTS:BEGIN -->
    <?php require_once 'common/scripts.php'; ?>
    <!-- SCRIPTS:END -->
</body>

</html>