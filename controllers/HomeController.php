<?php

namespace Controllers;

use Models\Product;

class HomeController extends \Controller
{
    public function __invoke(): void
    {
        $product = new Product();
        $products = $product->selectAll(['name'=>"Apple"]);
        $this->view('home', compact('products'));
    }
}