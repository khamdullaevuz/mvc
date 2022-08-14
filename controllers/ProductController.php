<?php

namespace Controllers;

use Models\Product;
use Request;

class ProductController extends \Controller
{
    public function index(): void
    {
        $product = new Product();
        $products = $product->selectAllData();
        $this->view('product/index', compact('products'));
    }

    public function show(int $id): void
    {
        $product = new Product();
        $product = $product->selectOne(['id'=>$id]);
        $this->view('product/show', compact('product'));
    }

    public function edit(int $id): void
    {
        $product = new Product();
        $product = $product->selectOne(['id'=>$id]);
        $this->view('product/edit', compact('product'));
    }

    public function add(): void
    {
        $this->view('product/add');
    }

    public function delete(int $id): void
    {
        $product = new Product();
        $product->delete(['id'=>$id]);
        $this->redirect('product');
    }

    public function insert(): void
    {
        $data = Request::getPost();
        $product = new Product();
        $id = $product->add($data);
        $this->redirect('product/show', ['id'=>$id]);
    }

    public function put(int $id): void
    {
        $product = new Product();
        $data = Request::getPost();
        unset($data['_method']);
        $product->update($data, ['id'=>$id]);
        $this->redirect('product/show', ['id'=>$id]);
    }
}