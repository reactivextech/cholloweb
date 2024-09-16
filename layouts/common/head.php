<?php

$page = isset($page) ? $page : 'index';

switch ($page) {
    case 'ally':
        $title = 'Chollo — Aliado Comercial';
        $canonical = 'https://www.chollo.app/ally';
        $description = 'Te ayudamos a potenciar tu negocio.';
        $keywords = 'credit, phone, cuotas, credito, celular, telefono, producto, aliado, comercial, negocio, registro';

        break;
    case 'pay':
        $title = 'Chollo — Pagos';
        $canonical = 'https://www.chollo.app/pay';
        $description = 'Paga tu cuota fácilmente con Chollo.';
        $keywords = 'credit, phone, cuotas, credito, celular, telefono, producto, pago, pagos, financiamiento';

        break;
    case 'login':
        $title = 'Chollo — Inicio de Sesión';
        $canonical = 'https://www.chollo.app/login';
        $description = 'Inicia sesión para pagar tu cuota fácilmente con Chollo.';
        $keywords = 'credit, phone, cuotas, credito, celular, telefono, producto, sesion, ingresar, financiamiento';

        break;
    case 'privacy-policy':
        $title = 'Chollo — Políticas de Privacidad';
        $canonical = 'https://www.chollo.app/privacy-policy';
        $description = 'Lee nuestra política de privacidad para conocer cómo protegemos tu información en Chollo. Tu privacidad es importante para nosotros.';
        $keywords = 'credit, phone, cuotas, credito, celular, telefono, marca, producto';

        break;
    case 'terms-conditions':
        $title = 'Chollo — Términos y Condiciones';
        $canonical = 'https://www.chollo.app/terms-conditions';
        $description = 'Aquí están nuestros términos y condiciones para usar Chollo. Lee detenidamente antes de usar la aplicación.';
        $keywords = 'credit, phone, cuotas, credito, celular, telefono, marca, producto';

        break;
    case 'index':
    default:
        $title = 'Chollo — Compralo ahora, pagalo después';
        $canonical = 'https://www.chollo.app/';
        $description = 'Compra lo que más te gusta y pagalo en cuotas con total facilidad.';
        $keywords = 'credit, phone, cuotas, credito, celular, telefono, marca, producto, compra, financiamiento, después, pagalo, paga, tablet, ahora';

        break;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- METADATA:BEGIN -->
    <?php require_once 'layouts/common/metadata.php'; ?>
    <!-- METADATA:END -->

    <!-- FAVICON:BEGIN -->
    <?php require_once 'layouts/common/favicon.php'; ?>
    <!-- FAVICON:END -->

    <!-- STYLES:BEGIN -->
    <?php require_once 'layouts/common/styles.php'; ?>
    <!-- STYLES:END -->

    <!-- GOOGLEANALYTIC:BEGIN -->
    <?php require_once 'layouts/common/google-analytic.php'; ?>
    <!-- GOOGLEANALYTIC:END -->
</head>