<?php

require '../vendor/autoload.php';

use Core\App;

$app = new App();
$app->debug(true);
$app->error_reporting();
$app->run();