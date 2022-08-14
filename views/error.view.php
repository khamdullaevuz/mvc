<?php
$title = "Error";
require 'layouts/header.layout.php';
?>
<div class="container">
<?php
/** @var string $error */
echo $error;
?>
</div>
<?php
require 'layouts/footer.layout.php';
?>