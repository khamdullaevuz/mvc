<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="/favicon.ico">
</head>
<body class="bg-light">
<?php
require 'layouts/header.layout.php';
?>
<div class="container">
<?php
/** @var string $helloFromController */
echo $helloFromController;
?>
</div>
<?php
require 'layouts/footer.layout.php';
?>
<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>