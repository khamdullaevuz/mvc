<?php

class Debug
{
    public static function dumpData($data, bool $exit = true): void
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';

        if($exit){
            exit;
        }
    }
}