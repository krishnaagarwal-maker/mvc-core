<?php
namespace App\Controllers;

class HelloController
{
    public function index()
    {
        
     require "../app/views/hello.php";
     return "Hello From Hello Controller";
    }


}
