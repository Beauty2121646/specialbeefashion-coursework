<?php
global $inline_style, $brand_title, $page_title, $page_author;
$head = "
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='author' content='$page_author'>

    <title>$page_title</title>

    <link rel='canonical' href='/'>

    <link href='/assets/css/bootstrap/bootstrap.min.css' rel='stylesheet' />
    <link href='/assets/css/bootstrap/bootstrap-icons.css' rel='stylesheet' />
    <link href='/assets/css/base.css' rel='stylesheet' />
    <!-- Favicons -->
    <link rel='apple-touch-icon' href='/assets/images/brand/nig-flag.png' sizes='180x180'>
    <link rel='icon' href='/assets/images/brand/nig-flag.png' sizes='32x32' type='image/png'>
    <link rel='icon' href='/assets/images/brand/nig-flag.png' sizes='16x16' type='image/png'>
    <!-- Script -->
    <script src='/assets/js/bootstrap/color-modes.js'></script>$inline_style
  </head>";

return $head;
