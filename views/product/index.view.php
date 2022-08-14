<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="/favicon.ico">
</head>
<body class="bg-light">
<?php
require __DIR__.'/../layouts/header.layout.php';
?>
<div class="container">
    <div class="row"><div class="col-md-4"><h1>Products</h1></div><div class="col-md-4"></div><div class="col-md-4"><a
                    href="/product/add" class="btn btn-success">Add product</a></div></div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php /** @var array $products */
        foreach($products as $key => $product): ?>
        <tr>
            <th scope="row"><?= ++$key ?></th>
            <td><?= $product['name'] ?></td>
            <td><form action="/product/delete?id=<?=$product['id']?>" method="POST"><a href="/product/show?id=<?=$product['id']?>" class="btn btn-primary btn-sm me-1"><i class="bi bi-eye-fill"></i></a><a href="/product/edit?id=<?=$product['id']?>" class="btn btn-warning btn-sm me-1"><i class="bi bi-pencil-fill"></i></a><input type="hidden" name="_method" value="DELETE" /><button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button></form></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
require __DIR__.'/../layouts/footer.layout.php';
?>
<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>