<?php

namespace App\Http\Controllers;

use App\BlockPage;
use App\Category;
use App\Product;
use Cartalyst\Stripe\Api\Products;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BlockPageController extends Controller
{
    protected $HIDDEN_COLUMNS = ['id', 'created_at', 'updated_at', 'description', 'images', 'featured'];

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

        $categories = Category::whereIn('id', $categoriesIdConfig)->with('products')->get();
        $categoriesArray = $categories->toArray();
        $productItemsCount = [];
        foreach ($categoriesArray as $key => $categorie) {
            $categoriesArray[$key]['product_count'] = $categories[$key]->products->count();
        }

        // dump($productItemsCount,$productItemsCount[1]->products->count());

        return $categoriesArray;
    }



    // TODO:new product ( chưa giống với mẫu phần )
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
     *          ,"label"=>"label",
     *           "categories"=>["category0","category1"],
     * 
     *        ]
     *  ],
     * ...
     * ]
     * id,name,image,price,startPreview,label
     * 
     * @return array
     */
    public static function NewProductByCategoryCustomize()
    {

        $categoiesSortByNewProductUpdate = [];

        // maximum items; 4
        // mimi items: 1
        // limit items in row: 4;
        // uu tien: customize, new product, auto
        // total product 6 items in collection
        // $piriority = 'customize' 

        // data sample 

        $dataId = (array)unserialize(BlockPage::select('config-content')->where('slug', 'landing-page-new-product')->get()->toArray()[0]['config-content']);

        foreach ($dataId as $key => $value) {

            // find the category with id
            $category = Category::findOrFail($value['category_id']);
            $productCustomize = [];
            if (!$category) {
                return 'not data or error somthing';
            }
            // push data to array 
            $categoiesSortByNewProductUpdate[$key]["category"] =
                [
                    // "id" => $category->toArray()['id'],
                    "name" => $category->toArray()['name'],
                    "slug" => $category->toArray()['slug']
                ];

            // find product
            // where in product and category
            $productCustomize = Product::findOrFail($value['products'])
                ->makeHidden(['id', 'created_at', 'updated_at', 'description', 'images', 'featured'])
                ->toArray();

            // NOT OPTIMAL: use for loop is so lost time for query results
            // foreach($products as $product) {
            //     $productCustomize = $product->categories()->where('category_id', $value['category_id'])->get()->toArray();
            // }

            // NOT IMPLEMENTED: 
            // - query builder: relationship in advanced query 
            // - subquery ELO: not where advanced query
            // $productCustomize = DB::table('product')
            // ->where('id',$value['products'])
            // ->where(function($query){
            //     $query->categories()->where('category_id','1');
            // })->get();

            if (!$productCustomize) {
                return 'not data or error somthing';
            }

            // marketing category
            // allway show when change category
            // help for product seen more time
            $marketingCategory = [];



            // $categoiesSortByNewProductUpdate[$key]["product"]['marketing_category']=$marketingCategory;  

            $categoiesSortByNewProductUpdate[$key]["product"] = $productCustomize;
        }

        // view product table with sort 
        // $produtSortCreated = DB::table('products')->orderBy('created_at', 'desc')->get();
        // $produtSortCreated_1 = Product::get()[0]->categories()->get();

        return $categoiesSortByNewProductUpdate;
    }

    public static function NewProductByCategory()
    {

        $active =  BlockPage::where('slug', 'landing-page-new-product')->where('status', 1);
        if ($active) {
            return BlockPageController::NewProductByCategoryCustomize();
        } else {
            return BlockPageController::NewProductByCategoryAuto();
        }
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
    public static function NewProductByCategoryAuto()
    {
        return [];
    }


    /**
     * Banner silider 
     *
     * @return array
     */
    public static function BannerSlider()
    {
        $dataId = (array)unserialize(BlockPage::select('config-content')->where('slug', 'landing-page-banners-slider')->get()->toArray()[0]['config-content']);
        
        return $dataId;
    }
}
