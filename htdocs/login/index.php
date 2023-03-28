<?php
require_once '../include/responses.php';
$header = require '../include/header.php';
require_once '../include/main.php';
$footer = require '../include/footer.php';
$foot   = require '../include/foot.php';
require_once '../include/script.php';
require_once '../include/modal.php';
$inline_style = '';
$head         = require_once '../include/head.php';
global $brand_title, $slug;
?>
<!doctype html>
<html class='no-js' lang='en-gb'><?= $head ?>
  <body class='<?= $slug ?>'><?= $header ?>
    <main class='container-sm container-md container-xl my-5 container-xxl main-login'>
      <h4 class='my-3 text-capitalize'>Let's log you in, credentials required (<span class='text-danger d-inline-block bi bi-asterisk'></span>)</h4>
      <form class='needs-validations' novalidate>
        <input type='hidden' name='form-action' value='login' />
        <a class='navbar-brand d-block text-center p-3 mt-4' href='http://asobi.localhost'> <img class='navbar-brand-logo' src='/assets/images/brand/nig-flag.png' alt='Asobi Logo' title='Nigeria Asobi logo' /></a>
        <h1 class='h3 mb-3 fw-normal'>Please sign in</h1>

        <div class='form-floating'>
          <input class='form-control' id='username_email' name='username_email' placeholder='username or name@domain.com' value='' required />
          <label for='username_email'>Username or Email</label>
        </div>
        <div class='input-group mt-1 mb-4'>
          <input class='form-control form-control-lg password' type='password' id='passwords' name='password' value='' placeholder='Password' required />
          <button class='btn btn-outline-secondary toggle-password' data-bs-target='assword' type='button' title='Press to toggle password'><i class='bi bi-eye-slash'></i></button>
          <label class='input-group-text col-form-label' for='passwords'><span class='text-danger d-inline-block bi bi-asterisk'></span>Password</label>
        </div>
        <div class='checkbox mb-3'><label><input type='checkbox' name='remember' value='remember-me'> Remember me</label></div>
        <hr class='my-4'>
        <div class='clearfix text-capitalize'>
          <button class='w-25 btn btn-lg btn-primary float-start' type='submit'>Sign in</button>
          <a class='btn btn-link text-info float-end text-nowrap' type='button' data-bs-activate='tab' data-bs-target='#recover-tab'>request reset password</a>
        </div>
      </form>
    </main><?= $footer . $foot ?>
  </body>
</html>
