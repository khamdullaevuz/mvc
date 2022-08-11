<?php

use Core\Router;
use Controllers\HomeController;
//use Controllers\AboutController;

Router::register('', [HomeController::class, 'index']);
Router::register('about', [\Controllers\AboutController::class, 'index']);
