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
    <h1>Product update - <?=$product['id']?></h1>
    <form action="/product/put?id=<?=$product['id']?>" method="POST">
        <div class="mb-3">
            <input type="hidden" name="_method" value="PUT" />
            <label for="name" class="form-label">Name</label>
            <input name="name" value="<?=$product['name']?>" type="text" class="form-control" id="name" aria-describedby="nameHelp">
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
<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>