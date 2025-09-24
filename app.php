<?php
$path = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Chollo — Compralo ahora, pagalo después</title>
    <!-- Indicar navegadores/robots en meta tags -->
    <meta name="robots" content="noindex, nofollow, noimageindex, noarchive" />
    <!-- Evitar tarjeta OG/Twitter: meta og:* twitter:* -->
    <meta name="referrer" content="no-referrer" />
    <!-- <meta http-equiv="Content-Security-Policy" content="default-src 'none'; connect-src 'none'; img-src 'none'; script-src 'none'; style-src 'none';" /> -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ua = (navigator.userAgent || "").toLowerCase();

            if (/android/.test(ua)) {
                // Play Store
                window.location.href = "https://play.google.com/store/apps/details?id=com.grupochollo.cholloapp";
            } else if (/iphone|ipad|ipod/.test(ua)) {
                // App Store
                window.location.href = "https://apps.apple.com/app/FALTAID";
            } else {
                // Web
                window.location.href = "https://chollo.app";
            }
        });
    </script>
</head>

<body>
    <!-- Redirigiendo -->
</body>

</html>