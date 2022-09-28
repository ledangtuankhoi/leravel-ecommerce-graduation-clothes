<?php

namespace App\Http\Controllers;

use App\BlockPage;
use App\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlockPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public static function BlockCategory()
    {
        $categories = [];

        //        get id category of config table
        $categoriesIdConfig = (array)unserialize(BlockPage::pluck('config-content')->toArray()[0]);
 
        $categories = Category::whereIn('id',$categoriesIdConfig)->with('products')->get();
        $categoriesArray = $categories->toArray();
        $productItemsCount = [];
        foreach($categoriesArray as $key => $categorie){
            $categoriesArray[$key]['product_count']= $categories[$key]->products->count();
        }

        dump($categoriesArray);
        // dump($productItemsCount,$productItemsCount[1]->products->count());

        return $categoriesArray;
    }
}
