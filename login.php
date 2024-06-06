<?php
session_start();

require_once "Autenticacion.php";
require_once "Clases.php";

$auth = new Auth();
$db_handle = new DBController();
$util = new Util();

require_once "ValidacionSesion.php";

if ($isLoggedIn) {
    $util->redirect("pagos.php");
}

if (! empty($_POST["login"])) {
    $isAuthenticated = false;
    
    $username = $_POST["usuario_nombre"];
    $password = $_POST["usuario_password"];
    
    $user = $auth->getMemberByUsername($username);
    if (password_verify($password, $user[0]["usuario_password"])) {
        $isAuthenticated = true;
    }
    
    if ($isAuthenticated) {
        $_SESSION["usuario_id"] = $user[0]["usuario_id"];
        
        // Set Auth Cookies if 'Remember Me' checked
        if (! empty($_POST["remember"])) {
            setcookie("login_usuario", $username, $cookie_expiration_time);
            
            $random_password = $util->getToken(16);
            setcookie("random_password", $random_password, $cookie_expiration_time);
            
            $random_selector = $util->getToken(32);
            setcookie("random_selector", $random_selector, $cookie_expiration_time);
            
            $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
            $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);
            
            $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);
            
            // mark existing token as expired
            $userToken = $auth->getTokenByUsername($username, 0);
            if (! empty($userToken[0]["id"])) {
                $auth->markAsExpired($userToken[0]["id"]);
            }
            // Insert new token
            $auth->insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date);
        } else {
            $util->clearAuthCookie();
        }
        $util->redirect("pagos.php");
    } else {
        $mensaje = "Credenciales incorrectos, Por favor intente nuevamente.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="msapplication-TileColor" content="#0012c6">
    <meta name="msapplication-TileImage" content="https://www.chollo.app/assets/images/meta/meta-t.webp">

    <!-- Mobile web full screen -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Primary Meta Tags -->
    <title>Chollo — Iniciar Sesion</title>
    
    <meta name="title" content="Chollo — Iniciar Sesion">
    <meta name="author" content="Chollo">
    <meta name="description"
        content="Inicia Sesion para acceder al area de Pagos de Cuotas.">
    <meta name="keywords" content="credit, phone, pago ,cuotas, credito, celular, telefono, marca">
    <meta name="theme-color" content="#0012c6">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Chollo — Iniciar Sesion">
    <meta property="og:url" content="https://www.chollo.app">
    <meta property="og:title" content="Chollo — Iniciar Sesion">
    <meta property="og:description"
        content="Inicia Sesion para acceder al area de Pagos de Cuotas.">
    <meta property="og:image" content="https://www.chollo.app/assets/images/meta/meta-f.webp">
    <meta property="og:image:width" content="640">
    <meta property="og:image:height" content="640">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://chollo.app">
    <meta property="twitter:domain" content="www.chollo.app">
    <meta property="twitter:title" content="Chollo — Inicia Sesion">
    <meta property="twitter:description"
        content="Inicia Sesion para acceder al area de Pagos de Cuotas.">
    <meta property="twitter:image" content="https://chollo.app/assets/images/meta/meta-t.webp">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/webp" href="assets/images/logo/favicon.webp">
    <link rel="apple-touch-icon" sizes="48x48" href="assets/images/logo/icon-48x48.webp">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/logo/icon-72x72.webp">
    <link rel="apple-touch-icon" sizes="96x96" href="assets/images/logo/icon-96x96.webp">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/images/logo/icon-144x144.webp">
    <link rel="apple-touch-icon" sizes="192x192" href="assets/images/logo/icon-192x192.webp">
    <link rel="apple-touch-icon" sizes="256x256" href="assets/images/logo/icon-256x256.webp">
    <link rel="apple-touch-icon" sizes="384x384" href="assets/images/logo/icon-384x384.webp">
    <link rel="apple-touch-icon" sizes="512x512" href="assets/images/logo/icon-512x512.webp">

    <!-- Vendor CSS -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com/"> -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin> -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;300;400;500;700;800;900&amp;family=Poppins:wght@100;300;400;500;600;800&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <link href="assets/css/vendor/fontawesome/all.css" rel='stylesheet' type='text/css'>
    <link href='assets/css/vendor/animate.css' rel='stylesheet' type='text/css'>
    <!-- Main CSS -->
    <link href='assets/css/style.css' rel='stylesheet' type='text/css'>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F0Z8JJZHLM"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-F0Z8JJZHLM');
    </script>
</head>

<body>
    <section id="header_top_wrapper">
        <div id="header_top_container">
            <p>Chollo ahora disponible en Tiendas
                <!-- <a href="#">Click aquí</a> -->
            </p>
        </div>
    </section>
    <section id="header_bottom_wrapper">
        <div id="header_bottom_container">
            <div id="header_bottom_left">
                <a href="./" target="_self">
                    <img src="assets/images/icon_logo.webp" alt="Chollo App">
                </a>
            </div>
            <div id="header_bottom_mid">
                <a href="#" class="header_bottom_link_item">Dónde Comprar</a>
                <a href="./pagos" class="header_bottom_link_item">Pagar Cuota</a>
                <!-- <a href="faq.html" class="header_bottom_link_item">FAQ's</a>
                <a href="contact.html" class="header_bottom_link_item">Ayuda</a>
                <a class="header_bottom_link_item header-login-btn">Login</a> -->
            </div>
            <div id="header_bottom_right">
                <!--<div class="header_bottom_right_search_container">
					<p>Find anything...</p>
				</div>-->
                <div class="header_bottom_right_create_account">
                    <a class="scroll_bottom_btn">Descarga la App
                        <div class="header_bottom_right_arrow_cont">
                            <!-- Generator: Adobe Illustrator 24.2.1, SVG Export Plug-In  -->
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7.98px"
                                height="9.21px" viewBox="0 0 7.98 9.21"
                                style="overflow:visible;enable-background:new 0 0 7.98 9.21;" xml:space="preserve">
                                <defs>
                                </defs>
                                <polygon class="st0_arrow" style="fill: #FFFFFF;"
                                    points="7.98,4.61 3.99,6.91 0,9.21 0,4.61 0,0 3.99,2.3 " />
                            </svg>
                        </div>
                    </a>
                </div>
                <!-- <div class="header_bottom_right_login">
                    <a>Login
                        <div class="header_bottom_right_arrow_cont">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7.98px"
                                height="9.21px" viewBox="0 0 7.98 9.21"
                                style="overflow:visible;enable-background:new 0 0 7.98 9.21;" xml:space="preserve">
                                <defs>
                                </defs>
                                <polygon class="st0_arrow" style="fill: #FFFFFF;" points="7.98,4.61 3.99,6.91 0,9.21 0,4.61 0,0 3.99,2.3 " />
                            </svg>
                        </div>
                    </a>
                </div> -->
            </div>
            <div id="mobile_navigation_wrapper">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div style="clear:both;"></div>
        </div>
    </section>
    <div id="modalLogin" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close"><span>x</span></button>
                <div class="modal-title">
                    Login
                </div>
            </div>
            <div class="modal-body">
                <form class="recover-form" style="display:none;">
                    <p style="margin-bottom:25px;">To start the account recovery process, please enter the email address
                        your account is registered with.
                        <br><br>
                        You will then receive an email containing recovery instructions.
                    </p>
                    <div class="input-control">
                        <label>Username/Email</label>
                        <input type="text" tabindex="5" name="username" value="">
                    </div>
                    <p class="error-msg" style="display:none"></p>
                    <p class="sent" style="display:none; margin:20px 0;">An email with recovery instructions was just
                        sent.</p>
                    <button type="button" class="recover-back"><i class="fa fa-arrow-left"
                            style="margin-right:10px;"></i>Back</button>
                    <button type="submit" class="recover">Send email<i class="fa fa-arrow-right"
                            style="margin-left:10px;"></i></button>
                </form>
                <div class="facebook-link-form" style="display:none">
                    <p style="text-align:center"><strong>Whoops!</strong> It looks like the email of your Facebook
                        account already exists at Mad For It.<br>
                        <br>In order to continue, we have sent you an email to connect your Facebook and Mad For It
                        account together.<br><br>
                        Please check for the email sent to: <strong style="font-weight:bold;"><span
                                class="facebook-link-email"></span></strong>
                </div>
                <form class="login-form">
                    <div class="input-control">
                        <label>Username/Email</label>
                        <input type="text" id="username" tabindex="5" name="username" value="">
                    </div>
                    <div class="input-control">
                        <label>Password</label>
                        <input type="password" id="login-password" tabindex="5" name="password" value="">
                    </div>
                    <!-- <a href="http://store/index.php?dispatch=auth.recover_password" class="forgotten">Forgotten password?</a> -->
                    <a href="javascript:;" class="forgotten">Forgotten password</a>
                    <p class="error-msg" style="display:none"></p>
                    <!-- <button type="submit" class="login">Let's Go<i class="fa fa-arrow-right" style="margin-left:10px;"></i></button> -->
                    <button type="submit" class="login">Let's Go</button>
                    <!--<div style="text-align:center; width:100%;">
<div style="margin-top:20px;" class="fb-login-button" data-scope="public_profile,user_birthday,user_gender" data-width="" data-size="medium" data-button-type="login_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="true"></div>
</div>-->
                </form>
                <div class="login-form-register">
                    <p><span>New to Mad For It?</span></p>
                    <a href="index.html#home_application_container" title="Create Account">Create Your Account</a>
                </div>
            </div>
        </div>
    </div>

    
    <!-- QR APP -->
    <section id="home_application_wrapper">
        <div id="home_application_container">

            <div id="home_application_left_col">
                <h3 class="home_h3_title" id="home_apply_now_title">
                    ¡Todo es más fácil en <span>nuestra app!</span>
                </h3>
                <p class="home_app_sub_headline">Crea tu cuenta ahora y comienza a comprar hoy.<br /><br /></p>
            </div>

            <div id="home_application_right_col">
                <div id="home-account-type-wrapper-stage0">
                    <!-- <p class="home_application_create_title">Create your account &amp; start shopping today</p>
                    <p class="home_application_create_sub_title">Registering an account won't affect your credit rating,
                        we only perform a soft search to check your eligability. If approved for your order, then a hard
                        search will be performed.</p> -->
                    <form id="form-stage1" name="form-stage1"
                        action="https://madforit.com/ajax/save_application2.ajax.php" method="POST">
                        <p style="margin-bottom:10px; display:none;">Sign up with Facebook</p>

                        <div style="text-align:left; width:100%; margin-bottom:10px; height:40px; display:none;">

                            <div style="!margin-top:20px;" class="fb-login-button" data-scope="public_profile,email"
                                data-layout="rounded" data-width="" data-size="medium" data-button-type="login_with"
                                data-layout="default" data-auto-logout-link="false" data-use-continue-as="true"></div>
                        </div>

                        <div
                            style="width: 100%; height: 10px; border-bottom: 1px solid black; text-align: center; margin-bottom:30px; display:none;">
                            <span style="font-size: 18px; background-color: white; font-weight:bold; padding: 0 10px;">
                                or
                            </span>
                        </div>

                        <p style="display:none; margin-bottom:15px;">Create your account</p>

                        <div class="home_apply_left_col_input_container" id="home_form_single_title">
                            <label><span>*</span> Title:</label>
                            <select id="title" name="title" class="dropdown"
                                onchange="javascript:personal_title_check();" tabindex="1">
                                <option value="" selected>Please select </option>
                                <option value="Mr">Mr</option>
                                <option value="Miss">Miss</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Ms">Ms</option>
                            </select>
                        </div>
                        <div class="home_apply_left_col_input_container" id="home_form_single_fname">
                            <label><span>*</span> First Name:</label>
                            <input type="text" id="first_name" name="first_name" onblur="check_fname_input();"
                                tabindex="2" value="" />
                        </div>
                        <div class="home_apply_left_col_input_container" id="home_form_single_surname">
                            <label><span>*</span> Surname:</label>
                            <input type="text" id="surname" name="surname" onblur="check_sname_input();" tabindex="3"
                                value="" />
                        </div>
                        <div class="clear"></div>
                        <div class="home_apply_left_col_input_container" id="home_form_single_dob" style="width:49%;">
                            <label><span>*</span> Date of Birth:</label>
                            <select id="d_o_b_d1" name="d_o_b_d1" tabIndex="4" class="dropdown dateofbirth_dropdown"
                                onchange="javascript:dob_day_check();" onblur="javascript:dob_day_check();">
                                <option value="" selected>Day </option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            <select id="d_o_b_m1" name="d_o_b_m1" tabIndex="5" class="dropdown dateofbirth_dropdown"
                                onchange="javascript:dob_month_check();" onblur="javascript:dob_month_check();">
                                <option value="" selected>Month </option>
                                <option value="01">Jan</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <select id="d_o_b_y1" name="d_o_b_y1" tabIndex="6" class="dropdown dateofbirth_dropdown"
                                onchange="javascript:dob_year_check();" onblur="javascript:dob_year_check();">

                                <option value="" selected>Year </option>
                                <option value='2005'>2005</option>
                                <option value='2004'>2004</option>
                                <option value='2003'>2003</option>
                                <option value='2002'>2002</option>
                                <option value='2001'>2001</option>
                                <option value='2000'>2000</option>
                                <option value='1999'>1999</option>
                                <option value='1998'>1998</option>
                                <option value='1997'>1997</option>
                                <option value='1996'>1996</option>
                                <option value='1995'>1995</option>
                                <option value='1994'>1994</option>
                                <option value='1993'>1993</option>
                                <option value='1992'>1992</option>
                                <option value='1991'>1991</option>
                                <option value='1990'>1990</option>
                                <option value='1989'>1989</option>
                                <option value='1988'>1988</option>
                                <option value='1987'>1987</option>
                                <option value='1986'>1986</option>
                                <option value='1985'>1985</option>
                                <option value='1984'>1984</option>
                                <option value='1983'>1983</option>
                                <option value='1982'>1982</option>
                                <option value='1981'>1981</option>
                                <option value='1980'>1980</option>
                                <option value='1979'>1979</option>
                                <option value='1978'>1978</option>
                                <option value='1977'>1977</option>
                                <option value='1976'>1976</option>
                                <option value='1975'>1975</option>
                                <option value='1974'>1974</option>
                                <option value='1973'>1973</option>
                                <option value='1972'>1972</option>
                                <option value='1971'>1971</option>
                                <option value='1970'>1970</option>
                                <option value='1969'>1969</option>
                                <option value='1968'>1968</option>
                                <option value='1967'>1967</option>
                                <option value='1966'>1966</option>
                                <option value='1965'>1965</option>
                                <option value='1964'>1964</option>
                                <option value='1963'>1963</option>
                                <option value='1962'>1962</option>
                                <option value='1961'>1961</option>
                                <option value='1960'>1960</option>
                                <option value='1959'>1959</option>
                                <option value='1958'>1958</option>
                                <option value='1957'>1957</option>
                                <option value='1956'>1956</option>
                                <option value='1955'>1955</option>
                                <option value='1954'>1954</option>
                                <option value='1953'>1953</option>
                                <option value='1952'>1952</option>
                                <option value='1951'>1951</option>
                                <option value='1950'>1950</option>
                                <option value='1949'>1949</option>
                                <option value='1948'>1948</option>
                                <option value='1947'>1947</option>
                            </select>
                            <div class="clear"></div>
                        </div>
                        <div class="home_apply_left_col_input_container" id="home_form_single_email" style="width:46%;">
                            <label><span>*</span> Email Address:</label>
                            <input type="text" id="app_email" name="email" onblur="check_email_input();" tabindex="7"
                                value="" />
                        </div>
                        <div class="home_apply_left_col_input_container" id="home_form_single_mobile">
                            <label><span>*</span> Mobile No:</label>
                            <input type="text" id="app_mobile" name="app_mobile" onblur="check_app_mobile();"
                                tabindex="8" value="" />
                        </div>
                        <div class="home_apply_left_col_input_container" id="home_form_single_sec1">
                            <label><span>*</span> Choose a password:</label>
                            <input type="password" id="app_password" name="password" onblur="check_app_password();"
                                tabindex="9" placeholder="Minimum 4 characters" />
                            <span class="invalid-message">Password is too short</span>
                        </div>
                        <div class="clear"></div>

                        <div id="home_optin_container">
                            <div id="home_optin_checkbox_container">
                                <input type="checkbox" id="app_optin_checkbox" name="app_optin_checkbox" value="true"
                                    tabindex="12">
                            </div>
                            <p>I agree to receive occasional emails &amp; SMS messages regarding more fantastic products
                                from Mad For It. </p>
                            <div style="clear:both;"></div>

                            <div id="home_optin_checkbox_container">
                                <input type="checkbox" id="app_gdpr" name="gdpr" tabindex="11" />
                            </div>
                            <p>By checking this box I agree to the Forefront Solutions Limited <a href='privacy.html'
                                    target="_blank">privacy policy</a> and <a href='terms.html'
                                    target="_blank">terms</a>.</p>
                            <p id="app-error-message" style="color:red; font-size:12px;" class="hidden">Please check the
                                boxes highlighted in red, and check the box above</p>
                            <p id="check_text" style="display: none; margin-left: 0px; color: red;">Please check our
                                Terms and Conditions</p>
                            <div style="clear:both;"></div>
                        </div>

                        <img class="home_form_visa_img" src="assets/images/creditcardIcons.webp"
                            alt="Chollo">
                        <div id='create_account' style='text-align: center;'>
                            <div id='please_wait_image' style='display:none'>
                                <image src='assets/images/chollo-phone.webp' width='200px;'
                                    style=' position:relative; margin-left: auto; margin-right: auto; '>
                            </div>
                            <div id='create_account_button'>
                                <button id="application_process_app_btn" type="submit" class="application_send_app_btn"
                                    style="clear:both;">Create My Account <i class="fas fa-arrow-right"
                                        style="color:#fff; position:relative; font-size:20px; margin-left:10px;"></i></button>
                            </div>
                        </div>

                        <div class="clear"></div>
                        <p class="apply-form-disclaimer">Forefront Solutions Limited offers unregulated credit
                            agreements. Borrowing more than you can afford or paying late may negatively impact your
                            credit score and ability to shop with us again. Please note: This is a 12 month unregulated
                            credit agreement. This is not running account credit.</p>
                        <input type="hidden" name="csrf-token"
                            value="0fdc1021f7eeefc32bc6f5bde2ebbb87e5c6880d8871ae4e430f42c072b46265" />
                    </form>

                    <!-- <div class="block_dowload_app">
                        <div class="qr_code">
                            <img src="assets/images/qr-app.webp" alt="QR - Chollo" width="350" height="357"
                                srcset="assets/images/qr-app.webp 175w, assets/images/qr-app.webp 350w, assets/images/qr-app.webp 525w, assets/images/qr-app.webp 700w, assets/images/qr-app.webp 875w, assets/images/qr-app.webp 1050w"
                                sizes="(max-width: 350px) 100vw, 350px">

                            <small> Escanea para descargar la app.</small>
                        </div>

                        <div class="button_store">
                           
                            <a href="./apk/chollo-app.apk" class="btn app_play_store" target="_blank"
                                title="Play_store"> <img
                                    src="https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=187&amp;height=55&amp;name=play-store.png"
                                    alt="play_store_ADDI" loading="lazy" width="187" height="55"
                                    srcset="https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=94&amp;height=28&amp;name=play-store.png 94w, https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=187&amp;height=55&amp;name=play-store.png 187w, https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=281&amp;height=83&amp;name=play-store.png 281w, https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=374&amp;height=110&amp;name=play-store.png 374w, https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=468&amp;height=138&amp;name=play-store.png 468w, https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=561&amp;height=165&amp;name=play-store.png 561w"
                                    sizes="(max-width: 187px) 100vw, 187px"></a>
                        </div>
                    </div> -->
                </div>
                <div class="clear"></div>
            </div>

            <div class="clear"></div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div id="footer_container" class="site_content_header_remove">
            <div class="footer_social_li">
                <a href="https://www.facebook.com/profile.php?id=61556991779659">
                    <img src="assets/images/icons/facebook.png" alt="Facebook">
                </a>
            </div>
            <div class="footer_social_li">
                <a href="https://www.instagram.com/cholloapp">
                    <img src="assets/images/icons/instagram.png" alt="Instagram">
                </a>
            </div>
            <div class="footer_social_li">
                <a href="https://www.youtube.com/@cholloapp">
                    <img src="assets/images/icons/youtube.png" alt="YouTube">
                </a>
            </div>
        </div>
        <div id="footer_sub_container">
            <p>Copyright © 2024 — GRUPO CHOLLO VE, C.A. J-504776521-1.</p>
        </div>
        <div class="disclaimer_container">
            <p>Todos los derechos reservados. <a href="privacy-policy">Políticas de Privacidad</a> y <a
                    href="terms-conditions">Términos y Condiciones</a></p>
        </div>
    </footer>

    <div id="mobile_nav_overlay_wrapper">
    </div>
    <section class="mobile-nav-wrapper">
        <div class="mobile-nav-container">
            <div class="mobile-nav-container-header">
                <img src="assets/images/icon_logo.webp" alt="Chollo App">
                <button class="landing-mobile-nav-close">Cerrar</button>
            </div>
            <div class="mobile-nav-container-body">
                <ul>
                    <li>
                        <a href="index.html">Donde Comprar <i class="fas fa-arrow-right"
                                style="margin-left:10px;"></i></a>
                    </li>
                    <li>
                        <a href="apply.html">Crear una Cuenta <i class="fas fa-arrow-right"
                                style="margin-left:10px;"></i></a>
                    </li>
                    <li>
                        <a id="login_mobile_btn">Portal de Tiendas <i class="fas fa-arrow-right"
                                style="margin-left:10px;"></i></a>
                    </li>
                    <li>
                        <a href="howwework.html">Como Funciona<i class="fas fa-arrow-right"
                                style="margin-left:10px;"></i></a>
                    </li>
                    <li>
                        <a href="contact.html">Ayuda <i class="fas fa-arrow-right" style="margin-left:10px;"></i></a>
                    </li>
                    <li>
                        <a href="contact.html">Soporte <i class="fas fa-arrow-right" style="margin-left:10px;"></i></a>
                    </li>
                    <li>
                        <a href="terms.html">Terminos y Condiciones<i class="fas fa-arrow-right"
                                style="margin-left:10px;"></i></a>
                    </li>
                    <li>
                        <a href="sitemap.html">Mapa del Sitio <i class="fas fa-arrow-right"
                                style="margin-left:10px;"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <div class="lds-roller">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div class="loading-spinner-bg"></div>

    <div id="homepage_overlay_wrapper">
    </div>

    <!-- Vendor JS -->
    <script
        type="text/javascript">!function (o, c) { var n = c.documentElement, t = " w-mod-"; n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch") }(window, document);</script>
    <script src="assets/js/vendor/jquery.min.js"></script>
    <script src="assets/js/vendor/jquery-ui.js"></script>
    <link rel="stylesheet" href="assets/js/vendor/themes/base/jquery-ui.css">
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>