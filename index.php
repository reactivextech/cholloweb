<?php

		$curl = curl_init('https://admin.chollo.app/api/customer/login');

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, true );

        curl_setopt($curl, CURLOPT_POST, true);/** Autorizamos enviar datos*/

        $email = 'webmaster.jg.51@hotmail.com';

        $pass = 'xyz709095';

        $my_user = array(

          "email"=> $email,

          "password"=> $pass

          );

          $payload = json_encode($my_user);/** convertimos los datos en el formato solicitado normalmente json*/

          curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);

          curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

          $result = curl_exec($curl);/** Ejecutamos petición*/

          curl_close($curl);

 

		  $mJSON=json_decode($result);

        // var_dump($mJSON);
        // echo($mJSON->data->session_token);
        
		$p_o_sesion = $mJSON->data->session_token;

		// $token = $mJSON->token;

		// $p_cod_prod = 99527;

		// $p_fec_desde = "2019-01-01";

		// $p_fec_hasta = "2023-01-31";


 

 		//  $listarproductos = array(

        //   "p_o_sesion"=> $p_o_sesion,

        //   "p_cod_prod"=> $p_cod_prod,

		//   "p_fec_desde"=> $p_fec_desde,

		//   "p_fec_hasta"=> $p_fec_hasta

        //  );

        //   $payload = json_encode($listarproductos);

 

		$curl = curl_init('https://admin.chollo.app/api/product/findByFeatured/1');/** Ingresamos la url de la api o servicio a consumir */

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, true );

        curl_setopt($curl, CURLOPT_POST, false);/** Autorizamos enviar datos*/

        // curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);

        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$p_o_sesion]); 

          $result = curl_exec($curl);/** Ejecutamos petición*/

          curl_close($curl);

 

 

		//  var_dump($result);

        // foreach ($result as $value) {
            
        //     echo $value['id'];
        // }

        // foreach ($result as $key => $value) {
        //     echo "$key => $value", PHP_EOL;
        // }

        // foreach ($result as $item) {
        //     echo $item->id;
        // }
        $pJSON=json_decode($result);    
        // var_dump($pJSON);
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
    <title>Chollo — Compralo ahora, pagalo después</title>
    <link rel="canonical" href="https://www.chollo.app">
    <meta name="title" content="Chollo — Compralo ahora, pagalo después">
    <meta name="author" content="Chollo">
    <meta name="description" content="Compra lo que más te gusta y pagalo en cuotas con total facilidad.">
    <meta name="keywords" content="credit, phone, cuotas, credito, celular, telefono, marca, compra, financiamiento, después, pagalo, paga, tablet, ahora">
    <meta name="theme-color" content="#0012c6">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Chollo — Compralo ahora, pagalo después">
    <meta property="og:url" content="https://www.chollo.app">
    <meta property="og:title" content="Chollo — Compralo ahora, pagalo después">
    <meta property="og:description" content="Compra lo que más te gusta y pagalo en cuotas con total facilidad.">
    <meta property="og:image" content="https://www.chollo.app/assets/images/meta/meta-f.webp">
    <meta property="og:image:width" content="640">
    <meta property="og:image:height" content="640">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://chollo.app">
    <meta property="twitter:domain" content="www.chollo.app">
    <meta property="twitter:title" content="Chollo — Compralo ahora, pagalo después">
    <meta property="twitter:description" content="Compra lo que más te gusta y pagalo en cuotas con total facilidad.">
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
                <!-- <a href="faq.html" class="header_bottom_link_item">FAQ's</a> -->
                <!-- <a href="contact.html" class="header_bottom_link_item">Ayuda</a>
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
                    <a>Pagar cuota
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
    <section id="home_slideshow_wrapper">
        <!-- <div id="home_slideshow_left_arrow">
		</div>
		<div id="home_slideshow_right_arrow">
		</div> -->
        <div class="accepted_slideshow_banner slideshow_home_playstation home_slideshow_single homepage_active"
            data-slideno="1" data-homeslideactive="1" style="display: block;">
            <!--<img src="assets/images/catalogue-img-trans.png" class="home_slideshow_4_img animated slideInUp" alt="Chollo" style="max-width: 695px;"> -->
            <!-- <img src="assets/images/cover/chollo-bn-1.webp" class="home_slideshow_4_img animated slideInUp"
                alt="Bienvenido - Chollo" style="max-width: 350px;"> -->

                

            <div class="accepted_slideshow_banner_inside">
                <div class="home_slideshow_4_txt_container animated slideInLeft" style="top: 130px;">
                    <p class="home_slideshow_subheadline">¡La libertad a tus compras llegó!</p>
                    <h1>Compralo ahora,<br /><span> pagalo después</span></h1>
                    <p class="home_slideshow_4_para">Compra lo que más te gusta y pagalo en cuotas con total facilidad.</p>

                    <a class="scroll_bottom_btn home_slider_3_btn">Descarga la App
                        <div class="header_bottom_right_arrow_cont">
                            <!-- Generator: Adobe Illustrator 24.2.1, SVG Export Plug-In  -->
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7.98px"
                                height="9.21px" viewBox="0 0 7.98 9.21"
                                style="overflow:visible;enable-background:new 0 0 7.98 9.21;" xml:space="preserve">
                                <defs>
                                </defs>
                                <polygon class="st0_arrow" style="fill: #060818;"
                                    points="7.98,4.61 3.99,6.91 0,9.21 0,4.61 0,0 3.99,2.3 " />
                            </svg>
                        </div>

                    </a>
                </div>
            </div>

            <img src="assets/images/cover/chollo-banner8-1080.png" class="home_slideshow_4_img animated slideInUp"
                alt="Bienvenido - Chollo" style="max-width: 350px;">

            <div class="home-slider-drop-shadow"></div>

            <div class="area">
                <ul class="circles">
                    <li><img src="assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- <section id="home_customer_service_number_wrapper">
        <div id="home_customer_service_number_container">
            <div class="clear"></div>
            <p class="">¿Prefieres hablar con nosotros? Llame hoy a uno de nuestro amable equipo de atención al cliente 
                de Chollo al <a href="tel:+584142465562">0414 2465562</a> 
                
            </p>
        </div>
        <p class="home_customer_service_number_text"><span style="font-weight:bold;">Prefer to talk to us?</span> Call one of our friendly UK customer service team today on <a href="tel:03700340110">0370 0340110</a></p>
        </div>
    </section> -->

    <section class="article_wrapper">
		<div class="article_container">
			<h2 class="article_page_title">Chollo es la forma de pagar poco a poco tus compras más importantes. </h2>
			<!-- <p class="article_page_sub_title">Simply contact our friendly complaints team today on 01909 499164 regarding any unregulated complaints or queries you may have.</p>
		 -->

		</div>
	</section>

    <section class="features_wrapper">
        <div class="features_container">

            

            <div class="features_single_container">
                <img src="assets/images/item-inmediata.png" alt="Inmediata - Chollo">
                

                <!-- <h3>Transparente</h3> -->
                <p>Con solo tu rostro y tu cedula tu chollo es aprobado en minutos.</p>
            </div>
            <div class="features_single_container">
                <img src="assets/images/item-flexible.png" alt="Flexible - Chollo">
                <!-- <h3>Flexible</h3> -->
                <p>Puedes elegir entre 3 a 7 cuotas a pagar.</p>

            </div>
            <div class="features_single_container">
                <img src="assets/images/item-clara.png" alt="Clara - Chollo">
                <!-- <h3>Sin tarjeta de credito</h3> -->
                <p>La letra pequeña en grande, para que sepas siempre cuánto pagas.</p>
            </div>
            <div class="features_single_container">
                <img src="assets/images/item-facil.png" alt="Fácil - Chollo">
                <!-- <h3>Sin intereses</h3> -->
                <p>Comprar es muy fácil con nuestra App. Y atención exclusiva en nuestras tiendas aliadas.</p>
            </div>
            <div class="clear"></div>
        </div>
    </section>

    <!-- <section class="hp_disclaimer_intro_wrapper">
        <div class="hp_disclaimer_intro_container">
            <p>Forefront Solutions Limited offers unregulated credit agreements. Borrowing more than you can afford or
                paying late may negatively impact your credit score and your ability to shop with us again. 18+, UK
                residents only. Subject to status. T&amp;Cs apply.</p>
        </div>
    </section> -->

    <section class="home_highlight_wrapper">
        <div class="home_highlight_container">
            <div class="home_highlight_left">
                <img src="assets/images/chollo-phone.png" alt="App - Chollo">
            </div>
            <div class="home_highlight_right">
                <!--
                <div class="home_highlight_tp">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        width="244.49px" height="26.1px" viewBox="0 0 244.49 26.1" style="overflow:visible;enable-background:new 0 0 244.49 26.1;"
                        xml:space="preserve">
                    <style type="text/css">
                        .st0_tp{fill:#00B47A;}
                        .st1_tp{fill:#FFFFFF;}
                        .st2_tp{fill:#121212;}
                        .st3_tp{fill:#005129;}
                    </style>
                    <defs>
                    </defs>
                    <g>
                        <g id="Trustpilot_ratings_5star-RGB_2_">
                            <g>
                                <rect id="Rectangle-path_10_" y="4" class="st0_tp" width="22.05" height="22.05"/>
                                <rect id="Rectangle-path_9_" x="23.89" y="4" class="st0_tp" width="22.05" height="22.05"/>
                                <rect id="Rectangle-path_8_" x="47.78" y="4" class="st0_tp" width="22.05" height="22.05"/>
                                <rect id="Rectangle-path_7_" x="71.67" y="4" class="st0_tp" width="22.05" height="22.05"/>
                                <rect id="Rectangle-path_6_" x="95.56" y="4" class="st0_tp" width="22.05" height="22.05"/>
                                <path id="Shape_10_" class="st1_tp" d="M11.03,18.86l3.35-0.85l1.4,4.32L11.03,18.86z M18.74,13.28h-5.9l-1.81-5.56l-1.81,5.56h-5.9
                                    l4.78,3.45l-1.81,5.56l4.78-3.45l2.94-2.11L18.74,13.28L18.74,13.28L18.74,13.28L18.74,13.28z"/>
                                <path id="Shape_9_" class="st1_tp" d="M34.92,18.86l3.35-0.85l1.4,4.32L34.92,18.86z M42.63,13.28h-5.9l-1.81-5.56l-1.81,5.56h-5.9
                                    l4.78,3.45l-1.81,5.56l4.78-3.45l2.94-2.11L42.63,13.28L42.63,13.28L42.63,13.28L42.63,13.28z"/>
                                <path id="Shape_8_" class="st1_tp" d="M58.81,18.86l3.35-0.85l1.4,4.32L58.81,18.86z M66.52,13.28h-5.9l-1.81-5.56l-1.81,5.56h-5.9
                                    l4.78,3.45l-1.81,5.56l4.78-3.45l2.94-2.11L66.52,13.28L66.52,13.28L66.52,13.28L66.52,13.28z"/>
                                <path id="Shape_7_" class="st1_tp" d="M82.7,18.86l3.35-0.85l1.4,4.32L82.7,18.86z M90.41,13.28h-5.9L82.7,7.72l-1.81,5.56h-5.9
                                    l4.78,3.45l-1.81,5.56l4.78-3.45l2.94-2.11L90.41,13.28L90.41,13.28L90.41,13.28L90.41,13.28z"/>
                                <path id="Shape_6_" class="st1_tp" d="M106.58,18.86l3.35-0.85l1.4,4.32L106.58,18.86z M114.3,13.28h-5.9l-1.81-5.56l-1.81,5.56
                                    h-5.9l4.78,3.45l-1.81,5.56l4.78-3.45l2.94-2.11L114.3,13.28L114.3,13.28L114.3,13.28L114.3,13.28z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path class="st2_tp" d="M166.11,9.25h10.76v2.01h-4.23v11.29h-2.33V11.26h-4.21L166.11,9.25L166.11,9.25z M176.41,12.92h1.99v1.86
                                    h0.04c0.07-0.26,0.19-0.52,0.37-0.76c0.18-0.24,0.39-0.48,0.65-0.68c0.25-0.21,0.53-0.37,0.84-0.5c0.31-0.12,0.63-0.19,0.95-0.19
                                    c0.24,0,0.42,0.01,0.52,0.02s0.19,0.03,0.29,0.04v2.05c-0.15-0.03-0.3-0.05-0.46-0.07c-0.16-0.02-0.31-0.03-0.46-0.03
                                    c-0.36,0-0.69,0.08-1.01,0.22s-0.59,0.36-0.83,0.63c-0.23,0.28-0.42,0.62-0.56,1.03s-0.21,0.88-0.21,1.42v4.58h-2.12
                                    L176.41,12.92L176.41,12.92z M191.8,22.55h-2.08v-1.34h-0.04c-0.26,0.49-0.65,0.87-1.16,1.16c-0.52,0.29-1.04,0.44-1.58,0.44
                                    c-1.27,0-2.19-0.31-2.75-0.94c-0.56-0.63-0.84-1.58-0.84-2.84v-6.11h2.12v5.9c0,0.84,0.16,1.45,0.49,1.79
                                    c0.32,0.35,0.78,0.53,1.36,0.53c0.45,0,0.82-0.07,1.12-0.21c0.3-0.14,0.54-0.32,0.72-0.55c0.19-0.23,0.32-0.51,0.4-0.83
                                    c0.08-0.32,0.12-0.67,0.12-1.04v-5.58h2.12V22.55z M195.42,19.46c0.07,0.62,0.3,1.05,0.7,1.3c0.41,0.24,0.9,0.38,1.47,0.38
                                    c0.2,0,0.42-0.02,0.68-0.05c0.25-0.03,0.5-0.09,0.71-0.18c0.23-0.08,0.4-0.22,0.55-0.38c0.14-0.17,0.21-0.38,0.2-0.66
                                    c-0.01-0.27-0.11-0.5-0.3-0.67c-0.19-0.18-0.42-0.31-0.71-0.42c-0.29-0.1-0.62-0.2-0.99-0.27c-0.38-0.08-0.75-0.16-1.14-0.24
                                    c-0.39-0.08-0.78-0.2-1.14-0.32c-0.37-0.12-0.69-0.29-0.99-0.51c-0.29-0.21-0.53-0.48-0.69-0.81c-0.18-0.33-0.26-0.73-0.26-1.22
                                    c0-0.53,0.13-0.96,0.38-1.31c0.25-0.36,0.58-0.64,0.97-0.85c0.39-0.22,0.83-0.37,1.3-0.46c0.48-0.08,0.94-0.13,1.37-0.13
                                    c0.5,0,0.98,0.06,1.43,0.16c0.45,0.1,0.86,0.27,1.23,0.52c0.37,0.23,0.67,0.54,0.91,0.92c0.24,0.38,0.39,0.84,0.46,1.37h-2.21
                                    c-0.1-0.51-0.33-0.85-0.69-1.02c-0.37-0.18-0.79-0.26-1.26-0.26c-0.15,0-0.33,0.01-0.53,0.04c-0.21,0.03-0.39,0.08-0.58,0.14
                                    c-0.18,0.07-0.33,0.17-0.46,0.3c-0.12,0.13-0.19,0.3-0.19,0.52c0,0.26,0.09,0.47,0.27,0.63s0.41,0.29,0.7,0.4
                                    c0.29,0.1,0.62,0.2,0.99,0.27c0.38,0.08,0.76,0.16,1.15,0.24c0.38,0.08,0.76,0.2,1.14,0.32c0.38,0.12,0.7,0.29,0.99,0.51
                                    c0.29,0.22,0.53,0.48,0.7,0.8s0.27,0.72,0.27,1.19c0,0.57-0.13,1.05-0.39,1.45c-0.26,0.39-0.6,0.72-1.01,0.97
                                    c-0.41,0.24-0.88,0.43-1.39,0.54c-0.51,0.11-1.01,0.17-1.51,0.17c-0.61,0-1.17-0.07-1.69-0.21c-0.52-0.14-0.97-0.35-1.34-0.62
                                    c-0.38-0.28-0.68-0.63-0.89-1.04c-0.22-0.41-0.33-0.91-0.35-1.48h2.14V19.46z M202.41,12.92h1.6v-2.89h2.12v2.89h1.91v1.59h-1.91
                                    v5.14c0,0.23,0.01,0.41,0.03,0.58c0.02,0.16,0.07,0.3,0.13,0.41c0.07,0.11,0.17,0.2,0.31,0.25s0.32,0.08,0.56,0.08
                                    c0.15,0,0.3,0,0.45-0.01c0.15-0.01,0.3-0.03,0.45-0.07v1.64c-0.23,0.03-0.47,0.05-0.68,0.08c-0.23,0.03-0.45,0.04-0.68,0.04
                                    c-0.56,0-1.01-0.06-1.35-0.16c-0.34-0.1-0.61-0.26-0.8-0.47c-0.2-0.21-0.32-0.46-0.39-0.77c-0.07-0.31-0.11-0.67-0.12-1.06v-5.68
                                    h-1.6v-1.6L202.41,12.92z M209.56,12.92h2.01v1.3h0.04c0.3-0.56,0.71-0.96,1.25-1.2c0.53-0.24,1.11-0.37,1.74-0.37
                                    c0.76,0,1.42,0.13,1.98,0.4c0.56,0.26,1.03,0.63,1.41,1.1c0.38,0.47,0.65,1.01,0.84,1.63c0.19,0.62,0.28,1.29,0.28,1.99
                                    c0,0.65-0.08,1.28-0.25,1.88c-0.17,0.61-0.42,1.14-0.76,1.61c-0.34,0.47-0.77,0.84-1.29,1.12c-0.53,0.28-1.14,0.42-1.85,0.42
                                    c-0.31,0-0.62-0.03-0.93-0.08c-0.31-0.06-0.61-0.15-0.89-0.27c-0.28-0.12-0.55-0.28-0.79-0.48c-0.24-0.2-0.44-0.42-0.61-0.68
                                    h-0.04v4.8h-2.12V12.92z M216.97,17.74c0-0.43-0.06-0.85-0.17-1.27s-0.28-0.77-0.51-1.09c-0.23-0.32-0.51-0.57-0.84-0.76
                                    c-0.34-0.19-0.72-0.29-1.15-0.29c-0.89,0-1.57,0.31-2.02,0.93c-0.45,0.62-0.68,1.45-0.68,2.48c0,0.49,0.06,0.94,0.18,1.35
                                    c0.12,0.41,0.29,0.77,0.53,1.07c0.23,0.3,0.52,0.53,0.84,0.7c0.33,0.18,0.71,0.26,1.14,0.26c0.49,0,0.89-0.1,1.23-0.3
                                    c0.34-0.2,0.61-0.46,0.83-0.77c0.22-0.32,0.38-0.68,0.47-1.08C216.92,18.58,216.97,18.17,216.97,17.74L216.97,17.74z
                                    M220.71,9.25h2.12v2.01h-2.12V9.25z M220.71,12.92h2.12v9.63h-2.12V12.92L220.71,12.92z M224.73,9.25h2.12v13.3h-2.12V9.25
                                    L224.73,9.25z M233.35,22.81c-0.77,0-1.45-0.13-2.05-0.38c-0.6-0.25-1.11-0.61-1.53-1.05c-0.41-0.45-0.73-0.99-0.95-1.6
                                    c-0.22-0.62-0.33-1.3-0.33-2.05c0-0.73,0.11-1.41,0.33-2.03c0.22-0.62,0.53-1.15,0.95-1.6s0.93-0.8,1.53-1.05
                                    s1.29-0.38,2.05-0.38s1.45,0.13,2.05,0.38c0.6,0.25,1.11,0.61,1.53,1.05c0.41,0.45,0.73,0.99,0.95,1.6
                                    c0.22,0.62,0.33,1.29,0.33,2.03c0,0.74-0.11,1.43-0.33,2.05s-0.53,1.15-0.95,1.6c-0.41,0.45-0.93,0.8-1.53,1.05
                                    C234.81,22.68,234.12,22.81,233.35,22.81L233.35,22.81z M233.35,21.13c0.47,0,0.88-0.1,1.23-0.3c0.35-0.2,0.63-0.46,0.85-0.78
                                    c0.23-0.32,0.38-0.68,0.5-1.09c0.1-0.4,0.16-0.82,0.16-1.24c0-0.41-0.06-0.82-0.16-1.23c-0.1-0.41-0.27-0.77-0.5-1.09
                                    c-0.23-0.32-0.51-0.57-0.85-0.77s-0.76-0.3-1.23-0.3c-0.47,0-0.88,0.1-1.23,0.3c-0.35,0.2-0.63,0.46-0.85,0.77
                                    c-0.23,0.32-0.38,0.68-0.5,1.09c-0.1,0.41-0.16,0.82-0.16,1.23c0,0.42,0.06,0.84,0.16,1.24c0.1,0.4,0.27,0.77,0.5,1.09
                                    c0.23,0.32,0.51,0.58,0.85,0.78C232.47,21.04,232.88,21.13,233.35,21.13L233.35,21.13z M238.83,12.92h1.6v-2.89h2.12v2.89h1.91
                                    v1.59h-1.91v5.14c0,0.23,0.01,0.41,0.03,0.58c0.02,0.16,0.07,0.3,0.13,0.41s0.17,0.2,0.31,0.25s0.32,0.08,0.56,0.08
                                    c0.15,0,0.3,0,0.45-0.01s0.3-0.03,0.45-0.07v1.64c-0.23,0.03-0.47,0.05-0.68,0.08c-0.23,0.03-0.45,0.04-0.68,0.04
                                    c-0.56,0-1.01-0.06-1.35-0.16c-0.34-0.1-0.61-0.26-0.8-0.47c-0.2-0.21-0.32-0.46-0.39-0.77c-0.07-0.31-0.11-0.67-0.12-1.06v-5.68
                                    h-1.6v-1.6L238.83,12.92z"/>
                                <path class="st0_tp" d="M163.63,9.25h-9.72l-3-9.25l-3.01,9.25l-9.72-0.01l7.87,5.72l-3.01,9.24l7.87-5.71l7.86,5.71l-3-9.24
                                    L163.63,9.25z"/>
                            </g>
                            <path class="st3_tp" d="M157.1,17.67l-0.78-2.41l-5.61,4.07L157.1,17.67z"/>
                        </g>
                    </g>
                    </svg>
                </div>-->

                <h2>Compra, ahorra y obtén más <span>Tiempo</span> para pagar</h2>
                <p>Descarga nuestra aplicación en tu teléfono y descubre los beneficios que Chollo tiene para ti.

                    La app de Chollo es simple y es muy fácil ajustar y mantener el control de tu presupuesto.</p>
                <a class="scroll_bottom_btn">Descarga la App
                    <div class="header_bottom_right_arrow_cont">
                        <!-- Generator: Adobe Illustrator 24.2.1, SVG Export Plug-In  -->
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" width="7.98px" height="9.21px" viewBox="0 0 7.98 9.21"
                            style="overflow:visible;enable-background:new 0 0 7.98 9.21;" xml:space="preserve">
                            <defs>
                            </defs>
                            <polygon class="st0_arrow" style="fill: #FFFFFF;"
                                points="7.98,4.61 3.99,6.91 0,9.21 0,4.61 0,0 3.99,2.3 " />
                        </svg>
                    </div>

                </a>

            </div>
            <div class="clear"></div>
        </div>
    </section>

    <!-- PRODUCTOS -->
    <!-- <section class="hp_discover_wrapper">
        <div class="hp_discover_container">
            <p class="home_heatures_header">
                ¡Los mejores <span>Productos</span> para ti!
            </p>
            <p class="home_heatures_post_header">Te ofrecemos los mejores telefonos del mercado.</p>

            <?php 
                // if (is_array($pJSON) || is_object($pJSON))
                // {
                //     foreach ($pJSON as $value)
                //     {
                //         echo '<div class="hp_discover_single">';
                //             echo '<div class="hp_discover_single_left">';
                //                 echo '<img src="https://admin.chollo.app/src/storage/app/public/products/'.$value->image.'">';
                //             echo '</div>';

                //             echo '<div class="hp_discover_single_right">';
                //                 echo '<span>Más vendido</span>';
                //                 echo '<h4>'.$value->name.'</h4>';
                //                 echo '<p>HERTECH</p>';
                //                 echo '<div class="tv-reviews-star-container">';
                //                     echo '<i class="fas fa-star" style="color:#f35716;"></i>';
                //                     echo '<i class="fas fa-star" style="color:#f35716;"></i>';
                //                     echo '<i class="fas fa-star" style="color:#f35716;"></i>';
                //                     echo '<i class="fas fa-star" style="color:#f35716;"></i>';
                //                     echo '<i class="fas fa-star" style="color:#f35716;"></i>';
                //                 echo '</div>';

                //             echo '</div>';

                //             echo '<div class="clear"></div>';
                //             // echo $value->id;
                //             echo '<div class="hp_discover_single_bottom">';
                //             echo '<p><i class="fas fa-check" style="color:#00B47A; margin-right:5px;"></i> 50% Inicial</p>';
                //             echo '<p><i class="fas fa-check" style="color:#00B47A; margin-right:5px;"></i> Pagas entre 3 a 7 Cuotas.
                //             </p>';
                //             echo '</div>';

                //             echo '<div class="hp_discover_single_link">';
                //             echo '<a class="scroll_bottom_btn">Adquirir ya</a>';
                //             echo '</div>';

                //         echo '</div>';
                //     }
                // }
            ?>


            <div class="clear"></div>
        </div>
    </section> -->

    <!-- <section class="hp_next_day_delivery_wrapper">
        <div class="hp_next_day_delivery_container">

        </div>
    </section> -->

    <section class="customer_favourites_wrapper">
	<div class="customer_favourites_container">
    <p class="home_heatures_header">
                ¡Los mejores <span>Productos</span> para ti!
    </p>
    <p class="home_heatures_post_header">Te ofrecemos los mejores telefonos del mercado.</p>

		<!-- <h3 class="hp_title">Los más destacados</h3> -->
		<!-- <div class="customer_favourites_single">
			<span class="top-pick">Más vendido</span>
			<img src="https://madforit.com/images/hp-highlight-img-11.jpg" alt="" title="">
			<p class="customer_favourite_brand">Sony</p>
			<p class="customer_favourite_product">Playstation 5</p>
			<p class="customer_favourite_price">50% de inicial</p>
			<div class="customer_favourite_ndd">
				<label><i class="fa-solid fa-truck-fast" aria-hidden="true"></i> * 3 a 7 cuotas para pagar </label>
			</div>
			<a href="/apply.php" class="customer_favourite_more_btn">Adquierelo ya</a>
		</div> -->

        <?php 
                if (is_array($pJSON) || is_object($pJSON))
                {
                    foreach ($pJSON as $value)
                    {
                        echo '<div class="customer_favourites_single">';
                            echo '<span class="top-pick">Más vendido</span>';
                            echo '<img src="https://admin.chollo.app/src/storage/app/public/products/'.$value->image.'" alt="imagen '.$value->name.'" title="'.$value->name.'">';    
                            echo '<p class="customer_favourite_brand">HERTECH</p>';
                            echo '<p class="customer_favourite_product">'.$value->name.'</p>';
                            echo '<p class="customer_favourite_price">50% de inicial</p>';
                            echo '<div class="customer_favourite_ndd">';
                                echo '<label><i class="fa-solid fa-truck-fast" aria-hidden="true"></i> * 3 a 7 cuotas para pagar </label>';
                            echo '</div>';
                            echo '<a class="customer_favourite_more_btn scroll_bottom_btn">Adquierelo ya</a>';
                        echo '</div>';
                    }
                }
            ?>

		<!-- <div class="customer_favourites_single">
			<span class="top-pick">Top Pick</span>
			<img src="https://madforit.com/images/hp-highlight-img-2.jpg" alt="" title="">
			<p class="customer_favourite_brand">Lenovo</p>
			<p class="customer_favourite_product">Tab P11 64GB</p>
			<p class="customer_favourite_price">£10 off^</p>
			<div class="customer_favourite_ndd">
				<label><i class="fa-solid fa-truck-fast" aria-hidden="true"></i> Next day dispatch*</label>
			</div>
			<a href="/apply.php" class="customer_favourite_more_btn">View more</a>			
		</div>

		<div class="customer_favourites_single">	
			<span class="top-pick">Top Pick</span>
			<img src="https://madforit.com/images/hp-highlight-img-3.jpg" alt="" title="">
			<p class="customer_favourite_brand">LG</p>
			<p class="customer_favourite_product">43" Smart TV</p>
			<p class="customer_favourite_price">£10 off^</p>
			<div class="customer_favourite_ndd">
				<label><i class="fa-solid fa-truck-fast" aria-hidden="true"></i> Next day dispatch*</label>
			</div>
			<a href="/apply.php" class="customer_favourite_more_btn">View more</a>			
		</div>

		<div class="customer_favourites_single">
			<span class="top-pick">Top Pick</span>
			<img src="https://madforit.com/images/hp-highlight-img-4.jpg" alt="" title="">
			<p class="customer_favourite_brand">Monzana</p>
			<p class="customer_favourite_product">Hot Air Deep Fryer</p>
			<p class="customer_favourite_price">£10 off^</p>
			<div class="customer_favourite_ndd">
				<label><i class="fa-solid fa-truck-fast" aria-hidden="true"></i> Next day dispatch*</label>
			</div>
			<a href="/apply.php" class="customer_favourite_more_btn">View more</a>			
		</div>

		<div class="customer_favourites_single">
			<span class="top-pick">Top Pick</span>
			<img src="https://madforit.com/images/hp-highlight-img-5.jpg" alt="" title="">
			<p class="customer_favourite_brand">DeWalt</p>
			<p class="customer_favourite_product">18V XR Brushless Toolkit</p>
			<p class="customer_favourite_price">£10 off^</p>
			<div class="customer_favourite_ndd">
				<label><i class="fa-solid fa-truck-fast" aria-hidden="true"></i> Next day dispatch*</label>
			</div>
			<a href="/apply.php" class="customer_favourite_more_btn">View more</a>			
		</div> -->
		<div class="clear"></div>
	</div>
</section>

    <!-- BANNER -->
    <section id="no_credit_checks_wrapper">
        <div id="no_credit_checks_left_col">
            <div id="no_credit_checks_left_col_container">
                <h3 class="home_h3_title_light">Cuotas que se <span>adaptan a ti.</span></h3>
                <p class="home_sub_title_credit_check">Compra el teléfono que deseas y paga hasta en 7 cuotas.</p>
                <p class="home_para_dark" id="no_credit_checks_">Debes primero verificarte en la App para que veas el
                    monto aprobado.</p>
                <a id="home_find_out_how_we_work_btn" class="scroll_bottom_btn find_out_how_you_work_btn">Crear Cuenta
                    Ahora</a>
            </div>
            <div class="clear"></div>
        </div>
        <div id="no_credit_checks_right_col">

        </div>
        <div class="clear"></div>
    </section>

    <!-- TIENDAS -->
    <section id="you_decide_to_pay_wrapper">
        <div id="you_decide_to_pay_container">
            <h3 class="home_h3_title text_center">Explora dónde <span>comprar</span></h3>
            <p class="home_sub_title text_center">Visita nuestras tiendas autorizadas y descubre una experiencia de compra única. Encuentra la
                tienda más cercana a ti y comienza tu experiencia de compra hoy mismo.</p>
            <!-- <div id="you_decide_to_pay_left_col">
                <h3 class="home_h3_title">Nuestras <span>Tiendas</span></h3>
                <p class="home_sub_title">That's Right, we put you in control of your payment dates.</p>
                <p class="home_sub_title">Visita nuestras tiendas físicas y descubre una experiencia de compra única.
                    Con ubicaciones convenientes y un ambiente
                    acogedor, nuestras tiendas ofrecen una amplia selección de productos para satisfacer todas tus
                    necesidades. Encuentra la
                    tienda más cercana a ti y comienza tu experiencia de compra hoy mismo.</p>
                    <p class="home_para"><a href="flexiblepayments.html" target="_blank">Click here to find out more about 
                        flexible payments</a>!</p> 
                    <a id="home_when_to_pay_btn" class="browse_phones_btn" onclick="">Ver Tiendas</a>
            </div> -->
            <!-- <div id="you_decide_to_pay_right_col">
                <div id="you_decide_to_pay_video_container">
                    <img id="home_you_decide_video_placeholder" src="assets/images/bg-web-chollo-2.webp" onclick=""
                        alt="Banner Web - Chollo">
                </div>
            </div> -->


            
            
            
        </div>

        <div class="slider">
            <div class="slide-track">
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="assets/images/logo-hertech.png" height="100" width="250" alt="" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="assets/images/logo-hertech.png" height="100" width="250" alt="" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="assets/images/logo-hertech.png" height="100" width="250" alt="" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="assets/images/logo-hertech.png" height="100" width="250" alt="" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="assets/images/logo-hertech.png" height="100" width="250" alt="" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="assets/images/logo-hertech.png" height="100" width="250" alt="" />
                    </a>
                </div>
                <!-- <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/4.png" height="100" width="250" alt="" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/6.png" height="100" width="250" alt="" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/7.png" height="100" width="250" alt="" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/1.png" height="100" width="100" alt="" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/2.png" height="100" width="150" alt="" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/3.png" height="100" width="350" alt="" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/4.png" height="100" width="250" alt="" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/6.png" height="100" width="250" alt="" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/7.png" height="100" width="250" alt="" />
                    </a>
                </div> -->
            </div>
            <div class="clear"></div>
        </div>



    </section>

    <!-- QR APP -->
    <section id="home_application_wrapper">
        <div id="home_application_container">

            <div id="home_application_left_col">
                <h3 class="home_h3_title" id="home_apply_now_title">
                    ¡Todo es más fácil en <span>nuestra app!</span>
                </h3>
                <p class="home_app_sub_headline">Crea tu cuenta ahora y comienza a comprar hoy.</p>
            </div>

            <div id="home_application_right_col">
                <div id="home-account-type-wrapper-stage0">
                    <!-- <p class="home_application_create_title">Create your account &amp; start shopping today</p>
                    <p class="home_application_create_sub_title">Registering an account won't affect your credit rating,
                        we only perform a soft search to check your eligability. If approved for your order, then a hard
                        search will be performed.</p> -->
                    <!-- <form id="form-stage1" name="form-stage1"
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
                    </form> -->

                    <div class="block_dowload_app">
                        <div class="qr_code">
                            <img src="assets/images/qr-app.webp" alt="QR - Chollo" width="350" height="357"
                                srcset="assets/images/qr-app.webp 175w, assets/images/qr-app.webp 350w, assets/images/qr-app.webp 525w, assets/images/qr-app.webp 700w, assets/images/qr-app.webp 875w, assets/images/qr-app.webp 1050w"
                                sizes="(max-width: 350px) 100vw, 350px">

                            <small> Escanea para descargar la app.</small>
                        </div>

                        <div class="button_store">
                            <!-- <a class="btn app_play_store" href="https://play.google.com/store/apps/details?id=com.addimobile" target="_blank" title="Play_store"> <img src="https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=187&amp;height=55&amp;name=play-store.png" alt="play_store_ADDI" loading="lazy" width="187" height="55" srcset="https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=94&amp;height=28&amp;name=play-store.png 94w, https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=187&amp;height=55&amp;name=play-store.png 187w, https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=281&amp;height=83&amp;name=play-store.png 281w, https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=374&amp;height=110&amp;name=play-store.png 374w, https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=468&amp;height=138&amp;name=play-store.png 468w, https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=561&amp;height=165&amp;name=play-store.png 561w" sizes="(max-width: 187px) 100vw, 187px"></a> -->

                            <a href="https://play.google.com/store/apps/details?id=com.grupochollo.cholloapp" class="btn app_play_store" target="_blank"
                                title="Play_store"> <img
                                    src="https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=187&amp;height=55&amp;name=play-store.png"
                                    alt="play_store_ADDI" loading="lazy" width="187" height="55"
                                    srcset="https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=94&amp;height=28&amp;name=play-store.png 94w, https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=187&amp;height=55&amp;name=play-store.png 187w, https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=281&amp;height=83&amp;name=play-store.png 281w, https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=374&amp;height=110&amp;name=play-store.png 374w, https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=468&amp;height=138&amp;name=play-store.png 468w, https://5471282.fs1.hubspotusercontent-na1.net/hub/5471282/hubfs/play-store.png?width=561&amp;height=165&amp;name=play-store.png 561w"
                                    sizes="(max-width: 187px) 100vw, 187px"></a>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="clear"></div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <!-- <div id="footer_container" class="site_content_header_remove">
            <div class="footer_single_col" id="footer_mobile_item_one">
                <p class="footer_headling">Popular</p>
                <ul>
                    <li>
                        <a href="index.html">- Home</a>
                    </li>
                    <li>
                        <a href="sitemap.html">- Site Map</a>
                    </li>
                    <li>
                        <a href="flexiblepayments.html">- Flexible Payments</a>
                    </li>
                    <li>
                        <a href="howwework.html">- How We Work</a>
                    </li>
                </ul>
            </div>
            <div class="footer_single_col" id="footer_mobile_item_two">
                <p class="footer_headling">Quick Links</p>
                <ul>
                    <li>
                        <a href="contact.html">- Contact</a>
                    </li>
                    <li>
                        <a href="faq.html">- FAQ</a>
                    </li>
                </ul>
            </div>
            <div class="footer_single_col" id="footer_mobile_item_three">
                <p class="footer_headling">Ayuda</p>
                <ul>
                    <li>
                        <a href="contact.html">- Ayuda</a>
                    </li>
                    <li>
                        <a href="complaints.html">- Reclamos</a>
                    </li>
                    <li>
                        <a href="terms.html">- Terminos y Condiciones</a>
                    </li>
                    <li>
                        <a href="privacy.html">- Politicas de Privacidad</a>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div> -->
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
                        <a href="#">Donde Comprar <i class="fas fa-arrow-right"
                                style="margin-left:10px;"></i></a>
                    </li>
                    <li>
                        <a href="#">Pagar Cuota <i class="fas fa-arrow-right"
                                style="margin-left:10px;"></i></a>
                    </li>
                    <!-- <li>
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
                    </li> -->
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
