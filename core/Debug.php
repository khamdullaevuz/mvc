<?php

namespace Core;

class Debug
{
    public static function dumpData($data, bool $exit = false): void
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';

        if($exit){
            exit;
        }
    }
}