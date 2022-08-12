<?php

require '../vendor/autoload.php';

$app = new App();
$app->debug(true);
$app->error_reporting();
$app->run();