<?php

use Core\Router;
use Controllers\HomeController;
use Controllers\AboutController;

Router::register('', HomeController::class);
Router::register('about', [AboutController::class, 'about']);
