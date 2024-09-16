<?php

// CONFIG REQUIRE
require_once 'includes/config.php';
require_once 'includes/function.php';

session_start();

// Verificar autenticación
$token = $_SESSION['session_token'] ?? null;
$authenticated = $token ? checkSession($token) : false;

if (!$authenticated) {
  header('Location: login');
  exit();
}

$customerId = $_SESSION['customer_id'] ?? null;
$customerName = $_SESSION['customer_name'] ?? null;
$customerLastname = $_SESSION['customer_lastname'] ?? null;
$customerNationality = $_SESSION['customer_nationality'] ?? null;
$customerIdentification = $_SESSION['customer_identification'] ?? null;

$firstName = explode(' ', $customerName)[0];
$lastName = explode(' ', $customerLastname)[0];

// Data Company
$company = getCompany($token);

// Determinar qué sección mostrar
$section = $_GET['section'] ?? 'list'; // Default es listar órdenes
$orderId = $_GET['order'] ?? null;

switch ($section) {
  case 'report':
    if ($orderId) {
      $orderDetails = getOrderById($orderId, $token);

      if (!$orderDetails) {
        header('Location: pay');
        exit();
      }
    } else {
      header('Location: pay');
      exit();
    }
    break;
  case 'list':
  default:
    $orders = getOrdersByCustomer($customerId, $token);
    break;
}

// Maneja la solicitud de cierre de sesión
if (isset($_POST['action']) && $_POST['action'] === 'logout') {
  if ($token) {
    $response = logout($token);

    // Elimina el token de la sesión
    unset($_SESSION['session_token']);
    // Redirige al usuario a la página de inicio o login
    header('Location: login');
    exit;
  } else {
    header('Location: login');
  }
}

?>

<!-- HEAD:BEGIN -->
<?php

$page = 'pay';
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

  <!-- PAYMENT:BEGIN -->
  <main id="section-payment">
    <div class="container">
      <div class="row justify-content-center">
        <!-- Aside Section -->
        <aside class="col-lg-3 mb-5">
          <h2 class="text-primary fs-5 fw-medium mb-4">¡Hola, <?php echo $firstName . ' ' . $lastName; ?>!</h2>
          <div class="d-flex flex-column gap-3">
            <div class="row">
              <!-- Logout Button -->
              <div class="col-sm-6">
                <form method="POST" action="pay">
                  <input type="hidden" name="action" value="logout">
                  <button type="submit" class="btn btn-light btn-square d-flex flex-column align-items-center justify-content-center">
                    <i class="fas fa-sign-out-alt fa-2x"></i>
                    <span class="mt-2">Cerrar Sesión</span>
                  </button>
                </form>
              </div>

              <!-- Support Button -->
              <!-- <div class="col-sm-6">
                <button type="button" class="btn btn-light btn-square d-flex flex-column align-items-center justify-content-center">
                  <i class="fas fa-headset fa-2x"></i>
                  <span class="mt-2">Atención al Cliente</span>
                </button>
              </div> -->
            </div>
          </div>
        </aside>

        <!-- Content Section -->
        <section class="col-lg-9">
          <div class="row justify-content-center">
            <div class="col-lg-9">
              <?php if ($section === 'list'): ?>

                <?php require_once 'layouts/payment/pay-orders.php'; ?>

              <?php elseif ($section === 'report'): ?>

                <?php require_once 'layouts/payment/pay-report.php'; ?>

              <?php endif; ?>
            </div>
          </div>
        </section>
      </div>
    </div>
  </main>
  <!-- PAYMENT:END -->

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