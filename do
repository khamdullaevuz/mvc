#!/usr/bin/php
<?php
$data = $argv[1];
if(mb_stripos($data, ":")!==false)
{
    $value = explode(":", $data);
    $method = $value[0];
    $param = $value[1];
    $name = $argv[2];
    if($method == "make")
    {
        $dir = $param . "s";
        if($param == "config")
        {
            if(!is_dir("config") and !file_exists("config/Core.php")){
                mkdir("config");
                $dir = $param;
                $name = "Core";
            }else{
                die("Config already maked!");
            }
        }
        $param = ucfirst($param);
        if(!$name) $name = $param;
        $data = file_get_contents("stubs/" . $param . ".stub");
        $data = str_replace("{name}", $name, $data);
        file_put_contents($dir . "/" . $name . ".php", $data);
    }
}else{
    $method = $data;
    if($method == "serve")
    {
        if(!$argv[2]){
            exec("php -S localhost:8000 public/index.php");
        }else{
            exec("php -S localhost:" . $argv[2] . " public/index.php");
        }

    }
}