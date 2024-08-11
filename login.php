<?php

// CONFIG REQUIRE
require_once 'includes/config.php';
require_once 'includes/function.php';

// session_start();

// require_once "Autenticacion.php";
// require_once "Clases.php";

// $auth = new Auth();
// $db_handle = new DBController();
// $util = new Util();

// require_once "ValidacionSesion.php";

// if ($isLoggedIn) {
//     $util->redirect("pay.php");
// }

// if (!empty($_POST["login"])) {
//     $isAuthenticated = false;

//     $username = $_POST["usuario_nombre"];
//     $password = $_POST["usuario_password"];

//     $user = $auth->getMemberByUsername($username);
//     if (password_verify($password, $user[0]["usuario_password"])) {
//         $isAuthenticated = true;
//     }

//     if ($isAuthenticated) {
//         $_SESSION["usuario_id"] = $user[0]["usuario_id"];

//         // Set Auth Cookies if 'Remember Me' checked
//         if (!empty($_POST["remember"])) {
//             setcookie("login_usuario", $username, $cookie_expiration_time);

//             $random_password = $util->getToken(16);
//             setcookie("random_password", $random_password, $cookie_expiration_time);

//             $random_selector = $util->getToken(32);
//             setcookie("random_selector", $random_selector, $cookie_expiration_time);

//             $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
//             $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);

//             $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);

//             // mark existing token as expired
//             $userToken = $auth->getTokenByUsername($username, 0);
//             if (!empty($userToken[0]["id"])) {
//                 $auth->markAsExpired($userToken[0]["id"]);
//             }
//             // Insert new token
//             $auth->insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date);
//         } else {
//             $util->clearAuthCookie();
//         }
//         $util->redirect("pagos.php");
//     } else {
//         $mensaje = "Credenciales incorrectos, Por favor intente nuevamente.";
//     }
// }
?>

<!-- HEAD:BEGIN -->
<?php

$section = 'login';
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
    <section id="section_login" class="login-form">
        <div id="home_application_container">
            <div id="login-page">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="recover-form">
                            <div class="modal-title">Reporta tu Pago</div>
                            <p class="modal-description">Para iniciar el proceso, ingrese su cédula o correo electrónico de su cuenta registrada.</p>
                        </div>
                        <form class="login-form" action="" method="POST" onsubmit="login(event)">
                            <div class="input-control">
                                <label>Cédula o Correo electrónico</label>
                                <input type="text" id="credential" tabindex="5" name="credential" placeholder="Ingresa tu cédula o correo electrónico">
                            </div>
                            <div class="input-control">
                                <label>Contraseña</label>
                                <input type="password" id="password" tabindex="5" name="password" placeholder="Ingresa tu contraseña">
                            </div>

                            <!-- <a href="javascript:;" class="forgotten">¿Olvidaste la contraseña?</a> -->
                            <p class="error-msg" style="display:none"></p>

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

    <script>
        async function login(event) {
            event.preventDefault();

            const credential = document.getElementById('credential').value;
            const password = document.getElementById('password').value;

            try {
                const response = await fetch('http://192.168.18.3:8000/api/v1/auth/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        credential: credential,
                        password: password
                    })
                });

                // console.log(JSON.stringify({
                //     credential: credential,
                //     password: password
                // }));

                const data = await response.json();

                if (data.success) {
                    const token = data.data.session_token;
                    const storeTokenResponse = await fetch('includes/token.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: `token=${token}`
                    });

                    const storeTokenResult = await storeTokenResponse.json();
                    console.log(storeTokenResponse.json());
                    console.log(storeTokenResult.success);
                    if (storeTokenResult.success) {
                        if ($loginSuccessful) {
                            session_start();
                            $_SESSION['api_token'] = $responseData['data']['session_token'];
                            // Redireccionar o mostrar contenido según sea necesario
                        }

                        window.location.href = './pay';
                    } else {
                        alert('Error al guardar el token en la sesión.');
                    }
                } else {
                    alert(data.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error al iniciar sesión, por favor intenta de nuevo.');
            }
        }
    </script>

    <!-- SCRIPTS:BEGIN -->
    <?php require_once 'common/scripts.php'; ?>
    <!-- SCRIPTS:END -->
</body>

</html>