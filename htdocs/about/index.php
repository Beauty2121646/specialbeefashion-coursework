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
global $brand_title, $slug, $page_title;
?>
<!doctype html>
<html class='no-js' lang='en-gb'><?= $head ?>
    <body class='<?= $slug ?>'><?= $header ?>
        <main class='container-sm container-md container-xl container-xxl main-contact'>
            <div class='col-lg-7 p-3 p-lg-5 pt-lg-3 mx-auto'>
                <h3 class='display-6 fw-bold lh-1'>$page_title</h3>
            </div>
        </main><?= $footer . $foot ?>
    </body>
</html>
