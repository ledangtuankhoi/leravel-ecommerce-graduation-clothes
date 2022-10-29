<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Qirolab\Theme\Theme;

class TestController extends Controller
{
    //
    public function test1(){
        Theme::clear();
        return Theme::active();
    }

    public function test2(){
        Theme::set('ashion');
        return Theme::active();
    }
    
}
