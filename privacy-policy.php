<?php

// CONFIG REQUIRE
require_once 'includes/config.php';
require_once 'includes/function.php';

?>

<!-- HEAD:BEGIN -->
<?php

$page = 'privacy-policy';
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

    <!-- PRIVACYPOLICY:BEGIN -->
    <section class="hp_discover_wrapper">
        <div class="policy_container">
            <h1 class="policy_title">Políticas de Privacidad</h1>

            <p class="policy_text">Esta Política de Privacidad describe cómo GRUPO CHOLLO VE, C.A. recopila, utiliza y
                comparte la información personal de los usuarios de nuestra aplicación móvil CHOLLO.</p>

            <h3 class="policy_subtitle">Información que Recopilamos</h3>

            <p class="policy_text">Podemos recopilar información personal de diversas formas, incluidas cuando los
                usuarios visitan nuestra aplicación, se
                registran en la aplicación, validan sus datos personales, realizan un pedido, responden a una encuesta,
                completan un formulario, interactúan con la
                aplicación u otras características disponibles en nuestra aplicación.</p>

            <h3 class="policy_subtitle">Cómo Usamos la Información</h3>

            <p class="policy_text">Utilizamos la información que recopilamos para personalizar la experiencia del
                usuario y para mejorar nuestra
                aplicación. También podemos utilizar la información para enviar correos electrónicos periódicos con
                respecto a su pedido
                u otros productos y servicios.</p>

            <h3 class="policy_subtitle">Protección de la Información</h3>

            <p class="policy_text">Implementamos una variedad de medidas de seguridad para mantener la seguridad de su
                información personal cuando realiza
                un pedido o ingresa, envía o accede a su información personal.</p>

            <h3 class="policy_subtitle">Divulgación a Terceros</h3>

            <p class="policy_text">No vendemos, intercambiamos ni transferimos de otro modo a terceros su información de
                identificación personal. Esto no
                incluye terceros de confianza que nos asisten en la operación de nuestra aplicación, la realización de
                nuestro negocio o
                el servicio que le prestamos.</p>

            <h3 class="policy_subtitle">Consentimiento</h3>

            <p class="policy_text">Al utilizar nuestra aplicación, usted acepta nuestra política de privacidad.</p>

            <h3 class="policy_subtitle">Cambios en la Política de Privacidad</h3>

            <p class="policy_text">Si decidimos cambiar nuestra política de privacidad, publicaremos esos cambios en
                esta página.</p>

            <h3 class="policy_subtitle">Los derechos de los Usuarios</h3>

            <p class="policy_text">Borrar o eliminar los Datos Personales. Los Usuarios tienen derecho a obtener la
                supresión de sus
                Datos por parte del
                Titular.</p>

            <p class="policy_text">Para formalizar el cierre de la cuenta debe comunicarse con nuestro equipo de soporte
                que una vez
                formalizado el
                proceso emitirá una constancia de solvencia con Chollo.</p>

            <h3 class="policy_subtitle">Póngase en Contacto con Nosotros</h3>

            <p class="policy_text">Si tiene alguna pregunta sobre esta política de privacidad, puede ponerse en contacto
                con nosotros.</p>
        </div>
    </section>
    <!-- PRIVACYPOLICY:END -->

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