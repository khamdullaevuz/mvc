<?php

namespace Controllers;

use Controller;
use Request;
use Models\Product;

class ProductController extends Controller
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
        $this->redirect('/products');
    }

    public function insert(): void
    {
        $data = Request::getFormData();
        if(!empty($data['name'])) {
            $product = new Product();
            $id = $product->add($data);
            $this->redirect('/products/show', ['id' => $id]);
        }else{
            $this->view('product/add', ['error'=>"Name is required"]);
        }
    }

    public function put(int $id): void
    {
        $product = new Product();
        $data = Request::getFormData();
        if(!empty($data['name'])) {
            $product->update($data, ['id' => $id]);
            $this->redirect('/products/show', ['id' => $id]);
        }else{
            $product = $product->selectOne(['id'=>$id]);
            $error = "Name is required";
            $this->view('product/edit', compact('product', 'error'));
        }
    }
}