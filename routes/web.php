<?php

use Controllers\HomeController;
use Controllers\AboutController;
use Controllers\ProductController;

Router::get('', HomeController::class);
Router::get('about', [AboutController::class, 'about']);

Router::get('products', [ProductController::class, 'index']);
Router::get('products/show', [ProductController::class, 'show']);
Router::get('products/edit', [ProductController::class, 'edit']);
Router::get('products/add', [ProductController::class, 'add']);
Router::delete('products/delete', [ProductController::class, 'delete']);
Router::post('products/insert', [ProductController::class, 'insert']);
Router::put('products/put', [ProductController::class, 'put']);