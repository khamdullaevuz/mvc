<?php
$title = "Product - Add";
require __DIR__.'/../layouts/header.layout.php';
?>
<div class="container">
    <h1>Product - Add</h1>
    <form action="/product/insert" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp">

            <?php if(!empty($error)): ?>
            <div id="nameHelp" class="form-text"><?=$error?></div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
require __DIR__.'/../layouts/footer.layout.php';
?>