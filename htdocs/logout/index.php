<?php
use Asobi\Core;
require '../autoloader.php';
$file = __FILE__;
$core = Core::getInstance();
$core->response->respondToRequest();
$core->renderAsobi();
