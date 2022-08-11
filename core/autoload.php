<?php

spl_autoload_register(function($class){
    require '../'.str_replace('\\', '/', $class).'.php';
});

require '../routes/web.php';
require '../config/core.php';