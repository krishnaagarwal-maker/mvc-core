<?php

namespace App\Core;
class Request{
    public function method(){
        return $_SERVER['REQUEST_METHOD'];
    }

    public function post($key){
        return $_POST[$key] ?? null;
    }

    public function get($key){
        return $_GET[$key];
    }
}
?>