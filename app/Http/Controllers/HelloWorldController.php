<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    //metodo do post
    public function hello()
    {
        return 'Hello Controller do método post';
    }

    //metodo do GET
    public function helloName($name)
    {
        return 'Hello Controller do método get para ' . $name;
    }

}