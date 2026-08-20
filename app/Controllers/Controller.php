<?php

namespace App\Controllers;

class Controller{
    protected function view($view, $data=[]){
        extract($data);

        require "../app/views" . $view . ".php";
    }

    protected function redirect($url){
        header("Location: " . $url);
    }
}