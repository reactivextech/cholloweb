<?php

// CONFIG REQUIRE
require_once 'includes/config.php';
require_once 'includes/function.php';

?>

<!-- HEAD:BEGIN -->
<?php

$page = 'ally';
require_once 'layouts/common/head.php';

?>
<!-- HEAD:END -->

<body>
    <!-- BANNERTOP:BEGIN -->
    <?php require_once 'layouts/theme/banner-top.php'; ?>
    <!-- BANNERTOP:END -->

    <!-- HEADER:BEGIN -->
    <?php require_once 'layouts/theme/header.php'; ?>
    <!-- HEADER:END -->

    <!-- ALLY:BEGIN -->
    <section>
        <h1>Aliado Comercial</h1>
    </section>
    <!-- ALLY:END -->

    <!-- QRAPP:BEGIN -->
    <?php require_once 'layouts/theme/qr-app.php'; ?>
    <!-- QRAPP:END -->

    <!-- FOOTER:BEGIN -->
    <?php require_once 'layouts/theme/footer.php'; ?>
    <!-- FOOTER:END -->

    <div id="mobile_nav_overlay_wrapper"></div>

    <div id="homepage_overlay_wrapper"></div>

    <!-- SCRIPTS:BEGIN -->
    <?php require_once 'layouts/common/scripts.php'; ?>
    <!-- SCRIPTS:END -->
</body>

</html>
