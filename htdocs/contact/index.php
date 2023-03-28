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
    <main class='container-sm container-md container-xl container-xxl main-contact'>
      <div class='col-lg-7 p-3 p-lg-5 pt-lg-3 mx-auto'>
        <h3 class='display-6 fw-bold lh-1'>Nigeria Clet's * contact &amp;</h3>
        <form class='row g-3 mt-5 mb-5 needs-validation contact' id='contact' name='contact' novalidate=''>
          <input type='hidden' name='action' value='contact'>
          <div class='col col-sm-12 col-md-6'>
            <div class='mb-3'>
              <label for='names' class='form-label'>Names</label>
              <input class='form-control ' id='names' name='names' value='' placeholder='Names' required=''>
              <div class='valid-feedback'>Looks good!</div>
              <div class='invalid-feedback'>Please give us your names!</div>
            </div>
          </div>
          <div class='col col-sm-12 col-md-6'>
            <div class='mb-3'>
              <label for='email' class='form-label'>Email address</label>
              <input type='email' class='form-control ' id='email' name='email' value='' placeholder='email@domain.com' aria-required='true' required=''>
              <div class='valid-feedback'>Looks good!</div>
              <div class='invalid-feedback'>Invalid email address!</div>
            </div>
          </div>
          <div class='mb-3'>
            <label for='massages' class='form-label'>Message area</label>
            <textarea class='form-control ' id='massages' name='massages' placeholder='Write us and we will get back to you' rows='3' aria-required='true' required=''></textarea>
            <div class='valid-feedback'>Looks good!</div>
            <div class='invalid-feedback'>Enter your massages!</div>
          </div>
          <div class='col-12 text-end'>
            <button class='btn btn-success text-capitalize' type='submit'>contact us</button>
          </div>
        </form>
      </div>
    </main><?= $footer . $foot ?>
  </body>
</html>
