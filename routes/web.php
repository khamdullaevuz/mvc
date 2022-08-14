<?php

use Controllers\HomeController;
use Controllers\AboutController;
use Controllers\ProductController;

Router::get('', HomeController::class);
Router::get('about', [AboutController::class, 'about']);

Router::get('product', [ProductController::class, 'index']);
Router::get('product/show', [ProductController::class, 'show']);
Router::get('product/update', [ProductController::class, 'update']);
Router::get('product/insert', [ProductController::class, 'insert']);
Router::delete('product/delete', [ProductController::class, 'delete']);
Router::post('product/add', [ProductController::class, 'add']);
Router::put('product/put', [ProductController::class, 'put']);