<?php

abstract class Controller
{
    public function view(string $view, array $options = []): void
    {
        extract($options);
        require '../views/'.$view.'.view.php';
    }

    public function redirect(string $url, array $options = []): void
    {
        $str = "";
        $i = 0;
        foreach($options as $key => $value){
            $i++;
            if($i == 1){
                $str .= '?'.$key.'='.$value;
            }else{
                $str .= '&'.$key.'='.$value;
            }
        }
        header('location: /'.$url.$str);
    }
}