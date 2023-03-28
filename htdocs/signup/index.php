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
<html class='no-js' lang='en-gb' data-bs-theme='light'><?= $head ?>
  <body class='<?= $slug ?>'><?= $header ?>
    <main class='container-sm container-md container-xl my-5 container-xxl main-signup'>
      <h4 class='mt-5 text-capitalize text-dark mx-5'>registration information required (<span class='text-danger d-inline-block bi bi-asterisk'></span>)</h4>
      <form class='needs-validation text-dark m-5' novalidate>
        <input type='hidden' name='form-action' value='registration' />
        <div class='row g-3'>
          <div class='col-sm-4'>
            <label for='firstName' class='form-label'>First name</label>
            <input class='form-control' id='firstName' name='firstName' minlength='3' maxlength='64' pattern='^[a-zA-Z][a-zA-Z0-9]{2,63}$' placeholder='required' value='' required />
            <div class='invalid-feedback'>Valid first name is required.</div>
          </div>
          <div class='col-sm-4'>
            <label for='lastName' class='form-label'>Last name</label>
            <input class='form-control' id='lastName' name='lastName' minlength='3' maxlength='64' pattern='^[a-zA-Z][a-zA-Z0-9]{2,63}$' placeholder='required' value='' required />
            <div class='invalid-feedback'>Valid last name is required.</div>
          </div>
          <div class='col-sm-4'>
            <label for='otherName' class='form-label'>Order name</label>
            <input class='form-control' id='otherName' name='otherName' placeholder='optional' value='' />
            <div class='invalid-feedback'>Valid last name is required.</div>
          </div>
          <div class='col-12'>
            <label for='username' class='form-label'>Username</label>
            <div class='input-group has-validation'>
              <label for='username' class='input-group-text px-5'><i class='bi bi-at fs-4'></i></label>
              <input class='form-control' id='username' name='username' minlength='6' maxlength='64' value='' pattern='^[a-z]+\.?[a-z0-9]+$' placeholder='Username required' required />
              <div class='invalid-feedback'>Your username is required</div>
            </div>
          </div>
          <div class='input-group mt-1 mb-4'>
            <label class='input-group-text col-form-label pe-4' for='password'><span class='text-danger d-inline-block bi bi-asterisk'></span>Password</label>
            <input
                class='form-control form-control-lg password' type='password' id='password' name='password' value='' pattern='^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S+$' placeholder='Password' required
            />
            <button class='btn btn-outline-secondary toggle-password rounded-end-1' data-bs-toggle='' data-bs-target='assword' type='button' title='Press to toggle password'><i class='bi bi-eye-slash'></i>
            </button>
            <div class='invalid-feedback'>Your password is required.</div>
          </div>
          <div class='col-12'>
            <label for='email' class='form-label'>Email (<span class='text-body-secondary text-capitalize'>required</span>)</label>
            <input type='email' class='form-control' id='email' name='email' value='' placeholder='you@domain.com' required />
            <div class='invalid-feedback'>Please enter a valid email address</div>
          </div>
        </div>
        <hr class='my-4'>
        <button class='w-75 btn btn-primary btn-lg text-capitalize mx-auto d-block' type='submit'>signup</button>
      </form>
    </main><?= $footer . $foot ?>
  </body>
</html>
