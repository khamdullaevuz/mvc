<?php

require '../config/core.php';

spl_autoload_register(function($class){
    require '../'.$class.'.php';
});

require '../routes/web.php';