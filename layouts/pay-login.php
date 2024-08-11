<div id="home-account-type-wrapper-stage0">
    <p class="home_application_create_title">Reporta tu pago</p>
    <!-- <p class="home_application_create_sub_title">Escribe tus datos a continuación:</p> -->
    <form id="form-stage1" name="form-stage1" action="" method="POST" onsubmit="login(event)">
        <div class="home_apply_left_col_input_container" id="home_form_single_fname">
            <label><span>*</span> Cédula:</label>
            <input type="text" id="identification" name="identification" onblur="check_fname_input();" tabindex="2" placeholder="Documento de Identidad">
        </div>
        <div class="clear"></div>
        <div class="home_apply_left_col_input_container" id="home_form_single_sec1">
            <label><span>*</span> Contraseña:</label>
            <input type="password" id="password" name="password" onblur="check_app_password();" tabindex="9" placeholder="Contraseña">
            <span class="invalid-message">La contraseña es muy corta</span>
        </div>
        <div id='create_account' style='text-align: center;'>
            <div id='please_wait_image' style='display:none'>
                <img src='assets/images/chollo-phone.webp' width='200px;' style='position:relative; margin-left: auto; margin-right: auto;'>
            </div>
            <div id='create_account_button'>
                <button id="application_process_app_btn" type="submit" class="application_send_app_btn" style="clear:both;">Ingresar</button>
            </div>
        </div>
    </form>
</div>

<script>
    async function login(event) {
        event.preventDefault();

        const identification = document.getElementById('identification').value;
        const password = document.getElementById('password').value;

        try {
            const response = await fetch('http://192.168.18.3:8000/api/v1/auth/loginId', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    identification: identification,
                    password: password
                })
            });

            // console.log(JSON.stringify({
            //     identification: identification,
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

<?php
// // pay-login.php

// session_start();

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $identification = $_POST['identification'];
//     $password = $_POST['password'];

//     $ch = curl_init();

//     curl_setopt($ch, CURLOPT_URL, 'http://192.168.18.3:8000/api/v1/auth/loginId');
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, [
//         'Content-Type: application/json',
//         'Accept: application/json',
//     ]);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
//         'identification' => $identification,
//         'password' => $password,
//     ]));

//     $response = curl_exec($ch);
//     $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//     curl_close($ch);

//     if ($httpcode == 201) {
//         $responseData = json_decode($response, true);
//         if (isset($responseData['data']['session_token'])) {
//             $_SESSION['api_token'] = $responseData['data']['session_token'];
//             // Redireccionar o mostrar contenido según sea necesario
//             header("Location: ./pay"); // Redirige a la página de dashboard o cualquier otra página
//             exit();
//         }
//     } else {
//         $error = json_decode($response, true)['message'] ?? 'Error desconocido';
//         echo "<p>Error: $error</p>";
//     }
// }
?>