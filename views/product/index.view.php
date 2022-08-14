<?php
$title = "Products";
require __DIR__.'/../layouts/header.layout.php';
?>
<div class="container">
    <div class="row"><div class="col-6"><h1>Products</h1></div><div class="col-4"></div><div class="col-2"><a
                    href="/product/add" class="btn btn-success"><i class="bi bi-plus"></i></a></div></div>
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