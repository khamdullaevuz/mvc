<?php
/** @var string $error */
$title = $error . " - error";
require 'layouts/header.layout.php';
?>
<div class="container">
<?= $error ?>
</div>
<?php
require 'layouts/footer.layout.php';
?>