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
    <main class='container-sm container-md container-xl my-5 container-xxl main-reset'>
      <h4 class='my-3 text-capitalize'>forgotten password? Username or E-mail (<span class='text-danger d-inline-block bi bi-asterisk'></span>)</h4>
      <form class='needs-validation' novalidate>
        <input type='hidden' name='form-action' value='forgotten' />
        <div class='row g-3'>
          <div class='col-12'>
            <label for='username_emails' class='form-label col-form-label-lg'>Username</label>
            <div class='input-group has-validation'>
              <label for='username_emails' class='input-group-text col-form-label-lg px-5 fs-3'>@</label>
              <input class='form-control form-control-lg' id='username_emails' name='username_email' value='' placeholder='required' required />
              <div class='invalid-feedback'>Your username is required</div>
            </div>
          </div>
        </div>
        <hr class='my-4'>
        <button class='w-75 btn btn-primary btn-lg text-capitalize mx-auto d-block' type='submit'>request reset password</button>
      </form>
    </main><?= $footer . $foot ?>
  </body>
</html>
