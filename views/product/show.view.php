<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="/favicon.ico">
</head>
<body class="bg-light">
<?php
require __DIR__.'/../layouts/header.layout.php';
?>
<div class="container">
    <h1>Product</h1>
    <h3><?= /** @var array $product */
        $product['name']?></h3>
    <form action="/product/delete?id=<?=$product['id']?>" method="POST"><a href="/product" class="btn btn-primary btn-sm me-1">Back</a><a href="/product/edit?id=<?=$product['id']?>" class="btn btn-warning btn-sm me-1">Edit</a><input type="hidden" name="_method" value="DELETE" /><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>
</div>
<?php
require __DIR__.'/../layouts/footer.layout.php';
?>
<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>