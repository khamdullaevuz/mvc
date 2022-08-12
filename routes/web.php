<?php

use Core\Router;
use Controllers\HomeController;
use Controllers\AboutController;
use Controllers\TestController;
use Controllers\LoginController;

Router::get('', HomeController::class);
Router::get('about', [AboutController::class, 'about']);
Router::post('test', TestController::class);
Router::get('login', LoginController::class);