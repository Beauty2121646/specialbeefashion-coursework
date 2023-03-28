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
    <main class='container-sm container-md container-xl my-5 container-xxl main-<?= $slug ?>'>
      <!-- START THE FEATURETTES -->

      <hr class='featurette-divider'>

      <div class='row featurette'>
        <div class='col-md-7'>
          <h2 class='featurette-heading fw-normal lh-1'>First featurette heading. <span class='text-body-secondary'>It’ll blow your mind.</span></h2>
          <p class='lead'>Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
        </div>
        <div class='col-md-5'>
          <svg
              class='bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto' width='500' height='500' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: 500x500'
              preserveAspectRatio='xMidYMid slice' focusable='false'
          ><title>Placeholder</title>
            <rect width='100%' height='100%' fill='var(--bs-secondary-bg)' />
            <text x='50%' y='50%' fill='var(--bs-secondary-color)' dy='.3em'>500x500</text>
          </svg>
        </div>
      </div>

      <hr class='featurette-divider'>

      <div class='row featurette'>
        <div class='col-md-7 order-md-2'>
          <h2 class='featurette-heading fw-normal lh-1'>Oh yeah, it’s that good. <span class='text-body-secondary'>See for yourself.</span></h2>
          <p class='lead'>Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
        </div>
        <div class='col-md-5 order-md-1'>
          <svg
              class='bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto' width='500' height='500' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: 500x500'
              preserveAspectRatio='xMidYMid slice' focusable='false'
          ><title>Placeholder</title>
            <rect width='100%' height='100%' fill='var(--bs-secondary-bg)' />
            <text x='50%' y='50%' fill='var(--bs-secondary-color)' dy='.3em'>500x500</text>
          </svg>
        </div>
      </div>

      <hr class='featurette-divider'>

      <div class='row featurette'>
        <div class='col-md-7'>
          <h2 class='featurette-heading fw-normal lh-1'>And lastly, this one. <span class='text-body-secondary'>Checkmate.</span></h2>
          <p class='lead'>And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with
                          some actual content. Your content.</p>
        </div>
        <div class='col-md-5'>
          <svg
              class='bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto' width='500' height='500' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: 500x500'
              preserveAspectRatio='xMidYMid slice' focusable='false'
          ><title>Placeholder</title>
            <rect width='100%' height='100%' fill='var(--bs-secondary-bg)' />
            <text x='50%' y='50%' fill='var(--bs-secondary-color)' dy='.3em'>500x500</text>
          </svg>
        </div>
      </div>

      <hr class='featurette-divider'>

      <!-- /END THE FEATURETTES -->
    </main><?= $footer . $foot ?>
  </body>
</html>