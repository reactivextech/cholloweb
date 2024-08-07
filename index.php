<?php

// CONFIG REQUIRE
require_once 'includes/config.php';
require_once 'includes/function.php';

$curl = curl_init('https://admin.chollo.app/api/customer/login');

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($curl, CURLOPT_POST, true);
/** Autorizamos enviar datos*/

$email = 'webmaster.jg.51@hotmail.com';

$pass = 'xyz709095';

$my_user = array(

    "email" => $email,

    "password" => $pass

);

$payload = json_encode($my_user);
/** convertimos los datos en el formato solicitado normalmente json*/

curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);

curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

$result = curl_exec($curl);
/** Ejecutamos petición*/

curl_close($curl);



$mJSON = json_decode($result);

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



$curl = curl_init('https://admin.chollo.app/api/product/findByFeatured/1');
/** Ingresamos la url de la api o servicio a consumir */

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($curl, CURLOPT_POST, false);
/** Autorizamos enviar datos*/

// curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);

curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $p_o_sesion]);

$result = curl_exec($curl);
/** Ejecutamos petición*/

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
$pJSON = json_decode($result);
// var_dump($pJSON);

?>

<!-- HEAD:BEGIN -->
<?php

$section = 'index';
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

    <!-- COVER:BEGIN -->
    <section id="home_slideshow_wrapper">
        <div class="accepted_slideshow_banner slideshow_home_playstation home_slideshow_single homepage_active" data-slideno="1" data-homeslideactive="1" style="display: block;">
            <div class="accepted_slideshow_banner_inside">
                <div class="home_slideshow_4_txt_container animated slideInLeft" style="top: 130px;">
                    <p class="home_slideshow_subheadline">¡La libertad a tus compras llegó!</p>
                    <h1>Compralo ahora,<br /><span> pagalo después</span></h1>
                    <p class="home_slideshow_4_para">Compra lo que más te gusta y pagalo en cuotas con total facilidad.</p>
                    <a class="scroll_bottom_btn home_slider_3_btn">Descarga la App
                        <div class="header_bottom_right_arrow_cont">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7.98px" height="9.21px" viewBox="0 0 7.98 9.21" style="overflow:visible;enable-background:new 0 0 7.98 9.21;" xml:space="preserve">
                                <defs></defs>
                                <polygon class="st0_arrow" style="fill: #060818;" points="7.98,4.61 3.99,6.91 0,9.21 0,4.61 0,0 3.99,2.3 " />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>

            <img src="<?php echo SITE_URL; ?>assets/images/cover/chollo-banner8-1080.png" class="home_slideshow_4_img animated slideInUp" alt="Bienvenido - Chollo" style="max-width: 350px;">

            <div class="home-slider-drop-shadow"></div>

            <div class="area">
                <ul class="circles">
                    <li><img src="<?php echo SITE_URL; ?>assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="<?php echo SITE_URL; ?>assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="<?php echo SITE_URL; ?>assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="<?php echo SITE_URL; ?>assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="<?php echo SITE_URL; ?>assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="<?php echo SITE_URL; ?>assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="<?php echo SITE_URL; ?>assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="<?php echo SITE_URL; ?>assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="<?php echo SITE_URL; ?>assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                    <li><img src="<?php echo SITE_URL; ?>assets/images/icon_x.webp" alt="Logo - Chollo"></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- COVER:END -->

    <!-- HEADBAND:BEGIN -->
    <section id="home_customer_service_number_wrapper">
        <div id="home_customer_service_number_container">
            <p class="home_customer_service_number_text">
                <span>¿Prefieres hablar con nosotros?</span>
                Contacte a nuestro amable equipo de atención al cliente:
                <a href="tel:+584142465562">0414 CHOLLO2</a>
            </p>
            <div class="clear"></div>
        </div>
    </section>
    <!-- HEADBAND:END -->

    <!-- FEATURES:BEGIN -->
    <section class="features_wrapper">
        <div class="article_container">
            <h2 class="article_page_title">Chollo es la forma de pagar poco a poco tus compras más importantes.</h2>
            <!-- <p class="article_page_sub_title">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium quibusdam modi sed nam ipsum deleniti.</p> -->
        </div>
        <div class="features_container">
            <div class="features_single_container">
                <img src="<?php echo SITE_URL; ?>assets/images/item-inmediata.png" alt="Inmediata - Chollo">
                <!-- <h3>Transparente</h3> -->
                <p>Con solo tu rostro y tu cedula tu chollo es aprobado en minutos.</p>
            </div>
            <div class="features_single_container">
                <img src="<?php echo SITE_URL; ?>assets/images/item-flexible.png" alt="Flexible - Chollo">
                <!-- <h3>Flexible</h3> -->
                <p>Puedes elegir entre 3 a 7 cuotas a pagar.</p>
            </div>
            <div class="features_single_container">
                <img src="<?php echo SITE_URL; ?>assets/images/item-clara.png" alt="Clara - Chollo">
                <!-- <h3>Sin tarjeta de credito</h3> -->
                <p>La letra pequeña en grande, para que sepas siempre cuánto pagas.</p>
            </div>
            <div class="features_single_container">
                <img src="<?php echo SITE_URL; ?>assets/images/item-facil.png" alt="Fácil - Chollo">
                <!-- <h3>Sin intereses</h3> -->
                <p>Comprar es muy fácil con nuestra App. Y atención exclusiva en nuestras tiendas aliadas.</p>
            </div>
            <div class="clear"></div>
        </div>
    </section>
    <!-- FEATURES:END -->

    <!-- <section class="hp_disclaimer_intro_wrapper">
        <div class="hp_disclaimer_intro_container">
            <p>Forefront Solutions Limited offers unregulated credit agreements. Borrowing more than you can afford or
                paying late may negatively impact your credit score and your ability to shop with us again. 18+, UK
                residents only. Subject to status. T&amp;Cs apply.</p>
        </div>
    </section> -->

    <!-- HIGHLIGHT:BEGIN -->
    <section class="home_highlight_wrapper">
        <div class="home_highlight_container">
            <div class="home_highlight_left">
                <img src="<?php echo SITE_URL; ?>assets/images/chollo-phone.png" alt="App - Chollo">
            </div>
            <div class="home_highlight_right">
                <h2>Compra, ahorra y obtén más <span>Tiempo</span> para pagar</h2>
                <p>Descarga nuestra aplicación en tu teléfono y descubre los beneficios que Chollo tiene para ti. La app de Chollo es simple y es muy fácil ajustar y mantener el control de tu presupuesto.</p>
                <a class="scroll_bottom_btn">
                    Descarga la App
                    <div class="header_bottom_right_arrow_cont">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7.98px" height="9.21px" viewBox="0 0 7.98 9.21" style="overflow:visible;enable-background:new 0 0 7.98 9.21;" xml:space="preserve">
                            <defs></defs>
                            <polygon class="st0_arrow" style="fill: #FFFFFF;" points="7.98,4.61 3.99,6.91 0,9.21 0,4.61 0,0 3.99,2.3 " />
                        </svg>
                    </div>
                </a>
            </div>
            <div class="clear"></div>
        </div>
    </section>
    <!-- HIGHLIGHT:END -->

    <!-- PRODUCTS:BEGIN -->
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
            if (is_array($pJSON) || is_object($pJSON)) {
                foreach ($pJSON as $value) {
                    echo '<div class="customer_favourites_single">';
                    echo '<span class="top-pick">Más vendido</span>';
                    echo '<img src="https://admin.chollo.app/src/storage/app/public/products/' . $value->image . '" alt="imagen ' . $value->name . '" title="' . $value->name . '">';
                    echo '<p class="customer_favourite_brand">HERTECH</p>';
                    echo '<p class="customer_favourite_product">' . $value->name . '</p>';
                    echo '<p class="customer_favourite_price">40% de inicial</p>';
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
    <!-- PRODUCTS:END -->

    <!-- BANNER:BEGIN -->
    <section id="no_credit_checks_wrapper">
        <div id="no_credit_checks_left_col">
            <div id="no_credit_checks_left_col_container">
                <h3 class="home_h3_title_light">Cuotas que se <span>adaptan a ti.</span></h3>
                <p class="home_sub_title_credit_check">Compra el teléfono que deseas y paga hasta en 7 cuotas.</p>
                <p class="home_para_dark" id="no_credit_checks_">Debes primero verificarte en la App para que veas el monto aprobado.</p>
                <a id="home_find_out_how_we_work_btn" class="scroll_bottom_btn find_out_how_you_work_btn">Crear Cuenta Ahora</a>
            </div>
            <div class="clear"></div>
        </div>
        <div id="no_credit_checks_right_col"></div>
        <div class="clear"></div>
    </section>
    <!-- BANNER:END -->

    <!-- STORES:BEGIN -->
    <section id="you_decide_to_pay_wrapper">
        <div id="you_decide_to_pay_container">
            <h3 class="home_h3_title text_center">Explora dónde <span>comprar</span></h3>
            <p class="home_sub_title text_center">Visita nuestras tiendas autorizadas y descubre una experiencia de compra única. Encuentra la tienda más cercana a ti y comienza tu experiencia de compra hoy mismo.</p>

            <!-- <div id="you_decide_to_pay_left_col">
                <h3 class="home_h3_title">Nuestras <span>Tiendas</span></h3>
                <p class="home_sub_title">That's Right, we put you in control of your payment dates.</p>
                <p class="home_sub_title">
                    Visita nuestras tiendas físicas y descubre una experiencia de compra única. Con ubicaciones convenientes
                    y un ambiente acogedor, nuestras tiendas ofrecen una amplia selección de productos para satisfacer todas tus
                    necesidades. Encuentra la tienda más cercana a ti y comienza tu experiencia de compra hoy mismo.
                </p>
                <p class="home_para"><a href="flexiblepayments.html" target="_blank">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a></p>
                <a id="home_when_to_pay_btn" class="browse_phones_btn" onclick="">Ver Tiendas</a>
            </div>
            <div id="you_decide_to_pay_right_col">
                <div id="you_decide_to_pay_video_container">
                    <img id="home_you_decide_video_placeholder" src="assets/images/bg-web-chollo-2.webp" onclick="" alt="Banner Web - Chollo">
                </div>
            </div> -->
        </div>
        <div class="slider">
            <div class="slide-track">
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="<?php echo SITE_URL; ?>assets/images/logo-hertech.png" height="100" width="250" alt="HERTECH" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="<?php echo SITE_URL; ?>assets/images/logo-hertech.png" height="100" width="250" alt="HERTECH" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="<?php echo SITE_URL; ?>assets/images/logo-hertech.png" height="100" width="250" alt="HERTECH" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="<?php echo SITE_URL; ?>assets/images/logo-hertech.png" height="100" width="250" alt="HERTECH" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="<?php echo SITE_URL; ?>assets/images/logo-hertech.png" height="100" width="250" alt="HERTECH" />
                    </a>
                </div>
                <div class="slide">
                    <a href="#" tabindex="-1">
                        <img src="<?php echo SITE_URL; ?>assets/images/logo-hertech.png" height="100" width="250" alt="HERTECH" />
                    </a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </section>
    <!-- STORES:END -->

    <!-- QRAPP:BEGIN -->
    <?php require_once 'layouts/qr-app.php'; ?>
    <!-- QRAPP:END -->

    <!-- FOOTER:BEGIN -->
    <?php require_once 'layouts/footer.php'; ?>
    <!-- FOOTER:END -->

    <div id="mobile_nav_overlay_wrapper"></div>

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

    <div id="homepage_overlay_wrapper"></div>

    <!-- SCRIPTS:BEGIN -->
    <?php require_once 'common/scripts.php'; ?>
    <!-- SCRIPTS:END -->
</body>

</html>