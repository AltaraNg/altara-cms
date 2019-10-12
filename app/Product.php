<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'brand_id', 'category_id', 'features', 'price', 'image', 'user_id', 'rprice', 'popularity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

   /* public static function form()
    {
        return [
            'name' => '',
            'brand_id' => '',
            'category_id' => '',
            'popularity' => '',
            'features' => '',
            'price' => '',
            'rprice' => '',
            'user_id' => '',
            'image' => ''
        ];
    }*/
}
