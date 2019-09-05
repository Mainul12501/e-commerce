<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name','product_code','product_discount_price','product_orginal_price','product_short_description','product_long_description','product_image','publication_status'];

    public function category ()
    {
        return $this->belongsTo('App\Category');
    }

    public function brand ()
    {
        return $this->belongsTo('App\Brand');
    }


}
