<?php

// CONFIG REQUIRE
require_once 'includes/config.php';
require_once 'includes/function.php';

?>

<!-- HEAD:BEGIN -->
<?php

$page = 'terms-conditions';
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

    <!-- TERMSCONDITIONS:BEGIN -->
    <section class="hp_discover_wrapper">
        <div class="policy_container">
            <h1 class="policy_title">Términos y Condiciones</h1>

            <p class="policy_text">Por favor, lee estos términos y condiciones cuidadosamente antes de usar la
                aplicación móvil CHOLLO operada por GRUPO CHOLLO VE, C.A.</p>

            <h3 class="policy_subtitle">Tu Acceso y Uso de la Aplicación</h3>

            <p class="policy_text">Al acceder y utilizar la Aplicación, aceptas estar sujeto a estos Términos y
                Condiciones. Si no estás de acuerdo con
                alguno de estos términos, no utilices la Aplicación.</p>

            <h3 class="policy_subtitle">Propiedad Intelectual</h3>

            <p class="policy_text">La Aplicación y su contenido, características y funcionalidades originales son
                propiedad de GRUPO CHOLLO VE, C.A. y
                están protegidos por leyes de derechos de autor, marcas comerciales y otras leyes de propiedad
                intelectual aplicables.</p>

            <h3 class="policy_subtitle">Enlaces a Otros Sitios Web</h3>

            <p class="policy_text">Nuestra Aplicación puede contener enlaces a sitios web de terceros o servicios que no
                son propiedad ni están controlados
                por GRUPO CHOLLO VE, C.A. No tenemos control sobre el contenido, las políticas de privacidad o las
                prácticas de los
                sitios web o servicios de terceros, y no asumimos ninguna responsabilidad por ellos.</p>

            <h3 class="policy_subtitle">Cambios a estos Términos y Condiciones</h3>

            <p class="policy_text">Nos reservamos el derecho, a nuestra sola discreción, de modificar o reemplazar estos
                Términos en cualquier momento. Si
                hacemos cambios materiales a estos Términos, te notificaremos a través de la Aplicación. El uso
                continuado de la
                Aplicación después de cualquier cambio constituye la aceptación de esos cambios.</p>

            <h3 class="policy_subtitle">Contacto</h3>

            <p class="policy_text">Si tienes alguna pregunta sobre estos Términos y Condiciones, puedes ponerte en
                contacto con nosotros.</p>
        </div>
    </section>
    <!-- TERMSCONDITIONS:END -->

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