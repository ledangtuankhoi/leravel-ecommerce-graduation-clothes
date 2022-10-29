<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Qirolab\Theme\Theme;

class TestController extends Controller
{
    public function clear()
    {

        Theme::clear();
        return dump([
            Theme::active(),

            Theme::parent(), 

            Theme::getViewPaths(),
        ]);
    }

    public function settheme($theme)
    {
        Theme::set((string)$theme);
        return dump([ 
            Theme::active(),

            Theme::parent(),  

            Theme::getViewPaths(),
        ]);
    }
}
