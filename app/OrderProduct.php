<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';

    protected $fillable = ['order_id', 'product_id', 'quantity'];

     /**
     * Get the product that wrote the order_product.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
