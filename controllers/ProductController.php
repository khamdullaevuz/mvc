<?php

namespace Controllers;

class ProductController extends \Controller
{
    public function index(): void
    {
        $this->view('product/index');
    }

    public function show(int $id): void
    {
        $this->view('product/show');
    }

    public function update(int $id): void
    {
        $this->view('product/update');
    }

    public function insert(): void
    {
        $this->view('product/add');
    }

    public function delete(int $id): void
    {
        // delete
    }

    public function add(int $id): void
    {
        // add
    }

    public function put(int $id): void
    {
        // put
    }
}