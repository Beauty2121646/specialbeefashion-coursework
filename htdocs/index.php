<?php
require_once 'include/responses.php';
$header = require 'include/header.php';
require_once 'include/main.php';
$footer = require 'include/footer.php';
$foot   = require 'include/foot.php';
require_once 'include/script.php';
require_once 'include/modal.php';
$inline_style = "";
$head         = require_once 'include/head.php';
global $brand_title, $slug;
?>
<!doctype html>
<html class='no-js' lang='en-gb'><?= $head ?>
  <body class='<?= $slug ?>'><?= $header ?>
    <main class='container-sm container-md container-xl my-5 container-xxl main-contact'>
      <div id='myCarousel' class='carousel slide' data-bs-ride='carousel'>
        <div class='carousel-indicators'>
          <button type='button' data-bs-target='#myCarousel' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
          <button type='button' data-bs-target='#myCarousel' data-bs-slide-to='1' aria-label='Slide 2'></button>
          <button type='button' data-bs-target='#myCarousel' data-bs-slide-to='2' aria-label='Slide 3'></button>
        </div>
        <div class='carousel-inner'>
          <div class='carousel-item active'>
            <svg class='bd-placeholder-img' width='100%' height='100%' xmlns='http://www.w3.org/2000/svg' aria-hidden='true' preserveAspectRatio='xMidYMid slice' focusable='false'>
              <rect width='100%' height='100%' fill='var(--bs-secondary-color)' />
            </svg>
            <div class='container'>
              <div class='carousel-caption text-start'>
                <h1><?= $brand_title ?>.</h1>
                <p>Nigeria's fashion industry is growing at such a remarkable rate as more people become conscious of personal looks and fashion sense. Hence, a tool that allows users to conveniently browse, and read stories about fashion from either the home setting is needed. This software is called "SpecialBees Fashions"</p>
                <p><a class='btn btn-lg btn-primary' href='/signup'>Sign up today</a></p>
              </div>
            </div>
          </div>
          <div class='carousel-item'>
            <svg class='bd-placeholder-img' width='100%' height='100%' xmlns='http://www.w3.org/2000/svg' aria-hidden='true' preserveAspectRatio='xMidYMid slice' focusable='false'>
              <rect width='100%' height='100%' fill='var(--bs-secondary-color)' />
            </svg>
            <div class='container'>
              <div class='carousel-caption'>
                <h1>About <?= $brand_title ?>.</h1>
                <p>A project coming soon from Africa Nigeria.</p>
                <p><a class='btn btn-lg btn-primary' href='/about'>Learn more</a></p>
              </div>
            </div>
          </div>
          <div class='carousel-item'>
            <svg class='bd-placeholder-img' width='100%' height='100%' xmlns='http://www.w3.org/2000/svg' aria-hidden='true' preserveAspectRatio='xMidYMid slice' focusable='false'>
              <rect width='100%' height='100%' fill='var(--bs-secondary-color)' />
            </svg>
            <div class='container'>
              <div class='carousel-caption text-end'>
                <h1>Our kids collections.</h1>
                <p>Some Africa and Nigeria kids collections trending.</p>
                <p><a class='btn btn-lg btn-primary' href='/kids'>Browse gallery</a></p>
              </div>
            </div>
          </div>
        </div>
        <button class='carousel-control-prev' type='button' data-bs-target='#myCarousel' data-bs-slide='prev'>
          <span class='carousel-control-prev-icon' aria-hidden='true'></span>
          <span class='visually-hidden'>Previous</span>
        </button>
        <button class='carousel-control-next' type='button' data-bs-target='#myCarousel' data-bs-slide='next'>
          <span class='carousel-control-next-icon' aria-hidden='true'></span>
          <span class='visually-hidden'>Next</span>
        </button>
      </div>
    </main><?= $footer . $foot ?>
  </body>
</html>
