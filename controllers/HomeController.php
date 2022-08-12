<?php

namespace Controllers;

use Models\Product;

class HomeController extends \Controller
{
    public function __invoke(): void
    {
        $product = new Product();
        $products = $product->selectAllData();
        $this->view('home', compact('products'));
    }
}