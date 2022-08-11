<?php
g
spl_autoload_register(function($class){
    require '../'.$class.'.php';
});

require '../config/core.php';
require '../routes/web.php';