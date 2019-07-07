<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = "category_product";
    protected $guarded = [];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_id');
    }
}

