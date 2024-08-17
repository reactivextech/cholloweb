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

// Determinar qué sección mostrar
$section = $_GET['section'] ?? 'list'; // Default es listar órdenes
$orderId = $_GET['order_id'] ?? null;

switch ($section) {
  case 'select':
    if ($orderId) {
      $orderDetails = getOrderById($orderId, $token);
      $orderQuota = getQuotasByOrder($orderId, $token);
      if (!$orderDetails || !$orderQuota) {
        echo "Orden no encontrada.";
        exit();
      }
    } else {
      header('Location: pay?section=list');
      exit();
    }
    break;
  case 'report':
    if ($orderId) {
      $feeAmount = $_GET['fee_amount'] ?? null;
      $otherAmount = $_GET['other_amount'] ?? null;
      $paymentMethod = $_GET['payment_method'] ?? null;
      if (!$feeAmount || !$paymentMethod) {
        header('Location: pay?section=select&order_id=' . $orderId);
        exit();
      }
    } else {
      header('Location: pay?section=list');
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
    echo 'No hay sesión activa.';
  }
}

?>

<!-- HEAD:BEGIN -->
<?php

$page = 'pay';
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

  <!-- FORMPAYMENT:BEGIN -->
  <section id="section_payment" class="payment-form">
    <div id="home_application_container">

      <form method="POST" action="pay">
        <input type="hidden" name="action" value="logout">
        <button type="submit" class="btn btn-danger">Cerrar sesión</button>
      </form>

      <div id="home_application_right_col">
        <?php if ($section === 'list'): ?>

          <?php require_once 'layouts/pay-orders.php'; ?>

        <?php elseif ($section === 'select'): ?>

          <?php require_once 'layouts/pay-select.php'; ?>

        <?php elseif ($section === 'report'): ?>

          <?php require_once 'layouts/pay-report.php'; ?>

        <?php endif; ?>

        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
    <!-- <div id="home_application_container">
      <div id="home_application_right_col">
        <div id="home-account-type-wrapper-stage0 stage1">
          <p class="home_application_create_title">Registrar pago</p>
          <p class="home_application_create_sub_title">Registrar el pago.</p>
          <form id="form-stage1" name="form-stage1" action="" method="POST">
            <p style="margin-bottom:10px; display:none;">Sign up with Facebook</p>

            <div style="text-align:left; width:100%; margin-bottom:10px; height:40px; display:none;">

              <div style="margin-top:20px;" class="fb-login-button" data-scope="public_profile,email" data-layout="rounded" data-width="" data-size="medium" data-button-type="login_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="true"></div>
            </div>

            <div style="width: 100%; height: 10px; border-bottom: 1px solid black; text-align: center; margin-bottom:30px; display:none;">
              <span style="font-size: 18px; background-color: white; font-weight:bold; padding: 0 10px;">
                or
              </span>
            </div>

            <p style="display:none; margin-bottom:15px;">Create your account</p>

            <div class="home_apply_left_col_input_container" id="home_form_single_title">
              <label><span>*</span> Metodo de pago:</label>
              <select id="title" name="title" class="dropdown" onchange="javascript:personal_title_check();" tabindex="1">
                <option value="" selected>Seleccionar </option>
                <option value="Mr">Mr</option>
                <option value="Miss">Miss</option>
                <option value="Mrs">Mrs</option>
                <option value="Ms">Ms</option>
              </select>
            </div>
            <div class="home_apply_left_col_input_container" id="home_form_single_fname">
              <label><span>*</span> Numero de referencia del pago:</label>
              <input type="text" id="first_name" name="first_name" onblur="check_fname_input();" tabindex="2" value="" />
            </div>
            <div class="home_apply_left_col_input_container" id="home_form_single_surname">
              <label><span>*</span> Numero de telefono:</label>
              <input type="text" id="surname" name="surname" onblur="check_sname_input();" tabindex="3" value="" />
            </div>
            <div class="clear"></div>
            <div class="home_apply_left_col_input_container" id="home_form_single_dob" style="width:49%;">
              <label><span>*</span> Fecha en la que fue realizado el pago:</label>
              <select id="d_o_b_d1" name="d_o_b_d1" tabIndex="4" class="dropdown dateofbirth_dropdown" onchange="javascript:dob_day_check();" onblur="javascript:dob_day_check();">
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
              <select id="d_o_b_m1" name="d_o_b_m1" tabIndex="5" class="dropdown dateofbirth_dropdown" onchange="javascript:dob_month_check();" onblur="javascript:dob_month_check();">
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
              <select id="d_o_b_y1" name="d_o_b_y1" tabIndex="6" class="dropdown dateofbirth_dropdown" onchange="javascript:dob_year_check();" onblur="javascript:dob_year_check();">
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
              <input type="text" id="app_email" name="email" onblur="check_email_input();" tabindex="7" value="" />
            </div>
            <div class="home_apply_left_col_input_container" id="home_form_single_mobile">
              <label><span>*</span> Mobile No:</label>
              <input type="text" id="app_mobile" name="app_mobile" onblur="check_app_mobile();" tabindex="8" value="" />
            </div>
            <div class="home_apply_left_col_input_container" id="home_form_single_sec1">
              <label><span>*</span> Choose a password:</label>
              <input type="password" id="app_password" name="password" onblur="check_app_password();" tabindex="9" placeholder="Minimum 4 characters" />
              <span class="invalid-message">Password is too short</span>
            </div>
            <div class="clear"></div>

            <div id="home_optin_container">
              <div id="home_optin_checkbox_container">
                <input type="checkbox" id="app_optin_checkbox" name="app_optin_checkbox" value="true" tabindex="12">
              </div>
              <p>I agree to receive occasional emails &amp; SMS messages regarding more fantastic products
                from Mad For It. </p>
              <div style="clear:both;"></div>

              <div id="home_optin_checkbox_container">
                <input type="checkbox" id="app_gdpr" name="gdpr" tabindex="11" />
              </div>
              <p>By checking this box I agree to the Forefront Solutions Limited <a href='privacy.html' target="_blank">privacy policy</a> and <a href='terms.html' target="_blank">terms</a>.</p>
              <p id="app-error-message" style="color:red; font-size:12px;" class="hidden">Please check the
                boxes highlighted in red, and check the box above</p>
              <p id="check_text" style="display: none; margin-left: 0px; color: red;">Please check our
                Terms and Conditions</p>
              <div style="clear:both;"></div>
            </div>

            <div id='create_account' style='text-align: center;'>
              <div id='create_account_button'>
                <button id="application_process_app_btn" type="submit" class="application_send_app_btn" style="clear:both;">Pagar <i class="fas fa-arrow-right" style="color:#fff; position:relative; font-size:20px; margin-left:10px;"></i></button>
              </div>
            </div>

            <div class="clear"></div>
            <p class="apply-form-disclaimer">Texto informativo.</p>
            <input type="hidden" name="csrf-token" value="0fdc1021f7eeefc32bc6f5bde2ebbb87e5c6880d8871ae4e430f42c072b46265" />
          </form>
        </div>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div> -->
  </section>
  <!-- FORMPAYMENT:END -->

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