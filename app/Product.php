<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'manufacture_id',
        'product_name',
        'product_description',
        'product_short_description',
        'product_price',
        'product_image',
        'product_size',
        'product_color',
        'public_status'
    ];

    public function category(){
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function manufacture()
    {
        return $this->belongsTo('App\Manufacture', 'manufacture_id', 'id');
    }
}
