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
    <main class='container-sm container-md container-xl my-n3 container-xxl main-<?= $slug ?>'>
      <!-- START THE FEATURETTES -->

      <hr class='featurette-divider'>

      <div class='row featurette'>
        <div class='col-md-7'>
          <h2 class='featurette-heading fw-normal lh-1 ms-5'>First featurette heading. <span class='d-inline-block text-dark me-5'>It’ll blow your mind.</span></h2>
          <p class='lead ms-5'>Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
        </div>
        <div class='col-md-5'><img src='/assets/images/kids/101.jpeg' alt='Kids dress'></div>
      </div>

      <hr class='featurette-divider'>

      <div class='row featurette'>
        <div class='col-md-7 order-md-2'>
          <h2 class='featurette-heading fw-normal lh-1'>Oh yeah, it’s that good. <span class='text-body-secondary'>See for yourself.</span></h2>
          <p class='lead me-5'>Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
        </div>
        <div class='col-md-5'><img src='/assets/images/kids/102.jpeg' alt='Kids dress'></div>
      </div>

      <hr class='featurette-divider'>

      <div class='row featurette'>
        <div class='col-md-7'>
          <h2 class='featurette-heading fw-normal lh-1'>And lastly, this one. <span class='text-body-secondary'>Checkmate.</span></h2>
          <p class='lead ms-5'>And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like
                               with
                          some actual content. Your content.</p>
        </div>
        <div class='col-md-5'><img class='me-n1' src='/assets/images/kids/103.jpeg' alt='Kids dress'></div>
      </div>

      <hr class='featurette-divider'>

      <!-- /END THE FEATURETTES -->
    </main><?= $footer . $foot ?>
  </body>
</html>
