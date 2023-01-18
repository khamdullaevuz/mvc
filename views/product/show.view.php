<?php
$title = "Product";
require __DIR__.'/../layouts/header.layout.php';
?>
<div class="container">
    <h1>Product</h1>
    <h3><?= /** @var array $product */
        $product['name']?></h3>
    <form action="/products/delete?id=<?=$product['id']?>" method="POST"><a href="/products" class="btn btn-primary btn-sm me-1">Back</a><a href="/products/edit?id=<?=$product['id']?>" class="btn btn-warning btn-sm me-1">Edit</a><input type="hidden" name="_method" value="DELETE" /><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>
</div>
<?php
require __DIR__.'/../layouts/footer.layout.php';
?>