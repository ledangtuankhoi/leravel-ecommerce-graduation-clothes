<?php

namespace App\Http\Controllers;

use App\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LengthException;

/**
 * tùy chỉnh cho menu trên thanh header
 */
class MenuController extends Controller
{
    // TODO custome menu


    //  menu auto sort category with best seller 
    /**
     * Category best saller
     * 
     * menu auto sort category with best seller 
     *
     * @return array 
     */
    public static function CategoryByBestSeller($typeOrderBy = 'DESC', $limit = 3)
    {

        $bestSaller = DB::table('category_product')
            // lấy ra category id
            ->join('order_product', 'category_product.product_id', '=', 'order_product.product_id')

            // join category id với bảng category 
            // lấy ra tên và slug của category 
            ->select(DB::raw('count(*) as sales, category_product.category_id as category_id, category.id, category.name, category.slug'))
            ->join('category', function ($join) {
                $join->on('category_id', '=', 'category.id');
            })
            ->groupBy('category_id')
            ->orderBy('sales', $typeOrderBy)
            ->take($limit);

        // item not full in menu 
        if ($bestSaller->get()->count() < $limit) {
            $temp =  DB::table('category')
                ->whereNotIn(
                    'category.id',
                    $bestSaller
                        ->pluck('category_id')
                        ->toArray()
                )
                ->limit($limit - $bestSaller->get()->count())
                ->get()
                ->toArray();
        }

        $bestSaller = $bestSaller->get()->toArray();
        $bestSaller = array_merge($bestSaller, $temp);

        return $bestSaller;
    }
}
