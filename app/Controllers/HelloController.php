<?php
namespace App\Controllers;

class HelloController extends Controller
{
    public function index()
    {
        
    //  require "../app/views/hello.php";
    $this->view("/hello");
     return "Hello From Hello Controller";
    }


}
