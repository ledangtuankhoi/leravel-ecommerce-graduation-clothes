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
 
        // dump($productItemsCount,$productItemsCount[1]->products->count());

        return $categoriesArray;
    }

    

    /**
     * landing page new product 
     * 
     * landing page new product is product new update and sort auto
     * 
     * $categoiesSortByNewProductUpdate =
     * [
     *  "0" => ["categoryName"=>"catetegory name",
     *  "products"=>[
     *      "0"=>[
     *          "id"=>"id",
     *          "name"=>"name",
     *          "image"=>"image",
     *          "price"=>"price",
     *          "startPreview"=>startPreview""
     *          ,label
     *        ]
     *  ],
     * ...
     * ]
     * id,name,image,price,startPreview,label
     * 
     * @return array
     */
    public static function NewProductByCategoryAuto(){


        // maximum items; 4
        // mimi items: 1
        // limit items in row: 4;
        // uu tien: customize, new product, auto
        // total product 6 items in collection
        // $piriority = 'customize' 

        // item

        $categoiesSortByNewProductUpdate = [];

        $produtSortCreated = DB::table('products')->orderBy('created_at', 'desc')->get();
        $produtSortCreated_1 = Product::get()[0]->categories()->get();

        dump($produtSortCreated, $produtSortCreated_1);
        return $categoiesSortByNewProductUpdate;
    }

    //TODO landing page new product customize
    /**
     * landing page new product customize
     * 
     * landing page new product customize is product new update and customize sort auto
     * help for maketing and tạo thu nhập cho admin
     * 
     * @return void
     */
    public static function NewProductByCategoryCustomize(){

    }

}
