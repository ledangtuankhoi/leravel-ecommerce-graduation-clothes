<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\OrderProduct;
use App\CategoryProduct;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('featured', true)->take(8)->inRandomOrder()->get();
        $categories = Category::all();


        return view('landing-page')->with(
            [
                'products' => $products,
                'categories' => $categories
            ]
        );
    }
}
